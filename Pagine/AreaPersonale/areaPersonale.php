<?php
session_start();

echo file_get_contents("../../Template/HeadBase.txt");
if($_SESSION["user"]){
    echo("Buongiorno, ".$_SESSION["nome"]." <br/>");
    echo("<a href='../LoginRegistrati/logout.php'>Logout</a>");
}
	echo   file_get_contents("AreaPersonale.txt");
    echo   file_get_contents("../../Template/Footer.txt");
    ?>
