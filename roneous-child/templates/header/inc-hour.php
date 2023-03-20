<?php $removeHours = get_post_meta($post->ID, 'removeHours', $single = true);
				if ($removeHours !== 'true') { ?>
				
					<div class="nav-hours">
							<div class="module header_top1">
								Today's Hours: <?php echo do_shortcode('[mbhi_hours_today location="Coates Library" output="inline" dayentryseparator="—"]'); ?> | <a href="<?php echo site_url('/hours/'); ?>">Hours</a>
							</div>
					</div>

				<?php } else {	?>
					<div class="nav-hours">    
								<div class="module header_top1">Special Collections and Archives is closed at this time. Limited virtual reference is available by emailing archives@trinity.edu</div>
					</div>

<?php } ?>