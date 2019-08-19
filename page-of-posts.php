<?php

/* 
Template Name: Page Of Posts
*/
/**
 * Main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 */

    get_header(); 
?>

<div id="primary">
	<div id="content" role="main">

		<?php
			$args = array(
    			'post_type' => 'post',
    			'post_status' => 'publish',
    			'category_name' => 'Battaglia',
    			'posts_per_page' => 5,
			);
			$arr_posts = new WP_Query( $args );
 
			if ( $arr_posts->have_posts() ) :
    			while ( $arr_posts->have_posts() ) :
        			$arr_posts->the_post();
        ?>
        		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            	<?php
            		if ( has_post_thumbnail() ) :
                		the_post_thumbnail();
            		endif;
            	?>

            	<header class="entry-header">
                	<h1 class="entry-title"><?php the_title(); ?></h1>
            	</header>
            	<div class="entry-content">
                	<?php the_excerpt(); ?>
                	<a href="<?php the_permalink(); ?>">Read More</a>
            	</div>
        		</article>
				<?php endwhile; ?>
			<?php endif; ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

 
