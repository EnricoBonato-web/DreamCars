<?php
include "../../config.php";
session_start();
echo file_get_contents("../../Template/HeadBase.txt");
if($_SESSION["dipendente"]){
    echo("Buon lavoro, ".$_SESSION["nome"]." <br/>");
    echo("<a href='../LoginRegistrati/logout.php'>Logout</a>");
}
else{
    echo "<a href='login.html#tab2'><span xml:lang='en' tabindex='1'>Login</span></a>";}

echo file_get_contents("modificaAccountDip.txt");
		$matr=$_SESSION['dipendente'];
		if(isset($_POST['mod']) && $_POST['mod']=="modifica"){
			$okpwd=($_POST['password']==$_POST['password2'] && $_POST['password']!="" && $_POST['password2']!="");
			if($okpwd){			
				$update="update Dipendente set telefono='".$_POST['tel']."', mail='".$_POST['mail']."',password='".$_POST['password']."' where Matricola='".$matr."'";
				$res=mysqli_query($conn,$update);
				if($res)
					echo "dati aggiornati";
				else
					echo "dati non aggiornati";
			}
			else
				echo "errore password";		
		}
		$query="select * from Dipendente where Matricola='".$matr."'";
		$res=mysqli_query($conn,$query);
		$row=$res->fetch_assoc();
	?>
	<div id="ModificaDatiAccount">
		<fieldset>
		<legend>Modifica dati account</legend>
		<form id="modificaAc" action='modificaAccountDip.php' method='POST'>
			<input type='hidden' name='mod' value='modifica'/>
			<p>Telefono</p>
            <input type='text' name='tel' value='<?php echo $row['telefono'];?>' />		
			<p>Mail</p>
            <input type='text' name='mail' value='<?php echo $row['mail'];?>' />		
			<p>Password</p>
            <input type='password' name='password' value='<?php echo $row['password'];?>' />		
			<p>Conferma Password</p>
            <input type='password' name='password2' value='<?php echo $row['password'];?>' />		
			<br/>
            <input type='submit' value='conferma' />		
		</form>
		<form action='gestioneAccountDipendenti.php'>
			<input type='submit' value='annulla'/>
		</form>
		</fieldset>		
	</div>	
    </div>

<?php
	echo file_get_contents("../../Template/Footer.txt");	
?>
