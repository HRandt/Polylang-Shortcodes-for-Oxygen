<?php
/*
Plugin Name:	Oxygen Polylang Strings Shortcode
Plugin URI:		https://github.com/HRandt/Polylang-Shortcodes-for-Oxygen
Description:	Create shortcodes to access Polylang strings from Oxygen templates.
Version:		1.1.0
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
add_action( 'wp_enqueue_scripts', 'custom_enqueue_files' );

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
		pll_register_string( 'contact', 'Contact', 'menu', false );
		pll_register_string( 'dontmiss', 'dontmiss', 'footer', false );
		pll_register_string( 'books', 'mybooks', 'footer', false );
		pll_register_string( 'services', 'myservices', 'footer', false );

    }
	
	
}
 add_action( 'after_setup_theme', 'your_prefix_after_setup_theme' );
 
/**
 * Polylang Shortcode - https://wordpress.org/plugins/polylang/
 * Add this code in your functions.php
 * Put shortcode [polylang_langswitcher] to post/page for display flags
 *
 * @return string
 */
function custom_polylang_langswitcher() {
	/**
	  * @param array     $args {
	  *   Optional array of arguments.
	  *
	  *   @type int      $dropdown               The list is displayed as dropdown if set, defaults to 0.
	  *   @type int      $echo                   Echoes the list if set to 1, defaults to 1.
	  *   @type int      $hide_if_empty          Hides languages with no posts ( or pages ) if set to 1, defaults to 1.
	  *   @type int      $show_flags             Displays flags if set to 1, defaults to 0.
	  *   @type int      $show_names             Shows language names if set to 1, defaults to 1.
	  *   @type string   $display_names_as       Whether to display the language name or its slug, valid options are 'slug' and 'name', defaults to name.
	  *   @type int      $force_home             Will always link to home in translated language if set to 1, defaults to 0.
	  *   @type int      $hide_if_no_translation Hides the link if there is no translation if set to 1, defaults to 0.
	  *   @type int      $hide_current           Hides the current language if set to 1, defaults to 0.
	  *   @type int      $post_id                Returns links to the translations of the post defined by post_id if set, defaults not set.
	  *   @type int      $raw                    Return a raw array instead of html markup if set to 1, defaults to 0.
	  *   @type string   $item_spacing           Whether to preserve or discard whitespace between list items, valid options are 'preserve' and 'discard', defaults to 'preserve'.
	  *   @type int      $admin_render           Allows to force the current language code in an admin context if set, default to 0. Need to set the admin_current_lang argument below.
	  *   @type string   $admin_current_lang     The current language code in an admin context. Need to set the admin_render to 1, defaults not set.
	  *   @type string[] $classes                A list of CSS classes to set to each elements outputted.
	  *   @type string[] $link_classes           A list of CSS classes to set to each link outputted.
	  * }
	*/
	$output = '';
	if ( function_exists( 'pll_the_languages' ) ) {
		$args   = [
			'show_flags'	=> 1,
			'show_names'	=> 1,
			'hide_current'	=> 1,
			'echo'			=> 0,
		];
		$output = '<ul class="polylang_langswitcher">'.pll_the_languages( $args ). '</ul>';
	}

	return $output;
}

add_shortcode( 'polylang_langswitcher', 'custom_polylang_langswitcher' );


/*
 * The following code provides conditions that you can use to show/hide content based on the language string in the URL.
 */
add_action('init', function() {
	if( function_exists('oxygen_vsb_register_condition') && function_exists('pll_languages_list') ) {
		
		$lang_list = pll_languages_list();
		
		oxygen_vsb_register_condition(
			
			//Condition Name
			'Locale',
			
			//Values
			array( 
				'options' => $lang_list,
				'custom' => false
			),
			//Operators
			array('==', '!='),
			
			//Callback Function
			'polylang_callback',
			
			//Condition Category
			'Polylang'
		);
		
		function polylang_callback($value, $operator) {
			
			$my_lang = pll_current_language();
			global $OxygenConditions;
			return $OxygenConditions->eval_string($my_lang, $value, $operator);
			
		}

	}
});

/**
 * Proper way to enqueue scripts and styles.
 *
*/
add_action('wp_enqueue_scripts', 'callback_for_setting_up_scripts');
function callback_for_setting_up_scripts() {
	wp_enqueue_style('your-plugin-style', plugin_dir_url(__FILE__) . 'assets/css/style.css');
    /*wp_register_style( 'list_style', '/assets/css/style.css' );
    wp_enqueue_style( 'list_style' );*/
	/* wp_enqueue_script( 'namespaceformyscript', 'http://locationofscript.com/myscript.js', array( 'jquery' ) ); */
	
	/*
	 * wp_enqueue_scripts action will set things up for the "frontend". 
	 * admin_enqueue_scripts action for the backend (anywhere within wp-admin).
	 * login_enqueue_scripts action for the login page.
	 */
}