<?php /* Smarty version 2.6.26a, created on 2011-12-14 12:08:26
         compiled from twiml.operator.tpl */ ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="UTF-8" <?php echo '?>'; ?>

<Response>
	<Say voice="woman" language="en-gb">Connecting</Say>
	<Dial>
	<?php $_from = $this->_tpl_vars['operators']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['o']):
?>
		<Number><?php echo $this->_tpl_vars['o']; ?>
</Number>
	<?php endforeach; endif; unset($_from); ?>
	</Dial>
</Response>