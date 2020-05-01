<?php

/**
 * Loads the StoreFront parent theme stylesheet.
 */

function sf_child_theme_enqueue_styles() {
    //get_template_directory - odwoluje sie do motywu rodzica
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}
add_action( 'wp_enqueue_scripts', 'sf_child_theme_enqueue_styles' );

/**
 * Note: DO NOT! alter or remove the code above this text and only add your custom PHP functions below this text.
 */



//---------------------------------------------------------------------------------------------------------------



/*
* Usuwa niektore style wbudowane
*/
function remove_wc_style() {
	wp_dequeue_style( 'storefront-woocommerce-style' );
}

// Dodanie naszej funckji do ladowania skryptu
// Usuniecie priorytetu 25 czyli taki jaki zostal ustawiony
add_action('wp_enqueue_scripts' , 'remove_wc_style',  25 );

// Usuwnaie stylo w kotrych mozemy zmieniac kolory przycisku itp
// W gornym pasku usuwa ikone "dostosuj"
add_filter( 'storefront_customizer_enabled' , false );



// Dodaje wlasnych styli
function add_custom_styles() {
    // Dodanie styli | Identyfikator | get-stylesheet-directory - odwolanie do motywu potomnego | nazwa pliku
    wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri() . '/custom-style.css' );
    // Dodanie styli czcionek
    wp_enqueue_style( 'google-font-a', 'https://fonts.googleapis.com/css?family=Merriweather&subset=latin,latin-ext' );
    wp_enqueue_style( 'google-font-b', 'https://fonts.googleapis.com/css?family=Lato:400,700&subset=latin,latin-ext' );
    // Podpinamy dynamicznie font awesom
    wp_enqueue_style( 'fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );
}
add_action( 'wp_enqueue_scripts', 'add_custom_styles' );



/* Usuwa elementy sklepu */
/* Wchodzimy do pluginu(woocommerce), nastepnie do template a tam juz sa nasze pliki odpowiadajace za wyswietlanie np produktow */
function remove_shop_elements() {
    // Usuwanie akcji | Z jakiej pozycji ma byc usuniete | Co ma byc usuniete | Parametr aby usunac, parametr ten znajduje sie w plikach pluginu
	remove_action( 'woocommerce_after_shop_loop_item' , 'woocommerce_template_loop_add_to_cart' , 10 );
	remove_action( 'woocommerce_after_shop_loop_item_title' , 'woocommerce_template_loop_rating' , 5 );
}

// Uruchamianie naszej funckji
// init - Podczas inicjalizacji
add_action( 'init', 'remove_shop_elements' );



/* Dodaje nowe div do karty */
 /* Dodaje diva ktory otacza cala karte produktu */
function add_product_wrapper() {
	echo  '<div class="product-grid-wrapper">';
}
// Pozycja na ktorej div ma byc wstawiany | Uruchomienie naszej funckji
add_action( 'woocommerce_before_shop_loop_item', 'add_product_wrapper' );

// Opis
function add_product_desc() {
	echo  '<div class="product-grid-desc">';
}
add_action( 'woocommerce_before_shop_loop_item_title', 'add_product_desc' );

// Odpowiada za stowrzenie kreski dlatego dajemy znacnzik zamykajacy
// Tam gdzie cos bedzie otaczane przez div nie dodajemy znacznika zamykajacego bo cos otacza
function add_product_divider() {
	echo  '<div class="product-grid-divider"></div>';
}
add_action( 'woocommerce_shop_loop_item_title', 'add_product_divider' );



/*
* Nadpisujemy sekcje najnowsze produkty
*/
/* W storefront > structure > template tag znajduje sie w nim struktura roznych elementow motywu */
if ( ! function_exists( 'storefront_recent_products' ) ) {
	/**
	 * Display Recent Products
	 * Hooked into the `homepage` action in the homepage template
	 * @since  1.0.0
	 * @return void
	 */
	function storefront_recent_products( $args ) {

		if ( is_woocommerce_activated() ) {

			$args = apply_filters( 'storefront_recent_products_args', array(
				'limit' 			=> 4,
				'columns' 			=> 4,
				'title'				=> __( 'Recent Products', 'storefront' ),
				) );

			echo '<section class="storefront-product-section storefront-recent-products">';

				do_action( 'storefront_homepage_before_recent_products' );
                /* Zewnetrza czesc sekcji */
				echo '<div class="section-title-outer">';
					echo '<div class="section-title-wrapper">';
						echo '<span class="section-title-separator"><span class="section-title-line"></span></span>';
							echo '<h4 class="section-title">' . wp_kses_post( $args['title'] ) . '</h4>';
						echo '<span class="section-title-separator"><span class="section-title-line"></span></span>';
					echo '</div>';
				echo '</div>';


				echo storefront_do_shortcode( 'recent_products',
					array(
						'per_page' 	=> intval( $args['limit'] ),
						'columns'	=> intval( $args['columns'] ),
						) );

				do_action( 'storefront_homepage_after_recent_products' );

			echo '</section>';
		}
	}
}



/*
 * Nadpisujemy sekcje prod. wyroznione
 */
if ( ! function_exists( 'storefront_featured_products' ) ) {
	/**
	 * Display Featured Products
	 * Hooked into the `homepage` action in the homepage template
	 * @since  1.0.0
	 * @return void
	 */
	function storefront_featured_products( $args ) {

		if ( is_woocommerce_activated() ) {

			$args = apply_filters( 'storefront_featured_products_args', array(
				'limit' 			=> 4,
				'columns' 			=> 4,
				'orderby'			=> 'date',
				'order'				=> 'desc',
				'title'				=> __( 'Featured Products', 'storefront' ),
				) );

			echo '<section class="storefront-product-section storefront-featured-products">';

				do_action( 'storefront_homepage_before_featured_products' );

				echo '<div class="section-title-outer">';
					echo '<div class="section-title-wrapper">';
						echo '<span class="section-title-separator"><span class="section-title-line"></span></span>';
							echo '<h4 class="section-title">' . wp_kses_post( $args['title'] ) . '</h4>';
						echo '<span class="section-title-separator"><span class="section-title-line"></span></span>';
					echo '</div>';
				echo '</div>';

				echo storefront_do_shortcode( 'featured_products',
					array(
						'per_page' 	=> intval( $args['limit'] ),
						'columns'	=> intval( $args['columns'] ),
						'orderby'	=> esc_attr( $args['orderby'] ),
						'order'		=> esc_attr( $args['order'] ),
						) );

				do_action( 'storefront_homepage_after_featured_products' );

			echo '</section>';

		}
	}
}



/*
 * Nadpisujemy sekcje produkty najlepiej oceniane
 */
if ( ! function_exists( 'storefront_popular_products' ) ) {
	/**
	 * Display Popular Products
	 * Hooked into the `homepage` action in the homepage template
	 * @since  1.0.0
	 * @return void
	 */
	function storefront_popular_products( $args ) {

		if ( is_woocommerce_activated() ) {

			$args = apply_filters( 'storefront_popular_products_args', array(
				'limit' 			=> 4,
				'columns' 			=> 4,
				'title'				=> __( 'Top Rated Products', 'storefront' ),
				) );

			echo '<section class="storefront-product-section storefront-popular-products">';

				do_action( 'storefront_homepage_before_popular_products' );

				echo '<div class="section-title-outer">';
					echo '<div class="section-title-wrapper">';
						echo '<span class="section-title-separator"><span class="section-title-line"></span></span>';
							echo '<h4 class="section-title">' . wp_kses_post( $args['title'] ) . '</h4>';
						echo '<span class="section-title-separator"><span class="section-title-line"></span></span>';
					echo '</div>';
				echo '</div>';

				echo storefront_do_shortcode( 'top_rated_products',
					array(
						'per_page' 	=> intval( $args['limit'] ),
						'columns'	=> intval( $args['columns'] ),
						) );

				do_action( 'storefront_homepage_after_popular_products' );

			echo '</section>';

		}
	}
}



/*
* Nadpisujemy naglowek strony
*/
/* W storefront > structure > page znajduje sie w nim naglowek strony  */
if ( ! function_exists( 'storefront_page_header' ) ) {
	/**
	 * Display the post header with a link to the single post
	 * @since 1.0.0
	 */
	function storefront_page_header() {
		?>
		<div class="entry-header-outer">
			<header class="entry-header">
				<?php
				storefront_post_thumbnail( 'full' );
				the_title( '<h1 class="entry-title" itemprop="name">', '</h1>' );
				?>
			</header><!-- .entry-header -->			
		</div>
		<?php
	}
}



/* Zmiena kolejnosc elementow w naglowku */
function reorder_header_elements() {
    // Usuwanie akcji | Z jakiej pozycji ma byc usuniete | Co ma byc usuniete | Parametr aby usunac, parametr ten znajduje sie w plikach pluginu
    remove_action( 'storefront_header' , 'storefront_secondary_navigation' , 30 );
	remove_action( 'storefront_header' , 'storefront_primary_navigation' , 50 );
	remove_action( 'storefront_header' , 'storefront_header_cart' , 60 );
    // Najpierw usuwamy a pozniej dodajemy. Nie trzeba podawac id na koncu(raczej)
    add_action( 'storefront_header' , 'storefront_header_cart' , 50 );
	add_action( 'storefront_header' , 'storefront_primary_navigation' , 60 );
}

add_action( 'init', 'reorder_header_elements' );



/*
* Tworzy nowy link do koszyka
*/
/* W storefront > inc > woocommerce > template tags znajduje sie w nim odwolanie do koszyka na stronie */
if ( ! function_exists( 'storefront_cart_link' ) ) {
	function storefront_cart_link() {
		?>
			<a class="cart-contents" href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" title="<?php _e( 'View your shopping cart', 'storefront' ); ?>">
                <!-- Wyswietlenie ikony koszyka -->
                <span class="cart-icon"><i class="fa fa-shopping-cart"></i></span>
                <!-- Zliczanie elementow w koszyku -->
                <span class="count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
			</a>
		<?php
	}
}



/*
* Ogranicza widgety stopki
*/
/* W storefront > footer znajduje sie w nim odwolanie do koszyka na stronie */
function limit_footer_widgets() {
    // Jesli nie jest to strona frontnowa i strona produktu
	if ( !is_product() && !is_page('Start') ){
		remove_action( 'storefront_footer' , 'storefront_footer_widgets' , 10 );
	}
	if ( !is_page('Start') ){
		remove_action( 'storefront_before_content' , 'storefront_header_widget_region' , 10 );
	}

}
// get_header - init sie nie sprawdzi dlatego podczas header uzywamy
add_action( 'get_header', 'limit_footer_widgets' );



/*
* Wlasny pasek widgetow stopki
*/
/* W storefront > inc > functions > steup.php znajduje sie w nim funckja odpowiedzialna za zarejestrowanie paska dla widgetu */
function footerbottom_widget_bar() {
	register_sidebar( array(
        // Nazwa (dla uzytkownika) | Nazwa motywu
        'name'          => __( 'FooterBottom', 'storefront-child-theme-master' ),
        // Id (unikalne dla wordpressa aby powiazal elementy
        'id'            => 'footerbottom',
        // Opis
        'description'   => '',
        // Budowa widgetu
        'before_widget' => '<aside id="%1$s" class="footerbottom-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="footerbottom-widget-title">',
		'after_title'   => '</h3>',
	) );
}
// Wywolanie funckji. widgets_init - W momencie inicjowania widgetu
add_action( 'widgets_init' , 'footerbottom_widget_bar' );



/*
* Usuwamy notke copyright
*/
function remove_copy_info() {
	remove_action( 'storefront_footer' , 'storefront_credit' , 20 );
}
add_action( 'init', 'remove_copy_info' );



/**
 * Usuwamy breadcrumb - sciezka pokazana na stronie do danej produktu
 */
function remove_breadcrumb() {
	remove_action( 'storefront_content_top' , 'woocommerce_breadcrumb' , 10 );
}
add_action( 'init', 'remove_breadcrumb' );



/**
 * Kolejnosc elementow na stronie produktu
 */
function single_product_right_column() {
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_price' , 10 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_excerpt' , 20 );
	add_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_excerpt' );
	add_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_price' );
}
add_action( 'init', 'single_product_right_column' );


/**
* Przenosi produkty powiazane
*/
function relocate_related_products() {
	remove_action( 'woocommerce_after_single_product_summary' ,'woocommerce_output_related_products' , 20 );
	add_action( 'woocommerce_after_single_product' , 'woocommerce_output_related_products' );
}
add_action( 'init', 'relocate_related_products' );

// Wyswietlanie 4 prduktow w 2 wierszach 
// Wbudowana funckja wp
function woocommerce_output_related_products() {
	woocommerce_related_products(4,2);
}



/**
 * Usuwa sortowanie na stronie kategorii 
 */
function remove_category_sorting() {
	remove_action( 'woocommerce_after_shop_loop' ,'woocommerce_result_count' , 20 );
	remove_action( 'woocommerce_after_shop_loop' ,'woocommerce_catalog_ordering' , 10 );
}
add_action( 'init', 'remove_category_sorting' );



/**
 * Usuwamy kolumny z widgetow naglowka
 */
/* W storefront > inc > structure > header.php ktory odpowiada za strukture naglowka */
if ( ! function_exists( 'storefront_header_widget_region' ) ) {
	/**
	 * Display header widget region
	 * @since  1.0.0
	 */
	function storefront_header_widget_region() {
		if ( is_active_sidebar( 'header-1' ) ) {
        ?>
        <!-- Zmieniamy klasy diva otaczajacego -->
		<div class="header-widget-region" role="complementary">
				<?php dynamic_sidebar( 'header-1' ); ?>
		</div>
		<?php
		}
	}
}






