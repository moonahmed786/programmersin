<?php
	$l_copyright = (function_exists('fw_get_db_customizer_option')) ? fw_get_db_customizer_option('c_copyright') : '';
?>
<footer class="f-page-landing flw">
	<div class="container">
		<?php if(!empty($l_copyright)): ?>
			<div class="f-copyright">
				<span><?php echo wp_kses_post( $l_copyright ); ?></span>
			</div>
		<?php endif; ?>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>