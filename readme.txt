=== Mobilize ===
Contributors: lumiblog, butterflymedia
Donate link: https://wpcorner.co/donate/
Tags: off-canvas, navigation, mobile menu, swipe, menu
Requires at least: 4.9
Requires PHP: 7.0
Tested up to: 6.5
Stable tag: 3.0.6
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Mobilize adds a lightweight mobile menu to your site, if the width is lower than a certain value.

== Description ==

The **Mobilize** plugin adds a lightweight mobile menu to your site, if the width is lower than a certain (configurable) value.

Use the native behaviour (fixed top bar) or assign one of your existing menu items (a hamburger icon or a "Quick Jump" menu item).

The menu works with the latest WordPress version and is fully compatible with the block editor (Gutenberg).

**Features**

1. Add reusable blocks to your menu
2. Use custom themes
3. High performance JavaScript ES6, 60FPS

**More menu themes coming soon!**

== Installation ==

1. Upload to your plugins folder, usually `wp-content/plugins/`
2. Activate the plugin on the plugin screen
3. Configure the plugin from **Settings** -> **Mobilize**
4. Optionally assign a menu to the "Mobilize Navigation" section in **Appearance** -> **Menus**
5. Optionally assign a reusable block to **Mobilize**

== Screenshots ==

1. Mobilize settings page #1
2. Mobilize settings page #2
3. Mobilize demo

== Changelog ==

= 3.0.6 =
* UPDATE: Updated plugin information
* UPDATE: Removed adopt-me tag

= 3.0.5 =
* UPDATE: Updated WordPress compatibility
* UPDATE: Updated Mobilize JS version and loading strategy

= 3.0.4 =
* UPDATE: Updated WordPress compatibility

= 3.0.3 =
* UPDATE: Updated author banner
* UPDATE: Updated WordPress compatibility for pre-5.0 versions
* UPDATE: Updated WPCS ruleset
* UPDATE: Minified front-end CSS for better performance
* UPDATE: Added donation link

= 3.0.2 =
* FIX: Renamed no-scroll to mobilize-no-scroll to avoid conflicts
* FIX: Fixed modern theme border and spacing
* FIX: Fixed modern theme skew issue showing 1px from the menu
* FIX: Fixed asset enqueue not having a version number
* UPDATE: Added left/right slide direction
* UPDATE: Added configurable "Close" element

= 3.0.1 =
* UPDATE: Updated WordPress compatibility

= 3.0.0 =
* UPDATE: Updated WordPress compatibility
* UPDATE: Updated PHP compatibility (7+)
* UPDATE: Refactored plugin structure
* UPDATE: Refactored all JavaScript to use ES6
* FEATURE: Added menu themes
* FEATURE: (Breaking) Removed widget functionality
* FEATURE: Added block editor (Gutenberg) reusable blocks functionality

= 2.5.4 =
* UPDATE: Updated WordPress compatibility

= 2.5.3 =
* UPDATE: Removed FontAwesome (was only used for one icon) (+speed, -weight)
* UPDATE: Updated links, license and version

= 2.5.2 =
* FEATURE: Added font size option for navicon
* FEATURE: Added custom logo option
* FEATURE: Added widgets to mobile menu
* UPDATE: Changed some size defaults for fonts and line height
* UPDATE: UI tweaks and CSS changes

= 2.5.1 =
* FIX: Removed included license.txt file (already specified in plugin header)

= 2.5.0 =
* FIX: Fixed several URLs
* FIX: Fixed bad CSS
* UPDATE: UI tweaks and description updates
* UPDATE: Huge performance optimisations

= 2.4.0 =
* FIX: Fixed a z-index issue
* FIX: Fixed several obsolete styles
* FIX: Properly enqueued scripts and styles
* FIX: Removed HTML5 support for search box
* UPDATE: Updated getButterfly ad box
* UPDATE: Update FontAwesome library
* UPDATE: Enqueued unminified styles
* UPDATE: Added option autoloading
* UPDATE: Added menu opening animation

= 2.3.0 =
* UPDATE: Added getButterfly ad box

= 2.2 =
* UPDATE: Updated version, WordPress compatibility and plugin URL

= 2.0 =
* PERFORMANCE: Removed all Javascript
* PERFORMANCE: Compressed CSS (25.4%, 598 bytes savings, 1.64 KB GZIP compression) [http://www.shrinker.ch/]
* MOBILE: Added hardware acceleration by default
* MOBILE: Added experimental `will-change` CSS3 property (http://dev.opera.com/articles/css-will-change-property/)
* FEATURE: No more clickthroughs, all menus are available on the first screen
* IMPROVEMENT: Removed and cleaned up unused options
* IMPROVEMENT: Plugin's options are now more concise
* IMPROVEMENT: FontAwesome for all plugins will have an ID of `fa` in order to avoid multiple enqueuing

= 1.3 =
* VERSION: Added WordPress 3.9 compatibility and increase minimum WordPress version
* FEATURE: Added minwidth option
* FEATURE: Added CSS3 transitions
* FEATURE: Added more CSS styles for smoother actions
* FEATURE: Merged menu styles with menu button styles for better blending in

= 1.2.1 (merged update) =
* FIX: Fixed readme file
* FIX: Minor code fixes
* FEATURE: Added menu styles (slide or expand)
* FEATURE: Added option to expand all submenus by default
* ENHANCEMENT: Added menu button (bar) styling options
* ENHANCEMENT: Added menu text/arrow styling options
* PERFORMANCE: Combined 2 stylesheets

= 1.1 =
* Initial release
