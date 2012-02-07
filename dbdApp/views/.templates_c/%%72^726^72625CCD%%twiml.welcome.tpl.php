<?php /* Smarty version 2.6.26a, created on 2011-12-14 12:08:17
         compiled from twiml.welcome.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dbduri', 'twiml.welcome.tpl', 7, false),)), $this); ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="UTF-8" <?php echo '?>'; ?>

<Response>
	<Say voice="woman" language="en-gb">Hello. Welcome to Twilio.</Say>
	<Gather action="<?php echo smarty_function_dbduri(array('c' => 'door','a' => 'validate'), $this);?>
" timeout="10" finishOnKey="*" numDigits="4">
		<Say voice="woman" language="en-gb">Please enter your access code, or press star for the front desk.</Say>
	</Gather>
	<Redirect><?php echo smarty_function_dbduri(array('c' => 'door','a' => 'operator'), $this);?>
</Redirect>
</Response>