<?php
class AccessCode extends dbdModel
{
	const TABLE_NAME = 'access_codes';
	const TABLE_KEY = 'access_code_id';
	const TABLE_FIELD_NAME = 'name';
	const TABLE_FIELD_PHONE = 'phone';
	const TABLE_FIELD_CODE = 'code';
	const CODE_LENGTH = 4;

	public static function getByCode($code)
	{
		$C = self::getAll(array(self::TABLE_FIELD_CODE => $code));
		if (count($C) == 1 && strtotime($C[0]->valid_from) < time() && strtotime($C[0]->valid_to) > time())
			return $C[0];
		else
			throw new DBException(DBException::UNAUTHORIZED);
	}

	protected static function isUnique($code)
	{
		return (self::getCount(array(self::TABLE_FIELD_CODE => $code)) == 0);
	}

	protected function genCode()
	{
		$code = '';
		for ($i = 0; $i < self::CODE_LENGTH; $i++)
			$code .= rand(0, 9);
		return self::isUnique($code) ? $code : $this->genCode();
	}

	public function setPhone($phone)
	{
		$phone = preg_replace('/[\- .]+/', '', $phone);
		$phone = preg_replace('/^\+?1/', '', $phone);
		parent::setPhone($phone);
	}

	public function setValidFrom($date)
	{
		parent::setValidFrom(dbdDB::date(strtotime($date)));
	}

	public function setValidTo($date)
	{
		parent::setValidTo(dbdDB::date(strtotime($date)));
	}

	public function setSubscribers($ids)
	{
		$old = array();
		foreach (AccessCodeSubscriber::getAll($this->id) as $ACS)
		{
			if (!in_array($ACS->getSubscriberId(), $ids))
				$ACS->delete();
			else
				$old[] = $ACS->getSubscriberId();
		}
		foreach ($ids as $id)
		{
			if (!in_array($id, $old))
			{
				$ACS = new AccessCodeSubscriber();
				$ACS->setAccessCodeId($this->id);
				$ACS->setSubscriberId($id);
				$ACS->save();
			}
		}
	}

	public function save($fields = array())
	{
		DBException::hold();
		DBException::ensure(isset($fields[self::TABLE_FIELD_NAME]) || $this->hasName(), DBException::REQ_NAME);
		DBException::ensure(isset($fields[self::TABLE_FIELD_PHONE]) || $this->hasPhone(), DBException::REQ_PHONE);
		DBException::release();

		if ($this->id == 0)
		{
			$this->setCode($this->genCode());
			$this->setDateCreated(dbdDB::date());
		}
		if (isset($fields['phone']))
		{
			$this->setPhone($fields['phone']);
			unset($fields['phone']);;
		}
		if (isset($fields['valid_from_date']))
		{
			$this->setValidFrom($fields['valid_from_date'].' '.$fields['valid_from_time_hour'].':'.$fields['valid_from_time_minute'].':00');
			unset($fields['valid_from_date']);
			unset($fields['valid_from_time_hour']);
			unset($fields['valid_from_time_minute']);
		}
		if (isset($fields['valid_to_date']))
		{
			$this->setValidTo($fields['valid_to_date'].' '.$fields['valid_to_time_hour'].':'.$fields['valid_to_time_minute'].':00');
			unset($fields['valid_to_date']);
			unset($fields['valid_to_time_hour']);
			unset($fields['valid_to_time_minute']);
		}
		parent::save($fields);
		$this->setSubscribers(isset($fields['subscriber_ids']) ? $fields['subscriber_ids'] : array());
	}

	public function getData()
	{
		$data = parent::getData();
		$data['subscriber_ids'] = array();
		foreach (AccessCodeSubscriber::getAllSubscribers($this->id) as $S)
			$data['subscriber_ids'][] = $S->getId();
		return $data;
	}
}
?>