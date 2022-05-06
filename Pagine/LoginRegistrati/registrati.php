<?php

session_start();
include "../../config.php";

$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$username =$_POST['username'];
$password=$_POST['password'];
$password2=$_POST['password2'];
$email=$_POST['email'];
$tel=$_POST['telefono'];
$correct=true;
//controlli sui dati in input

if (($nome=="")||($cognome=="")||($username=="")||($password=="")||($tel==""))
{
    $correct=false;
    echo "prego compilare tutti i campi richiesti";
}
if($correct)	//controlla se c'è un username già esistente
{    
	$queryusername = "SELECT Cliente.Username FROM Cliente WHERE Username ='".$username."'";
	$result = mysqli_query($conn, $queryusername);
	if($result->num_rows > 0)
	{
		$correct=false;
		echo "username già esistente";
	}
}
if($correct) 	// controllo per vedere se la mail contiene una chiocciola, quindi per vedere se è valida.
{
	if(strpos($email, '@') == false)
	{
		$correct=false;
		echo "mail non valida";
	}
}
if($correct)	//controllo per la conferma della password
{
	if($password!=$password2)
	{
		$correct=false;
		echo "le password immesse non coincidono";
	}
}
//inserting data order
if($correct){
    $toinsert = "INSERT INTO Cliente (Username, Nome, Cognome, Pswd,Email, Telefono)
                  VALUES ('$username','$nome', '$cognome', '$password','$email','$tel')";
    //declare in the order variable
    $result = mysqli_query($conn, $toinsert);
	//echo $result->num_rows;
    //order executes
    if($result)
        echo("Inserimento avvenuto correttamente");
    else
        echo("Inserimento non eseguito");
}

include "login.html";
?>

