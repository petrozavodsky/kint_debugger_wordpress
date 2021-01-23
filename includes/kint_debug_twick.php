<?php

class kint_debug_twick
{
    private $file;

    function __construct($file)
    {
        $this->file = $file;
        add_filter('autoptimize_filter_js_noptimize', array($this, 'autoptimize_twick'), 10, 2);
    }

    /**
     * Autoptimize
     */
    function autoptimize_twick($bool, $content)
    {
        return strpos($content, 'kint') !== false;
    }
}