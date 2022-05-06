<?php
session_start();
include "../../config.php";
$user=$_POST['username'];
$pass=$_POST['password'];

$confr="SELECT Nome, Cognome, Username FROM Cliente WHERE Username='$user' AND Pswd='$pass'";
$result=mysqli_query($conn, $confr);
if($result->num_rows==0){
	echo "errore";
}
else{
		$row=mysqli_fetch_array($result);
		$_SESSION["nome"]=$row["Nome"];
		$_SESSION["cognome"]=$row["Cognome"];
		$_SESSION["user"]=$row["Username"];
}
		mysqli_close($conn);
		header('Location: ../../index.php');
?>
