<?php

/**
 * The file that defines the core plugin class
 *
 * @link       https://alkoweb.ru
 * @since      1.0.0
 *
 * @package    Kint_debugger_master
 * @subpackage Kint_debugger_master/includes
 */

/**
 * The core plugin class.
 *
 * @since      1.0.0
 * @package    Kint_debugger_master
 * @subpackage Kint_debugger_master/includes
 * @author     petrozavodsky <petrozavodsky@gmail.com>
 */
class Kint_debugger_master
{
    /**
     * File resource to plugin dir path.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string $plugin_name The string used to uniquely identify this plugin.
     */

    protected $file;
    /**
     * The unique identifier of this plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string $plugin_name The string used to uniquely identify this plugin.
     */
    protected $plugin_name;

    /**
     * The current version of the plugin.
     *
     * @since    1.0.0
     * @access   protected
     * @var      string $version The current version of the plugin.
     */
    protected $version;

    /**
     * Define the core functionality of the plugin.
     * Set plugin dir path
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the admin area and
     *
     * @since    1.0.0
     */
    public function __construct($file)
    {
        $this->file = $file;
        $this->plugin_name = 'kint_debugger_master';
        $this->version = '1.0.0';
        $this->load_dependencies();
        $this->add_hooks();
        $this->add_twicks();
    }


    /**
     * Load the required dependencies for this plugin.
     *
     * Include the following files that make up the plugin:
     *
     * - Composer autoload
     *
     * Create an instance of the loader which will be used to register the hooks
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    private function load_dependencies()
    {
        require_once plugin_dir_path($this->file) . 'includes/kint_debug_functions.php';
        require_once plugin_dir_path($this->file) . 'includes/wp_debug_functions.php';
        require_once plugin_dir_path($this->file) . 'vendor/autoload.php';
    }

    private function add_twicks(){
        require_once plugin_dir_path($this->file) . 'includes/kint_debug_twick.php';
        new kint_debug_twick($this->file);
    }

    /**
     * Load the required dependencies for this plugin.
     *
     * Include the following files that make up the plugin:
     *
     * - add core actions/filter in this plugin
     *
     * Create an instance of the loader which will be used to register the hooks
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */
    private function add_hooks()
    {
        add_filter('debug_bar_panels', array($this, 'add_kint_via_debug_bar'));
    }
    /**
     * Add Kint panels in DebugBar.
     *
     * Create an instance of the loader which will be used to register the hooks
     * with WordPress.
     * @param    array    $panels    DebugBar panels array.
     * @since    1.0.0
     * @return   array
     */
    public function add_kint_via_debug_bar($panels)
    {
        require_once plugin_dir_path($this->file) . 'includes/kint_debugger_master_debug_bar_panel.php';
        $panels[] = new kint_debugger_master_debug_bar_panel();
        return $panels;
    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @since     1.0.0
     * @return    string    The name of the plugin.
     */
    public function get_plugin_name()
    {
        return $this->plugin_name;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @since     1.0.0
     * @return    string    The version number of the plugin.
     */
    public function get_version()
    {
        return $this->version;
    }

}