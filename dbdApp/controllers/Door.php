<?php
class Door extends DMController
{
	protected function init()
	{
		parent::init();
		$this->ensureTwilio();
	}

	public function doDefault()
	{
		$this->setTemplate('twiml.welcome.tpl');
	}

	public function doValidate()
	{
		try
		{
			$AC = AccessCode::getByCode($this->getParam('Digits'));
			AccessLog::log($AC->getId());
			foreach (array_merge(Subscriber::getAll(true), AccessCodeSubscriber::getAllSubscribers($AC->getId())) as $S)
				$this->sendSMS($S->getPhone(), $AC->getName()." just walked in the front door.");
			$this->setTemplate('twiml.open.tpl');
		}
		catch (DMException $e)
		{
			$this->setTemplate('twiml.invalid.tpl');
		}
	}

	public function doOperator()
	{
		$operators = array();
		foreach (Operator::getAll(true) as $O)
			$operators[] = $O->getPhone();
		$this->view->assign('operators', $operators);
		$this->setTemplate('twiml.operator.tpl');
	}
}
?>
