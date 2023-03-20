<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-167416058-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-167416058-1');
	</script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=yes" />
    <?php if ( $description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>
    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>

    <!-- Stylesheets -->
    <?php
    queue_css_file(array('style', 'iconfonts'));
    queue_css_url('https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,700i');
    echo head_css();
    echo $this->partial('common/custom_colors.php');
    ?>
	
    <!-- JavaScripts -->
    <?php
	queue_js_file('vendor/respond'); 
	queue_js_file('vendor/jquery-accessibleMegaMenu');
	queue_js_file(array('globals'));
	queue_js_file(array('centerrow'), 'js'); 
	
    echo head_js();
    ?>
</head>

<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <a href="#content" id="skipnav"><?php echo __('Skip to main content'); ?></a>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
    <div id="wrap">

        <header role="banner">
			<div class="primary-header">
            <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>

            <div id="site-title"><?php echo link_to_home_page(theme_logo()); ?></div>
			<nav id="top-nav" class="top" role="navigation">
			
                <?php echo public_nav_main(); ?>
				<div class="nav-toggle">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</div>
            </nav>
			
			</div>
			<div class="top-search-bar">
				<div id="search-container" role="search">
					<?php if (get_theme_option('use_advanced_search') === null || get_theme_option('use_advanced_search')): ?>
					<?php echo search_form(array('show_advanced' => true)); ?>
					<?php else: ?>
					<?php echo search_form(); ?>
					<?php endif; ?>
				</div>
			</div>
            <?php if ($bodyid=='home'):?>
                  <?php echo theme_header_image(); ?>
			<?php endif ?>

        </header>
		<article id="content" role="main">

            <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
