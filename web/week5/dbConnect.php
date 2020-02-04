<?php 
   function get_db() {
    
      $db = null;
      try {
		 //$dbUrl = getenv('DATABASE_URL');
		 $dbUrl = 'postgres://juasbzbxoiigrs:663d20a3005312fced32656243cf67d498a4a10e2eaf20fbf5ca5828729223e3@ec2-174-129-33-14.compute-1.amazonaws.com:5432/d4i3elnh9g0rfi';
         $dbOpts = parse_url($dbUrl);
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