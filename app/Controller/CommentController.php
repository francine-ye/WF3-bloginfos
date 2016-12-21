<?php

namespace Controller; 

use \W\Controller\Controller;
use Model\CommentsModel;
use Model\ArticlesModel;
use Model\UserModel;
use \Plasticbrain\FlashMessages\FlashMessages; 
use \Respect\Validation\Validator as v;
use \Respect\Validation\Exceptions\ValidationException;



class CommentController extends BaseController 
{

		/** 
		 * Cette fonction permet d'afficher la liste des commentaires 
		 */
		public function seeComments($id) {
			
			/*
			 * Ici j'instancie depuis l'action du contrôleur un modèle de commentaires
			 * pour pouvoir accéder à la liste des commentaires
			 */
			
			$commentsModel = new CommentsModel();
			
			$commentsList = $commentsModel->find($id);
			$commentsList = $commentsModel->searchAllWithUserInfos($id);
			

			$this->show('comments/see', array('commentsList' => $commentsList));
		}	


		/**
		 * Cette fonction permet d'ajouter un nouveau commentaire en BDD
		 */

		public function CommentsList() { 
			$commentsModel = new CommentsModel();
			$commentsList = $commentsModel->findAll();


			$commentBindArticles = $commentsModel->bindCommentWithArticle();
						
			$articlesModel = new ArticlesModel();
			$articlesList = $articlesModel -> findAll();

			if ($this->getUser()['status'] !='admin') {
			$this->redirectToRoute('default_home');
			}
			
			$this->show('comments/list', 
				array(
					'commentsList' => $commentsList,
					'articlesList' => $articlesList,
					'commentBindArticles' => $commentBindArticles
				)
			);
		}

		/**
		 * Cette fonction permet de supprimer un commentaire
		 */

		public function deleteComment($id) {
			$commentsModel = new CommentsModel();
			$deletedComment = $commentsModel->delete($id);
			$this->redirectToRoute('comments_list');
			$this->show('comments/deleteComment', array('deleteComment' => $deleteComment));
		}

		public function newComments($idArticle, $idComment){
			$commentsModel = new CommentsModel();
			$commentsList = $commentsModel -> searchArticleWithCommentInfos($idArticle, $idComment);

			$this->show('articles/newcomments', array('commentsList'=>$commentsList));

		}

		public function previousComments($idArticle,$offset){
			$commentsModel = new CommentsModel();
			$previousComments = $commentsModel -> showPreviousCommentsInArticle($idArticle,$offset);

			$this->show('articles/previouscomments', array('previousComments'=>$previousComments));

		}	

		/**
		 * Cette fonction permet de modifier et ajouter un commentaire
		 * @param  [int] $idComment [c'est l'id du commentaire qui est passé en argument. Il est optionnel car pas d'id à la création]. 
		 * 3 cas de figure : 
		 * - On fait une modification, l'id est donc connu et retrouvé via un find
		 * - On fait un ajout, l'id est donc inconnu
		 * - On fait un ajout ou une modification et il y a une erreur, les infos sont donc en POST et réinsérer dans le formulaire pour éviter de les retapper
		 */
		
		public function editComments($idComment = null){
			$commentsModel = new CommentsModel();

	
			$articlesModel = new ArticlesModel();
			$articlesList = $articlesModel -> findAll();

			$usersModel = new UserModel();
			$usersList = $usersModel -> findAll();

			$datas = [];

			if (!empty($_POST)) {
				
				if (empty($_POST['content'])) {
					$this->getFlashMessenger()->error('Vous devez saisir un contenu');
				}
				if (empty($_POST['id_user'])) {
					$this->getFlashMessenger()->error('Vous devez sélectionner un utilisateur');
				}
				if (empty($_POST['id_article'])) {
					$this->getFlashMessenger()->error('Vous devez sélectionner un article');
				}
				if (empty($_POST['creation_date'])) {
					$this->getFlashMessenger()->error('Vous devez saisir une date de création');
				}
				
				//on indique à RESPECT VALIDATION que nos règles de validation seront accessibles depuis le namespace Validation\Rules
			
				
				
				$validators = [
				"content" => v::length(1,150)
				->stringType()
				->notEmpty()
				->setName(' Le contenu du commentaire'),

				"id_user" => v::numeric()
				->notEmpty()
				->setName(' Nom de l\'utilisateur'),

				"id_article" => v::numeric()
				->notEmpty()
				->setName(' Nom de l\'article'),

				"creation_date" => v::date('Y-m-d H:i:s')
				->setName(' Date de création'),

				"modification_date" => v::date('Y-m-d H:i:s')
				->setName(' Date de création'),
				];

				$trads = array(
					'stringType' => '{{name}} ne doit contenir que des caractères alphanumériques',
					'length' => '{{name}} doit avoir une longueur comprise entre {{minValue}} et {{maxValue}} caractères',
					'notEmpty' => '{{name}} doit contenir entre {{minValue}} et {{maxValue}} caractères ', 
					'numeric' => ' {{name}} doit être un numéro',
					'date' => ' {{name}} doit être écrite sous la forme XXXX-XX-XX X:X:X'
				);

				foreach ($validators as $field => $validator) {

					try{
						$validator->check(isset($_POST[$field]) ? $_POST[$field] : ''); 
					} catch (ValidationException $ex) {
						$ex->setTemplate($trads[$ex->getId()]);
						$mainMessage = $ex->getMainMessage();
						$this->getFlashMessenger()->error($mainMessage);
					}
				}
				
				$datas = array(
						'id' => $_POST['id'], 
						'content' => $_POST['content'], 
						'id_user' => $_POST['id_user'], 
						'id_article' => $_POST['id_article'], 
						'creation_date' => date('Y-m-d H:i:s'), 
						'modification_date'=> date('Y-m-d H:i:s')
					);	

				if (!$this->getFlashMessenger()->hasErrors()) {	

					$idComment = $_POST['id'];

					if ($idComment != null) {
						$commentsModel->update($datas,$idComment);
						$this->getFlashMessenger()->success('Le commentaire a bien été mis à jour');
					}else{
						$comment = $commentsModel->insert($datas);
						$this->getFlashMessenger()->success('Le commentaire a bien été inséré');
					}	
					$this->redirectToRoute('comments_list');
				}

				}else{
					if (isset($idComment)) {
						$comment = $commentsModel->find($idComment);

						$datas = array(
							'id' => $comment['id'],
							'content' => $comment['content'], 
							'id_user' => $comment['id_user'], 
							'id_article' => $comment['id_article'], 
							'creation_date' => $comment['creation_date'], 
							'modification_date'=> $comment['modification_date']
						);	
					}	
			} // FIN DU IF $_POST	

			if ($this->getUser()['status'] !='admin') {
			$this->redirectToRoute('default_home');
			}

			$this->show('comments/edit', array(
				'idComment'=>$idComment, 
				'datas' => $datas, 
				'articlesList'=>$articlesList, 
				'usersList'=>$usersList
				)
				);
			
		} // FIN DE LA FONCTION 	



}