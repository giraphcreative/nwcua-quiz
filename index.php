<?php
/**
 * The template for displaying Archive pages
 */

get_header(); 

?>

	<div class="wrap group content-wide" role="main">
		<?php 

		if ( have_posts() ) : 
		
			// Start the Loop.
			while ( have_posts() ) : the_post(); 
				?>
		<article>
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php the_excerpt(); ?>
		</article>
				<?php
			endwhile;

		endif;
		?>
	</div><!-- #primary -->


<?php

get_footer();

?>