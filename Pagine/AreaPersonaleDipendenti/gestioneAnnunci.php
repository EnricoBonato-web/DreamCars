<?php
session_start();
echo file_get_contents("../../Template/HeadBase.txt");

if($_SESSION["dipendente"]){
    echo("Buon lavoro, ".$_SESSION["nome"]." </br>");
    echo("<a href='../LoginRegistrati/logout.php'>Logout</a>");
}
else{
    echo "<a href='login.html#tab2'><span xml:lang='en' tabindex='1'>Login</span></a>";}

echo file_get_contents("gestioneAnnunci.txt");
	if($_SESSION["dipendente"])
		echo "<p>"."Benvenuto nella tua area personale! Questa l' area privata riservata ai dipendenti."."</p>";
	else
		echo "Non sei autorizzato a visualizzare questa pagina. Per cortesia effettua l'accesso come dipendente.";
	echo file_get_contents("gestioneAnnunci2.txt");
echo file_get_contents("../../Template/Footer.txt");

?>
