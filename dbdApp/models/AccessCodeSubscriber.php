<?php

class AccessCodeSubscriber extends dbdModel {
	const TABLE_NAME = 'access_code_subscribers';
	const TABLE_KEY = 'access_code_subscriber_id';

	public static function getAll($access_code_id = null, $subscriber_id = null) {
		$keys = array();
		if ($access_code_id !== null) {
			$keys[AccessCode::TABLE_KEY] = $access_code_id;
		}
		if ($subscriber_id !== null) {
			$keys[Subscriber::TABLE_KEY] = $subscriber_id;
		}
		return parent::getAll($keys);
	}

	public static function getCount($access_code_id = null, $subscriber_id = null) {
		$keys = array();
		if ($access_code_id !== null) {
			$keys[AccessCode::TABLE_KEY] = $access_code_id;
		}
		if ($subscriber_id !== null) {
			$keys[Subscriber::TABLE_KEY] = $subscriber_id;
		}
		return parent::getCount($keys);
	}

	public static function getAllSubscribers($access_code_id) {
		$Subscribers = array();
		foreach (self::getAll($access_code_id) as $ACS) {
			$Subscribers[] = $ACS->getSubscriber();
		}
		return $Subscribers;
	}

	public function getAccessCode() {
		return new AccessCode($this->getAccessCodeId());
	}

	public function getSubscriber() {
		return new Subscriber($this->getSubscriberId());
	}

	public function getData() {
		$data = parent::getData();
		$data['access_code'] = $this->getAccessCode()->getData();
		return $data;
	}
}
