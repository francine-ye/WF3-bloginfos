<?php $this->layout('layout', ['title' => 'Contactez-nous']) ?>

<?php $this->start('main_content');?>

<form class="formregister" method="post" action="traitement-formulaire.php">

	<p>
		<label for="lastname">Nom :</label>
		<input type="text" name="lastname" id="lastname">
	</p>

	<p>
		<label for="firstname">Prénom :</label>
		<input type="text" name="firstname" id="firstname">
	</p>

	<p>
		<label for="message">Message :</label>
		<textarea  type="text" name="message" id="message"></textarea>
	</p>

	<p>
		<input type="submit" name="send" value="Ajouter">
	</p>
</form>


<?php $this->stop('main_content');?>