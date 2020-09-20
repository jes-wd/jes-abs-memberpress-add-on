<?php 

// code for testing ==============================================================================================



// functions that will be used in events ================================================================

function upgrade_user($subscription, $user) {
  // set default ultimate member subscription type
  $sub_type = "earth_pass";
  // if user has purchased a moon or mars sub then set um sub type to the one they purchased
  switch ($subscription->product_id) {
    case "13760" : // check mpress product id of purchased product
      $sub_type = "moon_pass";
      break;
    case "13761" : 
      $sub_type = "mars_pass";
      break;
  }
  // set um role to user
  wp_update_user( array ('ID' => $user->ID, 'role' => 'um_user') ) ;
  // update acf field associated with ticket type
  update_field('register_plan', $sub_type, 'user_' . $user->ID);
  // if $sub_type is still moon pass, then it's most likely not working properly
  // -so output the objects to the log file
  if ($sub_type = "earth_pass") {
    ob_start();
    echo '---------- likely bug in code, objects printed below ---------------- \n';
    var_dump($subscription);
    echo '\n \n';
    var_dump($user);
    echo '---------- end objects ---------------- \n';
    $result = ob_get_clean();
    $fp = fopen(plugin_dir_path( __FILE__ ) . 'log.txt', 'a');//opens file in append mode
    fwrite($fp, $result);
    fclose($fp); 
  }
}

function downgrade_user($user) {
  // set default ultimate member subscription type to downgrade to
  $sub_type = "earth_pass";
  // update acf field associated with ticket type
  update_field('register_plan', $sub_type, 'user_' . $user->ID);
}

// on subscription created or resumed events =====================================================================
function mepr_capture_new_sub($event) {
  $subscription = $event->get_data();
  $user = $subscription->user();

  upgrade_user($subscription, $user);
}
add_action('mepr-event-subscription-created', 'mepr_capture_new_sub');
add_action('mepr-event-non-recurring-transaction-completed', 'mepr_capture_new_sub');
add_action('mepr-event-subscription-resumed', 'mepr_capture_new_sub');

// on subscription stopped event =====================================================================
function mepr_capture_stopped_sub($event) {
  $subscription = $event->get_data();
  $user = $subscription->user();

  downgrade_user($user);
}
add_action('mepr-event-subscription-stopped', 'mepr_capture_stopped_sub');

// on subscription paused event =====================================================================
function mepr_capture_paused_sub($event) {
  $subscription = $event->get_data();
  $user = $subscription->user();
  
  downgrade_user($user);
}
add_action('mepr-event-subscription-paused', 'mepr_capture_paused_sub');

















// on subscription resumed event =====================================================================
// function mepr_capture_resumed_sub($event) {
//   $subscription = $event->get_data();
//   $user = $subscription->user();

//   upgrade_user($subscription, $user);
// }
// add_action('mepr-event-subscription-resumed', 'mepr_capture_resumed_sub');

