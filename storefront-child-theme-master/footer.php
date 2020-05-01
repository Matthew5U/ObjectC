<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */
?>

		</div><!-- .col-full -->
	</div><!-- #content -->

	<?php do_action( 'storefront_before_footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="col-full">

			<?php
			/**
			 * @hooked storefront_footer_widgets - 10
			 * @hooked storefront_credit - 20
			 */
			do_action( 'storefront_footer' ); ?>

		</div><!-- .col-full -->


		<!-- Dolny pasek widgetow -->
		<div class="sidebar-footerbottom">
			<div class="col-full">
				
			<!-- Dynamicnzie podpinamy nasz widget -->
				<?php get_sidebar( 'footerbottom' ); ?>

				<!-- Linia -->
				<div class="footerbottom-divider"></div>

				<!-- Nasz copyright -->
				<div class="footer-credits">
					<p>Copyright 2006-2015 WooCStore © All rights reserved</p>
				</div>		

			</div>
		</div>
	</footer><!-- #colophon -->

	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
