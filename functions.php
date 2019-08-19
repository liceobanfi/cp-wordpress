<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'twentyeleven-style', get_template_directory_uri() . '/style.css' );
 
}
?>
<?php
add_action( 'after_setup_theme', 'register_my_menu' );
function register_my_menu() {
  register_nav_menu( 'menu_1', __( 'Top Menu', 'theme-slug' ) );
}
?>
<?php add_image_size( 'twentyeleven-thumbnail-feature', 100, 100); ?>

<?php
/* ## REGISTRAZIONE DELLA SIDEBAR */
function my_custom_01_sidebar() 
{
	register_sidebar(
		array (
			'name' => __( 'Custom-01', 'twentyeleven' ),
			'id' => 'custom-01-side-bar',
			'description' => __( 'Custom 01 Sidebar', 'twentyeleven' ),
		)
	);
}
add_action( 'widgets_init', 'my_custom_01_sidebar' );

?>

<?php

add_action( 'after_setup_theme', 'remove_twentyeleven_body_classes' );

function remove_twentyeleven_body_classes() {
remove_filter( 'body_class', 'twentyeleven_body_classes' );
}

?>
