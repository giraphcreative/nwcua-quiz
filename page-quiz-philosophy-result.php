<?php

/*
Template Name: Quiz - Philosophy Results
*/

get_header();

$text_questions = 1;

?>

	<div id="content" class="group content-narrow quiz-results" role="main">
		<?php if ( isset( $_REQUEST['id'] ) ) { 
			$entry = GFAPI::get_entry( $_REQUEST['id'] );
			$upload_dir = wp_upload_dir();
			$total_questions = ceil( $entry['gquiz_score'] / ( $entry['gquiz_percent'] / 100 ) ) + $text_questions;
			?>
		<h2>Congratulations on completing the NWCUA’s Credit Union Philosophy Assessment!</h2>
		<h1>You answered <?php print $entry['gquiz_score'] + $text_questions ?> out of <?php print $total_questions ?> correctly.</h1>
		<p><a href="<?php print $upload_dir['baseurl'] ?>/certificates/<?php print $entry['id'] ?>.pdf"><img src="<?php bloginfo('template_url') ?>/img/button-certificate.png"></a></p>
		<?php } else { ?>
		Invalid request.
		<?php } ?>
	</div><!-- #content -->
<?php

get_footer();

?>