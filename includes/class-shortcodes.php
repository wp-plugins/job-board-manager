<?php

/*
* @Author 		ParaTheme
* @Folder	 	job-board-manager/includes
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

class class_job_bm_shortcodes{
	
    public function __construct(){
		
		add_shortcode( 'job_list', array( $this, 'job_bm_job_list_display' ) );
		add_shortcode( 'job_single', array( $this, 'job_bm_job_single_display' ) );		

   		}
		
		

	public function job_bm_job_list_display($atts, $content = null ) {
			$atts = shortcode_atts(
				array(
					'themes' => 'flat',
					), $atts);
	
			$html = '';
			$job_bm_themes = $atts['themes'];
			
			//$job_bm_themes = get_post_meta( $post_id, 'job_bm_themes', true );
			//$job_bm_license_key = get_option('job_bm_license_key');
			
/*
			if(empty($job_bm_license_key))
				{
					return '<b>"'.job_bm_plugin_name.'" Error:</b> Please activate your license.';
				}

*/
			
			$class_job_bm_functions = new class_job_bm_functions();
			$job_bm_joblist_themes_dir = $class_job_bm_functions->job_bm_joblist_themes_dir();
			$job_bm_joblist_themes_url = $class_job_bm_functions->job_bm_joblist_themes_url();

			
			
			echo '<link  type="text/css" media="all" rel="stylesheet"  href="'.$job_bm_joblist_themes_url[$job_bm_themes].'/style.css" >';				

			include $job_bm_joblist_themes_dir[$job_bm_themes].'/index.php';				

			return $html;
	
	
		}
		

	public function job_bm_job_single_display($atts, $content = null ) {
			$atts = shortcode_atts(
				array(
					'job_id' => '',				
					'themes' => 'flat',
					), $atts);
					
					
			$job_id = $atts['job_id'];			
			$job_bm_jobsingle_themes = $atts['themes'];
	
			$html = '';

			
			//$job_bm_themes = get_post_meta( $post_id, 'job_bm_themes', true );
			//$job_bm_license_key = get_option('job_bm_license_key');
			
/*
			if(empty($job_bm_license_key))
				{
					return '<b>"'.job_bm_plugin_name.'" Error:</b> Please activate your license.';
				}

*/
			
			$class_job_bm_functions = new class_job_bm_functions();
			$job_bm_jobsingle_themes_dir = $class_job_bm_functions->job_bm_jobsingle_themes_dir();
			$job_bm_jobsingle_themes_url = $class_job_bm_functions->job_bm_jobsingle_themes_url();

			//var_dump($job_bm_jobsingle_themes_url);
			
			$html.= '<link  type="text/css" media="all" rel="stylesheet"  href="'.$job_bm_jobsingle_themes_url[$job_bm_jobsingle_themes].'/style.css" >';				

			include $job_bm_jobsingle_themes_dir[$job_bm_jobsingle_themes].'/index.php';				

			return $html;
	
	
		}
			
	}
	
	new class_job_bm_shortcodes();