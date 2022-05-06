
<?php
include "../../config.php";
session_start();
echo file_get_contents("../../Template/HeadBase.txt");
      if($_SESSION["user"]){ 
        echo("Benvenuto, ".$_SESSION["nome"]." <br/>"); 
        echo("<a href='../LoginRegistrati/logout.php'>Logout</a>"); 
      } 
	echo file_get_contents("listaRiparazioni.txt");
	$telaio=$_GET["telaio"];	
	$riparazioniq="select Riparazione.descrizione as descrip, Riparazione.Id_Riparazione as idrip from Riparazione where Riparazione.Numero_Telaio='".$telaio."'";
	$riparazioni=mysqli_query($conn,$riparazioniq);
	if($riparazioni && $riparazioni->num_rows>0){
		echo"<h2>riparazioni:</h2>";
		while($row=$riparazioni->fetch_assoc()){
			echo"			
            <div class='autoInRiparazione'>
			<p>descrizione riparazione: ".$row['descrip']."</p>
			<a href='listaInterventi.php?riparazione=$row[idrip]'>  
            <div class='ripa'> lista interventi</div>
            </a>
            </div>
            ";
		}
	}
echo file_get_contents("GestioneRiparazioni2.txt");
	echo file_get_contents("../../Template/Footer.txt");
?>
