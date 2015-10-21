<?php

/* 

 * Template Name: Half Featured Page

 * 

 * This template shows 100% width content

 * and also displays featured image as header image.

 */



$bodhi_value = TitanFramework::getInstance( 'bodhi-yoga' );

get_header(); ?>



<!-- page header image -->

<?php if ( has_post_thumbnail() ) { ?>

<div class="page-header-image">

    <?php the_post_thumbnail( 'header-image', array( 'class' => 'img-responsive' ) ); ?>

</div>

<?php } ?>



<div class="content-wrap container">

    <?php if ( have_posts() ) : ?>



        <?php while ( have_posts() ) : the_post();

        $bodhi_value = TitanFramework::getInstance( 'bodhi-yoga' );
        $page_title_toggle = $bodhi_value->getOption( 'bodhi_toggle_page_title' );
        echo $bodhi_page_subheading = $bodhi_value->getOption( 'bodhi_page_subheading' );


        if ( $page_title_toggle == 0 ) : ?>    
            <!-- page centered title -->
            <div class="centered-logo-header text-center">
                <span class="centered-logo-header--logo"></span>
                <?php the_title( '<h1 class="page-title">', '</h2>' ); ?>
            </div>
        <?php endif;
        if ( ! empty($bodhi_page_subheading) ) : ?>    
            <!-- page centered title -->
            <div class="page-sub-heading text-center">
                <?php echo '<h3 class="size-22 font-myriad-semibold page-title">'.$bodhi_page_subheading.'</h2>'; ?>
            </div>
        <?php endif; ?>
        

        <div class="page-content">

        <?php the_content(); ?>

        <?php

            wp_link_pages( array(

                    'before' => '<div class="page-links">',

                    'after'  => '</div>',

                ) 

            );

        ?>

        </div>

        <!-- page content -->

        

        <?php endwhile; ?>



    <?php endif; ?>

</div>

<!-- content-wrap -->

    





<?php get_footer(); ?>