<?php /* Smarty version 2.6.26a, created on 2011-12-14 13:57:07
         compiled from com/subscribers/_subscribers.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dbduri', 'com/subscribers/_subscribers.tpl', 3, false),)), $this); ?>
<div id="subscribers" class="box">
	<h3>Subscribers - <a href="<?php echo smarty_function_dbduri(array('c' => 'index','a' => 'subscriber'), $this);?>
" title="Add Subscriber">Add+</a></h3>
	<table>
		<tr>
			<th>Name</th>
			<th>Phone</th>
			<th>Subscribe to All</th>
			<th>&nbsp;</th>
		</tr>
	<?php $_from = $this->_tpl_vars['subscribers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['s']):
?>
		<tr>
			<td><?php echo $this->_tpl_vars['s']['name']; ?>
</td>
			<td><?php echo $this->_tpl_vars['s']['phone']; ?>
</td>
			<td><?php if ($this->_tpl_vars['s']['active']): ?>Yes<?php else: ?>No<?php endif; ?></td>
			<td><a href="<?php echo smarty_function_dbduri(array('c' => 'index','a' => 'subscriber','p' => "subscriber_id,".($this->_tpl_vars['s']['subscriber_id'])), $this);?>
" title="Edit Subscriber">Edit</a> - <a href="<?php echo smarty_function_dbduri(array('c' => 'index','a' => 'deleteSubscriber','p' => "subscriber_id,".($this->_tpl_vars['s']['subscriber_id'])), $this);?>
" title="Delete Subscriber">Delete</a></td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
	</table>
</div>