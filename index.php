<?php 
/*
Plugin Name: Dashboard User profile Detais-(DUPD)
Plugin URI: http://www.bdTunes.com
Description: This plugin for Dashboard user profile Detais widget.
Author: Hk Tanbir
Author URI: http://www.bdtunes.com
Version: 1.0
*/


					if(!class_exists('duppluginoption')) :
					// DEFINE PLUGIN ID
					define('duppluginoption_ID', 'dupd-plugin-options');
					// DEFINE PLUGIN NICK
					define('duppluginoption_NICK', 'Dashboard User profile Detais-(DUPD)');
						class duppluginoption
						{
							/** function/method
							* Usage: return absolute file path
							* Arg(1): string
							* Return: string
							*/
							public static function file_path($file)
							{
								return ABSPATH.'wp-content/plugins/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)).$file;
							}
							/** function/method
							* Usage: hooking the plugin options/settings
							* Arg(0): null
							* Return: void
							*/
							public static function register()
							{
								register_setting(duppluginoption_ID.'_options', 'dup1');
								register_setting(duppluginoption_ID.'_options', 'dup2');
								register_setting(duppluginoption_ID.'_options', 'dup3');
								register_setting(duppluginoption_ID.'_options', 'dup4');
								register_setting(duppluginoption_ID.'_options', 'dup5');
								register_setting(duppluginoption_ID.'_options', 'link');
								register_setting(duppluginoption_ID.'_options', 'title');
								
							}
							/** function/method
							* Usage: hooking (registering) the plugin menu
							* Arg(0): null
							* Return: void
							*/
							public static function menu()
							{
								// Create menu tab
								add_options_page(duppluginoption_NICK.' Plugin Options', duppluginoption_NICK, 'manage_options', duppluginoption_ID.'_options', array('duppluginoption', 'options_page'));
							}
							/** function/method
							* Usage: show options/settings form page
							* Arg(0): null
							* Return: void
							*/
							public static function options_page()
							{
								if (!current_user_can('manage_options'))
								{
									wp_die( __('You do not have sufficient permissions to access this page.') );
								}
					
								$plugin_id = duppluginoption_ID;
								// display options page
								include(self::file_path('options.php'));
							}
						}
						if ( is_admin() )
						{
							add_action('admin_init', array('duppluginoption', 'register'));
							add_action('admin_menu', array('duppluginoption', 'menu'));
						}
						
					
					endif;
// Function that outputs the contents of the dashboard widget

function dashboard_widget_function() {

    $current_user = wp_get_current_user();

 /**
     * @example Safe usage: $current_user = wp_get_current_user();


     * if ( !($current_user instanceof WP_User) )

     *     return;

*/


						
						echo'<style type="text/css">
						#dup .top-holder{
							display:block;
							margin-bottom:15px;
							overflow:hidden;
						}
						#dup .image-holder{
							float:left;
							margin:0 20px 10px 0;
							width:112px;
						}
						#dup .image-holder .avatar{
							float:left;
							background:#eee no-repeat;
							border:1px solid #ccc;
							height:100px;width:100px;
							padding:5px;
						}
						#dup .image-holder .instruction{
							float:left;
							font-size:13px;
							text-align:center;
						}
						#dup .name-status-holder{
							float:left;
						}
						#dup .name-status-holder .tuner-name{
							font-size:23px;
							margin:5px 0 0;
						}
						#dup .name-status-holder .dup-text{
							font-size:13px;
							margin:5px 0;
						}
						#dup .name-status-holder p{
							font-size:13px;
						}
						#dup .info-holder{
							clear:both;
						}</style>';
						echo '<div id="dup"><div class="top-holder"><div class="image-holder">';
						echo get_avatar( $current_user->user_email, 150 );
						echo '<p class="instruction"><a href="http://www.bdtunes.com/wp-admin/profile.php"';
						echo get_option('link');
						echo '" target="_blank">';
						echo get_option('title');
						echo '</a></p>';
						 echo '</div>';
						echo '<div class="name-status-holder"><p class="tuner-name">' . $current_user->display_name . "<p />";
						echo '<b>';
						echo get_option('dup1'), '&nbsp;:&nbsp;</b>' . $current_user->user_login . "<p />";	
						echo '<b>';					
						echo get_option('dup2'), '&nbsp;:&nbsp;</b>' . $current_user->user_email . "<p />";	
						echo '<b>';									
						echo get_option('dup3'), '&nbsp;:&nbsp;</b>' . $current_user->display_name . "<p />";	
						echo '<b>';					
						echo get_option('dup4'), '&nbsp;:&nbsp;</b>' . $current_user->user_registered . "<p />"; 
						echo '<b>';						
						echo get_option('dup5'), '&nbsp;:&nbsp;</b>' . $current_user->user_url . "<p /></div></div>";
						echo '<a id="tt_dts-generic-switch" class="tt_dts-type-switch tt_dts-active"> <table width="100%" border="0">
						<tr>
						<td><strong><a href="post-new.php" class="button button-primary button-large">টিওন লিখুন</a></strong></td>
						<td></td>
						<td><strong><a href="upload.php" class="button insert-media add_media">সকল মিডিয়া</a></strong></td> 
						</tr>
						 <tr>
						<td><strong><a href="edit-comments.php" class="button"> 
						সকল মন্তব্য</a></strong></td>
						<td></td>
						<td><strong><a href="media-new.php" class="button insert-media add_media">ছবি আপলোড</a></strong></td> 
						 </tr>
						<tr>
						<td><strong><a href="http://www.bdtunes.com" target="_blank" class="button"> 
						সাইটে &nbsp;যান</a></strong></td>
						<td></td>
						<td><strong><a href="profile.php" class="button"> 
						&nbsp;প্রোফাইল</a></strong></td> 
						</tr>
						</table></a></div>';
						}
						function add_dashboard_widgets() {
						wp_add_dashboard_widget('dashboard_widget', '<span class="jf_typo_highlight_green">Welcome   &nbsp; &nbsp;<strong> <a href="profile.php" class="button button-primary button-large" target="_blank">Edit Profile</a></strong></span>', 'dashboard_widget_function');
						}
						// Register the new dashboard widget with the 'wp_dashboard_setup' action
						
						add_action('wp_dashboard_setup', 'add_dashboard_widgets' );



?>