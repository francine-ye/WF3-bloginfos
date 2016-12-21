<?php if(!empty($previousArticles)) : ?>

<section class="article-block">
	<?php foreach ($previousArticles as $previousArticle) :
			$img = $this->assetUrl('uploads/articles/' . $previousArticle['image']); ?>

			    <article class="whiteShadow">  
		            <p><a href="<?php echo $this->url('see_article', array('id'=>$previousArticle['id']))?>"><?php echo $previousArticle['title'] ?></p>
		            <img src="<?php echo $img ;?>">
		            <p><?php echo (substr($previousArticle['content'], 0,500)) ; ?></p>
		            <p><a href="<?php echo $this->url('see_article', array('id'=>$previousArticle['id']))?>" class="readMore">Lire la suite...</a></p>
		        </article>

	<?php endforeach; ?>
	


</section> 

<?php endif ; ?>