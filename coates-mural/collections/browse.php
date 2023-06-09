<?php
$pageTitle = __('Browse Collections');
echo head(array('title'=>$pageTitle,'bodyclass' => 'collections browse'));
?>

<h1><?php echo $pageTitle; ?> </h1>
<?php echo pagination_links(); ?>

<?php
$sortLinks[__('Title')] = 'Dublin Core,Title';
$sortLinks[__('Date Added')] = 'added';
?>

<div id="sort-links">
    <span class="sort-label"><?php echo __('Sort by: '); ?></span><?php echo browse_sort_links($sortLinks); ?>
</div>
<div class="records">
    <?php foreach (loop('collections') as $collection): ?>
	<?php $background = ''; ?>
    <?php if ($collectionImage = $collection->getFile()): ?>
        <?php $imageUrl = file_display_url($collectionImage, 'fullsize'); ?>
        <?php $background = sprintf('style="background-image:url(%s)"', $imageUrl); ?>
    <?php endif; ?>
    <div class="collection record" <?php echo $background; ?>>
    
        <div class="record-meta">
		<h2><?php echo link_to_collection(); ?></h2>
           
        </div>
    
        <?php fire_plugin_hook('public_collections_browse_each', array('view' => $this, 'collection' => $collection)); ?>
    </div><!-- end class="collection" -->
    <?php endforeach; ?>
</div>


<?php fire_plugin_hook('public_collections_browse', array('collections'=>$collections, 'view' => $this)); ?>

<?php echo foot(); ?>
