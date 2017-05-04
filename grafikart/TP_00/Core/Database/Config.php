<?php

namespace Core;

class Config
{

	private $settings = [];
	private static $_instance;

	public static function getInstance($file)
	{
		if (is_null(self::$_instance))
			self::$_instance = new Config();
		return self::$_instance;
	}

	public function __construct($file)
	{
		$this->settings = require_once($file);
	}

	public function get($key)
	{
		if (!isset($this->settings[$key]))
			return NULL;
		return $this->settings[$key];
	}
}

?>