<?php

class Operator extends dbdModel {
	const TABLE_NAME = 'operators';
	const TABLE_KEY = 'operator_id';
	const TABLE_FIELD_NAME = 'name';
	const TABLE_FIELD_PHONE = 'phone';
	const TABLE_FIELD_ACTIVE = 'active';

	public static function getAll($active = null) {
		$keys = array();
		if ($active !== null) {
			$keys[self::TABLE_FIELD_ACTIVE] = $active ? 1 : 0;
		}
		return parent::getAll($keys);
	}

	public function setPhone($phone) {
		$phone = preg_replace('/[\- .]+/', '', $phone);
		$phone = preg_replace('/^\+?1/', '', $phone);
		parent::setPhone($phone);
	}

	public function save($fields = array()) {
		DBException::hold();
		DBException::ensure(isset($fields[self::TABLE_FIELD_NAME]) || $this->hasName(), DBException::REQ_NAME);
		DBException::ensure(isset($fields[self::TABLE_FIELD_PHONE]) || $this->hasPhone(), DBException::REQ_PHONE);
		DBException::release();

		if ($this->id == 0) {
			$this->setActive(1);
		}
		if (isset($fields['phone'])) {
			$this->setPhone($fields['phone']);
			unset($fields['phone']);;
		}
		parent::save($fields);
	}
}
