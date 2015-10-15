<?php
/**
 * The header for our theme.
 * @package bodhi_yoga
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
    <div class="header-top">
        <div class="header-top--inner container">
            <div class="row">
                <div class="header-top--menu col-md-10">
                 <?php
                    wp_nav_menu( array(
                        'menu'              => 'primary',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'collapse navbar-collapse',
                        'container_id'      => 'main-menu',
                        'menu_class'        => 'nav navbar-nav',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'            => new wp_bootstrap_navwalker())
                    );
                ?>
                </div>
                <div class="header-top--social col-md-2">
                    <button type="button" class="pull-left navbar-toggle" data-toggle="collapse" data-target="#main-menu">
                    <span class="fa fa-menu"></span>
                    </button>
                    <ul class="header-top--social_list list-inline list-unstyled pull-right">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- header-top -->
    
    <?php if ( get_header_image() && is_home() ) : ?>
    <div class="header-image">
        <img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" class="img-responsive">
    </div>
    <?php endif; // End header image check. ?>
    <div id="content" class="site-content">
