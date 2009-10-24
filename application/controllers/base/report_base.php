<?php
/*
|---------------------------------------------------------------
| ADMIN - REPORT CONTROLLER
|---------------------------------------------------------------
|
| File: controllers/report_base.php
| System Version: 1.0
|
| Controller that handles the REPORT section of the admin system.
|
*/

class Report_base extends Controller {

	/* set the variables */
	var $options;
	var $skin;
	var $rank;
	var $timezone;
	var $dst;

	function Report_base()
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
		$this->load->model('players_model', 'player');
		
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
			'posting_requirement'
		);
		
		/* grab the settings */
		$this->options = $this->settings->get_settings($settings_array);
		
		/* set the variables */
		$this->skin = $this->options['skin_admin'];
		$this->rank = $this->options['display_rank'];
		$this->timezone = $this->options['timezone'];
		$this->dst = $this->options['daylight_savings'];
		
		if ($this->auth->is_logged_in() === TRUE)
		{ /* if there's a session, set the variables appropriately */
			$this->skin = $this->session->userdata('skin_admin');
			$this->rank = $this->session->userdata('display_rank');
			$this->timezone = $this->session->userdata('timezone');
			$this->dst = $this->session->userdata('dst');
		}
		
		/* set and load the language file needed */
		$this->lang->load('app', $this->session->userdata('language'));
		
		/* set the template */
		$this->template->set_template('admin');
		$this->template->set_master_template($this->skin .'/template_admin.php');
		
		/* write the common elements to the template */
		$this->template->write('nav_main', $this->menu->build('main', 'main'), TRUE);
		$this->template->write('nav_sub', $this->menu->build('adminsub', 'report'), TRUE);
		$this->template->write('panel_1', $this->user_panel->panel_1(), TRUE);
		$this->template->write('panel_2', $this->user_panel->panel_2(), TRUE);
		$this->template->write('panel_3', $this->user_panel->panel_3(), TRUE);
		$this->template->write('panel_workflow', $this->user_panel->panel_workflow(), TRUE);
		$this->template->write('title', $this->options['sim_name'] . ' :: ');
	}

	function index()
	{
		/* nothing goes here */
	}
	
	function activity()
	{
		$this->auth->check_access();
		
		/* load the resources */
		$this->load->model('personallogs_model', 'logs');
		$this->load->model('posts_model', 'posts');
		$this->load->model('news_model', 'news');
		
		$players = $this->player->get_players();
		
		if ($players->num_rows() > 0)
		{
			/* set the posting requirement threshold */
			$requirement = now() - (86400 * $this->options['posting_requirement']);
			
			$timeframe = $this->options['posting_requirement'] * 86400;
			$timeframe = now() - $timeframe;
			
			$month = 30 * 86400;
			$month = now() - $month;
			
			foreach ($players->result() as $p)
			{
				$data['players'][$p->player_id] = array(
					'name' => $p->name,
					'main_char' => $this->char->get_character_name($p->main_char, TRUE),
					'email' => $p->email,
					'id' => $p->player_id,
					'charid' => $p->main_char,
					'last_post' => timespan_short($p->last_post, now()) .' '. lang('time_ago'),
					'last_login' => timespan_short($p->last_login, now()) .' '. lang('time_ago'),
					'requirement_post' => ($p->last_post < $requirement) ? ' red' : '',
					'requirement_login' => ($p->last_login < $requirement) ? ' red' : '',
					'loa' => ($p->loa != 'active') ? '['. strtoupper($p->loa) .']' : '',
					'posts' => array(
						'timeframe' => $this->posts->count_player_posts($p->player_id, 'activated', $timeframe),
						'month' => $this->posts->count_player_posts($p->player_id, 'activated', $month),
					),
					'logs' => array(
						'timeframe' => $this->logs->count_player_logs($p->player_id, 'activated', $timeframe),
						'month' => $this->logs->count_player_logs($p->player_id, 'activated', $month),
					),
					'news' => array(
						'timeframe' => $this->news->count_player_news($p->player_id, 'activated', $timeframe),
						'month' => $this->news->count_player_news($p->player_id, 'activated', $month),
					),
				);
			}
		}
		
		$data['header'] = lang('head_report_activity');
		
		$data['label'] = array(
			'biochar' => ucwords(lang('global_character') .' '. lang('labels_bio')),
			'bioplayer' => ucwords(lang('global_player') .' '. lang('labels_bio')),
			'days' => ucfirst(lang('time_days')),
			'lastlogin' => ucwords(lang('order_last') .' '. lang('actions_login')),
			'lastpost' => ucwords(lang('order_last') .' '. lang('global_post')),
			'logs' => ucwords(lang('global_logs')),
			'name' => ucfirst(lang('labels_name')),
			'news' => ucwords(lang('global_news')),
			'posts' => ucwords(lang('global_posts')),
			'totals' => ucfirst(lang('labels_totals'))
		);
		
		/* figure out where the view file should be coming from */
		$view_loc = view_location('report_activity', $this->skin, 'admin');
		$js_loc = js_location('report_activity_js', $this->skin, 'admin');
		
		/* write the data to the template */
		$this->template->write('title', $data['header']);
		$this->template->write_view('content', $view_loc, $data);
		$this->template->write_view('javascript', $js_loc);
		
		/* render the template */
		$this->template->render();
	}
	
	function applications()
	{
		$this->auth->check_access();
		
		/* load the resources */
		$this->load->library('pagination');
		$this->load->model('applications_model', 'apps');
		
		/* set the variables */
		$offset = $this->uri->segment(3, 0, TRUE);
	
		/* set the pagination configs */
		$config['base_url'] = site_url('report/applications/');
		$config['total_rows'] = $this->apps->count_applications();
		$config['per_page'] = 25;
		$config['full_tag_open'] = '<p class="fontMedium bold">';
		$config['full_tag_close'] = '</p>';
	
		/* initialize the pagination library */
		$this->pagination->initialize($config);
		
		/* create the page links */
		$data['pagination'] = $this->pagination->create_links();
		
		$applications = $this->apps->get_applications();
		
		if ($applications->num_rows() > 0)
		{
			foreach ($applications->result() as $a)
			{
				$date = gmt_to_local($a->app_date, $this->timezone, $this->dst);
				
				$data['apps'][$a->app_id] = array(
					'id' => $a->app_id,
					'character' => $a->app_character_name,
					'player' => $a->app_player_name,
					'position' => $a->app_position,
					'action' => $a->app_action,
					'date' => mdate($this->options['date_format'], $date)
				);
			}
		}
		
		$data['images'] = array(
			'green' => array(
				'src' => img_location('icon-green.png', $this->skin, 'admin'),
				'alt' => lang('actions_accepted'),
				'class' => 'image'),
			'red' => array(
				'src' => img_location('icon-red.png', $this->skin, 'admin'),
				'alt' => lang('actions_rejected'),
				'class' => 'image'),
			'yellow' => array(
				'src' => img_location('icon-yellow.png', $this->skin, 'admin'),
				'alt' => lang('status_pending'),
				'class' => 'image'),
			'delete' => array(
				'src' => img_location('icon-delete.png', $this->skin, 'admin'),
				'alt' => lang('actions_deleted'),
				'class' => 'image'),
			'view' => array(
				'src' => img_location('icon-view.png', $this->skin, 'admin'),
				'alt' => lang('actions_view'),
				'title' => ucfirst(lang('actions_view')),
				'class' => 'image'),
		);
		
		$data['header'] = lang('head_report_applications');
		
		$data['text'] = sprintf(
			lang('text_applications_report'),
			img($data['images']['green']),
			img($data['images']['red']),
			img($data['images']['delete']),
			img($data['images']['yellow'])
		);
		
		$data['label'] = array(
			'action' => ucfirst(lang('actions_action')),
			'character' => ucfirst(lang('global_character')),
			'date' => ucfirst(lang('labels_date')),
			'none' => ucfirst(lang('labels_no') .' '. lang('labels_applications') .' '. lang('actions_found')),
			'player' => ucfirst(lang('global_player')),
			'position' => ucfirst(lang('global_position')),
		);
		
		/* figure out where the view file should be coming from */
		$view_loc = view_location('report_applications', $this->skin, 'admin');
		$js_loc = js_location('report_applications_js', $this->skin, 'admin');
		
		/* write the data to the template */
		$this->template->write('title', $data['header']);
		$this->template->write_view('content', $view_loc, $data);
		$this->template->write_view('javascript', $js_loc);
		
		/* render the template */
		$this->template->render();
	}
	
	function awardnominations()
	{
		$this->auth->check_access();
		
		/* load the resources */
		$this->load->library('pagination');
		$this->load->model('awards_model', 'awards');
		
		/* set the variables */
		$offset = $this->uri->segment(3, 0, TRUE);
	
		/* set the pagination configs */
		$config['base_url'] = site_url('report/awardnominations/');
		$config['total_rows'] = $this->awards->count_award_noms('');
		$config['per_page'] = 25;
		$config['full_tag_open'] = '<p class="fontMedium bold">';
		$config['full_tag_close'] = '</p>';
	
		/* initialize the pagination library */
		$this->pagination->initialize($config);
		
		/* create the page links */
		$data['pagination'] = $this->pagination->create_links();
		
		$nominations = $this->awards->get_award_noms('');
		
		if ($nominations->num_rows() > 0)
		{
			foreach ($nominations->result() as $n)
			{
				$date = gmt_to_local($n->queue_date, $this->timezone, $this->dst);
				
				$data['nominations'][$n->queue_id] = array(
					'nominate' => $this->char->get_character_name($n->queue_nominate, TRUE),
					'awardid' => $n->queue_award,
					'charid' => $n->queue_nominate,
					'award' => $this->awards->get_award($n->queue_award, 'award_name'),
					'reason' => $n->queue_reason,
					'status' => $n->queue_status,
					'date' => mdate($this->options['date_format'], $date)
				);
				
				if (empty($n->queue_receive_character))
				{
					$charid = $this->player->get_player($n->queue_receive_player, 'main_char');
					$data['nominations'][$n->queue_id]['name'] = $this->char->get_character_name($charid, TRUE);
				}
				else
				{
					$charid = $n->queue_receive_character;
					$data['nominations'][$n->queue_id]['name'] = $this->char->get_character_name($charid, TRUE);
				}
			}
		}
		
		$data['images'] = array(
			'green' => array(
				'src' => img_location('icon-green.png', $this->skin, 'admin'),
				'alt' => lang('actions_approved'),
				'class' => 'image'),
			'red' => array(
				'src' => img_location('icon-red.png', $this->skin, 'admin'),
				'alt' => lang('actions_rejected'),
				'class' => 'image'),
			'yellow' => array(
				'src' => img_location('icon-yellow.png', $this->skin, 'admin'),
				'alt' => lang('status_pending'),
				'class' => 'image'),
		);
		
		$data['header'] = lang('head_report_awardnominations');
		
		$data['text'] = sprintf(
			lang('text_awardnom_report'),
			lang('global_award'),
			lang('global_awards'),
			img($data['images']['green']),
			lang('global_awards'),
			img($data['images']['yellow']),
			lang('global_awards'),
			img($data['images']['red'])
		);
		
		$data['label'] = array(
			'award' => ucfirst(lang('global_award')),
			'date' => ucfirst(lang('labels_date')),
			'nominated' => ucwords(lang('actions_nominated') .' '. lang('labels_by')),
			'none' => ucfirst(lang('labels_no') .' '. lang('global_award') .' '. 
				lang('labels_nominations') .' '. lang('actions_found')),
		);
		
		/* figure out where the view file should be coming from */
		$view_loc = view_location('report_awardnominations', $this->skin, 'admin');
		$js_loc = js_location('report_awardnominations_js', $this->skin, 'admin');
		
		/* write the data to the template */
		$this->template->write('title', $data['header']);
		$this->template->write_view('content', $view_loc, $data);
		$this->template->write_view('javascript', $js_loc);
		
		/* render the template */
		$this->template->render();
	}
	
	function loa()
	{
		$this->auth->check_access();
		
		/* load the resources */
		$this->load->library('pagination');
		
		/* set the variables */
		$offset = $this->uri->segment(3, 0, TRUE);
	
		/* set the pagination configs */
		$config['base_url'] = site_url('report/loa/');
		$config['total_rows'] = $this->sys->count_loa_records();
		$config['per_page'] = 25;
		$config['full_tag_open'] = '<p class="fontMedium bold">';
		$config['full_tag_close'] = '</p>';
	
		/* initialize the pagination library */
		$this->pagination->initialize($config);
		
		/* create the page links */
		$data['pagination'] = $this->pagination->create_links();
		
		/* run the method */
		$records = $this->sys->get_loa_records($config['per_page'], $offset);
		
		if ($records->num_rows() > 0)
		{
			$datestring = $this->options['date_format'];
			
			foreach ($records->result() as $r)
			{
				$date_start = gmt_to_local($r->loa_start_date, $this->timezone, $this->dst);
				$date_end = gmt_to_local($r->loa_end_date, $this->timezone, $this->dst);
				
				$end = (!empty($r->loa_end_date)) ? $r->loa_end_date : now();
				
				$player = $this->player->get_player($r->loa_player);
				$name = (!empty($player->name)) ? $player->name : $player->email;
				
				$data['loa'][$r->loa_id]['player'] = $name;
				$data['loa'][$r->loa_id]['date_start'] = mdate($datestring, $date_start);
				$data['loa'][$r->loa_id]['date_end'] = (!empty($r->loa_end_date)) ? mdate($datestring, $date_end) : '';
				$data['loa'][$r->loa_id]['duration'] = $r->loa_duration;
				$data['loa'][$r->loa_id]['duration_actual'] = timespan($r->loa_start_date, $end);
				$data['loa'][$r->loa_id]['reason'] = $r->loa_reason;
			}
		}
		
		$data['header'] = lang('head_report_loa');
		
		$data['label'] = array(
			'date_end' => ucfirst(lang('status_end')) .':',
			'date_start' => ucfirst(lang('status_start')) .':',
			'dates' => ucfirst(lang('labels_dates')),
			'duration_expected' => ucwords(lang('labels_expected') .' '. lang('labels_duration')) .':',
			'duration_actual' => ucwords(lang('labels_actual') .' '. lang('labels_duration')) .':',
			'name' => ucfirst(lang('labels_name')),
			'none' => ucfirst(lang('labels_no') .' '. lang('abbr_loa') .' '. 
				lang('labels_records') .' '. lang('actions_found')),
			'reason' => ucfirst(lang('labels_reason')),
		);
		
		/* figure out where the view file should be coming from */
		$view_loc = view_location('report_loa', $this->skin, 'admin');
		$js_loc = js_location('report_loa_js', $this->skin, 'admin');
		
		/* write the data to the template */
		$this->template->write('title', $data['header']);
		$this->template->write_view('content', $view_loc, $data);
		$this->template->write_view('javascript', $js_loc);
		
		/* render the template */
		$this->template->render();
	}
	
	function milestones()
	{
		$this->auth->check_access();
		
		$players = $this->player->get_players();
		
		if ($players->num_rows() > 0)
		{
			foreach ($players->result() as $p)
			{
				$date = gmt_to_local($p->join_date, $this->timezone, $this->dst);
				
				$data['players'][$p->player_id] = array(
					'name' => $this->char->get_character_name($p->main_char, TRUE),
					'id' => $p->player_id,
					'charid' => $p->main_char,
					'join_date' => mdate($this->options['date_format'], $date),
					'timespan' => timespan_short($p->join_date, now()),
				);
			}
		}
		
		$data['header'] = lang('head_report_milestones');
		
		$data['label'] = array(
			'bio_char' => ucwords(lang('global_character') .' '. lang('labels_bio')),
			'bio_player' => ucwords(lang('global_player') .' '. lang('labels_bio')),
			'name' => ucwords(lang('global_character') .' '. lang('labels_name')),
			'timespan' => ucfirst(lang('time_timespan')),
		);
		
		/* figure out where the view file should be coming from */
		$view_loc = view_location('report_milestones', $this->skin, 'admin');
		$js_loc = js_location('report_milestones_js', $this->skin, 'admin');
		
		/* write the data to the template */
		$this->template->write('title', $data['header']);
		$this->template->write_view('content', $view_loc, $data);
		$this->template->write_view('javascript', $js_loc);
		
		/* render the template */
		$this->template->render();
	}
	
	function moderation()
	{
		$this->auth->check_access();
		
		$players = $this->player->get_players();
		
		if ($players->num_rows() > 0)
		{
			foreach ($players->result() as $p)
			{
				$data['players'][$p->player_id] = array(
					'name' => $this->char->get_character_name($p->main_char, TRUE),
					'id' => $p->player_id,
					'charid' => $p->main_char,
					'posts' => ($p->moderate_posts == 'y') ? 'red' : 'green',
					'comments_p' => ($p->moderate_post_comments == 'y') ? 'red' : 'green',
					'logs' => ($p->moderate_logs == 'y') ? 'red' : 'green',
					'comments_l' => ($p->moderate_log_comments == 'y') ? 'red' : 'green',
					'news' => ($p->moderate_news == 'y') ? 'red' : 'green',
					'comments_n' => ($p->moderate_news_comments == 'y') ? 'red' : 'green',
				);
			}
		}
		
		$data['header'] = lang('head_report_moderation');
		
		$data['images'] = array(
			'green' => array(
				'src' => img_location('icon-green.png', $this->skin, 'admin'),
				'alt' => '',
				'class' => 'image'),
			'red' => array(
				'src' => img_location('icon-red.png', $this->skin, 'admin'),
				'alt' => lang('actions_moderated'),
				'class' => 'image'),
		);
		
		$data['text'] = sprintf(
			lang('text_moderation_report'),
			lang('global_players'),
			img($data['images']['green']),
			img($data['images']['red'])
		);
		
		$data['label'] = array(
			'bio_char' => ucwords(lang('global_character') .' '. lang('labels_bio')),
			'bio_player' => ucwords(lang('global_player') .' '. lang('labels_bio')),
			'comments_l' => ucwords(lang('global_log') ."\r\n". lang('labels_comments')),
			'comments_n' => ucwords(lang('global_news') ."\r\n". lang('labels_comments')),
			'comments_p' => ucwords(lang('global_post') ."\r\n". lang('labels_comments')),
			'logs' => ucfirst(lang('global_logs')),
			'name' => ucwords(lang('global_character') .' '. lang('labels_name')),
			'news' => ucfirst(lang('global_news')),
			'posts' => ucfirst(lang('global_posts')),
		);
		
		/* figure out where the view file should be coming from */
		$view_loc = view_location('report_moderation', $this->skin, 'admin');
		$js_loc = js_location('report_moderation_js', $this->skin, 'admin');
		
		/* write the data to the template */
		$this->template->write('title', $data['header']);
		$this->template->write_view('content', $view_loc, $data);
		$this->template->write_view('javascript', $js_loc);
		
		/* render the template */
		$this->template->render();
	}
	
	function posting()
	{
		$this->auth->check_access();
		
		/* load the resources */
		$this->load->model('personallogs_model', 'logs');
		$this->load->model('posts_model', 'posts');
		$this->load->model('news_model', 'news');
		$this->load->model('ranks_model', 'ranks');
		$this->load->helper('utility');
		
		/* get all the players */
		$players = $this->player->get_players('');
		
		if ($players->num_rows() > 0)
		{
			foreach ($players->result() as $p)
			{
				if ($p->status != 'pending')
				{
					$last = now() - $p->last_post;
					$last = $last / 86400;
					
					$date = gmt_to_local($p->last_post, $this->timezone, $this->dst);
					
					$data['players'][$p->status][$p->player_id] = array(
						'id' => $p->player_id,
						'name' => (!empty($p->name)) ? $p->name : $p->email,
						'logs' => $this->logs->count_player_logs($p->player_id),
						'news' => $this->news->count_player_news($p->player_id),
						'posts' => $this->posts->count_player_posts($p->player_id),
						'class' => ($last > $this->options['posting_requirement']) ? 'red bold' : '',
						'lastpost' => mdate($this->options['date_format'], $date),
					);
				}
			}
		}
		
		/* get all the players */
		$characters = $this->char->get_all_characters('all');
		
		if ($characters->num_rows() > 0)
		{
			foreach ($characters->result() as $c)
			{
				if ($c->crew_type != 'pending')
				{
					$last = now() - $c->last_post;
					$last = $last / 86400;
						
					$date = gmt_to_local($c->last_post, $this->timezone, $this->dst);
					
					$name = array(
						$this->ranks->get_rank($c->rank, 'rank_name'),
						$c->first_name,
						$c->middle_name,
						$c->last_name
					);
					
					$data['characters'][$c->crew_type][$c->charid] = array(
						'id' => $c->charid,
						'name' => parse_name($name),
						'logs' => $this->logs->count_character_logs($c->charid),
						'news' => $this->news->count_character_news($c->charid),
						'posts' => $this->posts->count_character_posts($c->charid),
						'class' => ($last > $this->options['posting_requirement']) ? 'red bold' : '',
						'lastpost' => mdate($this->options['date_format'], $date),
					);
				}
			}
		}
		
		$data['images'] = array(
			'loading' => array(
				'src' => img_location('loading-circle-large.gif', $this->skin, 'admin'),
				'alt' => lang('actions_loading'),
				'class' => 'image'),
		);
		
		$data['header'] = lang('head_report_posting');
		
		$data['label'] = array(
			'char_active' => ucwords(lang('status_active') .' '. lang('global_characters')),
			'char_inactive' => ucwords(lang('status_inactive') .' '. lang('global_characters')),
			'char_npc' => ucwords(lang('status_nonplaying') .' '. lang('global_characters')),
			'lastpost' => ucwords(lang('order_last') .' '. lang('global_post')),
			'loading' => ucfirst(lang('actions_loading') .'...'),
			'logs' => ucwords(lang('global_personallogs')),
			'name' => ucfirst(lang('labels_name')),
			'news' => ucwords(lang('global_newsitems')),
			'no_characters' => ucfirst(lang('labels_no') .' '. lang('global_characters') .' '. lang('actions_found')),
			'no_players' => ucfirst(lang('labels_no') .' '. lang('global_players') .' '. lang('actions_found')),
			'players' => ucfirst(lang('global_players')),
			'players_active' => ucwords(lang('status_active') .' '. lang('global_players')),
			'players_inactive' => ucwords(lang('status_inactive') .' '. lang('global_players')),
			'posts' => ucwords(lang('global_missionposts')),
			'total' => ucfirst(lang('labels_totals')),
		);
		
		$js_data['lang'] = array(
			'search_active' => ucwords(lang('actions_search') .' '. lang('status_active') .' '. lang('global_characters')),
			'search_inactive' => ucwords(lang('actions_search') .' '. lang('status_inactive') .' '. lang('global_characters')),
			'search_npc' => ucwords(lang('actions_search') .' '. lang('abbr_npcs')),
			'search_players' => ucwords(lang('actions_search') .' '. lang('global_players')),
		);
		
		/* figure out where the view file should be coming from */
		$view_loc = view_location('report_posting', $this->skin, 'admin');
		$js_loc = js_location('report_posting_js', $this->skin, 'admin');
		
		/* write the data to the template */
		$this->template->write('title', $data['header']);
		$this->template->write_view('content', $view_loc, $data);
		$this->template->write_view('javascript', $js_loc, $js_data);
		
		/* render the template */
		$this->template->render();
	}
	
	function versions()
	{
		$this->auth->check_access();
		
		$ver = $this->sys->get_item('system_info', 'sys_id', 1);
		
		$data['version'] = array(
			'files' => APP_VERSION_MAJOR .'.'. APP_VERSION_MINOR .'.'. APP_VERSION_UPDATE,
			'ci' => CI_VERSION,
			'database' => $ver->sys_version_major .'.'. $ver->sys_version_minor .'.'. $ver->sys_version_update
		);
		
		/* grab all system version */
		$versions = $this->sys->get_all_system_versions();
		
		if ($versions->num_rows() > 0)
		{
			foreach ($versions->result() as $v)
			{
				$key = $v->version_major .'.'. $v->version_minor;
				
				$data['versions'][$key][$v->version] = array(
					'version' => $v->version,
					'rev' => $v->version_rev,
					'changes' => explode(';', $v->version_changes)
				);
			}
		}
		
		/* grab all system components */
		$comp = $this->sys->get_all_system_components();
		
		if ($comp->num_rows() > 0)
		{
			foreach ($comp->result() as $c)
			{
				$data['comp'][] = array(
					'name' => $c->comp_name,
					'version' => $c->comp_version,
					'url' => $c->comp_url,
					'desc' => $c->comp_desc
				);
			}
		}
		
		$data['header'] = lang('head_report_system');
		
		$data['images'] = array(
			'loading' => array(
				'src' => img_location('loading-circle-large.gif', $this->skin, 'admin'),
				'alt' => lang('actions_loading'),
				'class' => 'image'),
		);
		
		$data['label'] = array(
			'components' => ucwords(lang('labels_system') .' '. lang('labels_components')),
			'loading' => ucfirst(lang('actions_loading') .'...'),
			'systeminfo' => ucwords(lang('labels_system') .' '. lang('labels_info')),
			'url' => ucwords(lang('labels_site') .' '. lang('abbr_url')) .': ',
			'version_ci' => ucwords(lang('labels_codeigniter') .' '. lang('labels_version')) .': ',
			'version_db' => ucwords(lang('labels_database') .' '. lang('labels_version')) .': ',
			'version_files' => ucwords(lang('labels_files') .' '. lang('labels_version')) .': ',
			'versions' => ucwords(lang('labels_version') .' '. lang('labels_history')),
		);
		
		/* figure out where the view file should be coming from */
		$view_loc = view_location('report_system', $this->skin, 'admin');
		$js_loc = js_location('report_system_js', $this->skin, 'admin');
		
		/* write the data to the template */
		$this->template->write('title', $data['header']);
		$this->template->write_view('content', $view_loc, $data);
		$this->template->write_view('javascript', $js_loc);
		
		/* render the template */
		$this->template->render();
	}
	
	function viewapp()
	{
		$this->auth->check_access('report/applications');
		
		/* load the resources */
		$this->load->model('applications_model', 'apps');
		
		/* set the variables */
		$id = $this->uri->segment(3, 0, TRUE);
	
		$application = $this->apps->get_application($id);
		
		if ($application->num_rows() > 0)
		{
			foreach ($application->result() as $a)
			{
				$date = gmt_to_local($a->app_date, $this->timezone, $this->dst);
				
				$data['app'] = array(
					'id' => $a->app_id,
					'email' => $a->app_email,
					'character' => $a->app_character_name,
					'player' => $a->app_player_name,
					'position' => $a->app_position,
					'action' => ucfirst($a->app_action),
					'date' => mdate($this->options['date_format'], $date),
					'message' => $a->app_message,
				);
			}
		}
		
		$data['header'] = lang('head_report_viewapplication');
		
		$data['label'] = array(
			'action' => ucwords(lang('actions_action') .' '. lang('actions_taken')),
			'cname' => ucwords(lang('global_character') .' '. lang('labels_name')),
			'date' => ucwords(lang('labels_application') .' '. lang('labels_date')),
			'email' => ucwords(lang('labels_email_address')),
			'message' => ucfirst(lang('labels_message')),
			'none' => ucfirst(lang('labels_no') .' '. lang('labels_applications') .' '. lang('actions_found')),
			'pname' => ucwords(lang('global_player') .' '. lang('labels_name')),
			'position' => ucfirst(lang('global_position')),
		);
		
		/* figure out where the view file should be coming from */
		$view_loc = view_location('report_viewapp', $this->skin, 'admin');
		$js_loc = js_location('report_viewapp_js', $this->skin, 'admin');
		
		/* write the data to the template */
		$this->template->write('title', $data['header']);
		$this->template->write_view('content', $view_loc, $data);
		$this->template->write_view('javascript', $js_loc);
		
		/* render the template */
		$this->template->render();
	}
}

/* End of file report_base.php */
/* Location: ./application/controllers/report_base.php */