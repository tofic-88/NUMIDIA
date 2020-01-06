<?php get_header(); ?>

<div class="container-fluid header-single-post">
    <div class="header-single-post-content">
        <h1><?php the_title(); ?></h1>
        <!-- <p>Ceci est le fichier single.php qui montre le reste de contenu de cette article</p> -->
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


        <i style="color:red;">page.php</i>
    </div><!-- /.Card content -->
    <?php
        endwhile;
    } 
    ?>

</div><!-- /.blog-main -->




<div class="col-sm-3 sidebar-module">

        <?php get_sidebar('sidebar'); ?> 

 </div>

















</div><!-- /.row -->

</div><!-- /.container -->

<?php get_footer(); ?>