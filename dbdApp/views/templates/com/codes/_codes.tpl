{* dbdSmarty *}
<div id="codes" class="box">
	<h3>Access <span>Codes</span> - <a href="{dbduri c='codes' a='edit'}" title="Add Access Code">Add+</a></h3>
	<h4>Note: Access codes are only valid during the time specified.</h4>
	<table>
		<tr>
			<th>Name</th>
			<th>Phone</th>
			<th>Code</th>
			<th>Valid From</th>
			<th>Valid To</th>
			<th>&nbsp;</th>
		</tr>
	{foreach from=$codes item=c}
		<tr>
			<td>{$c.name}</td>
			<td>{$c.phone}</td>
			<td>{$c.code}</td>
			<td>{$c.valid_from|date:'m/d/Y h:ia'}</td>
			<td>{$c.valid_to|date:'m/d/Y h:ia'}</td>
			<td><a href="{dbduri r=$page_url a='edit' p="access_code_id,`$c.access_code_id`"}" title="Edit Access Code">Edit</a> - <a href="{dbduri r=$page_url a='delete' p="access_code_id,`$c.access_code_id`"}" title="Delete Access Code">Delete</a></td>
		</tr>
	{/foreach}
	</table>
</div>