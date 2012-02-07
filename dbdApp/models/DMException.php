<?php
class DMException extends dbdHoldableException
{
	const BAD_REQUEST = 400;
	const UNAUTHORIZED = 401;
	const FORBIDDEN = 403;
	const NOT_FOUND = 404;
	const METHOD_NOT_ALLOWED = 405;

	const REQ_NAME = 1001;
	const REQ_PHONE = 1002;

	private static $msgs = array();

	public function __construct($code = 0)
	{
		parent::__construct(self::g($code), $code);
	}

	public static function setMsgArray($msgs)
	{
		self::$msgs = is_array($msgs) ? $msgs : array();
	}

	public static function g($code)
	{
		$key = "error".$code;
		return key_exists($key, self::$msgs) ? self::$msgs[$key] : get_class().": Message for code ".$code." could not be found.";
	}

	public static function ensure($expr, $code)
	{
		if (!$expr)
			self::intercept(new self($code));
	}
}
?>
