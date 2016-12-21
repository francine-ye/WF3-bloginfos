<?php

namespace Model;

use W\Model\Model;

class CategoriesModel extends Model
{

	/**
	* Cette fonction sélectionne tous les articles d'une catégorie
	* $idCategory est l'id de la catégorie dont on souhaite récupérer les articles
	* La fonction retourne la liste des articles
	*/
	public function nbCategorie() {
		$query="SELECT Count(id) FROM `categories`";

		$statement = $this->dbh->prepare($query);
		$statement->execute();
		return $statement->fetch(\PDO::FETCH_ASSOC);
	}
	public function searchArticlesWithCategory($idCategory) {

		$query = "SELECT articles.* FROM $this->table JOIN articles ON $this->table.id = articles.id_category WHERE articles.id_category = :id_category";


		$stmt = $this->dbh->prepare($query);

		$stmt->bindParam(':id_category', $idCategory);

		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);


	}

	public function showLastSixArticlesInSidebar($idCategory){
		$query = "SELECT articles.* FROM $this->table JOIN articles ON $this->table.id = articles.id_category WHERE articles.id_category = :id_category ORDER BY creation_date DESC LIMIT 6 OFFSET 0 ";

		$stmt = $this->dbh->prepare($query);

		$stmt->bindParam(':id_category', $idCategory);

		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function showRestOfArticlesWhenScroll($idCategory,$offset){
		$query = "SELECT articles.* FROM $this->table JOIN articles ON $this->table.id = articles.id_category WHERE articles.id_category = :id_category ORDER BY creation_date DESC LIMIT 6 OFFSET ".$offset;

		$stmt = $this->dbh->prepare($query);

		$stmt->bindParam(':id_category', $idCategory);

		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

}