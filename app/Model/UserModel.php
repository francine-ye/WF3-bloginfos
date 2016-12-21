<?php

/**
 * Description of UsersModel
 *
 * @author Admin
 */

namespace Model;

use W\Model\UsersModel ;

class UserModel extends UsersModel{
	public function nbUser() {
	$query="SELECT Count(id) FROM `users`";

	$statement = $this->dbh->prepare($query);
	$statement->execute();
	return $statement->fetch(\PDO::FETCH_ASSOC);
	}
	
}
