<?php
class DBController extends dbdController {

	const TWILIO_CREDENTIALS = 'constant/twilio.inc';

	/**
	 * @var null|TwilioRestClient
	 */
	protected static $twilio_client = null;

	protected function init() {
		$this->view->addCss('doorbell.css');
		$this->view->addJs('doorbell.js');
		header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
	}

	protected function e(dbdException $e) {
		$errors = array();
		if ($e instanceof dbdHoldableException) {
			foreach ($e->getHeld() as $he) {
				$this->response_code = $he->getCode();
				$errors[] = $he->getMessage();
			}
		}
		if (empty($errors)) {
			$this->response_code = $e->getCode();
			$errors[] = $e->getMessage();
		}
		$this->view->assign('errors', $errors);
	}

	protected function setErrorHeader() {
		if ($this->response_code >= 400 && $this->response_code < 500) {
			header('HTTP/1.1 ' . $this->response_code . ' ' . DBException::g($this->response_code));
			exit(0);
		}
	}

	protected function validateTwilioRequest() {
		$str = $this->getURL(false, true);
		if (strlen(dbdMVC::getRequest()->getServer('QUERY_STRING')))
			$str .= '?' . dbdMVC::getRequest()->getServer('QUERY_STRING');
		if ($this->getRequestMethod() == 'POST') {
			$data = dbdMVC::getRequest()->getPost();
			ksort($data);
			foreach ($data as $k => $v)
				$str .= $k . $v;
		}
		$str = base64_encode(hash_hmac("sha1", $str, self::TWILIO_AUTH_TOKEN, true));
		return $str == dbdMVC::getRequest()->getHeader('X-Twilio-Signature');
	}

	protected function ensureTwilio() {
		try {
			DBException::ensure($this->validateTwilioRequest(), DBException::FORBIDDEN);
		} catch (DBException $e) {
			$this->e($e);
			$this->setErrorHeader();
		}
	}

	/**
	 * @throws dbdException
	 * @return TwilioRestClient
	 */
	protected static function getTwilioClient() {
		if (self::$twilio_client === null) {
			// if we don't have the creds, try to load them
			if (!(defined('TWILIO_ACCOUNT_SID') && defined('TWILIO_AUTH_TOKEN'))) {
				dbdLoader::load(self::TWILIO_CREDENTIALS);
				// if we still don't have 'em, throw
				if (!(defined('TWILIO_ACCOUNT_SID') && defined('TWILIO_AUTH_TOKEN'))) {
					throw new dbdException('Twilio credentials file could not be included. PATH=' . self::TWILIO_CREDENTIALS);
				}
			}
			static::$twilio_client = new TwilioRestClient(TWILIO_ACCOUNT_SID, TWILIO_AUTH_TOKEN);
		}
		return static::$twilio_client;
	}

	protected function sendSMS($to, $body) {
		$TRC = $this->getTwilioClient();
		$sms = array(
			'From' => TWILIO_NUMBER,
			'To' => $to,
			'Body' => $body,
		);
		$response = $TRC->request('/' . TWILIO_VERSION . '/Accounts/' . TWILIO_ACCOUNT_SID . '/SMS/Messages', 'POST', $sms);
		return $response;
	}
}

?>
