<?php
/**
 * The template for displaying all pages.
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * @package bodhi_yoga
 */

get_header(); ?>

    <div class="container">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

                <?php woocommerce_content(); ?>

            </main><!-- #main -->
        </div><!-- #primary -->
    </div>
    <!-- container -->

    <?php get_sidebar(); ?>
<?php get_footer(); ?>
