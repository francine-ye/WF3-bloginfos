<?php function afficherData($champ, $datas) {
    // je vérifie qu'une valeur a bien été postée pour ce nom de champ
    // et si c'est le cas, j'affiche cette valeur
    echo (!empty($datas[$champ]) ? $datas[$champ] : '' ) ;
}

function afficherCheck( $valeurAttendue ,$datas) {
    
    // si on renseigné un sexe en POST et que la valeur entrée en POST est celle
    // qui est attendue par l'input radio, alors on veut cocher cet input
    echo (!empty($datas['sexe']) && $datas['sexe'] == $valeurAttendue) ? 'selected' : '';
} 

function isUserAdmin($data) {
	global $w_user;
	return $data['id'] != $w_user['id'];
}

?>

<?php $this->layout('layoutBo', ['title' =>'Ajouter et Modifier un utilisateur']) ?>

<?php $this->start('main_content'); ?>

<section id="sectionnage">
	<h2>Ajouter et Modifier un utilisateur</h2>
</section>


<form method="POST" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php afficherData('id',$datas); ?>">
	<!-- pseudo, email, password, sexe, avatar -->
	<p>
		<label for="pseudo">Pseudo :</label>
		<input type="text" name="pseudo" id="pseudo" 
			   placeholder="3 à 50 caractères"
			   value="<?php afficherData('pseudo',$datas); ?>"/>
	</p>
	<p>
		<label for="email">Email :</label>
		<input type="email" name="email" id="email" value="<?php afficherData('email',$datas); ?>"/>
		
	</p>
	<p>
		<label for="password">Mot de passe :</label>
		<input type="password" name="password" id="password" value="" />
		
	</p>
	<p>
		<label for="femme">Femme :</label>
		<select name="sexe">
			<option value="femme" <?php afficherCheck('femme',$datas); ?> >Femme</option>
			<option value="homme" <?php afficherCheck('homme',$datas); ?>>Homme</option>
		</select>
	</p>
	<p>
		<label for="avatar">Avatar :</label>
		<input type="file" name="avatar" id="avatar"/>
		
	</p>
	<p>
		<input type="submit" name="send" value="Enregistrer" />
	</p>
</form>

<?php $this->stop('main_content'); ?>
