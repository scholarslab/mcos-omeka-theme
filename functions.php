<?php

/**
 * adds theme assets to queues.
 *
 * - Modernizr
 * - Respond.js
 * - Selectivizr
 * - Google Fonts style sheet.
 * - Theme style sheet.
 */
function queue_theme_assets() {

  queue_js_file('modernizr.min');

  $respondSrc = src('respond.min.js', 'javascripts');
  $modernizrLoad = "Modernizr.load([{test: Modernizr.mq(), nope: " . "['$respondSrc']}]);";
  queue_js_string($modernizrLoad);

  get_view()->headScript()->appendFile(src('selectivizr.min.js', 'javascripts'), 'text/javascript', array('conditional' => 'lt IE 9'));
  get_view()->headLink()->prependStylesheet('http://fonts.googleapis.com/css?family=Open+Sans|Bitter:400,700,400italic', 'screen');

  queue_css_file('style');

}

function get_neatline_by_id($id) {

    return get_db()->getTable('NeatlineExhibit')->find($id);

}

function mcos_item_relations($item = null) {

    $item = $item ? $item : get_current_item();
    $subjectRelations = ItemRelationsPlugin::prepareSubjectRelations($item);
    $objectRelations = ItemRelationsPlugin::prepareObjectRelations($item);
    return __v()->partial('common/_item_relations.php', array('subjectRelations' => $subjectRelations, 'objectRelations' => $objectRelations) );

}
