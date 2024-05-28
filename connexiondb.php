<?php
    ini_set('display_errors', 1);
    ini_set('display_status_errors',1);
    error_reporting(E_ALL); 
   function connexionMysqli(){
    // $conn = new mysqli('localhost', 'root', 'Pa$$w0rd', 'banque');
    $conn = new mysqli("localhost", "christian", "Christian$1", "banque");
   	if ($conn){
   		return $conn;
   	}else{
       echo "Could not connect to mysql".mysqli_error($con);
       return false;
   	} 
   }
   
?>  