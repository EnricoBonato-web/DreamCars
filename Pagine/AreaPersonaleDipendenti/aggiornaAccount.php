<?php
session_start();
	include "../../config.php";

	function okMail($mail){
		return  preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$mail);
	}
	function okTel($telefono){
		return preg_match("/^/d(?=.{9,10})$/",$telefono);
	}

	$tel=$_POST["telefono"];
	$pwd=$_POST["password"];
	$pwd2=$_POST["password2"];
	$email=$_POST["email"];
	$user=$_SESSION["user"];

	if($pwd!="" && $pwd2!=""){
		if($pwd.lenght()>6){		
			if($pwd==$pwd2){//aggiungere il controllo della password!
				$query="UPDATE Cliente SET Pswd='$pwd' WHERE Username='".$_SESSION["user"]."'";
				$result=mysqli_query($conn,$query);	
				if($result)
					echo("tutto ok pswd");
				else
					echo("nooooo pswd");
			}
			else
				echo("Password non combaciano");
		}
		else
  			echo("password non lunga abbastanza, deve essere almeno di 7 cifre");
	}
	else
		if($pwd=="" && $pwd2!="")
			echo("inserire prima la nuova password e poi conferma");
		else
			if($pwd!="" && $pwd2=="")
				echo("conferma la Password!");		
				
	if($email!=""){
		if(okMail($email)){
			$query="UPDATE Cliente SET Email='$email' WHERE Username='".$_SESSION["user"]."'";
			$result=mysqli_query($conn,$query);	
			if($result)
				echo("tutto ok mail");
			else
				echo("nooooo mail");
		}
		else	
			echo("email no va bene, riprova!");
	}
		
	if($tel!=""){
		if(okTel($tel)){
			$query="UPDATE Cliente SET Tel='$tel' WHERE Username='".$_SESSION["user"]."'";
			$result=mysqli_query($conn,$query);	
			if($result)
				echo("tutto ok telefono");
			else
				echo("nooooo telefono");
		}		
		else	
			echo("telefono non valido");
	}
			
?>
