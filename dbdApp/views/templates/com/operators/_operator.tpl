{* dbdSmarty *}
<div id="operator" class="box">
	<h3>{if $operator_id}Edit{else}Add{/if} <span>Operator</span></h3>
	<form name="operator_form" id="operator_form" method="post" action="{dbduri c='index' a='processOperator' p="operator_id,`$operator_id`"}">
		<label for="name">Name</label>
		<input type="text" name="name" id="name" value="{$name}" />

		<label for="phone">Phone</label>
		<input type="text" name="phone" id="phone" value="{$phone}" />

		<input type="checkbox" name="active" id="active" value="1" class="checkbox"{if !$operator_id || $active} checked="checked"{/if} />
		<label for="active" class="checkbox">Active</label>

		<button name="submit" id="submit">Save</button>
	</form>
</div>