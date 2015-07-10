<?php

	$co_product = new Cohesionet_BuddyShopping_Product();
	$product_data=$co_product->co_get_product_data();
	$currency=get_woocommerce_currency();
?>

<!-- Cohesionet Product ShopConnect -->

<span style="display:none" co-data-type="item" co-id-type="url" 
	 co-data-image=<?php echo $product_data["image-url"] ?>
	 co-data-price=<?php echo number_format($product_data['price'], 2) ?>

	 co-data-discount=<?php echo number_format($product_data['sale_price'], 2) ?>
	<?php $specialPriceFromDate = $product_data['sale_price_from']; if ($specialPriceFromDate) { ?>
	 co-data-discount-start=<?php echo strtotime( $specialPriceFromDate) ?>
	<?php } ?>

	<?php $specialPriceToDate = $product_data['sale_price_to']; if ($specialPriceToDate) { ?>
	 co-data-discount-end=<?php echo strtotime( $specialPriceToDate) ?>
	<?php } ?>

	 co-data-currency=<?php echo $currency ?>
	 co-data-id=<?php echo $product_data['url'] ?> >



</span>

 
