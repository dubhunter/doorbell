{* dbdSmarty *}
<div id="log" class="box">
	<h3>Access <span>Log</span> - <a href="{dbduri c='index' a='code'}" title="Add Access Code">Add Code+</a></h3>
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