{* dbdSmarty *}
{if $subscriber_id}
	{assign var="page_title" value="Edit Subscriber"}
{else}
	{assign var="page_title" value="Add Subscriber"}
{/if}
{include file="global/_pageHeader.tpl"}
{include file="com/subscribers/_subscriber.tpl"}
{include file="global/_pageFooter.tpl"}