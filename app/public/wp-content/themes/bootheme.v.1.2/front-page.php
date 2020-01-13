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



<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron jumbotron-container">
  <div class="container">
    <h1 class="display-3">Qui nous sommes?</h1>
    <p>Une agence Web à Montréal spécialisé dans la création du site web sur mesure, utilisant les technologies les plus récent sur marché Wordpress</p>
  </div>
</div>

  <div class="container">
    <h2>Nos services</h2>
  </div>

<div class="container">

    <div class="d-flex bd-highlight">
                                    <?php //loop start here
                                    $infrontPosts = new WP_Query('cat=3&posts_per_page=3&orderby=title&order=ASC');

                                    if ($infrontPosts->have_posts()) : 
                                        while ($infrontPosts->have_posts()) : $infrontPosts->the_post( ); ?>
                                            <div class="p-2 flex-fill bd-highlight">
                                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>       
                                                    <?php the_excerpt(); ?>                      
                                            </div>
                                    <?php    endwhile;

                                    else: 
                                        // fallback no content
                                    endif;
                                        wp_reset_postdata();
                                    ?>

       
    </div>
</div>


<main role="main">

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron jumbotron-container">
  <div class="container">
    <h1 class="display-3">Besoin de site web?</h1>
    <!-- <i style="color:red;">front-page.php</i> -->
    <h4>Si vous cherchez à augmenter votre clientèle et avoir une place sur le web, veuillez nous contacter, nous sommes là pour vous aider!</h4>
    <p><a class="btn btn-primary btn-lg" href="#" role="button">Contactez nous &raquo;</a></p>
  </div>
</div>



</div> <!-- /container -->

</main>

<div class="container">
    <h2>Nos Clients</h2>
  </div>

<div class="container">
  <div class="row">

     <div class="col">
            <img src="<?php echo get_theme_file_uri('images/paris.jpg')  ?>" class="rounded" alt="Cinque Terre" width="100%">
            <h3>Codamark</h3>
            <p>making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, […]</p>
            <button type="button" class="btn btn-warning">visitez le site</button>
     </div>

     <div class="col">
           <img src="<?php echo get_theme_file_uri('images/paris.jpg')  ?>" class="rounded" alt="Cinque Terre" width="100%">
            <h3>ECF Montreal</h3>
            <p>making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, […]</p>
            <button type="button" class="btn btn-warning">visitez le site</button>
     </div>

     <div class="col">
          <img src="<?php echo get_theme_file_uri('images/paris.jpg')  ?>" class="rounded" alt="Cinque Terre" width="100%">
            <h3>Rabais Assure</h3>
            <p>making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, […]</p>
            <button type="button" class="btn btn-warning">visitez le site</button>
     </div>


  </div>
</div>










<footer class="container">
<p>&copy; Numidia 2019-2020</p>
</footer>



<?php get_footer(); ?>
