<?php

/*
* @Author 		ParaTheme
* @Folder	 	job-board-manager\themes\joblist

* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access

	$job_bm_salary_currency_option = get_option('job_bm_salary_currency');
	$job_bm_job_type_bg_color = get_option('job_bm_job_type_bg_color');	
	$job_bm_job_status_bg_color = get_option('job_bm_job_status_bg_color');	


	$class_job_bm_post_meta = new class_job_bm_post_meta();
	$job_meta_options = $class_job_bm_post_meta->job_meta_options();	
	
	
	$jobsingle_meta_items = array(
	'job_bm_job_type'=>array('class'=>'job_type','fa'=>'briefcase','title'=>'Job Type'),
	'job_bm_job_status'=>array('class'=>'job_status','fa'=>'','title'=>'Job Status'),															
	'job_bm_location'=>array('class'=>'location','fa'=>'map-marker','title'=>'Location'),
	'job_bm_company_name'=>array('class'=>'company_name','fa'=>'briefcase','title'=>'Company Name'),							
	'job_bm_total_vacancies'=>array('class'=>'total_vacancies','fa'=>'user-plus','title'=>'Total Vacancies'),								
	'job_bm_expire_date'=>array('class'=>'expire_date','fa'=>'calendar-o','title'=>'Expire Date'),
	);
	
	
	$job_level = apply_filters('job_bm_filters_job_level',array('entry_level'=>'Entry level','mid_level'=>'Mid level','top_level'=>'Top level','any'=>'Any',));
	
	$job_type = apply_filters('job_bm_filters_job_type',array('freelance'=>'Freelance','full-time'=>'Full Time','internship'=>'Internship','part-time'=>'Part Time','temporary'=>'Temporary'));
	
	$job_status = apply_filters('job_bm_filters_job_status',array('open'=>'Open','closed'=>'Closed','filled'=>'Filled','re-open'=>'Re-Open'));	
	
	foreach($job_meta_options as $options_tab=>$options){
		
		foreach($options as $option_key=>$option_data){
			
			$meta_key_values[$option_key] = get_post_meta($job_id, $option_key, true);
			${$option_key} = get_post_meta($job_id, $option_key, true);			
			//var_dump(${$option_key});
			}
		}
	$job_post_data = get_post($job_id);
	
	$html .= '<div class="job-single">';
	
	$html .= '<div class="continer-main">';	
	$html .= '<div class="title">'.$job_post_data->post_title.'</div>';
	$html .= '<div class="meta-container">';
	foreach($jobsingle_meta_items as $meta_key=>$item_data){
		


		if($meta_key== 'clear'){
			$html .= '<div class="'.$item_data['class'].'"></div>';
			}			
			

		elseif($meta_key== 'job_bm_job_type'){
			
			if(!empty($meta_key_values[$meta_key])){
				
				$html .= '<div title="'.$item_data['title'].'" class="job-meta '.$item_data['class'].' '.$meta_key_values[$meta_key].'"><i class="fa fa-'.$item_data['fa'].'"></i><a href="#">'.ucfirst($meta_key_values[$meta_key]).'</a></div>';
				}

			}				
			
		elseif($meta_key== 'job_bm_job_status'){
			
			if(!empty($meta_key_values[$meta_key])){
				$html .= '<div title="'.$item_data['title'].'" class="job-meta '.$meta_key_values[$meta_key].' '.$item_data['class'].'"><a href="#">'.ucfirst($meta_key_values[$meta_key]).'</a></div>';	
				
				}

			
			}			
		else{
			if(!empty($meta_key_values[$meta_key])){
				$html .= '<div title="'.$item_data['title'].'" class="job-meta '.$item_data['class'].'"><i class="fa fa-'.$item_data['fa'].'"></i><a href="#">'.$meta_key_values[$meta_key].'</a></div>';
				}

			}
		
		
		}
		



	$html .= '</div>'; // .meta-container

	$html .= '<div class="content">'.wpautop($job_post_data->post_content).'</div>';
	
	$html .= '</div>'; // .continer-main
	
	
	
	
	$html .= '<div class="continer-side">';	
	
	
	do_action( 'job_bm_action_jobsingle_side_top' );
	
	$html .= '<div class="section">';		
	$html .= '<div class="title">'.__('About Company','job_bm').'</div>';
	
	if($job_bm_display_company_name == 'yes'){
		
		$html .= '<div class="company_name"><img src="'.$job_bm_company_logo.'" />'.$job_bm_company_name.'</div>';
		}
		

		$html .= '<div class="side-meta location"><i class="fa fa-map-marker"></i>'.$job_bm_location.'</div>';
	
		
	if($job_bm_display_company_address == 'yes'){
		
		$html .= '<div class="side-meta address"><i class="fa fa-home"></i>'.$job_bm_address.'</div>';
		}	
			
		$html .= '<div class="side-meta website"><i class="fa fa-link"></i><a href="'.$job_bm_company_website.'">'.__('Website','job_bm').'</a></div>';
		
		$html .= '<div class="side-meta website"><i class="fa fa-hand-o-right"></i><a href="'.$job_bm_job_link.'">'.__('Job Link','job_bm').'</a></div>';		
		
		
	
	$html .= '</div>'; // .section
	
	
	
	
	
	$html .= '<div class="section">';		
	$html .= '<div class="title">'.__('Job Info','job_bm').'</div>';

	$html .= '<div class="side-meta"><i class="fa fa-paper-plane-o"></i>'.__('Job Status: ','job_bm').$job_status[$job_bm_job_status].'</div>';
	$html .= '<div class="side-meta"><i class="fa fa-users"></i>'.__('No of Vacancies: ','job_bm').$job_bm_total_vacancies.'</div>';	
	$html .= '<div class="side-meta"><i class="fa fa-exclamation-triangle"></i>'.__('Expiry Date: ','job_bm').$job_bm_expire_date.'</div>';		
	$html .= '<div class="side-meta"><i class="fa fa-taxi"></i>'.__('Job Type: ','job_bm').$job_type[$job_bm_job_type].'</div>';
	$html .= '<div class="side-meta"><i class="fa fa-signal"></i>'.__('Job Level: ','job_bm').$job_level[$job_bm_job_level].'</div>';	
	
	$html .= '<div class="side-meta"><i class="fa fa-bolt"></i>'.__('Years of Experience: ','job_bm').$job_bm_years_experience.'</div>';			
	
	$html .= '</div>'; // .section	
	
	
	
	$html .= '<div class="section">';		
	$html .= '<div class="title">'.__('Salary Info','job_bm').'</div>';

	$html .= '<div class="side-meta"><i class="fa fa-trophy"></i>'.__('Salary Type: ','job_bm').ucfirst($job_bm_salary_type).'</div>';
	
	

	if(empty($job_bm_salary_currency)){
		$job_bm_salary_currency = $job_bm_salary_currency_option;
		}

	
	if($job_bm_salary_type=='fixed'){
		
		$html .= '<div class="side-meta"><i class="fa fa-usd"></i>'.__('Salary: ','job_bm').$job_bm_salary_currency.ucfirst($job_bm_salary_fixed).'</div>';
		
		}
	elseif($job_bm_salary_type=='min-max'){
		

		$html .= '<div class="side-meta"><i class="fa fa-usd"></i>'.__('Salary: ','job_bm').$job_bm_salary_currency.$job_bm_salary_min.'-'.$job_bm_salary_currency.$job_bm_salary_max.'</div>';
		
		}		
	
	$html .= '</div>'; // .section	
	
	
	
	
	$html .= '<div class="section">';		
	$html .= '<div class="title">'.__('Apply on this job','job_bm').'</div>';
	
	if(!empty($job_bm_how_to_apply)){
		$html .= '<div class="side-meta"><i class="fa fa-trophy"></i>'.__('How to Apply ?<br> ','job_bm').$job_bm_how_to_apply.'</div>';
		
		}



	$apply_method_html['direct_email'] = '<div class="side-meta"><i class="fa fa-envelope-o"></i>'.__('Apply via email :','job_bm').'<a class="apply-job" href="mailto:'.$job_bm_contact_email.'">Send Email</a></div>';

	$apply_method_html['saved_cv'] = '<div class="side-meta"><i class="fa fa-floppy-o"></i>'.__('Apply via Saved CV :','job_bm').'<a class="apply-job" href="#" job-id="'.$job_id.'">Submit Now</a></div>';


	
	$apply_method_html = apply_filters('job_bm_filters_apply_method_html',$apply_method_html);



	
	if(!empty($job_bm_apply_method)){
		
		foreach($job_bm_apply_method as $key=>$method){
			
				$html .= $apply_method_html[$key];

			}
		
		}



		
	
	$html .= '</div>'; // .section		
	
	
	
	
	
	
	do_action( 'job_bm_action_jobsingle_side_bottom' );
	
		
	$html .= '</div>'; // .continer-side	
	
	$html .= '<style type="text/css">'; 			
	
	if(!empty($job_bm_job_type_bg_color)){
		foreach($job_bm_job_type_bg_color as $job_type_key=>$job_type_color){
			
			$html .= '.job-single .job_type.'.$job_type_key.'{background:'.$job_type_color.'}';			
			}
		}

	if(!empty($job_bm_job_status_bg_color)){
		foreach($job_bm_job_status_bg_color as $job_status_key=>$job_status_color){
			
			$html .= '.job-single .job_status.'.$job_status_key.'{background:'.$job_status_color.'}';			
			}		
		}
	$html .= '</style>';	

	$html .= '</div>'; // .job-single	



	

