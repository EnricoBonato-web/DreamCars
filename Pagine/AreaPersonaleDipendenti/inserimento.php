<?php
session_start();
include "../../config.php";
echo file_get_contents("../../Template/HeadBase.txt");
if($_SESSION["dipendente"]){
    echo("Buon lavoro, ".$_SESSION["nome"]." </br>");
    echo("<a href='../LoginRegistrati/logout.php'>Logout</a>");
}
else{
    echo "<a href='../LoginRegistrati/login.html#tab2'><span xml:lang='en' >Login</span></a>";}
?>
       </div>
<?php 
    echo file_get_contents("formInserimento.txt");
    echo file_get_contents("../../Template/Footer.txt");
?>

