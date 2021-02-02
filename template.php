<?php

/* OLD NZF THEME */

function nzf_js_alter(&$javascript) {
  unset($javascript['sites/all/themes/nzf/js/myfonts.js']);
  unset($javascript['sites/all/themes/nzf/js/vendor/owl.carousel.min.js']);
}

function nzf_form_alter($form, &$form_state,$form_id){
  if ($form_id == 'search_block_form') {
    $form['actions']['submit']['#value'] = 'S';
    $form['search_block_form']['#attributes']['placeholder'] = t("Search");
 }
  if ($form_id == 'webform_client_form_15') {
      $form['#attributes']['autocomplete'] = 'off';
  }
}


/* OLD SPRUIT THEME */

/**
 * Implements hook_css_alter().
 */
function nzf_css_alter(&$css) {

  /**
   * If stylesheets from core or modules cause trouble in your theme add the path to spruit.info 
   * before you start overriding classes
   */
  $stylesheets = theme_get_setting('unset_styles');
  foreach($stylesheets as $path) {
    unset($css[$path]);
  }
}

/**
 * Implements template_preprocess_page().
 */
function nzf_preprocess_page(&$variables) {

/* Adding theme path to JS, for MyFonts */
  drupal_add_js('jQuery.extend(Drupal.settings, { "pathToTheme": "' .base_path().drupal_get_path('theme', 'spruit'). '" });', 'inline');

  /**
   * Templates for content type pages
   * page--type-name.tpl.php
   */
  if (isset($variables['node']->type)) {
    $variables['theme_hook_suggestions'][]='page__'.$variables['node']->type;
  }
}

/**
 * Implements template_preprocess_block().
 */
function nzf_preprocess_block(&$variables) {
  $variables['title_attributes_array']['class'][] = 'title';
}

/**
 * Implements theme_status_messages().
 */
function nzf_status_messages($variables) {
  $display = drupal_get_messages($variables['display']);
  $output = array();

  if($display) {
    $output[]= '<section class="messages">';

    foreach ($display as $type => $messages) {
      $output[] = "<div class=\"message $type\">";

      if (count($messages) > 1) {
        $output[] = "<ul>";
        foreach ($messages as $message) {
          $output[] = '<li>' . $message . "</li>";
        }
        $output[] = "</ul>";
      } else {
        $output[] = $messages[0];
      }
      $output[] = "</div>";
    }
    $output[]= '</section>';
  }
  return implode("\n", $output);
}

/**
 * Implements theme_breadcrumb().
 */
function nzf_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  $crumbs = '';

  if (!empty($breadcrumb)) {
      $crumbs .= '<ul>';
      foreach($breadcrumb as $value) {
        $crumbs .= '<li>'.$value.'</li>';
      }
      $crumbs .= '</ul>';
    }
  return $crumbs;
}

/**
 * Implements theme_menu_local_tasks().
 */
function nzf_menu_local_tasks(&$variables){
  $output = '';

  if (!empty($variables['primary'])) {
    $variables['primary']['#prefix'] = '<ul class="primary">';
    $variables['primary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['primary']);
  }
  if (!empty($variables['secondary'])) {
    $variables['secondary']['#prefix'] = '<ul class="secondary">';
    $variables['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['secondary']);
  }
  if(!empty($output)) {
    $output = '<nav class="tabs">'.$output.'</nav>';
  }
  return $output;
}

/**
 * Implements theme_preprocess_book_navigation().
 */
function nzf_preprocess_book_navigation(&$variables) {
  $variables['full_tree'] = '';
  $book_link = $variables['book_link'];

  if($book_link) {
    $flat = menu_tree_all_data($book_link['menu_name'], $book_link);
    $elements = menu_tree_output($flat);
    $variables['full_tree'] = drupal_render($elements);
  }
}



