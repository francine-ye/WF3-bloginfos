<?php $this->layout('layoutBo', ['title' => 'Liste des catégories']) ?>

<?php $this->start('main_content');?>

<section id="tableau">
	<table>

		<tr>
			<th>Nom</th>
			<th>Actions</th>
			
		</tr>

	<?php
		foreach ($categoriesList as $category) :
		?>
		<tr>
			<td><?php echo $category['name'] ?></td>

			<td>
				<a href="<?php echo $this->url('delete_category', array('id'=>$category['id'])) ?>"><i class="fa fa-trash" aria-hidden="true"></i></a> / 
				<a href="<?php echo $this->url('update_category', array('id'=>$category['id'])) ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
			</td>

		</tr>
		<?php endforeach; ?>
	</table>
</section>
<section>
	<button><a href="<?php echo $this->url('add_category')?>">Ajouter une catégorie</a></button>
</section>

<?php $this->stop('main_content');?>