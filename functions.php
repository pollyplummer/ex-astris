<?php
/**
 * @package    Ex Astris
 * @version    1.0.0
 * @author     Sarah Gooding <keepingcozy@gmail.com>
 * @copyright  Copyright (c) 2014, Sarah Gooding
 * @link       http://themehybrid.com/themes/ex-astris
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/* Add the child theme setup function to the 'after_setup_theme' hook. */
add_action( 'after_setup_theme', 'ex_astris_theme_setup' );

/**
 * @since  1.0.0
 * @access public
 * @return void
 */
function ex_astris_theme_setup() {

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
			'default-image' => '%2$s/images/backgrounds/mountain.jpg',
			'default-repeat'     => 'no-repeat',
			'default-position'   => 'center',
			'default-position-x' => 'center',
			'default-attachment' => 'fixed',

		)
	);


    /* Add suport for custom header but show none by default. */
    add_theme_support( 'custom-header', array( 'default-image' => '' ) );

	/* Filter to add custom default backgrounds (supported by the framework). */
	add_filter( 'hybrid_default_backgrounds', 'ex_astris_default_backgrounds' );

	/* Add a custom default color for the "primary" color option. */
	add_filter( 'theme_mod_color_primary', 'ex_astris_color_primary' );

    /* Add custom stylesheets. */
    add_action( 'wp_enqueue_scripts', 'ex_astris_enqueue_styles' );


}

/**
 * @since  1.0.0
 * @access public
 * @param  array  $backgrounds
 * @return array
 */
function ex_astris_default_backgrounds( $backgrounds ) {

	$new_backgrounds = array(
		'green' => array(
			'url'           => '%2$s/images/backgrounds/mountain.jpg',
			'thumbnail_url' => '%2$s/images/backgrounds/mountain-thumb.jpg',
		),

	);

	return array_merge( $new_backgrounds, $backgrounds );
}

/**
 * @since  1.0.0
 * @access public
 * @param  string  $hex
 * @return string
 */
function ex_astris_color_primary( $hex ) {
	return $hex ? $hex : '111111';
}


/**
* Loads custom stylesheets for the theme.
*
* @since  1.0.0
* @access public
* @return void
*/

function ex_astris_enqueue_styles() {
            wp_register_style('googleFonts', '//fonts.googleapis.com/css?family=Copse');
            wp_enqueue_style( 'googleFonts');
        }
