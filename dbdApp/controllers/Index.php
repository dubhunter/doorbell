<?php
class Index extends DBController
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
