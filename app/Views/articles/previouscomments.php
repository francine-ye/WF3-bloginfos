<?php if(!empty($previousComments)) :  ?>
<section class='commentsArticle'>
	<div class="comments">
		<?php foreach ($previousComments as $previousComment) : ?>
			<p type="hidden" data-id="<?php echo $previousComment['id'] ?>">	</p>
			<div id="commentPseudoCreationDate" >
				<img class="avatar" src="<?php echo$this->assetUrl('uploads/' . $previousComment['avatar']) ; ?>">

			<p class="white"><?php echo $previousComment['pseudo'].' / '. $previousComment['creation_date'] ;?></p>
			</div>
			<p id="commentContent"> <?php echo ($previousComment['content']); ?> </p> 
 
		<?php endforeach ; ?>
	</div>

</section>

<?php endif ; ?>