<?php /* Smarty version 2.6.26a, created on 2011-12-13 18:02:46
         compiled from com/codes/_codes.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dbduri', 'com/codes/_codes.tpl', 3, false),array('modifier', 'date', 'com/codes/_codes.tpl', 19, false),)), $this); ?>
<div id="codes" class="box">
	<h3>Access <span>Codes</span> - <a href="<?php echo smarty_function_dbduri(array('c' => 'index','a' => 'code'), $this);?>
" title="Add Access Code">Add+</a></h3>

	<table>
		<tr>
			<th>Name</th>
			<th>Phone</th>
			<th>Code</th>
			<th>Valid From</th>
			<th>Valid To</th>
			<th>&nbsp;</th>
		</tr>
	<?php $_from = $this->_tpl_vars['codes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['c']):
?>
		<tr>
			<td><?php echo $this->_tpl_vars['c']['name']; ?>
</td>
			<td><?php echo $this->_tpl_vars['c']['phone']; ?>
</td>
			<td><?php echo $this->_tpl_vars['c']['code']; ?>
</td>
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['c']['valid_from'])) ? $this->_run_mod_handler('date', true, $_tmp, 'm/d/Y h:ia') : smarty_modifier_date($_tmp, 'm/d/Y h:ia')); ?>
</td>
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['c']['valid_to'])) ? $this->_run_mod_handler('date', true, $_tmp, 'm/d/Y h:ia') : smarty_modifier_date($_tmp, 'm/d/Y h:ia')); ?>
</td>
			<td><a href="<?php echo smarty_function_dbduri(array('c' => 'index','a' => 'code','p' => "access_code_id,".($this->_tpl_vars['c']['access_code_id'])), $this);?>
" title="Edit Access Code">Edit</a> - <a href="<?php echo smarty_function_dbduri(array('c' => 'index','a' => 'deleteCode','p' => "access_code_id,".($this->_tpl_vars['c']['access_code_id'])), $this);?>
" title="Delete Access Code">Delete</a></td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
	</table>
</div>