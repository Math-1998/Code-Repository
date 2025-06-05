<?php
if ( ! defined( 'WPB_VC_VERSION' ) ) {
	return;
}

// Setup VC as part of a theme
if ( function_exists( 'vc_set_as_theme' ) ) {
	vc_set_as_theme();
}

// Modify VC_Row for allowing skew contents
add_filter( 'vc_shortcode_output', 'rdtheme_vc_row_skew_output', 10 , 3 );
function rdtheme_vc_row_skew_output( $output, $class, $atts ){
	$shortcode = $class->getShortcode();

	// Check if skew content exists
	if ( $shortcode != 'vc_row' || !isset( $atts['el_class'] ) ) {
		return $output;
	}
	if ( strpos( $atts['el_class'], 'skew' ) === false ) {
		return $output;
	}

	// Build output
	$skew_output_before = $skew_output_after = '';

	$el_classes_array   = explode( " ", $atts['el_class'] );
	$skew_defaults      = array( 'skew-top', 'skew-bottom', 'skew-grey' );
	$skew_classes       = array_intersect( $skew_defaults, $el_classes_array );

	if ( in_array( 'skew-top', $skew_classes ) ) {
		if ( in_array( 'skew-grey', $skew_classes ) ) {
			$skew_img = RDTHEME_IMG_URL. 'skew-top-grey.png';
		}
		else {
			$skew_img = RDTHEME_IMG_URL. 'skew-top.png';
		}
		$skew_output_before = '<div class="vc_row rdtheme-skew-top" data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true"><img alt="skew" src="' . $skew_img . '" /></div><div class="vc_row-full-width vc_clearfix"></div>';
	}

	if ( in_array( 'skew-bottom', $skew_classes ) ) {
		if ( in_array( 'skew-grey', $skew_classes ) ) {
			$skew_img = RDTHEME_IMG_URL. 'skew-bottom-grey.png';
		}
		else {
			$skew_img = RDTHEME_IMG_URL. 'skew-bottom.png';
		}
		$skew_output_after = '<div class="vc_row rdtheme-skew-bottom" data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true"><img alt="skew" src="' . $skew_img . '" /></div><div class="vc_row-full-width vc_clearfix"></div>';
	}

	return $skew_output_before . $output . $skew_output_after;
}

// Disable layerslider_vc from search result page to fix js mess up
add_filter( 'vc_shortcode_output', 'rdtheme_layerslider_vc_output', 10 , 3 );
function rdtheme_layerslider_vc_output( $output, $class, $atts ){
	$shortcode = $class->getShortcode();

	if ( $shortcode == 'layerslider_vc' && is_search() ) {
		return '';
	}

	return $output;
}