# Polylang Shortcodes for Oxygen #

This wordpress plugin accomplish three purposes:
- Add a Gutenberg Shortcode access to Polylang strings, so you can use it anywhere. This include Oxygen templates!
- Register new strings to translate without the need to edit functions.php nor installing a pluging to launch snippets.
- Load custom CSS and JS files in WordPress but withouth editing functions.php.

If you are wondering what's the problem with functions.php: Oxygen doesn't make use of functions.php since this builder desactivate wordpress themes. So if you need to add PHP functions, you have to put it in a plugin.

## About the code ##

This plugin is based in the code of the following good fellas:
- [Srikat](https://github.com/srikat/my-custom-functionality/blob/master/plugin.php)
- [Karamanliev](https://gist.github.com/karamanliev/7d0e580da26d8a3344008f14eb238552)
- [Mosharush](https://gist.github.com/Mosharush/5e69d0c0cf61333e7cfd464b471986c1)
- [Mikhail.root](https://stackoverflow.com/a/52122148)

Thank you.

## Installation ##

1. Click on the `Download ZIP` button at the right to download the plugin.
2. Go to Plugins > Add New in your WordPress admin. Click on `Upload Plugin` and browse for the zip file.
3. Activate the plugin.

## Usage ##
Edit `plugin.php` and use the commented sample code as an example to register new Polylang strings, add enqueue or other site-specific code. 

## Changelog ##

### 1.0.0 ###
* Initial Release
