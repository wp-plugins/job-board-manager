<?php	


/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 



class class_job_bm_addons_page  {
	
	
    public function __construct(){


    }
	
	
	public function job_bm_addons_data($addons_data = array()){
		
		$addons_data_new = array(
							
			'company-profile'=>array(	'title'=>'Company Profile',
										'version'=>'1.0.0',
										'price'=>'free',
										'content'=>'Addon for creating company profile.',										
										'item_link'=>'https://wordpress.org/plugins/job-board-manager-company-profile/',
										'thumb'=>job_bm_plugin_url.'includes/menu/images/company-profile.png',							
			),
			
			'locations'=>array(	'title'=>'Locations',
										'version'=>'1.0.0',
										'price'=>'free',
										'content'=>'Awesome location single page and display job list under any location via single page.',										
										'item_link'=>'https://wordpress.org/plugins/job-board-manager-locations/',
										'thumb'=>job_bm_plugin_url.'includes/menu/images/locations.png',							
			),			

						
			'saved-jobs'=>array(	'title'=>'Saved Jobs',
										'version'=>'1.0.0',
										'price'=>'$15',
										'content'=>'Allow visitors to save job link as bookmarks to thier account.',										
										'item_link'=>'http://www.pickplugins.com/item/job-board-manager-saved-jobs/',
										'thumb'=>job_bm_plugin_url.'includes/menu/images/saved-jobs.png',							
			),	
			
			'social-share'=>array(	'title'=>'Social Share',
										'version'=>'1.0.0',
										'price'=>'$15',
										'content'=>'Social Share allow visitors to share job link to thier social network site.',										
										'item_link'=>'http://www.pickplugins.com/item/job-board-manager-social-share/',
										'thumb'=>job_bm_plugin_url.'includes/menu/images/social-share.png',							
			),			
			
			
						

		);
		
		$addons_data = array_merge($addons_data_new,$addons_data);
		
		$addons_data = apply_filters('job_bm_filters_addons_data', $addons_data);
		
		return $addons_data;
		
		
		}
	
	public function job_bm_addons_list_html(){
		
		$html = '';
		
		$addons_data = $this->job_bm_addons_data();
		
		foreach($addons_data as $key=>$values){
			
			$html.= '<div class="single '.$key.'">';
			$html.= '<div class="thumb"><a href="'.$values['item_link'].'"><img src="'.$values['thumb'].'" /></a></div>';			
			$html.= '<div class="title"><a href="'.$values['item_link'].'">'.$values['title'].'</a></div>';
			$html.= '<div class="content">'.$values['content'].'</div>';						
			$html.= '<div class="meta version"><b>Version:</b> '.$values['version'].'</div>';			
			$html.= '<div class="meta price"><b>Price:</b> '.$values['price'].'</div>';							
			
			$html.= '</div>';
			
		
			
			}
		
		$html.= '';		
		
		return $html;
		}

	
	
	
}

new class_job_bm_addons_page();


	
?>





<div class="wrap">

	<div id="icon-tools" class="icon32"><br></div><?php echo "<h2>".__(job_bm_plugin_name.' - Addons', 'job_bm')."</h2>";?>
	<div class="job-bm-addons">
    
    <?php
    
	$class_job_bm_addons_page = new class_job_bm_addons_page();
	
	echo $class_job_bm_addons_page->job_bm_addons_list_html();
	
	
	?>
    </div>


</div>
