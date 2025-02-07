<?php
/*
Plugin Name:	Oxygen Polylang Strings Shortcode
Plugin URI:		https://github.com/HRandt/Polylang-Shortcodes-for-Oxygen
Description:	Create shortcodes to access Polylang strings from Oxygen templates.
Version:		1.0.0
Author:			H. Randt
Author URI:		https://conejadas.es
License:		GPL-2.0+
License URI:	http://www.gnu.org/licenses/gpl-2.0.txt

This plugin is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

This plugin is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with This plugin. If not, see {URI to Plugin License}.
*/

if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action( 'wp_enqueue_scripts', 'custom_enqueue_files' );
/**
 * Loads <list assets here>.
 */
function custom_enqueue_files() {
	// if this is not the front page, abort.
	// if ( ! is_front_page() ) {
	// 	return;
	// }

	// loads a CSS file in the head.
	// wp_enqueue_style( 'highlightjs-css', plugin_dir_url( __FILE__ ) . 'assets/css/style.css' );

	/**
	 * loads JS files in the footer.
	 */
	// wp_enqueue_script( 'highlightjs', plugin_dir_url( __FILE__ ) . 'assets/js/highlight.pack.js', '', '9.9.0', true );

	// wp_enqueue_script( 'highlightjs-init', plugin_dir_url( __FILE__ ) . 'assets/js/highlight-init.js', '', '1.0.0', true );
}

/**
 * Create the shortcode block
 * it can be recall with:
 * [pll_translate text="$text"]
 * or...
 * [pll_translate text="$text" lang="$lang"]
 */
function polylanguage_shortcode( $atts ) {
  $atts = shortcode_atts(
      array(
          'text'           => '',
          'lang'           => pll_current_language()
      ),
      $atts
  );
  return pll_translate_string( $atts['text'], $atts['lang'] );
}
add_shortcode( 'pll_translate', 'polylanguage_shortcode' );

/**
 * Outputs localized string if polylang exists or  output's not translated one as a fallback
 *
 * @param $string
 *
 * @return  void
 */
function pl_e( $string = '' ) {
    if ( function_exists( 'pll_e' ) ) {
        pll_e( $string );
    } else {
        echo $string;
    }
}

/**
 * Returns translated string if polylang exists or  output's not translated one as a fallback
 *
 * @param $string
 *
 * @return string
 */
function pl__( $string = '' ) {
    if ( function_exists( 'pll__' ) ) {
        return pll__( $string );
    }

    return $string;
}

/** 
* Register here the translatable strings.
* pll_register_string( $name, $string, $group, $multiline );
* ‘$name’ => (required) name provided for sorting convenience (ex: ‘myplugin’)
* ‘$string’ => (required) the string to translate
* ‘$group’ => (optional) the group in which the string is registered, defaults to ‘polylang’
* ‘$multiline’ => (optional) if set to true, the translation text field will be multiline, defaults to false
*/
function your_prefix_after_setup_theme() {

    if ( function_exists( 'pll_register_string' ) ) {

        pll_register_string( 'faq', 'F.A.Q.', 'menu', false );
		pll_register_string( 'about', 'About', 'menu', false );
		pll_register_string( 'newsletter', 'Newsletter', 'menu', false );
		pll_register_string( 'linktree', 'Linktree', 'menu', false );
		pll_register_string( 'blog', 'Blog', 'menu', false );
		pll_register_string( 'contact', 'Contact', 'menu', false );
		pll_register_string( 'subdescription', 'subdescription', 'main', false );
		pll_register_string( 'books', 'mybooks', 'main', false );

    }
}
 add_action( 'after_setup_theme', 'your_prefix_after_setup_theme' );