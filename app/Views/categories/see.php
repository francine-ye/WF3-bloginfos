<?php $this->layout('layout', ['title' => $this->e($category['name'])]) ?>

<?php $this->start('main_content');?>

<?php $this->insert('sidebar', ['articlesSidebar' => $articles]); ?>


	<section class="article-block">
		<?php foreach ($articles as $article) : ?>
		
		    <article class="whiteShadow">
	                   
	            <p><a href="<?php echo $this->url('see_article', array('id'=>$article['id']))?>"><?php echo $article['title'] ?></p>

	            <img src="<?php echo  ($article['image'] != null) ? $this->assetUrl('uploads/articles/') . $article['image'] : "";?>">

	            <p><?php echo (substr($article['content'], 0,500)) ; ?></p>

	            <p><a href="<?php echo $this->url('see_article', array('id'=>$article['id']))?>" class="readMore">Lire la suite...</a></p>

	        </article>


		<?php endforeach; ?>

	</section>

		

	<script
			src="https://code.jquery.com/jquery-2.2.4.js"
			integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
			crossorigin="anonymous"></script>

	<script type="text/javascript">

		function infiniteScroll(){
			var categoryId = <?php echo $article['id_category'] ?>; 
			var offset = 6 ; 
			var homeUrl = '<?php echo $this->url('default_home'); ?>';

			$(window).scroll(function(){

					console.log($(window).scrollTop() + $(window).height());
					console.log($(document).height());

				if($(window).scrollTop() + $(window).height() >= $(document).height()){
					$.get(homeUrl+'/categorie/'+ categoryId + '/offset/' + offset, function(data){     
						if (data != '') {	
							$('.article-block:last').after(data);
							offset+= 6;
						};
					});

				}		

			});

		}

		infiniteScroll();
		

	</script>

		        
		</section>



		
	<?php $this->stop('main_content');?>