{* dbdSmarty *}
<div id="subscriber" class="box">
	<h3>{if $subscriber_id}Edit{else}Add{/if} <span>Subscriber</span></h3>
	<form name="subscriber_form" id="subscriber_form" method="post" action="{dbduri c='index' a='processSubscriber' p="subscriber_id,`$subscriber_id`"}">
		<label for="name">Name</label>
		<input type="text" name="name" id="name" value="{$name}" />

		<label for="phone">Phone</label>
		<input type="text" name="phone" id="phone" value="{$phone}" />

		<input type="checkbox" name="active" id="active" value="1" class="checkbox"{if !$subscriber_id || $active} checked="checked"{/if} />
		<label for="active" class="checkbox">Subscribe to All</label>

		<button name="submit" id="submit">Save</button>
	</form>
</div>