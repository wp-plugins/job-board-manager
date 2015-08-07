<?php
/*
* @Author 		ParaTheme
* @Folder	 	job-board-manager/includes
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 
	


/*### Extend job meta options sample ###*/
/*


// ############### Filter for meta_options ###################


function job_bm_filters_meta_options_extra($options){
	
	$options['Company extra'] = array(
								'job_bm_location_extra'=>array(
									'css_class'=>'location_extra',					
									'title'=>'Location _extra',
									'option_details'=>'Job Location _extra',						
									'input_type'=>'text', // text, radio, checkbox, select, 
									'input_values'=>'Dhaka_extra', // could be array
									),
								);
	return $options;
		
	}

add_filter('job_bm_filters_meta_options','job_bm_filters_meta_options_extra');










// ############### Filter for settings_options ###################

function job_bm_settings_options_extra($options){
	
	$options['Company extra'] = array(
								'job_bm_location_extra'=>array(
									'css_class'=>'location_extra',					
									'title'=>'Location _extra',
									'option_details'=>'Job Location _extra',						
									'input_type'=>'text', // text, radio, checkbox, select, 
									'input_values'=>'Dhaka_extra', // could be array
									),
								);
	return $options;
		
	}

add_filter('job_bm_settings_options','job_bm_settings_options_extra');









// ############### Filter for job_type ###################

function job_bm_filters_job_type_extra($job_type){
	
	$job_type_new = array('freelance1'=>'Freelance 1','full-time1'=>'Full Time 1');
	$job_type = array_merge($job_type,$job_type_new);
	
	return $job_type;
		
	}
add_filter('job_bm_filters_job_type','job_bm_filters_job_type_extra');





// ############### Filter for job_bm_filters_apply_method ###################

function job_bm_filters_apply_method_extra($apply_method){
	
	$apply_method_new = array('method_1'=>'Method 2','method_1'=>'Method 2');
	$apply_method = array_merge($apply_method,$apply_method_new);
	
	return $apply_method;
		
	}
add_filter('job_bm_filters_apply_method','job_bm_filters_apply_method_extra');




// ############### Filter for visitors_role ###################

function job_bm_filters_visitors_extra($visitors_role){
	
	$visitors_role_new = array('freelance1'=>'Freelance 1','full-time1'=>'Full Time 1');
	$visitors_role = array_merge($visitors_role,$visitors_role_new);
	
	return $visitors_role;
		
	}
add_filter('job_bm_filters_visitors','job_bm_filters_visitors_extra');







// ############### Filter for salary_type ###################

function job_bm_filters_salary_type_extra($salary_type){
	
	$salary_type_new = array('negotiable1'=>'Negotiable 1','fixed1'=>'Fixed 1','min-max1'=>'Min-Max 1');
	$salary_type = array_merge($salary_type,$salary_type_new);
	
	return $salary_type;
		
	}
add_filter('job_bm_filters_salary_type','job_bm_filters_salary_type_extra');







// ############### Action for Admin Menu ###################

function job_bm_action_admin_menus_extra(){
	
	add_submenu_page( 'edit.php?post_type=job', __( 'Settings 2', 'job_bm' ), __( 'Settings 2', 'job_bm' ), 'manage_options', 'job_bm-settings2', 'settings_page2' );
	
	}

add_action('job_bm_action_admin_menus','job_bm_action_admin_menus_extra');

function settings_page2(){
	
	include( 'menu/settings2.php' );
	
	}

// #############################




// ############### Filters for apply_method_ ###################



function job_bm_filters_apply_method_extra($apply_method){
	
	$apply_method_new = array('method_1'=>'Method 1','method_2'=>'Method 2');
	$apply_method = array_merge($apply_method,$apply_method_new);
	
	return $apply_method;
		
	}
add_filter('job_bm_filters_apply_method','job_bm_filters_apply_method_extra');


function job_bm_filters_apply_method_html_extra($apply_method_html){

	$apply_method_html_new['method_1'] = '<div class="side-meta"><i class="fa fa-floppy-o"></i>'.__('Method 1 :','job_bm').'<a class="apply-job" href="#" job-id="'.$job_id.'">Submit 1</a></div>';	

	$apply_method_html = array_merge($apply_method_html,$apply_method_html_new);
	
	return $apply_method_html;
		
	}


add_filter('job_bm_filters_apply_method_html','job_bm_filters_apply_method_html_extra');


// #############################




*/




function job_bm_filters_apply_method_extra($apply_method){
	
	$apply_method_new = array('method_1'=>'Method 1','method_2'=>'Method 2');
	$apply_method = array_merge($apply_method,$apply_method_new);
	
	return $apply_method;
		
	}
add_filter('job_bm_filters_apply_method','job_bm_filters_apply_method_extra');



function job_bm_filters_apply_method_html_extra($apply_method_html){

	$apply_method_html_new['method_1'] = '<div class="side-meta"><i class="fa fa-floppy-o"></i>'.__('Method 1 :','job_bm').'<a class="apply-job" href="#" job-id="'.$job_id.'">Submit 1</a></div>';	

	$apply_method_html = array_merge($apply_method_html,$apply_method_html_new);
	
	return $apply_method_html;
		
	}


add_filter('job_bm_filters_apply_method_html','job_bm_filters_apply_method_html_extra');