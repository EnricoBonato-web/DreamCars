<?php 
session_start(); 
include "../../config.php"; 
echo file_get_contents("../../Template/HeadBase.txt");
if($_SESSION["dipendente"]){
    echo("Buon lavoro, ".$_SESSION["nome"]." </br>");
    echo("<a href='../LoginRegistrati/logout.php'>Logout</a>");
}
else{
    echo "<a href='login.html#tab2'><span xml:lang='en' tabindex='1'>Login</span></a>";}
	echo file_get_contents("GestioneRiparazioniDipendenti.txt");
	//idelim e' id riparazione da eliminare	
	$idelim=$_GET['idelim'];
	if(isset($idelim)){
		$remove="delete from Riparazione where Id_Riparazione='".$idelim."'";
		$res=mysqli_query($conn,$remove);
		if($res)
			echo"eliminazione avvenuta correttamente";
		else
			echo"eliminazione non avvenuta";
	}

	if(isset($_POST['mod']) && ($_POST['mod']=="inserimento"||$_POST['mod']=="modifica") && $_POST['mod']!="bypass"){
		//passati attraverso form modifica o inserimento
		$telaio=$_POST['telaio'];
		$descr=$_POST['descr'];
		$ora=$_POST['ora'];
		$data=$_POST['data'];		
		if($_POST['mod']=="inserimento"){//caso inserimento
			$insert="insert into Riparazione (Numero_Telaio,descrizione,dataInizio,ora) values ('".$telaio."','".$descr."','".$data."','".$ora."')";
				//query inserimento o modifica			
				$result=mysqli_query($conn,$insert);
				if($result)
					echo "inserimento avvenuto correttamente";
				else
					echo "inserimento non avvenuto";

		}
		else//caso modifica
			if($_POST['mod']=="modifica"){
				$insert="update Riparazione set Numero_Telaio='".$telaio."', descrizione='".$descr."',dataInizio='".$data."',ora='".$ora."' where Id_Riparazione='".$_POST['idrip']."'";
				//query inserimento o modifica			
				$result=mysqli_query($conn,$insert);
				if($result)
					echo "modifica avvenuta correttamente";
				else
					echo "modifica non avvenuta";
			}
	}
	if(!$_SESSION['dipendente'])
			echo("Non sei autorizzato a visualizzare questa pagina");
	else{
						$query="SELECT Id_Riparazione, Numero_Telaio, dataInizio, ora, costorip, descrizione FROM Riparazione ORDER BY Id_Riparazione";
						$result = mysqli_query($conn, $query);			
            if($result->num_rows==0)
							echo("Nessun risultato!");
						else{
							echo("<table><caption><p>Lista Riparazioni</p></caption>");
							echo"<thead><tr><th>Num.Telaio</th><th>Descrizione</th><th>Costo</th><th>Data</th><th>Ora</th><th>Interventi</th></tr></thead>";

							while($row = $result->fetch_assoc()) {
								echo "<tr><td>".$row['Numero_Telaio']."</td><td>".$row['descrizione']."</td><td>".$row['costorip']."</td><td>".$row['dataInizio']."</td><td>".$row['ora']."</td><td><a href='gestInterRip.php?idrip=$row[Id_Riparazione]'><img class='miniicon' src='../../img/zoom.png'></img></a></td></tr>";
							}		
							echo("</table>");
					}
					// liberazione delle risorse occupate dal risultato	
					$result->free();
		}
		echo file_get_contents("gestioneRiparazioniDipendenti2.txt");
					$telaioq="select Num_Telaio from Auto";
					$telaio=mysqli_query($conn,$telaioq);
					if($telaio && $telaio->num_rows>0){
						while($row=$telaio->fetch_assoc()){
							echo"<option value='".$row['Num_Telaio']."'>".$row['Num_Telaio']."</option>";
						}
					}
					echo file_get_contents("gestioneRiparazioniDipendenti3.txt");
echo file_get_contents("../../Template/Footer.txt");?>

