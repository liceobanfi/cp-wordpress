<?php /* Template Name: s-giorgio */ ?>
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

  //------------------------
  //IL NOME DELLA CATEGORIA
  //------------------------
  $template_parish = 'giorgio';
  
  //ottiene il nome della pagina
  $pagename = get_query_var('pagename');
  if ( !$pagename && $id > 0 ) {  
      // If a static page is set as the front page, $pagename will not be set. Retrieve it from the queried object  
      $post = $wp_query->get_queried_object();  
      $pagename = $post->post_name;  
  }
  //calcolo se ci si trova nella homepage per la categoria corrente
  $is_homepage = $pagename == 's-' . $template_parish;

	/* CARICA l'HEADER PERSONALIZZATO */
	get_header($template_parish);
?>


		<div id="primary">
			<div id="content" role="main">
      <h1 style="background-color:red;color:white;border:2px solid black;">[DEBUG] page-s-<?php echo $template_parish;?>.php > custom page</h1>

				<?php while ( have_posts() ) : the_post(); ?>

<?php

?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

  
		<?php
      //if this is a homepage, show all the posts in the cathegory
      if($is_homepage):
			$args = array(
    			'post_type' => 'post',
    			'post_status' => 'publish',
    			'category_name' => 's-' . $template_parish,
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
			<?php endif; ?>

			</div><!-- #content -->
		</div><!-- #primary -->



<?php //get_sidebar(); ?>
<?php get_sidebar($template_parish); ?>
<?php get_footer(); ?>




