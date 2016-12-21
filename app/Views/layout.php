<!DOCTYPE html>
<html lang="fr">

<head>
	<title><?= $this->e($title) ?></title>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

	<link rel="stylesheet" href="<?php echo $this->assetUrl('css/styleNajet.css'); ?>" type="text/css" />
</head>

<body>
	
	<header id="appHeader">


		<h1><a href="<?php echo $this->url('default_home')?>"> Bloginfos </a>

			<br>
			<span>l'actualité en continu <a href="<?php echo $this->url('default_home')?>"><i class="fa fa-bookmark" aria-hidden="true"></i></a></span>

		</h1>
		<nav>

			<ul id="mainMenu">
			
				<?php foreach ($categoriesListMenu as $category) : ?>

				<li><a href="<?php echo $this->url('see_category', array('id'=>$category['id']))?>"><?php echo $category['name'] ?></a></li>
				<?php endforeach; ?>

				<li> <a href="<?php echo $this->url('see_contact')?>">Contact</a></li>
				
				<?php  
					$register=  $this->url('register'); 
					$backOffice=  $this->url('statistique'); 
					$connexion=  $this->url('login');
					$logout=  $this->url('logout');

					if($w_user['status']=='user'){
						echo '<li><a href="'.$register.'">Profil</a></li>';
						echo '<li ><a href="'.$logout.'">Deconnexion</a></li>';
					}
					if(empty($w_user)){
						echo '<li><a href="'.$connexion.'">Connexion</a></li>';
					}
	
					if($w_user['status']=='admin'){
						echo '<li ><a href="'.$logout.'">Deconnexion</a></li>';
						echo '<li ><a href="'.$backOffice.'">BackOffice</a></li>';
						}
					?>
					


			</ul>

			<i class="fa fa-bars" aria-hidden="true" id="burgerBtn"></i> 
		</nav>
		
	</header>
	<main>
	
<!-- ici on supprime l'affichage du titre Acceuil de la page home -->

		<?php 
		if($this->e($title)!='Accueil'){ 
			echo '<h2>'.$this->e($title).'</h2>';}?> 

		<section>
			<?= $this->section('main_content') ?>
			<?php $fmsg->display(); ?> 
		</section>

	</main>
	<footer>
		<section class="maxSiteWidth">
			

			<article>

				<h3>Restez connecté</h3>
				<br>

				<a href="https://fr-fr.facebook.com/" class="fb"><i class="fa fa-facebook" aria-hidden="true"></i></a>
				<a href="#" class="google"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
				<a href="https://twitter.com/Najet_h" class="twit"><i class="fa fa-twitter" aria-hidden="true"></i></a>
				<a href="https://fr.linkedin.com/in/najet-heddadji-6bb35b100" class="linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
				<a href="#" class="dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
			</article>
			
		</section>

		<aside>Copyright &copy; Bloginfos 2016</aside>
	</footer>

	


	<script
	src="https://code.jquery.com/jquery-2.2.4.js"
	integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
	crossorigin="anonymous"></script>

	<script type="text/javascript" src="<?php echo $this->assetUrl('js/script.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo $this->assetUrl('js/close-flash-messages.js') ?>"></script>
	<?php $sectionJavascripts = $this->section('javascripts');
	if( ! empty($sectionJavascripts)) {
		echo $sectionJavascripts;
	}
	?>

</body>
</html>

