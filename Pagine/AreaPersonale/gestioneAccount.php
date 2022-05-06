<?php
include "../../config.php";
session_start();
echo file_get_contents("../../Template/HeadBase.txt");
if($_SESSION["user"]){
    echo("Buongiorno, ".$_SESSION["nome"]." <br/>");
    echo("<a href='../LoginRegistrati/logout.php'>Logout</a>");
}
else{
    echo "<a href='../LoginRegistrati/login.html#tab1'><span xml:lang='en' tabindex='1'>Login</span></a>";
}
echo file_get_contents("GestioneAccount.txt");	
		$query="select * from Cliente where Username='".$_SESSION['user']."'";
		$result=mysqli_query($conn,$query);
		$row=$result->fetch_assoc();
?>
	<p>Visualizza o modifica qui i dati del tuo account</p>
		<h2>i tuoi dati</h2>
	<div id="datiAccount">
		<p>Nome: <?php echo $row['Nome'];?></p>		
		<p>Cognome: <?php echo $row['Cognome'];?></p>			
		<p>Telefono: <?php echo $row['Telefono'];?></p>		
		<p>Mail: <?php echo $row['Email'];?></p>
	   <div id="modifica">    <a href='modificaAccount.php'>modifica</a></div>		
	</div>	
    </div>
<?php
	echo file_get_contents("../../Template/Footer.txt");	
?>
