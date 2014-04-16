<?php
class AccessLog extends dbdModel
{
	const TABLE_NAME = 'access_logs';
	const TABLE_KEY = 'access_log_id';

	public static function getAll($limit = 10)
	{
		return parent::getAll(array(), 'date desc', $limit);
	}

	public static function log($access_code_id)
	{
		$AL = new self();
		$AL->setAccessCodeId($access_code_id);
		$AL->setDate(dbdDB::date());
		$AL->save();
	}

	public function getAccessCode()
	{
		return new AccessCode($this->getAccessCodeId());
	}

	public function getData()
	{
		$data = parent::getData();
		$data['access_code'] = $this->getAccessCode()->getData();
		return $data;
	}
}
