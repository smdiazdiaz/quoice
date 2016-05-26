<?php
	
	function db_connect(){
		static $connection;
		
		if(!isset($connection)) {
			$conf = parse_ini_file('E:/USP/Sistemas operacionais/Projeto/QuoICE/config_file.ini');
			$connection = mysql_connect($conf['host'],$conf['username'],$conf['password']); 
			$select_db = mysql_select_db(,$conf['dbname']);
		}
		
		if($connection == false){
			return mysqli_connect_error();
		}
	}

?>