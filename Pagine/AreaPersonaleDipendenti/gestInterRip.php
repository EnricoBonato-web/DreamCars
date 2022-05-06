<?php 
include "../../config.php"; 
session_start(); 
echo file_get_contents("../../Template/HeadBase.txt");
      if($_SESSION["user"]){ 
        echo("Benvenuto, ".$_SESSION["nome"]." "); 
        echo("<a href='logout.php'>Logout</a>"); 
      } 
	echo file_get_contents("gestInterRip.txt");	
	//id riparazine a cui sono associati gli interventi (sempre inizializzato, serve per la query degli interventi!)
	$idrip=isset($_GET['idrip'])?$_GET['idrip']:false;
	if(!$idrip)
		$idrip=isset($_POST['idrip'])?$_POST['idrip']:false;
	//id intervento da eliminare (tramite get da link)
	$idintelim=$_GET['idintelim'];
	if(isset($idintelim)){
		$remove="delete from Intervento where Id_Intervento='".$idintelim."'";
		$res=mysqli_query($conn,$remove);
		if($res)
			echo"eliminazione avvenuta correttamente";
		else
			echo"eliminazione non avvenuta";
	}
	if(isset($_POST['mod']) &&($_POST['mod']=="inserimento"||$_POST['mod']=="modifica") && $_POST['mod']!="bypass"){
		//parametri per inserimento/modifica
		$intermod=$_POST['idinter'];
		$descrInt=$_POST['descrInt'];
		$ore=$_POST['ore'];
		$mecc=$_POST['mecc'];	
		//query inserimento/modifica			
		if($_POST['mod']=="modifica"){
			$insert="update Intervento set Matricola='".$mecc."', ore='".$ore."', descrizione='".$descrInt."' where Id_Intervento='".$_POST['idinter']."'";
				$res=mysqli_query($conn,$insert);
				if($res)
					echo "modifica avvenuta correttamente";
				else
					echo "modifica non avvenuta";
		}
		else
			if($_POST['mod']=="inserimento"){
				$insert="insert into Intervento (Matricola,Id_Riparazione,descrizione,ore) values ('".$mecc."','".$idrip."','".$descrInt."','".$ore."')";
				$res=mysqli_query($conn,$insert);
				if($res)
					echo "inserimento avvenuto correttamente";
				else
					echo "inserimento non avvenuto";
		}
	}
	if(!$_SESSION['dipendente'])
		echo("Non sei autorizzato a visualizzare questa pagina");
	else{
		$query="SELECT Id_Intervento, Matricola, oretot, descrizione FROM Intervento where Id_Riparazione='".$idrip."' ORDER BY Id_Intervento";
		$result = mysqli_query($conn, $query);
		if($result->num_rows==0)
			echo"Nessun risultato!";
		else{
			echo"<table class='TDtab'><caption><p>Lista Interventi</p></caption>";
			echo"<thead><tr><th>Descrizione</th><th>Ore</th><th>Meccanico</th><th>Modifica</th><th>Elimina</th></tr></thead>";
			while($row = $result->fetch_assoc()){
						echo "<tr>
						<td>".$row['descrizione']."</td>
						<td>".$row['oretot']."</td>
						<td>".$row['Matricola']."</td>
						<td><a href='modificaInter.php?idinter=$row[Id_Intervento]'><img class='miniicon' src='../../img/key.jpg'></img></a></td>
						<td><a href='gestInterRip.php?idrip=$idrip&idintelim=$row[Id_Intervento]'><img class='miniicon' src='../../img/bin.png'></img></a></td>
						</tr>";
			}
			echo("</table>");
		}
		// liberazione delle risorse occupate dal risultato
		$result->free();					
	}
?>
	<div id='formInserimento'>
		<fieldset>
		<legend>Nuovo Intervento</legend>
		<form action="gestInterRip.php" method="POST">		
				<input type='hidden' name='mod' value='inserimento' />				
				<input type='hidden' name='idrip' value='<?php echo $idrip;?>' />			 			
				<label for="descrInt">Descrizione:</label>
				<input type="text" name="descrInt" value=""/></br>
				<label for="ore">Ore:</label>
				<input name="ore" type="text" value=""/></br>
				<label for="mecc">Meccanico:</label>
				<input name="mecc" type="text" value=""/></br>
				<input type="submit" value="aggiungi" />			
		</form>	
		</fieldset>
		<a href="gestioneRiparazioniDipendenti.php">torna alle riparazioni</a>
	</div> 
</div><?php
echo file_get_contents("../../Template/Footer.txt");
?>
