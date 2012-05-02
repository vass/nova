<p><?php echo $message;?></p>

<?php if ($allowed === true): ?>
	<?php echo Form::open(array('action' => 'setup/install/index/2', 'method' => 'post', 'id' => 'step1'));?>
		<fieldset>
			<legend>Sim Information</legend>
			
			<div class="control-group">
				<label class="control-label">Sim Name</label>
				<div class="controls">
					<?php echo Form::input(array('name' => 'sim_name', 'class' => 'span4'));?>
				</div>
			</div>
		</fieldset>
		
		<fieldset>
			<legend>Your Information</legend>
			
			<div class="control-group">
				<label class="control-label">Your Name</label>
				<div class="controls">
					<?php echo Form::input(array('name' => 'name', 'class' => 'span4'));?>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Your Email Address</label>
				<div class="controls">
					<?php echo Form::input(array('name' => 'email', 'class' => 'span4', 'type' => 'email'));?>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Your Password</label>
				<div class="controls">
					<?php echo Form::password(array('name' => 'password', 'class' => 'span4', 'id' => 'password'));?>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Confirm Your Password</label>
				<div class="controls">
					<?php echo Form::password(array('name' => 'password_confirm', 'class' => 'span4'));?>
				</div>
			</div>
		</fieldset>
		
		<fieldset>
			<legend>Character Information</legend>
			
			<div class="control-group">
				<label class="control-label">First Name</label>
				<div class="controls">
					<?php echo Form::input(array('name' => 'first_name', 'class' => 'span4'));?>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Last Name</label>
				<div class="controls">
					<?php echo Form::input(array('name' => 'last_name', 'class' => 'span4'));?>
				</div>
			</div>
			
			<div class="row">
				<div class="span4">
					<div class="control-group">
						<label class="control-label">Position</label>
						<div class="controls">
							<?php echo NovaForm::position('position', null, array('id' => 'position', 'class' => 'span4'));?>
						</div>
					</div>
				</div>
				<div class="span7">
					<p>&nbsp;</p>
					<p id="position_desc" class="muted font-small">This is the description piece.</p>
				</div>
			</div>
			
			<div class="row">
				<div class="span4">
					<div class="control-group">
						<label class="control-label">Rank</label>
						<div class="controls">
							<?php echo NovaForm::rank('rank', null, array('id' => 'rank', 'class' => 'span4'));?>
						</div>
					</div>
				</div>
				<div class="span2">
					<p>&nbsp;</p>
					<p id="rank_img"><?php echo $default_rank;?></p>
				</div>
			</div>
		</fieldset>
<?php endif;?>