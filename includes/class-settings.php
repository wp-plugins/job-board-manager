<?php

/*
* @Author 		ParaTheme
* @Folder	 	job-board-manager/includes
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


class class_job_bm_settings  {
	
	
    public function __construct(){

		add_action( 'admin_menu', array( $this, 'admin_menu' ), 12 );
    }
	

	
	
	public function admin_menu() {
		
		add_submenu_page( 'edit.php?post_type=job', __( 'Settings', 'job_bm' ), __( 'Settings', 'job_bm' ), 'manage_options', 'job_bm-settings', array( $this, 'settings_page' ) );
		
		do_action( 'job_bm_action_admin_menus' );
		
	}
	
	public function settings_page(){
		
		include( 'menu/settings.php' );
		}
	


	
	
	
	
	
	

	}


new class_job_bm_settings();

