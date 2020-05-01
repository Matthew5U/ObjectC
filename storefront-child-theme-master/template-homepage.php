<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Homepage
 *
 * @package storefront
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			/**
			 * @hooked storefront_homepage_content - 10
			 * @hooked storefront_product_categories - 20
			 * @hooked storefront_recent_products - 30
			 * @hooked storefront_featured_products - 40
			 * @hooked storefront_popular_products - 50
			 * @hooked storefront_on_sale_products - 60
			 */
			do_action( 'homepage' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<!-- Nasz box z wpisem -->
	<!-- Promo Box -->
	<div class="promo-box-homepage">
		<div class="promo-box-inner">
			<div class="promo-box-border">
				<?php
				// Pobieramy tresc wpisu i id wpisu
				$promo_post = get_post_field('post_content',77); 
				// Przetworzona tresc
				$promo_post = apply_filters('the_content', $promo_post);
				echo $promo_post;
				 ?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
