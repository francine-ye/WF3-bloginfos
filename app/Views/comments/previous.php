<?php if(!empty($previousComments)) : ?>

<section class='loadPreviousComments'>
		<?php foreach ($previousComments as $previousComment) : ?>
			<p type="hidden" data-id="<?php echo $previousComment['id'] ?>">	</p>
			<p> <?php echo ($previousComment['pseudo']), $previousComment['creation_date'] ; ?> </p>
			<p id="commentContent"> <?php echo ($previousComment['content']); ?> </p> 
 
		<?php endforeach ; ?>
</section>

<?php endif ; ?>