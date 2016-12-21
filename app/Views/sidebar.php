<section id="sidebar">
			<aside >
			
				<h4 class="h4titlesidebar"> Liste des articles </h4>
				<?php foreach ($articlesSidebar as $articleSidebar) :?>
				<a class="test" href="<?php echo $this->url('see_article', array('id'=>$articleSidebar['id']))?>"><?php echo $articleSidebar['title']?></a>

				<?php endforeach;?>
			
			</aside>	

			<!-- <br>
			<br> -->
		
			 <aside >

			 <!-- meteo sidebar -->
			 	<ul id="meteo">
   
   				 </ul>


			 	<form class="forminscription" action="" method="post" target="">
					<p>Pour commentez <i class="fa fa-commenting-o" aria-hidden="true"></i> </p>
					 <p>Inscrivez-vous !</p>
					 
				 	<button>	
				 	<a href="<?php echo $this->url('login'); ?>" > Inscription</a>
				 	</button>

				 </form>
				 <br>
				
				<form class="form2" action="" method="post" target="">
						<!-- <p>Ajouter un article : </p> -->
					<i class="fa fa-wrench" aria-hidden="true"></i>
				 	<!--  -->

				 </form>
				
			</aside> 
			
		</section>

		<script
		src="https://code.jquery.com/jquery-2.2.4.js"
		integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
		crossorigin="anonymous"></script>
		<script type="text/javascript">
	
	// Affichage de la météo à partir d'une API JSON météo
	function meteo() {

	$.getJSON('http://www.prevision-meteo.ch/services/json/lat=46.259lng=5.235').done(function(data) {
		
		$('#meteo').append('<li>'+ data.current_condition.date + '</li>')
		.append('<li> <i class="fa fa-sun-o" aria-hidden="true"></i> Lever du soleil : '+ data.city_info.sunrise + '</li>')
		.append('<li> <i class="fa fa-moon-o" aria-hidden="true"></i> Coucher du soleil : '+ data.city_info.sunset + '</li>')
		.append('<li>'+ data.current_condition.condition + '</li>');

	});

};

meteo();

</script>