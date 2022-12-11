<?php 
	$host = "localhost";    
	$basededatos = "mc";    
	$basededatos_generales = "mc_generales";    
	$usuariodb = "root";    
	$clavedb = "Bimestra10"; 

	/*$host = "remotemysql.com";    
	$basededatos = "fd8CyVWiLv";     
	$usuariodb = "fd8CyVWiLv";    
	$clavedb = "FX9Z9twQmU";  */
	
	$conexion = new mysqli($host,$usuariodb,$clavedb,$basededatos);
	$conexion_generales = new mysqli($host,$usuariodb,$clavedb,$basededatos_generales);
	$conexion_datos = mysqli_connect($host,$usuariodb,$clavedb,$basededatos);
	$conexionPDO = new PDO('mysql:host='.$host.';dbname='.$basededatos.'',''.$usuariodb.'',''.$clavedb.'');
?>