<?php
class Index extends DBController
{
	const LOG_LIMIT = 50;
	public function doDefault()
	{
		$logs = array();
		foreach (AccessLog::getAll(self::LOG_LIMIT) as $AL)
			$logs[] = $AL->getData();
		$this->view->assign('logs', $logs);
		$this->setTemplate('index.tpl');
	}
}

