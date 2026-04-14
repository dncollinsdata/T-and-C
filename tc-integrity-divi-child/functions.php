<?php
/**
 * T&C Integrity & Reliable - Divi Child Theme Functions
 *
 * @package TC_Integrity_Divi_Child
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'TC_CHILD_VERSION', '1.0.0' );
define( 'TC_CHILD_DIR', get_stylesheet_directory() );
define( 'TC_CHILD_URI', get_stylesheet_directory_uri() );

/**
 * Enqueue parent and child theme styles plus custom assets.
 */
function tc_enqueue_styles() {
	// Parent Divi style
	wp_enqueue_style(
		'divi-parent-style',
		get_template_directory_uri() . '/style.css',
		array(),
		et_get_theme_version()
	);

	// Child theme style
	wp_enqueue_style(
		'tc-child-style',
		get_stylesheet_uri(),
		array( 'divi-parent-style' ),
		TC_CHILD_VERSION
	);

	// Custom brand styles
	wp_enqueue_style(
		'tc-custom-styles',
		TC_CHILD_URI . '/assets/css/custom-styles.css',
		array( 'tc-child-style' ),
		TC_CHILD_VERSION
	);

	// Google Fonts — Montserrat (headings) + Open Sans (body)
	wp_enqueue_style(
		'tc-google-fonts',
		'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800;900&family=Open+Sans:wght@400;500;600;700&display=swap',
		array(),
		null
	);

	// Custom JavaScript
	wp_enqueue_script(
		'tc-custom-scripts',
		TC_CHILD_URI . '/assets/js/custom-scripts.js',
		array( 'jquery' ),
		TC_CHILD_VERSION,
		true
	);

	// Localize script with theme data
	wp_localize_script( 'tc-custom-scripts', 'tcData', array(
		'ajaxUrl'  => admin_url( 'admin-ajax.php' ),
		'themeUrl' => TC_CHILD_URI,
		'nonce'    => wp_create_nonce( 'tc_nonce' ),
	));
}
add_action( 'wp_enqueue_scripts', 'tc_enqueue_styles' );

/**
 * Enqueue admin styles for the backend.
 */
function tc_admin_styles() {
	wp_enqueue_style(
		'tc-admin-styles',
		TC_CHILD_URI . '/assets/css/admin-styles.css',
		array(),
		TC_CHILD_VERSION
	);
}
add_action( 'admin_enqueue_scripts', 'tc_admin_styles' );

/**
 * Register navigation menus.
 */
function tc_register_menus() {
	register_nav_menus( array(
		'primary-menu'  => __( 'Primary Menu', 'tc-integrity-divi-child' ),
		'footer-menu'   => __( 'Footer Menu', 'tc-integrity-divi-child' ),
		'services-menu' => __( 'Services Menu', 'tc-integrity-divi-child' ),
	));
}
add_action( 'init', 'tc_register_menus' );

/**
 * Register widget areas.
 */
function tc_register_sidebars() {
	register_sidebar( array(
		'name'          => __( 'Footer Column 1', 'tc-integrity-divi-child' ),
		'id'            => 'footer-col-1',
		'description'   => __( 'Footer widget area — column 1.', 'tc-integrity-divi-child' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));

	register_sidebar( array(
		'name'          => __( 'Footer Column 2', 'tc-integrity-divi-child' ),
		'id'            => 'footer-col-2',
		'description'   => __( 'Footer widget area — column 2.', 'tc-integrity-divi-child' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));

	register_sidebar( array(
		'name'          => __( 'Footer Column 3', 'tc-integrity-divi-child' ),
		'id'            => 'footer-col-3',
		'description'   => __( 'Footer widget area — column 3.', 'tc-integrity-divi-child' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));

	register_sidebar( array(
		'name'          => __( 'CTA Sidebar', 'tc-integrity-divi-child' ),
		'id'            => 'cta-sidebar',
		'description'   => __( 'Call-to-action sidebar for service pages.', 'tc-integrity-divi-child' ),
		'before_widget' => '<div id="%1$s" class="widget tc-cta-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	));
}
add_action( 'widgets_init', 'tc_register_sidebars' );

/**
 * Add custom body classes.
 */
function tc_body_classes( $classes ) {
	$classes[] = 'tc-integrity-theme';

	if ( is_front_page() ) {
		$classes[] = 'tc-homepage';
	}

	if ( is_page_template() ) {
		$classes[] = 'tc-custom-template';
	}

	return $classes;
}
add_filter( 'body_class', 'tc_body_classes' );

/**
 * Customize the excerpt length.
 */
function tc_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'tc_excerpt_length' );

/**
 * Custom excerpt read more link.
 */
function tc_excerpt_more( $more ) {
	return '&hellip; <a class="tc-read-more" href="' . esc_url( get_permalink() ) . '">' . __( 'Read More', 'tc-integrity-divi-child' ) . '</a>';
}
add_filter( 'excerpt_more', 'tc_excerpt_more' );

/**
 * Add theme support features.
 */
function tc_theme_support() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	));
	add_theme_support( 'custom-logo', array(
		'height'      => 120,
		'width'       => 300,
		'flex-height' => true,
		'flex-width'  => true,
	));

	// Custom image sizes for services
	add_image_size( 'tc-service-thumb', 600, 400, true );
	add_image_size( 'tc-hero-image', 1920, 800, true );
	add_image_size( 'tc-team-photo', 400, 400, true );
}
add_action( 'after_setup_theme', 'tc_theme_support' );

/**
 * Register Custom Post Type: Services
 */
function tc_register_services_cpt() {
	$labels = array(
		'name'               => __( 'Services', 'tc-integrity-divi-child' ),
		'singular_name'      => __( 'Service', 'tc-integrity-divi-child' ),
		'menu_name'          => __( 'Services', 'tc-integrity-divi-child' ),
		'add_new'            => __( 'Add New Service', 'tc-integrity-divi-child' ),
		'add_new_item'       => __( 'Add New Service', 'tc-integrity-divi-child' ),
		'edit_item'          => __( 'Edit Service', 'tc-integrity-divi-child' ),
		'new_item'           => __( 'New Service', 'tc-integrity-divi-child' ),
		'view_item'          => __( 'View Service', 'tc-integrity-divi-child' ),
		'search_items'       => __( 'Search Services', 'tc-integrity-divi-child' ),
		'not_found'          => __( 'No services found', 'tc-integrity-divi-child' ),
		'not_found_in_trash' => __( 'No services found in trash', 'tc-integrity-divi-child' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'has_archive'        => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_rest'       => true,
		'menu_position'      => 5,
		'menu_icon'          => 'dashicons-hammer',
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
		'rewrite'            => array( 'slug' => 'services' ),
	);

	register_post_type( 'tc_service', $args );
}
add_action( 'init', 'tc_register_services_cpt' );

/**
 * Register Custom Post Type: Testimonials
 */
function tc_register_testimonials_cpt() {
	$labels = array(
		'name'               => __( 'Testimonials', 'tc-integrity-divi-child' ),
		'singular_name'      => __( 'Testimonial', 'tc-integrity-divi-child' ),
		'menu_name'          => __( 'Testimonials', 'tc-integrity-divi-child' ),
		'add_new'            => __( 'Add New Testimonial', 'tc-integrity-divi-child' ),
		'add_new_item'       => __( 'Add New Testimonial', 'tc-integrity-divi-child' ),
		'edit_item'          => __( 'Edit Testimonial', 'tc-integrity-divi-child' ),
		'new_item'           => __( 'New Testimonial', 'tc-integrity-divi-child' ),
		'view_item'          => __( 'View Testimonial', 'tc-integrity-divi-child' ),
		'search_items'       => __( 'Search Testimonials', 'tc-integrity-divi-child' ),
		'not_found'          => __( 'No testimonials found', 'tc-integrity-divi-child' ),
		'not_found_in_trash' => __( 'No testimonials found in trash', 'tc-integrity-divi-child' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'has_archive'        => false,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_rest'       => true,
		'menu_position'      => 6,
		'menu_icon'          => 'dashicons-format-quote',
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
		'rewrite'            => array( 'slug' => 'testimonials' ),
	);

	register_post_type( 'tc_testimonial', $args );
}
add_action( 'init', 'tc_register_testimonials_cpt' );

/**
 * Register Service Area taxonomy.
 */
function tc_register_service_area_taxonomy() {
	$labels = array(
		'name'          => __( 'Service Areas', 'tc-integrity-divi-child' ),
		'singular_name' => __( 'Service Area', 'tc-integrity-divi-child' ),
		'menu_name'     => __( 'Service Areas', 'tc-integrity-divi-child' ),
		'search_items'  => __( 'Search Service Areas', 'tc-integrity-divi-child' ),
		'all_items'     => __( 'All Service Areas', 'tc-integrity-divi-child' ),
		'edit_item'     => __( 'Edit Service Area', 'tc-integrity-divi-child' ),
		'add_new_item'  => __( 'Add New Service Area', 'tc-integrity-divi-child' ),
	);

	register_taxonomy( 'service_area', array( 'tc_service' ), array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_in_rest'      => true,
		'show_admin_column' => true,
		'rewrite'           => array( 'slug' => 'service-area' ),
	));
}
add_action( 'init', 'tc_register_service_area_taxonomy' );

/**
 * Add custom Divi Builder color palette.
 */
function tc_divi_custom_colors() {
	if ( function_exists( 'et_get_option' ) ) {
		// These colors appear in the Divi Builder color picker
		echo '<style>
			:root {
				--tc-primary-dark: #1B5E20;
				--tc-primary: #2E7D32;
				--tc-accent: #4CAF50;
				--tc-light-green: #81C784;
				--tc-pale-green: #E8F5E9;
				--tc-bg-light: #f5f9f3;
				--tc-dark-text: #1a2e1a;
				--tc-body-text: #333333;
				--tc-white: #ffffff;
				--tc-gold: #C9A84C;
				--tc-dark-overlay: rgba(27, 94, 32, 0.85);
			}
		</style>';
	}
}
add_action( 'wp_head', 'tc_divi_custom_colors', 5 );

/**
 * Add Schema.org structured data for local business.
 */
function tc_schema_markup() {
	if ( is_front_page() || is_page() ) {
		?>
		<script type="application/ld+json">
		{
			"@context": "https://schema.org",
			"@type": "LocalBusiness",
			"name": "T&C Integrity & Reliable Trash Services",
			"description": "Professional eviction junk removal and deep cleaning services. Reliable, eco-friendly, and affordable solutions for property managers, landlords, and homeowners.",
			"url": "<?php echo esc_url( home_url( '/' ) ); ?>",
			"logo": "<?php echo esc_url( TC_CHILD_URI . '/assets/images/tc-logo.png' ); ?>",
			"image": "<?php echo esc_url( TC_CHILD_URI . '/assets/images/tc-logo.png' ); ?>",
			"serviceType": [
				"Eviction Junk Removal",
				"Deep Cleaning Services",
				"Property Cleanout",
				"Furniture Removal",
				"Appliance Removal",
				"Debris Hauling"
			],
			"areaServed": {
				"@type": "GeoCircle",
				"geoMidpoint": {
					"@type": "GeoCoordinates"
				}
			},
			"priceRange": "$$"
		}
		</script>
		<?php
	}
}
add_action( 'wp_head', 'tc_schema_markup' );

/**
 * Add preconnect for Google Fonts performance.
 */
function tc_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.googleapis.com',
			'crossorigin' => 'anonymous',
		);
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin' => 'anonymous',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'tc_resource_hints', 10, 2 );

/**
 * Shortcode: Phone number CTA button.
 * Usage: [tc_phone number="(555) 123-4567"]
 */
function tc_phone_shortcode( $atts ) {
	$atts = shortcode_atts( array(
		'number' => '(555) 123-4567',
		'text'   => '',
		'class'  => 'tc-phone-btn',
	), $atts, 'tc_phone' );

	$clean_number = preg_replace( '/[^0-9]/', '', $atts['number'] );
	$display_text = $atts['text'] ? $atts['text'] : $atts['number'];

	return sprintf(
		'<a href="tel:+1%s" class="%s"><span class="tc-phone-icon">&#9742;</span> %s</a>',
		esc_attr( $clean_number ),
		esc_attr( $atts['class'] ),
		esc_html( $display_text )
	);
}
add_shortcode( 'tc_phone', 'tc_phone_shortcode' );

/**
 * Shortcode: Quick quote CTA.
 * Usage: [tc_quote_cta]
 */
function tc_quote_cta_shortcode( $atts ) {
	$atts = shortcode_atts( array(
		'text'  => 'Get a Free Estimate',
		'url'   => '/contact/',
		'style' => 'primary',
	), $atts, 'tc_quote_cta' );

	$class = 'tc-cta-button tc-cta-' . sanitize_html_class( $atts['style'] );

	return sprintf(
		'<a href="%s" class="%s">%s</a>',
		esc_url( $atts['url'] ),
		esc_attr( $class ),
		esc_html( $atts['text'] )
	);
}
add_shortcode( 'tc_quote_cta', 'tc_quote_cta_shortcode' );

// Include custom template functions
$includes_path = TC_CHILD_DIR . '/includes/';
if ( file_exists( $includes_path . 'template-functions.php' ) ) {
	require_once $includes_path . 'template-functions.php';
}

// Include location data for service area pages
if ( file_exists( $includes_path . 'location-data.php' ) ) {
	require_once $includes_path . 'location-data.php';
}

/**
 * Register page templates from the page-templates directory.
 */
function tc_register_page_templates( $templates ) {
	$templates['page-templates/page-service-area.php'] = __( 'Service Area Page', 'tc-integrity-divi-child' );
	return $templates;
}
add_filter( 'theme_page_templates', 'tc_register_page_templates' );

/**
 * Resolve the page template file path.
 */
function tc_resolve_page_template( $template ) {
	$page_template = get_page_template_slug();
	if ( 'page-templates/page-service-area.php' === $page_template ) {
		$file = TC_CHILD_DIR . '/page-templates/page-service-area.php';
		if ( file_exists( $file ) ) {
			return $file;
		}
	}
	return $template;
}
add_filter( 'page_template', 'tc_resolve_page_template' );

/**
 * Override the generic schema on service area pages with location-specific schema.
 */
function tc_maybe_disable_generic_schema() {
	if ( is_page_template( 'page-templates/page-service-area.php' ) ) {
		remove_action( 'wp_head', 'tc_schema_markup' );
	}
}
add_action( 'template_redirect', 'tc_maybe_disable_generic_schema' );

/**
 * Add body class for service area pages.
 */
function tc_service_area_body_class( $classes ) {
	if ( is_page_template( 'page-templates/page-service-area.php' ) ) {
		$classes[] = 'tc-service-area-page';
	}
	return $classes;
}
add_filter( 'body_class', 'tc_service_area_body_class' );

/**
 * Generate XML sitemap entries for service area pages (for Yoast or similar).
 * This adds the service area URLs to the sitemap with high priority.
 */
function tc_service_area_sitemap_entries( $url, $type, $object ) {
	if ( 'page' === $type && is_a( $object, 'WP_Post' ) ) {
		if ( 'page-templates/page-service-area.php' === get_page_template_slug( $object->ID ) ) {
			$url['priority'] = 0.8;
			$url['lastmod']  = gmdate( 'c' );
		}
	}
	return $url;
}
add_filter( 'wpseo_sitemap_entry', 'tc_service_area_sitemap_entries', 10, 3 );
