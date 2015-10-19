<?php
add_action( 'tf_create_options', 'bodhi_yoga_create_options' );
function bodhi_yoga_create_options() {

// Get Framework Instance
$bodhi_yoga = TitanFramework::getInstance( 'bodhi-yoga' );

//====================================== //
//======== Theme Options Panel ========= //
//====================================== //
$bodhi_options = $bodhi_yoga->createAdminPanel( array(
    'name' => 'Bodhi Options',
));

//====================================== //
//======== Options General tab ========= //
//====================================== //
$gen_tab = $bodhi_options->createTab( array(
    'name' => 'General',
));

//======================================== //
//============ Options Start ============= //
//======================================== //

// test option
$bodhi_options->createOption( array(
    'name' => 'Test',
    'id' => 'my_test_option',
    'type' => 'text',
    'desc' => 'This is test option'
) );

//====================================== //
//============ Save Values ============= //
//====================================== //
$bodhi_options->createOption( array(
    'type' => 'save'
));

}