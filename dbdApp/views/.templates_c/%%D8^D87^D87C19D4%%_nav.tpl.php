<?php /* Smarty version 2.6.26a, created on 2011-12-13 17:39:24
         compiled from global/_nav.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dbduri', 'global/_nav.tpl', 3, false),)), $this); ?>
<ul id="nav">
	<li><a href="<?php echo smarty_function_dbduri(array('c' => 'index','a' => 'codes'), $this);?>
" title="Codes">Codes</a></li>
	<li><a href="<?php echo smarty_function_dbduri(array('c' => 'index','a' => 'subscribers'), $this);?>
" title="Subscribers">Subscribers</a></li>
	<li><a href="<?php echo smarty_function_dbduri(array('c' => 'index','a' => 'operators'), $this);?>
" title="Operators">Operators</a></li>
</ul>