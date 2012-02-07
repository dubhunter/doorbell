{* dbdSmarty *}
<div id="operators" class="box">
	<h3>Operators - <a href="{dbduri c='index' a='operator'}" title="Add Operator">Add+</a></h3>
	<table>
		<tr>
			<th>Name</th>
			<th>Phone</th>
			<th>Active</th>
			<th>&nbsp;</th>
		</tr>
	{foreach from=$operators item=o}
		<tr>
			<td>{$o.name}</td>
			<td>{$o.phone}</td>
			<td>{if $o.active}Yes{else}No{/if}</td>
			<td><a href="{dbduri c='index' a='operator' p="operator_id,`$o.operator_id`"}" title="Edit Operator">Edit</a> - <a href="{dbduri c='index' a='deleteOperator' p="operator_id,`$o.operator_id`"}" title="Delete Operator">Delete</a></td>
		</tr>
	{/foreach}
	</table>
</div>