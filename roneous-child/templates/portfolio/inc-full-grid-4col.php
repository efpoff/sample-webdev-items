<?php 
global $post;
$externalUrl    = isset($post->ID) ? get_post_meta( $post->ID, '_tlg_portfolio_external_url', 1 ) : '';
$target         = $externalUrl && get_post_meta( $post->ID, '_tlg_portfolio_url_new_window', 1 )  ? '_blank' : '_self';
$rel            = $externalUrl && get_post_meta( $post->ID, '_tlg_portfolio_url_nofollow', 1 )  ? 'nofollow' : '';
$portfolioLink  = $externalUrl ? $externalUrl : get_permalink();
?>
<div class="col-md-3 col-sm-6 project" data-filter="<?php echo esc_html__( 'All', 'roneous' ).','.roneous_the_terms( 'portfolio_category', ',', 'name' ); ?>" 
		data-groups='["<?php echo roneous_the_terms( 'portfolio_category', '","', 'slug' ); ?>"]'>
    <div class="image-box hover-block text-center">
        <?php the_post_thumbnail( 'roneous_box', array('class' => 'background-image') ); ?>
        <div class="hover-state">
            <a href="<?php echo esc_url( $portfolioLink ); ?>" target="<?php echo esc_attr($target); ?>" rel="<?php echo esc_attr($rel); ?>" >
                <?php the_title('<h4 class="mx-text mb8">', '</h4><h6>'. roneous_the_terms( 'portfolio_category', ' / ', 'name' ) .'</h6>'); ?>
            </a>
        </div>
    </div>
</div>