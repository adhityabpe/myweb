<?php
/**
 * Custom header implementation
 */

function garden_care_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'garden_care_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1200,
		'height'                 => 220,
		'wp-head-callback'       => 'garden_care_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'garden_care_custom_header_setup' );

if ( ! function_exists( 'garden_care_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see garden_care_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'garden_care_header_style' );
function garden_care_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        .page-template-custom-home-page #header, #header {
			background-image:url('".esc_url(get_header_image())."');
			background-size: 100% 100%;
		}";
	   	wp_add_inline_style( 'garden-care-basic-style', $custom_css );
	endif;
}
endif; // garden_care_header_style