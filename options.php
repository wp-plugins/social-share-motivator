<style>
	input { height:35px;padding:0 8px 5px 9px;-moz-border-radius: 17px;border-radius: 17px;font-size:17px;
  }
	</style>
<div class="wrap" style="font-size:11pt;padding:20px;background:white;margin-top:20px;">
    

	<form action="options.php" method="post" id="<?php echo $plugin_id; ?>_options_form" name="<?php echo $plugin_id; ?>_options_form">

		<?php settings_fields($plugin_id.'_options'); ?>

<div style="margin-left:11px;">

		<h2 style="color:#4865B4;margin-top:9px;margin-bottom:32px;letter-spacing:2px;font-size:29px;">
			
			
			<span style="letter-spacing:5px;">Options</span> of the Motivator</h2>



    <table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row"><label for="socialsharemotivatorpo_showCloseButton">Enable the Close (X) button? </label></th>
					<td style="padding-left:17px;">
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
						
<input type="text" class="regular-text code" value="<?php echo get_option('socialsharemotivatorpo_title') == ''?'Share and Enjoy! ':get_option('socialsharemotivatorpo_title'); ?>" id="socialsharemotivatorpo_title" name="socialsharemotivatorpo_title" style="box-shadow: 2px 2px 7px #DBDBDB; -webkit-box-shadow: 2px 2px 7px #DBDBDB; -moz-box-shadow: 2px 2px 7px #DBDBDB;">
						
					</td>
				</tr>				
				<tr valign="top">
					<th scope="row">
						<label for="socialsharemotivatorpo_url">URL to be shared:</label>
						</th>
					<td>
						
<input type="text" class="regular-text code" value="<?php echo get_option('socialsharemotivatorpo_url');?>" id="socialsharemotivatorpo_url" name="socialsharemotivatorpo_url" style="box-shadow: 2px 2px 7px #DBDBDB; -webkit-box-shadow: 2px 2px 7px #DBDBDB; -moz-box-shadow: 2px 2px 7px #DBDBDB;">						
							<i>&nbsp; Leave this empty to use the current page url</i>
							
					</td>
				</tr>

				<tr valign="top">
					<th scope="row"><label for="socialsharemotivatorpo_sitedesc">Page Title (for Twitter):</label></th>
					<td>
						
<input type="text" class="regular-text code" value="<?php echo get_option('socialsharemotivatorpo_sitedesc');?>" id="socialsharemotivatorpo_sitedesc" name="socialsharemotivatorpo_sitedesc" style="box-shadow: 2px 2px 7px #DBDBDB; -webkit-box-shadow: 2px 2px 7px #DBDBDB; -moz-box-shadow: 2px 2px 7px #DBDBDB;">
							<i>&nbsp; Leave this empty to use the current page title</i>
							
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="socialsharemotivatorpo_showCase">Show the prompt in: </label></th>
					<td style="padding-left:17px;">
						<label for="socialsharemotivatorpo_page">
                            <?php
                            $checked = '';
                            if (get_option('socialsharemotivatorpo_page')) $checked = 'checked';
                            ?>
                            <input type="checkbox" id="socialsharemotivatorpo_page"  name="socialsharemotivatorpo_page" <?=$checked?>> Pages &nbsp;&nbsp; 
                        </label>
						<label for="socialsharemotivatorpo_post">
						<?php 
							$checked = '';							
							if (get_option('socialsharemotivatorpo_post')) $checked = 'checked';
						?>
							<input type="checkbox" id="socialsharemotivatorpo_post"  name="socialsharemotivatorpo_post" <?=$checked?>> Posts &nbsp; &nbsp; &nbsp; 
						</label>



						<label for="socialsharemotivatorpo_category">
						<?php 
							$checked = '';							
							if (get_option('socialsharemotivatorpo_category')) $checked = 'checked';
						?>
							<input type="checkbox" id="socialsharemotivatorpo_category"  name="socialsharemotivatorpo_category" <?=$checked?>> Categories &nbsp;&nbsp; 
						</label>
						<label for="socialsharemotivatorpo_archive">
						<?php 
							$checked = '';							
							if (get_option('socialsharemotivatorpo_archive')) $checked = 'checked';
						?>
							<input type="checkbox" id="socialsharemotivatorpo_archive"  name="socialsharemotivatorpo_archive" <?=$checked?>> Archives &nbsp;&nbsp; 
						</label> 
						<label for="socialsharemotivatorpo_tag">
						<?php 
							$checked = '';							
							if (get_option('socialsharemotivatorpo_tag')) $checked = 'checked';
						?>
							<input type="checkbox" id="socialsharemotivatorpo_tag"  name="socialsharemotivatorpo_tag" <?=$checked?>> Tags &nbsp; &nbsp; &nbsp; 
						</label>  
						
						                      
						<label for="socialsharemotivatorpo_home">
						<?php 
							$checked = '';							
							if (get_option('socialsharemotivatorpo_home')) $checked = 'checked';
						?>
							<input type="checkbox" id="socialsharemotivatorpo_home"  name="socialsharemotivatorpo_home" <?=$checked?>> Home
						</label>
					</td>
				</tr>
				
				
				<tr valign="top">
					<th scope="row">
						<label for="socialsharemotivatorpo_singpages">Enable on particular pages:</label>
						</th>
					<td>
				To enable Motivator only on specific pages, clear the "Pages" option above, then write here <a href="http://www.thefreewindows.com/15950/find-id-wordpress-post-page/" target="_blank" style="text-decoration:none;color:#2b95ff;">the ID number(s)</a> of page(s) to 'shield' -- just the numbers separated by a comma, e.g. <b>23, 112, 55</b><br>
						
<input type="text" class="regular-text code" value="<?php echo get_option('socialsharemotivatorpo_singpages');?>" id="socialsharemotivatorpo_singpages" name="socialsharemotivatorpo_singpages" style="box-shadow: 2px 2px 7px #DBDBDB; -webkit-box-shadow: 2px 2px 7px #DBDBDB; -moz-box-shadow: 2px 2px 7px #DBDBDB;margin-top:12px;font-size:19px;">
					</td>
				</tr>


				<tr valign="top">
					<th scope="row">
						<label for="socialsharemotivatorpo_singposts">Enable on particular posts:</label>
						</th>
					<td>
					Clear the "Posts" option above, then write here the <a href="http://www.thefreewindows.com/15950/find-id-wordpress-post-page/" target="_blank" style="text-decoration:none;color:#2b95ff;">ID number(s)</a> of post(s) to 'shield'<br>
						
<input type="text" class="regular-text code" value="<?php echo get_option('socialsharemotivatorpo_singposts');?>" id="socialsharemotivatorpo_singposts" name="socialsharemotivatorpo_singposts" style="box-shadow: 2px 2px 7px #DBDBDB; -webkit-box-shadow: 2px 2px 7px #DBDBDB; -moz-box-shadow: 2px 2px 7px #DBDBDB;margin-top:12px;font-size:19px;">						
					</td>
				</tr>


				<tr valign="top">
					
					<th scope="row" width="110px">
						
						<div style="margin-left:12px;margin-top:11px;width:140px;padding:10px;border-radius: 5px;-moz-border-radius: 5px;<?php echo get_option('socialsharemotivatorpo_colors') == ''?'color:#4865B4; background-color:#E9EDFC; font-weight:bold; text-align:center; border:1px dashed #8C8CC6; font-size:17px; letter-spacing:normal; font-family:Helvetica, Verdana, Arial, sans-serif; ':get_option('socialsharemotivatorpo_colors'); ?>">
						
						<label for="socialsharemotivatorpo_colors">Share prompt style</label>
						
					</div>
					
						</th>
					<td>
						
<input type="text" class="regular-text code" value="<?php echo get_option('socialsharemotivatorpo_colors') == ''?'color:#4865B4; background-color:#E9EDFC; font-weight:bold; text-align:center; border:1px dashed #8C8CC6; font-size:17px; letter-spacing:normal; font-family:Helvetica, Verdana, Arial, sans-serif; ':get_option('socialsharemotivatorpo_colors'); ?>" id="socialsharemotivatorpo_colors" name="socialsharemotivatorpo_colors" style="margin-top:5px;width:80%;box-shadow: 2px 2px 7px #DBDBDB; -webkit-box-shadow: 2px 2px 7px #DBDBDB; -moz-box-shadow: 2px 2px 7px #DBDBDB;">
					<br>&nbsp;<br>
				<p style="margin-right:55px;margin-left:11px;">&nbsp; default is<span style="color:silver;"> color:#4865B4; background-color:#E9EDFC; font-weight:bold; text-align:center; border:1px dashed #8C8CC6; font-size:17px; letter-spacing:normal; font-family:Helvetica, Verdana, Arial, sans-serif;</span></p>
					
					</td>
				</tr>

			</tbody>
		</table>                 





<div style="margin:53px;line-height:177%;">
Please note: most of your changes won't be activated before the cache of your blog is cleared. 
<br>For cosmetic (style) changes to appear you may need also to refresh your browser (use the F5 or Ctrl+R keys).</div>





<p class="submit" style="background:#ececec;padding:7pt;margin:32px 42px 32px 22px;-moz-border-radius: 17px;border-radius: 17px;">

<input type="submit" value="Save your settings" class="button button-primary" id="submit" name="submit" style="cursor:pointer;letter-spacing:7px;color:#2b95ff;-moz-border-radius: 17px;border-radius: 17px;border:none;background:white;padding:0 19px;font-size:18px;"> &nbsp;  &nbsp;&nbsp;  &raquo;&nbsp; <a style="color:#2b95ff;text-decoration:none;letter-spacing:2px;font-size:18px;" href="http://www.socializer.info/share.asp?docurl=http://www.thefreewindows.com/15816/reveal-posts-visitors-share-social-networks/&doctitle=Social Share Motivator" target="_blank">Share the Motivator</a>


</p>

	</form>


<div style="font-size:16px;line-height:175%;margin-left:10px;color:grey;">
	
 &raquo; <a style="color:#2b95ff;text-decoration:none;letter-spacing:2px;" href="http://www.thefreewindows.com/15875/social-share-motivator-fqa/" target="_blank">FQA</a> &mdash; read answers, ask questions

 &nbsp; &nbsp; &nbsp;
  
  &raquo; <a style="color:#2b95ff;text-decoration:none;letter-spacing:2px;" href="http://www.thefreewindows.com/15816/reveal-posts-visitors-share-social-networks/" target="_blank">Plugin Home Page</a>


<br>
 &raquo; Check out the free <a style="color:#2b95ff;text-decoration:none;letter-spacing:2px;" href="http://www.thefreewindows.com/5598/socializer-share-WordPress-posts-pages/" target="_blank">Socializer!</a> plugin for a less &#39;aggresive&#39; promotion of your blog

<br>
 &raquo; Are you in a <a style="color:#2b95ff;text-decoration:none;letter-spacing:2px;" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8LEU4AZ8DWET2" target="_blank">donation</a> mood?

</div>


<br>

<div style="margin-top:55px;" align="center"> &nbsp;  &nbsp;  &nbsp; <a style="color:silver;text-decoration:none;font-weight:bold;font-size:24px;letter-spacing:4px;" href="http://www.thefreewindows.com/" target="_blank">TheFreeWindows</a></div>


</div>

</div>
