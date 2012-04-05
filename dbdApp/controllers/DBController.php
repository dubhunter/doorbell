<?php
class DBController extends dbdController
{
	const TWILIO_ACCOUNT_SID = 'ACf7d694e6baef4b6aa83aa97c3f626163';
	const TWILIO_AUTH_TOKEN = '37d322d2ab10aee0895e0b62c97d2422';
	const TWILIO_VERSION = '2010-04-01';
//	const TWILIO_NUMBER = '415-503-9966';
//	const TWILIO_NUMBER = '415-777-9303';
	const TWILIO_NUMBER = '415-754-3938';

	private $twilio_api = null;

	protected function init()
	{
		$this->view->addCss('doorbell.css');
		$this->view->addJs('doorbell.js');
		header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
	}

	protected function e(dbdException $e)
	{
		$errors = array();
		if ($e instanceof dbdHoldableException)
		{
			foreach ($e->getHeld() as $he)
			{
				$this->response_code = $he->getCode();
				$errors[] = $he->getMessage();
			}
		}
		if (empty($errors))
		{
			$this->response_code = $e->getCode();
			$errors[] = $e->getMessage();
		}
		$this->view->assign("errors", $errors);
	}

	protected function setErrorHeader()
	{
		if ($this->response_code >= 400 && $this->response_code < 500)
		{
			header("HTTP/1.1 ".$this->response_code." ".DBException::g($this->response_code));
			exit(0);
		}
	}

	protected function validateTwilioRequest()
	{
		$str = $this->getURL(false, true);
		if (strlen(dbdMVC::getRequest()->getServer('QUERY_STRING')))
			$str .= '?'.dbdMVC::getRequest()->getServer('QUERY_STRING');
		if ($this->getRequestMethod() == 'POST')
		{
			$data = dbdMVC::getRequest()->getPost();
			ksort($data);
			foreach ($data as $k => $v)
				$str .= $k.$v;
		}
		$str = base64_encode(hash_hmac("sha1", $str, self::TWILIO_AUTH_TOKEN, true));
		return $str == dbdMVC::getRequest()->getHeader('X-Twilio-Signature');
	}

	protected function ensureTwilio()
	{
		try
		{
			DBException::ensure($this->validateTwilioRequest(), DBException::FORBIDDEN);
		}
		catch (DBException $e)
		{
			$this->e($e);
			$this->setErrorHeader();
		}
	}

	/**
	 * @return TwilioRestClient
	 */
	protected function getTwilioAPI()
	{
		if ($this->twilio_api === null)
			$this->twilio_api = new TwilioRestClient(self::TWILIO_ACCOUNT_SID, self::TWILIO_AUTH_TOKEN);
		return $this->twilio_api;
	}

	protected function sendSMS($to, $body)
	{
		$TRC = $this->getTwilioAPI();
		$sms = array(
			'From' => self::TWILIO_NUMBER,
			'To' => $to,
			'Body' => $body
		);
		$response = $TRC->request('/'.self::TWILIO_VERSION.'/Accounts/'.self::TWILIO_ACCOUNT_SID.'/SMS/Messages', 'POST', $sms);
		return $response;
	}
}
?>
