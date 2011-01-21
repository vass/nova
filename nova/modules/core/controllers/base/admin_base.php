<?php
/**
 * Admin controller
 *
 * @package		Nova
 * @category	Controller
 * @author		Anodyne Productions
 * @copyright	2010-11 Anodyne Productions
 * @version		1.3
 *
 * Updated the flash messages so they can be overridden by seamless substitution
 */

class Admin_base extends Controller {

	/* set the variables */
	var $options;
	var $skin;
	var $rank;
	var $timezone;
	var $dst;

	function Admin_base()
	{
		parent::Controller();
		
		/* load the system model */
		$this->load->model('system_model', 'sys');
		$installed = $this->sys->check_install_status();
		
		if ($installed === FALSE)
		{ /* check whether the system is installed */
			redirect('install/index', 'refresh');
		}
		
		/* load the session library */
		$this->load->library('session');
		
		/* load the models */
		$this->load->model('characters_model', 'char');
		$this->load->model('users_model', 'user');
		
		/* check to see if they are logged in */
		$this->auth->is_logged_in(TRUE);
		
		/* an array of the global we want to retrieve */
		$settings_array = array(
			'skin_admin',
			'display_rank',
			'timezone',
			'daylight_savings',
			'sim_name',
			'date_format',
			'email_subject',
			'system_email',
			'online_timespan',
			'posting_requirement',
			'updates'
		);
		
		/* grab the settings */
		$this->options = $this->settings->get_settings($settings_array);
		
		/* set the variables */
		$this->skin = $this->options['skin_admin'];
		$this->rank = $this->options['display_rank'];
		$this->timezone = $this->options['timezone'];
		$this->dst = (bool) $this->options['daylight_savings'];
		
		if ($this->auth->is_logged_in())
		{
			$this->skin = (file_exists(APPPATH .'views/'.$this->session->userdata('skin_admin').'/template_admin'.EXT))
				? $this->session->userdata('skin_admin')
				: $this->skin;
			$this->rank = $this->session->userdata('display_rank');
			$this->timezone = $this->session->userdata('timezone');
			$this->dst = (bool) $this->session->userdata('dst');
		}
		
		/* set and load the language file needed */
		$this->lang->load('app', $this->session->userdata('language'));
		
		/* set the template */
		$this->template->set_template('admin');
		$this->template->set_master_template($this->skin .'/template_admin.php');
		
		/* write the common elements to the template */
		$this->template->write('nav_main', $this->menu->build('main', 'main'), TRUE);
		$this->template->write('nav_sub', $this->menu->build('adminsub', 'admin'), TRUE);
		$this->template->write('panel_1', $this->user_panel->panel_1(), TRUE);
		$this->template->write('panel_2', $this->user_panel->panel_2(), TRUE);
		$this->template->write('panel_3', $this->user_panel->panel_3(), TRUE);
		$this->template->write('panel_workflow', $this->user_panel->panel_workflow(), TRUE);
		$this->template->write('title', $this->options['sim_name'] . ' :: ');
	}

	function index()
	{
		/* load the models */
		$this->load->model('posts_model', 'posts');
		$this->load->model('personallogs_model', 'logs');
		$this->load->model('news_model', 'news');
		$this->load->model('missions_model', 'mis');
		$this->load->model('privmsgs_model', 'pm');
		$this->load->model('awards_model', 'awards');
		$this->load->model('wiki_model', 'wiki');
		$this->load->model('docking_model', 'docking');
		
		/* load the helpers */
		$this->load->helper('utility');
		
		if (isset($_POST['submit']))
		{
			$action = $this->input->post('action', TRUE);
			
			if ($action == 'password_change')
			{
				$password = $this->input->post('password', TRUE);
				$user = $this->input->post('user', TRUE);
				
				/* make sure the person submitting the form is the person logged in */
				if ($user == $this->session->userdata('userid'))
				{
					$update_array = array(
						'password' => $this->auth->hash($password),
						'password_reset' => 0,
						'last_update' => now()
					);
					
					$update = $this->user->update_user($user, $update_array);
					
					if ($update > 0)
					{
						$message = sprintf(
							lang('flash_success'),
							ucfirst(lang('labels_password')),
							lang('actions_updated'),
							''
						);

						$flash['status'] = 'success';
						$flash['message'] = text_output($message);
						
						/* load the cookie helper */
						$this->load->helper('cookie');
						
						/* grab nova's unique identifier */
						$uid = $this->sys->get_nova_uid();
						
						/* grab the cookie */
						$cookie = get_cookie('nova_'. $uid);
						
						if ($cookie !== FALSE)
						{
							/* set the cookie data */
							$c_data = array(
								'password' => array(
									'name'   => $uid .'[password]',
									'value'  => $this->auth->hash($password),
									'expire' => '1209600',
									'prefix' => 'nova_')
							);
							
							/* set the cookie */
							set_cookie($c_data['password']);
						}
					}
					else
					{
						$message = sprintf(
							lang('flash_failure'),
							ucfirst(lang('labels_password')),
							lang('actions_updated'),
							''
						);

						$flash['status'] = 'error';
						$flash['message'] = text_output($message);
					}
					
					// set the location of the flash view
					$flashloc = view_location('flash', $this->skin, 'admin');
					
					/* write everything to the template */
					$this->template->write_view('flash_message', $flashloc, $flash);
				}
			}
			
			$update = FALSE;
		}
		
		/*
		|---------------------------------------------------------------
		| STATS
		|---------------------------------------------------------------
		*/
		
		if (is_array($this->session->userdata('characters')) && count($this->session->userdata('characters')) > 0)
		{
			$data['posts'] = array(
				'entries' => $this->posts->count_character_posts($this->session->userdata('characters')),
				'comments' => $this->posts->count_user_post_comments($this->session->userdata('userid'))
			);
			$data['logs'] = array(
				'entries' => $this->logs->count_character_logs($this->session->userdata('characters')),
				'comments' => $this->logs->count_user_log_comments($this->session->userdata('userid'))
			);
			$data['news'] = array(
				'entries' => $this->news->count_character_news($this->session->userdata('characters')),
				'comments' => $this->news->count_user_news_comments($this->session->userdata('userid'))
			);
		}
		else
		{
			$data['posts'] = array(
				'entries' => 0,
				'comments' => $this->posts->count_user_post_comments($this->session->userdata('userid'))
			);
			$data['logs'] = array(
				'entries' => 0,
				'comments' => $this->logs->count_user_log_comments($this->session->userdata('userid'))
			);
			$data['news'] = array(
				'entries' => 0,
				'comments' => $this->news->count_user_news_comments($this->session->userdata('userid'))
			);
		}
		
		/*
		|---------------------------------------------------------------
		| NOTIFICATIONS
		|---------------------------------------------------------------
		*/
		
		$data['notification'] = array(
			'saved_logs'		=> $this->logs->count_user_logs($this->session->userdata('userid'), 'saved'),
			'saved_news' 		=> $this->news->count_user_news($this->session->userdata('userid'), 'saved'),
			'unread_pms' 		=> $this->pm->count_unread_pms($this->session->userdata('userid')),
			'pending_users' 	=> $this->char->count_characters('pending', ''),
			'pending_posts' 	=> $this->posts->count_all_posts('', 'pending'),
			'pending_logs' 		=> $this->logs->count_all_logs('pending'),
			'pending_news' 		=> $this->news->count_news_items('pending'),
			'pending_comments' 	=> $this->posts->count_all_post_comments('pending') + $this->logs->count_all_log_comments('pending') + $this->news->count_news_comments('pending') + $this->wiki->count_all_comments('pending'),
			'pending_awards' 	=> $this->awards->count_award_noms('pending'),
			'pending_docked' 	=> $this->docking->count_docked_items('pending'),
		);
		
		if (is_array($this->session->userdata('characters')) && count($this->session->userdata('characters')) > 0)
		{
			$data['notification']['saved_posts'] = $this->posts->count_character_posts($this->session->userdata('characters'), 'saved');
		}
		else
		{
			$data['notification']['saved_posts'] = 0;
		}
		
		/* set the count to zero by default */
		$data['notifycount'] = 0;
		
		foreach ($data['notification'] as $a)
		{ /* count all the notifications */
			$data['notifycount'] += $a;
		}
		
		/* pass the count to the js view */
		$js_data['panel'] = ($data['notifycount'] > 0) ? 'notifications' : 'stats';
		
		/*
		|---------------------------------------------------------------
		| ACTIVITY
		|---------------------------------------------------------------
		*/
		
		$all = $this->user->get_users_from_characters();
		
		$now = now();
		$threshold = $now - ($this->options['posting_requirement'] * 86400);
		
		/* set activity as an empty array to avoid errors */
		$data['activity'] = array();
		
		if ($all !== FALSE)
		{
			foreach ($all as $a)
			{
				if ($threshold > $a->last_post)
				{
					$data['activity'][$a->userid] = array(
						'post' => (!empty($a->last_post)) ? $a->last_post : lang('error_no_last_post'),
						'login' => (!empty($a->last_login)) ? $a->last_login : lang('error_no_last_login'),
						'name' => $this->char->get_character_name($a->main_char, TRUE)
					);
				}
				
				$milestones[] = array(
					'id' => $a->userid,
					'char' => $a->main_char,
					'join' => $a->join_date
				);
			}
		}
		
		/* set the count to zero by default */
		$data['activitycount'] = count($data['activity']);
		
		/*
		|---------------------------------------------------------------
		| MILESTONES
		|---------------------------------------------------------------
		*/
		
		if (isset($milestones))
		{
			foreach ($milestones as $m)
			{
				$time = $now - $m['join'];
				$time = $time / 86400;
				$time = $time / 30;
				
				if ($time <= 12)
				{
					$data['milestones'][] = array(
						'name' => $this->char->get_character_name($m['char'], TRUE),
						'months' => floor($time),
						'years' => 0,
						'timespan' => timespan($m['join'], $now)
					);
				}
				else
				{
					$years = floor($time / 12);
					
					$subt = $years * 12;
					$months = floor($time - $subt);
					
					$data['milestones'][] = array(
						'name' => $this->char->get_character_name($m['char'], TRUE),
						'months' => $months,
						'years' => $years,
						'timespan' => timespan($m['join'], $now)
					);
				}
			}
			
			foreach ($data['milestones'] as $k => $v)
			{
				if ( ($v['years'] == 0 && $v['months'] != 6) || ($v['years'] > 0 && $v['months'] > 0) )
				{
					unset($data['milestones'][$k]);
				}
			}
			
			$data['milestonecount'] = count($data['milestones']);
		}
		
		/*
		|---------------------------------------------------------------
		| ALL RECENT ENTRIES
		|---------------------------------------------------------------
		*/
		
		/* set the datestring */
		$datestring = $this->options['date_format'];
		
		/* grab the data */		
		$posts_all = $this->posts->get_post_list('', 'desc', 10, '', 'activated');
		$logs_all = $this->logs->get_log_list(10);
		$news_all = $this->news->get_news_items(10, $this->session->userdata('userid'));
		
		if ($posts_all->num_rows() > 0)
		{
			$i = 1;
			foreach ($posts_all->result() as $p)
			{
				$data['posts_all'][$i]['title'] = $p->post_title;
				$data['posts_all'][$i]['post_id'] = $p->post_id;
				$data['posts_all'][$i]['date'] = mdate($datestring, gmt_to_local($p->post_date, $this->timezone, $this->dst));
				$data['posts_all'][$i]['authors'] = $this->char->get_authors($p->post_authors);
				$data['posts_all'][$i]['mission'] = $this->mis->get_mission($p->post_mission, 'mission_title');
				$data['posts_all'][$i]['mission_id'] = $p->post_mission;
				
				++$i;
			}
		}
		
		if ($logs_all->num_rows() > 0)
		{
			$i = 1;
			foreach ($logs_all->result() as $l)
			{
				$data['logs_all'][$i]['title'] = $l->log_title;
				$data['logs_all'][$i]['log_id'] = $l->log_id;
				$data['logs_all'][$i]['date'] = mdate($datestring, gmt_to_local($l->log_date, $this->timezone, $this->dst));
				$data['logs_all'][$i]['author'] = $this->char->get_character_name($l->log_author_character, TRUE);
				
				++$i;
			}
		}
		
		if ($news_all->num_rows() > 0)
		{
			$i = 1;
			foreach ($news_all->result() as $n)
			{
				$data['news_all'][$i]['title'] = $n->news_title;
				$data['news_all'][$i]['news_id'] = $n->news_id;
				$data['news_all'][$i]['category'] = $n->newscat_name;
				$data['news_all'][$i]['author'] = $this->char->get_character_name($n->news_author_character, TRUE);
				$data['news_all'][$i]['date'] = mdate($datestring, gmt_to_local($n->news_date, $this->timezone, $this->dst));
				
				++$i;
			}
		}
		
		/*
		|---------------------------------------------------------------
		| NEW VERSION NOTIFICATION
		|---------------------------------------------------------------
		*/
		
		$data['update'] = FALSE;
				
		if ($this->auth->is_sysadmin($this->session->userdata('userid')) && $this->options['updates'] != 'none')
		{
			/* load the install file */
			$this->lang->load('install', $this->session->userdata('language'));
			
			/* grab the ignore version */
			$ignore = $this->sys->get_item('system_info', 'sys_id', 1, 'sys_version_ignore');
			
			/* go check the version */
			$check = $this->_check_version();
			
			if (isset($check['update']['version']) && $check['update']['version'] != $ignore)
			{
				$data['update']['version'] = $check['flash']['header'];
				$data['update']['version_only'] = $check['update']['version'];
				$data['update']['desc'] = $check['flash']['message'];
				$data['update']['link'] = ($check['flash']['status'] == 1) ? $check['update']['link'] : site_url('update/index');
				$data['update']['status'] = $check['flash']['status'];
				
				switch ($check['update']['severity'])
				{
					case 'critical':
						$data['update']['severity'] = 'red';
					break;
					
					case 'major':
						$data['update']['severity'] = 'orange';
					break;
						
					case 'minor':
						$data['update']['severity'] = 'blue';
					break;
				}
			}
		}
		
		/* set the panel */
		$js_data['panel'] = ($data['update'] !== FALSE) ? 'update' : $js_data['panel'];
		
		/* view data */
		$data['header'] = lang('head_admin_index');
		
		/*  javascript data */
		$js_data['first_launch'] = $this->session->flashdata('first_launch');
		$js_data['password_reset'] = $this->session->flashdata('password_reset');
		$js_data['version'] = (isset($check['update']['version'])) ? $check['update']['version'] : '';
		
		$data['loader'] = array(
			'src' => img_location('loading-bar.gif', $this->skin, 'admin'),
			'alt' => lang('actions_loading'),
		);
		
		$data['label'] = array(
			'view_all_posts' => ucwords(lang('actions_viewall') .' '. lang('global_posts') .' '. RARROW),
			'view_all_logs' => ucwords(lang('actions_viewall') .' '. lang('global_personallogs') .' '. RARROW),
			'view_all_news' => ucwords(lang('actions_viewall') .' '. lang('global_newsitems') .' '. RARROW),
			'mynova' => ucwords(lang('labels_my') .' '. APP_NAME),
			'mynotify' => ucfirst(lang('labels_notifications')),
			'online' => ucwords(lang('online_now')) .':',
			's_posts' => ucwords(lang('status_saved') .' '. lang('global_missionposts')),
			's_logs' => ucwords(lang('status_saved') .' '. lang('global_personallogs')),
			's_news' => ucwords(lang('status_saved') .' '. lang('global_newsitems')),
			'pm' => ucwords(lang('status_unread') .' '. lang('global_privatemessages')),
			'p_users' => ucwords(lang('status_pending') .' '. lang('global_characters')),
			'p_posts' => ucwords(lang('status_pending') .' '. lang('global_missionposts')),
			'p_logs' => ucwords(lang('status_pending') .' '. lang('global_personallogs')),
			'p_news' => ucwords(lang('status_pending') .' '. lang('global_newsitems')),
			'p_comments' => ucwords(lang('status_pending') .' '. lang('labels_comments')),
			'p_awards' => ucwords(lang('status_pending') .' '. lang('global_award') .' '. lang('labels_nominations')),
			'p_docked' => ucwords(lang('status_pending') .' '. lang('actions_docking') .' '. lang('labels_requests')),
			'r_posts' => ucwords(lang('status_recent') .' '. lang('global_missionposts')),
			'r_logs' => ucwords(lang('status_recent') .' '. lang('global_personallogs')),
			'r_news' => ucwords(lang('status_recent') .' '. lang('global_newsitems')),
			'posts' => ucwords(lang('global_missionposts')),
			'logs' => ucwords(lang('global_personallogs')),
			'news' => ucwords(lang('global_newsitems')),
			'post_comments' => ucwords(lang('global_missionpost') .' '. lang('labels_comments')),
			'log_comments' => ucwords(lang('global_personallog') .' '. lang('labels_comments')),
			'news_comments' => ucwords(lang('global_newsitem') .' '. lang('labels_comments')),
			'title' => ucfirst(lang('labels_title')),
			'date' => ucfirst(lang('labels_date')),
			'by' => ucfirst(lang('labels_by')),
			'category' => ucfirst(lang('labels_category')) .':',
			'mission' => ucfirst(lang('global_mission')) .':',
			'joined' => ucfirst(lang('actions_joined')),
			'ago' => lang('time_ago'),
			'last_post' => ucwords(lang('order_last') .' '. lang('global_post')) .':',
			'last_login' => ucwords(lang('order_last') .' '. lang('actions_login')) .':',
			'activity' => ucfirst(lang('labels_activity')),
			'milestones' => ucfirst(lang('labels_milestones')),
			'noposts' => lang('error_no_posts'),
			'nologs' => lang('error_no_logs'),
			'nonews' => lang('error_no_news'),
			'update' => ucwords(APP_NAME .' '. lang('actions_update')),
			'getupdate' => ucfirst(lang('actions_get') .' '. lang('labels_the') .' '. lang('actions_update')) .' '. RARROW,
			'runupdate' => ucfirst(lang('actions_run') .' '. lang('labels_the') .' '. lang('actions_update')) .' '. RARROW,
			'ignore' => ucfirst(lang('actions_ignore') .' '. lang('labels_this') .' '. lang('labels_version')),
			'loading' => ucfirst(lang('actions_loading')) .'...',
			'nonotifications' => ucfirst(lang('labels_no') .' '. lang('labels_notifications') .' '. lang('labels_available')),
			'nomilestones' => ucfirst(lang('labels_no') .' '. lang('labels_milestones') .' '. lang('labels_available')),
			'noactivity' => ucfirst(lang('labels_no') .' '. lang('labels_activity') .' '. lang('labels_notifications')),
		);
		
		/* figure out where the view JS files should be coming from */
		$view_loc = view_location('admin_index', $this->skin, 'admin');
		$js_loc = js_location('admin_index_js', $this->skin, 'admin');
		
		/* write the data to the template */
		$this->template->write('title', lang('head_admin_index'));
		$this->template->write_view('content', $view_loc, $data);
		$this->template->write_view('javascript', $js_loc, $js_data);
		
		/* render the template */
		$this->template->render();
	}
	
	function error()
	{
		/* set the variables */
		$error = $this->uri->segment(3, 0);
		$page = ($this->session->flashdata('referer')) ? $this->session->flashdata('referer') : FALSE;
		
		$data['header'] = lang('head_admin_error');
		
		/* set the data used by the view */
		$data['error'] = lang('error_admin_'. $error);
		
		/* figure out where the view JS files should be coming from */
		$view_loc = view_location('error', $this->skin, 'admin');
		
		/* write the data to the template */
		$this->template->write('title', lang('head_admin_error'));
		$this->template->write_view('content', $view_loc, $data);
		
		/* render the template */
		$this->template->render();
	}
	
	function whatsnew()
	{
		/* pull in the markdown parser */
		include_once APPPATH .'libraries/Thresher_Markdown.php';
		
		/* build the array of pieces we need */
		$version_pieces = array(
			'sys_version_major',
			'sys_version_minor',
			'sys_version_update'
		);
		
		/* get the current version */
		$version = $this->sys->get_item('system_info', 'sys_id', 1, $version_pieces);
		
		/* put the version into a string */
		$version_str = implode('.', $version);
		
		/* grab the what's new information */
		$item = $this->sys->get_item('system_versions', 'version', $version_str);
		$data['whats_new'] = $item->version_launch;
		$data['full_changes'] = Markdown($item->version_changes);
		
		$data['header'] = lang('head_admin_whatsnew');
		
		/* figure out where the view files should be coming from */
		$view_loc = view_location('whats_new', $this->skin, 'admin');
		
		/* write the data to the template */
		$this->template->write('title', lang('head_admin_whatsnew'));
		$this->template->write_view('content', $view_loc, $data);
		
		/* render the template */
		$this->template->render();
	}
	
	function _check_version()
	{
		if (ini_get('allow_url_fopen'))
		{
			/* load the resources */
			$this->load->helper('yayparser');
			
			/* get the contents of the file */
			$contents = file_get_contents(VERSION_FEED);
					
			/* parse the contents of the yaml file */
			$array = yayparser($contents);
			
			/* get the system information */
			$system = $this->sys->get_system_info();
			
			/* build the array of version info */
			$version = array(
				'files' => array(
					'full'		=> APP_VERSION_MAJOR .'.'. APP_VERSION_MINOR .'.'. APP_VERSION_UPDATE,
					'major'		=> APP_VERSION_MAJOR,
					'minor'		=> APP_VERSION_MINOR,
					'update'	=> APP_VERSION_UPDATE
				),
				'database' => array(
					'full'		=> $system->sys_version_major .'.'. $system->sys_version_minor .'.'. $system->sys_version_update,
					'major'		=> $system->sys_version_major,
					'minor'		=> $system->sys_version_minor,
					'update'	=> $system->sys_version_update
				),
			);
			
			/* grab the updates setting */
			$type = $this->options['updates'];
			
			$update = FALSE;
			
			switch ($type)
			{
				case 'major':
					
					if (version_compare($array['version_major'], $version['files']['major'], '>') || version_compare($array['version_major'], $version['database']['major'], '>'))
					{
						$update['version']		= $array['version'];
						$update['notes']		= $array['notes'];
						$update['severity']		= $array['severity'];
						$update['link']			= $array['link'];
					}
				break;
					
				case 'minor':
				
					if (version_compare($array['version_minor'], $version['files']['minor'], '>') || version_compare($array['version_minor'], $version['database']['minor'], '>'))
					{
						$update['version']		= $array['version'];
						$update['notes']		= $array['notes'];
						$update['severity']		= $array['severity'];
						$update['link']			= $array['link'];
					}
				break;
					
				case 'update':
				
					if (version_compare($array['version_update'], $version['files']['update'], '>') || version_compare($array['version_update'], $version['database']['update'], '>'))
					{
						$update['version']		= $array['version'];
						$update['notes']		= $array['notes'];
						$update['severity']		= $array['severity'];
						$update['link']			= $array['link'];
					}
				break;
					
				case 'all':
				
					if (version_compare($version['files']['full'], $array['version'], '<') || version_compare($version['database']['full'], $array['version'], '<'))
					{
						$update['version']		= $array['version'];
						$update['notes']		= $array['notes'];
						$update['severity']		= $array['severity'];
						$update['link']			= $array['link'];
					}
				break;
			}
			
			if (version_compare($version['database']['full'], $version['files']['full'], '>'))
			{
				$flash['header'] = lang('update_required');
				$flash['message'] = sprintf(
					lang('update_outofdate_files'),
					$version['files']['full'],
					$version['database']['full']
				);
				$flash['status'] = 2;
			}
			elseif (version_compare($version['database']['full'], $version['files']['full'], '<'))
			{
				$flash['header'] = lang('update_required');
				$flash['message'] = sprintf(
					lang('update_outofdate_database'),
					$version['database']['full'],
					$version['files']['full']
				);
				$flash['status'] = 2;
			}
			elseif (isset($update))
			{
				$flash['header'] = sprintf(
					lang('update_available'),
					APP_NAME,
					$update['version'],
					''
				);
				$flash['message'] = $update['notes'];
				$flash['status'] = 1;
			}
			else
			{
				$flash['header'] = '';
				$flash['message'] = '';
				$flash['status'] = '';
			}
			
			$retval = array(
				'flash' => $flash,
				'update' => $update
			);
			
			return $retval;
		}
		
		return FALSE;
	}
}