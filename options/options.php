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
    'name' => 'Home',
));
$social_tab = $bodhi_options->createTab( array(
    'name' => 'Social',
));

//======================================== //
//============ Options Start ============= //
//======================================== //

// Main heading
$gen_tab->createOption( array(
    'name' => 'Main Heading',
    'id' => 'bodhi_main_heading',
    'type' => 'text',
    'desc' => 'Home page main heading. Header image heading.',
    'default' => 'AWAKEN<span class="dot">&middot;</span>HEAL<span class="dot">&middot;</span>INSPIRE'
) );
// sub heading
$gen_tab->createOption( array(
    'name' => 'sub Heading',
    'id' => 'bodhi_sub_heading',
    'type' => 'text',
    'desc' => 'Home page sub heading. Header image heading.',
    'default' => 'Come and Join the Yoga Teacher Training'
) );

// facebook
$social_tab->createOption( array(
    'name' => 'facebook',
    'id' => 'bodhi_social_facebook',
    'type' => 'text',
));
// instagram
$social_tab->createOption( array(
    'name' => 'instagram',
    'id' => 'bodhi_social_instagram',
    'type' => 'text',
));
// tumblr
$social_tab->createOption( array(
    'name' => 'tumblr',
    'id' => 'bodhi_social_tumblr',
    'type' => 'text',
));
// twitter
$social_tab->createOption( array(
    'name' => 'twitter',
    'id' => 'bodhi_social_twitter',
    'type' => 'text',
));

//====================================== //
//============ Save Values ============= //
//====================================== //
$bodhi_options->createOption( array(
    'type' => 'save'
));

}