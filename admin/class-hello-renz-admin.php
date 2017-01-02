<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://florencecomajes.com/
 * @since      1.0.0
 *
 * @package    Hello_Renz
 * @subpackage Hello_Renz/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Hello_Renz
 * @subpackage Hello_Renz/admin
 * @author     Renz <renztoygwapo@gmail.com>
 */
class Hello_Renz_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;


	/**
	 * initialized the plugin name
	 */	

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Hello_Renz_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Hello_Renz_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/hello-renz-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'wp-color-picker' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Hello_Renz_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Hello_Renz_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/hello-renz-admin.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'my-script-handle', plugins_url('js/color.js', __FILE__ ), array( 'wp-color-picker' ), false, true );

	}
	//added sub menu 
	public function add_options_page() {
	
		$this->plugin_screen_hook_suffix = add_options_page(
			__( 'Hello Renz', $this->plugin_name ),
			__( 'Hello Renz', $this->plugin_name ),
			'manage_options',
			$this->plugin_name,
			array( $this, 'display_options_page' )
		);
	
	}

	//adding links settings
	function add_settings_link( $links ) {

		$mylinks = array(
			'<a href="' . admin_url( 'options-general.php?page=hello-renz' ) . '">Settings</a>',
		);
		return array_merge( $links, $mylinks );
	}

	//callback display settings page
	public function display_options_page() {
		include_once 'partials/hello-renz-settings-display.php';
	}

	public function settings_sanitize( $input ) {

		// Initialize the new array that will hold the sanitize values
		$new_input = array();

		if(isset($input)) {
			// Loop through the input and sanitize each of the values
			foreach ( $input as $key => $val ) {

				if($key == 'post-type') { // dont sanitize array
					$new_input[ $key ] = $val;
				} else {
					$new_input[ $key ] = sanitize_text_field( $val );
				}
				
			}

		}

		return $new_input;


	} // sanitize()



}


