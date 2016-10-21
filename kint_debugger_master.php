<?php

/**
 *
 * @link              https://alkoweb.ru
 * @since             1.0.0
 * @package           Kint_debugger_master
 *
 * @wordpress-plugin
 * Plugin Name:       Kint Debugger Master
 * Plugin URI:        https://alkoweb.ru/kint_debugger_master
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            petrozavodsky
 * Author URI:        https://alkoweb.ru
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       kint_debugger_master
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * Main plugin class,
 *
 */
require plugin_dir_path(__FILE__) . 'includes/class-kint_debugger_master.php';

/**
 * Initialise the plugin.
 *
 * @since    1.0.0
 */
function init_kint_debugger_master()
{
    new Kint_debugger_master(__FILE__);
}

add_action("plugins_loaded", "init_kint_debugger_master");