<?php
/*
Plugin Name: Social Share Motivator
Plugin URI: http://www.thefreewindows.com/15816/reveal-posts-visitors-share-social-networks/
Description: Social Share Motivator makes your page darker (hidden, but not entirely), urging your visitors to share it on Facebook, Twitter or Google Plus, in order to gain access. You may like to check the <a href="http://www.thefreewindows.com/15816/reveal-posts-visitors-share-social-networks/" target="_blank">Home Page of Social Share Motivator</a> for more information.
Version: 1.0
Author: TheFreeWindows
*/

$wp_scripts = new WP_Scripts();
if (!is_admin()) {
	wp_enqueue_script("jquery");
	wp_deregister_script('facebooksdk');
	wp_register_script('facebooksdk', 'http://connect.facebook.net/en_US/all.js#xfbml=1');
	wp_enqueue_script("facebooksdk");
	wp_deregister_script('plusone');
	wp_register_script('plusone', 'https://apis.google.com/js/plusone.js');
	wp_enqueue_script("plusone");
	wp_deregister_script('twittersdk');
	wp_register_script('twittersdk', 'https://platform.twitter.com/widgets.js');
	wp_enqueue_script("twittersdk");
}

if(!class_exists('socialsharemotivator_class')) :
// DEFINE PLUGIN ID
define('SOCIAL_SHARE_MOTIVATOR_PLUGINOPTIONS_ID', 'socialsharemotivator-plugin-options');
// DEFINE PLUGIN NICK
define('SOCIAL_SHARE_MOTIVATOR_PLUGINOPTIONS_NICK', 'Social Share Motivator');

class socialsharemotivator_class {
	
	function __construct() {
		if (is_admin()) {			
			add_action('wp_ajax_sosharemotivator', array(&$this, "sosharemotivator_callback"));
			add_action('wp_ajax_nopriv_sosharemotivator', array(&$this, "sosharemotivator_callback"));	
			add_action('admin_init', array(&$this, 'register'));
	        add_action('admin_menu', array(&$this, 'menu'));			
		} else {								
			add_action("wp_head", array(&$this, "front_header"));
			add_action("wp_footer", array(&$this, "front_footer"));							
		}
	}
	
	public static function file_path($file)
	{
		return ABSPATH.'wp-content/plugins/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)).$file;
	}
	
	public static function register()
	{
		register_setting(SOCIAL_SHARE_MOTIVATOR_PLUGINOPTIONS_ID.'_options', 'socialsharemotivatorpo_showCloseButton');
		register_setting(SOCIAL_SHARE_MOTIVATOR_PLUGINOPTIONS_ID.'_options', 'socialsharemotivatorpo_title');
		register_setting(SOCIAL_SHARE_MOTIVATOR_PLUGINOPTIONS_ID.'_options', 'socialsharemotivatorpo_countdown');
		register_setting(SOCIAL_SHARE_MOTIVATOR_PLUGINOPTIONS_ID.'_options', 'socialsharemotivatorpo_countdown_duration');
		register_setting(SOCIAL_SHARE_MOTIVATOR_PLUGINOPTIONS_ID.'_options', 'socialsharemotivatorpo_url');		
		register_setting(SOCIAL_SHARE_MOTIVATOR_PLUGINOPTIONS_ID.'_options', 'socialsharemotivatorpo_post');		
		register_setting(SOCIAL_SHARE_MOTIVATOR_PLUGINOPTIONS_ID.'_options', 'socialsharemotivatorpo_category');
        register_setting(SOCIAL_SHARE_MOTIVATOR_PLUGINOPTIONS_ID.'_options', 'socialsharemotivatorpo_tag');
        register_setting(SOCIAL_SHARE_MOTIVATOR_PLUGINOPTIONS_ID.'_options', 'socialsharemotivatorpo_page');
		register_setting(SOCIAL_SHARE_MOTIVATOR_PLUGINOPTIONS_ID.'_options', 'socialsharemotivatorpo_archive');		
	}
	/** function/method
	* Usage: hooking (registering) the plugin menu
	* Arg(0): null
	* Return: void
	*/
	public static function menu()
	{
		// Create menu tab
		add_options_page(SOCIAL_SHARE_MOTIVATOR_PLUGINOPTIONS_NICK.' Plugin Options', SOCIAL_SHARE_MOTIVATOR_PLUGINOPTIONS_NICK, 'manage_options', SOCIAL_SHARE_MOTIVATOR_PLUGINOPTIONS_ID, array('socialsharemotivator_class', 'options_page'));      
	}
	
	public static function options_page()
	{
		if (!current_user_can('manage_options'))
		{
			wp_die( __('You do not have sufficient permissions to access this page.') );
		}
	
		$plugin_id = SOCIAL_SHARE_MOTIVATOR_PLUGINOPTIONS_ID;
		// display options page
		include(self::file_path('options.php'));
	}
	/** function/method
	* Usage: filtering the content
	* Arg(1): string
	* Return: string
	*/
  function front_header() {
		echo '<link type="text/css" rel="stylesheet" href="'.site_url().'/wp-content/plugins/'.basename(dirname(__FILE__)).'/css/faceboxmodal.css">';
		echo '<script type="text/javascript" src="'.site_url().'/wp-content/plugins/'.basename(dirname(__FILE__)).'/js/faceboxmodal.js"></script>';
	}
  
	function sosharemotivator_callback() {
		global $wpdb;		
    $cookie_value = "0|0|0";	
    if(!empty($_COOKIE["__asl"])){
			$cookie_value = $_COOKIE["__asl"];
		}
    $cookies = explode("|", $cookie_value);
		switch ($_POST['network']) {
			case "facebook":
        $cookie_value = "1|".$cookies[1]."|".$cookies[2];
				break;
      case "plus":
        $cookie_value = $cookies[0]."|1|".$cookies[2];
        break;
      case "twitter":
        $cookie_value = $cookies[0]."|".$cookies[1]."|1";
        break;
			default:
				break;
		}
		setcookie("__asl", "1", time()+3600*24*90, "/");
	}		

	function front_footer() {
		global $wpdb;
        $showCategory = get_option('socialsharemotivatorpo_category');
        $showTag = get_option('socialsharemotivatorpo_tag');
        $showPost = get_option('socialsharemotivatorpo_post');
        $showPage = get_option('socialsharemotivatorpo_page');
		$showArchive = get_option('socialsharemotivatorpo_archive');
        if (empty($showCategory) && is_category()) return;
        if (empty($showTag) && is_tag()) return;
        if (empty($showPost) && is_single()) return;
        if (empty($showPage) && is_page()) return;
		if (empty($showArchive) && is_archive()) return;

		$cookie_value = "";	
		if(!empty($_COOKIE["__asl"])){
			$cookie_value = $_COOKIE["__asl"];
		}
		$popupTitle = get_option('socialsharemotivatorpo_title');
		$showClose = '';
		if (get_option('socialsharemotivatorpo_showCloseButton'))
			$showClose = 'jQuery(".popup").append(\'<a class="close" href="#"><img class="close_image" title="close" src="'.site_url().'/wp-content/plugins/'.basename(dirname(__FILE__)).'/images/closelabel.png"></a>\'); 
							jQuery("#facebox .close").click(jQuery.facebox.close);';
		if (get_option('socialsharemotivatorpo_url') != '') {
			$url = 'href="'.get_option('socialsharemotivatorpo_url').'"';
			$twitterUrl = 'data-url="'.get_option('socialsharemotivatorpo_url').'"';
		}
		$countDown = '';
		$countDownDuration = get_option('socialsharemotivatorpo_countdown_duration');				
		if (get_option('socialsharemotivatorpo_countdown'))
			$countDown = '				
				var countD = '.$countDownDuration.';	
				var timer = setInterval(function() {
					jQuery(".countDownDiv").html(\'Or wait <b>\' + countD + \'</b> seconds\');				
					countD--;
					if (countD == -1) {						
						clearInterval(timer);
						jQuery.facebox.close();
					}					
				},1000);								
			';
		
		if($cookie_value != "1"){
			echo '			
			<div id="fb-root"></div>
			<script type="text/javascript">
				FB.XFBML.parse();
			</script>
			<script type="text/javascript">
			var sosharemotivator_use = false;
			function sosharemotivator_plusone(plusone) {
				if (plusone.state == "on") {
					var data = {action: "sosharemotivator", network: "plus"};
					jQuery.post("'.admin_url('admin-ajax.php').'", data, function(response) {
						if (sosharemotivator_use) location.reload();
					});
				}
			}
			FB.init();
			jQuery(document).ready(function() {
				FB.Event.subscribe("edge.create", function(href, widget) { 
					var data = {action: "sosharemotivator", network: "facebook"};
					jQuery.post("'.admin_url('admin-ajax.php').'", data, function(response) {
						if (sosharemotivator_use) location.reload();
					});
				});		
				twttr.ready(function (twttr) {
					twttr.events.bind("tweet", function(event) {
						var data = {action: "sosharemotivator", network: "twitter"};
						jQuery.post("'.admin_url('admin-ajax.php').'", data, function(response) {
							if (sosharemotivator_use) location.reload();
						});
					});
				});				
			});
			</script>
			<div id="sosharemotivator" style="display:none;">
				<div class="socialviral-box">                
			    '.$popupTitle.'
				  <div class="asl-socials">
					<div><fb:like layout="box_count" show_faces="false" '.$url.'></fb:like></div>
					<div><g:plusone callback="sosharemotivator_plusone" size="tall" '.$url.'></g:plusone></div>
					<div><a class="twitter-share-button" data-count="vertical" '.$twitterUrl.'>Tweet</a></div>
				  </div>
				</div>
				<div id="countDownDiv" class="countDownDiv"></div>
				<div class="asl-author"><a href="http://www.thefreewindows.com" target="_blank">Powered by TheFreeWindows</a></div>	
				</div>
			<script type="text/javascript">			  
			  sosharemotivator_use = true;
			  jQuery(document).ready(function() {            
				  jQuery.facebox({div: "#sosharemotivator", loadingImage: "'.site_url().'/wp-content/plugins/'.basename(dirname(__FILE__)).'/images/loading.gif"});
				  '.$countDown.'  			  
				  '.$showClose.'			  
				});
			</script>
			';
		}
	}
}

$sosharemotivator = new socialsharemotivator_class();

if(isset($sosharemotivator)) { 
	function plugin_settings_link($links) { 
		$settings_link = '<a href="options-general.php?page='.SOCIAL_SHARE_MOTIVATOR_PLUGINOPTIONS_ID.'">Settings</a>'; 
		array_unshift($links, $settings_link); return $links; 
	} 
	$plugin = plugin_basename(__FILE__); 
	add_filter("plugin_action_links_$plugin", 'plugin_settings_link'); 
}

endif;
?>