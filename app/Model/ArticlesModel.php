<?php

namespace Model;

use W\Model\Model;

class ArticlesModel extends Model
{

	/**
	* Cette fonction sélectionne la catégorie qui correspond à l'article
	* $id est l'id de l'article dont on souhaite récupérer la catégorie
	* La fonction retourne les infos de la catégorie
	*/
	public function nbArticle() {
		$query="SELECT Count(id) FROM `articles`";

		$statement = $this->dbh->prepare($query);
		$statement->execute();
		return $statement->fetch(\PDO::FETCH_ASSOC);
	}

	public function nbCommentaireByArticle() {
		$query="SELECT articles.id , title , count(comments.id_article) as 'nombre de commentaire' FROM `articles` JOIN comments on articles.id =comments.id_article GROUP BY articles.id ORDER BY count(comments.id_article) DESC";

		$statement = $this->dbh->prepare($query);
		$statement->execute();
		return $statement->fetch(\PDO::FETCH_ASSOC);
	}

	public function ArticlePlusCommente() {
		$query="SELECT articles.title , count(comments.id_article) as 'nombre de commentaire' FROM `articles` JOIN comments on articles.id =comments.id_article WHERE comments.creation_date > CURDATE()-1 GROUP BY articles.id ORDER BY count(comments.id_article) DESC LIMIT 1";

		$statement = $this->dbh->prepare($query);
		$statement->execute();
		return $statement->fetch(\PDO::FETCH_ASSOC);
	}
	public function searchCategoryWithArticle() {

		$query = "SELECT categories.name, categories.id, articles.* FROM $this->table JOIN categories ON $this->table.id_category = categories.id";

		$stmt = $this->dbh->query($query);

		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);

	}

	public function lastArticleReleasedByCategory($idCategory){
		$query = " SELECT * FROM articles"
		." WHERE id_category=".$idCategory	
		." AND creation_date = (SELECT max(creation_date) FROM articles WHERE id_category=".$idCategory." )";

		$stmt = $this->dbh->query($query);

		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);

	}

}