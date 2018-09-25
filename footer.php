	<footer class="footer">
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<?php 
						if(is_active_sidebar('footer-sidebar')){
							dynamic_sidebar('footer-sidebar');
						} 
						else{
							_e('Please setting footer sidebar in widgets','finazi');
						}

					?>	
				</div>
			</div>
		</div>
		<div class="bottom_footer">
			
			<div class="container copy_right_bottom">
				
					<span class="copy_right" ><?php echo get_theme_mod('copy_right'); ?></span>
						
				
				<div class="back_top">
					<span>Back to top</span>
					<button class="scroll-to-top ion-android-arrow-up "  title="Scroll To Top"></button>
				</div>
			</div>
		</div>
	</footer>
<?php wp_footer(); ?>	
</body>
</html>