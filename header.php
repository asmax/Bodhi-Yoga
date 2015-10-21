<?php
/**
 * The header for our theme.
 * @package bodhi_yoga
 */
$bodhi_value = TitanFramework::getInstance( 'bodhi-yoga' );
$bodhi_main_heading = $bodhi_value->getOption( 'bodhi_main_heading' ); 
$bodhi_sub_heading = $bodhi_value->getOption( 'bodhi_sub_heading' );

$bodhi_social_facebook = $bodhi_value->getOption( 'bodhi_social_facebook' );
$bodhi_social_instagram = $bodhi_value->getOption( 'bodhi_social_instagram' );
$bodhi_social_tumblr = $bodhi_value->getOption( 'bodhi_social_tumblr' );
$bodhi_social_twitter = $bodhi_value->getOption( 'bodhi_social_twitter' );

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
                        'theme_location'	=> 'primary',
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
                    <span class="fa fa-bars"></span>
                    </button>
                    <ul class="header-top--social_list list-inline list-unstyled pull-right">
                        <?php
                        if ( !empty($bodhi_social_facebook) ):
                            echo '<li><a href="'.$bodhi_social_facebook.'"><i class="fa fa-facebook"></i></a></li>';
                        endif;
                        if ( !empty($bodhi_social_instagram) ):
                            echo '<li><a href="'.$bodhi_social_instagram.'"><i class="fa fa-instagram"></i></a></li>';
                        endif;
                        if ( !empty($bodhi_social_tumblr) ):
                            echo '<li><a href="'.$bodhi_social_tumblr.'"><i class="fa fa-tumblr"></i></a></li>';
                        endif;
                        if ( !empty($bodhi_social_twitter) ):
                            echo '<li><a href="'.$bodhi_social_twitter.'"><i class="fa fa-twitter"></i></a></li>';
                        endif;
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- header-top -->
    
    <?php if ( get_header_image() && is_front_page() ) : ?>
    <div class="header--image">
        <img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" class="img-responsive">
        <div class="wow slideUp header--image_content">
            <div class="container">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <?php if ( !empty($bodhi_main_heading)): ?>
                        <h1 class="font-caviar size-48 color-green font-normal mb-0 mt-0"><?php echo $bodhi_main_heading ?></h1>
                    <?php endif ?>
                    <?php if ( !empty($bodhi_sub_heading)): ?>
                        <p class="color-green size-24 font-bradley mb-30 mt-30"><?php echo $bodhi_sub_heading ?></p>
                    <?php endif ?>
                    <p class="wow bounceIn circle-icon mb-0 mt-0"><i class="circle-45 fa fa-angle-down"></i></p>
                </div>
            </div>
        </div>
    </div>

    <?php endif; // End header image check. ?>

    <div id="content" class="site-content">
