{* dbdSmarty *}
{if $operator_id}
	{assign var="page_title" value="Edit Operator"}
{else}
	{assign var="page_title" value="Add Operator"}
{/if}
{include file="global/_pageHeader.tpl"}
{include file="com/operators/_operator.tpl"}
{include file="global/_pageFooter.tpl"}