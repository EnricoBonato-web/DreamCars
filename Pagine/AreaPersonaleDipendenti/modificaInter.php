<?php 
session_start(); 
include "../../config.php"; 
echo file_get_contents("../../Template/HeadBase.txt");
      if($_SESSION["user"]){ 
        echo("Buon Lavoro, ".$_SESSION["nome"]." "); 
        echo("<a href='../../logout.php'>Logout</a>"); 
      } 
echo file_get_contents("modificaInter.txt");
	$idinter=$_GET['idinter'];	
	$query="select * from Intervento where Id_Intervento='".$idinter."'";
	$result=mysqli_query($conn,$query);
	$row=$result->fetch_assoc();
?>
	<div id='formModifica'>
		<fieldset>
		<form action="gestInterRip.php" method="POST">
				<legend>modifica Intervento</legend>
				<input type='hidden' name='mod' value="modifica" />			 				        				<input type='hidden' name='idrip' value='<?php echo $row['Id_Riparazione'];?>' />						
				<input type='hidden' name='idinter' value='<?php echo $idinter;?>' />			 			
				<label for="descrInt">Descrizione:</label>
				<input type="text" name="descrInt" value='<?php echo $row['descrizione'];?>'  /><br/>
				<label for="ore">Ore:</label>
				<input name="ore" type="text" value='<?php echo $row['oretot'];?>' /><br/>
				<label for="mecc">Meccanico:</label>
				<input name="mecc" type="text" value='<?php echo $row['Matricola'];?>' /><br/>
				<input type="submit" value="invia" />
		</form>	
		<form action='gestInterRip.php' method='POST'>
				<input type="hidden" name='mod' value="bypass"/>				
				<input type="hidden" name="idrip" value='<?php echo $row['Id_Riparazione'];?>'>
				<input type="submit" value="annulla" />				
		</form>
		</fieldset>							
	</div> 
</div> 
<?php
echo file_get_contents("../../Template/Footer.txt");
?>
