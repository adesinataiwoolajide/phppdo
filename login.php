<?php
	include_once("connect.php");
	try {
		if(isset($_POST['login'])){
			$username = trim($_POST['Username']);
			$password = sha1($_POST['Passsword']);

			$login = $conne->prepare("SELECT * FROM user WHERE user_name = :username AND password = :password");
			$arr = array(':username'=> $username, ':password'=> $password);
			$login->execute($arr);
			$count= $login->rowCount();
				if($count == 1){
					session_start();
					$new = $login->fetch();
					//var_dump($new);
					$_SESSION['user_name'] = $new['user_name'];
					//$_SESSION['name'] = $new['employee_name'];
					$_SESSION['time_registered'] = $new['time_registered'];
					$_SESSION['id'] = $new['user_id'];
					$access = $new['access'];
					
						if($access == 1){
							$insert_history= $db->prepare("INSERT INTO history(date, action, user, staff_name) 
								VALUES(NOW(), :operation, :access, :name)");
								$arr = array(':operation'=>$operation, ':access'=>$access, ':name'=>$name);
								$insert_history->execute($arr);
							header("Location: view-all.php");
						}elseif($role == 0){
							header("Location: log.php");
						}
				}else{ ?>
					<script> alert("USERNAME DOES NOT EXIST, PLEASE REGISTER TO LOG IN");
							 window.location = "index.php";
					</script> <?php
				}
		}
		
	} catch (Exception $e) {
		echo "FATAL ERROR". $e->getMessage();
	}
?>