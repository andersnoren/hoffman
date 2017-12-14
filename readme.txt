=== Hoffman ===
Contributors: Anlino
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=anders%40andersnoren%2ese&lc=US&item_name=Free%20WordPress%20Themes%20from%20Anders%20Noren&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted
Requires at least: 4.4
Tested up to: 4.8
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