<?php
// Theme Functions

/* Bootrap NavWalker */
function register_navwalker(){
  require_once get_template_directory() . '/assets/_inc/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');


/* Remove Admin Bar from Frontend */
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar(){
  show_admin_bar(false);
}

if (function_exists('add_theme_support')){
  // Add Menu Support
  add_theme_support('menus');

  // Add Thumbnail Theme Support
  add_theme_support('post-thumbnails');
  add_image_size('large', 700, '', true);  		// Large Thumbnail
  add_image_size('medium', 250, '', true); 		// Medium Thumbnail
  add_image_size('small', 125, '', true);  		// Small Thumbnail
  add_image_size('custom-size', 700, 200, true);  // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

  // Enables post and comment RSS feed links to head
  add_theme_support('automatic-feed-links');
}

add_action('after_setup_theme', 'wpt_setup');
if(!function_exists('wpt_setup')):
  function wpt_setup() {
    register_nav_menu('primary', __('Primary Navigation', 'wptmenu'));
  }
endif;

function wpt_register_js(){
  if(!is_admin()){
    wp_deregister_script('jquery');

    wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.3.1.min.js', 'jquery', '', true);
    wp_enqueue_script('jquery.popper.min', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', 'jquery', '', true);
  	wp_enqueue_script('jquery.bootstrap.min', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', 'jquery', '', true);
    wp_enqueue_script('mapbox.min', '//api.tiles.mapbox.com/mapbox-gl-js/v1.5.0/mapbox-gl.js', 'jquery', '', true);
    wp_enqueue_script('mapboxjs.min', '//api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js', 'jquery', '', true);
    wp_enqueue_script('aos.min', '//unpkg.com/aos@next/dist/aos.js', 'jquery', '', true);
    wp_enqueue_script('slickjs.min', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', 'jquery', '', true);
    wp_enqueue_script('fontawesome_cdn.min', '//kit.fontawesome.com/0af1bf54c5.js', 'jquery', '', true);
  	wp_enqueue_script(
      'jquery.extras.min',
      get_template_directory_uri() . '/assets/js/main.min.js',
      array(),
      filemtime(get_template_directory().'/assets/js/main.min.js'),
      true
    );
  }
}

function wpt_register_css(){
  wp_enqueue_style('bootstrap.min', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
  wp_enqueue_style('aos.min', '//unpkg.com/aos@next/dist/aos.css');
  wp_enqueue_style('slick.min', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
  wp_enqueue_style('mapbox.min','//api.tiles.mapbox.com/mapbox-gl-js/v1.5.0/mapbox-gl.css');
  wp_enqueue_style('mapboxcs.min', '//api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css');
  wp_enqueue_style(
    'main.min',
    get_template_directory_uri() . '/assets/css/main.min.css',
    array(),
    filemtime(get_stylesheet_directory().'/assets/css/main.min.css'),
    'all'
  );
  wp_enqueue_style(
    'updates.min',
    get_template_directory_uri() . '/assets/css/updates.min.css',
    array(),
    filemtime(get_stylesheet_directory().'/assets/css/updates.min.css'),
    'all'
  );
}
add_action('init','wpt_register_js');
add_action('wp_enqueue_scripts', 'wpt_register_css');

// Custom Post Types
add_action('init','create_post_type');
function create_post_type(){
  register_post_type('home-builders', array(
	  'label' => __('Home Builders'),
    'singular_label' => __('Home Builder'),
    'public' => true,
    'show_ui' => true,
    'capability_type' => 'post',
    'hierarchical' => true,
    'rewrite' => array('slug' => 'home-builders'),
    'supports' => array('title','author','excerpt','thumbnail','order','page-attributes'),
    'menu_position' => 16,
    'has_archive' => true,
    'menu_icon' => 'dashicons-admin-home'
  ));
}

// Quick Move-In Homes & Builder Taxonomies
add_action('init','create_quick_moves');
function create_quick_moves(){
  register_post_type('quickmoves', array(
    'label'           =>  __('Quick Move-Ins'),
    'singular_label'  =>  __('Quick Move-In'),
    'public'          =>  true,
    'show_ui'         =>  true,
    'capability_type' =>  'post',
    'hierarchical'    =>  'true',
    'rewrite'         =>  array('slug' => 'quick-moveins'),
    'supports'        =>  array('title','custom-fields','order','page-attributes'),
    'menu_position'   =>  18,
    'menu_icon'       =>  'dashicons-admin-home',
    'has_archive'     =>  true,
  ));
}

add_action('init','create_feature_homes');
function create_feature_homes(){
  register_post_type('featurehomes', array(
    'label'           =>  __('Featured Homes'),
    'singular_label'  =>  __('Featured Home'),
    'public'          =>  true,
    'show_ui'         =>  true,
    'capability_type' =>  'post',
    'hierarchical'    =>  'true',
    'rewrite'         =>  array('slug' => 'featured-homes'),
    'supports'        =>  array('title','custom-fields','order','page-attributes','editor'),
    'menu_position'   =>  19,
    'menu_icon'       =>  'dashicons-admin-home',
    'has_archive'     =>  true,
  ));
}

// Alert Box in Header
add_action('init','create_alerts');
function create_alerts(){
  register_post_type('alerts', array(
    'label'           =>  __('Alerts'),
    'singular_label'  =>  __('Alert'),
    'public'          =>  true,
    'show_ui'         =>  true,
    'capability_type' =>  'post',
    'hierarchical'    =>  true,
    'rewrite'         =>  array('slug' => 'alerts'),
    'supports'        =>  array('title','custom-fields','order','page-attributes'),
    'menu_position'   =>  21,
    'menu_icon'       =>  'dashicons-megaphone',
    'has_archive'     =>  false
  ));
}

add_action('init','builder_taxonomies',0);
function builder_taxonomies(){
  $_labels = array(
    'name'              =>	_x('Builders','taxonomy general name'),
		'singular_name'     =>	_x('Builder', 'taxonomy singular name'),
		'search_items'		  =>	__('Search Builders'),
		'all_items'         =>	__('All Builders'),
		'parent_item'       =>	__('Parent Builder'),
		'parent_item_colon'	=>	__('Parent Builder:'),
		'edit_item'         =>	__('Edit Builder'),
		'update_item'       =>	__('Update Builder'),
		'add_new_item'      =>	__('Add New Builder'),
		'new_item_name'     =>	__('New Builder Name'),
		'menu_name'         =>	__('Builders'),
  );
  $_args = array(
    'hierarchical'      =>	true,
		'labels'            =>	$_labels,
		'show_ui'           =>	true,
		'show_admin_column'	=>	true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'         =>	true,
		'rewrite'           =>	array('slug' => 'builder'),
  );
  register_taxonomy('builder',array('quickmoves','featurehomes'),$_args);
}

// Widgets (Directions)
if(function_exists('register_sidebar')){
  register_sidebar(array(
    'name'          => __('Footer Directions', 'footer-directions'),
	  'description'   => __('Widget to display directions in footer.', 'footer-directions'),
	  'id'            => 'footer-directions',
	  'before_widget' => '<div class="footer-directions">',
	  'after_widget'  => '</div>',
	  'before_title'  => '',
	  'after_title'   => ''
  ));

  register_sidebar(array(
		'name'			=>	__('News Sidebar', 'news-sidebar'),
		'description'	=>	__('Sidebar widgets for news templates', 'news-sidebar'),
		'id'			=>	'latestnews-sidebar',
		'before_widget'	=>	'<div class="news-sidebar col-md-12 col-sm-6">',
		'after_widget'	=>	'</div>',
		'before_title'	=>	'<h3>',
		'after_title'	=>	'</h3>'
		));
}

// Add Class to Images posted on pages
function add_responsive_class($content){
  $content = mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8');
  $document = new DOMDocument();
  libxml_use_internal_errors(true);
  $document->loadHTML(utf8_decode($content));

  $imgs = $document->getElementsByTagName('img');
  foreach($imgs as $img){
    $existing_class = $img->getAttribute('class');
    $img->setAttribute('class', 'img-fluid ' . $existing_class);
  }
  $html = $document->saveHTML();
	      return $html;
}
add_filter('the_content', 'add_responsive_class');
?>
