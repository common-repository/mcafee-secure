<?php
defined( 'ABSPATH' ) OR exit;

/**
 * ------------------------------------------------------------------------------------------------------------------
 * @package mcafeesecure
 * @version 1.9.2
 * Plugin Name: McAfee SECURE
 * Plugin URI: https://www.mcafeesecure.com/
 * Description: Display the McAfee SECURE trustmark on your website to increase visitor confidence and conversion rates.
 * Author: TrustedSite
 * Author URI: https://www.mcafeesecure.com/trustedsite
 * Version: 1.9.2
 * ------------------------------------------------------------------------------------------------------------------
 */

if(defined('WP_INSTALLING') && WP_INSTALLING){
    return;
}
define('MCAFEESECURE_VERSION', '1.9.2');

add_action('activated_plugin','mcafeesecure_save_activation_error');
function mcafeesecure_save_activation_error(){
    update_option('mcafeesecure_plugin_error',  ob_get_contents());
}

require_once('lib/Mcafeesecure.php');
register_activation_hook(__FILE__, 'Mcafeesecure::activate');
register_deactivation_hook(__FILE__, 'Mcafeesecure::deactivate');
register_uninstall_hook(__FILE__, 'Mcafeesecure::uninstall');

Mcafeesecure::install();
