<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GOOGLE_ID_HERE');</script>
<!-- End Google Tag Manager -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GOOGLE_ID_HERE"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<?php if ( 'yes' == get_option('roneous_enable_preloader', 'no') ) : ?>
		<div id="tlg_preloader"><span class="spinner"></span></div>
	<?php endif; ?>
	<?php if( 'border-layout' == roneous_get_body_layout() ) : ?>
		<span class="tlg_border border--top"></span>
		<span class="tlg_border border--bottom"></span>
		<span class="tlg_border border--right"></span>
		<span class="tlg_border border--left"></span>
	<?php endif; ?>
	<?php get_template_part( 'templates/header/layout', roneous_get_header_layout() ); ?>
	<div class="main-container">