<?php

if (!function_exists('dump_wp_query')) {
    /**
     *  Show global variable $wp_query via Kint::dump()
     *
     * @return string
     */
    function dump_wp_query()
    {
        global $wp_query;
        ob_start('kint_debug_ob');
        d($wp_query);
        ob_end_flush();
    }
}

if (!function_exists('dump_wp')) {
    /**
     *  Show global variable $wp via Kint::dump()
     *
     * @return string
     */
    function dump_wp()
    {
        global $wp;
        ob_start('kint_debug_ob');
        d($wp);
        ob_end_flush();
    }
}
if (!function_exists('dump_post')) {
    /**
     *  Show global variable $post via Kint::dump()
     *
     * @return string
     */
    function dump_post()
    {
        global $post;
        ob_start('kint_debug_ob');
        d($post);
        ob_end_flush();
    }
}