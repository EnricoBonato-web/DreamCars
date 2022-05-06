<?php
	include "../../../config.php"; 
	$sql = "SELECT marca, modello, prezzo, Immagine FROM Auto WHERE Nuova=0";
	$result = mysqli_query($conn, $sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			  echo "<div class='nuova'>"."<h1 id='marca'>". $row["marca"]."</h1>". "<h2 id=modello>" . $row["modello"]."</h2>"; ?> 
				<img class="fotoNuove" src="../../../<?php echo $row["Immagine"]; ?>"></img> <?php echo "<h3 id='prezzo'>". $row["prezzo"]." ".€."</h3>"."</div>";
		}
	} else {
		echo "0 results";
	}
	?>
