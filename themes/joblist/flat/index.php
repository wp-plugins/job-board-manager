<?php

/*
* @Author 		ParaTheme
* @Folder	 	job-board-manager\themes\joblist

* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access


	$job_bm_list_per_page = get_option('job_bm_list_per_page');
	$job_bm_job_type_bg_color = get_option('job_bm_job_type_bg_color');	
	$job_bm_job_status_bg_color = get_option('job_bm_job_status_bg_color');	
	$job_bm_featured_bg_color = get_option('job_bm_featured_bg_color');		
		
	
	if(empty($job_bm_list_per_page)){
		$job_bm_list_per_page = 15;
		}
	
		if ( get_query_var('paged') ) {
		
			$paged = get_query_var('paged');
		
		} elseif ( get_query_var('page') ) {
		
			$paged = get_query_var('page');
		
		} else {
		
			$paged = 1;
		
		}
	
	
	$wp_query = new WP_Query(
		array (
			'post_type' => 'job',
			'post_status' => 'publish',
			'orderby' => 'Date',
			'order' => 'DESC',
			'posts_per_page' => $job_bm_list_per_page,
			'paged' => $paged,
			
			) );
	
	
	$job_list_grid_items = array(
	'job_bm_company_logo'=>array('class'=>'company_logo','fa'=>'','title'=>''),
	'title'=>array('class'=>'title','fa'=>'title','title'=>''),
	'job_bm_short_content'=>array('class'=>'short_content','fa'=>'','title'=>'Short Description'),								
	'clear'=>array('class'=>'clear','fa'=>'','title'=>''),
	'job_bm_job_type'=>array('class'=>'job_type','fa'=>'briefcase','title'=>'Job Type'),
	'job_bm_job_status'=>array('class'=>'job_status','fa'=>'','title'=>'Job Status'),															
	'job_bm_location'=>array('class'=>'location','fa'=>'map-marker','title'=>'Location'), // meta_key, meta css class, font awesome class
	'job_bm_company_name'=>array('class'=>'company_name','fa'=>'briefcase','title'=>'Company Name'),							
	'job_bm_total_vacancies'=>array('class'=>'total_vacancies','fa'=>'user-plus','title'=>'Total Vacancies'),								
	'job_bm_expire_date'=>array('class'=>'expire_date','fa'=>'calendar-o','title'=>'Expire Date'),																
	);
	
							
	$job_list_grid_items = apply_filters('job_bm_filters_job_list_grid_items', $job_list_grid_items);		
					
	
	$html .= '<div class="job-list">';		
				
	if ( $wp_query->have_posts() ) :
	while ( $wp_query->have_posts() ) : $wp_query->the_post();	
	
	foreach($job_list_grid_items as $meta_key=>$grid_data){
			
			$meta_key_values[$meta_key] = get_post_meta(get_the_ID(),$meta_key, true);
		}
	
	$job_bm_featured = get_post_meta(get_the_ID(), 'job_bm_featured', true);	
	

	
	if(!empty($job_bm_featured['yes']) ){
		
		$featured_class = 'featured';
		}
	else{
		$featured_class = '';
	}
	
	$html .= '<div class="single '.$featured_class.'">';
	
	foreach($job_list_grid_items as $meta_key=>$grid_data){
		
		if($meta_key== 'job_bm_company_logo'){
			
			$html .= '<div class="'.$grid_data['class'].'"><img src="'.$meta_key_values[$meta_key].'" /></div>';
			}
		elseif($meta_key== 'title'){
			$html .= '<div title="'.$grid_data['title'].'" class="'.$grid_data['class'].'"><a href="'.get_permalink().'">'.get_the_title().'</a></div>';
			}

		elseif($meta_key== 'job_bm_short_content'){
			if(!empty($meta_key_values[$meta_key])){
				$html .= '<div title="'.$grid_data['title'].'" class="'.$grid_data['class'].'">'.$meta_key_values[$meta_key].'</div>';
				}

			}


		elseif($meta_key== 'clear'){
			$html .= '<div class="'.$grid_data['class'].'"></div>';
			}			
			

		elseif($meta_key== 'job_bm_job_type'){
			
			if(!empty($meta_key_values[$meta_key])){
				
				$html .= '<div title="'.$grid_data['title'].'" class="job-meta '.$grid_data['class'].' '.$meta_key_values[$meta_key].'"><i class="fa fa-'.$grid_data['fa'].'"></i><a href="#">'.ucfirst($meta_key_values[$meta_key]).'</a></div>';
				}

			}				
			
		elseif($meta_key== 'job_bm_job_status'){
			
			if(!empty($meta_key_values[$meta_key])){
				$html .= '<div title="'.$grid_data['title'].'" class="job-meta '.$meta_key_values[$meta_key].' '.$grid_data['class'].'"><a href="#">'.ucfirst($meta_key_values[$meta_key]).'</a></div>';	
				
				}

			
			}			
		else{
			if(!empty($meta_key_values[$meta_key])){
				$html .= '<div title="'.$grid_data['title'].'" class="job-meta '.$grid_data['class'].'"><i class="fa fa-'.$grid_data['fa'].'"></i><a href="#">'.$meta_key_values[$meta_key].'</a></div>';
				}

			}
		
		
		}
		
	
					
	$html .= '</div>'; // .single
	
			
	endwhile;
	
	
	
	$html .= '<div class="paginate">';
	$big = 999999999; // need an unlikely integer
	$html .= paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, $paged ),
		'total' => $wp_query->max_num_pages
		) );

	$html .= '</div >';	
	
	
	wp_reset_query();
	endif;		
				
				
				
	$html .= '<style type="text/css">'; 			
			
	$html .= '
	
	.job-list .single.featured{background:'.$job_bm_featured_bg_color.'}
	
	
	';			
		
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
				
				
				
	$html .= '</div>'; // .job-list	



	

