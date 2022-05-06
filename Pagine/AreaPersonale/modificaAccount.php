<?php
session_start();
include "../../config.php";
echo file_get_contents("../../Template/HeadBase.txt");
if($_SESSION["user"]){
				echo("Buongiorno, ".$_SESSION["nome"]." <br/>");
				echo("<a href='../../Pagine/LoginRegistrati/logout.php'>Logout</a>");
			}
		echo file_get_contents("modificaAccount.txt");

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
	    <label for="password2">Conferma password:</p>
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
