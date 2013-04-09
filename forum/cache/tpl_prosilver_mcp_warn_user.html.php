<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('mcp_header.html'); ?>


<form method="post" id="mcp" action="<?php echo (isset($this->_rootref['U_POST_ACTION'])) ? $this->_rootref['U_POST_ACTION'] : ''; ?>">

<h2><?php echo ((isset($this->_rootref['L_WARN_USER'])) ? $this->_rootref['L_WARN_USER'] : ((isset($user->lang['WARN_USER'])) ? $user->lang['WARN_USER'] : '{ WARN_USER }')); ?></h2>

<div class="panel">
	<div class="inner"><span class="corners-top"><span></span></span>

	<h3><?php echo (isset($this->_rootref['USERNAME_FULL'])) ? $this->_rootref['USERNAME_FULL'] : ''; ?></h3>

	<div>
		<div class="column1">
			<?php if ($this->_rootref['AVATAR_IMG']) {  ?><div><?php echo (isset($this->_rootref['AVATAR_IMG'])) ? $this->_rootref['AVATAR_IMG'] : ''; ?></div><?php } ?>

		</div>

		<div class="column2">
			<dl class="details">
				<?php if ($this->_rootref['RANK_TITLE']) {  ?><dt><?php echo ((isset($this->_rootref['L_RANK'])) ? $this->_rootref['L_RANK'] : ((isset($user->lang['RANK'])) ? $user->lang['RANK'] : '{ RANK }')); ?>:</dt><dd><?php echo (isset($this->_rootref['RANK_TITLE'])) ? $this->_rootref['RANK_TITLE'] : ''; ?></dd><?php } if ($this->_rootref['RANK_IMG']) {  ?><dt><?php if ($this->_rootref['RANK_TITLE']) {  ?>&nbsp;<?php } else { echo ((isset($this->_rootref['L_RANK'])) ? $this->_rootref['L_RANK'] : ((isset($user->lang['RANK'])) ? $user->lang['RANK'] : '{ RANK }')); ?>:<?php } ?></dt><dd><?php echo (isset($this->_rootref['RANK_IMG'])) ? $this->_rootref['RANK_IMG'] : ''; ?></dd><?php } ?>

				<dt><?php echo ((isset($this->_rootref['L_JOINED'])) ? $this->_rootref['L_JOINED'] : ((isset($user->lang['JOINED'])) ? $user->lang['JOINED'] : '{ JOINED }')); ?>:</dt><dd><?php echo (isset($this->_rootref['JOINED'])) ? $this->_rootref['JOINED'] : ''; ?></dd>
				<dt><?php echo ((isset($this->_rootref['L_TOTAL_POSTS'])) ? $this->_rootref['L_TOTAL_POSTS'] : ((isset($user->lang['TOTAL_POSTS'])) ? $user->lang['TOTAL_POSTS'] : '{ TOTAL_POSTS }')); ?>:</dt><dd><?php echo (isset($this->_rootref['POSTS'])) ? $this->_rootref['POSTS'] : ''; ?></dd>
				<dt><?php echo ((isset($this->_rootref['L_WARNINGS'])) ? $this->_rootref['L_WARNINGS'] : ((isset($user->lang['WARNINGS'])) ? $user->lang['WARNINGS'] : '{ WARNINGS }')); ?>: </dt><dd><?php echo (isset($this->_rootref['WARNINGS'])) ? $this->_rootref['WARNINGS'] : ''; ?></dd>
			</dl>
		</div>
	</div>

	<span class="corners-bottom"><span></span></span></div>
</div>

<div class="panel">
	<div class="inner"><span class="corners-top"><span></span></span>

	<h3><?php echo ((isset($this->_rootref['L_ADD_WARNING'])) ? $this->_rootref['L_ADD_WARNING'] : ((isset($user->lang['ADD_WARNING'])) ? $user->lang['ADD_WARNING'] : '{ ADD_WARNING }')); ?></h3>
	<p><?php echo ((isset($this->_rootref['L_ADD_WARNING_EXPLAIN'])) ? $this->_rootref['L_ADD_WARNING_EXPLAIN'] : ((isset($user->lang['ADD_WARNING_EXPLAIN'])) ? $user->lang['ADD_WARNING_EXPLAIN'] : '{ ADD_WARNING_EXPLAIN }')); ?></p>

	<fieldset>
		<textarea name="warning" id="warning" class="inputbox" cols="40" rows="3"></textarea>
		<?php if ($this->_rootref['S_CAN_NOTIFY']) {  ?>

		<br /><br />
		<dl class="panel">
			<dt>&nbsp;</dt>
			<dd><label><input type="checkbox" name="notify_user" checked="checked" /> <?php echo ((isset($this->_rootref['L_NOTIFY_USER_WARN'])) ? $this->_rootref['L_NOTIFY_USER_WARN'] : ((isset($user->lang['NOTIFY_USER_WARN'])) ? $user->lang['NOTIFY_USER_WARN'] : '{ NOTIFY_USER_WARN }')); ?></label></dd>
		</dl>
		<?php } ?>

	</fieldset>

	<span class="corners-bottom"><span></span></span></div>
</div>

<fieldset class="submit-buttons">
	<input type="reset" value="<?php echo ((isset($this->_rootref['L_RESET'])) ? $this->_rootref['L_RESET'] : ((isset($user->lang['RESET'])) ? $user->lang['RESET'] : '{ RESET }')); ?>" name="reset" class="button2" />&nbsp; 
	<input type="submit" name="action[add_warning]" value="<?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?>" class="button1" />
	<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

</fieldset>
</form>

<?php $this->_tpl_include('mcp_footer.html'); ?>