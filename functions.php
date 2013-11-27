<?php
/**
 * @package    ThemeName
 * @version    0.1.0
 * @author     Your Name <you@youremailprovider.com>
 * @copyright  Copyright (c) 2013, Your Name
 * @link       http://yoursite.com/themes/theme-slug
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/* Add the child theme setup function to the 'after_setup_theme' hook. */
add_action( 'after_setup_theme', 'themeslug_theme_setup' );

/**
 * Setup function.  All child themes should run their setup within this function.  The idea is to add/remove 
 * filters and actions after the parent theme has been set up.  This function provides you that opportunity.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function themeslug_theme_setup() {

	/*
	 * Add a custom background to overwrite the defaults.  Remove this section if you want to use 
	 * the parent theme defaults instead.
	 *
	 * @link http://codex.wordpress.org/Custom_Backgrounds
	 */
	add_theme_support(
		'custom-background',
		array(
			'default-color' => '2d2d2d',
			'default-image' => '%2$s/images/backgrounds/green.jpg',
		)
	);



	/* Filter to add custom default backgrounds (supported by the framework). */
	add_filter( 'hybrid_default_backgrounds', 'themeslug_default_backgrounds' );

	/* Add a custom default color for the "primary" color option. */
	add_filter( 'theme_mod_color_primary', 'themeslug_color_primary' );
}

/**
 * This works just like the WordPress `register_default_headers()` function.  You're just setting up an 
 * array of backgrounds.  The following backgrounds are merely examples from the parent theme.  Please 
 * don't use them.  Use your own backgrounds.  Or, remove this section (and the `add_filter()` call earlier) 
 * if you don't want to register custom backgrounds.
 *
 * @since  0.1.0
 * @access public
 * @param  array  $backgrounds
 * @return array
 */
function themeslug_default_backgrounds( $backgrounds ) {

	$new_backgrounds = array(
		'green' => array(
			'url'           => '%2$s/images/backgrounds/green.jpg',
			'thumbnail_url' => '%2$s/images/backgrounds/green-thumb.jpg',
		),
		
	);

	return array_merge( $new_backgrounds, $backgrounds );
}

/**
 * Add a default custom color for the theme's "primary" color option.  Users can overwrite this from the 
 * theme customizer, so we want to make sure to check that there's no value before returning our custom 
 * color.  If you want to use the parent theme's default, remove this section of the code and the 
 * `add_filter()` call from earlier.  Otherwise, just plug in the 6-digit hex code for the color you'd like 
 * to use (the below is the parent theme default).
 *
 * @since  0.1.0
 * @access public
 * @param  string  $hex
 * @return string
 */
function themeslug_color_primary( $hex ) {
	return $hex ? $hex : '111111';
}

    function load_fonts() {
            wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Copse');
            wp_enqueue_style( 'googleFonts');
        }
 
    add_action('wp_print_styles', 'load_fonts');

remove_action( 'after_setup_theme', 'stargazer_custom_header_setup', 15 );