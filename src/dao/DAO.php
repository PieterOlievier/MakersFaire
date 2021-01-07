<?php

class DAO {

  // Properties
//   private static $dbHost = "mysql";
// 	private static $dbName = "planit";
// 	private static $dbUser = "planner";
// 	private static $dbPass = "password";
	private static $sharedPDO;
	protected $pdo;

	// Constructor
	function __construct()
	{

		if (empty(self::$sharedPDO)) {

			$dbHost = getenv('PHP_DB_HOST') ?: "mysql";
      $dbName = getenv('PHP_DB_DATABASE') ?: "planit";
      $dbUser = getenv('PHP_DB_USERNAME') ?: "planner";
	  $dbPass = getenv('PHP_DB_PASSWORD') ?: "password";

			self::$sharedPDO = new PDO("mysql:host=" . $dbHost . ";dbname=" . $dbName, $dbUser, $dbPass);
			self::$sharedPDO->exec("SET CHARACTER SET utf8");
			self::$sharedPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			self::$sharedPDO->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		}

		$this->pdo = &self::$sharedPDO;
	}

	// Methods

}

?>