=== Job Board Manager ===
	Contributors: pickplugins
	Donate link: http://paratheme.com
	Tags:  Job Board Manager, Job Board, Job, Job Poster, job manager, job, job list, job listing, Job Listings, job lists, job management, job manager,
	Requires at least: 4.1
	Tested up to: 4.2.2
	Stable tag: 1.0.0
	License: GPLv2 or later
	License URI: http://www.gnu.org/licenses/gpl-2.0.html

	Awesome Job Board Manager

== Description ==


Creating job for WordPress made easy by “Job Board Manager” plugin. super lightweight plugin allows you to create job manager site employer can submit job and employee can apply for job.

Based on short-code made easy to use anywhere displaying job-list, single job page & etc.

Easy to customizable made this plugin supper developer friendly , you can add your own values for some options via filter hook. You can create unlimited themes for job archive page & job single page by filter hook.

### Job Board Manager by http://pickplugins.com
* [Live Demo!&raquo;](http://pickplugins.com/demo/job-board-manager/)

<strong>Plugin Features</strong>

* Extensible meta fields for job.
* Job list via short-codes.
* Filaterable Job Status options.
* Filterable Job Type options.
* Filterable Job Level options.
* Filterable Salary Range options.
* Custom salary currency for job post.


<strong>Job List page</strong>

Use this short-code `[job_list]` to display latest job with pagination

<strong>Job Single page</strong>

If you wan to display job on single page like default post, you need to copy your theme single.php and rename to single-job.php

you need to replace content section by following short-code

`<?php echo do_shortcode('[job_single job_id="'.get_the_ID().'"]'); ?>`

<strong>Filters job type</strong>

you can add your job type by filter hook as following example bellow.

`
function job_bm_filters_job_type_extra($job_type){
	
	$job_type_new = array('job_type_1'=>'Job Type 1','job_type_2'=>'Job Type 2');
	$job_type = array_merge($job_type,$job_type_new);
	
	return $job_type;
		
	}
add_filter('job_bm_filters_job_type','job_bm_filters_job_type_extra');
`

<strong>Filters salary type</strong>

you can add your salary type by filter hook as following example bellow.

`
function job_bm_filters_salary_type_extra($salary_type){
	
	$salary_type_new = array('salary_type_1'=>'Salary Type 1','salary_type_1'=>'Salary Type 2',);
	$salary_type = array_merge($salary_type,$salary_type_new);
	
	return $salary_type;
		
	}
add_filter('job_bm_filters_salary_type','job_bm_filters_salary_type_extra');
`

<strong>Extend meta fields</strong>

If you need some extra input fields under job post type you can use filter hook as following, currently support input fileds are text, textarea, radio, select, checkbox, multi-text,

Please see the file <strong>includes/class-post-meta.php</strong> for example option input by array. 

`
function job_bm_filters_meta_options_extra($options){
	
	$options['Meta extra'] = array(
								'job_bm_location_extra'=>array(
									'css_class'=>'location_extra',					
									'title'=>'Location _extra',
									'option_details'=>'Job Location _extra',						
									'input_type'=>'text', // text, radio, checkbox, select, 
									'input_values'=>'Dhaka extra', // could be array
									),
								);
	return $options;
		
	}

add_filter('job_bm_filters_meta_options','job_bm_filters_meta_options_extra');


`


== Installation ==

1. Install as regular WordPress plugin.<br />
2. Go your plugin setting via WordPress Dashboard and find "<strong>Job Board Manager</strong>" activate it.<br />




== Screenshots ==

1. screenshot-1
2. screenshot-2
3. screenshot-3
4. screenshot-4
5. screenshot-5


== Changelog ==


	= 1.0.0 =
    * 05/08/2015 Initial release.
