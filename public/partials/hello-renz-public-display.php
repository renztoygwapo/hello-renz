<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://florencecomajes.com/
 * @since      1.0.0
 *
 * @package    Hello_Renz
 * @subpackage Hello_Renz/public/partials
 */
?>
<?php 
	$options = (get_option($this->plugin_name.'_options') ? get_option($this->plugin_name.'_options') : false);
	
	if(!isset($options['hello-renz-bar'])) { 
		$hello_renz_bar = "#007fd3";
	}else{
		$hello_renz_bar = $options['hello-renz-bar'];
	}

	if(!isset($options['custom-title'])) { 
		$title = "Your Title Here: ";
	}else{
		$title = $options['custom-title'];
	}

	if(!isset($options['sub-title'])) { 
		$sub_title = "Your Sub Title Goes Here.";
	}else{
		$sub_title = $options['sub-title'];
	}

	if(!isset($options['button-text'])) { 
		$button_text = "Send It";
	}else{
		$button_text = $options['button-text'];
	}

	if(!isset($options['color-button'])) { 
		$color_button = "#ff1744";
	}else{
		$color_button = $options['color-button'];
	}

	if(!isset($options['button-link'])) { 
		$button_link = "#";
	}else{
		$button_link = $options['button-link'];
	}

	if(!isset($options['position'])) { 
		$position = "top";
	}else{
		$position = $options['position'];
	}




?>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div id="hello-renz" style="background: <?=$hello_renz_bar?>;<?=$position?>:0px;">
	<div id="hello-renz-content">
		<span class="title">
			<?php echo $title;?>
		</span>
		<span class="sub-title"><?php echo $sub_title; ?></span>
		<?php if(isset($options['display-button'])) { ?><a href="<?php echo $button_link; ?>" class="button" style="background: <?=$color_button;?>"><?php echo $button_text; ?></a><?php } ?>
	</div>
</div>