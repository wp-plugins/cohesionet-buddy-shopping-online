<?php
if(!class_exists('Cohesionet_BuddyShopping_Widget'))
{
	class Cohesionet_BuddyShopping_Widget
	{
		public function __construct()
		{
			add_action( 'plugins_loaded', array( $this, 'widget_init' ));		
		}
		public function widget_init()
		{
			$is_admin = is_admin();	
			if(!$is_admin) {
				add_action( 'wp_head', array( $this, 'render_embed' ) );
			}
			add_action( 'woocommerce_after_single_product_summary', array( $this, 'render_product' ));
		}
		public function render_embed()
		{
			include(sprintf("%s/ui/embed.php", dirname(__FILE__)));
		}
		public function render_product()
		{
			include(sprintf("%s/ui/product.php", dirname(__FILE__)));
		}
	}
} 

if(!class_exists('Cohesionet_BuddyShopping_Product'))
{
	class Cohesionet_BuddyShopping_Product
	{

		public function co_get_product_image_url($product_id) {
			$url = wp_get_attachment_url(get_post_thumbnail_id($product_id));
			return $url ? $url : null;
		}

		public function co_get_product_data() {	

			 if ( function_exists( 'get_product' ) ) {
			    $product = get_product(  );
			  } else {
			    $product = new WC_Product( );
			  }
	
			$product_data = array();
			$product_data['url'] = get_permalink($product->id);

			$product_data['description'] = strip_tags($product->get_post_data()->post_excerpt);
			$product_data['id'] = $product->id;	
			$product_data['title'] = $product->get_title();
			$product_data['image-url'] = $this->co_get_product_image_url($product->id);
			$product_data['product-models'] = $product->get_sku();	
			$product_data['price']=$product->regular_price;
			$product_data['sale_price']=$product->sale_price;
			$product_data['sale_price_from']=$product->sale_price_dates_from;
			$product_data['sale_price_to']=$product->sale_price_dates_to;


			return $product_data;

		}

	}
} 



?>
