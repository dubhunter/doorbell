<?php /* Smarty version 2.6.26a, created on 2011-12-14 18:12:10
         compiled from com/subscribers/_subscriber.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dbduri', 'com/subscribers/_subscriber.tpl', 4, false),)), $this); ?>
<div id="subscriber" class="box">
	<h3><?php if ($this->_tpl_vars['subscriber_id']): ?>Edit<?php else: ?>Add<?php endif; ?> <span>Subscriber</span></h3>
	<form name="subscriber_form" id="subscriber_form" method="post" action="<?php echo smarty_function_dbduri(array('c' => 'index','a' => 'processSubscriber','p' => "subscriber_id,".($this->_tpl_vars['subscriber_id'])), $this);?>
">
		<label for="name">Name</label>
		<input type="text" name="name" id="name" value="<?php echo $this->_tpl_vars['name']; ?>
" />

		<label for="phone">Phone</label>
		<input type="text" name="phone" id="phone" value="<?php echo $this->_tpl_vars['phone']; ?>
" />

		<input type="checkbox" name="active" id="active" value="1" class="checkbox"<?php if (! $this->_tpl_vars['subscriber_id'] || $this->_tpl_vars['active']): ?> checked="checked"<?php endif; ?> />
		<label for="active" class="checkbox">Subscribe to All</label>

		<button name="submit" id="submit">Save</button>
	</form>
</div>