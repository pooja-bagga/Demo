<?php
 
function my_theme_enqueue_styles() {
 
    $parent_style = 'parent-style'; // This is 'twentyseventeen-style' for the Twenty seventeen theme.
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
   
	 wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css',array( $parent_style ),
       wp_get_theme()->get('Version')
    );
	//wp_enqueue_style('bootstrap-css', get_stylesheet_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('owl-css', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css');
	//wp_enqueue_style('child-theme', get_stylesheet_directory_uri() . '/style.css', array('parent-theme'));
	
	wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array(), '1', true);
	wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/ce6e90379e.css');
	 wp_enqueue_script('owl-js', get_stylesheet_directory_uri() . '/js/owl.carousel.min.js', array(), '1', true);
    wp_enqueue_script('coustom-js', get_stylesheet_directory_uri() . '/js/coustom.js', array(), '1', true);
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
/************widgets**************/
register_sidebar( array(
		'name'          => __( 'Slider', 'twentyseventeen' ),
		'id'            => 'slider',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
register_sidebar( array(
		'name'          => __( 'Footer Menu', 'twentyseventeen' ),
		'id'            => 'footer_menu',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

/************customizer**************/
 function example_customizer( $wp_customize ) {
    $wp_customize->add_section('example_section_one', array(
            'title' => 'Footer Settings',
            'description' => 'This is a settings section.',
            'priority' => 35,
        )
    );
$wp_customize->add_setting('copyright_textbox',array(
        'default' => 'Default copyright text',
    )
);
$wp_customize->add_control('copyright_textbox', array(
        'label' => 'Copyright text',
        'section' => 'example_section_one',
        'type' => 'text',
    )
);

}

add_action( 'customize_register', 'example_customizer' );

function footer_theme_customizer($wp_customize) {
    $wp_customize->add_section('footer_customize', array(
        'title' => __('Footer Section', 'footer'),
        'priority' => 60,
        'description' => 'Customize your social links',
    ));
   
  $wp_customize->add_setting('facebook');
    $wp_customize->add_control('facebook', array(
        'label' => __('Facebook', 'footer'),
        'type' => 'textbox',
        'section' => 'footer_customize',
        'settings' => 'facebook',
        'transport' => 'postMessage'
    ));
     $wp_customize->add_setting('twitter');
    $wp_customize->add_control('twitter', array(
        'label' => __('Twitter', 'footer'),
        'type' => 'textbox',
        'section' => 'footer_customize',
        'settings' => 'twitter',
        'transport' => 'postMessage'
    ));
	
	$wp_customize->add_setting('instagram');
    $wp_customize->add_control('instagram', array(
        'label' => __('Instagram', 'footer'),
        'type' => 'textbox',
        'section' => 'footer_customize',
        'settings' => 'instagram',
        'transport' => 'postMessage'
    ));
   

   
}

add_action('customize_register', 'footer_theme_customizer');

function footer_address_customizer($wp_customize) {
    $wp_customize->add_section('footer_address', array(
        'title' => __('Footer Address'),
        'priority' => 60,
        'description' => 'Customize your address',
    ));
   
  $wp_customize->add_setting('address');
    $wp_customize->add_control('address', array(
        'label' => __('Address'),
        'type' => 'textbox',
        'section' => 'footer_address',
        'settings' => 'address',
        'transport' => 'postMessage'
    ));
     $wp_customize->add_setting('email');
    $wp_customize->add_control('email', array(
        'label' => __('Email'),
        'type' => 'textbox',
        'section' => 'footer_address',
        'settings' => 'email',
        'transport' => 'postMessage'
    ));
	
	$wp_customize->add_setting('phone');
    $wp_customize->add_control('phone', array(
        'label' => __('Phone'),
        'type' => 'textbox',
        'section' => 'footer_address',
        'settings' => 'phone',
        'transport' => 'postMessage'
    ));
   

   
}

add_action('customize_register', 'footer_address_customizer');

/************ITINERARY CUSTOM POST TYPE AND TAXONOMY**************/
function slider() {
        $args = array(
            'label' => 'Slider',
            'singular_label' => 'Slider',
            'description'   => 'Holds our slides/slider',
			'public'        => true,
			'menu_position' => 9,			
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => true,
            'menu_icon' => 'dashicons-admin-post',
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
			'has_archive'   => true,
        );
        register_post_type('slider',$args);

    }
add_action('init', 'slider');
register_taxonomy('itinerary_category', array('slider'), array('hierarchical' => true, 'label' => 'Slider Categories','show_admin_column' => true, 'singular_label' => 'Slider', 'rewrite' => true));