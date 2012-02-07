<?php /* Smarty version 2.6.26a, created on 2011-12-14 10:47:44
         compiled from global/_pageHeader.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'global/_pageHeader.tpl', 14, false),)), $this); ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Will Mason" />
<?php if ($this->_tpl_vars['page_keys']): ?>
	<meta name="keywords" content="<?php echo $this->_tpl_vars['page_keys']; ?>
" />
<?php endif; ?>
<?php if ($this->_tpl_vars['page_desc']): ?>
	<meta name="description" content="<?php echo $this->_tpl_vars['page_desc']; ?>
" />
<?php endif; ?>
	<link rel="icon" href="/favicon.ico?v=2" type="image/x-icon" />
	<title><?php echo $this->_tpl_vars['app_name']; ?>
 - <?php echo ((is_array($_tmp=@$this->_tpl_vars['page_title'])) ? $this->_run_mod_handler('default', true, $_tmp, 'Home') : smarty_modifier_default($_tmp, 'Home')); ?>
</title>
</head>
<body>
<div id="pageAll" class="<?php echo ((is_array($_tmp=@$this->_tpl_vars['page_class'])) ? $this->_run_mod_handler('default', true, $_tmp, 'index default') : smarty_modifier_default($_tmp, 'index default')); ?>
">
	<div id="pageHead">
		<h1><a href="/" title="<?php echo $this->_tpl_vars['app_name']; ?>
"><span><?php echo $this->_tpl_vars['app_name']; ?>
</span></a></h1>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "global/_nav.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	</div>
	<div id="pageBody">