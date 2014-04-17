{* dbdSmarty *}
<div id="log" class="box">
	<h3>Access <span>Log</span> - <a href="{dbduri c='codes' a='edit'}" title="Add Access Code">Add Code+</a></h3>
	<h4>Here is the list of everyone who has entered the front door (up to 50). Click <strong>Add +</strong> to create a new one.</h4>
	<table>
		<tr>
			<th>Name</th>
			<th>Phone</th>
			<th>Code</th>
			<th>Date</th>
		</tr>
	{foreach from=$logs item=l}
		<tr>
			<td>{$l.access_code.name}</td>
			<td>{$l.access_code.phone}</td>
			<td>{$l.access_code.code}</td>
			<td>{$l.date|date:'D M jS Y g:ia'}</td>
		</tr>
	{/foreach}
	</table>
</div>