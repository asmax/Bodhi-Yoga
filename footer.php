<?php
/**
 * The template for displaying the footer.
 * @package bodhi_yoga
 */

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
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
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
