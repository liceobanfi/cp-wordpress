<?php /* Template Name: s-fiorano */ ?>
<?php
/**
 * Template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

	/* CARICA l'HEADER ROSSO */
	get_header('rosso'); 
?>


		<div id="primary">
			<div id="content" role="main">
<h1 style="background-color:red;color:white;border:2px solid black;">[DEBUG] page-s-fiorano.php > custom page</h1>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->



<?php get_footer(); ?>
