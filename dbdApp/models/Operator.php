<?php
class Operator extends dbdModel
{
	const TABLE_NAME = 'operators';
	const TABLE_KEY = 'operator_id';
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
		DMException::hold();
		DMException::ensure(key_exists(self::TABLE_FIELD_NAME, $fields) || $this->hasName(), DMException::REQ_NAME);
		DMException::ensure(key_exists(self::TABLE_FIELD_PHONE, $fields) || $this->hasPhone(), DMException::REQ_PHONE);
		DMException::release();

		if ($this->id == 0)
		{
			$this->setActive(1);
		}
		parent::save($fields);
	}
}
?>