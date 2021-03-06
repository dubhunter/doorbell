<?php

class Codes extends DBController {
	public function doDefault() {
		$codes = array();
		foreach (AccessCode::getAll() as $AC) {
			$codes[] = $AC->getData();
		}
		$this->view->assign('codes', $codes);
		$this->setTemplate('codes.tpl');
	}

	public function doEdit() {
		if ($this->getParam('access_code_id')) {
			$AC = new AccessCode($this->getParam('access_code_id'));
			$this->view->assign($AC->getData());
		}
		$subscribers = array();
		foreach (Subscriber::getAll() as $S) {
			$subscribers[] = $S->getData();
		}
		$this->view->assign('subscribers', $subscribers);
		$this->setTemplate('code.tpl');
	}

	public function doProcess() {
		try {
			$AC = new AccessCode($this->getParam('access_code_id'));
			$oldPhone = $AC->getPhone();
			$AC->save($this->getParams());
			if ($AC->getPhone() != $oldPhone || $this->getParam('resend')) {
				$this->sendSMS($AC->getPhone(), "Your front door access code for Will & Christine's building is " . $AC->getCode() . ". When you arrive, please dial 033 at the call box and follow the prompts.");
			}
			$this->forward(dbdURI::create('codes'));
		} catch (DBException $e) {
			$this->e($e);
			$this->assignAllParams();
			$this->setTemplate('code.tpl');
		}
	}

	public function doDelete() {
		try {
			$AC = new AccessCode($this->getParam('access_code_id'));
			$AC->delete();
			$this->forward(dbdURI::create('codes'));
		} catch (DBException $e) {
			$this->e($e);
			$this->assignAllParams();
			$this->setTemplate('code.tpl');
		}
	}
}

