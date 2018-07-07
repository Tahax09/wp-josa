<?php
function homepage_sidebars() {
  register_sidebar( array(
    'name'          => __( 'Home Hero', 'fortytwo' ),
    'id'            => 'home-hero',
    'description'   => 'Home hero widget area',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
}
add_action( 'widgets_init', 'homepage_sidebars' );