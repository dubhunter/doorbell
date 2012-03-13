<?php
class Codes extends DMController
{
	public function doDefault()
	{
		$codes = array();
		foreach (AccessCode::getAll() as $AC)
			$codes[] = $AC->getData();
		$this->view->assign('codes', $codes);
		$this->setTemplate('codes.tpl');
	}

	public function doEdit()
	{
		if ($this->getParam('access_code_id'))
		{
			$AC = new AccessCode($this->getParam('access_code_id'));
			$this->view->assign($AC->getData());
		}
		$subscribers = array();
		foreach (Subscriber::getAll() as $S)
			$subscribers[] = $S->getData();
		$this->view->assign('subscribers', $subscribers);
		$this->setTemplate('code.tpl');
	}

	public function doProcess()
	{
		try
		{
			$AC = new AccessCode($this->getParam('access_code_id'));
			$AC->save($this->getParams());
			if (!$this->getParam('access_code_id'))
				$this->sendSMS($AC->getPhone(), "Your Twilio front door access code: ".$AC->getCode());
			$this->forward(dbdURI::create('codes'));
		}
		catch (DMException $e)
		{
			$this->e($e);
			$this->assignAllParams();
			$this->setTemplate('code.tpl');
		}
	}

	public function doDelete()
	{
		try
		{
			$AC = new AccessCode($this->getParam('access_code_id'));
			$AC->delete();
			$this->forward(dbdURI::create('codes'));
		}
		catch (DMException $e)
		{
			$this->e($e);
			$this->assignAllParams();
			$this->setTemplate('code.tpl');
		}
	}
}
?>
