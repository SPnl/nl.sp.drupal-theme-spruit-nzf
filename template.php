<?php

  // Nothing here, but it is required by mailsystem

function spruit_nzf_js_alter(&$javascript) {
  unset($javascript['sites/all/themes/spruit/js/myfonts.js']);
  unset($javascript['sites/all/themes/spruit/js/vendor/owl.carousel.min.js']);
}

function spruit_nzf_preprocess_html(&$variables) {
  /* drupal_add_css(
    'https://fonts.googleapis.com/css?family=Roboto:400,500,700,300', array('type' => 'external')
  ); */
}

function spruit_nzf_css_alter(&$css) {
  foreach ($css as $key => $value) { $css[$key]['preprocess'] = FALSE; }
}
