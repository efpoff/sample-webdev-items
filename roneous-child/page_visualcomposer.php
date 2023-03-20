<?php 
get_header();
the_post();
$page_title_args = array(
	'title'   	=> get_the_title(),
	'subtitle'  => get_post_meta( $post->ID, '_tlg_the_subtitle', true ),
	'layout' 	=> get_post_meta( $post->ID, '_tlg_page_title_layout', true ),
	'image'     => get_post_meta( $post->ID, '_tlg_title_bg_featured', true ) == 'yes' ? 
        ( has_post_thumbnail() ? wp_get_attachment_image( get_post_thumbnail_id(), 'full', 0, array('class' => 'background-image') ) : false ) :
        ( get_post_meta( $post->ID, '_tlg_title_bg_img', true ) ? '<img class="background-image" src="'.esc_url(get_post_meta( $post->ID, '_tlg_title_bg_img', true )).'" />' : false )
);
echo roneous_get_the_page_title( $page_title_args );
?>

<?php if ( is_active_sidebar( 'page' ) ) { ?>
	<?php // if page has custom field called enableSidebar = true, add sidebar
				$enableSidebar = get_post_meta($post->ID, 'enableSidebar', $single = true);
				if ($enableSidebar == 'true') { ?>
					<section id="page-<?php the_ID(); ?>" <?php post_class( 'p0' ); ?>>
						<div class="container">
							<div class="row">
								<div id="main-content" class="col-md-9 col-sm-12">
									<div class="tlg-page-wrapper">
										<a id="home" href="#"></a>
										<?php the_content(); wp_link_pages(); comments_template(); ?>
									</div>	
								</div>
							<?php	 get_sidebar('page');  ?>
								</div>
							</div>
					</section>
		
	<?php	} else { ?>
		<div class="tlg-page-wrapper">
			<a id="home" href="#"></a>
			<?php if( is_single() ) get_template_part( 'templates/post/inc', 'pagination'); ?>
			<?php the_content(); ?>
		</div>
		<?php if ( comments_open() && 'yes' == get_option('roneous_enable_page_comment', 'no') ) : ?>
		<section>
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<?php comments_template(); ?>
					</div>
				</div>
			</div>
		</section>
		<?php endif; ?>
	<?php }	?>
	      
	   
    
<?php } ?>
<?php get_footer();