<?php
// <head>  ---------------------------LOAD ALL RESSOURCES FILES WE NEED TO THIS PROJECT JUST LIKE HEAD SECTION IN HTML FILE------------------------
        function resources_files() {
            // BOOTSTRAP STYLES
            wp_register_style('bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
            wp_enqueue_style( 'bootstrap-style', get_stylesheet_uri(), array('bootstrap')); 
            // INCLUDING JQUERY FILE
            wp_deregister_script('jquery');
            wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.3.4.1.js', '', 3, true);
            add_action( 'wp_enqueue_scripts', 'jquery');
            // BOOTSTRAP AND JS SCRIPT
            wp_enqueue_script('bootstrap', get_template_directory_uri().'/bootstrap/js/bootstrap.min.js', array('jquery'), '', true );
            wp_enqueue_script('script', get_template_directory_uri().'/js/script.js', array('jquery'), 1.1, true );
            // MY FONT FROM GOOGLE FONT
            wp_enqueue_style('my_fonts', 'https://fonts.googleapis.com/css?family=Noto+Sans+SC|Passion+One&display=swap" rel="stylesheet  ');
            // MY STYLESHEET
            wp_enqueue_style('my_styles', get_stylesheet_uri());

            //this small code is for Quick Add Post Form AJAX to add a poste------------ we come back to understand it
            wp_localize_script('main_js', 'magicalData', array(
                'nonce' => wp_create_nonce('wp_rest'),
                'siteURL' => get_site_url()
            ));
            //--------------------------------------------
            
        }
        add_action('wp_enqueue_scripts', 'resources_files');
        // INCLUDING bootstrap-navwalker.php to handle menu in easy way
        require get_template_directory() . '/bootstrap-navwalker.php';
// </head>  ---------------------------------------------------------------------------------------------------------------------------------

// ALL CALL TO SUPPORT FUNCTION------------------------------------------------------------------------------------------------------------

        //CALL TO TITLE
        function bootstrapstarter_wp_setup() {
            add_theme_support( 'title-tag' );
        }
        add_action( 'after_setup_theme', 'bootstrapstarter_wp_setup' );

      
        //REGISTER MENU AND CREATE THE LOCATIONS
        register_nav_menus( array(
            'menu-1' => esc_html__( 'Primary', 'theme-textdomain' ),
            'menu-2' => esc_html__( 'Footer', 'theme-textdomain' )
        ) );
//---------------------------------------------------------------------------------------------------------------------------------------------
// ALL WEIGET TO HANDEL--------------------------------------------------------------------------------------------------------------------
        //REGISTER THE SIDEBAR
        function wpb_init_widgets() {
            register_sidebar( array(
            'name' => 'Sidebar',
            'id' => 'sidebar',
            'before_widget' => '<div>',
            'after_widget' => "</div>",
            'before_title' => '<div class="card-header bg-dark">',
            'after_title' => '</div>',
        ) );
        }
        add_action( 'widgets_init', 'wpb_init_widgets' );
//-------------------------------------------------------------------------------------------------------------------------------------------

// Costomize here some line -----------------------------------------------------------
// function add_section_bar(){
//     enqueue_block_styles_assets(  )
// }


?>

