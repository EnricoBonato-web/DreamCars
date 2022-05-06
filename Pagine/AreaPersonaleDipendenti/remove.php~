<?php
	include "../../config.php";
		$result = isset($_GET['telaio'])? $_GET["telaio"]:false;
		if($result){
			//risalgo all'immagine e la elimino dal server
			$query="SELECT Immagine FROM Auto WHERE Num_Telaio='$result'";
			$res = mysqli_query($conn, $query);
			$row=$res->fetch_assoc();
			$imm=$row["Immagine"];
			echo "ok";
			unlink($imm);
			//elimino la tupla
			$delete="DELETE FROM Auto WHERE Num_Telaio='".$result."'";
			$res=mysqli_query($conn, $delete);
			header("Location: ".$_SERVER['HTTP_REFERER']);
			echo "qualcosa";
		}
		else{
			echo "Qualcosa è andato storto";}

?>
