<?php /* Smarty version 2.6.26a, created on 2011-12-14 18:33:56
         compiled from error.tpl */ ?>
<?php $this->assign('page_title', ($this->_tpl_vars['code'])." - ".($this->_tpl_vars['name'])); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "global/_pageHeader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div id="errorDiv">
		<h2><?php echo $this->_tpl_vars['code']; ?>
 - <?php echo $this->_tpl_vars['name']; ?>
</h2>
		<h4><?php echo $this->_tpl_vars['msg']; ?>
</h4>
	</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "global/_pageFooter.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>