<?php
session_start();
include "../../../config.php";
echo file_get_contents("../../../Template/HeadBase.txt");
if(!$_SESSION["user"]){
    if($_SESSION["dipendente"]){
        echo("Buon lavoro, ".$_SESSION["nome"]. " </br>");
        echo("<a href='../../AreaPersonaleDipendenti/AreaPersonaleDipendenti.php'>Area Personale </a>"." / ");
        echo("<a href='../../LoginRegistrati/logout.php'>Logout</a>");
    }
    else{
        echo"<a href='../../LoginRegistrati/registrati.html'>Registrati</a> /     
        <a href='../../LoginRegistrati/login.html#tab1'><span xml:lang='en' tabindex='1'>Login</span></a>";
    }
}
else{
    echo("Buongiorno, ".$_SESSION["nome"]." ");
    echo("<a href='../../AreaPersonale/areaPersonale.php'><br/>Area Personale </a>"); 
    echo(" / ");
    echo"<a href='../../LoginRegistrati/logout.php'>Logout</a>";
}
echo file_get_contents("testDrive2.txt");
			if(!$_SESSION["nome"])
				echo("
                <div>
                Devi essere registrato per poter prenotare un test drive!</br>
                <a href='../../LoginRegistrati/registrati.html'>
                Registrati</a>
                o effettua il <a href='../../LoginRegistrati/login.html'>Login</a></div>");
			else{
	
	if(isset($_GET['id'])){
		$elimina="delete from Testdrive where Id='".$_GET['id']."'";
		$el=mysqli_query($conn,$elimina);
		if($el)
			echo"eliminazione avvenuta correttamente<br/>";
		else
			echo"eliminazione non avvenuta<br/>";
	}

	if(isset($_POST['sceltaData']) && isset($_POST['modello'])&& isset($_POST['marca'])){
		$data=$_POST["sceltaData"];
		if($data && isset($data)){
			$numtelaioq="select Num_Telaio from Auto where marca='".$_POST['marca']."' and modello='".$_POST['modello']."' and Num_Telaio <> any (select Num_Telaio from StoricoVendite) order by nuova desc";
			$resnumtel=mysqli_query($conn,$numtelaioq);
			if($resnumtel->num_rows<=0)
				echo"non ci sono macchine di quel modello e marca disponibili per il testdrive</br>";
			else{	
				$row=$resnumtel->fetch_assoc();	
				///////////controllo sul testdrive da inserire?
				$insert="insert into Testdrive (Username,Numero_Telaio,Data) values ('".$_SESSION['user']."','".$row['Num_Telaio']."','".$data."')";
				$insertres=mysqli_query($conn,$insert);
				if(!$insertres)
					echo"errore invio dati</br>";
			}
	    	}
	}

	
	$querytestconf="select * from Testdrive, Auto where Username='".$_SESSION["user"]."' and Confirmed='1' and Num_Telaio=Numero_Telaio";
	$resconf=mysqli_query($conn,$querytestconf);
	if($resconf->num_rows>0){
		echo"<table class='TDtab'>
			<caption>Testdrive Confermati</caption>
			<thead><tr><th>Marca</th><th>Modello</th><th>Data</th><th>Ora</th></tr></thead>";
		while($row=$resconf->fetch_assoc()){
			echo"<tr><td>".$row['marca']."</td><td>".$row['modello']."</td><td>".$row['Data']."</td><td>".$row['Ora']."</td></tr>";
		}
		echo"</table>";
	}
	else
		echo"non hai testdrive confermati</br>";
	
	$testdrivenoncq="select * from Testdrive, Auto where Username='".$_SESSION['user']."' and Confirmed='0' and Numero_Telaio=Num_telaio";
	$res=mysqli_query($conn,$testdrivenoncq);
	if($res->num_rows>0){
		echo"<table class='TDtab'>
			<caption>Richieste Testdrive</caption>
			<thead><tr><th>Marca</th><th>Modello</th><th>Data Scelta</th><th>Elimina</th></tr></thead>";
		while($row=$res->fetch_assoc()){
			echo"<tr><td>".$row['marca']."</td><td>".$row['modello']."</td><td>".$row['Data']."</td><td><a href='testDrive.php?id=".$row['Id']."'><img class='miniicon' src='../../../img/bin.png'></img></a></td></tr>";
		}
		echo"</table>";
	}
	else
		echo"non hai richieste testdrive<br/>";

				include "formModello.php";
			}
?></div><?php	
			echo file_get_contents("../../../Template/Footer.txt");	
	 ?>
