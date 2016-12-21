<?php

namespace Controller;

use \W\Controller\Controller;
use Model\CommentsModel;
use Model\ArticlesModel;
use Model\UserModel;
use Model\CategoriesModel;

class DefaultController extends BaseController
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		$this->show('default/home');
	}

	public function statistique()
	{
		$usersModel = new UserModel();
		$nbUser =$usersModel->nbUser();


		$commentsModel = new CommentsModel();
		$nbComments = $commentsModel->nbComments();
		$commentaireHier = $commentsModel->commentaireHier();
		$commentsOfTheDay = $commentsModel->commentsOfTheDay();
		

		$articlesModel = new articlesModel();
		$nbArticle = $articlesModel->nbArticle();
		$ArticlePlusCommente = $articlesModel->ArticlePlusCommente();
		$nbCommentaireByArticle = $articlesModel->nbCommentaireByArticle();

		$categoriesModel = new CategoriesModel();
		$nbCategorie = $categoriesModel->nbCategorie();




		$this->show('BackOffice/statistique', 
				array(
					'nbUser' => $nbUser,
					'nbComments' => $nbComments,
					'nbArticle' => $nbArticle,
					'ArticlePlusCommente' => $ArticlePlusCommente,
					'nbCommentaireByArticle' => $nbCommentaireByArticle,
					'nbCategorie' => $nbCategorie,
					'commentaireHier' => $commentaireHier,
					'commentsOfTheDay' => $commentsOfTheDay
				));
	}
}