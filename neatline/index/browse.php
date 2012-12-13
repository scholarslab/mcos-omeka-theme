<?php
$title = __('Neatline | Browse Exhibits');
head(array('content_class' => 'neatline', 'bodyclass' => 'neatline neatline-browse browse', 'title' => $title));
?>
<div id="primary">
<?php echo flash(); ?>
<h1><?php echo $title; ?></h1>
<?php

/* 
Specify the order of Neatlines listing by the following IDs:
*/

$ids = array(8,5,12,6,7,9,10,11);
$neatlines = array();
foreach ($ids as $id) {
    $neatlines[] = get_neatline_by_id($id);
}
set_neatlines_for_loop($neatlines);
?>
<?php if(has_neatlines_for_loop()): while (loop_neatlines()): ?>
<div id="neatline-<?php echo neatline('id'); ?>">
    <h2 class="title"><?php echo link_to_neatline(); ?></h2>
    <?php echo neatline('description', array('snippet' => 250)); ?>
</div>
<?php endwhile; ?>

<!-- Pagination. -->
<div class="pagination"><?php echo pagination_links(); ?></div>
<?php endif; ?>
</div>

<?php foot(); ?>
