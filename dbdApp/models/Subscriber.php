<?php
class Subscriber extends dbdModel
{
	const TABLE_NAME = 'subscribers';
	const TABLE_KEY = 'subscriber_id';
	const TABLE_FIELD_NAME = 'name';
	const TABLE_FIELD_PHONE = 'phone';
	const TABLE_FIELD_ACTIVE = 'active';

	public static function getAll($active = null)
	{
		$keys = array();
		if ($active !== null)
			$keys[self::TABLE_FIELD_ACTIVE] = $active ? 1 : 0;
		return parent::getAll($keys);
	}

	public function save($fields = array())
	{
		DBException::hold();
		DBException::ensure(isset($fields[self::TABLE_FIELD_NAME]) || $this->hasName(), DBException::REQ_NAME);
		DBException::ensure(isset($fields[self::TABLE_FIELD_PHONE]) || $this->hasPhone(), DBException::REQ_PHONE);
		DBException::release();

		if ($this->id == 0)
		{
			$this->setActive(1);
		}
		parent::save($fields);
	}
}
?>