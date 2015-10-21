<?php
/**
 * The template for displaying the footer.
 * @package bodhi_yoga
 */
$bodhi_value = TitanFramework::getInstance( 'bodhi-yoga' );
$bodhi_social_facebook = $bodhi_value->getOption( 'bodhi_social_facebook' );
$bodhi_social_instagram = $bodhi_value->getOption( 'bodhi_social_instagram' );
$bodhi_social_tumblr = $bodhi_value->getOption( 'bodhi_social_tumblr' );
$bodhi_social_twitter = $bodhi_value->getOption( 'bodhi_social_twitter' );
?>

	</div><!-- #content -->

        <div class="footer">
            <div class="footer--inner container">
                
                <?php if (is_active_sidebar( 'footer-full' )) : ?>
                <div class="subscribe-form-wrap">
                    <?php dynamic_sidebar( 'footer-full' ); ?>
                </div>
                <!-- subscribe form -->
                <?php endif; ?>
                
                <div class="row">
	                 <?php
	                    wp_nav_menu( array(
	                        'menu'              => 'footer',
	                        'depth'             => 1,
	                        'container'         => 'div',
	                        'container_class'   => 'footer--menu col-md-8',
	                        'container_id'      => 'footer--menu',
	                        'menu_class'        => 'footer--menu_list list-inline pull-left',
	                        'fallback_cb'       => false,
	                    ));
	                ?>
                    <div class="footer--credits col-md-4">
                        <span class="pull-right"> 
                        <p>
                            <?php
                            $date = get_the_date('Y');
                            $site_name = get_bloginfo('name');
                            printf( 
                                esc_html__( 'Copyright &copy; %1$s %2$s', 'bodhi-yoga' ),
                                $site_name,
                                $date
                            );
                        ?>
                        </p>
                        <ul class="footer--credits_social list-inline list-unstyled">
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
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
