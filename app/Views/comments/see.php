<?php $this->layout('layout', ['title' => 'Les commentaires']); ?>

<?php $this->start('main_content'); ?>

<style>
	th, td{
		width: 7rem;
		text-align: center;
	}
</style>

<table>
	<tr>
		<th> ID </th>
		<th> Contenu</th>
		<th> ID User </th>
		<th> ID Article </th>
		<th> Nom Article </th>
		<th> Date de création </th>
		<th> Date de modification </th>
		<th> Modifier </th>
		<th> Supprimer</th>
	</tr>
</table>

<table>
	<?php foreach ($commentsList as $comment) :?>
	<tr>
		<td><?php echo $comment['id']; ?></td>
		<td><?php echo $comment['content']; ?></td>
		<td><?php echo $comment['id_user']; ?></td>
		<td><?php echo $comment['id_article']; ?></td>
		<td><?php echo $comment['title']; ?></td>
		<td><?php echo $comment['creation_date']; ?></td>
		<td><?php echo $comment['modification_date']; ?></td>
		<td> <a href=""> Modifier  </a></td>
		<td> <a href=""> Supprimer  </a> </td>
	</tr>
	<?php endforeach; ?>
</table>


<?php $this->stop('main_content'); ?>	