{* dbdSmart *}
<?xml version="1.0" encoding="UTF-8" ?>
<Response>
	<Say voice="woman" language="en-gb">Connecting</Say>
	<Dial>
	{foreach from=$operators item=o}
		<Number>{$o}</Number>
	{/foreach}
	</Dial>
</Response>