<?php if ($subjectRelations || $objectRelations): ?>
<div id="item-relations-display-item-relations">
    <h3>Related Items</h3>
    <?php if ($subjectRelations): ?>
    <ul>
    <?php foreach ($subjectRelations as $subjectRelation): ?>
    <li>
        <?php $item = get_item_by_id($subjectRelation['object_item_id']); ?>
        <?php if (item_has_thumbnail($item)) : ?>
        <?php echo item_square_thumbnail(null, 0, $item); ?>
        <?php endif; ?>
        <a href="<?php echo uri('items/show/' . $subjectRelation['object_item_id']); ?>"><?php echo $subjectRelation['object_item_title']; ?></a>
    </li>
    <?php endforeach; ?>
    </ul>
    <?php endif; ?>
    <?php if ($objectRelations): ?>
    <ul>
    <?php foreach ($objectRelations as $objectRelation): ?>
    <li>
        <?php $item = get_item_by_id($objectRelation['subject_item_id']); ?>
        <?php if (item_has_thumbnail($item)) : ?>
        <?php echo item_square_thumbnail(null, 0, $item); ?>
        <?php endif; ?>
        <a href="<?php echo uri('items/show/' . $objectRelation['subject_item_id']); ?>"><?php echo $objectRelation['subject_item_title']; ?></a>
        </li>
    <?php endforeach; ?>
    </ul>
    <?php endif; ?>
</div>
<?php endif; ?>
