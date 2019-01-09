<?php
	$dbname = "emis";
	//DATABASE HOST
	$host = "localhost";
	//DATABASE USER NAME
	$user = "root";
	//DATABASE PASSWORD
	$password = "";
	try{
		$conne = new PDO("mysql: host=$host; dbname=$dbname", $user, $password);
		$conne->setAttribute(PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
			//CHECKING IF THE DATABASE IS FOUND
			if(!empty($conne)){
				//displaying successmessage
				echo "DATABASE" . $dbname . "CONNECTED";
			}return $conne;
	//CATCHING EXCEPTION
	} catch (PDOException $e){
		//DISPLAYING THE ERROR MESSAGE
		echo "DATABASE CONNECTION FAILED". $e->getMessage();
		exit();
	}



?>