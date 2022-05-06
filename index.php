<?php
include "../../config.php";
session_start();
include "config.php"; 
echo file_get_contents("Pagine/Index/index1.txt");
if(!$_SESSION["user"]){
    if($_SESSION["dipendente"]){
        echo("Buon lavoro, ".$_SESSION["nome"]."");
        echo("</br><a href='/DreamCars/Pagine/AreaPersonaleDipendenti/AreaPersonaleDipendenti.php'>Area personale </a>"." / ");
        echo("<a href='/DreamCars/Pagine/LoginRegistrati/logout.php'>Logout</a>");
    }
    else{
        echo("<a href='/DreamCars/Pagine/LoginRegistrati/registrati.html'>Registrati</a> /     
                     <a href='/DreamCars/Pagine/LoginRegistrati/login.html#tab1'><span xml:lang='en' tabindex='1'>Login</span></a>");}
}
else{
    echo("Buongiorno, ".$_SESSION["nome"]." ");
    echo("<a href='/DreamCars/Pagine/AreaPersonale/areaPersonale.php'><br/>Area Personale </a>"); 
    echo(" / ");
    echo("<a href='/DreamCars/Pagine/LoginRegistrati/logout.php'>Logout</a>");
}
echo file_get_contents("Pagine/Index/index2.txt");

$sql="select distinct marca from Auto";
$marca=mysqli_query($conn,$sql);
if($marca->num_rows>0){
    while($row=$marca->fetch_assoc()){
        echo"<option value='".$row['marca']."'>".$row['marca']."</option>";
    }
}

echo file_get_contents("Pagine/Index/index3.txt");

?>
