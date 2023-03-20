<?php
$pageTitle = __('Browse Items');
echo head(array('title' => $pageTitle, 'bodyclass' => 'items tags'));

function sortTags($a, $b) {
    return (strtolower($a['name']) < strtolower($b['name'])) ? -1 : 1;
}

usort($tags, 'sortTags');
 
$letters = array('number' => false) + array_fill_keys(range('A', 'Z'), false);
$groupedTags = array();
foreach($tags as $tag) {
    $initial = strtolower( substr($tag['name'], 0, 1) );
    $groupedTags[$initial][] = $tag;
	if (strlen($initial) == 0 || preg_match('/\W|\d/u', $initial)):
                $letters['number'] = true;
            else:
                $letters[strtoupper($initial)] = true;
            endif;
}

?>

<h1><?php echo $pageTitle; ?></h1>

<nav class="navigation items-nav secondary-nav">
    <?php echo public_nav_items(); ?>
</nav>
<?php $pagination_list = '<ul class="pagination_list">';
        foreach ($letters as $letter => $isSet):
            $letterDisplay = $letter == 'number' ? '#0-9' : $letter;
           if ($isSet):
                $pagination_list .= sprintf('<li class="pagination_range"><a href="#%s">%s</a></li>', $letter, $letterDisplay);
            else:
                $pagination_list .= sprintf('<li class="pagination_range"><span>%s</span></li>', $letterDisplay);
            endif;
        endforeach;
        $pagination_list .= '</ul>'; 
?>
		<div class="pagination reference-pagination" id="pagination-top">
			<?php echo $pagination_list; ?>
		</div>
		
<?php 
 $current_heading = '';
 $current_id = '';
 foreach($groupedTags as $initial => $tags): 

            $first_char = function_exists('mb_substr') ? mb_substr($initial, 0, 1) : substr($initial, 0, 1);
            if (strlen($first_char) == 0 || preg_match('/\W|\d/u', $first_char)) {
                $first_char = '#0-9';
            }
			$current_first_char = strtoupper($first_char);
            if ($current_heading !== $current_first_char):
                $current_heading = $current_first_char;
                $current_id = $current_heading === '#0-9' ? 'number' : $current_heading;
?>
			<h3 class="reference-heading" id="<?php echo $current_id; ?>"><?php echo $current_heading; ?></h3>
<?php
            endif;
			
?>

    <?php foreach ($tags as $tag):
    $name = $tag['name'];
    ?>
    <p><?php echo '<a href="' . html_escape(url('items/browse', array('tags' => $name))) . '" rel="tag">' . html_escape($name) . '</a>'?></p>
    <?php endforeach;?>
<?php endforeach;?>


<?php echo foot(); ?>