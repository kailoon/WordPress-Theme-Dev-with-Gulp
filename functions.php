<?php
  /** Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
  */
if(!function_exists('wpdev_setup')){
  function wpdev_setup() {

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
    * Let WordPress manage the document title.
    * This theme does not use a hard-coded <title> tag in the document head,
    * WordPress will provide it for us.
    */
    add_theme_support( 'title-tag' );

    /*
    * Enable support for Post Thumbnails on posts and pages.
    *
    * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
    */
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1568, 9999 );

    /*
    * Switch default core markup for search form, comment form, and comments
    * to output valid HTML5.
    */
    add_theme_support(
      'html5',
      array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
        'navigation-widgets',
      )
    );

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    $logo_width  = 300;
    $logo_height = 100;

    add_theme_support(
      'custom-logo',
      array(
        'height'               => $logo_height,
        'width'                => $logo_width,
        'flex-width'           => true,
        'flex-height'          => true,
        'unlink-homepage-logo' => true,
      )
    );

    // Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

    // Add support for editor styles.
		add_theme_support( 'editor-styles' );
    $editor_stylesheet_path = './assets/css/style-editor.css';
    // Enqueue editor styles.
		add_editor_style( $editor_stylesheet_path );

    // Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => esc_html__( 'Small', 'wpdev' ),
					'shortName' => esc_html_x( 'S', 'Font size', 'wpdev' ),
					'size'      => 12,
					'slug'      => 'small',
				),
				array(
					'name'      => esc_html__( 'Normal', 'wpdev' ),
					'shortName' => esc_html_x( 'M', 'Font size', 'wpdev' ),
					'size'      => 16,
					'slug'      => 'normal',
				),
				array(
					'name'      => esc_html__( 'Large', 'wpdev' ),
					'shortName' => esc_html_x( 'L', 'Font size', 'wpdev' ),
					'size'      => 24,
					'slug'      => 'large',
				),
				array(
					'name'      => esc_html__( 'Extra large', 'wpdev' ),
					'shortName' => esc_html_x( 'XL', 'Font size', 'wpdev' ),
					'size'      => 36,
					'slug'      => 'extra-large',
				),
				array(
					'name'      => esc_html__( 'Huge', 'wpdev' ),
					'shortName' => esc_html_x( 'XXL', 'Font size', 'wpdev' ),
					'size'      => 64,
					'slug'      => 'huge',
				),
				array(
					'name'      => esc_html__( 'Gigantic', 'wpdev' ),
					'shortName' => esc_html_x( 'XXXL', 'Font size', 'wpdev' ),
					'size'      => 80,
					'slug'      => 'gigantic',
				),
			)
		);

    // Custom background color.
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'd1e4dd',
			)
		);

    // Editor color palette.
		$black      = 'hsl(0, 0%, 0%)';
		$dark_gray  = 'hsl(217, 21%, 20%)';
		$gray       = 'hsl(216, 15%, 26%)';
    $green      = "hsl(158, 26%, 86%)";
    $blue       = "hsl(196, 26%, 86%)";
    $purple     = "hsl(240, 26%, 86%)";
    $red        = "hsl(0, 26%, 86%)";
    $orange     = "hsl(28, 26%, 86%)";
    $yellow     = "hsl(46, 33%, 90%)";
    $white      = "hsl(0, 0%, 100%)";

    add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => esc_html__( 'Black', 'wpdev' ),
					'slug'  => 'black',
					'color' => $black,
				),
				array(
					'name'  => esc_html__( 'Dark gray', 'wpdev' ),
					'slug'  => 'dark-gray',
					'color' => $dark_gray,
				),
				array(
					'name'  => esc_html__( 'Gray', 'wpdev' ),
					'slug'  => 'gray',
					'color' => $gray,
				),
				array(
					'name'  => esc_html__( 'Green', 'wpdev' ),
					'slug'  => 'green',
					'color' => $green,
				),
				array(
					'name'  => esc_html__( 'Blue', 'wpdev' ),
					'slug'  => 'blue',
					'color' => $blue,
				),
				array(
					'name'  => esc_html__( 'Purple', 'wpdev' ),
					'slug'  => 'purple',
					'color' => $purple,
				),
				array(
					'name'  => esc_html__( 'Red', 'wpdev' ),
					'slug'  => 'red',
					'color' => $red,
				),
				array(
					'name'  => esc_html__( 'Orange', 'wpdev' ),
					'slug'  => 'orange',
					'color' => $orange,
				),
				array(
					'name'  => esc_html__( 'Yellow', 'wpdev' ),
					'slug'  => 'yellow',
					'color' => $yellow,
				),
				array(
					'name'  => esc_html__( 'White', 'wpdev' ),
					'slug'  => 'white',
					'color' => $white,
				),
			)
		);

    // Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom line height controls.
		add_theme_support( 'custom-line-height' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		// Add support for experimental cover block spacing.
		add_theme_support( 'custom-spacing' );

    // Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support( 'custom-units' );
  }
}
add_action('after_setup_theme','wpdev_setup');

// Set the content width in pixels, based on the theme's design and stylesheet.
function wpdev_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wpdev_content_width', 750 );
}
add_action( 'after_setup_theme', 'wpdev_content_width', 0 );

// Enqueue scripts and styles.
function wpdev_scripts(){
  wp_enqueue_style('wpdev-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get('Version'));

  // Threaded comment reply styles.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wpdev_scripts');

//  Calculate classes for the main <html> element.
function wpdev_the_html_classes() {
	$classes = apply_filters( 'wpdev_html_classes', '' );
	if ( ! $classes ) {
		return;
	}
	echo 'class="' . esc_attr( $classes ) . '"';
}