<?php
//function vl_widgets_init() {
//
//  register_sidebar( array(
//    'name' => __( 'Footer Sidbar', 'vl' ),
//    'id' => 'footer-sidebar',
//    'description' => __( 'The main sidebar appears on the right on each page except the front page template', 'vl' ),
//    'before_widget' => '',
//    'after_widget' => '',
//    'before_title' => '<h3 class="widget-title">',
//    'after_title' => '</h3>',
//  ) );
//
//
//}
//
//add_action( 'widgets_init', 'vl_widgets_init' );

function li_widgets_init() {

  register_sidebar( array(
    'name' => __( 'Shop Sidebar', 'li' ),
    'id' => 'sidebar-1',
    'description' => __( 'The main sidebar appears on the right on each page except the front page template', 'li' ),
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ) );


}

add_action( 'widgets_init', 'li_widgets_init' );