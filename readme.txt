=== Get remote posts list ===
Contributors: dnyanraja, Ganesh Veer
Donate link: http://example.com/
Tags: comments, spam
Requires at least: 3.0
Tested up to: 4.7
Stable tag: 4.3
Requires PHP: 5.2.4
License: GPLv2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Here is a short description of the plugin.  This should be no more than 150 characters.  No markup here.

== Description ==

Get remote posts list 

    This wordpress plugin to Get Recent Posts from Remote Wp site using Rest api

    This plugin create a widget "Get Posts from Api" after installation. You need to add widget to your sidebar where you want to display the remote sites recent posts list.

    This widget accepts two parameter, Json URL and post limit(number of posts to display).

    Json url should look like http://yoursite.com/wp-json/wp/v2/posts/

    You can limit the number of posts you want to retrive from remote site by setting post limit.


== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload the plugin files to the `/wp-content/plugins/get-remote-post-list` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress
1. Use the Settings->Plugin Name screen to configure the plugin



== Frequently Asked Questions ==

= How to get json api url? =

If the remote site is wordpress site and having rest api enabled for it, you can obtain the json urls by using the http://xxx.com/wp-json/wp/v2/posts/
Note: replace "xxx" with site domain

== Screenshots ==

1. This screen shot description corresponds to screenshot-1.(png|jpg|jpeg|gif). Note that the screenshot is taken from
the /assets directory or the directory that contains the stable readme.txt (tags or trunk). Screenshots in the /assets
directory take precedence. For example, `/assets/screenshot-1.png` would win over `/tags/4.3/screenshot-1.png`
(or jpg, jpeg, gif).
2. This is the second screen shot

== Changelog ==

= 1.0 =
* Adding first version of my plugin


`<?php code(); // goes in backticks ?>`
