{* dbdSmarty *}
<div id="subscribers" class="box">
	<h3>Subscribers - <a href="{dbduri r=$page_url a='edit'}" title="Add Subscriber">Add+</a></h3>
	<table>
		<tr>
			<th>Name</th>
			<th>Phone</th>
			<th>Subscribe to All</th>
			<th>&nbsp;</th>
		</tr>
	{foreach from=$subscribers item=s}
		<tr>
			<td>{$s.name}</td>
			<td>{$s.phone}</td>
			<td>{if $s.active}Yes{else}No{/if}</td>
			<td><a href="{dbduri r=$page_url a='edit' p="subscriber_id,`$s.subscriber_id`"}" title="Edit Subscriber">Edit</a> - <a href="{dbduri r=$page_url a='delete' p="subscriber_id,`$s.subscriber_id`"}" title="Delete Subscriber">Delete</a></td>
		</tr>
	{/foreach}
	</table>
</div>