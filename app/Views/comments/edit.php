<?php $this->layout('layoutBo', ['title' => 'Ajouter ou modifier un commentaire']); ?>

<?php $this->start('main_content'); ?>

<form method="POST">

	<input type="hidden" name="id" id="id" value="<?php echo (!empty($idComment)) ? $idComment : "" ?>">  

<p>
	<label for="content"> Commentaire : </label>
	<textarea type="text" name="content" id="content"><?php echo (!empty($datas['content'])) ? $datas['content'] : "" ?></textarea>
</p>
<p>
	<label for="id_user"> Utilisateur : </label>


	<select name="id_user" id="id_user">
		<option value=""></option>
		<?php foreach ($usersList as $userList) :?>
			<option <?php if (isset($datas['id_user']) && $datas['id_user'] === $userList['id'] ) {
				echo 'selected';	
			} ?> id="id_user" value="<?php echo $userList['id']; ?>" >  <?php echo $userList['pseudo']; ?>  </option>
		<?php endforeach; ?>
	</select>
</p>
<p>
	<label for="id_article"> Article  : </label>
	<select name="id_article" id="id_article">
		<option value=""></option>
		<?php foreach ($articlesList as $article) :?>
			<option <?php if (isset($datas['id_article']) && $datas['id_article'] === $article['id'] ) {
				echo 'selected';	
			} ?> id="id_article" value="<?php echo $article['id']; ?>" >  <?php echo $article['title']; ?>  </option>
		<?php endforeach; ?>
	</select>
</p>
<p>
	<label for="creation_date"> Date de création : </label>
	<input type="text" name="creation_date" id="creation_date" value="<?php echo (!empty($datas['creation_date'])) ? $datas['creation_date'] : "" ?>"/>

</p>
<p>
	<label for="modification_date"> Date de modification </label>
	<input type="text" name="modification_date" id="modification_date" value="<?php echo (!empty($datas['modification_date'])) ? $datas['modification_date'] : "" ?>" />
</p>	
	
	
	<input type="submit" name="send" value="Envoyer"/>
</form>

<?php $this->stop('main_content'); ?>