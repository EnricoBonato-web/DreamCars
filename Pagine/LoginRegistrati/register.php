<?php
//inclusione file di connessione
include_once("./resources/include/config.php");

//zona con eccezioni
try{
//controllo che non sia stati lasciati campi vuoti o ci siano spazi in nome e cognome
 if ($_POST['nome']!='' && !preg_match("/^(\s)+$/",$_POST['nome']) && $_POST['cognome']!='' && !preg_match("/^(\s)+$/",$_POST['cognome']) && $_POST['email']!='' && $_POST['password']!='')
 {
//dichiarazione variabili
     $nome = $_POST['nome'];
     $cognome = $_POST['cognome'];
     $email = $_POST['email'];
     $password = $_POST['password'];
//controllo che la password e la mail inseriti rispetti le policy
     if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$email) || !preg_match("/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/",$password))
     {
         //sollevo eccezione
         throw new Exception("Invalid mail and/or password format");
     }
     else{
         
//controllo che la email inserita non sia già presente nel database     
        $result = $conn->query("SELECT email FROM utenti
	WHERE email='".$email."' ");
	
	if($result->num_rows != 0){
		//sollevo eccezione
         throw new Exception("Mail already exist");
	}
        else{
 //inserisco i dati nel database       
        $sql = "INSERT INTO utenti (nome, cognome, email, password) VALUES ('".$nome."','".$cognome."','".$email."', MD5('".$password."'))";
//controllo la connessione
        if ($conn->query($sql) == TRUE) {
            header("Refresh: 3; url = index.php");
            echo '<div align="center">Nuovo utente creato ... attendi il reindirizzamento</div>';
        } else {
            //sollevo eccezione
            throw new Exception("Connection Failure");
        }
        
	   }
    }
 }
//se è stato lasciato un campo vuoto
else{
      header("Refresh: 3; url = register.html");
        echo '<div align="center">Uno o più campi dati risultano vuoti ... attendi il reindirizzamento</div>';  
    }
    
}
//
catch(Exception $e){echo $e->getMessage();}


$conn->close();
?>
