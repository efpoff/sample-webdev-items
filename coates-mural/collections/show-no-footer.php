<?php
$collectionTitle = metadata('collection', 'display_title');
$totalItems = metadata('collection', 'total_items');
$collIdentity = metadata('collection', 'id');
?>
<!-- URL and JQUERY Scripts -->
<?php 
queue_js_url('//unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js'); 
queue_js_file('mural','js');
?>

<?php echo head(array('title' => $collectionTitle, 'bodyclass' => 'collections show')); ?>

<h1><?php echo $collectionTitle; ?></h1>
<?php if(plugin_is_active('CollectionTree')) :
		 $treeChildren = get_db()->getTable('CollectionTree')->getChildCollections($collIdentity);
		 if(!empty($treeChildren)): 	?>
		<div class="button-group center-align filters-button-group">
			<button class="button is-checked" data-filter="*">show all</button>
			<?php	foreach($treeChildren as $treeChild): 
					$linkid = ($treeChild['id']); 
					$childname = ($treeChild['name']); 			?>
			 <button class="button" data-filter=".coll-<?php echo $linkid; ?>"><?php echo $childname; ?></button>
			<?php endforeach; ?>
		</div>
	  <?php endif; ?>
<?php endif; ?>
<div class="button-group sort-button-group">
	  <button class="button is-checked" data-sort="original-order">Date Added</button>
	  <button class="button" data-sort="itmname">Title</button>
</div>	

<div id="collection-items" class="items browse">
    <?php if ($totalItems > 0): ?>
	     <?php foreach (loop('items') as $item): ?>
		  <?php $itemTitle = metadata('item', 'display_title'); ?>
		<div class="item hentry isocollect coll-<?php echo metadata('item', 'collection_id'); ?>">
            <div class="item-meta">
            <?php if (metadata('item', 'has files')): ?>
            <div class="item-img">
                <?php echo link_to_item(item_image()); ?>
            </div>
            <?php endif; ?>
            <h2><?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink itmname')); ?></h2>
			
            <?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' =>$item)); ?>
            </div><!-- end class="item-meta" -->
        </div><!-- end class="item hentry" -->
        <?php endforeach; ?>
         <?php else: ?>
        <p><?php echo __("There are currently no items within this collection."); ?></p>
    <?php endif; ?>
</div><!-- end collection-items -->
<?php // fire_plugin_hook('public_collections_show', array('view' => $this, 'collection' => $collection)); ?>


<?php echo foot(); ?>
