<?php
	//including the script of connection to database
	include("connect.php");
	//checking if the submit buttom is pressed
		if(isset($_POST['update'])){
			$id = trim($_POST['id']);
			$username = trim($_POST['user_name']);
			$password = trim($_POST['password']);
			//wrapping the update in try and catch block
			try{
				//updating the user table
				$update = $conne->prepare("UPDATE user SET user_id=':id', user_name=':user_name', password =':password' WHERE user_id = ':id'");
				//putting the named placeholder in an array
				$arr = array(':id' => $id, ':user_name' => $username, ':password' => $password);
				//executing the updating
				$updating = $update->execute($arr);
				//checking if updated
				if($updating > 0){ ?>
					<script> alert("USER DETAILS UPDATED SUCCESSFULLY");
							 window.location = "view-all.php";
					</script> <?php
				}//closing the if
			}catch (PDOException $e){
				echo "FAILED".$e->getMessage();
			}//closing the catch
		}//closing the outter if