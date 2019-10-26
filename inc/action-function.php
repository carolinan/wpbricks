<?php
/**
 * Include all the actions callback functions.
 *
 * @package wpbricks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Function for the theme setup.
 */
if ( ! function_exists( 'wpbricks_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wpbricks_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on wpbricks, use a find and replace
		 * to change 'wpbricks' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'wpbricks', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'header-menu' => __( 'Primary', 'wpbricks' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Theme support for custom logo.
		add_theme_support( 'custom-logo', array(
			'height'      => 240,
			'width'       => 250,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( '.site-title', 'site-description' ),
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'wpbricks_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}

endif;

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wpbricks_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wpbricks_content_width', 640 );
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wpbricks_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Sidebar', 'wpbricks' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add Sidebar widgets here.', 'wpbricks' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer-1', 'wpbricks' ),
		'id'            => 'footer_sidebar-1',
		'description'   => __( 'add first widget of footer', 'wpbricks' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer-2', 'wpbricks' ),
		'id'            => 'footer_sidebar-2',
		'description'   => __( 'add second widget of footer', 'wpbricks' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer-3', 'wpbricks' ),
		'id'            => 'footer_sidebar-3',
		'description'   => __( 'add third widget of footer', 'wpbricks' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer-4', 'wpbricks' ),
		'id'            => 'footer_sidebar-4',
		'description'   => __( 'add fourth widget of footer', 'wpbricks' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

/**
 * Enqueue scripts and styles.
 */
function wpbricks_scripts() {

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array() );
	wp_enqueue_style( 'fontawesome-css', get_template_directory_uri() . '/css/all.css', array() );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array() );
	wp_enqueue_style( 'wpbricks-google-fonts', 'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700', false );

	wp_enqueue_script( 'wpbricks-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'wpbricks-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'wpbricks-script', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), 1.1, true );

	wp_enqueue_style( 'wpbricks-style', get_stylesheet_uri() );

	wp_enqueue_style( 'wpbricks-media-css', get_template_directory_uri() . '/media.css', array() );
}

/**
 * Registers an editor stylesheet for the theme and enqueue scripts and styles for backend.
 */
function wpbricks_theme_add_editor_styles() {
	add_editor_style( 'custom-editor-style.css' );
	wp_enqueue_style( 'wpbricks-admin-settings-css', get_template_directory_uri() . '/css/wpbricks-admin-settings.css', array() );
	wp_enqueue_script( 'wpbricks-admin-settings-js', get_template_directory_uri() . '/js/wpbricks-admin-settings.js', array(), '20151215', true );
}

if ( ! function_exists( 'wp_body_open' ) ) {
	/**
	 * Shim for wp_body_open, ensuring backwards compatibility with versions of WordPress older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/47891
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

if ( ! function_exists( 'wpbricks_skip_link' ) ) {
	/**
	 * Include a skip to content link at the top of the page so that users can bypass the menu.
	 */
	function wpbricks_skip_link() {
		echo '<a class="skip-link screen-reader-text" href="#content">' . esc_html__( 'Skip to content', 'wpbricks' ) . '</a>';
	}
	add_action( 'wp_body_open', 'wpbricks_skip_link', 5 );
}

/**
 * Page added sticky header option.
 */
function wpbricks_add_page_sticky_header_setting_function() {

	$post_type = array( 'post', 'page' );

	if ( get_theme_mod( 'bricks_page_header_setting' ) ) {

		// add meta box for sticky header.
		add_meta_box( 'header-sticky-setting', __( 'Header Sticky Setting', 'wpbricks' ), 'wpbricks_add_page_sticky_header_setting_callback', $post_type, 'side', 'low' );

		// add meta box for header transparent.
		add_meta_box( 'header-transparent-setting', __( 'Header Transparent Setting', 'wpbricks' ), 'wpbricks_add_page_header_transparent_setting_callback', $post_type, 'side', 'low' );

	}

}

add_action( 'add_meta_boxes', 'wpbricks_add_page_sticky_header_setting_function' );

/**
 * Sticky header callback function.
 */
function wpbricks_add_page_sticky_header_setting_callback( $post ) {
	$sticky_status = get_post_meta( $post->ID, '_stick_header', true );
	if ( empty( $sticky_status ) ) {
		$sticky_status = 'Yes';
	}
	wp_nonce_field( '_sticky_header_settings_nonce', 'wpbricks_meta_nonce' );

	?>
	<div class="sticky-header">
		<div>
			<input type="radio" id="yes" name="stick_header" value="Yes" <?php if ( 'Yes' === $sticky_status ) {
				echo 'checked';
			} ?> />
			<label for="yes"><?php esc_html_e( 'Yes', 'wpbricks' ); ?></label>
		</div>
		<div>
			<input type="radio" id="no" name="stick_header" value="No" <?php if ( 'No' === $sticky_status ) {
				echo 'checked';
			} ?> />
			<label for="no"><?php esc_html_e( 'No', 'wpbricks' ); ?></label>
		</div>
	</div>
	<?php
}

/**
 * Transparent header callback function.
 */
function wpbricks_add_page_header_transparent_setting_callback( $post ) {
	$transparent_status = get_post_meta( $post->ID, '_header_transparent', true );
	if ( empty( $transparent_status ) ) {
		$transparent_status = 'Yes';
	}

	?>
	<div class="transparent-header">
		<div>
			<input type="radio" id="s_yes" name="header_transparent"
				value="Yes" <?php if ( 'Yes' === $transparent_status ) {
				echo 'checked';
			} ?> />
			<label for="s_yes"><?php esc_html_e( 'Yes', 'wpbricks' ); ?></label>
		</div>
		<div>
			<input type="radio" id="s_no" name="header_transparent"
				value="No" <?php if ( 'No' === $transparent_status ) {
				echo 'checked';
			} ?> />
			<label for="s_no"><?php esc_html_e( 'No', 'wpbricks' ); ?></label>
		</div>
	</div>
	<?php
}

/**
 * Sticky header values save in post meta.
 */
function wpbricks_save_add_page_sticky_header_meta_box_data( $post_id ) {
	$sticky_header      = filter_input( INPUT_POST, 'stick_header', FILTER_SANITIZE_STRING );
	$header_transparent = filter_input( INPUT_POST, 'header_transparent', FILTER_SANITIZE_STRING );

	if ( 'No' === $sticky_header ) {
		$header_transparent = 'No';
	}

	// Check if our nonce is set and verify that the nonce is valid.
	if ( ! isset( $_POST['wpbricks_meta_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['wpbricks_meta_nonce'] ), '_sticky_header_settings_nonce' ) ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' === $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}
	} else {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	// Sticky header and transparent header value set condition.
	if ( isset( $sticky_header ) || isset( $header_transparent ) ) {
		update_post_meta( $post_id, '_stick_header', sanitize_text_field( wp_unslash( $sticky_header ) ) );
		update_post_meta( $post_id, '_header_transparent', sanitize_text_field( wp_unslash( $header_transparent ) ) );
	}
}

add_action( 'save_post', 'wpbricks_save_add_page_sticky_header_meta_box_data' );

function wpbricks_sticky_header_info() {
	global $post;
	$header_setting             = '';
	$page_header_sticky         = ! empty( $post ) ? get_post_meta( $post->ID, '_stick_header', true ) : '';
	$page_header_transparent    = ! empty( $post ) ? get_post_meta( $post->ID, '_header_transparent', true ) : '';
	$wpbricks_page_header_setting = get_theme_mod( 'bricks_page_header_setting', '0' );
	if ( ! empty( $wpbricks_page_header_setting ) ) {
		if ( empty( $page_header_sticky ) && empty( $page_header_transparent ) ) {
			$page_header_sticky = $page_header_transparent = 'Yes';
		}
		$header_setting .= ( 'Yes' === $page_header_sticky ) ? 'sticky-header ' : '';
		$header_setting .= ( 'Yes' === $page_header_transparent ) ? 'transparent-header' : '';
	} elseif ( get_theme_mod( 'bricks_header_sticky', '0' ) ) {
		$header_setting .= 'sticky-header ';
		$header_setting .= ( get_theme_mod( 'bricks_header_transparent', '0' ) ) ? 'transparent-header' : '';
	} else {
		$header_setting .= '';
	}

	return $header_setting;
}
