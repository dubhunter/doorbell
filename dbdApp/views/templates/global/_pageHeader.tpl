{* dbdSmarty *}
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Will Mason" />
{if $page_keys}
	<meta name="keywords" content="{$page_keys}" />
{/if}
{if $page_desc}
	<meta name="description" content="{$page_desc}" />
{/if}
	<link rel="icon" href="/favicon.ico" type="image/x-icon" />
	<title>{$app_name} - {$page_title|default:'Home'}</title>
</head>
<body>
<div id="pageAll" class="{$page_class|default:'index default'}">
	<div id="pageHead">
		<h1><a href="/" title="{$app_name}"><span>{$app_name}</span></a></h1>
		{include file="global/_nav.tpl"}
	</div>
	<div id="pageBody">