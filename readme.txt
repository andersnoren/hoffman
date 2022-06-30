=== Hoffman ===
Contributors: Anlino
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=anders%40andersnoren%2ese&lc=US&item_name=Free%20WordPress%20Themes%20from%20Anders%20Noren&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted
Requires at least: 4.5
Tested up to: 6.0
Requires PHP: 5.4
Stable tag: trunk
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

== Installation ==

1. Upload the theme
2. Activate the theme

All theme specific options are handled through the WordPress Customizer.

== Frequently Asked Questions ==

== Use the gallery post format

1. Go to Admin > Posts > Add New.
2. Select the "Gallery" post format in the Post Attributes box.
3. Click "Add Media" and upload the images you wish to display in the gallery.
4. Close the Media window and publish/update the post.
5. The images you uploaded should now be displayed in the post gallery.

== Use the social menu in the header and footer

1. Go to Admin > Appearance > Menus.
2. Create a new menu.
3. Click the "Links" dropdown in the left sidebar, and add the URL and title of the social link you wish to include. 
4. Click "Add to Menu" to add it to the menu. Repeat for each link you wish to include.
5. Scroll down to "Menu Settings", and next to "Theme locations", select "Social Menu". Click save.
6. The menu should now be displayed on the site.

For a list of all social icons supported, visit http://genericons.com/.

== Add social icons to the author profile

1. Go to Admin > Users > Your Profile.
2. Scroll down to "Contact Info". Below that headline, you will find fields for each social network supported.
3. To add a social network to your author profile, add the URL to your page on that social network in the corresponding field.
4. When you are done, scroll down to the bottom and click "Update Profile".

== Licenses ==

Raleway
License: SIL Open Font License, 1.1 
Source: https://fonts.google.com/specimen/Raleway

Vollkorn
License: SIL Open Font License, 1.1 
Source: https://fonts.google.com/specimen/Vollkorn

Genericons
License: GNU GPL 2.0
Source: http://genericons.com

screenshot.png post images
License: CC0 Public Domain 
Source: http://www.unsplash.com

Backstretch.js
License: MIT License 
Source: https://raw.githubusercontent.com/srobbin/jquery-backstretch/

FlexSlider jQuery slider 
License: GNU GPL 2.0 
Source: http://flexslider.woothemes.com

== Changelog ==

Version 2.1.1 (2022-06-30)
-------------------------
- Fixed the screenshot.

Version 2.1 (2022-06-29)
-------------------------
- Switched from the Google Fonts CDN to font files included in the theme folder.
- Bumped "Tested up to" to 6.0.
- Removed the www prefix from andersnoren.se URLs.

Version 2.0.1 (2020-09-28)
-------------------------
- Fixed the header being uneven when the social menu isn't set (thanks, @psheld).
- Removed .map files to comply with new theme check requirements.

Version 2.0.0 (2020-05-26)
-------------------------
- Moved CSS, JavaScript, images and fonts to the new `/assets/` folder.
- Moved widgets to the new `/inc/` folder.
- Renamed editor style files.
- Updated widget file names.
- Removed the Flickr widget since the Flickr Badge API is being removed.
- Added theme version to enqueues, for cache busting.
- Unified widget registration and deregistration into a single function.
- Removed an admin CSS fix for post thumbnail width which hasn't been needed for +5 years.
- Moved the Hoffman_Theme_Customize class to its own file.
- Renamed the `regular` block editor font size to `normal`, matching expected naming.
- General cleanup of functions.php.
- Removed the `post-image` image size and set the `post-thumbnail` to the same size.
- Removed the `thumbnail-square` image size, which wasn't being used...?!
- Removed Customizer live preview.
- Removed the custom profile fields added with `user_contactmethods`, since themes are not allowed to add profile fields. These changes were required for Hoffman to remain on the WordPress.org theme directory.
- Added support for the core custom_logo setting, and updated the old `hoffman_logo` setting to only be displayed if you already have a `hoffman_logo` image set (kudos to @poena).
- Bumped the "Requires at least" tag to 4.5, since Hoffman is now using `custom_logo`.
- Added the "Requires PHP" field to readme.txt, and the "Tested up to" and "Requires PHP" fields to style.css.
- Only output the accent color inline CSS if the selected color differs from the default.
- Added block editor color classes to the block editor styles.
- Updated clearfix to use pseudo elements.
- Removed all title attributes from links, replaced with screen-reader-text where appropriate.
- Removed the "Comments are closed" message.
- Restructured the archive template by adding the archive template content to `the_content` with a filter, allowing us to use `singular.php` for that template.
- Minifed flexslider.js (non-minified version is still included), added version number.
- Updated template files with semantic HTML5 elements.
- Updated CSS reset.
- Update credits structure to prevent menu breakage.
- Removed vendor prefixed CSS for transform and transition.
- Updated theme description.
- Added style.css theme tags for block-styles and wide-blocks.
- Updated the theme description to reflect updates.
- Updated links to be underlined by default.
- Fixed recent posts widget missing post date output.
- Improved the structure of the main menu, esp. when wrapped over multiple lines.
- Show dropdown menus on focus as well as on hover.
- Broke out the old Post Content CSS into three sections: Blocks, Post Content, and Element Base, with the targeting in the latter section being global.
- Updated styles of all theme elements to account for the old Post Content styles now being global.
- CSS cleanup (not enough, never enough).
- Restructured the JavaScript for the post meta tab selector.
- Updated the author meta to display the translated user role.
- Bumped color contrast.
- Restructured archive header to be more SEO-friendly, and to output the archive description for all post types.
- Set the text to be antialiased in supported browsers.
- Output the excerpt on the search results page.
- Made widgets pluggable, cleaned up, fixed potential notices, fixed escaping.
- Moved the pagination to pagination.php.
- Removed license.txt.
- Updated header element order to match visual order.
- Changed the navigation toggle to a `button` element.
- Set a max width on the header social menu to prevent overflow on top of the title.
- Improved search form styling.
- Removed `search-form.php`, added support for the HTML 5 search form, and updated styles accordingly.
- Updated the Full Width Template to use `singular.php`, and set the width in CSS instead, reducing code duplication.
- Updated CSS comment sections, TOC.
- Adjusted site logo layout.
- Adjusted Quote block styles, better support for text alignments.
- Added base block margins.
- Adjusted Calendar block styles.
- Adjusted Media and Text block styles.
- Adjusted widget styles.
- Updated the Customizer CSS function to output the resulting CSS with `wp_add_inline_style()`.
- Set the tab in the top right to share background color with the background color set in the Customizer.
- Updated the Customizer CSS targeting to account for updates to `style.css` and the template files.
- Converted the screenshot to JPG format, reducing file size by ~300 KB.
- Minified genericons.css (non-minified version is also included).

Version 1.29 (2020-04-03)
-------------------------
- Fixed Genericons issue.

Version 1.28 (2020-04-02)
-------------------------
- Fixed an issue with the gallery block margins.
- Bumped "Tested up to" to 5.4.
- Updated Genericons to only use the woff file (supporting IE 10 and up), reducing file size.
- Updated register_sidebar calls to include output of widget ids.

Version 1.27 (2019-04-07)
-------------------------
- Added the new wp_body_open() function, along with a function_exists check

Version 1.26 (2018-12-28)
-------------------------
- Merged archive.php and search.php into index.php
- Merged single.php and page.php into singular.php
- Merged content-gallery.php into content.php

Version 1.25 (2018-12-07)
-------------------------
- Fixed Gutenberg style changes required due to changes in the block editor CSS and classes
- Fixed the Classic Block TinyMCE buttons being set to the wrong font

Version 1.24 (2018-11-30)
-------------------------
- Fixed Gutenberg editor styles font being overwritten

Version 1.23 (2018-10-14)
-------------------------
- Updated with Gutenberg support
	- Gutenberg editor styles
	- Styling of Gutenberg blocks
	- Custom Hoffman Gutenberg palette
	- Custom Hoffman Gutenberg typography styles
- Added option to disable Google Fonts with a translateable string
- Updated theme description
- Improved compatibility with < PHP 5.5
- Replaced minified flexslider with non-minified version
- Fixed the archive template date output

Version 1.22 (2018-05-29)
-------------------------
- Fixed the current post showing up in the recent posts widget

Version 1.21 (2018-05-24)
-------------------------
- Fixed output of cookie checkbox in comments

Version 1.20 (2017-12-03)
-------------------------
- Updated output of author description to work with the new wrapping paragraph added in 4.9

Version 1.19 (2017-12-02)
-------------------------
- Fixed silly text domain issue

Version 1.18 (2017-12-02)
-------------------------
- Updated to the new readme.txt format, with changelog.txt incorporated into it
- Added a demo link to the stylesheet theme description
- Fixed notice in comments.php
- Changed closing element comment structure
- Improved author role output in single.php
- General code cleanup, improvements in readability
- Removed duplicate comment-reply enqueueing from the header (already in functions)
- SEO improvements (title structure, mostly)
- Better handling of edge cases (missing title, missing content)
- Added word-break to titles on the archive template
- Restructured query on the archive page template

Version 1.17 (2016-06-18)
-------------------------
- Added the new theme directory tags

Version 1.16 (2016-04-02)
-------------------------
- Fixed respond input margins

Version 1.15 (2016-01-10)
-------------------------
- Removed the show/hide menu customizer option added in the last update

Version 1.14 (2015-12-29)
-------------------------
- Added a sanitize checkbox callback

Version 1.13 (2015-12-29)
-------------------------
- Increased the size of the nav-toggle clickable area
- Fixed a bug with centered images not being centered
- Fixed sticky icon link not working
- Added missing accent color elements
- Updated theme description
- Cleaned up style.css a little
- Removed superfluous <title> tag in the header (uses title_tag() from v1.10 onwards)
- Added a customizer setting for whether the main menu should be hidden behind the toggle or not

Version 1.12 (2015-08-25)
-------------------------
- Fixed an issue with overflowing images
- Added the .screen-reader-text class

Version 1.11 (2015-08-11)
-------------------------
- Fixed align-center images overflowing on smaller devices
- Replaced custom title function with title-tag support
- The widgets now use __construct()

Version 1.10 (2015-04-07)
-------------------------
- Fixed so that the Add Comment-link is only displayed if comments are open
- Removed the quote format
- Removed the video format
- Removed the styling and js for said formats
- Removed the Dribble widget
- Removed the video widget
- Updated the widgets for recent posts, recent comments and flickr to include indexing of variables
- Updated the Swedish translation due to changes in name spaces
- Fixed an error in functions.php that would prevent Genericons from being loaded in child themes
- Added sanitation to the Customize functions in functions.php
- Removed a function in functions.php that used the add_shortcode() function

Version 1.09 (2014-09-24)
-------------------------
- Fixed a bug that prevented post videos from being displayed on index.php
- Added a fixed -webkit-font-smoothing parameter to style.css

Version 1.08 (2014-09-24)
-------------------------
- Fixed the same bug for the video post format meta boxes (for real this time)

Version 1.07 (2014-09-16)
-------------------------
- Fixed a critical bug which caused the quote content and attribution boxes to malfunction

Version 1.06 (2014-08-21)
-------------------------
- Escaped URLs
- Added function prefixes
- Misc bug fixes

Version 1.05 (2014-08-18)
-------------------------
- Added licensing information for screenshot.png
- Misc bug fixes

Version 1.04 (2014-08-06)
-------------------------
- Updated style.css for brevity and browser compatibility
- Added a missing namespace, updated the Swedish translation
- Updated the form/input styling
- Updated the editor style with missing elements

Version 1.03 (2014-08-01)
-------------------------
- Spruced up the gallery slideshow navigation
- Improved the navigation toggle

Version 1.02 (2014-07-19)
-------------------------
- Added missing namespaces in single.php
– Removed extra semicolon from the recent comments widget
- Added missing brackets in functions.php
- Updated the .mo for Swedish

Version 1.01 (2014-07-18)
-------------------------
- Fixed the author position function in single.php
– Fixed CSS conflict between the author avatar in single.php and Gravatar

Version 1.0 (2014-07-17)
------------------------- 