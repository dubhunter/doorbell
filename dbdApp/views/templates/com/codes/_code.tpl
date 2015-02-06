{* dbdSmarty *}
<div id="code" class="box">
	<h3>{if $access_code_id}Edit{else}Add{/if} <span>Access Code</span></h3>
	<form name="access_code_form" id="access_code_form" method="post" action="{dbduri r=$page_url a='process' p="access_code_id,`$access_code_id`"}">
		<label for="name">Name</label>
		<input type="text" name="name" id="name" value="{$name}" />

		<label for="phone">Phone</label>
		<input type="text" name="phone" id="phone" value="{$phone}" />

		<div class="bound">
			<label for="valid_from_date">Valid From</label>
			<input type="text" name="valid_from_date" id="valid_from_date" class="datepicker" value="{$valid_from|date:'m/d/Y'}" />
			<select name="valid_from_time_hour" id="valid_from_time_hour" class="time">
			{section name=loop start=1 loop=13}
				<option value="{$smarty.section.loop.index}"{if $smarty.section.loop.index == date('g', strtotime($valid_from))} selected="selected"{/if}>{$smarty.section.loop.index}</option>
			{/section}
			</select>
			<select name="valid_from_time_minute" id="valid_from_time_minute" class="time">
			{section name=loop start=0 loop=60 step=5}
				<option value="{$smarty.section.loop.index}"{if $smarty.section.loop.index == date('i', strtotime($valid_from))} selected="selected"{/if}>{if $smarty.section.loop.index < 10}0{/if}{$smarty.section.loop.index}</option>
			{/section}
			</select>
			<select name="valid_from_time_meridian" id="valid_from_time_meridian" class="time">
				<option value="am"{if date('a', strtotime($valid_from)) == 'am'} selected="selected"{/if}>am</option>
				<option value="pm"{if date('a', strtotime($valid_from)) == 'pm'} selected="selected"{/if}>pm</option>
			</select>
		</div>

		<div class="bound">
			<label for="valid_to_date">Valid To</label>
			<input type="text" name="valid_to_date" id="valid_to_date" class="datepicker" value="{$valid_to|date:'m/d/Y'}" />
			<select name="valid_to_time_hour" id="valid_to_time_hour" class="time">
			{section name=loop start=1 loop=13}
				<option value="{$smarty.section.loop.index}"{if $smarty.section.loop.index == date('g', strtotime($valid_to))} selected="selected"{/if}>{$smarty.section.loop.index}</option>
			{/section}
			</select>
			<select name="valid_to_time_minute" id="valid_to_time_minute" class="time">
			{section name=loop start=0 loop=60 step=5}
				<option value="{$smarty.section.loop.index}"{if $smarty.section.loop.index == date('i', strtotime($valid_to))} selected="selected"{/if}>{if $smarty.section.loop.index < 10}0{/if}{$smarty.section.loop.index}</option>
			{/section}
			</select>
			<select name="valid_to_time_meridian" id="valid_to_time_meridian" class="time">
				<option value="am"{if date('a', strtotime($valid_to)) == 'am'} selected="selected"{/if}>am</option>
				<option value="pm"{if date('a', strtotime($valid_to)) == 'pm'} selected="selected"{/if}>pm</option>
			</select>
		</div>

		<label for="code">Code (optional)</label>
		<input type="text" name="code" id="code" value="{$code}"{if $access_code_id} disabled{/if} />

		<label for="subscriber_ids">Subscribers</label>
		<select name="subscriber_ids[]" id="subscriber_ids" multiple="multiple">
		{foreach from=$subscribers item=s}
			<option value="{$s.subscriber_id}"{if is_array($subscriber_ids) && in_array($s.subscriber_id, $subscriber_ids)} selected="selected"{/if}>{$s.name}{if $s.active} (all){/if}</option>
		{/foreach}
		</select>

		<label><input type="checkbox" name="skip_directions" id="skip_directions" value="true" class="checkbox"{if $skip_directions} checked="checked"{/if} /> Skip Unit Directions</label>

	{if $access_code_id}
		<label><input type="checkbox" name="resend" id="resend" value="true" class="checkbox" /> Resend Instructions</label>
	{/if}

		<button name="submit" id="submit">Save</button>
	</form>
</div>