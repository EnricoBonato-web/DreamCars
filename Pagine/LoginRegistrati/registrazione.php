<?php
include "config.php";

$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$codice =$_POST['username'];
$numero=$_POST['telefono'];
$pass=$_POST['password'];
$vuoto=false;
//inserting data order

if (($nome=="")||($cognome=="")||($codice=="")||($numero=="")||($pass==""))
{
    $vuoto=true;
}

if(!$vuoto)
{
    $toinsert = "INSERT INTO Cliente (username, nome, cognome, telefono, password)
                  VALUES ('$codice','$nome', '$cognome', '$numero', '$pass')";

    //declare in the order variable
    $result = mysqli_query($conn, $toinsert);
    //order executes
    if($result){
        echo("Inserimento avvenuto correttamente");} 
        else{
        echo("Inserimento non eseguito");}
}
	
	mysqli_close($conn);
?>
