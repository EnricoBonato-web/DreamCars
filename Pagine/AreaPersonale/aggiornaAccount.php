<?php
session_start();
include "../../config.php";

	function okMail($mail){
		
		return  preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$mail);
	}
	function okTel($telefono){
		
		return preg_match("/^([0-9]{9,10})$/",$telefono);
	}

	$tel=$_POST["telefono"];
	$pwd=$_POST["password"];
	$pwd2=$_POST["password2"];
	$email=$_POST["email"];
	$user=$_SESSION["user"];
	
	$msgPwd="";	
	$msgEmail="";
	$msgTel="";

	if($pwd!="" && $pwd2!=""){
		if(strlen($pwd)>6){		
			if($pwd==$pwd2){//aggiungere il controllo della password!
				$query="UPDATE Cliente SET Pswd='$pwd' WHERE Username='".$_SESSION["user"]."'";
				$result=mysqli_query($conn,$query);	
				if($result)
					$msgPwd="password cambiata con successo";
				else
					$msgPwd="password non modificata";
			}
			else
				$msgPwd="Password non combaciano";
		}
		else
  			$msgPwd="password non lunga abbastanza, deve essere almeno di 7 cifre";
	}
	else
		if($pwd=="" && $pwd2!="")
			$msgPwd="inserire prima la nuova password e poi confermarla";
		else
			if($pwd!="" && $pwd2=="")
				$msgPwd="conferma la Password!";		
			
	if($email!=""){
		if(okMail($email)){
			$query="UPDATE Cliente SET Email='$email' WHERE Username='".$_SESSION["user"]."'";
			$result=mysqli_query($conn,$query);	
			if($result)
				$msgEmail="tutto ok mail";
			else
				$msgEmail="no mail";
		}
		else	
			$msgEmail="email non va bene, riprova!";
	}
		
	if($tel!=""){
		if(okTel($tel)){
			$query="UPDATE Cliente SET Telefono='$tel' WHERE Username='".$_SESSION["user"]."'";
			$result=mysqli_query($conn,$query);	
			if($result)
				$msgTel="telefono modificato con successo";
			else
				$msgTel="telefono non modificato";
		}		
		else	
			$msgTel="telefono non valido";
	}
	///////////////////////////////////////////////////////////////modifica Account
echo file_get_contents("../../Template/HeadBase.txt");
if($_SESSION["user"]){
				echo("Benvenuto, ".$_SESSION["nome"]." ");
				echo("<a href='../../Pagine/LoginRegistrati/logout.php'>Logout</a>");
			} 
		echo file_get_contents("AggiornaAccount.txt");
		echo $msgPwd."</br>";
		echo $msgEmail."</br>";
		echo $msgTel."</br>";

		$query="select * from Cliente where Username='".$_SESSION["user"]."'";
		$res=mysqli_query($conn,$query);
		$row=$res->fetch_assoc();		
	?>
		<div id=modificaAccount>
	<fieldset>
	<legend>Modifica Dati Personali</legend>
        <form action="aggiornaAccount.php" name ="campireg" method="POST">
            <!--<p>Nome</p>
            <input name="nome" id="nome" type="text" onblur="" />
            <p>Cognome</p>
            <input name="cognome" id="cognome" type="text" onblur="" /><br>
            <p>Data di Nascita</p>
            <input id="datanascita" type="text" onblur="" /><br>
            <p>Username</p>
            <input name="username" id="username" type="text" onblur="" /><br>-->
	    <label for="telefono">Nuovo Telefono:</label>
            <input  name="telefono" id="telefono" type="text" value='<?php echo $row['Telefono'];?>' onblur=""/><br>
            <label for="email">Nuova Mail:</label>
	    <input name="email" id="email" type="text" value='<?php echo $row['Email'];?>' onblur=""/><br>
            <!--<input type="radio" name="gender" value="male" checked> Male<br>
            <input type="radio" name="gender" value="female"> Female<br>
            <input type="radio" name="gender" value="other"> Other<br>-->
	    <label for="password">Nuova Password:</label>
	    <input name="password" id="password" type="password" value='<?php echo $row['Pswd'];?>' onblur="" /><br>
	    <label for="password2">Conferma password:</label>
	    <input name="password2" id="password2" type="password" value='<?php echo $row['Pswd'];?>' onblur=""/><br>
	    <input type="submit" value="Salva" onclick="checkInput()"/>
            <!-- da inserire la mail!(magari anche nel database che non ricordo se ce' e da fare la gestione account)-->
	</form>
	</fieldset>	
	</div>
	<a href='gestioneAccount.php'>indietro</a>
    </div>
<?php
echo file_get_contents("../../Template/Footer.txt");
?>


