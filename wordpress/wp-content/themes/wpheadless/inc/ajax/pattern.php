<?php

// add_action( 'wp_ajax_(action)', 'action_callback' );
// add_action( 'wp_ajax_nopriv_(action)', 'action_callback' );
function action_callback()
{
 $whatever = intval($_POST['whatever']);
 echo $whatever;
 wp_die();
}
