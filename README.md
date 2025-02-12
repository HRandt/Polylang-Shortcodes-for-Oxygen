# Polylang Shortcodes for Oxygen #

This wordpress plugin accomplish five purposes:
- Create a Gutenberg Shortcode access to Polylang strings, so you can use it anywhere. This include Oxygen templates!
- Register new strings to translate without the need to edit functions.php nor installing a pluging to launch snippets.
- Load custom CSS and JS files in WordPress but withouth editing functions.php.
- Create a Gutenberg Shortcode access to add a Language switcher.
- Register a condition that you can use in Oxygen to show/hide content based on the language string in the URL.

If you are wondering what's the problem with functions.php: Oxygen doesn't make use of functions.php since this builder desactivate wordpress themes. So if you need to add PHP functions, you have to put it in a plugin.

In the CSS folder you will also find a little css code to modify the look of the language switcher. It doesn't work from this plugin, you will have to copy the code to the Oxygen Stylesheet.

## About the code ##
I created this plugin because I wanted a simple way to manage the translation and customization of my website without adding a third-party plugin to handle code snippets.

This plugin is based in the code of the following good people:
- [Srikat](https://github.com/srikat/my-custom-functionality/blob/master/plugin.php)
- [Karamanliev](https://gist.github.com/karamanliev/7d0e580da26d8a3344008f14eb238552)
- [Mosharush](https://gist.github.com/Mosharush/5e69d0c0cf61333e7cfd464b471986c1)
- [Mikhail.root](https://stackoverflow.com/a/52122148)
- [Nicomollet](https://gist.github.com/nicomollet/47ba9808f3187c9f1568d8f7c4355b54)
- [KittenCodes](https://gist.github.com/KittenCodes/e7a7207dc56155473cd2f572e27e09ad#file-polylang_condition-php)

Thank you.

## Installation ##

1. Click on the `Download ZIP` button at the right to download the plugin.
2. Go to Plugins > Add New in your WordPress admin. Click on `Upload Plugin` and browse for the zip file.
3. Activate the plugin.

## Usage ##
Edit `plugin.php` and use the commented sample code as an example to register new Polylang strings, add enqueue or other site-specific code.

Use shortcode `[polylang_langswitcher]` to add a language switcher.

Use `[pll_translate text="$text"]` or `[pll_translate text="$text" lang="$lang"]` to add Polylang strings to anywhere.

## Changelog ##

### 1.0.0 ###
* Initial Release

### 1.1.0 ###
* Create Oxygen condition by language.
* Create Language switcher that can be use by shortcode.
* Optional CSS to modify the look of the language switcher.