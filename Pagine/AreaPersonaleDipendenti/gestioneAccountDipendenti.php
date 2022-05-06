<?php
include "../../config.php";
session_start();
echo file_get_contents("../../Template/HeadBase.txt");
if($_SESSION["dipendente"]){
    echo("Buon lavoro, ".$_SESSION["nome"]." </br>");
    echo("<a href='../LoginRegistrati/logout.php'>Logout</a>");
}
else{
    echo "<a href='../LoginRegistrati/login.html#tab2'><span xml:lang='en' tabindex='1'>Login</span></a>";}
	echo file_get_contents("gestioneAccountDipendenti.txt");
		$query="select * from Dipendente where Matricola='".$_SESSION['dipendente']."'";
		$result=mysqli_query($conn,$query);
		$row=$result->fetch_assoc();
?>
   
	<p>Visualizza o modifica qui i dati del tuo account</p>
        
<br/><h2>I tuoi dati</h2>   
	<div id="datiAccount">
		<p>Nome: <?php echo $row['nome'];?></p>		
		<p>Cognome: <?php echo $row['cognome'];?></p>		
		<p>Matricola: <?php echo $row['Matricola'];?></p>		
		<p>Telefono: <?php echo $row['telefono'];?></p>		
		<p>Mail: <?php echo $row['mail'];?></p>		
		<div id="modifica"><a href='modificaAccountDip.php'>Modifica</a></div>
        </div>	
    </div>
<?php
	echo file_get_contents("../../Template/Footer.txt");	
?>
