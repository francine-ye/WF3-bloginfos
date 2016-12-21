<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootsrtap Free Admin Template - SIMINTA | Admin Dashboad Template</title>
    <!-- Core CSS - Include with every page -->
    <link href="<?php echo $this->assetUrl('/plugins/bootstrap/bootstrap.css'); ?>" rel="stylesheet" />
    <link href="<?php echo $this->assetUrl('/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet" />
    <link href="<?php echo $this->assetUrl('/plugins/pace/pace-theme-big-counter.css'); ?>" rel="stylesheet" />
    <link href="<?php echo $this->assetUrl('/css/style.css'); ?>" rel="stylesheet" />
    <link href="<?php echo $this->assetUrl('/css/main-style.css'); ?>" rel="stylesheet" />
    <link href="<?php echo $this->assetUrl('/css/styleBo.css'); ?>" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Page-Level CSS -->
    <link href="<?php echo $this->assetUrl('/plugins/morris/morris-0.4.3.min.css'); ?>" rel="stylesheet" />
   </head>
<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $this->url('statistique'); ?>">
                    <h1> BlogInfos Backoffice</h1>
                </a>
            </div>
            <!-- end navbar-header -->
             <!-- navbar-top-links -->
            <ul class="nav navbar-top-links navbar-right">
               

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-3x"></i>
                    </a>
                    <!-- dropdown user-->
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo $this->url('register'); ?>"><i class="fa fa-user fa-fw"></i>Profil de l'utilisateur</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo $this->url('logout'); ?>"><i class="fa fa-sign-out fa-fw"></i>Déconnexion</a>
                        </li>
                    </ul>
                    <!-- end dropdown-user -->
                </li>
                <!-- end main dropdown -->
            </ul>
            <!-- end navbar-top-links -->

        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="<?php echo $this->assetUrl('uploads/'. $w_user['avatar']) ?>" alt="">
                            </div>
                            <div class="user-info">
                                <div><strong><?php echo ($w_user['pseudo']) ?> </strong></div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>

                    <li class="selected">
                        <a href="<?php echo $this->url('default_home'); ?>"><i class="fa fa-home" aria-hidden="true"></i> Le Site </a>
                    </li>
                    <li class="selected">
                        <a href="<?php echo $this->url('statistique'); ?>"><i class="fa fa-percent" aria-hidden="true"></i> Statistiques</a>
                    </li>
                    <li>
                        <a href="<?php echo $this->url('users_list'); ?>"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Gestion des utilisateurs</a>
                    </li>
                     <li>
                        <a href="<?php echo $this->url('articles_list'); ?>"><i class="fa fa-file-o" aria-hidden="true"></i> Gestion des articles</a>
                    </li>
                    <li>
                        <a href="<?php echo $this->url('categories_list'); ?>"><i class="fa fa-globe" aria-hidden="true"></i> Gestion des catégories</a>
                    </li>
                    <li>
                        <a href="<?php echo $this->url('comments_list'); ?>"><i class="fa fa-commenting-o" aria-hidden="true"></i> Gestion des commentaires</a>
                    </li>
                  
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">

             <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $this->e($title)  ?></h1>
                </div>
                <!--End Page Header -->
            <section>
            <?php $fmsg->display(); ?>
            <?= $this->section('main_content') ?>
            </section>

            

    <!-- Core Scripts - Include with every page -->
    <script src="<?php echo $this->assetUrl('/plugins/jquery-1.10.2.js'); ?>"></script>
    <script src="<?php echo $this->assetUrl('/plugins/bootstrap/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo $this->assetUrl('/plugins/metisMenu/jquery.metisMenu.js'); ?>"></script>
    <script src="<?php echo $this->assetUrl('/plugins/pace/pace.js'); ?>"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="<?php echo $this->assetUrl('/plugins/morris/raphael-2.1.0.min.js'); ?>"></script>
    <script src="<?php echo $this->assetUrl('/plugins/morris/morris.js'); ?>"></script>
   

</body>

</html>
