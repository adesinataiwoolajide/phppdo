<?php 
	//including the script of connection to database
	include("connect.php");
	//VIEWING ALL THE USER
		try{ //wrapping the content in a try and catch block
			$select = $conne->prepare("SELECT * FROM user");
			//executing the select
			$select->execute(); ?>
			<table border="1" class="table table-striped table-bordered table-hover" align="center">
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
							<td><?php echo $row['user_id']; ?></td>
							<td><?php echo $row['user_name']; ?></td>
							<td><?php echo $row['password']; ?> </td>
						</tr>
					</tbody> <?php	
				}  ?>
			</table> <?php
		//catching the exception
		}catch (PDOException $e){
			echo "ERROR".$e->getMessage();
		}//closing the catch
?>