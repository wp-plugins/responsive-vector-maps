=== RVM - Responsive Vector Maps ===
Contributors: Enrico Urbinati
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=info%40responsivemapsplugin%2ecom&lc=IT&item_name=responsive%20Vector%20Maps%20Plugin&item_number=rvm%2dplugin%2dwordpress%2drepo&currency_code=EUR&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted
Tags: responsive maps, svg, maps, country maps, France map, Germany map, Italy map, Netherlands map, Norway map, Poland map, Portugal map, Spain map, Sweden map, Switzerland map, United Kingdom map, customisable maps, vector maps, svg map, linkable map, USA map, Belgium map, html tooltip     
Requires at least: 3.6
Tested up to: 4.2.2
Stable tag: 3.1
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Get RVM to create as many responsive vector maps as you want... stop using area tag to create your linkable maps.

== Description ==

RVM ( Responsive Vector Maps ) allows you to create responsive vector maps for your Wordpress site.

Vector maps have the advantage to not loose quality when reducing or increasing their sizes. Using RVM you will not need to create static images for area map tags.
Based on great work of Kirill Lebedev [jvectormap](jvectormap.com/), this plugin uses a combination of css, html and javascript to create as many svg maps as you like for your site.

You can use maps in sidebars as widgets or just in the post content using shortcodes.


= Features = 

* Responsive: maps will adapt their width to any device
* Cross-browser compatibility using ( yes, works even on IE7 - use SVG / RVML )
* High quality image: vector maps never loose quality
* Many maps available on default installation: France ( regions ), Germany, Italy, Netherlands, Norway, Poland, Portugal, Spain, Sweden, Switzerland, United Kingdom, Europe, USA, Belgium and whole World ( with clickable countries ).
* Dozens of downloadable maps from responsivemapsplugin.com
* Chance to install dynamic maps with all kind of svg ( not only geographical maps ! )
* Mouseover tooltip effect
* Subdivisions ( Country, Regions, Provinces, Districts etc...): customise background colours, links and html popup ( tooltip )
* Markers: add your linkable markers on the map using latitude and longitude. Chance to have html popup, dimension ( marker radius ) and min/max radius dimension scale
* Customisable look and feel
* Preview functionality: WYSAWYG while creating/editing your map
* Shortcodes: use generated shortcodes in your posts
* Widget: maps can be used in widget area too 
* Zoom capabilities
* Width: a specific width can be set while creating/editing your map or adding **width** parameter to the shortcode


== Installation ==

1. Download the zip file from this page 
2. Login to your WordPress dashboard 
3. Go to Plugins > Add New, under Install Plugins title click on Upload and use the browse button to search the .zip file you have downloaded at point 1
4. Once activated you have a RVM tab on the left hand side
5. Start creating your favourite maps

== Frequently Asked Questions ==

= Can I customize map and canvas colours ? =

Yes, these are possible layout customisations:
 
1. Canvas colour
2. Map colour
3. Map border colour
4. Add zoom-in/zoom-out buttons
5. Map width ( can use em, %, px etc.. )
6. Region background colour, links and html labels
7. Markers background colour, border colour, links, dimension, html popup message and min/max radius dimension scale
8. Get rid of map padding

= Can I customize map region links ? =

Yes, it's possible to customise links for each region/area displayed in the map. When creating a new map or editing an existing one, you will have chance to
assign url to each area/region of the map. Default areas/regions have just a tooltip mouseover effect displaying area/region name.
Furthermore you can decide the targets of the link ( where the links needs to be onpened ): _blank, _self or _parent (default is _blank).
Actually is possible to add a custom html tooltip in a secure way.

= Which WP version is the plugin compatible with ? =

The plugin will work at its best from WP ver 3.6 onwards.

= I created a new map, but I would like to give specific width just for a specific post, is it possible ? =

Yes, you can create a new map which will adapt to your box container automatically and will be responsive, but you can even use 
an additional **width** parameter to the shortcode within a specific post. Your map will have specific width just for that post.


== Screenshots ==

1. RVM once installed into Wordpress
2. Start creating your map clicking on **Add New Map**
3. Regions/Countries section
4. Markers section
5. The result... finally! We see a widget sidebar and a content map ( Notice we used two different shortcode/ID for Italy map )

== Changelog ==

= 3.1 =
* Release on June 2015
* Better management of map name when pasted inside the "Install Your Map" field. No more issues with spaces and .zip extensions

= 3.0 =
* Release on June 2015
* Introduced Custom Maps feature: you can now download and install many other maps then defaults from responsivemapsplugin.com site
* Fix links issues with some browsers ( desktop / mobile ) like Chrome, etc... 
* Link target not available anymore in order to fix links issues with some browsers ( see upon )
* Chance to get rid of padding ( space around the map ) for any single map
* Created a settings page in order to fix eventual issues created by wp_emoji script with all svg images on front end and in dashboard
* Change name of Regions/Countries tab into Subdivisions for more consistency

= 2.7 =
* Release on April 2015
* Fix regions and markers links with query-strings ( thanks macsag ! )
* Fix p tag not closed in main settings

= 2.6 =
* Release on April 2015
* ( World Map ) Fix on Niger country not picking up customisation
* Fix Portugal aspect ratio
* Added rvm-map-container class to map container div ( less conflicts and more consistency )
* Minor css fix ( map container now has min-width: 100% and box-sizing: border-box; )
* Fix typo $map_apsect_ratio into $map_aspect_ratio in rvm_shortcode.php
* Fix issue on single quote, new line and line break in regions and markers 
* Changed function esc_url_raw ( for database entries ) into esc_url ( for input field displaying security purpose ) in rvm_region.php

= 2.5.1 =
* Release on December 2014
* Fix on Indonesia not showing region custom color and custom html popup

= 2.5 =
* Release on November 2014
* Added popup to region countries
* Chance to load custom html in region and markers popup label in total security
* Added USA and Belgium maps
* Improved tabs navigation: active tab memory
* General code cleaning
* Fixed minor bugs ( visible just when WP_DEBUG active )

= 2.1 =
* Release on November 2014
* Fixed issue display weird link on blank field in region section

= 2.0 =
* Release on November 2014
* Markers added: use long/lat for markers to display on the map
* Regions/countries colour customisable
* Completely redesigned: tabbed navigation through main settings, regions/countries and markers
* Improved data storing: use of data series for regions/counties codes

= 1.2 =
* Release on 05/09/2014
* Fix Polish map not saving region links
* Added Europe and World map !
* Use of WP default color picker for map setting

= 1.1 =
Fix Sweden map not displaying : release on 28/07/2014

= 1.0 =
First release on 22/07/2014

== Upgrade Notice ==
First release on 22/07/2014


== Arbitrary section ==

ATTENTION: bare in mind that using same identical shortcode ( same post ID ) in more then one position on the same page will result into a layout issue:
in other words if you create a new map you should not use it in more then one position ( post/sidebar ) per page. 
That's because the javascript managing map creation fires same ID selector.

Create instead a new one and use it for your purposes.