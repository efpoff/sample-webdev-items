</article><!-- end content -->

<footer role="contentinfo">
 <div id="footer-content" class="center-div">
	<div class="row">
	 <div class="col-md-6">
	 <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
             <?php echo $copyright; ?>
			 <?php else : ?>
				&nbsp;
        <?php endif; ?>
        <?php if($footerText = get_theme_option('Footer Text')): ?>
          <?php echo get_theme_option('Footer Text'); ?>
		  
        <?php endif; ?>
        
		</div>
        <div class="col-md-6 footer-omeka">
			<?php echo __('Proudly powered by <a href="http://omeka.org">Omeka</a>.'); ?>
		</div>
	</div><!-- end row -->
  </div><!-- end footer-content -->
     <?php fire_plugin_hook('public_footer', array('view'=>$this)); ?>
</footer>
</div><!-- end wrap -->
<script type="text/javascript">
    jQuery(document).ready(function(){
		Omeka.showAdvancedForm();
        Omeka.skipNav
		Omeka.megaMenu("#top-nav");
    });
</script>

</body>

</html>
