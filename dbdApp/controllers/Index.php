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
}
?>
