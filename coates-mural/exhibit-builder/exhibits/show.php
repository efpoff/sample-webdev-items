<?php
echo head(array(
    'title' => metadata('exhibit_page', 'title') . ' &middot; ' . metadata('exhibit', 'title'),
    'bodyclass' => 'exhibits show'));
?>

<h1><span class="exhibit-page"><?php echo metadata('exhibit_page', 'title'); ?></span></h1>

<div id="exhibit-blocks">
<?php exhibit_builder_render_exhibit_page(); ?>
</div>

<div id="exhibit-page-navigation">  
</div>

<nav id="exhibit-pages">
   <h4>Exhibit</h4>
   <?php echo exhibit_builder_page_tree($exhibit, $exhibit_page); ?>
</nav>
<?php echo foot(); ?>
