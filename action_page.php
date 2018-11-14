<html>
	<body>
		<?php
		
			/*Create the variables to hold sql information*/
			$servername = "Localhost";
			$user = "poissanj_ridestops";
			$pass = "uwindsor";
			$dbname = "poissanj_ridestops";
			
			/*Connection to the sql database*/
			$conn = new mysqli($servername, $user, $pass, $dbname);
			
			/*testing if connection was successful*/
			if($conn->connect_error)
			{
				/*if unsuccessful do this*/
				die("Connection failed: ".$conn->connect_error);
			} 
			else 
			{
				/*if successfull do this*/
				
				/*checks if the user clicks the login button*/
				if($_POST['action'] == 'login')
				{
					/*if login button is pressed do this*/
					
					/*sql query that checks to see if the given username and password are in the database*/
					$result = mysqli_query($conn,"SELECT * FROM `Login` WHERE username='$_POST[uname]' AND password='$_POST[psw]'");
					$row = mysqli_fetch_array($result);
					
					
					/*checks to see if the credentials given are in the database*/
					if(mysqli_num_rows($result) != 0)
					{
						/*if credentials are correct do this*/
						
						/*checks to see if the user is a rider or driver*/
						if($row['type'] == 1)
						{
							/*if user is rider do this*/
							
							header("Location: /customerLanding_page.php");
							exit;
						}
						else
						{
							/*if user is driver do this*/
							
							header("Location: /driverLanding_page.php");
							exit;
						}
					} 
					else if(mysqli_num_rows($result) == 0)
					{
						/*if the credentials are incorrect do this*/
						echo "Incorect username / password";
					}
				
				}
				/*checks to see if the user click the register button*/
				else if($_POST['action'] == 'register')
				{
					/*if register button is pressed do this*/
					
					/*checks to see if the driver or the rider radio button is pressed*/
					if($_POST[accountType] == 'driver')
					{
						/*if driver radio button is pressed do this*/
						
						/*inserts new user with given username and password of type 2*/
						mysqli_query($conn,"INSERT INTO Login(`password`, `username`, `type`) VALUES ('$_POST[psw]','$_POST[uname]','2')");
					}
					else
					{
						/*if rider radio button is pressed do this*/
						
						/*inserts new user with given username and password of type 1*/
						mysqli_query($conn,"INSERT INTO Login(`password`, `username`, `type`) VALUES ('$_POST[psw]','$_POST[uname]','1')");
					}	
				}
			}

		?>
		
		<!--This is the landing page of the website. All users who login will end up here-->
		<p>This is a the landing page of the site.</p>
	</body>
</html>

