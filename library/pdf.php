<?php


include('tcpdf/tcpdf.php'); 
include('fpdi/fpdi.php'); 


function generate_philosophy_certificate( $confirmation, $form, $entry, $ajax ) {

	// print_r( $entry ); die;
	if ( $entry['gquiz_is_pass'] ) {

		$upload_dir = wp_upload_dir();

		// initiate FPDI 
		$pdf = new FPDI(); 
		
		// set the sourcefile 
		$pdf->setSourceFile( get_template_directory() . '/library/certificate.pdf'); 

		// import page 1 
		$tplIdx = $pdf->importPage(1); 

		// get the width and height of the template
		$specs = $pdf->getTemplateSize($tplIdx);
		
		// add a page 
		$pdf->AddPage( "L", array( $specs['w'], $specs['h'] ) ); 

		// use the imported page as the template 
		$pdf->useTemplate( $tplIdx, 0, 0 ); 

		// now write some text above the imported page 
		$pdf->SetY( 101 ); 
		$pdf->SetFont( "dejavuserifbi", 'I', 35 ); 
		$pdf->SetTextColor( 0, 54, 99 ); 
		$text = $entry['2.3'] . " " . $entry['2.6'];
		$pdf->MultiCell( 260, 40, $text, 0, 'C' );

		// now write some text above the imported page 
		$pdf->SetY( 165 ); 
		$pdf->SetFont( "dejavuserifbi", 'I', 22 ); 
		$pdf->SetTextColor( 0, 54, 99 ); 
		$text = date( 'F j, Y' );
		$pdf->MultiCell( 260, 22, $text, 0, 'C' );

		// save the pdf out to file
		$pdf->Output( $upload_dir['basedir'] . '/certificates/' . $entry['id'] . '.pdf', 'F');

	}

	return array( 'redirect' => '/philosophy-results/?id=' . $entry['id'] );

}

add_filter( 'gform_confirmation_1', 'generate_philosophy_certificate', 10, 4 );


?>