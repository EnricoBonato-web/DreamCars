<?php
session_start();
echo file_get_contents("../../Template/HeadBase.txt");
if($_SESSION["dipendente"]){
    echo("Buon lavoro, ".$_SESSION["nome"]." </br>");
    echo("<a href='../LoginRegistrati/logout.php'>Logout</a>");
}
else{
    echo "<a href='login.html#tab2'><span xml:lang='en' tabindex='1'>Login</span></a>";}
	echo file_get_contents("AreaPersonaleDipendenti.txt");
	if($_SESSION["dipendente"])
		echo "<p>"."Benvenuto nella tua area personale! Questa l' area privata riservata ai dipendenti."."</p>";
	else
		echo "Non sei autorizzato a visualizzare questa pagina. Per cortesia effettua l'accesso come dipendente </br> <a href='../LoginRegistrati/login.html#tab2' >Login </a>";
	?> 
	</div>
  <?php 
    echo   file_get_contents("../../Template/Footer.txt");
    ?>
