<?php

/**
 * Adds theme assets to queues, then displays CSS and JS.
 *
 * - Modernizr
 * - Respond.js
 * - Selectivizr
 * - Google Fonts style sheet.
 * - Theme style sheet.
 */
function load_theme_assets() {
  queue_js('modernizr.min');

  $respondSrc = src('respond.min.js', 'javascripts');
  $modernizrLoad = "Modernizr.load([{test: Modernizr.mq(), nope: " . "['$respondSrc']}]);";
  queue_js_string($modernizrLoad);

  __v()->headScript()->appendFile(src('selectivizr.min.js', 'javascripts'), 'text/javascript', array('conditional' => 'lt IE 9'));

  __v()->headLink()->prependStylesheet('http://fonts.googleapis.com/css?family=Bitter:400,700,400italic', 'screen');

  queue_css('style');

  display_js();
  display_css();
}
