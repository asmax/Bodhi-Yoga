<?php

add_action( 'tf_create_options', 'bodhi_yoga_create_metabox' );

function bodhi_yoga_create_metabox() {



// Get Framework Instance

$bodhi_yoga = TitanFramework::getInstance( 'bodhi-yoga' );



//================================= //

//======== Theme Meta Box ========= //

//================================= //

$page_meta = $bodhi_yoga->createMetaBox( array(

    'name' => 'Page Metabox',

));

$teacher_meta = $bodhi_yoga->createMetaBox( array(

    'name' => 'Become Teacher Metabox',

    'post_type' => 'training'

));

$testimonial_meta = $bodhi_yoga->createMetaBox( array(

    'name' => 'Testimonial Metabox',

    'post_type' => 'testimonial'

));

$teachers_meta = $bodhi_yoga->createMetaBox( array(

    'name' => 'Teacher Metabox',

    'post_type' => 'teacher'

));

//========================================= //

//========== Page Metabox Start =========== //

//========================================= //



// hide page title

$page_meta->createOption( array(

    'name' => 'Hide Page Title',

    'id' => 'bodhi_toggle_page_title',

    'type' => 'checkbox',

    'default' => false,

));

$page_meta->createOption( array(

    'name' => 'Bodhi Yoga Owner',

    'id' => 'bodhi_owner_meta',

    'type' => 'text',

    'default' => 'Marcus Julian Felicetti',

));

$page_meta->createOption( array(

    'name' => 'Bodhi Yoga Founder',

    'id' => 'bodhi_founder_meta',

    'type' => 'text',

    'default' => 'Founder, Director, Primary Teacher',

));
$page_meta->createOption( array(
    'name' => 'Page Sub Heading',
    'id' => 'bodhi_page_subheading',
    'type' => 'text',
    'default' => '',
));
$page_meta->createOption( array(
    'name' => 'Register Button URL',
    'id' => 'bodhi_register_button_url',
    'type' => 'text',
    'default' => '',
));



//============================================= //

//========== Training Metabox Start =========== //

//============================================= //



// teacher trainig heading

$teacher_meta->createOption( array(

    'name' => 'Teacher Training Heading',

    'id' => 'bodhi_teacher_training_heading',

    'type' => 'text',

));

// teacher trainig sub heading

$teacher_meta->createOption( array(

    'name' => 'Teacher Training Sub Heading',

    'id' => 'bodhi_teacher_training_subheading',

    'type' => 'text',

));

// teacher trainig Location

$teacher_meta->createOption( array(

    'name' => 'Teacher Training Location',

    'id' => 'bodhi_teacher_training_location',

    'type' => 'text',

));

// teacher training start date

$teacher_meta->createOption( array(

    'name' => 'Training Start Date',

    'id' => 'bodhi_teacher_training_sdate',

    'type' => 'date',

    'desc' => 'Choose a starte date',

    'default' => '2015-10-10',

));

// teacher training end date

$teacher_meta->createOption( array(

    'name' => 'Training Start Date',

    'id' => 'bodhi_teacher_training_edate',

    'type' => 'date',

    'desc' => 'Choose a End date',

    'default' => '',

));



//================================================ //

//========== Testimonial Metabox Start =========== //

//================================================ //



// testimonial author

$testimonial_meta->createOption( array(

    'name' => 'Testimonial Author Meta',

    'id' => 'bodhi_testimonial_author_meta',

    'type' => 'text',

));



//================================================ //

//========== Teacher Metabox Start =========== //

//================================================ //



// teacher trainig heading

$teachers_meta->createOption( array(

    'name' => 'Teacher Meta',

    'id' => 'bodhi_teacher_meta',

    'type' => 'text',

));



}