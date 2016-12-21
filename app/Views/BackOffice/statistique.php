<?php $this->layout('layoutBo', ['title' => 'Statistiques']) ; ?>


  <?php $this->start('main_content'); ?>
   <div class="row">
               
            </div>

            <div class="row">
                <!--quick info section -->
                <div class="col-lg-3">
                    <div class="alert alert-danger text-center">
                        <i class="fa fa-user fa-3x"  aria-hidden="true"></i> <b><?php echo implode ( $nbUser) ?> </b> Utilisateurs inscrits 

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="alert alert-success text-center">
                       <i class="fa fa-newspaper-o fa-3x" aria-hidden="true"></i> <b><?php echo implode($nbArticle) ?></b> Articles ajoutés 
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="alert alert-info text-center">
                        <i class="fa fa-commenting-o fa-3x" aria-hidden="true"></i></i><b><?php echo implode($nbComments) ?></b> Commentaires 

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="alert alert-warning text-center">
                        <i class="fa fa-file-o fa-3x" aria-hidden="true"></i><b> <?php echo implode($nbCategorie) ?>  </b> Catégories 
                    </div>
                </div>
                <!--end quick info section -->
            </div>

            <div class="row">
                <div class="col-lg-8" id="ColTableau">

                    <!--Simple table example -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i>Commentaire du jour
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12" id="ColTableau">
                                    <div class="table-responsive">

                                        <section id="tableauStats">
                                         <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>                                                
                            <th>Pseudo</th>
                            <th>Article</th>
                            <th>Categorie</th>
                            <th>Commentaire</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($commentsOfTheDay as $value) {

                            $urlDel = $this->url('delete_comment', array('id'=>$value['id']));
                            $urlModif = $this->url('update_comment', array('id'=>$value['id']));

                            $logodel='<i class="fa fa-trash" aria-hidden="true"></i>';
                            $logomodif='<i class="fa fa-pencil" aria-hidden="true"></i>';

                            echo '<tr>';
                            echo '<td>' . $value['id'] . '</td>';
                            echo '<td>' . $value['pseudo'] . '</td>';
                            echo '<td>' . $value['title'] . '</td>';
                            echo '<td>' . $value['name'] . '</td>';
                            echo '<td>' . $value['content'] . '</td>';
                            echo '<td>' . $value['creation_date'] . '</td>';
                            
                            echo "<td><a href= \"$urlDel\">".$logodel."</a><span> / </span><a href= \"$urlModif\">".$logomodif."</a></td>";
                            
                            echo '</tr>';
                        } ?>                                            

                    </tbody>
                </table>
                </section>
                                    </div>

                                </div>

                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!--End simple table example -->

                </div>

                <div class="col-lg-4">
                    <div class="panel panel-primary text-center no-boder">

                     <div class="panel-footer">
                            <span class="panel-eyecandy-title">L'article le plus commenté</span>
                        </div>

                        <div class="panel-body yellow">
                             <i class="fa fa-newspaper-o fa-3x" aria-hidden="true"></i>
                            <p> <?php echo $nbCommentaireByArticle ['title']  ?> avec  <span> <?php echo $nbCommentaireByArticle ['nombre de commentaire'] ?></span> commentaires</p>
                        </div>
                       
                    </div>
                    <div class="panel panel-primary text-center no-boder">
                     <div class="panel-footer">
                            <span class="panel-eyecandy-title">Nombre de commentaires publiés dans les dernières 24h</span>
                        </div>
                        <div class="panel-body blue">
                            <i class="fa fa-commenting-o fa-3x" aria-hidden="true"></i>
                        <p><?php echo implode($commentaireHier) ?> commentaires</p>
                        </div>
                       
                    </div>
                    <div class="panel-footer">
                    <span class="panel-eyecandy-title">Aujourd'hui, l'article le plus discuté est  </span>
                </div>
        
                <div class="panel panel-primary text-center no-boder">
                    <div class="panel-body green">
                    <i class="fa fa-pencil-square-o fa-3x"></i>
                   <p> <?php echo $ArticlePlusCommente['title'] ?>  avec <?php echo $ArticlePlusCommente['nombre de commentaire']  ?> commentaires</p>
                    </div>
                </div>
        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->
<?php $this->stop('main_content'); ?>
