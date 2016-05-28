<?php
	header('Content-type: text/html; charset=utf-8');
				$conf = parse_ini_file('config_file.ini');
				$connection = new mysqli($conf['host'],$conf['username'],$conf['password'],$conf['dbname']);

				//$connection = new mysqli('localhost','root','123456','vitor');

			if(mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
?>
