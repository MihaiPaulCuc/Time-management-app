<?php

function createDb(){
	//conexiune
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "licenta";
	//creare conexiune
	$con = mysqli_connect($servername,$username,$password);
	// verificare conexiune
	if(!$con){
		die("Conexiune esuata: " .mysqli_connect_error());
	}
	//crearea bazei de date
	$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
	
	if (mysqli_query($con, $sql)){
			$con = mysqli_connect($servername,$username,$password,$dbname);
			
			//crearea tabelului
			
			$sql = "
				CREATE TABLE IF NOT EXISTS licenta (
					ID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
					activitate VARCHAR(35) NOT NULL,
					durata TIME NOT NULL
				);
				
			";
		
		if(mysqli_query($con,$sql)){
			
			return $con;
			
		}else 
		{
			echo "Tabelul nu s-a putut crea!";
			
		}	
	}else {
		
		echo "Eroare la conectare".mysqli_error($con);
	}
	
}

?>