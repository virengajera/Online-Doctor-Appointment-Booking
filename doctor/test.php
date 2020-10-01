hi
<?php
		include('db.php');
		$name = "final";
		$pass = "123";
			
			$query = "SELECT * FROM `doctorlogin` WHERE doctorname='darsh'; ";
			$exe = mysqli_query($con,$query);
			
		
			while($data = mysqli_fetch_assoc($exe))
			{
				
				print_r($data);
				echo "hi";
			}
		
?>