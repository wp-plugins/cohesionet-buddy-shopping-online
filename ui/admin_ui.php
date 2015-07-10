<div class="wrap">
    <h2>Cohesionet - Buddy Shopping</h2>

<?php
	$protocol = Cohesionet_BuddyShopping::PROTOCOL;
	$hostName = Cohesionet_BuddyShopping::HOSTNAME;
	$accountID= get_option("accountID");

		if (empty($accountID))
		{
			   $output = '<h4>Your store is not registered yet. Please  click <a href="'.$protocol.'://'.$hostName.'/web/?co_componentID=co.comp_storePageID&co_register=true&co_hostID=wooCommerce" target="_blank">registration </a> to register and get your store account ID </h4>';
		}else
			   $output = '<h4>To find store account ID, (1) click <a href="'.$protocol.'://'.$hostName.'/web" target="_blank">Cohesionet Home</a>; (2) use your store adminstrator account login; (3) click the top-left corner menu button; (4) switch to seller status by clicking seller button in the menu, then click your store name. In the store management menu, your store account ID can be found at store setting. <br/>You may click <a href="'.$protocol.'://'.$hostName.'/web/?co_componentID=co.comp_storePageID&co_register=true&co_hostID=wooCommerce" target="_blank">registration </a> to create a new registration again. But you will lose all data related to your old registration</h4>';

		echo $output;
?>


    <form method="post" action="options.php"> 
        <?php @settings_fields('cohesionet_properties'); ?>
        <?php @do_settings_fields('cohesionet_properties'); ?>

        <?php do_settings_sections('cohesionet_setting_page'); ?>

        <?php @submit_button(); ?>

    </form>
</div>
