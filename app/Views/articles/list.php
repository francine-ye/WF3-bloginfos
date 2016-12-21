<?php $this->layout('layoutBo', ['title' => 'Liste des articles']) ?>

<?php $this->start('main_content');?>

<section id="tableau">
	<table>
		<tr>
			<th>Titre</th>
			<th>Contenu</th>
			<th>Auteur</th>
			<th>Catégorie</th>
			<th>Date création</th>
			<th>Utilisateur</th>
			<th>Image</th>
			<th>Actions</th>
		</tr>


		<?php
		foreach ($categoriesArticle as $category) :
		
		$img = $this->assetUrl('uploads/articles/' . $category['image']); ?>

		<tr>
			<td><?php echo $category['title'] ?></td>
			<td><a href="<?php echo $this->url('see_article', array('id'=>$category['id']))?>">Lire l'article</a></td>
			<td><?php echo $category['author'] ;?></td>
			<td><?php echo $category['id_category'] . '-' . $category['name'];;?></td>
			<td><?php echo $category['creation_date']; ?></td>
			<td>
				<?php if($category['id_user'] != null) { ?>
					<?php echo $category['id_user'] ?>
				<?php } else { echo 0; }?>
			</td>

			<td>
				<?php if($category['image'] != null) { ?>
					<img src="<?php echo $img ?>" >
				<?php } else { echo '...'; }?>
		
			</td>

			<td>
				<a href="<?php echo $this->url('delete_article', array('id'=>$category['id'])) ?>"><i class="fa fa-trash" aria-hidden="true"></i></a> / 
				<a href="<?php echo $this->url('edit_articles', array('id'=>$category['id'])) ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</section>
<section>
	<button><a href="<?php echo $this->url('add_articles')?>">Ajouter un article</a></button>
</section>

<?php $this->stop('main_content');?>