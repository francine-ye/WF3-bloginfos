<?php $this->layout('layout', ['title' => "Connectez-vous à Bloginfos" ]); ?>

<?php $this->start('main_content'); ?>

<form class="formregister" action="<?php $this->url('login') ?>" method="POST">

	<p>
		<label for="pseudo">
			Pseudo :
		</label>
		<input type="text" 
			   name="pseudo" 
			   id="pseudo" 
			   value="<?php echo isset($datas['pseudo']) ? $datas['pseudo'] : '' ?>"/>
	</p>
	<p>
		<label for="password">
			Mot de passe :
		</label>
		<input type="password" name="password" id="password"/>
	</p>
	<p>
		<input type="submit" class="button" value="Me connecter"/>

		<a class="button" href="<?= $this->url('register') ?>" title="Accéder à la page d'inscription">
			Pas encore inscrit ?
		</a>
	</p>

</form>

<?php $this->stop('main_content'); ?>
