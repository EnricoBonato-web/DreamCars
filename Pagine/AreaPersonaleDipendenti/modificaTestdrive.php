<?php
include "../../config.php";
session_start();
echo file_get_contents("../../Template/HeadBase.txt");
if($_SESSION["dipendente"]){
    echo("Buon lavoro, ".$_SESSION["nome"]." </br>");
    echo("<a href='../LoginRegistrati/logout.php'>Logout</a>");
}
else{
    echo "<a href='login.html#tab2'><span xml:lang='en' tabindex='1'>Login</span></a>";}
?>
</div>
       <div id="breadcrumb">
        Ti trovi in: <a href="../../index.php">Home</a> / Area Personale Dipendenti
      </div>

<label for="show-menu" class="show-menu">Menu</label>
<input type="checkbox" id="show-menu" role="button">

    <div id="menu">
         <ul>
            <a href="../../index.php"><span xml:lang="en" ><li>Home</li></span></a>
            <a href="../../Pagine/Annunci/Nuove/nuove.php"><li>Nuove</li></a>
            <a href="../../Pagine/Annunci/Usate/usate.php"><li>Usate</li></a>
            <a href="../../Pagine/Info/info.php" ><li>Info</li></a>
	        <a href="../../Pagine/AreaPersonale/TestDrive/testDrive.php" ><li>Test Drive</li></a>
            <a href="../../Pagine/ChiSiamo/chiSiamo.php"><li>Chi Siamo</li></a>  
	</ul>
      </div>    
    
<div id="contenuto">
     <div id="funzioniPag">
     <ul id ="listaFunz">
     <li><a href='gestioneTestDrive.php'>Gestione Testdrive</a></li>
     <li><a href='gestioneAnnunci.php'>Gestione Annunci</a></li>
     <li ><a href="gestioneAccountDipendenti.php" tabindex="8">Gestione Account</a></li>
     <li ><a href="gestioneRiparazioniDipendenti.php">Gestione Riparazioni</a> </li>
     </ul>
    </div>

	<?php
		//carica i dati testdrive da modificare
		if(isset($_GET['idtd'])){
			$query="select * from Testdrive where Id='".$_GET['idtd']."'";
			$res=mysqli_query($conn,$query);
			$td=$res->fetch_assoc();		
		}
		
	?>
	<div id='formTestdrive'>
		<fieldset>
		<legend>modifica testdrive</legend>		
		<form action="gestioneTestDrive.php" method="POST">			
			<input type='hidden' name='idtdm' value='<?php echo $td['Id'];?>' />			
			<label for='username'>username:</label>
			<select name='username' />
			<?php
				$usernameq="select Username from Cliente";
				$user=mysqli_query($conn,$usernameq);
				if($user && $user->num_rows>0){
					$first=true;
					while($row=$user->fetch_assoc()){
						if($first){
							echo"<option value='".$td['Username']."'>".$td['Username']."</option>";
							$first=false;						
						}
						if($row['Username']!=$td['Username'])							
							echo"<option value='".$row['Username']."'>".$row['Username']."</option>";
					}
				}
			?>						
			</select></br>
			<label for='telaio'>telaio:</label>			
			<select name='telaio'>
			<?php
				$telaioq="select Num_Telaio from Auto";
				$telaio=mysqli_query($conn,$telaioq);
				if($telaio && $telaio->num_rows>0){
					$first=true;
					while($row=$telaio->fetch_assoc()){
						if($first){
							echo"<option value='".$td['Numero_Telaio']."'>".$td['Numero_Telaio']."</option>";
							$first=false;
						}
						if($row['Num_Telaio']!=$td['Numero_Telaio'])
							echo"<option value='".$row['Num_Telaio']."'>".$row['Num_Telaio']."</option>";
					}
				}
			?>
			</select></br>
			<label for='data'>data:</label>
			<input type="text" name='data' value='<?php echo $td['Data']?>' /></br>
			<label for='ora'>ora:</label>			
			<input type="text" name='ora' value='<?php echo $td['Ora']; ?>' /></br>
			<input type="submit" value="invia">
		</form>
		<form action="gestioneTestDrive.php" method="POST">
			<input type='submit' value="annulla"/>		
		</form>
		</fieldset> 
	</div>
</div>
<?php
echo file_get_contents("../../Template/Footer.txt");
?>
