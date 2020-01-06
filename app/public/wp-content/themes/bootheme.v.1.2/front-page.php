<?php get_header(); ?>

    <div class="container-fluid slider-container">
        <div id="demo" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="<?php echo get_theme_file_uri('images/la.jpg') ?>" alt="Los Angeles">
                 <div class="carousel-caption">
                    <h1>Los Angeles</h1>
                    <p>We had such a great time in LA!</p>
                </div>
            </div>
            <div class="carousel-item">
            <img src="<?php echo get_theme_file_uri('images/chicago.jpg') ?>" alt="Chicago">
                 <div class="carousel-caption">
                    <h1>Bougie</h1>
                    <p>Ma ville de naissance oh Béjaia</p>
                </div>
            </div>
            <div class="carousel-item">
            <img src="<?php echo get_theme_file_uri('images/ny.jpg') ?>" alt="New York">
                 <div class="carousel-caption">
                    <h1>Rome</h1>
                    <p>Rome is historique city</p>
                </div>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>

        </div>
    </div>




<section class="lebas-carousel-container">
    <div class="lebas-carousel">
    <h1>Beautiful experience with deploy and Git</h1>
    </div>
</section>







  














<div class="container">
<div class="row">

        <div class="col-md-12">

                        <?php 
                        if ( have_posts() ) { 
                            while ( have_posts() ) : the_post();
                        ?>
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <?php the_content(); ?>
                                <!-- <p><a class="btn btn-secondary" href="<?php the_permalink(); ?>" role="button">Lisez plus &raquo;</a></p> -->
                        <?php
                            endwhile;
                        } ?>

                       <!--the posts by category         change it later to bootstrap column 2 box -->
                        <div class="the-posts-by-category-container clearfix">
                            <div class="the-posts-by-category-one">
                                    <?php //loop start here
                                    $opinionPosts = new WP_Query('cat=3&posts_per_page=3&orderby=title&order=ASC');

                                    if ($opinionPosts->have_posts()) : 
                                        while ($opinionPosts->have_posts()) : $opinionPosts->the_post( ); ?>

                                            <h2><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
                                            <?php the_excerpt(); ?>
                                    <?php    endwhile;

                                    else: 
                                        // fallback no content
                                    endif;
                                    wp_reset_postdata();
                                    ?>
                            </div>  

                            <div class="the-posts-by-category-last">
                                    <?php //loop start here
                                    $newsPosts = new WP_Query('cat=4&posts_per_page=3&orderby=title&order=ASC');

                                    if ($newsPosts->have_posts()) : 
                                        while ($newsPosts->have_posts()) : $newsPosts->the_post(); ?>

                                            <h2><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
                                            <?php the_excerpt(); ?>
                                    <?php    endwhile;

                                    else: 
                                        // fallback no content
                                    endif;
                                    wp_reset_postdata();
                                    ?>
                            </div> 
                            
                        </div>


        </div>

</div><!-- /.row -->

</div><!-- /.container -->



<main role="main">

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron jumbotron-container">
  <div class="container">
    <h1 class="display-3">Bootheme.1.0</h1><i style="color:red;">front-page.php</i>
    <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
    <p><a class="btn btn-primary btn-lg" href="#" role="button">Get touche with us &raquo;</a></p>
  </div>
</div>



  <hr>

</div> <!-- /container -->

</main>

<footer class="container">
<p>&copy; Numidia 2019-2020</p>
</footer>



<?php get_footer(); ?>
