<?php /* Smarty version 2.6.26a, created on 2011-12-15 16:20:49
         compiled from com/codes/_code.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'dbduri', 'com/codes/_code.tpl', 4, false),array('modifier', 'date', 'com/codes/_code.tpl', 13, false),)), $this); ?>
<div id="code" class="box">
	<h3><?php if ($this->_tpl_vars['access_code_id']): ?>Edit<?php else: ?>Add<?php endif; ?> <span>Access Code</span></h3>
	<form name="access_code_form" id="access_code_form" method="post" action="<?php echo smarty_function_dbduri(array('c' => 'index','a' => 'processCode','p' => "access_code_id,".($this->_tpl_vars['access_code_id'])), $this);?>
">
		<label for="name">Name</label>
		<input type="text" name="name" id="name" value="<?php echo $this->_tpl_vars['name']; ?>
" />

		<label for="phone">Phone</label>
		<input type="text" name="phone" id="phone" value="<?php echo $this->_tpl_vars['phone']; ?>
" />

		<div class="bound">
			<label for="valid_from_date">Valid From</label>
			<input type="text" name="valid_from_date" id="valid_from_date" class="datepicker" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['valid_from'])) ? $this->_run_mod_handler('date', true, $_tmp, 'm/d/Y') : smarty_modifier_date($_tmp, 'm/d/Y')); ?>
" />
			<select name="valid_from_time_hour" id="valid_from_time_hour" class="time">
			<?php unset($this->_sections['loop']);
$this->_sections['loop']['name'] = 'loop';
$this->_sections['loop']['start'] = (int)1;
$this->_sections['loop']['loop'] = is_array($_loop=13) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['loop']['show'] = true;
$this->_sections['loop']['max'] = $this->_sections['loop']['loop'];
$this->_sections['loop']['step'] = 1;
if ($this->_sections['loop']['start'] < 0)
    $this->_sections['loop']['start'] = max($this->_sections['loop']['step'] > 0 ? 0 : -1, $this->_sections['loop']['loop'] + $this->_sections['loop']['start']);
else
    $this->_sections['loop']['start'] = min($this->_sections['loop']['start'], $this->_sections['loop']['step'] > 0 ? $this->_sections['loop']['loop'] : $this->_sections['loop']['loop']-1);
if ($this->_sections['loop']['show']) {
    $this->_sections['loop']['total'] = min(ceil(($this->_sections['loop']['step'] > 0 ? $this->_sections['loop']['loop'] - $this->_sections['loop']['start'] : $this->_sections['loop']['start']+1)/abs($this->_sections['loop']['step'])), $this->_sections['loop']['max']);
    if ($this->_sections['loop']['total'] == 0)
        $this->_sections['loop']['show'] = false;
} else
    $this->_sections['loop']['total'] = 0;
if ($this->_sections['loop']['show']):

            for ($this->_sections['loop']['index'] = $this->_sections['loop']['start'], $this->_sections['loop']['iteration'] = 1;
                 $this->_sections['loop']['iteration'] <= $this->_sections['loop']['total'];
                 $this->_sections['loop']['index'] += $this->_sections['loop']['step'], $this->_sections['loop']['iteration']++):
$this->_sections['loop']['rownum'] = $this->_sections['loop']['iteration'];
$this->_sections['loop']['index_prev'] = $this->_sections['loop']['index'] - $this->_sections['loop']['step'];
$this->_sections['loop']['index_next'] = $this->_sections['loop']['index'] + $this->_sections['loop']['step'];
$this->_sections['loop']['first']      = ($this->_sections['loop']['iteration'] == 1);
$this->_sections['loop']['last']       = ($this->_sections['loop']['iteration'] == $this->_sections['loop']['total']);
?>
				<option value="<?php echo $this->_sections['loop']['index']; ?>
"<?php if ($this->_sections['loop']['index'] == date ( 'g' , strtotime ( $this->_tpl_vars['valid_from'] ) )): ?> selected="selected"<?php endif; ?>><?php echo $this->_sections['loop']['index']; ?>
</option>
			<?php endfor; endif; ?>
			</select>
			<select name="valid_from_time_minute" id="valid_from_time_minute" class="time">
			<?php unset($this->_sections['loop']);
$this->_sections['loop']['name'] = 'loop';
$this->_sections['loop']['start'] = (int)0;
$this->_sections['loop']['loop'] = is_array($_loop=60) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['loop']['step'] = ((int)5) == 0 ? 1 : (int)5;
$this->_sections['loop']['show'] = true;
$this->_sections['loop']['max'] = $this->_sections['loop']['loop'];
if ($this->_sections['loop']['start'] < 0)
    $this->_sections['loop']['start'] = max($this->_sections['loop']['step'] > 0 ? 0 : -1, $this->_sections['loop']['loop'] + $this->_sections['loop']['start']);
else
    $this->_sections['loop']['start'] = min($this->_sections['loop']['start'], $this->_sections['loop']['step'] > 0 ? $this->_sections['loop']['loop'] : $this->_sections['loop']['loop']-1);
if ($this->_sections['loop']['show']) {
    $this->_sections['loop']['total'] = min(ceil(($this->_sections['loop']['step'] > 0 ? $this->_sections['loop']['loop'] - $this->_sections['loop']['start'] : $this->_sections['loop']['start']+1)/abs($this->_sections['loop']['step'])), $this->_sections['loop']['max']);
    if ($this->_sections['loop']['total'] == 0)
        $this->_sections['loop']['show'] = false;
} else
    $this->_sections['loop']['total'] = 0;
if ($this->_sections['loop']['show']):

            for ($this->_sections['loop']['index'] = $this->_sections['loop']['start'], $this->_sections['loop']['iteration'] = 1;
                 $this->_sections['loop']['iteration'] <= $this->_sections['loop']['total'];
                 $this->_sections['loop']['index'] += $this->_sections['loop']['step'], $this->_sections['loop']['iteration']++):
$this->_sections['loop']['rownum'] = $this->_sections['loop']['iteration'];
$this->_sections['loop']['index_prev'] = $this->_sections['loop']['index'] - $this->_sections['loop']['step'];
$this->_sections['loop']['index_next'] = $this->_sections['loop']['index'] + $this->_sections['loop']['step'];
$this->_sections['loop']['first']      = ($this->_sections['loop']['iteration'] == 1);
$this->_sections['loop']['last']       = ($this->_sections['loop']['iteration'] == $this->_sections['loop']['total']);
?>
				<option value="<?php echo $this->_sections['loop']['index']; ?>
"<?php if ($this->_sections['loop']['index'] == date ( 'i' , strtotime ( $this->_tpl_vars['valid_from'] ) )): ?> selected="selected"<?php endif; ?>><?php if ($this->_sections['loop']['index'] < 10): ?>0<?php endif; ?><?php echo $this->_sections['loop']['index']; ?>
</option>
			<?php endfor; endif; ?>
			</select>
			<select name="valid_from_time_meridian" id="valid_from_time_meridian" class="time">
				<option value="am"<?php if (date ( 'a' , strtotime ( $this->_tpl_vars['valid_from'] ) ) == 'am'): ?> selected="selected"<?php endif; ?>>am</option>
				<option value="pm"<?php if (date ( 'a' , strtotime ( $this->_tpl_vars['valid_from'] ) ) == 'pm'): ?> selected="selected"<?php endif; ?>>pm</option>
			</select>
		</div>

		<div class="bound">
			<label for="valid_to_date">Valid To</label>
			<input type="text" name="valid_to_date" id="valid_to_date" class="datepicker" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['valid_to'])) ? $this->_run_mod_handler('date', true, $_tmp, 'm/d/Y') : smarty_modifier_date($_tmp, 'm/d/Y')); ?>
" />
			<select name="valid_to_time_hour" id="valid_to_time_hour" class="time">
			<?php unset($this->_sections['loop']);
$this->_sections['loop']['name'] = 'loop';
$this->_sections['loop']['start'] = (int)1;
$this->_sections['loop']['loop'] = is_array($_loop=13) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['loop']['show'] = true;
$this->_sections['loop']['max'] = $this->_sections['loop']['loop'];
$this->_sections['loop']['step'] = 1;
if ($this->_sections['loop']['start'] < 0)
    $this->_sections['loop']['start'] = max($this->_sections['loop']['step'] > 0 ? 0 : -1, $this->_sections['loop']['loop'] + $this->_sections['loop']['start']);
else
    $this->_sections['loop']['start'] = min($this->_sections['loop']['start'], $this->_sections['loop']['step'] > 0 ? $this->_sections['loop']['loop'] : $this->_sections['loop']['loop']-1);
if ($this->_sections['loop']['show']) {
    $this->_sections['loop']['total'] = min(ceil(($this->_sections['loop']['step'] > 0 ? $this->_sections['loop']['loop'] - $this->_sections['loop']['start'] : $this->_sections['loop']['start']+1)/abs($this->_sections['loop']['step'])), $this->_sections['loop']['max']);
    if ($this->_sections['loop']['total'] == 0)
        $this->_sections['loop']['show'] = false;
} else
    $this->_sections['loop']['total'] = 0;
if ($this->_sections['loop']['show']):

            for ($this->_sections['loop']['index'] = $this->_sections['loop']['start'], $this->_sections['loop']['iteration'] = 1;
                 $this->_sections['loop']['iteration'] <= $this->_sections['loop']['total'];
                 $this->_sections['loop']['index'] += $this->_sections['loop']['step'], $this->_sections['loop']['iteration']++):
$this->_sections['loop']['rownum'] = $this->_sections['loop']['iteration'];
$this->_sections['loop']['index_prev'] = $this->_sections['loop']['index'] - $this->_sections['loop']['step'];
$this->_sections['loop']['index_next'] = $this->_sections['loop']['index'] + $this->_sections['loop']['step'];
$this->_sections['loop']['first']      = ($this->_sections['loop']['iteration'] == 1);
$this->_sections['loop']['last']       = ($this->_sections['loop']['iteration'] == $this->_sections['loop']['total']);
?>
				<option value="<?php echo $this->_sections['loop']['index']; ?>
"<?php if ($this->_sections['loop']['index'] == date ( 'g' , strtotime ( $this->_tpl_vars['valid_to'] ) )): ?> selected="selected"<?php endif; ?>><?php echo $this->_sections['loop']['index']; ?>
</option>
			<?php endfor; endif; ?>
			</select>
			<select name="valid_to_time_minute" id="valid_to_time_minute" class="time">
			<?php unset($this->_sections['loop']);
$this->_sections['loop']['name'] = 'loop';
$this->_sections['loop']['start'] = (int)0;
$this->_sections['loop']['loop'] = is_array($_loop=60) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['loop']['step'] = ((int)5) == 0 ? 1 : (int)5;
$this->_sections['loop']['show'] = true;
$this->_sections['loop']['max'] = $this->_sections['loop']['loop'];
if ($this->_sections['loop']['start'] < 0)
    $this->_sections['loop']['start'] = max($this->_sections['loop']['step'] > 0 ? 0 : -1, $this->_sections['loop']['loop'] + $this->_sections['loop']['start']);
else
    $this->_sections['loop']['start'] = min($this->_sections['loop']['start'], $this->_sections['loop']['step'] > 0 ? $this->_sections['loop']['loop'] : $this->_sections['loop']['loop']-1);
if ($this->_sections['loop']['show']) {
    $this->_sections['loop']['total'] = min(ceil(($this->_sections['loop']['step'] > 0 ? $this->_sections['loop']['loop'] - $this->_sections['loop']['start'] : $this->_sections['loop']['start']+1)/abs($this->_sections['loop']['step'])), $this->_sections['loop']['max']);
    if ($this->_sections['loop']['total'] == 0)
        $this->_sections['loop']['show'] = false;
} else
    $this->_sections['loop']['total'] = 0;
if ($this->_sections['loop']['show']):

            for ($this->_sections['loop']['index'] = $this->_sections['loop']['start'], $this->_sections['loop']['iteration'] = 1;
                 $this->_sections['loop']['iteration'] <= $this->_sections['loop']['total'];
                 $this->_sections['loop']['index'] += $this->_sections['loop']['step'], $this->_sections['loop']['iteration']++):
$this->_sections['loop']['rownum'] = $this->_sections['loop']['iteration'];
$this->_sections['loop']['index_prev'] = $this->_sections['loop']['index'] - $this->_sections['loop']['step'];
$this->_sections['loop']['index_next'] = $this->_sections['loop']['index'] + $this->_sections['loop']['step'];
$this->_sections['loop']['first']      = ($this->_sections['loop']['iteration'] == 1);
$this->_sections['loop']['last']       = ($this->_sections['loop']['iteration'] == $this->_sections['loop']['total']);
?>
				<option value="<?php echo $this->_sections['loop']['index']; ?>
"<?php if ($this->_sections['loop']['index'] == date ( 'i' , strtotime ( $this->_tpl_vars['valid_to'] ) )): ?> selected="selected"<?php endif; ?>><?php if ($this->_sections['loop']['index'] < 10): ?>0<?php endif; ?><?php echo $this->_sections['loop']['index']; ?>
</option>
			<?php endfor; endif; ?>
			</select>
			<select name="valid_to_time_meridian" id="valid_to_time_meridian" class="time">
				<option value="am"<?php if (date ( 'a' , strtotime ( $this->_tpl_vars['valid_to'] ) ) == 'am'): ?> selected="selected"<?php endif; ?>>am</option>
				<option value="pm"<?php if (date ( 'a' , strtotime ( $this->_tpl_vars['valid_to'] ) ) == 'pm'): ?> selected="selected"<?php endif; ?>>pm</option>
			</select>
		</div>

		<label for="subscriber_ids">Subscribers</label>
		<select name="subscriber_ids[]" id="subscriber_ids" multiple="multiple">
		<?php $_from = $this->_tpl_vars['subscribers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['s']):
?>
			<option value="<?php echo $this->_tpl_vars['s']['subscriber_id']; ?>
"<?php if (is_array ( $this->_tpl_vars['subscriber_ids'] ) && in_array ( $this->_tpl_vars['s']['subscriber_id'] , $this->_tpl_vars['subscriber_ids'] )): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['s']['name']; ?>
<?php if ($this->_tpl_vars['s']['active']): ?> (all)<?php endif; ?></option>
		<?php endforeach; endif; unset($_from); ?>
		</select>

		<button name="submit" id="submit">Save</button>
	</form>
</div>