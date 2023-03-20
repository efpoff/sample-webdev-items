<?php $logos = roneous_get_logo(); ?>
<div class="nav-container">
    <nav>
        <div class="nav-bar">
            <div class="module left">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php if( $logos['logo_text'] && 'text' == $logos['site_logo'] ) : ?>
                        <h1 class="logo"><?php echo $logos['logo_text']; ?></h1>
                    <?php else: ?>
                    <img class="logo logo-light" alt="<?php echo esc_attr(get_bloginfo('title')); ?>" src="<?php echo esc_url($logos['logo_light']); ?>" />
                    <img class="logo logo-dark" alt="<?php echo esc_attr(get_bloginfo('title')); ?>" src="<?php echo esc_url($logos['logo']); ?>" />
                    <?php endif; ?>
                </a>
            </div>
            <div class="module widget-wrap mobile-toggle right visible-sm visible-xs">
                <i class="ti-menu"></i>
            </div>
            <div class="module-group right">
                <div class="module left">
                    <?php
            	    wp_nav_menu( 
            	    	array(
            		        'theme_location'    => 'primary',
            		        'depth'             => 3,
            		        'container'         => false,
            		        'container_class'   => false,
            		        'menu_class'        => 'menu',
            		        'fallback_cb'       => 'Roneous_Nav_Walker::fallback',
            		        'walker'            => new Roneous_Nav_Walker()
            	        )
            	    );
                    ?>
                </div>
				<?php get_template_part( 'templates/header/inc', 'icons' ); ?>
            </div>
        </div>
    </nav>
	</div>
<?php get_template_part( 'templates/header/inc', 'hour' ); ?>