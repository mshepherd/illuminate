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
  $commands[] = array(
    'selector' => '#sidebar-first-inner .block',
    'effect' => 'round',
    'corners' => 'all',
    'width' => 5,
  );
  $commands[] = array(
    'selector' => '#sidebar-last-inner .block',
    'effect' => 'round',
    'corners' => 'all',
    'width' => 5,
  );

  // Add the rounded corners.
  rounded_corners_add_corners($commands);
  $variables['scripts'] = drupal_get_js();
}
