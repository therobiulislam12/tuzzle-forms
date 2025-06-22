<?php

/**
 * Plugin Name:       Tuzzle Form
 * Description:       This is Tech Tuzzle Drag n Drop Form builder Plugin
 * Plugin URI:        https://techtuzzle.com/tuzzle-forms
 * Version:           1.0.0
 * Author:            Robiul Islam
 * Author URI:        https://robiul.net/about
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path:       /languages
 * Text Domain:       tuzzle-form
 */

require 'vendor/autoload.php';

// if anyone direct access
if ( !defined( 'ABSPATH' ) ) {
    exit();
}

/**
 * Main Class
 */

final class TTZ_Tuzzle_Forms {

    // plugin version
    const version = "1.0.0";

    /**
     * Create a class instance
     *
     * @var null
     */
    private static $_instance = null;

    /**
     * Class Construct method
     */
    private function __construct() {

        

    }

    /**
     * create singleton class
     *
     * @return \TTZ_Tuzzle_Forms | void
     */
    public static function get_instance() {

        if ( !self::$_instance ) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

}

/**
 * Initializes the main plugin
 *
 * @return \TTZ_Tuzzle_Forms
 */
function tuzzle_forms() {
    return TTZ_Tuzzle_Forms::get_instance();
}

// kick-off the plugin
tuzzle_forms();