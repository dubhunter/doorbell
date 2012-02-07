<?php
class Index extends DMController
{
	public function doDefault()
	{
		$logs = array();
		foreach (AccessLog::getAll() as $AL)
			$logs[] = $AL->getData();
		$this->view->assign('logs', $logs);
		$this->setTemplate('index.tpl');
	}

	public function doCode()
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

	public function doCodes()
	{
		$codes = array();
		foreach (AccessCode::getAll() as $AC)
			$codes[] = $AC->getData();
		$this->view->assign('codes', $codes);
		$this->setTemplate('codes.tpl');
	}

	public function doProcessCode()
	{
		try
		{
			$AC = new AccessCode($this->getParam('access_code_id'));
			$AC->save($this->getParams());
			if (!$this->getParam('access_code_id'))
				$this->sendSMS($AC->getPhone(), "Your Twilio front door access code: ".$AC->getCode());
			$this->forward(dbdURI::create('index', 'codes'));
		}
		catch (DMException $e)
		{
			$this->e($e);
			$this->assignAllParams();
			$this->setTemplate('code.tpl');
		}
	}

	public function doDeleteCode()
	{
		try
		{
			$AC = new AccessCode($this->getParam('access_code_id'));
			$AC->delete();
			$this->forward(dbdURI::create('index', 'codes'));
		}
		catch (DMException $e)
		{
			$this->e($e);
			$this->assignAllParams();
			$this->setTemplate('code.tpl');
		}
	}

	public function doOperator()
	{
		if ($this->getParam('operator_id'))
		{
			$O = new Operator($this->getParam('operator_id'));
			$this->view->assign($O->getData());
		}
		$this->setTemplate('operator.tpl');
	}

	public function doOperators()
	{
		$operators = array();
		foreach (Operator::getAll() as $O)
			$operators[] = $O->getData();
		$this->view->assign('operators', $operators);
		$this->setTemplate('operators.tpl');
	}

	public function doProcessOperator()
	{
		try
		{
			$O = new Operator($this->getParam('operator_id'));
			$p = $this->getParams();
			if (!key_exists('active', $p))
				$p['active'] = 0;
			$O->save($p);
			$this->forward(dbdURI::create('index', 'operators'));
		}
		catch (DMException $e)
		{
			$this->e($e);
			$this->assignAllParams();
			$this->setTemplate('operator.tpl');
		}
	}

	public function doDeleteOperator()
	{
		try
		{
			$O = new Operator($this->getParam('operator_id'));
			$O->delete();
			$this->forward(dbdURI::create('index', 'operators'));
		}
		catch (DMException $e)
		{
			$this->e($e);
			$this->assignAllParams();
			$this->setTemplate('operator.tpl');
		}
	}

	public function doSubscriber()
	{
		if ($this->getParam('subscriber_id'))
		{
			$S = new Subscriber($this->getParam('subscriber_id'));
			$this->view->assign($S->getData());
		}
		$this->setTemplate('subscriber.tpl');
	}

	public function doSubscribers()
	{
		$subscribers = array();
		foreach (Subscriber::getAll() as $S)
			$subscribers[] = $S->getData();
		$this->view->assign('subscribers', $subscribers);
		$this->setTemplate('subscribers.tpl');
	}

	public function doProcessSubscriber()
	{
		try
		{
			$S = new Subscriber($this->getParam('subscriber_id'));
			$p = $this->getParams();
			if (!key_exists('active', $p))
					$p['active'] = 0;
			$S->save($p);
			$this->forward(dbdURI::create('index', 'subscribers'));
		}
		catch (DMException $e)
		{
			$this->e($e);
			$this->assignAllParams();
			$this->setTemplate('subscriber.tpl');
		}
	}

	public function doDeleteSubscriber()
	{
		try
		{
			$S = new Subscriber($this->getParam('subscriber_id'));
			$S->delete();
			$this->forward(dbdURI::create('index', 'subscribers'));
		}
		catch (DMException $e)
		{
			$this->e($e);
			$this->assignAllParams();
			$this->setTemplate('subscriber.tpl');
		}
	}
}
?>
