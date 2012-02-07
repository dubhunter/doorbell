{* dbdSmarty *}
{if $access_code_id}
	{assign var="page_title" value="Edit Access Code"}
{else}
	{assign var="page_title" value="Add Access Code"}
{/if}
{include file="global/_pageHeader.tpl"}
{include file="com/codes/_code.tpl"}
{include file="global/_pageFooter.tpl"}