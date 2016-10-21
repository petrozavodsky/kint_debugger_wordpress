<?php

/**
 * Alias of Kint::dump()
 *
 * @return string
 */
if ( !function_exists( 'd' ) ) {
	function d() {
		global $kint_debug;
		if ( ! Kint::enabled() ) {
			return '';
		}
		$_                  = func_get_args();
		Kint::$returnOutput = true;
		$dump               = call_user_func_array( array( 'Kint', 'dump' ), $_ );
		$dump               = apply_filters( 'kint_debugger_master_raw_dump', $dump, 'd' );
		$kint_debug[]       = $dump;

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
if ( !function_exists( 'dd' ) ) {
function dd()
{
    global $kint_debug;
    if (!Kint::enabled()) return '';
    echo "<pre>Kint: dd() is being deprecated, please use ddd() instead</pre>\n";
    $_ = func_get_args();
    Kint::$returnOutput = true;
    $dump = call_user_func_array(array('Kint', 'dump'), $_);
    $dump = apply_filters('kint_debugger_master_raw_dump', $dump, 'dd');
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
if ( !function_exists( 'ddd' ) ) {
	function ddd() {
		global $kint_debug;
		if ( ! Kint::enabled() ) {
			return '';
		}
		$_                  = func_get_args();
		Kint::$returnOutput = true;
		$dump               = call_user_func_array( array( 'Kint', 'dump' ), $_ );
		$dump               = apply_filters( 'kint_debugger_master_raw_dump', $dump, 'ddd' );
		$kint_debug[]       = $dump;
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
if ( !function_exists( 's' ) ) {
	function s() {
		global $kint_debug;
		$enabled = Kint::enabled();
		if ( ! $enabled ) {
			return '';
		}

		if ( $enabled === Kint::MODE_WHITESPACE ) { # if already in whitespace, don't elevate to plain
			$restoreMode = Kint::MODE_WHITESPACE;
		} else {
			$restoreMode = Kint::enabled( # remove cli colors in cli mode; remove rich interface in HTML mode
				PHP_SAPI === 'cli' ? Kint::MODE_WHITESPACE : Kint::MODE_PLAIN
			);
		}

		$params             = func_get_args();
		Kint::$returnOutput = true;
		$dump               = call_user_func_array( array( 'Kint', 'dump' ), $params );
		$dump               = apply_filters( 'kint_debugger_master_raw_dump', $dump, 's' );
		Kint::enabled( $restoreMode );
		$kint_debug[] = $dump;

		return $dump;
	}
}

/**
 * @see s()
 *
 * [!!!] IMPORTANT: execution will halt after call to this function
 *
 * @return string
 */
if ( !function_exists( 'sd' ) ) {
	function sd() {
		global $kint_debug;
		$enabled = Kint::enabled();
		if ( ! $enabled ) {
			return '';
		}

		if ( $enabled !== Kint::MODE_WHITESPACE ) {
			Kint::enabled(
				PHP_SAPI === 'cli' ? Kint::MODE_WHITESPACE : Kint::MODE_PLAIN
			);
		}

		$params             = func_get_args();
		Kint::$returnOutput = true;
		$dump               = call_user_func_array( array( 'Kint', 'dump' ), $params );
		$dump               = apply_filters( 'kint_debugger_master_raw_dump', $dump, 'sd' );
		$kint_debug[]       = $dump;
		echo $dump;
		die;
	}
}