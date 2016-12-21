<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		['GET', '/BackOffice','Default#statistique', 'statistique'],
		

		//User
		['GET|POST', '/login', 'User#login', 'login'],
		['GET', '/logout', 'User#logout', 'logout'],

		//tableau user
		['GET', '/users', 'User#listUsers', 'users_list'],

		//modifier ajuter un w_user
		['GET|POST', '/register', 'User#register', 'register'],
		['GET|POST', '/registerBo', 'User#register', 'registerBo'],
		
		//admin ajout ou modif user
		['GET|POST', '/users-admin/edit', 'User#editUser', 'add_User'],
		['GET|POST', '/users-admin/edit/[i:id]', 'User#editUser', 'edit_User'],

		//admin supprimer un user
		['GET', '/users-admin/delete/[i:id]', 'User#deleteUser', 'delete_User'],


		// Route pour afficher la liste des commentaires
		['GET', '/comments', 'Comment#CommentsList', 'comments_list'],
		
		// Route pour ajouter les commentaires 
		['GET|POST', '/comments/edit', 'Comment#editComments', 'add_comment'],
		
		// Route pour modifier les commentaires
		['GET|POST', '/comments/edit/[i:id]', 'Comment#editComments', 'update_comment'],
		

		// Route pour supprimer un commentaire
		['GET|POST', '/comments/delete/[i:id]', 'Comment#deleteComment', 'delete_comment'],

		['GET', '/article/[i:id]/offset/[i:offset]', 'Comment#previousComments', 'previous_comments'],

		// Route pour afficher en Ajax le dernier commentaire posté 
		['GET', '/newcomments/[i:idArticle]/[i:idComment]','Comment#newComments', 'new_comment'],



		['GET', '/articles-admin', 'Articles#articlesList', 'articles_list'],
		
		['GET|POST', '/articles-admin/edit/[i:id]', 'Articles#editArticles', 'edit_articles'],
		['GET|POST', '/articles-admin/edit', 'Articles#editArticles', 'add_articles'],
		['GET|POST', '/article/[i:id]', 'Articles#seeArticle', 'see_article'],
		['GET', '/suppression/article/[i:id]', 'Articles#deleteArticle', 'delete_article'],
		['GET|POST', '/modification/article/[i:id]', 'Articles#updateArticle', 'update_article'],
		



		['GET', '/categorie', 'Categories#categoriesList', 'categories_list'],

		['GET', '/suppression/categorie/[i:id]', 'Categories#deleteCategory', 'delete_category'],

		['GET', '/categorie/[i:id]', 'Categories#seeCategory', 'see_category'],

		// Permet de récupérer en ajax les articles précédents
		['GET', '/categorie/[i:id]/offset/[i:offset]', 'Categories#previousCategory', 'previous_category'],



		['GET|POST', '/categorie-admin/edit', 'Categories#editCategory', 'add_category'],
		
		['GET|POST', '/modification/categorie/[i:id]', 'Categories#editCategory', 'update_category'],

		// Route pour la page contact
		['GET|POST', '/contact', 'Contact#seeContact', 'see_contact']
		);