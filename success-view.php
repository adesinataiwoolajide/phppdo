<?php
	//including the script of connection to database
	include("connect.php");
	//VIEWING EACH USER BY USER IF
		if(isset($_POST['find'])){
			//wrapping the code in a try and catch bloock
			try{
				$userid = trim($_POST['id']);
				//select from the table using the user id
				$select = $conne->prepare("SELECT * FROM user WHERE user_id = :userid");
				// if($new = $conne->query($select)){
				// 	if($new->fetchRow()<0){
				// 		echo "NOT FOUND";
				// 	}else{
				
				//putting the named placeholder with the variable in an array
				$arr = array(':userid' => $userid);
				//executing the select
				$view = $select->execute($arr); ?>
				<table border="1" class="table table-striped table-bordered table-hover" align="center">
					<form method="post" action="update.php">
						<thead>
							<tr>
								<td>USER ID</td>
								<td>USERNAME</td>
								<td>PASSWORD</td>
							</tr>
						</thead> <?php
						//using while loop to fetch the datail
						while($row= $select->fetch()){ ?> 
							<tbody>
								<tr>
									<td><input type="text" name="id" value="<?php echo $row['user_id']; ?>"></td>
									<td><input type="text" name="user_name" value="<?php echo $row['user_name']; ?>"></td>
									<td><input type="text" name="password" value="<?php echo $row['password']; ?>"> </td>
									<input type="submit" name="update" value="UPDATE USER">
								</tr>
								
							</tbody>

							<?php
						} ?>
					</form>
				</table> <?php
			//catching the exception
			}catch (PDOException $e){
				echo "ERROR".$e->getMessage();
			}//closing the catch

		}//closing the outter if

?>