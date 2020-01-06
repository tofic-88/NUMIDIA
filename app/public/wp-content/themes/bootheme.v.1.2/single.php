<?php get_header(); ?>

<!-- <header class="container-fluid header-single-post">
    <div class="header-single-post-content">
        <h1><?php //the_title(); ?></h1>
        
    </div>
</header> -->
<!-- <p>Ceci est le fichier single.php qui montre le reste de contenu de cette article</p> -->
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron jumbotron-container">
  <div class="container">
    <h1 class="display-3"><?php the_title(); ?></h1>
    <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
    <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
  </div>
</div>



<div class="container">
<div class="row">

        <div class="col-sm-9 blog-main">

                <?php 
                if ( have_posts() ) { 
                    while ( have_posts() ) : the_post();
                ?>
                <div class="card-content">
                    <h2 class="blog-post-title"><?php the_title(); ?></h2>
                    <p class="blog-post-meta"><?php the_date(); ?> by <?php the_author(); ?></p>
                    <?php the_content(); ?>

                    <i style="color:red;">single.php</i>
                </div><!-- /.Card content -->
                <?php
                    endwhile;
                } 
                ?>

        </div><!-- /.blog-main -->



        <!-- THE SIDEBAR -->
        <div class="col-sm-3 sidebar-module">
                <?php get_sidebar('sidebar'); ?> 
        </div>




</div><!-- /.row -->

</div><!-- /.container -->

<?php get_footer(); ?>