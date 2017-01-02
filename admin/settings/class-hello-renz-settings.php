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
class Hello_Renz_Settings extends Hello_Renz_Admin {

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

		$this->id    = 'general';
		$this->label = __( 'General', 'woocommerce' );
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */

	public function settings_init(){

	
		register_setting(
			$this->plugin_name . '_options',
			$this->plugin_name . '_options',
			array( $this, 'settings_sanitize' )
		);

		// add_settings_section( $id, $title, $callback, $menu_slug );
		add_settings_section(
			$this->plugin_name . '-display-options', // section
			apply_filters( $this->plugin_name . '-display-section-title', __( '', $this->plugin_name ) ),
			array( $this, 'display_options_section' ),
			$this->plugin_name
		);

		add_settings_field(
			'disable-bar',
			apply_filters( $this->plugin_name . '-disable-bar-label', __( 'Disable Bar', $this->plugin_name ) ),
			array( $this, 'disable_bar_options_field' ),
			$this->plugin_name,
			$this->plugin_name . '-display-options' // section to add to
		);

		add_settings_field(
			'position',
			apply_filters( $this->plugin_name . '-position-label', __( 'Position', $this->plugin_name ) ),
			array( $this, 'position_field' ),
			$this->plugin_name,
			$this->plugin_name . '-display-options' // section to add to
		);

		add_settings_field(
			'hello-renz-bar',
			apply_filters( $this->plugin_name . '-hello-renz-bar', __( 'Hello Renz Background Color :', $this->plugin_name ) ),
			array( $this, 'hello_renz_bar' ),
			$this->plugin_name,
			$this->plugin_name . '-display-options'
		);

		add_settings_field(
			'custom-title',
			apply_filters( $this->plugin_name . '-custom-title', __( 'Change Title Text :', $this->plugin_name ) ),
			array( $this, 'custom_title' ),
			$this->plugin_name,
			$this->plugin_name . '-display-options'
		);

		add_settings_field(
			'sub-title',
			apply_filters( $this->plugin_name . '-sub-title', __( 'Change Subtitle Text :', $this->plugin_name ) ),
			array( $this, 'sub_title' ),
			$this->plugin_name,
			$this->plugin_name . '-display-options'
		);

		add_settings_field(
			'display-button',
			apply_filters( $this->plugin_name . '-display-button-label', __( 'Display Button?', $this->plugin_name ) ),
			array( $this, 'display_button_field' ),
			$this->plugin_name,
			$this->plugin_name . '-display-options' // section to add to
		);

		add_settings_field(
			'button-text',
			apply_filters( $this->plugin_name . '-button-text', __( 'Button Text :', $this->plugin_name ) ),
			array( $this, 'button_text' ),
			$this->plugin_name,
			$this->plugin_name . '-display-options',
			array( 'class' => 'btn-text' )
		);

		add_settings_field(
			'color-button',
			apply_filters( $this->plugin_name . '-color-button', __( 'Button Color :', $this->plugin_name ) ),
			array( $this, 'button_color' ),
			$this->plugin_name,
			$this->plugin_name . '-display-options',
			array( 'class' => 'btn-color' )
		);

		add_settings_field(
			'button-link',
			apply_filters( $this->plugin_name . '-button-link', __( 'Button Links', $this->plugin_name ) ),
			array( $this, 'button_link' ),
			$this->plugin_name,
			$this->plugin_name . '-display-options',
			array( 'class' => 'btn-links' )
		);

	}

	/**
	 * Creates a settings section
	 *
	 * @since 		1.0.0
	 * @param 		array 		$params 		Array of parameters for the section
	 * @return 		mixed 						The settings section
	 */
	public function display_options_section( $params ) {

		echo '<p>' . $params['title'] . '</p>';	

	} // display_options_section()

	public function disable_bar_options_field() {

		$options 	= get_option( $this->plugin_name . '_options' );
		$option 	= 0;

		if ( ! empty( $options['disable-bar'] ) ) {

			$option = $options['disable-bar'];

		}

		?><input type="checkbox" id="<?php echo $this->plugin_name; ?>_options[disable-bar]" name="<?php echo $this->plugin_name; ?>_options[disable-bar]" value="1" <?php checked( $option, 1 , true ); ?> />
		<p class="description">Disabling bar is also disabling front end loading of scripts css/js.</p> <?php
	
	} // disable_bar_options_field()

	public function position_field(){

		$options 	= get_option( $this->plugin_name . '_options' );
		$option 	= "top";

		if ( ! empty( $options['position'] ) ) {

			$option = $options['position'];

		}

		?>
		<input type="radio" id="<?php echo $this->plugin_name; ?>_options[position]" name="<?php echo $this->plugin_name; ?>_options[position]" value="top" checked="checked" <?php checked( $option, "top" , true ); ?>/>
		<p class="description">Top</p>
		<input type="radio" id="<?php echo $this->plugin_name; ?>_options[position]" name="<?php echo $this->plugin_name; ?>_options[position]" value="bottom" <?php checked( $option, "bottom" , true ); ?> />
		<p class="description">Bottom</p>
		
		<?php

	}

	public function display_button_field() {

		$options 	= get_option( $this->plugin_name . '_options' );
		$option 	= 0;

		if ( ! empty( $options['display-button'] ) ) {

			$option = $options['display-button'];

		}

		?><input type="checkbox" class="display-btn" id="<?php echo $this->plugin_name; ?>_options[display-button]" name="<?php echo $this->plugin_name; ?>_options[display-button]" value="1" <?php checked( $option, 1 , true ); ?> />
		<p class="description">Yes</p>
		<?php
	
	} // disable_bar_options_field()


	public function hello_renz_bar(){

		$options  	= get_option( $this->plugin_name . '_options' );
		$option 	= '#007fd3';

		if ( ! empty( $options['hello-renz-bar'] ) ) {
			$option = $options['hello-renz-bar'];
		}

		?>
		<input type="text" id="<?php echo $this->plugin_name; ?>_options[hello-renz-bar]" name="<?php echo $this->plugin_name; ?>_options[hello-renz-bar]" value="<?php echo esc_attr( $option ); ?>" class="hello-renz-bar-color-field" data-default-color="#007fd3">
		<?php
	} //button_color()	

	public function custom_title() {

		$options  	= get_option( $this->plugin_name . '_options' );
		$option 	= 'Your Title Goes Here :';

		if ( ! empty( $options['custom-title'] ) ) {
			$option = $options['custom-title'];
		}

		?>
		<input type="text" id="<?php echo $this->sb_bar; ?>_options[custom-title]" name="<?php echo $this->plugin_name; ?>_options[custom-title]" value="<?php echo esc_attr( $option ); ?>" style="width:300px;">
		<?php
	} // custom_title()

	public function sub_title() {

		$options  	= get_option( $this->plugin_name . '_options' );
		$option 	= 'Sub Title Goes Here ...';

		if ( ! empty( $options['sub-title'] ) ) {
			$option = $options['sub-title'];
		}

		?>
		<input type="text" id="<?php echo $this->plugin_name; ?>_options[sub-title]" name="<?php echo $this->plugin_name; ?>_options[sub-title]" value="<?php echo esc_attr( $option ); ?>" style="width:300px;">
		<?php
	} // sub_title()

	public function button_text() {

		$options  	= get_option( $this->plugin_name . '_options' );
		$option 	= 'Send It';

		if ( ! empty( $options['button-text'] ) ) {
			$option = $options['button-text'];
		}

		?>
		<input type="text" id="<?php echo $this->plugin_name; ?>_options[button-text]" name="<?php echo $this->plugin_name; ?>_options[button-text]" value="<?php echo esc_attr( $option ); ?>" style="width:300px;" class="btn-text">
		<?php
	} // button_text()

	public function button_color(){

		$options  	= get_option( $this->plugin_name . '_options' );
		$option 	= '#ff1744';

		if ( ! empty( $options['color-button'] ) ) {
			$option = $options['color-button'];
		}

		?>
		<input type="text" id="<?php echo $this->plugin_name; ?>_options[color-button]" name="<?php echo $this->plugin_name; ?>_options[color-button]" value="<?php echo esc_attr( $option ); ?>" class="my-color-field" data-default-color="#ff1744">
		<?php
	} //button_color()

	public function button_link() {

		$options  	= get_option( $this->plugin_name . '_options' );
		$option 	= '#';

		if ( ! empty( $options['button-link'] ) ) {
			$option = $options['button-link'];
		}

		?>
		<!-- Populate pages in Dropdown-->
		<select id="<?php echo $this->plugin_name; ?>_options[custom-color]" name="<?php echo $this->plugin_name; ?>_options[button-link]" >
		 <option value="#">
		<?php echo esc_attr( __( 'Select page' ) ); ?></option> 
		 <?php 
		  $pages = get_pages(); 
		  foreach ( $pages as $page ) { ?>
		  	<option value="<?php echo get_page_link( $page->ID ); ?>" <?php selected( $option, get_page_link( $page->ID )); ?> ><?php echo $page->post_title; ?></option>
		<?php  } ?>
		</select>

		<?php

	} // custom_color()






	


}


