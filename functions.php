<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'twentyeleven-style', get_template_directory_uri() . '/style.css' );
 
}
?>
<?php
#https://www.wpbeginner.com/wp-themes/how-to-add-custom-navigation-menus-in-wordpress-3-0-themes/
/* add_action( 'after_setup_theme', 'register_my_menu' ); */
/* function register_my_menu() { */
/*   register_nav_menu( 'menu_1', __( 'Top Menu', 'theme-slug' ) ); */
/* } */


function wpb_custom_new_menu() {
  register_nav_menus(
    array(
      's-anastasia-menu' => __( 'menu parrocchia s. anastasia' ),
      's-fiorano-menu' => __( 'menu parrocchia s. fiorano' ),
      's-giorgio-menu' => __( 'menu parrocchia s. giorgio' )
    )
  );
}
add_action( 'init', 'wpb_custom_new_menu' );

?>

<?php add_image_size( 'twentyeleven-thumbnail-feature', 100, 100); ?>

<?php

function register_custom_sidebar() {
    register_sidebar(
        array (
            'name' => __( 'barra laterale s. anastasia', 'twentyeleven' ),
            'id' => 'anastasia-side-bar',
            /* 'description' => __( 'Custom Sidebar', 'your-theme-domain' ), */
            /* 'before_widget' => '<div class="widget-content">', */
            /* 'after_widget' => "</div>", */
            /* 'before_title' => '<h3 class="widget-title">', */
            /* 'after_title' => '</h3>', */
        )
    );
    
    register_sidebar(
        array (
            'name' => __( 'barra laterale s. fiorano', 'twentyeleven' ),
            'id' => 'fiorano-side-bar',
          )
        );

    register_sidebar(
        array (
            'name' => __( 'barra laterale s. giorgio', 'twentyeleven' ),
            'id' => 'giorgio-side-bar',
          )
        );
}
add_action( 'widgets_init', 'register_custom_sidebar' );




/**
 * crea le index personalizzate
 *
 * */
function create_page_if_null($target, $title) {
    if( get_page_by_path($target) == NULL ) {
        create_pages_fly($title, $target);
    }
}
function check_pages_live(){
  create_page_if_null('s-anastasia', 'S. Anastasia');
  create_page_if_null('s-fiorano', 'S. Fiorano');
  create_page_if_null('s-giorgio', 'S. Giorgio');
    }
    add_action('init','check_pages_live');
    function create_pages_fly($pageName, $pageTitle) {
        $createPage = array(
          'post_title'    => $pageName,
          'post_content'  => ' <h1 style="background-color:red;color:white;border:2px solid black;">[DEBUG] functions.php> page dinamically generated</h1>',
          'post_status'   => 'publish',
          'post_author'   => 1,
          'post_type'     => 'page',
          'post_name'     => $pageTitle
        );

        // Insert the post into the database
        wp_insert_post( $createPage );
    }
  

    //il tema genitore ha una funzione che applica stili diversi a seconda che si stia usando il template 'sidepar-template' o no.
    //questo codice disattiva questa funzione, e ne attiva una nuova che si comporta  in modo simile ma che considera anche
    //le 3 pagine delle parrocchie come sidebar
    //
    //this is the incminated body class
    //single-author singular 
  function custom_twentyeleven_body_classes( $classes ) {

    if ( function_exists( 'is_multi_author' ) && ! is_multi_author() ) {
      $classes[] = 'single-author';
    }

    if ( is_singular() && ! is_home() && ! is_page_template( 'showcase.php' )
      && ! is_page_template( 'sidebar-page.php' )
      && ! is_page_template( 'page-s-anastasia' )
      && ! is_page_template( 'page-s-fiorano' )
      && ! is_page_template( 'page-s-giorgio' )) {
      $classes[] = 'singular';
    }

    return $classes;
  }
  function customize_twentyeleven_body_classes() {
    remove_filter( 'body_class', 'twentyeleven_body_classes' );
    /* add_filter( 'body_class', 'custom_twentyeleven_body_classes' ); */
  }
  add_action( 'after_setup_theme', 'customize_twentyeleven_body_classes' );

?>
