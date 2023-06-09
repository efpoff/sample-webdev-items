<?php
$pageTitle = __('References');
echo head(array(
    'title' => $pageTitle,
    'bodyclass' => 'reference',
));
$reference_hide_empty = (boolean) get_option('reference_hide_empty');
?>
<div id="primary">
    <h1><?php echo $pageTitle; ?></h1>
    <nav class="items-nav navigation secondary-nav">
        <?php echo public_nav_items(); ?>
    </nav>
    <?php if (empty($types)): ?>
        <p><?php echo __('No references available.'); ?></p>
    <?php else: ?>
        <?php
    if (count($types) == 1): ?>
        <ul class='references'>
        <?php foreach ($references as $slug => $slugData):
            if (!$reference_hide_empty || $this->reference()->count($slug) > 0):
                echo '<li>';
                echo sprintf(
                    '<a href="%s" title="%s">%s (%d)</a>',
                    html_escape(url(array('slug' => $slug), 'reference_list')),
                    __('Browse %s', __($slugData['label'])),
                    __($slugData['label']),
                    $this->reference()->count($slug)
                );
                echo '</li>';
            endif;
        endforeach; ?>
        </ul>
    <?php else: ?>
        <ul class='references'>
        <?php
        // References are ordered: Item Types, then Elements.
        $type = null;
        $first = true;
        foreach ($references as $slug => $slugData):
            $changedType = $slugData['type'] != $type;
            if ($changedType):
                if ($first):
                    $first = false;
                else: ?>
                    </ul></li>
                <?php endif; ?>
            <li><?php
                echo $slugData['type'] == 'ItemType' ?  __('Main Types of Items') : __('Metadata');
                $type = $slugData['type'];
            ?><ul>
            <?php endif; ?>
            <?php
            if (!$reference_hide_empty || $this->reference()->count($slug) > 0):
                echo '<li>';
                echo sprintf(
                    '<a href="%s" title="%s">%s (%d)</a>',
                    html_escape(url(array('slug' => $slug), 'reference_list')),
                    __('Browse %s', __($slugData['label'])),
                    $slugData['label'],
                    $this->reference()->count($slug)
                );
                echo '</li>';
            endif;
            ?>
        <?php endforeach; ?>
        </ul></li>
    <?php endif; ?>
    </ul>
    <?php endif; ?>
</div>
<?php echo foot();
