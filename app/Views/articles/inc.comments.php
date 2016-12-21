<?php 
	foreach ($commentsList as $comment) :  ?>

	<div>
	<p type="hidden" data-id="<?php echo $comment['id'] ?>">	</p>
	<p id="commentPseudoCreationDate">	<?php echo $comment['pseudo'], $comment['creation_date']  ;  ?>  </p>
	<p id="commentContent">	<?php echo $comment['content']; ?> </p>
	</div>
	

<?php endforeach ; ?>