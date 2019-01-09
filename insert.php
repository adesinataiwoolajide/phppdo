<?php
	//including the script of connection to database
	include("connect.php");
	//checking if the submit buttom is pressed
		if(isset($_POST['login'])){
			//wrapping the insert in try and catch block
			try{
				$username = trim($_POST['Username']);
				$password = sha1($_POST['Passsword']);
				//praparing the insert with named placeholder 
				$inserting = $conne->prepare("INSERT INTO user(user_name, password) VALUES (:username, :password)");
				//executing and putting the named placeholder in an array
				$inner = $inserting->execute(array(':username' => $username, 'password'=> $password));
					if($inner > 0){ ?>
						<script> alert("REGISTRATION IS SUCCESSFUL");
							 window.location = "index.php";
					</script> <?php 
					}//closing the if
			//CATCHIGN EXCEPTION ERROR
			}catch(PDOException $e){
				echo $username. "YOUR REGISTRATION FAILED". $e->getMessage();
			}// closing the try
		}//closing the outer if
?>