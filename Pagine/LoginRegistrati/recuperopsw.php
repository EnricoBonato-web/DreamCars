<?php
require "../../randomString.php";
include "../../config.php";
echo file_get_contents("rpsw1.txt");
echo("<form><p>Inserisci la mail usata nella registrazione:</p><input type='text' name='mail'/><input type='submit' value='Recupera Password'/></form>");

$mail=isset($_GET["mail"])?$_GET["mail"]:false;
$query="SELECT Email FROM Cliente Where Email='$mail'";
$result=mysqli_query($conn,$query);
if($result->num_rows==0)
	echo("mail non presente");
else{
	echo ("la mail è presente nel database");
	


$nome_mittente = "DreamCars staff";
$mail_mittente = "DreamCarsTW@gmail.com";
$mail_destinatario = $mail;


// definisco il subject ed il body della mail
$mail_oggetto = "Recupero password";
$nuovapsw=random_string(8);
$mail_corpo = "Sembra tu abbia perso la password <br/> Niente paura, eccone qui una nuova di zecca: ".$nuovapsw."  potrai cambiarla in seguito nella tua area personale!";

$sql = "UPDATE Cliente SET Pswd='$nuovapsw' WHERE Email='$mail'";
$result=mysqli_query($conn, $sql);
if ($result) {
    echo "Password cambiata";
} else {
    echo "Password non cambiata " . $conn->error;
}

// aggiusto un po' le intestazioni della mail
// E' in questa sezione che deve essere definito il mittente (From)
// ed altri eventuali valori come Cc, Bcc, ReplyTo e X-Mailer
$mail_headers = "From: " .  $nome_mittente . " <" .  $mail_mittente . ">\r\n";
$mail_headers .= "Reply-To: " .  $mail_mittente . "\r\n";
$mail_headers .= "X-Mailer: PHP/" . phpversion();

if (mail($mail_destinatario, $mail_oggetto, $mail_corpo, $mail_headers))
  echo "Messaggio inviato con successo a " . $mail_destinatario;
else
  echo "Errore. Nessun messaggio inviato."; 
}
echo file_get_contents("../Template/Footer.txt");
?>
