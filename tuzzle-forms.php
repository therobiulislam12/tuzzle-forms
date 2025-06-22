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
 * Text Domain:       tuzzle-forms
 */

// autoload added
require_once __DIR__ . '/vendor/autoload.php';

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

        // call constant
        $this->define_constant();

        // activation hook
        register_activation_hook( TTZ_FORMS_FILE, [$this, 'ttz_active'] );

        // after all plugins loaded
        add_action('plugins_loaded', [$this, 'ttz_init']);

    }

    /**
     * After all plugins loaded call this function
     * 
     * @return void
     */
    public function ttz_init(){
        if(is_admin()){
            new TechTuzzle\Forms\Admin();
        } else{
            new TechTuzzle\Forms\Frontend();
        }
    }

    /**
     * Activation hook
     *
     * @return void
     */
    public function ttz_active() {

        $installed = get_option( 'ttz_tuzzle_forms_installed' );

        // installation time
        if ( !$installed ) {
            update_option( 'ttz_tuzzle_forms_installed', time() );
        }

        // update version
        update_option( 'ttz_tuzzle_forms_version', TTZ_FORMS_VERSION );
    }

    /**
     * Create all constant here
     *
     * @return void
     */
    public function define_constant() {
        define( 'TTZ_FORMS_VERSION', self::version );
        define( 'TTZ_FORMS_FILE', __FILE__ );
        define( 'TTZ_FORMS_PATH', __DIR__ );
        define( 'TTZ_FORMS_URL', plugins_url( '', TTZ_FORMS_FILE ) );
        define( 'TTZ_FORMS_ASSETS', TTZ_FORMS_URL . '/assets' );
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