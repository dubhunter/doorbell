<?php /* Smarty version 2.6.26a, created on 2011-12-13 18:02:34
         compiled from com/home/_log.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dbduri', 'com/home/_log.tpl', 3, false),array('modifier', 'date', 'com/home/_log.tpl', 16, false),)), $this); ?>
<div id="log" class="box">
	<h3>Access <span>Log</span> - <a href="<?php echo smarty_function_dbduri(array('c' => 'index','a' => 'code'), $this);?>
" title="Add Access Code">Add Code+</a></h3>
	<table>
		<tr>
			<th>Name</th>
			<th>Phone</th>
			<th>Code</th>
			<th>Date</th>
		</tr>
	<?php $_from = $this->_tpl_vars['logs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['l']):
?>
		<tr>
			<td><?php echo $this->_tpl_vars['l']['access_code']['name']; ?>
</td>
			<td><?php echo $this->_tpl_vars['l']['access_code']['phone']; ?>
</td>
			<td><?php echo $this->_tpl_vars['l']['access_code']['code']; ?>
</td>
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['l']['date'])) ? $this->_run_mod_handler('date', true, $_tmp, 'D M jS Y g:ia') : smarty_modifier_date($_tmp, 'D M jS Y g:ia')); ?>
</td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
	</table>
</div>