<?php
	include("connect.php");
		if(isset($_POST['login'])){
			//TRY TO INSERT
			try{
				$username = trim($_POST['Username']);
				$password = trim($_POST['Passsword']);
				//praparing the insert with named placeholder 
				$inserting = $conne->prepare("INSERT INTO user(user_name, password) VALUES (:username, :password)");
				//executing and putting the named placeholder in an array
				$inner = $inserting->execute(array(':username' => $username, 'password'=> $password));
					if($inner > 0){ 
						header("Location: index.php");
					}//closing the if
			//CATCHIGN EXCEPTION ERROR
			}catch(PDOException $e){
				echo $username. "YOUR REGISTRATION FAILED". $e->getMessage();
			}// closing the try
		}//closing the outer if


		//VIEWING EACH USER BY USER ID
		if(isset($_POST['find'])){
			//wrapping the code in a try and catch bloock
			try{
				$userid = trim($_POST['id']);
				//select from the table using the user id
				$select = $conne->prepare("SELECT * FROM user WHERE user_id = :userid");
				//putting the named placeholder with the variable in an array
				$arr = array(':userid' => $userid);
				//executing the select
				$select->execute($arr); ?>
				<table class="table table border" align="center">
						<thead>
							<tr>
								<td>USERNAME</td>
								<td>PASSWORD</td>
							</tr>
						</thead> <?php
					//using while loop to fetch the datail
					while($row= $select->fetch()){ ?> 
						<tbody>
							<tr>
								<td><?php echo $row['user_name']; ?></td>
								<td><?php echo $row['password']; ?> </td>
							</tr>
						</tbody> <?php	
					} ?>
				</table> <?php
			//catching the exception
			}catch (PDOException $e){
				echo "ERROR".$e->getMessage();
			}//closing the catch

		}//closing the outter if


		//VIEWING ALL THE USER

		try{	
			$select = $conne->prepare("SELECT * FROM user");
			//putting the named placeholder with the v$arr = array(':userid' => $userid);
			//executing the select
			$select->execute(); ?>
			<table class="table table border" align="center">
					<thead>
						<tr>
							<td>USERNAME</td>
							<td>PASSWORD</td>
						</tr>
					</thead> <?php
				//using while loop to fetch the datail
				while($row= $select->fetch()){ ?> 
					<tbody>
						<tr>
							<td><?php echo $row['user_name']; ?></td>
							<td><?php echo $row['password']; ?> </td>
						</tr>
					</tbody> <?php	
				} ?>
			</table> <?php
		//catching the exception
		}catch (PDOException $e){
			echo "ERROR".$e->getMessage();
		}//closing the catch
?>