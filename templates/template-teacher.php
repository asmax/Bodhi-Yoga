<?php
/* 
 * Template Name: Yoga Teacher
 * 
 * This template shows the become teacher page.
 */

get_header(); ?>

<div class="header-large">
<div class="container">
    <!-- page centered title -->
    <div class="centered-logo-header-large text-center">
        <span class="centered-logo-header-large--logo"></span>
        <?php the_title( '<h1 class="page-title">', '</h2>' ); ?>
    </div>

    <div class="row tabs-header">
        <?php 
        $args = array(
            //Type & Status Parameters
            'post_type'   => 'training',
            'post_status' => 'publish',
            //Order & Orderby Parameters
            'order'               => 'DESC',
            'orderby'             => 'date',
            //Pagination Parameters
            'posts_per_page'         => -1,
            //'posts_per_archive_page' => 10,
            'paged'                  => get_query_var('paged'),
        );
        $gallery_query = new WP_Query( $args ); ?>
        <?php if ( $gallery_query->have_posts() ) : ?>
            <?php $count = 0;
            while ( $gallery_query->have_posts() ) : $gallery_query->the_post();
            $count++;
            if ( $count == 1 ) {
                $class = 'active';
            } else {
                $class = '';
            }
            ?>
            <div class="wow fadeIn tab-inner col-md-3 <?php echo $class; ?>">
                <a href="#tab-<?php the_ID(); ?>" data-toggle="tab">
                <?php if (has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail( 'square-300', array( 
                        'class' => 'img-responsive'
                        )
                    ); ?>
                <?php endif; ?>
                </a>
            </div>
            <!-- tab-inner -->
            <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
        <a class="btnPrevious"><i class="fa fa-chevron-left"></i></a>
        <a class="btnNext"><i class="fa fa-chevron-right"></i></a>
    </div>
    <!-- tabs-header -->
</div>
<!-- container -->
</div>
<!-- header-large -->

<div class="content-wrap container">
    <div class="tab-content">
    <?php 
    $args = array(
        //Type & Status Parameters
        'post_type'   => 'training',
        'post_status' => 'publish',
        //Order & Orderby Parameters
        'order'               => 'DESC',
        'orderby'             => 'date',
        //Pagination Parameters
        'posts_per_page'         => -1,
        //'posts_per_archive_page' => 10,
        'paged'                  => get_query_var('paged'),
    );
    $gallery_query = new WP_Query( $args ); ?>
        <?php if ( $gallery_query->have_posts() ) : ?>
            <?php $count = 0;
            while ( $gallery_query->have_posts() ) : $gallery_query->the_post();
            $count++;
            
            // metabox variables
            $bodhi_value = TitanFramework::getInstance( 'bodhi-yoga' );
            $teacher_training_heading = $bodhi_value->getOption( 'bodhi_teacher_training_heading' );
            $teacher_training_subheading = $bodhi_value->getOption( 'bodhi_teacher_training_subheading' );
            $teacher_training_location = $bodhi_value->getOption( 'bodhi_teacher_training_location' );
            $teacher_training_sdate = $bodhi_value->getOption( 'bodhi_teacher_training_sdate' );
            $teacher_training_edate = $bodhi_value->getOption( 'bodhi_teacher_training_edate' );
            
            $sdate_day = date( "jS", strtotime($teacher_training_sdate) );
            //$sdate_month = date( "F", $teacher_training_sdate ). ' ';
            //$sdate_year = date( "Y", $teacher_training_sdate );
            
            $edate_day = date( "jS", strtotime($teacher_training_edate) );
            $edate_month = date( "F", strtotime($teacher_training_edate) );
            $edate_year = date( "Y", strtotime($teacher_training_edate) );
            
            if ( $count == 1 ) {
                $class = 'active';
            } else {
                $class = '';
            }
            ?>
        
            <div class="tab-pane <?php echo $class; ?>" id="tab-<?php the_ID(); ?>">
                
                <div class="row">
                    <div class="col-md-9">
                        <?php if ( !empty( $teacher_training_heading )) { ?>
                            <h1 class="font-caviar size-27 training-heading"><?php echo $teacher_training_heading; ?></h1>
                        <?php } ?>
                        <?php if ( !empty( $teacher_training_subheading )) { ?>
                            <span class="font-bradley size-22"><?php echo $teacher_training_subheading; ?></span>
                        <?php } ?>
                    </div>
                    <div class="col-md-3">
                        <?php if ( !empty($teacher_training_location) ) { ?>
                            <p class="training-location"><?php echo $teacher_training_location; ?></p>
                        <?php } ?>
                        <p class="training-date">
                            <?php if ( !empty( $teacher_training_sdate ) ) { ?>
                                <?php echo $sdate_day.' - '; ?>
                            <?php } ?>
                            <?php if ( !empty( $teacher_training_edate ) ) { ?>
                                <?php echo $edate_day.$edate_month.$edate_year; ?>
                            <?php } ?> 
                        </p>
                    </div>
                </div>

                    
                <?php the_content(); ?>
            </div>
            <!-- tab-pane -->
            <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
    </div>
    <!-- tabs-content -->
    
</div>
<!-- content-wrap -->
    


<?php get_footer(); ?>