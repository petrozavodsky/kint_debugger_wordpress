<?php

/**
 * Alias of Kint::dump()
 *
 * @return string
 */
if ( ! function_exists( 'd' ) ) {
	function d() {
		global $kint_debug;
		if ( ! Kint::$enabled_mode ) {
			return '';
		}
		$_            = func_get_args();
//		Kint::$display_called_from = false;
		Kint::$return = true;
		$dump         = call_user_func_array( [ 'Kint', 'dump' ], $_ );
		$dump         = apply_filters( 'kint_debugger_master_raw_dump', $dump, 'd' );
		$kint_debug[] = $dump;

		return $dump;
	}
}

/**
 * Alias of Kint::dump()
 * [!!!] IMPORTANT: execution will halt after call to this function
 *
 * @return string
 * @deprecated
 */
if ( ! function_exists( 'dd' ) ) {
	function dd() {
		global $kint_debug;
		if ( ! Kint::$enabled_mode ) {
			return '';
		}
		echo "<pre>Kint: dd() is being deprecated, please use ddd() instead</pre>\n";
		$_            = func_get_args();
		Kint::$return = true;
		$dump         = call_user_func_array( array( 'Kint', 'dump' ), $_ );
		$dump         = apply_filters( 'kint_debugger_master_raw_dump', $dump, 'dd' );
		$kint_debug[] = $dump;
		echo $dump;
		die;
	}
}

/**
 * Alias of Kint::dump()
 * [!!!] IMPORTANT: execution will halt after call to this function
 *
 * @return string
 */
if ( ! function_exists( 'ddd' ) ) {
	function ddd() {
		global $kint_debug;
		if ( ! Kint::$enabled_mode ) {
			return '';
		}
		$_            = func_get_args();
		Kint::$return = true;
		$dump         = call_user_func_array( array( 'Kint', 'dump' ), $_ );
		$dump         = apply_filters( 'kint_debugger_master_raw_dump', $dump, 'ddd' );
		$kint_debug[] = $dump;
		echo $dump;
		die;
	}
}

/**
 * Alias of Kint::dump(), however the output is in plain htmlescaped text and some minor visibility enhancements
 * added. If run in CLI mode, output is pure whitespace.
 *
 * To force rendering mode without autodetecting anything:
 *
 *  Kint::enabled( Kint::MODE_PLAIN );
 *  Kint::dump( $variable );
 *
 * [!!!] IMPORTANT: execution will halt after call to this function
 *
 * @return string
 */
if ( ! function_exists( 's' ) ) {
	function s() {
		global $kint_debug;
		$enabled = Kint::$enabled_mode;
		if ( ! $enabled ) {
			return '';
		}

		$stash = Kint::$enabled_mode;

		if ( Kint::MODE_TEXT !== Kint::$enabled_mode ) {
			Kint::$enabled_mode = Kint::MODE_PLAIN;
			if ( PHP_SAPI === 'cli' && true === Kint::$cli_detection ) {
				Kint::$enabled_mode = Kint::$mode_default_cli;
			}
		}

		$args = \func_get_args();
		$out  = \call_user_func_array( [ 'Kint', 'dump' ], $args );

		$out = apply_filters( 'kint_debugger_master_raw_dump', $out, 's' );

		Kint::$enabled_mode = $stash;

		$kint_debug[] = $out;

		return $out;
	}
}

/**
 * @return string
 * @see s()
 *
 * [!!!] IMPORTANT: execution will halt after call to this function
 *
 */
if ( ! function_exists( 'sd' ) ) {
	function sd() {
		global $kint_debug;
		$enabled = Kint::$enabled_mode;
		if ( ! $enabled ) {
			return '';
		}

		$stash = Kint::$enabled_mode;

		if ( Kint::MODE_TEXT !== Kint::$enabled_mode ) {
			Kint::$enabled_mode = Kint::MODE_PLAIN;
			if ( PHP_SAPI === 'cli' && true === Kint::$cli_detection ) {
				Kint::$enabled_mode = Kint::$mode_default_cli;
			}
		}

		$args = \func_get_args();
		$out  = \call_user_func_array( [ 'Kint', 'dump' ], $args );

		$out = apply_filters( 'kint_debugger_master_raw_dump', $out, 'sd' );

		Kint::$enabled_mode = $stash;

		$kint_debug[] = $out;

		echo $out;
		die;
	}
}