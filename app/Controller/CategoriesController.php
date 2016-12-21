<?php

namespace Controller;

use \W\Controller\Controller;
use Model\CategoriesModel;
use Respect\Validation\Validator as v;
use Respect\Validation\Exceptions\ValidationException;

class CategoriesController extends BaseController
{
	public function categoriesList() {

		$categoriesModel = new CategoriesModel();

		$categoriesList = $categoriesModel->findAll();

		if ($this->getUser()['status'] !='admin') {
			$this->redirectToRoute('default_home');
			}

		$this->show('categories/list', array('categoriesList' => $categoriesList));
	}

	/**
	* Cette méthode permet de voir le contenu d'une catégorie
	* param : $id, l'id de l'article dont je cherche à voir le contenu
	*/
	public function seeCategory($id) {

		$CategoriesModel = new CategoriesModel();
		$category = $CategoriesModel->find($id);
		$articles = $CategoriesModel->showLastSixArticlesInSidebar($id);

		$this->show('categories/see', array('category' => $category, 'articles' => $articles));
	}

	public function previousCategory($id, $offset){
		$CategoriesModel = new CategoriesModel();
		$previousArticles = $CategoriesModel->showRestOfArticlesWhenScroll($id,$offset);

		$this->show('categories/previous', array('previousArticles'=>$previousArticles));

	}


	public function deleteCategory($id) {

	$CategoriesModel = new CategoriesModel();

	$deleteCategory = $CategoriesModel->delete($id);

	$this->redirectToRoute('categories_list');

	$this->show('categories/deleteCategory', array('deleteCategory' => $deleteCategory));
	}

	/**
	* Cette fonction sert à modifier ou insérer des articles
	* Elle prend en paramètre optionnel l'id de l'article à modifier, si il n'existe pas c'est de l'insertion
	*/

	public function editCategory($idCategory = null) {

			$CategoriesModel = new CategoriesModel();
			$datas = [];

		if (!empty($_POST)) {

			if(empty($_POST['name'])) {
				$this->getFlashMessenger()->error('Veuillez entrer une catégorie');
			}


				$validators = array(
					'name' => v::length(3,55)
						->setName('Titre de la catégorie')
				);

				$trads = array(
					'length' => '{{name}} doit avoir une longueur comprise entre {{minValue}} et {{maxValue}} caractères'
				);

				// Je parcours la liste de mes validateurs  en récupérant aussi le nom du champ en clé
				foreach($validators as $field => $validator) {
					// La méthode assert renvoie une exception de type NestedValidationException qui nous permet de récupérer le ou les messages d'erreur en cas d'erreurs
					try {
						// On essaie de valider la donnée si une exception se produit, on exécute le bloc catch
						$validator->check(isset($_POST[$field]) ? $_POST[$field] : '');

					} catch(ValidationException $ex) {
						// on récupère l'exception qui signifie qu'il y a eu une erreur et on ajoute un message d'erreur avec l'autre bibliotèque
						$ex->setTemplate($trads[$ex->getId()]);

						$mainMessage = $ex->getMainMessage();

						$this->getFlashMessenger()->error($mainMessage);

					}
				
				}

				$datas = array(
					'name' => $_POST['name']
				);

				if(! $this->getFlashMessenger()->hasErrors()) {

					$idCategory = $_POST['id'];

					if ($idCategory != null) {

						$CategoriesModel->update($datas, $idCategory);

					} else{

						$categoryNew = $CategoriesModel->insert($datas);
						
					}

					$this->redirectToRoute('categories_list');
				}
			
		} else {
			
			if (isset($idCategory)) {
				
				$categoryInfos = $CategoriesModel->find($idCategory);

				$datas = array(
				'name' => $categoryInfos['name']
				);	
			}

		}

		if ($this->getUser()['status'] !='admin') {
			$this->redirectToRoute('default_home');
		}

		$this->show('categories/update', array('idCategory'=> $idCategory, 'datas' => $datas));

	}

}