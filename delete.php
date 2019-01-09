<?php
	//including the script of connection to database
	include("connect.php");
	//VIEWING EACH USER BY USER IF
		if(isset($_POST['delete'])){
			//wrapping the code in a try and catch bloock
			try{
				$delet = trim($_POST['id']);
				//deleting the data from the database
				$deleting = $conne->prepare("DELETE FROM user WHERE user_id = :delet");
				//puting the named place holder in an array 
				$arr = array(':delet' => $delet);
				//executing the statement
				$clear = $deleting->execute($arr);
				//checkinh if the user was deleted
				if($clear > 0){ ?>
					<script> alert("USER DELETED SUCCESSFULLY");
							 window.location="del-user.php";
					</script> <?php
				} //ending the if
			} catch (PDOException $e){
				echo "ERROR" . $e->getMessage();
			} //closing the catch
		} //closing the outer if
?>
