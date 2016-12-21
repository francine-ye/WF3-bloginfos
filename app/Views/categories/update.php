<?php $this->layout('layoutBo', ['title' => 'Ajout ou modification']) ?>

<?php $this->start('main_content');?>

<form method="post">
	
	<input type="hidden" name="id" id="id" value="<?php echo (!empty($idCategory)) ? $idCategory : "" ?>" >

	<p>
		<label for="name">Nom de la catégorie :</label>
		<input type="text" name="name" id="name" value="<?php echo (!empty($datas['name'])) ?  $datas['name'] : ""; ?>">
	</p>

	<p>
		<input type="submit" name="send" value="Ajouter">
	</p>
</form>

<?php $this->stop('main_content');?>
