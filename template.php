<?php
function illuminate_preprocess_page() {
  $commands = array();
  $commands[] = array(
    'selector' => '#header-top-inner',
    'effect' => 'round',
    'corners' => 'bottom',
    'width' => 10,
  );
  $commands[] = array(
    'selector' => '#header-site-info',
    'effect' => 'round',
    'corners' => 'top',
    'width' => 10,
  );
  $commands[] = array(
    'selector' => '#ifooter',
    'effect' => 'round',
    'corners' => 'bottom',
    'width' => 10,
  );

  // Add the rounded corners.
  rounded_corners_add_corners($commands);
  $variables['scripts'] = drupal_get_js();
}
