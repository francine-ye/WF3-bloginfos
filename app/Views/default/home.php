<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
<!-- 1 ere bloc d'information -->
<section class="section1">
                <h1 class="titlehome">L'actualité en temp réel</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.!</p>
                <a href="<?= $this->url('register') ?>" class="callToAction white"> Votre avis nous intéresse !</a>
</section>



<!-- 2eme bloc d'information -->

<section>
    
<article id="lastArticleReleasedHomePage">    
<?php foreach ($categoriesListMenu as $category) : ?>
<div id="lastArticleReleasedByCategoryHomePage">
   <h3 class="titlerubriquehome"> <?php echo $category['name'] ?> </h3>

<?php     
    $lastArticlesReleased = $articlesModel->lastArticleReleasedByCategory($category['id']);
    foreach ($lastArticlesReleased as $lastArticleReleased) : ?>
      <img class="imghomesize" src="<?php echo $this->assetUrl('uploads/articles/').$lastArticleReleased['image'] ?>" alt=""> 
      <h4><?php   echo( $lastArticleReleased['title']); ?> </h4>
      <p><?php  echo (substr($lastArticleReleased['content'], 0,500));  ?></p>

     <p><a class="readMoreHome" href="<?php echo $this->url('see_article', array('id'=>$lastArticleReleased['id']))?>">Lire la suite...</a></p>
     <?php endforeach; ?> 
</div> 
<?php endforeach ; ?>
</article>

   



</section>







<?php $this->stop('main_content') ?>
