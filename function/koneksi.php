<?php

	$server = "localhost";
	$username = "root";
	$password = "";
	$database = "id20834836_gemilang";
	
	$koneksi = mysqli_connect($server, $username, $password, $database) or die("Koneksi ke database gagal");