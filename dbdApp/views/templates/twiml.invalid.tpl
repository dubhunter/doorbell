{* dbdSmarty *}
<?xml version="1.0" encoding="UTF-8" ?>
<Response>
	<Say voice="alice" language="en-gb">I'm sorry, but your access code is not valid.</Say>
	<Gather action="{dbduri c='door' a='validate'}" timeout="10" finishOnKey="*" numDigits="4">
		<Say voice="alice" language="en-gb">You may try again, or press star for the Masons.</Say>
	</Gather>
	<Redirect>{dbduri c='door' a='operator'}</Redirect>
</Response>