<?php
function boc_theme_enqueue_styles() {

    $parent_style = 'boc-main-styles'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'boc-child-styles',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'boc_theme_enqueue_styles' );

function menu_shortcode($atts) {
    extract(shortcode_atts(array( 'name' => null, ), $atts));
    return wp_nav_menu( array( 'menu' => $name, 'echo' => false ) );
}
add_shortcode('menu', 'menu_shortcode');

/* --------Footer-details-------- */

function footer_theme_customizer($wp_customize) {
    $wp_customize->add_section('footer_customize', array(
        'title' => __('Footer Section', 'footer'),
        'priority' => 60,
        'description' => 'Customize your details',
    ));

  
    $wp_customize->add_setting('email_text');
    $wp_customize->add_control('email_text', array(
        'label' => __('Email Text'),
        'type' => 'textbox',
        'section' => 'footer_customize',
        'settings' => 'email_text',
        'transport' => 'postMessage'
    ));
      $wp_customize->add_setting('email_link');
    $wp_customize->add_control('email_link', array(
        'label' => __('Email Id'),
        'type' => 'textbox',
        'section' => 'footer_customize',
        'settings' => 'email_link',
        'transport' => 'postMessage'
    ));

     $wp_customize->add_setting('phone_text');
    $wp_customize->add_control('phone_text', array(
        'label' => __('Phone Text'),
        'type' => 'textbox',
        'section' => 'footer_customize',
        'settings' => 'phone_text',
        'transport' => 'postMessage'
    ));
 $wp_customize->add_setting('phone_no');
    $wp_customize->add_control('phone_no', array(
        'label' => __('Phone No'),
        'type' => 'textbox',
        'section' => 'footer_customize',
        'settings' => 'phone_no',
        'transport' => 'postMessage'
    ));
    $wp_customize->add_setting('get_quote_text');
    $wp_customize->add_control('get_quote_text', array(
        'label' => __('Get a Quote'),
        'type' => 'textbox',
        'section' => 'footer_customize',
        'settings' => 'get_quote_text',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('get_quote_link');
    $wp_customize->add_control('get_quote_link', array(
        'label' => __('Get a Quote Link'),
        'type' => 'textbox',
        'section' => 'footer_customize',
        'settings' => 'get_quote_link',
        'transport' => 'postMessage'
    ));
  	}

add_action('customize_register', 'footer_theme_customizer');

add_action( 'init', 'wpb_register_cpt_clients' );

function wpb_register_cpt_clients() {

$labels = array(
'name' => _x( 'clients', 'clients' ),
'singular_name' => _x( 'clients', 'clients' ),
'add_new' => _x( 'Add New', 'clients' ),
'add_new_item' => _x( 'Add New clients', 'clients' ),
'edit_item' => _x( 'Edit clients', 'clients' ),
'new_item' => _x( 'New clients', 'clients' ),
'view_item' => _x( 'View clients', 'clients' ),
'search_items' => _x( 'Search clients', 'clients' ),
'not_found' => _x( 'No clients found', 'clients' ),
'not_found_in_trash' => _x( 'No clients found in Trash', 'clients' ),
'parent_item_colon' => _x( 'Parent clients:', 'clients' ),
'menu_name' => _x( 'Clients Logo', 'Clients' ),
);

$args = array(
'labels' => $labels,
'hierarchical' => false,
'supports' => array( 'title', 'thumbnail', 'editor', 'excerpt', 'author' ),
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'show_in_nav_menus' => true,
'publicly_queryable' => true,
'exclude_from_search' => false,
'has_archive' => true,
'query_var' => true,
'can_export' => true,
'menu_icon' => 'dashicons-admin-post',
'rewrite' => true,
'capability_type' => 'post'
    );
register_post_type( 'clients', $args );
flush_rewrite_rules();
}

function showSlickSlider() { 
    ob_start(); 


    $args = array( 'post_type' => 'clients');
    $data = '<section class="regular slider">';

        $query = new WP_Query($args); 
            while( $query->have_posts() ):$query->the_post(); 
            $thumbnail = get_the_post_thumbnail_url(get_the_ID(),'full');
             $data .= '<div>
                        <img src="'.$thumbnail.'">
                        </div>';
            
        
        endwhile; wp_reset_postdata(); 
    $data .= '</section>'; 
    return $data; 
 } 
add_shortcode('slick-slider','showSlickSlider');

/*------------- blog category shortcode------------------*/
 
 function showBlog($atts = ' ' ) { 
    ob_start(); 
     $param = shortcode_atts( array(
        'category' => null
      ), $atts );
    
  
    $args = array( 'post_type' => 'post','category_name' => $param['category']);
    $data = '<section class="blog-main-slider slider insight-post">';
     $query = new WP_Query($args); 
            while( $query->have_posts() ):$query->the_post(); 
            $title = get_the_title(get_the_ID());
            $content = get_the_excerpt(get_the_ID());
            $permalink = get_the_permalink(get_the_ID());
            $thumbnail = get_the_post_thumbnail_url(get_the_ID(),'full');
             $data .= '<div>
                 <div class="pic ">
                 <a href="'.$permalink.'">
                 <img src="'.$thumbnail.'">
                 <div class="img_overlay">
                 <span class="hover_icon icon_plus"></span>
                 </div>
                 </a>
                 </div>
<div class="post_item_desc dark_links">
<h4><a href="'.$permalink.'">'.$title.'</a></h4>
<p>'.wp_trim_words($content,20,'').'</p>
 <a href="'.$permalink.'" class="more-link2 flat">Read more</a>		
</div>
 </div>';
            
        
        endwhile; wp_reset_postdata(); 
    $data .= '</section>'; 
    return $data; 
 } 
add_shortcode('blog-category','showBlog');