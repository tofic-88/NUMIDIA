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
            <img src="<?php echo get_theme_file_uri('images/1.png') ?>" alt="Numidia Web">
                 <!-- <div class="carousel-caption">
                    <h1>Los Angeles</h1>
                    <p>We had such a great time in LA!</p>
                </div> -->
            </div>
            <div class="carousel-item">
            <img src="<?php echo get_theme_file_uri('images/2.png') ?>" alt="Responsive design">
                 <!-- <div class="carousel-caption">
                    <h1>Bougie</h1>
                    <p>Ma ville de naissance oh Béjaia</p>
                </div> -->
            </div>
            <div class="carousel-item">
            <img src="<?php echo get_theme_file_uri('images/3.png') ?>" alt="Hosting web">
                 <!-- <div class="carousel-caption">
                    <h1>Rome</h1>
                    <p>Rome is historique city</p>
                </div> -->
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
    <h1>Don't imitate! but understand</h1>
    </div>
</section>







  














<!-- <div class="container">
        <div class="row"> -->
                <div class="ain-column">
                        <?php if (current_user_can('administrator')) : ?>
                        <div class="admin-quick-add">
                            <h3>Quick Add Post</h3><br>
                            <input type="text" name="title" placeholder="Title"><br>
                            <textarea name="content" placeholder="Content"></textarea><br>
                            <button id="quick-add-button">Create Post</button>
                        </div>
                        <?php endif; ?>
                </div>
        <!-- </div>
</div> -->


<div class="container">


<div class="row">



                <?php 
                if ( have_posts() ) { 
                    while ( have_posts() ) : the_post();
                ?>


                   

                    <div class="col-md-12">
                        <?php the_post_thumbnail('small-thumbnails'); ?>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <?php the_content(); ?>
                        <p><a class="btn btn-secondary" href="<?php the_permalink(); ?>" role="button">Lisez plus &raquo;</a></p>
                    </div>



                <?php
                    endwhile;
                } 
                ?>

                <!-- <nav>
                    <ul class="pager">
                        <li><?php next_posts_link('Previous'); ?></li>
                        <li><?php previous_posts_link('Next'); ?></li>
                    </ul>
                </nav> -->

            </div><!-- /.blog-main -->

            

         


            




</div><!-- /.row -->

</div><!-- /.container -->



<main role="main">

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron jumbotron-container">
  <div class="container">
    <h1 class="display-3">Bootheme.1.0</h1><i style="color:red;">index.php</i>
    <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
    <p><a class="btn btn-primary btn-lg" href="#" role="button">Get touche with us &raquo;</a></p>
  </div>
</div>

<div class="container">
  <!-- Example row of columns -->
  <div class="row">
    <div class="col-md-3">
      <h2>Hierarchy template WP</h2>
      <p>should give you some insight about WordPress theme files naming conventions and how WordPress chooses a certain file and not another:</p>
      <p><a class="btn btn-secondary" href="https://developer.wordpress.org/files/2014/10/Screenshot-2019-01-23-00.20.04.png" role="button">WordPress codex page Template Hierarchy &raquo;</a></p>
    </div>
    <div class="col-md-3">
      <h2>Heading</h2>
      <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
      <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
    </div>
    <div class="col-md-3">
      <h2>Heading</h2>
      <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
      <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
    </div>
    <div class="col-md-3">
    <h2>Heading</h2>
      <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
      <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
    </div>
  </div>

  <hr>

</div> <!-- /container -->

</main>

<footer class="container">
<p>&copy; Numidia 2019-2020</p>
</footer>



<?php get_footer(); ?>
