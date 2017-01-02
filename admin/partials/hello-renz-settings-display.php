<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://florencecomajes.com/
 * @since      1.0.0
 *
 * @package    Hello_Renz
 * @subpackage Hello_Renz/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
 <div class="wrap">
        <h2>Hello Renz Settings</h2>
        <div id="poststuff">
		<div id="post-body" class="metabox-holder columns-2">
			<div id="postbox-container-2" class="postbox-container">
		        <div id="top-sortables" class="meta-box-sortables ui-sortable">
					<div id="itsec_self_protect" class="postbox ">
						<h3 class="hndle"><span>Hello Renz Bar</span></h3>
							<div class="inside">
								<p>Thanks for installing Hello Renz!</p>
								<p>You can check this bar in your public pages</p>
							</div>
					</div>
				</div>
			</div>
			<form method="post" action="options.php">
				<div id="postbox-container-3" class="postbox-container">
			        <div id="top-sortables" class="meta-box-sortables ui-sortable">
						<div id="itsec_self_protect" class="postbox ">
							<h3 class="hndle"><span>General Settings</span></h3>
								<div class="inside">
									<div class="inside">
											<?php
												settings_fields( 'hello-renz_options' );

												do_settings_sections( 'hello-renz' );

												submit_button( 'Save Settings' );
											?>
											<div class="clear"></div>
										</div>
								</div>
						</div>
					</div>
				</div>
			</form>

				<div id="postbox-container-1" class="metabox-holder">
				<div id="priority_side-sortables" class="meta-box-sortables ui-sortable">
					<div id="itsec_security_updates" class="postbox ">
						<h3 class="hndle"><span>Subscribe to Hello Renz Plugins</span></h3>
						<div class="inside">
							<div id="mc_embed_signup">
									<p>This plugins are coded with best practices in mind, they will not slow down your site or spam database.
										Guaranteed to work and always up to date. 
										<br/>Subscribe to get notificed once new plugin is out or update.</p>
									<!-- Begin MailChimp Signup Form -->
									<div id="mc_embed_signup">
									<form action="//florencecomajes.us14.list-manage.com/subscribe/post?u=566b53449919537dc79ddb939&amp;id=731bd67cc0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
									    <div id="mc_embed_signup_scroll">
										
									<div class="mc-field-group">
										<label for="mce-EMAIL">Email Address </label>
										<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
									</div>
										<div id="mce-responses" class="clear">
											<div class="response" id="mce-error-response" style="display:none"></div>
											<div class="response" id="mce-success-response" style="display:none"></div>
										</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
									     <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_566b53449919537dc79ddb939_731bd67cc0" tabindex="-1" value=""></div>
									    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button renz-btn"></div>
									    </div>
									</form>
									</div>
									<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
									<!--End mc_embed_signup-->
							</div>

						</div>
					</div>
				</div>
			</div>

		</div>
	
		</div>
</div>


 