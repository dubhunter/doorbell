<?php
class DBError extends DBController
{
	public function doDefault()
	{
		dbdError::doError($this);
	}
}

