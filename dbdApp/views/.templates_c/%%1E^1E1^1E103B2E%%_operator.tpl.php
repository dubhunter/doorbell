<?php /* Smarty version 2.6.26a, created on 2011-12-14 18:10:19
         compiled from com/operators/_operator.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dbduri', 'com/operators/_operator.tpl', 4, false),)), $this); ?>
<div id="operator" class="box">
	<h3><?php if ($this->_tpl_vars['operator_id']): ?>Edit<?php else: ?>Add<?php endif; ?> <span>Operator</span></h3>
	<form name="operator_form" id="operator_form" method="post" action="<?php echo smarty_function_dbduri(array('c' => 'index','a' => 'processOperator','p' => "operator_id,".($this->_tpl_vars['operator_id'])), $this);?>
">
		<label for="name">Name</label>
		<input type="text" name="name" id="name" value="<?php echo $this->_tpl_vars['name']; ?>
" />

		<label for="phone">Phone</label>
		<input type="text" name="phone" id="phone" value="<?php echo $this->_tpl_vars['phone']; ?>
" />

		<input type="checkbox" name="active" id="active" value="1" class="checkbox"<?php if (! $this->_tpl_vars['operator_id'] || $this->_tpl_vars['active']): ?> checked="checked"<?php endif; ?> />
		<label for="active" class="checkbox">Active</label>

		<button name="submit" id="submit">Save</button>
	</form>
</div>