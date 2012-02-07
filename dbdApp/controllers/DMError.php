<?php
class DMError extends DMController
{
	public function doDefault()
	{
		dbdError::doError($this);
	}
}
?>
