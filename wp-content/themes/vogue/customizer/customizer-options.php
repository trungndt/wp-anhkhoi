<?php
/**
 * Defines customizer options
 *
 * @package Customizer Library Vogue
 */

function customizer_library_vogue_options() {
	
	$primary_color = '#F061A8';
	$secondary_color = '#EA1B82';
	
	$body_font_color = '#3C3C3C';
	$heading_font_color = '#000000';

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Stores all the panels to be added
	$panels = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;
    
	
	// Header Layout Options
	$section = 'vogue-header-section';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Header Options', 'vogue' ),
		'priority' => '30',
		'description' => __( '', 'vogue' )
	);
	
	$options['vogue-header-remove-topbar'] = array(
		'id' => 'vogue-header-remove-topbar',
		'label'   => __( 'Remove the Top Bar', 'vogue' ),
		'section' => $section,
		'type'    => 'checkbox',
		'default' => 0,
	);
	
	$options['vogue-header-menu-text'] = array(
		'id' => 'vogue-header-menu-text',
		'label'   => __( 'Menu Button Text', 'vogue' ),
		'section' => $section,
		'type'    => 'text',
		'default' => 'menu',
		'description' => __( 'This is the text for the mobile menu button', 'vogue' )
	);
	
	$options['vogue-header-search'] = array(
        'id' => 'vogue-header-search',
        'label'   => __( 'Hide Search', 'vogue' ),
        'section' => $section,
        'type'    => 'checkbox',
        'description' => __( 'Select this box to hide the site search', 'vogue' ),
        'default' => 0,
    );
    $options['vogue-header-hide-social'] = array(
        'id' => 'vogue-header-hide-social',
        'label'   => __( 'Hide Social Links', 'vogue' ),
        'section' => $section,
        'type'    => 'checkbox',
        'description' => __( 'Hide the social links in the header', 'vogue' ),
        'default' => 0,
    );
    
    
    // Slider Settings
    $section = 'vogue-slider-section';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Slider Options', 'vogue' ),
        'priority' => '35'
    );
    
    $choices = array(
        'vogue-slider-default' => __( 'Default Slider', 'vogue' ),
        'vogue-meta-slider' => __( 'Meta Slider', 'vogue' ),
        'vogue-no-slider' => __( 'None', 'vogue' )
    );
    $options['vogue-slider-type'] = array(
        'id' => 'vogue-slider-type',
        'label'   => __( 'Choose a Slider', 'vogue' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'vogue-slider-default'
    );
    $options['vogue-slider-cats'] = array(
        'id' => 'vogue-slider-cats',
        'label'   => __( 'Slider Categories', 'vogue' ),
        'section' => $section,
        'type'    => 'text',
        'description' => __( 'Enter the ID\'s of the post categories you want to display in the slider. Eg: "13,17,19" (no spaces and only comma\'s)<br /><a href="https://kairaweb.com/documentation/setting-up-the-default-slider/" target="_blank"><b>Follow instructions here</b></a>', 'vogue' )
    );
    $options['vogue-meta-slider-shortcode'] = array(
        'id' => 'vogue-meta-slider-shortcode',
        'label'   => __( 'Slider Shortcode', 'vogue' ),
        'section' => $section,
        'type'    => 'text',
        'description' => __( 'Enter the shortcode give by meta slider.', 'vogue' )
    );


	// Colors
	$section = 'colors';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Colors', 'vogue' ),
		'priority' => '80'
	);

	$options['vogue-primary-color'] = array(
		'id' => 'vogue-primary-color',
		'label'   => __( 'Primary Color', 'vogue' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $primary_color,
	);

	$options['vogue-secondary-color'] = array(
		'id' => 'vogue-secondary-color',
		'label'   => __( 'Secondary Color', 'vogue' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $secondary_color,
	);
    $options['vogue-upsell-header'] = array(
        'id' => 'vogue-upsell-header',
        'label'   => __( '', 'vogue' ),
        'section' => $section,
        'type'    => 'upsell',
        'description' => __( 'Premium now includes color settings for the header, navigation and footer', 'vogue' ),
    );

	// Font Options
	$section = 'vogue-typography-section';
	$font_choices = customizer_library_get_font_choices();

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Font Options', 'vogue' ),
		'priority' => '80'
	);

	$options['vogue-body-font'] = array(
		'id' => 'vogue-body-font',
		'label'   => __( 'Body Font', 'vogue' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $font_choices,
		'default' => 'Open Sans'
	);
	$options['vogue-body-font-color'] = array(
		'id' => 'vogue-body-font-color',
		'label'   => __( 'Body Font Color', 'vogue' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $body_font_color,
	);

	$options['vogue-heading-font'] = array(
		'id' => 'vogue-heading-font',
		'label'   => __( 'Heading Font', 'vogue' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $font_choices,
		'default' => 'Lato'
	);
	$options['vogue-heading-font-color'] = array(
		'id' => 'vogue-heading-font-color',
		'label'   => __( 'Heading Font Color', 'vogue' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $heading_font_color,
	);
	
	
	// Blog Settings
    $section = 'vogue-blog-section';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Blog Options', 'vogue' ),
        'priority' => '50'
    );
    
    $options['vogue-blog-title'] = array(
        'id' => 'vogue-blog-title',
        'label'   => __( 'Blog Page Title', 'vogue' ),
        'section' => $section,
        'type'    => 'text',
        'default' => 'Blog'
    );
    $options['vogue-blog-cats'] = array(
        'id' => 'vogue-blog-cats',
        'label'   => __( 'Exclude Blog Categories', 'vogue' ),
        'section' => $section,
        'type'    => 'text',
        'description' => __( 'Enter the ID\'s of the post categories you\'d like to EXCLUDE from the Blog, enter only the ID\'s with a minus sign (-) before them, separated by a comma (,)<br />Eg: "-13, -17, -19"<br />If you enter the ID\'s without the minus then it\'ll show ONLY posts in those categories.', 'vogue' )
    );
	
	
	// Footer Settings
    $section = 'vogue-footer-section';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Footer Layout Options', 'vogue' ),
        'priority' => '85'
    );
    
    $options['vogue-footer-bottombar'] = array(
        'id' => 'vogue-footer-bottombar',
        'label'   => __( 'Remove the Bottom Bar', 'vogue' ),
        'section' => $section,
        'type'    => 'checkbox',
        'description' => __( 'Click this to hide the bottom bar of the footer', 'vogue' ),
        'default' => 0,
    );
    $options['vogue-footer-hide-social'] = array(
        'id' => 'vogue-footer-hide-social',
        'label'   => __( 'Hide Social Links', 'vogue' ),
        'section' => $section,
        'type'    => 'checkbox',
        'description' => __( 'Hide the social links in the footer', 'vogue' ),
        'default' => 0,
    );
	
	
	// Site Text Settings
    $section = 'vogue-website-section';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Website Text', 'vogue' ),
        'priority' => '80'
    );
    
    $options['vogue-website-site-add'] = array(
        'id' => 'vogue-website-site-add',
        'label'   => __( 'Header Address', 'vogue' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( 'Cape Town, South Africa', 'vogue' ),
        'description' => __( 'This is the address in the header top bar and the social footer', 'vogue' )
    );
    $options['vogue-website-head-no'] = array(
        'id' => 'vogue-website-head-no',
        'label'   => __( 'Header Phone Number', 'vogue' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( 'Call Us: +2782 444 YEAH', 'vogue' ),
        'description' => __( 'This is the phone number in the header top bar', 'vogue' )
    );
    
    $options['vogue-website-error-head'] = array(
        'id' => 'vogue-website-error-head',
        'label'   => __( '404 Error Page Heading', 'vogue' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( 'Oops! <span>404</span>', 'vogue'),
        'description' => __( 'Enter the heading for the 404 Error page', 'vogue' )
    );
    $options['vogue-website-error-msg'] = array(
        'id' => 'vogue-website-error-msg',
        'label'   => __( 'Error 404 Message', 'vogue' ),
        'section' => $section,
        'type'    => 'textarea',
        'default' => __( 'It looks like that page does not exist. <br />Return home or try a search', 'vogue'),
        'description' => __( 'Enter the default text on the 404 error page (Page not found)', 'vogue' )
    );
    $options['vogue-website-nosearch-msg'] = array(
        'id' => 'vogue-website-nosearch-msg',
        'label'   => __( 'No Search Results', 'vogue' ),
        'section' => $section,
        'type'    => 'textarea',
        'default' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'vogue'),
        'description' => __( 'Enter the default text for when no search results are found', 'vogue' )
    );
	
	
	// Social Settings
    $section = 'vogue-social-section';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Social Links', 'vogue' ),
        'priority' => '80'
    );
    
    $options['vogue-social-email'] = array(
        'id' => 'vogue-social-email',
        'label'   => __( 'Email Address', 'vogue' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['vogue-social-skype'] = array(
        'id' => 'vogue-social-skype',
        'label'   => __( 'Skype Name', 'vogue' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['vogue-social-linkedin'] = array(
        'id' => 'vogue-social-linkedin',
        'label'   => __( 'LinkedIn', 'vogue' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['vogue-social-tumblr'] = array(
        'id' => 'vogue-social-tumblr',
        'label'   => __( 'Tumblr', 'vogue' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['vogue-social-flickr'] = array(
        'id' => 'vogue-social-flickr',
        'label'   => __( 'Flickr', 'vogue' ),
        'section' => $section,
        'type'    => 'text',
    );
    
    // Upsell Button
    $options['vogue-upsell-social'] = array(
        'id' => 'vogue-upsell-social',
        'label'   => __( '', 'vogue' ),
        'section' => $section,
        'type'    => 'upsell',
        'description' => __( 'Upgrade to get more social profile links', 'vogue' )
    );
	

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// Adds the panels to the $options array
	$options['panels'] = $panels;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// To delete custom mods use: customizer_library_remove_theme_mods();

}
add_action( 'init', 'customizer_library_vogue_options' );
