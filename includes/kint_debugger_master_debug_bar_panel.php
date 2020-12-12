<?php
/**
 * The class added DebugBar panel, extends class Debug_Bar_Panel.
 *
 * @link       https://alkoweb.ru
 * @since      1.0.0
 *
 * @package    Kint_debugger_master
 * @subpackage Kint_debugger_master/includes
 */

/**
 * The class added DebugBar panel, extends class Debug_Bar_Panel.
 *
 * @since      1.0.0
 * @package    Kint_debugger_master
 * @subpackage Kint_debugger_master/includes
 * @author     petrozavodsky <petrozavodsky@gmail.com>
 */
class kint_debugger_master_debug_bar_panel extends Debug_Bar_Panel {

	var $_visible = true;

	/**
	 * Give the panel a title and set the enqueues.
	 *
	 * @return void
	 */
	function init() {
		$this->title( __( 'Kint Debugger' ) );
	}

	/**
	 * Show the menu item in Debug Bar.
	 *
	 * @return  void
	 */
	function prerender() {
		$this->set_visible( apply_filters( 'kint_debug_display', true ) );
	}


	/**
	 * @param $visible
	 */
	function set_visible( $visible ) {
		$this->_visible = $visible;
	}

	/**
	 * Show the contents of the page.
	 * @return  void
	 */
	function render() {
		global $kint_debug;
		if ( is_array( $kint_debug ) ) {
			foreach ( $kint_debug as $line ) {
				echo $line;
			}
		}

	}


}
