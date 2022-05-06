<?php
include "config.php";
$numTel=$_GET["telaio"];
$marca=$_POST["marca"];
$modello=$_POST["modello"];
$prezzo=$_POST["prezzo"];
$alim=$_POST["alimentazione"];
$cilindrata=$_POST["cilindrata"];
$optional=$_POST["optional"];
$km=$_POST["km_percorsi"];
$stato=$_POST["stato"];
$message=$_POST["message"];
$garanzia=$_POST["garanzia"];

if ($_FILES['img']['name']!=""){
$imm="img/".$_FILES['img']['name'];
//percorso della cartella dove mettere i file caricati dagli utenti
$uploaddir = "/var/www/html/DreamCars/img/";

//Recupero il percorso temporaneo del file
$userfile_tmp = $_FILES['img']['tmp_name'];

//recupero il nome originale del file caricato
$userfile_name = $_FILES['img']['name'];

//copio il file dalla sua posizione temporanea alla mia cartella upload
if (move_uploaded_file($userfile_tmp, $uploaddir . $userfile_name)) {
  //Se l'operazione è andata a buon fine...
  echo 'File inviato con successo.';
}else{
  //Se l'operazione è fallta...
  echo 'Upload NON valido!'; 
}

$modify="UPDATE Auto SET Immagine='$imm' WHERE Num_Telaio='$numTel'";
$result=mysqli_query($conn, $modify);

}

$modify="UPDATE Auto SET marca='$marca', modello='$modello', optional='$optional', cilindrata='$cilindrata', 
			alimentazione='$alim', km_percorsi='$km', nuova='$stato', prezzo='$prezzo', mesiGaranzia='$garanzia' WHERE Num_Telaio='$numTel'";		

$result=mysqli_query($conn, $modify);

mysqli_close($conn);
header("Location: ".$_SERVER['HTTP_REFERER']);
	

?>
