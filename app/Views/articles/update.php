<?php if ($w_user['status'] == 'admin') {

	$this->layout('layoutBo', ['title' => 'Ajout ou modification']); 

} else {

	$this->layout('layout', ['title' => 'Ajout ou modification']);
	
} ?>

<?php $this->start('main_content');?>


<form method="post" enctype="multipart/form-data">
	
	<input type="hidden" name="id" id="id" value="<?php echo (!empty($idArticle)) ? $idArticle : "" ?>" >

	<p>
		<label for="title">Titre :</label>
		<input type="text" name="title" id="title" value="<?php echo (!empty($datas['title'])) ?  $datas['title'] : ""; ?>">
	</p>

	<p>
		<label for="content">Contenu :</label>
		<textarea type="text" name="content" id="content"><?php echo (!empty($datas['content'])) ?  $datas['content'] : ""; ?></textarea>
	</p>

	<p>
		<label for="author">Auteur :</label>
		<input type="text" name="author" id="author" value="<?php echo (!empty($datas['author'])) ?  $datas['author'] : ""; ?>">
	</p>

	<p>
		<label for="author">Categorie :</label>
		<select class="boutton" name="id_category">
			<?php foreach($categoriesList as $category) : ?>

				<option <?php if(isset($datas['id_category']) && $datas['id_category'] === $category['id']) { echo 'selected'; }  ?> value="<?php echo $category['id']?>" >
				<?php echo $category['name']?></option>

			<?php endforeach ; ?> 
		</select>
	</p>

	<p>
		<label for="image">Image :</label>
		<input type="file" name="image" id="image"/>
	</p>

	<p>
		<input type="submit" name="send" value="Ajouter">
	</p>
</form>



<?php $this->stop('main_content');?>