<html>
	<body>
	ajhbfsdjbfhsjdbfh
		<?php
		
			$servername = "Localhost";
			$user = "poissanj_ridestops";
			$pass = "uwindsor";
			$dbname = "poissanj_ridestops";
			
			$conn = new mysqli($servername, $user, $pass, $dbname);
			
			if($conn->connect_error){
				die("Connection failed: ".$conn->connect_error);
			} else {
				echo "Connected successfully";
			}
				
			
			
			mysqli_query($conn,"INSERT INTO Login(`password`, `username`, `type`) VALUES ('$_POST[psw]','$_POST[uname]','2')");
			

		?>
		<p>This is a test</p>
	</body>
</html>

