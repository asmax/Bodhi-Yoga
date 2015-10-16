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

//============================================ //
//========== Teacher Metabox Start =========== //
//============================================ //

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

}