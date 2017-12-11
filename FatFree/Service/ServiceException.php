<?php
namespace FatFree\Service;

class ServiceException extends \Exception
{

	/**
	 * Class constructor
	 * @param string $message Custom error message
	 * @param int $id Client, product, etc zeus_id
	 * @param Exception|null $previous
	 */
	public function __construct($message = "", $id = 0, Exception $previous = null)
	{
		parent::__construct($message, $id, $previous);
	}
}
