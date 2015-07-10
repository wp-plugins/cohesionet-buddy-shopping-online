<?php

/**
* Plugin Name: Cohesionet Buddy Shopping Online
* Plugin URI: https://www.cohesionet.com/web/?co_componentID=co.wooCommerce_installCompID
* Description: Connect people for shopping together and offer built-in sales support, instant and effective. To get started: 1) Click the "Activate" link to the left of this description, 2) <a href="https://www.cohesionet.com/web/?co_componentID=co.comp_storePageID&co_register=true&co_hostID=wooCommerce">Register for store account ID</a>, and 3) Go to your Cohesionet- BuddyShopping configuration page, and save your account ID.
* Version: 1.0.8
* Author: Cohesionet
* Author URI: https://www.cohesionet.com
* License: GPL2
*/
 

/*
* Acknowledgement: WP Plugin Template created by Francis Yaconiello was used as a starting point
*/

if(!class_exists('Cohesionet_BuddyShopping'))
{
	class Cohesionet_BuddyShopping
	{

		const HOSTNAME="www.cohesionet.com";
		const PROTOCOL="https";

		/**
		 * Construct the plugin object
		 */
		public function __construct()
		{
			// Initialize Settings
			require_once(sprintf("%s/admin_settings.php", dirname(__FILE__)));
			$co_settings = new Cohesionet_BuddyShopping_Settings();

			require_once(sprintf("%s/widget_settings.php", dirname(__FILE__)));
			$co_widget = new Cohesionet_BuddyShopping_Widget();

			$plugin = plugin_basename(__FILE__);
			add_filter("plugin_action_links_$plugin", array( $this, 'plugin_settings_link' ));
		} // END public function __construct
		/**
		 * Activate the plugin
		 */
		public static function activate()
		{
			// Do nothing
		} // END public static function activate
		/**
		 * Deactivate the plugin
		 */
		public static function deactivate()
		{
			// Do nothing
		} // END public static function deactivate
		// Add the settings link to the plugins page
		function plugin_settings_link($links)
		{
			$settings_link = '<a href="options-general.php?page=cohesionet_setting_page">Settings</a>';
			array_unshift($links, $settings_link);
			return $links;
		}
	}
} 

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

	if(class_exists('Cohesionet_BuddyShopping'))
	{
		// Installation and uninstallation hooks
		register_activation_hook(__FILE__, array('Cohesionet_BuddyShopping', 'activate'));
		register_deactivation_hook(__FILE__, array('Cohesionet_BuddyShopping', 'deactivate'));
		// instantiate the plugin class
		$co_buddyShopping = new Cohesionet_BuddyShopping();
	}
}
