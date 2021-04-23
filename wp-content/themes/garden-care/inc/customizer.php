<?php
/**
 * Garden Care: Customizer
 *
 * @subpackage Garden Care
 * @since 1.0
 */

use WPTRT\Customize\Section\Garden_Care_Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( Garden_Care_Button::class );

	$manager->add_section(
		new Garden_Care_Button( $manager, 'garden_care_pro', [
			'title'      => __( 'Garden Care Pro', 'garden-care' ),
			'priority'    => 0,
			'button_text' => __( 'Go Pro', 'garden-care' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/products/garden-wordpress-theme/', 'garden-care')
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'garden-care-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'garden-care-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

function garden_care_customize_register( $wp_customize ) {

	$wp_customize->add_setting('garden_care_show_site_title',array(
       'default' => true,
       'sanitize_callback'	=> 'garden_care_sanitize_checkbox'
    ));
    $wp_customize->add_control('garden_care_show_site_title',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Site Title','garden-care'),
       'section' => 'title_tagline'
    ));

    $wp_customize->add_setting('garden_care_show_tagline',array(
       'default' => true,
       'sanitize_callback'	=> 'garden_care_sanitize_checkbox'
    ));
    $wp_customize->add_control('garden_care_show_tagline',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Site Tagline','garden-care'),
       'section' => 'title_tagline'
    ));

	$wp_customize->add_panel( 'garden_care_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'garden-care' ),
	    'description' => __( 'Description of what this panel does.', 'garden-care' ),
	) );

	$wp_customize->add_section( 'garden_care_theme_options_section', array(
    	'title'      => __( 'General Settings', 'garden-care' ),
		'priority'   => 30,
		'panel' => 'garden_care_panel_id'
	) );

	$wp_customize->add_setting('garden_care_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'garden_care_sanitize_choices'
	));
	$wp_customize->add_control('garden_care_theme_options',array(
        'type' => 'radio',
        'label' => __('Do you want this section','garden-care'),
        'section' => 'garden_care_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','garden-care'),
            'Right Sidebar' => __('Right Sidebar','garden-care'),
            'One Column' => __('One Column','garden-care'),
            'Three Columns' => __('Three Columns','garden-care'),
            'Four Columns' => __('Four Columns','garden-care'),
            'Grid Layout' => __('Grid Layout','garden-care')
        ),
	));

	//Top Header
	$wp_customize->add_section( 'garden_care_top_header_section' , array(
    	'title'    => __( 'Top Header', 'garden-care' ),
		'priority' => null,
		'panel' => 'garden_care_panel_id'
	) );

	$wp_customize->add_setting('garden_care_topheader_text',array(
       	'default' => '',
       	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('garden_care_topheader_text',array(
	   	'type' => 'text',
	   	'label' => __('Add Text','garden-care'),
	   	'section' => 'garden_care_top_header_section',
	));

	$wp_customize->add_setting('garden_care_topheader_mail',array(
       	'default' => '',
       	'sanitize_callback'	=> 'sanitize_email'
	));
	$wp_customize->add_control('garden_care_topheader_mail',array(
	   	'type' => 'text',
	   	'label' => __('Add Email Address','garden-care'),
	   	'section' => 'garden_care_top_header_section',
	));

	$wp_customize->add_setting('garden_care_topheader_location',array(
       	'default' => '',
       	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('garden_care_topheader_location',array(
	   	'type' => 'text',
	   	'label' => __('Add Location','garden-care'),
	   	'section' => 'garden_care_top_header_section',
	));

	$wp_customize->add_setting('garden_care_topheader_facebook_url',array(
       	'default' => '',
       	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('garden_care_topheader_facebook_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Facebook URL','garden-care'),
	   	'section' => 'garden_care_top_header_section',
	));

	$wp_customize->add_setting('garden_care_topheader_twitter_url',array(
       	'default' => '',
       	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('garden_care_topheader_twitter_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Twitter URL','garden-care'),
	   	'section' => 'garden_care_top_header_section',
	));

	$wp_customize->add_setting('garden_care_topheader_youtube_url',array(
       	'default' => '',
       	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('garden_care_topheader_youtube_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Youtube URL','garden-care'),
	   	'section' => 'garden_care_top_header_section',
	));

	$wp_customize->add_setting('garden_care_topheader_instagram_url',array(
       	'default' => '',
       	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('garden_care_topheader_instagram_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Instagram URL','garden-care'),
	   	'section' => 'garden_care_top_header_section',
	));

	$wp_customize->add_setting('garden_care_topheader_pinterest_url',array(
       	'default' => '',
       	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('garden_care_topheader_pinterest_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Pinterest URL','garden-care'),
	   	'section' => 'garden_care_top_header_section',
	));

	//Bottom Header
	$wp_customize->add_section( 'garden_care_header_section' , array(
    	'title'    => __( 'Bottom Header', 'garden-care' ),
		'priority' => null,
		'panel' => 'garden_care_panel_id'
	) );

	$wp_customize->add_setting('garden_care_topheader_phone_no',array(
       	'default' => '',
       	'sanitize_callback'	=> 'garden_care_sanitize_phone_number'
	));
	$wp_customize->add_control('garden_care_topheader_phone_no',array(
	   	'type' => 'text',
	   	'label' => __('Add Phone Number','garden-care'),
	   	'section' => 'garden_care_header_section',
	));

	$wp_customize->add_setting('garden_care_topheader_timing',array(
       	'default' => '',
       	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('garden_care_topheader_timing',array(
	   	'type' => 'text',
	   	'label' => __('Add Timing','garden-care'),
	   	'section' => 'garden_care_header_section',
	));

	$wp_customize->add_setting('garden_care_getstarted_btn_text',array(
       	'default' => '',
       	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('garden_care_getstarted_btn_text',array(
	   	'type' => 'text',
	   	'label' => __('Add Get Started Button Text','garden-care'),
	   	'section' => 'garden_care_header_section',
	));

	$wp_customize->add_setting('garden_care_getstarted_btn_url',array(
       	'default' => '',
       	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('garden_care_getstarted_btn_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Get Started Button URL','garden-care'),
	   	'section' => 'garden_care_header_section',
	));

	//home page slider
	$wp_customize->add_section( 'garden_care_slider_section' , array(
    	'title'    => __( 'Slider Settings', 'garden-care' ),
		'priority' => null,
		'panel' => 'garden_care_panel_id'
	) );

	$wp_customize->add_setting('garden_care_slider_hide_show',array(
       	'default' => false,
       	'sanitize_callback'	=> 'garden_care_sanitize_checkbox'
	));
	$wp_customize->add_control('garden_care_slider_hide_show',array(
	   	'type' => 'checkbox',
	   	'label' => __('Show / Hide Slider','garden-care'),
	   	'section' => 'garden_care_slider_section',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'garden_care_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'garden_care_sanitize_dropdown_pages'
		));
		$wp_customize->add_control( 'garden_care_slider' . $count, array(
			'label' => __('Select Slider Image Page', 'garden-care' ),
			'description' => __('Image Size (300px x 350px)', 'garden-care' ),
			'section' => 'garden_care_slider_section',
			'type' => 'dropdown-pages'
		));
	}

	//Services Section
	$wp_customize->add_section('garden_care_services_section',array(
		'title'	=> __('Services Section','garden-care'),
		'description'=> __('This section will appear below the slider.','garden-care'),
		'panel' => 'garden_care_panel_id',
	));

	$wp_customize->add_setting('garden_care_services_text',array(
       	'default' => '',
       	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('garden_care_services_text',array(
	   	'type' => 'text',
	   	'label' => __('Add Section Text','garden-care'),
	   	'section' => 'garden_care_services_section',
	));

	$wp_customize->add_setting('garden_care_services_section_title',array(
       	'default' => '',
       	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('garden_care_services_section_title',array(
	   	'type' => 'text',
	   	'label' => __('Add Section Title','garden-care'),
	   	'section' => 'garden_care_services_section',
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_pst[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_pst[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('garden_care_service_category',array(
		'default' => 'select',
		'sanitize_callback' => 'garden_care_sanitize_choices',
	));
	$wp_customize->add_control('garden_care_service_category',array(
		'type' => 'select',
		'choices' => $cat_pst,
		'label' => __('Select Category to display Post','garden-care'),
		'section' => 'garden_care_services_section',
	));

	//Footer
    $wp_customize->add_section( 'garden_care_footer', array(
    	'title'  => __( 'Footer Text', 'garden-care' ),
		'priority' => null,
		'panel' => 'garden_care_panel_id'
	) );

    $wp_customize->add_setting('garden_care_footer_copy',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('garden_care_footer_copy',array(
		'label'	=> __('Footer Text','garden-care'),
		'section' => 'garden_care_footer',
		'setting' => 'garden_care_footer_copy',
		'type' => 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'garden_care_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'garden_care_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'garden_care_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'garden_care_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'garden-care' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'garden-care' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'garden_care_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'garden_care_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'garden_care_customize_register' );

function garden_care_customize_partial_blogname() {
	bloginfo( 'name' );
}

function garden_care_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function garden_care_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function garden_care_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}