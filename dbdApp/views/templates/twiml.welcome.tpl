{* dbdSmarty *}
<?xml version="1.0" encoding="UTF-8" ?>
<Response>
	<Gather action="{dbduri c='door' a='validate'}" timeout="10" finishOnKey="*" numDigits="4">
		<Say voice="alice" language="en-gb">Hello. Welcome to the Mason residence. Please enter your access code, or press star to ring Will and Christine.</Say>
	</Gather>
	<Redirect>{dbduri c='door' a='operator'}</Redirect>
</Response>