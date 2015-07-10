<?php
if(!class_exists('Cohesionet_BuddyShopping_Settings'))
{
	class Cohesionet_BuddyShopping_Settings
	{
		public function __construct()
		{
			// register actions
            		add_action('admin_init', array(&$this, 'admin_init'));
        		add_action('admin_menu', array(&$this, 'add_menu'));
		}
		
        /**
         * hook into WP's admin_init action hook
         */
        public function admin_init()
        {
        	// register your plugin's settings
        	register_setting('cohesionet_properties', 'accountID');
        	// add your settings section
        	add_settings_section(
        	    'cohesionet_setting_section_id', 
        	    '', 
        	    array(&$this, 'render_settings_section_head'), 
        	    'cohesionet_setting_page'
        	);
        	
        	// add your setting's fields
            add_settings_field(
                'cohesionet_properties_accountID', 
                'Store Account ID', 
                array(&$this, 'render_settings_field_input'), 
                'cohesionet_setting_page', 
                'cohesionet_setting_section_id',
                array(
                    'field' => 'accountID'
                )
            );
        }
        
        public function render_settings_section_head()
        {
        }
        
        public function render_settings_field_input($args)
        {
            // Get the field name from the $args array
            $field = $args['field'];
            // Get the value of this setting
            $value = get_option($field);
            // echo a proper input type="text"
            echo sprintf('<input type="text" name="%s" id="%s" value="%s" />', $field, $field, $value);
        } 
        
        /**
         * add a menu
         */		
        public function add_menu()
        {
            // Add a page to manage this plugin's settings
        	add_options_page(
        	    'Cohesionet Buddy Shopping Settings', 
        	    'Cohesionet - Buddy Shopping', 
        	    'manage_options', 
        	    'cohesionet_setting_page', 
        	    array(&$this, 'render_settings_page')
        	);
        } 
    
        /**
         * Menu Callback
         */		
        public function render_settings_page()
        {
        	if(!current_user_can('manage_options'))
        	{
        		wp_die(__('You do not have sufficient permissions to access this page.'));
        	}
        	// Render the settings template
        	include(sprintf("%s/ui/admin_ui.php", dirname(__FILE__)));

	

        }
    } 
} 
