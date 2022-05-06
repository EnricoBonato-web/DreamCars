<?php 
include "../../config.php"; 
session_start(); 
echo file_get_contents("../../Template/HeadBase.txt");
      if($_SESSION["user"]){ 
        echo("Benvenuto, ".$_SESSION["nome"]." "); 
        echo("<a href='logout.php'>Logout</a>"); 
      } 
?>   
     </div> 
</div>
        <div id="breadcrumb"> 
        Ti trovi in: <a href="../../index.php" tabindex="2">Home</a> / <a href="../AreaPersonaleDipendenti/AreaPersonaleDipendenti.php" tabindex="1">Area Personale Dipendenti</a> / Visualizza riparazioni
      </div>
  <label for="show-menu" class="show-menu">Menu</label>
  <input type="checkbox" id="show-menu" role="button">   

  <div id="menu">
    <ul>
        <a href="../../index.php"><span xml:lang="en" > <li>Home</li></span></a>
        <a href="../../Pagine/Annunci/Nuove/nuove.php"> <li>Nuove</li></a>
        <a href="../../Pagine/Annunci/Usate/usate.php"> <li>Usate</li></a>
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
       
  <p>Qui puoi visualizzare lo stato delle tue riparazioni</p> 
<?php 
	$idrip=$_GET['idrip'];
	$query="select * from Riparazione where Id_Riparazione='".$idrip."'";
	$res=mysqli_query($conn,$query);
	$row=$res->fetch_assoc();
?>
	<div id="modifica">
		<fieldset>
		<legend>modifica riparazione</legend>
		<form action='gestioneRiparazioniDipendenti.php' method="POST">
				
				<input type="hidden" name='mod' value="modifica"/>
				<input type="hidden" name="idrip" value='<?php echo $row['Id_Riparazione'];?>'>
				<label for="telaio">telaio:</label>
				<select name='telaio'>
				<?php
					$telaioq="select Num_Telaio from Auto";
					$telaio=mysqli_query($conn,$telaioq);
					if($telaio && $telaio->num_rows>0){
						$primo=true;
						while($row2=$telaio->fetch_assoc()){
							if($primo){
								$primo=false;
								echo"<option value='".$row['Numero_Telaio']."'>".$row['Numero_Telaio']."</option>";
								
							}
							if($row2['Num_Telaio']!=$row['Numero_Telaio'])
								echo"<option value='".$row2['Num_Telaio']."'>".$row2['Num_Telaio']."</option>";
						}
					}
				?>
				</select></br>
				<label for="descr">descrizione:</label>				
				<input type="text" name="descr" value='<?php echo $row['descrizione'];?>' /></br>
				<label for="data">data:</label>
				<input type="text" name="data" value='<?php echo $row['dataInizio'];?>' /></br>
				<label for="ora">ora:</label>
				<input type="text" name="ora" value='<?php echo $row['ora'];?>' /></br>				
				<input type="submit" value="invia" />							
			
		</form>
		<form action='gestioneRiparazioniDipendenti.php' method='POST'>
			<input type="hidden" name='mod' value="bypass"/>
			<input type="hidden" name="idrip" value='<?php echo $row['Id_Riparazione'];?>'>
			<input type="submit" value="annulla" />				
		</form>	
		</fieldset>			

	</div>
 </div>
  <?php echo file_get_contents("../../Template/Footer.txt");?>

