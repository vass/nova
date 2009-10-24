<?php
/*
|---------------------------------------------------------------
| TEMPLATE - INSTALL
|---------------------------------------------------------------
|
| File: application/views/_base/template_install.php
| Skin Version: 1.0
|
| Main layout file used by the update system
|
*/

/* set the final style location */
$style_loc = APPFOLDER . '/views/_base/install/css/main.css';

echo "<?xml version='1.0' encoding='UTF-8'?>\r\n";

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<title><?php echo $title;?></title>
		
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="language" content="en" />
		<meta name="description" content="<?php echo $this->config->item('meta_desc');?>" />
		<meta name="keywords" content="<?php echo $this->config->item('meta_keywords');?>" />
		<meta name="author" content="<?php echo $this->config->item('meta_author');?>" />
		
		<?php echo $_redirect;?>
		
		<style type="text/css">
			@import url("<?php echo base_url() . APPFOLDER .'/assets/js/css/ui.core.css';?>");
			@import url("<?php echo base_url() . APPFOLDER .'/assets/js/css/ui.theme.css';?>");
			@import url("<?php echo base_url() . APPFOLDER .'/assets/js/css/ui.progressbar.css';?>");
		</style>
		
		<!-- STYLESHEETS -->
		<?php echo link_tag($style_loc); ?>
	</head>
	<body class="UITheme">
		<div class="wrapper">
			<div id="head">
				<div class="logo"><?php echo img('application/views/_base/install/images/head_logo.png', FALSE);?></div>
				
				<?php echo text_output($label, 'h1', 'page-head');?>
			</div>
		</div>
		
		<div id="loading" class="hidden">
			<img src="<?php echo base_url() . APPFOLDER;?>/views/_base/install/images/loading-circle-large.gif" alt="" />
			<br />
			<strong><?php echo $this->lang->line('global_processing');?></strong>
		</div>
		
		<div id="body">
			<?php if ($this->uri->segment(2) == 'step'): ?>
				<div id="amount"><?php echo $this->lang->line('global_progress');?>: <span id="percent">0%</span></div>
				<div id="progress"></div>
			<?php endif;?>
			
			<!-- PAGE CONTENT -->
			<div class="content">
				<?php echo $flash_message;?>
				<?php echo $content;?>
			</div>
			
			<div style="clear:left;"></div>
		</div>
		
		<!-- FOOTER -->
		<div id="footer">
			Powered by <strong><?php echo APP_NAME;?></strong><br />
			&copy; Anodyne Productions, <?php echo date('Y');?>
		</div>
		
		<script type="text/javascript" src="<?php echo base_url() . APPFOLDER .'/assets/js/jquery.js';?>"></script>
		<script type="text/javascript" src="<?php echo base_url() . APPFOLDER .'/assets/js/ui.core.min.js';?>"></script>
		<script type="text/javascript" src="<?php echo base_url() . APPFOLDER .'/assets/js/ui.progressbar.min.js';?>"></script>
		
		<script type="text/javascript">
			$(document).ready(function(){
				$('#install').click(function(){
					$('#body').fadeOut('fast', function(){
						$('#loading').removeClass('hidden');
					});
				});
			});
		</script>
		
		<?php echo $javascript;?>
	</body>
</html>