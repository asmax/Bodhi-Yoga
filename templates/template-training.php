<?php
/* 
 * Template Name: Yoga Training
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
                <span class="circle-20"></span>
                <?php the_title( '<h3 class="font-myriad size-22 color-green text-center ltr-spc-1">', '</h3>' ); ?>
            </div>
            <!-- tab-inner -->
            <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
<!--        <a class="btnPrevious"><i class="fa fa-chevron-left"></i></a>
        <a class="btnNext"><i class="fa fa-chevron-right"></i></a>-->
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
                
                <div class="row mb-50">
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

                <div class="page-content-wrap">
                    <?php the_content(); ?>
                </div>
   
                <div class="course-info" id="accordion" role="tablist" aria-multiselectable="true">
                  <?php
                  $teacher_course_information = get_field('teacher_course_information');
                  ?>
                    <?php if ( !empty( $teacher_course_information )) : ?>
                        <?php 
                        $counter = 0;
                        foreach( $teacher_course_information as $course_info ) {
                        $counter++;

                        $course_title = $course_info['course_tab_title'];
                        $course_content = $course_info['course_tab_content'];
                        ?>
                        <div class="course-info--inner">
                            <div class="course--heading " role="tab" id="heading-<?php echo $counter ?>"  data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $counter ?>" aria-expanded="true" aria-controls="collapse-<?php echo $counter ?>">
                                <?php if ( isset($course_info['course_tab_title'])) {
                                    echo '<h4 class="size-22 font-bradley course-title">'.$course_title.'<span class="pull-right">Show More <i class="fa fa-plus-square-o"></i></span></h4>';                
                                } ?>
                            </div>

                            <div id="collapse-<?php echo $counter ?>" class="course-info--content collapse" role="tabpanel" aria-labelledby="heading-<?php echo $counter ?>">
                                <?php if ( isset($course_info['course_tab_content'])) {
                                    echo '<div>'.$course_content.'</div>';                
                                } ?>
                            </div>

                      </div>
                      <?php } ?>
                  <?php endif; ?>
                </div>
                
            </div>
            <!-- tab-pane -->
            <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
    </div>
    <!-- tabs-content -->
    
    <div class="text-center register--button mt-50">
        <a href="#" class="btn btn-primary btn-lg">Register Now <i class="fa fa-angle-right"></i></a>
    </div>
    
</div>
<!-- content-wrap -->


<section class="parallax-container" data-parallax="scroll" data-image-src="http://localhost/bodhi-yoga/wp-content/uploads/2015/10/Quote-background-image.png">
    <div class="testimonial-slides container">
            <?php 
    $args = array(
        //Type & Status Parameters
        'post_type'   => 'testimonial',
        'post_status' => 'publish',
        //Order & Orderby Parameters
        'order'               => 'DESC',
        'orderby'             => 'date',
        //Pagination Parameters
        'posts_per_page'         => -1,
        //'posts_per_archive_page' => 10,
        'paged'                  => get_query_var('paged'),
    );
    $testimonial_query = new WP_Query( $args ); ?>
    <?php if ( $testimonial_query->have_posts() ) : ?>
        <?php while(  $testimonial_query->have_posts() ) : $testimonial_query->the_post();
        $bodhi_value = TitanFramework::getInstance( 'bodhi-yoga' );
        $bodhi_testimonial_author = $bodhi_value->getOption( 'bodhi_testimonial_author_meta' );
        ?>
        <div class="testimonial-slides--item row">
            <div class="col-md-3 col-md-offset-1">
                <div class="testimonial-slides--thumbnail">
                    <?php if (has_post_thumbnail() ) :
                        the_post_thumbnail( 'square-250', array( 'class' => 'img-responsive img-circle' ) );
                    endif; ?>
                </div>
                
            </div>
            <div class="testimonial-slides--content col-md-7">
                <div class="testimonial-slides--inner">
                    <?php the_content( 'Read More..' ); ?>
                    <?php if ( !empty( $bodhi_testimonial_author )) : ?>
                        <span class="color-white size-18"><?php echo $bodhi_testimonial_author; ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    <?php endif; ?>
    </div>  
    <!-- testimonial-slides -->
</section>
<!-- testimonials -->

<?php get_footer(); ?>