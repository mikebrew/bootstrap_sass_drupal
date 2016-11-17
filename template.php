<?php
/**
 * @file
 * The primary PHP file for this theme.
 */

 function bootstrap_sass_preprocess_page(&$vars) {
   // Add JS & CSS by node type
     drupal_add_js( 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.min.js', 'external');
   // drupal_add_css( /* parameters */ );

 }
