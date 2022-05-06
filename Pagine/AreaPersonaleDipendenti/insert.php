<?php
include "../../config.php";
$numTel=$_POST["numTel"];
$marca=$_POST["marca"];
$modello=$_POST["modello"];
$prezzo=$_POST["prezzo"];
$alim=$_POST["alim"];
$cilindrata=$_POST["cilindrata"];
$optional=$_POST["optional"];
$km=$_POST["km"];
$stato=$_POST["stato"];
$message=$_POST["message"];
$garanzia=12;

//per prima cosa verifico che il file sia stato effettivamente caricato
if (!isset($_FILES['userfile']) || !is_uploaded_file($_FILES['userfile']['tmp_name'])) {
  echo 'Non hai inviato nessun file...';
  exit;    
}

//percorso della cartella dove mettere i file caricati dagli utenti
$uploaddir = "/DreamCars/img/";



//Recupero il percorso temporaneo del file
$userfile_tmp = $_FILES['userfile']['tmp_name'];

//recupero il nome originale del file caricato
$userfile_name = $_FILES['userfile']['name'];

//copio il file dalla sua posizione temporanea alla mia cartella upload
if (move_uploaded_file($userfile_tmp, $uploaddir . $userfile_name)) {
  //Se l'operazione è andata a buon fine...
  echo 'File inviato con successo.';
}else{
  //Se l'operazione è fallta...
  echo 'Upload NON valido!'; 
}

$imm="/img/".$_FILES['userfile']['name'];
echo $imm;

if($stato==0)
	$garanzia=24;

$insert="INSERT INTO Auto (Num_Telaio, marca, modello, optional, cilindrata, alimentazione, km_percorsi, nuova, prezzo, mesiGaranzia, Descrizione, Id_Filiale, Immagine)
		VALUES ('$numTel', '$marca','$modello', '$optional', '$cilindrata', '$alim', '$km', '$stato', '$prezzo', '$garanzia', '$message', '1', '$imm')";	
echo $insert;	

$result=mysqli_query($conn, $insert);
if($result)
	$a='inserimento avvenuto correttamente';
else
		$a='non eseguito';

echo $a;			
		
mysqli_close($conn);
header("Location: ".$_SERVER['HTTP_REFERER']);
	

?>
