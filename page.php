<?php

get_header();

?>

	<div id="content" class="wrap group content-wide" role="main">
			<?php 
			// do post loop
			if ( have_posts() ) :
				while ( have_posts() ) : the_post(); 
					the_content();
				endwhile;
			endif;
			?>
	</div><!-- #content -->
<?php

get_footer();

?>