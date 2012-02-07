{* dbdSmart *}
<?xml version="1.0" encoding="UTF-8" ?>
<Response>
	<Say voice="woman" language="en-gb">Hello. Welcome to Twilio.</Say>
	<Gather action="{dbduri c='door' a='validate'}" timeout="10" finishOnKey="*" numDigits="4">
		<Say voice="woman" language="en-gb">Please enter your access code, or press star for the front desk.</Say>
	</Gather>
	<Redirect>{dbduri c='door' a='operator'}</Redirect>
</Response>