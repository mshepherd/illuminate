<?php
/**
* Override or insert PHPTemplate variables into the templates.
*/
function acquia_prosper_preprocess_page(&$vars) {

  // Add per content type pages
  if (isset($vars['node'])) {

  // Add template naming suggestion. It should alway use hyphens.
  // If node type is "custom_news", it will pickup "page-custom-news.tpl.php".
  $vars['template_files'][] = 'page-'. str_replace('_', '-', $vars['node']->type);
  }

}
function illuminate_preprocess_page(&$vars) {
  // Add per content type pages
  if (isset($vars['node'])) {
    // Add template naming suggestion. It should alway use hyphens.
    // If node type is "custom_news", it will pickup "page-custom-news.tpl.php".
    $vars['template_files'][] = 'page-'. str_replace('_', '-', $vars['node']->type);
  }

  if ($stylor = pagestyle_get_current()) {
    if ($stylor != 'standard') {
      $vars['body_classes'] .= ' pagestyle_'. $stylor;
    }
  }

  $commands = array();
  $commands[] = array(
    'selector' => '.image-body-content',
    'effect' => 'round',
    'corners' => 'all',
    'width' => 10,
  );
  $commands[] = array(
    'selector' => '#header-top-inner',
    'effect' => 'round',
    'corners' => 'bottom',
    'width' => 10,
  );
  $commands[] = array(
    'selector' => '#preface-top-inner',
    'effect' => 'round',
    'corners' => 'all',
    'width' => 5,
  );
  $commands[] = array(
    'selector' => '#header-group-inner',
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
function illuminate_preprocess_search_block_form(&$vars, $hook) {
  // Note that in order to theme a search block you should rename this function
  // to yourthemename_preprocess_search_block_form and use
  // 'search_block_form' instead of 'search_theme_form' in the customizations
  // bellow.

  //get site name
  $site_name = variable_get('site_name', "this website");
  $search_string = 'Search '. strtolower($site_name);
  

  // Modify elements of the search form
  $vars['form']['search_block_form']['#title'] = t('');

  // Set a default value for the search box
  $vars['form']['search_block_form']['#value'] = t($search_string);

  // Set a default width for the search box
  $vars['form']['search_block_form']['#size'] = 26;

  // Add a custom class to the search box
  $vars['form']['search_block_form']['#attributes'] = array(
    'class' => 'NormalTextBox txtSearch',
    'onfocus' => "if (this.value == '$search_string') {this.value = '';}",
    'onblur' => "if (this.value == '') {this.value = '$search_string';}");

  // Rebuild the rendered version (search form only, rest remains unchanged)
  unset($vars['form']['search_block_form']['#printed']);
  $vars['search']['search_block_form'] = drupal_render($vars['form']['search_block_form']);

  // Rebuild the rendered version (submit button, rest remains unchanged)
  unset($vars['form']['submit']['#printed']);
  $vars['search']['submit'] = drupal_render($vars['form']['submit']);

  // Collect all form elements to make it easier to print the whole form.
  $vars['search_form'] = implode($vars['search']);
}
