<?php
session_start();
echo file_get_contents("../../Template/HeadBase.txt");
			  if(!$_SESSION["user"]){
				 if($_SESSION["dipendente"]){
					echo("Buon lavoro, ".$_SESSION["nome"]. " </br>");
					echo("<a href='../AreaPersonaleDipendenti/AreaPersonaleDipendenti.php'>Area Personale </a>"." /");
					echo("<a href='/DreamCars/Pagine/LoginRegistrati/logout.php'>Logout</a>");
                 }
                 else{
                     echo("<a href='/DreamCars/Pagine/LoginRegistrati/registrati.html'>Registrati</a> /     
                     <a href='/DreamCars/Pagine/LoginRegistrati/login.html#tab1'><span xml:lang='en' tabindex='1'>Login</span></a>");}
					}
                else{
                    echo("Buongiorno, ".$_SESSION["nome"]." ");
                    echo("<a href='../AreaPersonale/areaPersonale.php'><br/>Area Personale </a>"); 
                    echo(" / ");
                    echo("<a href='../LoginRegistrati/logout.php'>Logout</a>");
                    };
echo file_get_contents("chiSiamo2.txt");
echo file_get_contents("../../Template/Footer.txt");		 
?>
