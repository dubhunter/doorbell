{* dbdSmarty *}
<?xml version="1.0" encoding="UTF-8" ?>
<Response>
	<Say voice="alice" language="en-gb">Connecting</Say>
	<Dial>
	{foreach from=$operators item=o}
		<Number>{$o}</Number>
	{/foreach}
	</Dial>
</Response>