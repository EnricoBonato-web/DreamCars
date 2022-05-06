<?php
echo file_get_contents("formModello1.txt");
	include "../../../config.php";
	$query="SELECT marca, modello FROM Auto ORDER BY marca";
	$result = mysqli_query($conn, $query);
	if($result->num_rows==0)
		echo"<option value='vuoto'>Nessun risultato!</option>";
	else{
		while($row = $result->fetch_assoc()) {
			echo "<option value='".$row['marca']."|". $row['modello']."'>".$row["marca"]." " .$row["modello"]."</option>";
		}// liberazione delle risorse occupate dal risultato
		$result->free();
	}										
echo file_get_contents("formModello2.txt");
            $result = isset($_GET['modello'])? $_GET["modello"]:false;
            if($result){
	        $result_explode = explode('|', $result);
		$modello=$result_explode[1];
		$marca=$result_explode[0];
		echo "<form id='data' action='testDrive.php' method='POST'>
				<fieldset>
					<legend>preferenza data</legend>
					<input type='hidden' name='marca' value='".$marca."'>
					<input type='hidden' name='modello' value='".$modello."'>
					<label for='sceltaData'>Data Preferita</label>
					<input type='text' id='sceltaData' name='sceltaData' value='YYYY-mm-gg'/>
					<input type='submit' value='invia'/>	
				</fieldset>
			</form>";
	}
echo file_get_contents("formModello3.txt");
?>

