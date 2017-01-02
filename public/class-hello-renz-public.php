<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://florencecomajes.com/
 * @since      1.0.0
 *
 * @package    Hello_Renz
 * @subpackage Hello_Renz/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Hello_Renz
 * @subpackage Hello_Renz/public
 * @author     Renz <renztoygwapo@gmail.com>
 */
class Hello_Renz_Public {

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
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/hello-renz-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/hello-renz-public.js', array( 'jquery' ), $this->version, false );

	}

	//loading frontend
	public function front_end() {
		// Check if plugin is disabled in options to remove css also.
		$options = (get_option($this->plugin_name.'_options') ? get_option($this->plugin_name.'_options') : false);

		if(!isset($options["disable-bar"])) {
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/hello-renz-public-display.php';
		}

	}

}
