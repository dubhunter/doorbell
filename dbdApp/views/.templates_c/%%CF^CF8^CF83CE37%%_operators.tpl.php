<?php /* Smarty version 2.6.26a, created on 2011-12-14 13:57:10
         compiled from com/operators/_operators.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dbduri', 'com/operators/_operators.tpl', 3, false),)), $this); ?>
<div id="operators" class="box">
	<h3>Operators - <a href="<?php echo smarty_function_dbduri(array('c' => 'index','a' => 'operator'), $this);?>
" title="Add Operator">Add+</a></h3>
	<table>
		<tr>
			<th>Name</th>
			<th>Phone</th>
			<th>Active</th>
			<th>&nbsp;</th>
		</tr>
	<?php $_from = $this->_tpl_vars['operators']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['o']):
?>
		<tr>
			<td><?php echo $this->_tpl_vars['o']['name']; ?>
</td>
			<td><?php echo $this->_tpl_vars['o']['phone']; ?>
</td>
			<td><?php if ($this->_tpl_vars['o']['active']): ?>Yes<?php else: ?>No<?php endif; ?></td>
			<td><a href="<?php echo smarty_function_dbduri(array('c' => 'index','a' => 'operator','p' => "operator_id,".($this->_tpl_vars['o']['operator_id'])), $this);?>
" title="Edit Operator">Edit</a> - <a href="<?php echo smarty_function_dbduri(array('c' => 'index','a' => 'deleteOperator','p' => "operator_id,".($this->_tpl_vars['o']['operator_id'])), $this);?>
" title="Delete Operator">Delete</a></td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
	</table>
</div>