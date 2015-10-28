<?php
/**
 * Author: Ole Fredrik Lie
 * URL: http://olefredrik.com
 *
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

/** Various clean up functions */
require_once( 'library/cleanup.php' );

/** Required for Foundation to work properly */
require_once( 'library/foundation.php' );

/** Register all navigation menus */
require_once( 'library/navigation.php' );

/** Add desktop menu walker */
require_once( 'library/menu-walker.php' );

/** Add off-canvas menu walker */
require_once( 'library/offcanvas-walker.php' );

/** Create widget areas in sidebar and footer */
require_once( 'library/widget-areas.php' );

/** Return entry meta information for posts */
require_once( 'library/entry-meta.php' );

/** Enqueue scripts */
require_once( 'library/enqueue-scripts.php' );

/** Add theme support */
require_once( 'library/theme-support.php' );

/** Add Header image */
require_once( 'library/custom-header.php' );

/** Add Bucket */
require_once( 'library/bucket.php' );

/** Add Author Social Media Links */
require_once( 'library/author-social.php' );

/** Add Custom Post Types */
require_once( 'library/custom-post-types.php' );

/** Add Slug Function */
require_once( 'library/the-slug.php' );

/** PHP Widget Function */
require_once( 'library/php-widgets.php' );

/** Add Options Page */
require_once( 'library/options-page.php' );

/** Add Settings for registration */
require_once('library/options-registration.php');

/** Add Custom Post Types to Taxonomies [Tags Search] */
require_once('library/cpt-taxonomy.php');

/** Add Custom Post Types to Tag Cloud */
require_once('library/tag-cloud.php');

/** List tags only from Custom Post Type */
require_once('library/cpt-tags.php');

/** Add functions to gravity forms */
require_once('library/gravity.php');

/** Add functions to connect to Salesforce */
require_once('library/salesforce.php');

?>