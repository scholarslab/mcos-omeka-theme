<?php

/**
 * Adds theme assets to queues, then displays CSS and JS.
 *
 * - Respond.js
 * - Selectivizr
 * - Modernizr
 * - Theme style sheet.
 */
function load_theme_assets() {
  $respondSrc = src('respond.min.js', 'javascripts');
  $selectivizrSrc = src('selectivizr.min.js', 'javascripts');

  $modernizrLoad = "Modernizr.load([{test: Modernizr.mq(), nope: "
    . "['$respondSrc' '$selectivizrSrc']}]);";

  queue_js('modernizr.min');
  queue_js_string($modernizrLoad);

  queue_css('style');

  __v()->headLink()->prependStylesheet('http://fonts.googleapis.com/css?family=Bitter:400,700,400italic', 'screen');

  display_css();
  display_js();
}
