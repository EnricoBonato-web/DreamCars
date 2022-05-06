<?php
include"../../config.php";
session_start();
echo file_get_contents("../../Template/HeadBase.txt");
      if($_SESSION["user"]){ 
        echo("Buongiorno, ".$_SESSION["nome"]." <br/>"); 
        echo("<a href='../LoginRegistrati/logout.php'>Logout</a>"); 
      } 
echo file_get_contents("listaInterventi.txt");
	$riparazione=$_GET['riparazione'];
	$interventiq="select descrizione, oretot from Intervento where Intervento.Id_Riparazione='".$riparazione."'";
	$interventi=mysqli_query($conn,$interventiq);
	if($interventi && $interventi->num_rows>0){
		echo"<h4>Interventi:</h4>";
		while($row=$interventi->fetch_assoc()){			
			echo"<div class='autoInRiparazione'>
				<p>durata:".$row['oretot'];
            if($row['oretot']== 1)
                echo" ora </p>";
            else
                echo" ore </p>";
            echo"<p>descrizione:".$row['descrizione']."</p>
			</div>";
		}
	}
	else
		echo "nessun intervento ancora effettuato";
echo file_get_contents("GestioneRiparazioni2.txt");
 echo file_get_contents("../../Template/Footer.txt");?>
