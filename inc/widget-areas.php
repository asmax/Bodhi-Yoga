<?php
/**
 * Register widget area.
 * theme sidebars and widget ares.
 */
function bodhi_yoga_widgets_init() {
    
    // Footer Full Width
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Full Width', 'bodhi-yoga' ),
        'id'            => 'footer-full',
        'description'   => 'Full width widget area in the footer, add subscribe form.',
        'before_widget' => '<aside id="%1$s" class="footer-widget widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="footer-widget-title widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'bodhi_yoga_widgets_init' );