<?php

function spruit_nzf_js_alter(&$javascript) {
  unset($javascript['sites/all/themes/spruit/js/myfonts.js']);
  unset($javascript['sites/all/themes/spruit/js/vendor/owl.carousel.min.js']);
}

function spruit_nzf_form_alter($form, &$form_state,$form_id){
  if ($form_id == 'webform_client_form_15') {
      $form['#attributes']['autocomplete'] = 'off';
  }
}

