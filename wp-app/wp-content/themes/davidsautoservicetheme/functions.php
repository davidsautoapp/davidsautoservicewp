<?php
// echo get_template_directory_uri();

if (function_exists('acf_add_options_page')) {
  acf_add_options_page();
  acf_add_options_sub_page('Address & Contacts');
  acf_add_options_sub_page('Web & Social Network Links');
};

add_action('after_setup_theme', function() {
  add_theme_support('title-tag');
  add_theme_support('menu');
  add_theme_support('post-thumbnails');
});

add_action('wp_enqueue_scripts', function() {
  wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css');
  wp_enqueue_style('main-css', get_template_directory_uri() . '/css/style.css'); 
  wp_enqueue_style('font-awesome-css', get_template_directory_uri() . '/css/font-awesome.min.css');
  wp_enqueue_style('flaticon-css', get_template_directory_uri() . '/fonts2/flaticon/font/flaticon.css');
  wp_enqueue_style('icomoon-css', get_template_directory_uri() . '/fonts2/icomoon/style.css');

  // wp_enqueue_script('jquery-js'
  //                               , get_template_directory_uri() . '/js/jquery.js'
  //                               , null
  //                               , '1'
  //                               , true);
  wp_enqueue_script('bootstrap-js'
                                , get_template_directory_uri() . '/js/bootstrap.min.js'
                                , ['jquery']
                                , '1'
                                , true);
  wp_enqueue_script('jquery.prettyPhoto-js'
                                , get_template_directory_uri() . '/js/jquery.prettyPhoto.js'
                                , null
                                , '1'
                                , true);
  wp_enqueue_script('jquery.isotope-js'
                                , get_template_directory_uri() . '/js/jquery.isotope.min.js'
                                , null
                                , '1'
                                , true);
  // wp_enqueue_script('repond-js'
  //                               , get_template_directory_uri() . '/js/respond.min.js'
  //                               , null
  //                               , '1'
  //                               , true);
  wp_enqueue_script('main-js'
                                , get_template_directory_uri() . '/js/main.js'
                                , null
                                , '1'
                                , true);
  wp_enqueue_script('wow.min-js'
                                , get_template_directory_uri() . '/js/wow.min.js'
                                , null
                                , '1'
                                , true);
});

add_action('init', function() {
  register_nav_menus([
    'main-menu' =>  'Main Menu'
  ]);

  register_nav_menus([
    'secondary-menu' =>  'Secondary Menu'
  ]);
});

add_filter('nav_menu_css_class', function($classes, $item) {
  if (in_array('current-menu-item', $classes)) {
    $classes[] = 'active';
  };
  return $classes;
}, 10, 2);


