<?php
class Operators extends DMController
{
	public function doDefault()
	{
		$operators = array();
		foreach (Operator::getAll() as $O)
			$operators[] = $O->getData();
		$this->view->assign('operators', $operators);
		$this->setTemplate('operators.tpl');
	}

	public function doEdit()
	{
		if ($this->getParam('operator_id'))
		{
			$O = new Operator($this->getParam('operator_id'));
			$this->view->assign($O->getData());
		}
		$this->setTemplate('operator.tpl');
	}

	public function doProcess()
	{
		try
		{
			$O = new Operator($this->getParam('operator_id'));
			$p = $this->getParams();
			if (!key_exists('active', $p))
				$p['active'] = 0;
			$O->save($p);
			$this->forward(dbdURI::create('operators'));
		}
		catch (DMException $e)
		{
			$this->e($e);
			$this->assignAllParams();
			$this->setTemplate('operator.tpl');
		}
	}

	public function doDelete()
	{
		try
		{
			$O = new Operator($this->getParam('operator_id'));
			$O->delete();
			$this->forward(dbdURI::create('operators'));
		}
		catch (DMException $e)
		{
			$this->e($e);
			$this->assignAllParams();
			$this->setTemplate('operator.tpl');
		}
	}
}
?>
