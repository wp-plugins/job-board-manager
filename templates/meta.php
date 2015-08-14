<?php
/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 



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
			
		elseif($meta_key== 'job_bm_company_name'){
			
			$company_data = get_page_by_title( $meta_key_values[$meta_key], 'OBJECT', 'company' );
			
			if(!empty($company_data)){
				
				$company_link = get_post_permalink($company_data->ID);
					if(empty($company_link)){
					
						$company_link = '#';
						
					}
				}
			else{
				
					$company_link = '#';
				}
			


			
			
			if(!empty($meta_key_values[$meta_key])){
				$html .= '<div title="'.$item_data['title'].'" class="job-meta '.$item_data['class'].'"><i class="fa fa-'.$item_data['fa'].'"></i><a href="'.$company_link.'">'.$meta_key_values[$meta_key].'</a></div>';
				}

			}			
			
			
			
						
		else{
			if(!empty($meta_key_values[$meta_key])){
				$html .= '<div title="'.$item_data['title'].'" class="job-meta '.$item_data['class'].'"><i class="fa fa-'.$item_data['fa'].'"></i><a href="#">'.$meta_key_values[$meta_key].'</a></div>';
				}

			}
		
		
		}
		
