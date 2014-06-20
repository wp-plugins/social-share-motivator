<div class="wrap">

    <?php screen_icon(); ?>

	<form action="options.php" method="post" id="<?php echo $plugin_id; ?>_options_form" name="<?php echo $plugin_id; ?>_options_form">

		<?php settings_fields($plugin_id.'_options'); ?>

<div style="margin-left:11px;">
	
		<h2 style="margin-bottom:32px;">Options of Social Share Motivator</h2>

    <table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><label for="socialsharemotivatorpo_showCloseButton">Enable the close button? </label></th>
					<td>
						<label for="socialsharemotivatorpo_showCloseButton">
						<?php 
							$checked = '';							
							if (get_option('socialsharemotivatorpo_showCloseButton')) $checked = 'checked';
						?>
						<input type="checkbox" id="socialsharemotivatorpo_showCloseButton" name="socialsharemotivatorpo_showCloseButton" <?=$checked?>> Enable						
						</label>
					</td>
				</tr>

				<tr valign="top">
					<th scope="row" width="110px"><label for="socialsharemotivatorpo_title">Share prompt: </label></th>
					<td>
						<input type="text" class="regular-text code" value="<?php echo get_option('socialsharemotivatorpo_title') == ''?'Share and Enjoy! ':get_option('socialsharemotivatorpo_title'); ?>" id="socialsharemotivatorpo_title" name="socialsharemotivatorpo_title">							
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="socialsharemotivatorpo_showCase">Show the prompt in: </label></th>
					<td>
						<label for="socialsharemotivatorpo_page">
                            <?php
                            $checked = '';
                            if (get_option('socialsharemotivatorpo_page')) $checked = 'checked';
                            ?>
                            <input type="checkbox" id="socialsharemotivatorpo_page"  name="socialsharemotivatorpo_page" <?=$checked?>> Pages &nbsp; 
                        </label>
						<label for="socialsharemotivatorpo_post">
						<?php 
							$checked = '';							
							if (get_option('socialsharemotivatorpo_post')) $checked = 'checked';
						?>
							<input type="checkbox" id="socialsharemotivatorpo_post"  name="socialsharemotivatorpo_post" <?=$checked?>> Posts &nbsp; 
						</label>
						<label for="socialsharemotivatorpo_category">
						<?php 
							$checked = '';							
							if (get_option('socialsharemotivatorpo_category')) $checked = 'checked';
						?>
							<input type="checkbox" id="socialsharemotivatorpo_category"  name="socialsharemotivatorpo_category" <?=$checked?>> Categories &nbsp; 
						</label>
						<label for="socialsharemotivatorpo_archive">
						<?php 
							$checked = '';							
							if (get_option('socialsharemotivatorpo_archive')) $checked = 'checked';
						?>
							<input type="checkbox" id="socialsharemotivatorpo_archive"  name="socialsharemotivatorpo_archive" <?=$checked?>> Archives &nbsp; 
						</label> 
						<label for="socialsharemotivatorpo_tag">
						<?php 
							$checked = '';							
							if (get_option('socialsharemotivatorpo_tag')) $checked = 'checked';
						?>
							<input type="checkbox" id="socialsharemotivatorpo_tag"  name="socialsharemotivatorpo_tag" <?=$checked?>> Tags
						</label>                        
					</td>
				</tr>
<!--
<tr valign="top"><th scope="row"><label for="socialsharemotivatorpo_countdown">Count down: </label></th><td><label for="socialsharemotivatorpo_countdown"><?php 
$checked = '';							
if (get_option('socialsharemotivatorpo_countdown')) $checked = 'checked';
?><input type="checkbox" id="socialsharemotivatorpo_countdown"  name="socialsharemotivatorpo_countdown" <?=$checked?>> Enable</label><input type="text" name="socialsharemotivatorpo_countdown_duration" id="socialsharemotivatorpo_countdown_duration" value="<?php echo get_option('socialsharemotivatorpo_countdown_duration');?>" class="small-text"><label for="socialsharemotivatorpo_countdown_duration">Seconds</label></td></tr>
-->
				<tr valign="top">
					<th scope="row"><label for="socialsharemotivatorpo_url">URL to be shared</label></th>
					<td>
						<input type="text" class="regular-text code" value="<?php echo get_option('socialsharemotivatorpo_url');?>" id="socialsharemotivatorpo_url" name="socialsharemotivatorpo_url">								
							<i>Leave this empty to use the current page url</i>
					</td>
				</tr>

				<tr valign="top">
					<th scope="row"><label for="socialsharemotivatorpo_sitedesc">Page Title (for Twitter)</label></th>
					<td>
						<input type="text" class="regular-text code" value="<?php echo get_option('socialsharemotivatorpo_sitedesc');?>" id="socialsharemotivatorpo_sitedesc" name="socialsharemotivatorpo_sitedesc">								
							<i>Leave this empty to use the current page title</i>
					</td>
				</tr>



			</tbody>
		</table>                 
		
<div style="padding: 1px 0 5px 1px;background:white;margin-top:42px;border-left:3px solid #008BBF;">
	<h2>&nbsp; <a style="color:#C0C0C0;text-decoration:none;border:none;letter-spacing:1px;" href="http://www.socializer.info/share.asp?docurl=http://www.thefreewindows.com/15816/reveal-posts-visitors-share-social-networks/&doctitle=Social Share Motivator" target="_blank">Share the Motivator</a></h2>
</div>

<p class="submit" style="border-top:1px dotted grey;padding-top:31px;"><input type="submit" value="Save your settings" class="button button-primary" id="submit" name="submit" style="font-size:14px;letter-spacing:2px;width:200px;"></p>

	</form>
	
</div>

</div>
