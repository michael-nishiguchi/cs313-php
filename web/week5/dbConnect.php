<?php 
	function get_db() {

		$db = NULL;
		try {
			$dbUrl = getenv('DATABASE_URL');
			$dbOpts = parse_url($dbUrl);
			var_dump($dbUrl);
					
			$dbHost = $dbOpts["host"];
			$dbPort = $dbOpts["port"];
			$dbUser = $dbOpts["user"];
			$dbPassword = $dbOpts["pass"];
			$dbName = ltrim($dbOpts["path"],'/');
			$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);         
		}
		catch (PDOException $ex) {
			echo "Connection error.";
			die();
		}
			return $db;
	}
?>