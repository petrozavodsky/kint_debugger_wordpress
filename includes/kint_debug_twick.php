<?php

class kint_debug_twick
{

    private $file;
    private $version = '1.0.0';

    function __construct($file)
    {
        $this->file = $file;
        add_filter('autoptimize_filter_js_noptimize', array($this, 'autoptimize_twick'), 10, 2);

        add_action('wp_enqueue_scripts', array($this, 'register_js_css_kint'));
        add_action('admin_enqueue_scripts', array($this, 'register_js_css_kint'));

        add_action('wp_enqueue_scripts', array($this, 'add_js_css_kint'));
        add_action('admin_enqueue_scripts', array($this, 'add_js_css_kint'));
    }

    //Autoptimize
    function autoptimize_twick($bool, $content)
    {
        if (strpos($content, "kint") !== false) {
            return true;
        } else {
            return false;
        }
    }

    function register_js_css_kint()
    {
        wp_register_script('kint-js', plugin_dir_url($this->file) . 'vendor/raveren/kint/view/compiled/kint.js', array(), $this->version, true);
        wp_register_style('kint-css', plugin_dir_url($this->file) . 'vendor/raveren/kint/view/compiled/original.css', array(), $this->version, 'all');
        wp_register_style('kint-css-helper', plugin_dir_url($this->file) . 'public/css/kint_helper.css', array('kint-css'), $this->version, 'all');
    }

    function add_js_css_kint()
    {
        if (is_user_logged_in()) {
            wp_enqueue_script('kint-js');
            wp_enqueue_style('kint-css');
            wp_enqueue_style('kint-css-helper');
        }
    }

}