<?php
class Subscribers extends DMController
{
	public function doDefault()
	{
		$subscribers = array();
		foreach (Subscriber::getAll() as $S)
			$subscribers[] = $S->getData();
		$this->view->assign('subscribers', $subscribers);
		$this->setTemplate('subscribers.tpl');
	}

	public function doEdit()
	{
		if ($this->getParam('subscriber_id'))
		{
			$S = new Subscriber($this->getParam('subscriber_id'));
			$this->view->assign($S->getData());
		}
		$this->setTemplate('subscriber.tpl');
	}

	public function doProcess()
	{
		try
		{
			$S = new Subscriber($this->getParam('subscriber_id'));
			$p = $this->getParams();
			if (!key_exists('active', $p))
					$p['active'] = 0;
			$S->save($p);
			$this->forward(dbdURI::create('subscribers'));
		}
		catch (DMException $e)
		{
			$this->e($e);
			$this->assignAllParams();
			$this->setTemplate('subscriber.tpl');
		}
	}

	public function doDelete()
	{
		try
		{
			$S = new Subscriber($this->getParam('subscriber_id'));
			$S->delete();
			$this->forward(dbdURI::create('subscribers'));
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
