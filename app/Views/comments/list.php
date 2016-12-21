<?php $this->layout('layoutBo', ['title' => 'La liste des commentaires']); ?>

<?php $this->start('main_content'); ?>

<section id="tableau">
	<table>
		
		<tr>
			<th> ID </th>
			<th> Contenu</th>
			<th> ID de l'utilisateur </th>
			<th> Nom de l'utilisateur </th>

			<th> ID Article </th>
			<th> Nom Article </th>
			<th> Date de création </th>
			<th> Date de modification </th>
			<th> Actions </th>
		</tr>

		<?php foreach ($commentBindArticles as $commentBindArticle) :?>
		<tr>
			<td><?php echo $commentBindArticle['id']; ?></td>
			<td id="wordwrap"><?php echo $commentBindArticle['content']; ?></td>
			<td><?php echo $commentBindArticle['id_user']; ?></td>
			<td><?php echo $commentBindArticle['pseudo']; ?></td>
			<td><?php echo $commentBindArticle['id_article']; ?></td>
			<td><?php echo $commentBindArticle['title']; ?></td>


			<td><?php echo $commentBindArticle['creation_date']; ?></td>
			<td><?php echo $commentBindArticle['modification_date']; ?></td>
			<td> 

				<a href="<?php echo $this->url('update_comment', array('id'=>$commentBindArticle['id'])) ?>"> <i class="fa fa-pencil" aria-hidden="true"></i></a> 

				<span> / </span>

				<a href="<?php echo $this->url('delete_comment', array('id'=>$commentBindArticle['id'])) ?>"> <i class="fa fa-trash" aria-hidden="true"></i>  </a> 
			</td>
		</tr>
		<?php endforeach; ?>


	</table>
</section>

<section>
	<button> <a href="<?php echo $this->url('add_comment') ;?> "> Ajouter un nouveau commentaire </a> </button>
</section>
<?php $this->stop('main_content'); ?>