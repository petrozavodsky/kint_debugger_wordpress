# Kint Debugger Master
Contributors:
Donate link: https://alkoweb.ru
Tags: Kint, Kint debugger, WordPress debugger, Debugbar Add-On, Debugbar debugger, Debugbar Kint debugger,  Krimo kint
Requires at least: 3.0.1
Tested up to: 4.9.8
Stable tag: 4.9.8
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Kint debugger is integrated with Debugbar can also work standalone or in CLI.

## Description

**Attention !**

*This plugin allows you to debug made plugins/themes*

1. do not forget to remove the function d, dd, ddd, s, sd, dump_wp_query, dump_wp, dump_post after completing your development, **it can break your code**

2. can not be edited, and do not insert their own plugins/themes using this functions, **it can break your code**

*This plugin only requires to debug*
*Use this plugin only if you are sure that what you are doing**

This WordPress plugin is a wrapper for the Kint Debugger.

*But this is not the main functionality of the plugin.*
First of all, this plugin is designed for easy output debug information panel [DebugBar](https://wordpress.org/plugins/debug-bar/) and is a Add-On.
Also, the plugin can display information standalone in the php context.

## Installation

1. Upload plugin path to the `/wp-content/plugins/` directory
2. Activate the plugin through the plugin '**Kint Debugger Master**' menu in WordPress
3. Place `<?php d($variable); ?>` in your php code.

## Frequently Asked Questions

### What is this plugin different from others using Kint Debugger

[1]: My plug-in can use the Debug Bar to display debug info.
[2]: It can be used in the CLI
[3]: It uses the latest version Kint Debugger library
[4]: Unlike all the other plug-in does not cause my mistakes and just works ;)

Kint Debugger

### How do I use this utility?

When you are testing your code, you use d( $var ) in place of var_dump( $var ) and print_r( $var ).  No need to wrap it in pre's either.

### What else does Kint provide to help me debug?

As you can see the [screenshot 1](http://wordpress.org/extend/plugins/kint_debugger_master/screenshots/), besides the handy UI, it also provides you with a full call stack.  Click on the text below the UI to expand it out.

###I have called the debug functions, but I can't find the output!###
* If you have the Debug Bar plugin installed, all of your debug results will be displayed under the "Kint Debugger" sub panel.

- If you have a feature request or question, please use the [Kint Debugger support forum](http://wordpress.org/tags/kint-debugger).

- If you have a question about Kint specifically, please visit the [Kint repo](https://github.com/raveren/kint).

- Or you have a question about Kint Debugger Master plugin  please visit the [my site](https://alkoweb.ru/kint_debugger_master)
and post your question in the comments


## Screenshots

1. Dump Superglobals.
2. Show avilable methods in global $post.
3. Show patch to called debug function.

## Changelog

### 1.0
* Add DebugBar integration
* Another change.

## Upgrade Notice

### 1.0

Add common functionality

