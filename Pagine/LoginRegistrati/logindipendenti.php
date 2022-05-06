<?php
session_start();

include "../../config.php";
$matr=$_POST["matricola"];
$pass=$_POST["password"];

$confr="SELECT nome, cognome, Matricola FROM Dipendente WHERE Matricola='$matr' AND password='$pass'";
$result = mysqli_query($conn, $confr);
if($result->num_rows==0)
	die("errore");
	else{
		$row=mysqli_fetch_array($result);
		$_SESSION["nome"]=$row["nome"];
		$_SESSION["cognome"]=$row["cognome"];
		$_SESSION["dipendente"]=$row["Matricola"];
	}
	mysqli_close($conn);
	header('Location: ../../index.php');
?>
