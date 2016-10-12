<?php
    register_nav_menus( array(
    'mainmenu' => 'Main Navigation for the Site',
    'footermenu' => 'Footer Navigation for the Site',
) );  
// Sidebar and widgets
if ( function_exists('register_sidebar') )

    register_sidebar(array(
        'id' => 'home1',
        'name' => 'Sidebar Sitewide',
        'description' => 'Whatever you put here will show up in all the sidebars across the WHOLE site. (Including the magazines)',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3>',
    ));

//allow to upload zip files
add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ) {
        // add your extension to the mimes array as below
        $existing_mimes['zip'] = 'application/zip';
        return $existing_mimes;
    }
// Truncated Excerpt
    function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }
     
    function content($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      } 
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
    }
// CUSTOM THUMBNAIL 

	add_theme_support('post-thumbnails');
	
	if ( function_exists('add_theme_support') ) {
		add_theme_support('post-thumbnails');
	}
	
	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size( 'quad', 400, 400, true ); //(cropped)
		add_image_size( 'single', 800, 494, true ); //(cropped)
        add_image_size( 'pro', 800, 800, true ); //(cropped)
        add_image_size( 'product', 460, 300, true ); //(cropped)
	}

	add_theme_support('html5', array('search-form'));

//Changing number of search results
add_filter('post_limits', 'postsperpage');
function postsperpage($limits) {
    if (is_search()) {
        global $wp_query;
        $wp_query->query_vars['posts_per_page'] = 20;
    }
    return $limits;
}

//GET CATEGORY SLUG FROM CATEGORY ID
function get_cat_slug($cat_id) {
    $cat_id = (int) $cat_id;
    $category = &get_category($cat_id);
    return $category->slug;
}

//theme_slug is Straped
function bootstrap_files(){
    wp_register_style( 'bootstrap-css', 'http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css', array(), false, 'all' );

    wp_register_script( 'bootstrap-js', 'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js', array( 'jquery' ), false, false );

    wp_enqueue_style( 'bootstrap-css' );
    wp_enqueue_script( 'bootstrap-js' );
}
function wow_files(){
    wp_register_style( 'animate-css', get_template_directory_uri() . '/css/animate.css' );

    wp_register_script( 'wow-js', get_template_directory_uri() . '/js/wow.min.js', array( 'jquery' ), false, false );

    wp_enqueue_style( 'animate-css' );
    wp_enqueue_script( 'wow-js' );
}

function animation_slider_scripts(){
    wp_register_script( 'slideoutimage', get_template_directory_uri() . '/js/slideoutimage.js',array( 'jquery' ), false, true);
    wp_enqueue_script( 'slideoutimage' );
}
    function maui_styles(){
    // wp_register_style( 'strapped-style', get_template_directory_uri() . 'style.css' );
    // wp_enqueue_style('strapped-style');

    wp_register_style( 'micro', get_template_directory_uri() . '/css/micro.css' );
    wp_enqueue_style('micro');

    wp_register_style( 'backtotop-css', get_template_directory_uri() . '/css/backtotop.css' );
    wp_enqueue_style('backtotop-css');

    wp_register_style( 'blimp', get_template_directory_uri() . '/css/blimp.css' );
    wp_enqueue_style('blimp');

    wp_register_style( 'fonts-awesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );
    wp_enqueue_style('fonts-awesome');

    wp_register_style( 'header', get_template_directory_uri() . '/css/header.css' );
    wp_enqueue_style('header');

    wp_register_style( 'footer', get_template_directory_uri() . '/css/footer.css' );
    wp_enqueue_style('footer');

    wp_register_style( 'styles', get_template_directory_uri() . '/css/styles.css' );
    wp_enqueue_style('styles');
}


    add_action( 'wp_enqueue_scripts', 'bootstrap_files' );
    add_action( 'wp_enqueue_scripts', 'maui_styles' );
    add_action( 'wp_enqueue_scripts', 'wow_files' );


    require_once('wp_bootstrap_navwalker.php');

//Making jQuery Google API
function modify_jquery() {
    if (!is_admin()) {
        // comment out the next two lines to load the local copy of jQuery
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://code.jquery.com/jquery-2.2.4.min.js', false, '2.2.4');
        wp_enqueue_script('jquery');
    }
}
add_action('init', 'modify_jquery');
?>