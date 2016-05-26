<?php
	
	include("db_connection.php");
	
	function db_query($query) {
		$connection = db_connect();
		$result = mysql_query($query); 
		return $result;
	}
	
	//traer estado
	$result = db_query("select 'nome' from 'estados' where id_estado = '1' ");
	
	
	

?>