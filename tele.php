<?php 
	session_start();
	include("config.php");
	//check if the submit button has been pressed with this function
	if(isset($_POST['submit'])){
		$Username = stripcslashes($_POST['login-email']);
		$Password = stripcslashes($_POST['login-password']);

		//check if the username exist in the db
		$select = mysqli_query($conn, "SELECT * FROM users WHERE email = '$Username' AND password ='$password'") 
		or die (mysqli_error($conn));
		if(mysqli_num_rows($select )== 1){
			echo "LOGIN SUSSUSSFUL";
			// you can also redirect here to any page of your chioce using this function
			header("Location: website.php");
		}
		else{
			echo "login failed";
			// you can also redirect here to any page of your chioce using this function
			header("Location: index.php");
		}
	}
?>