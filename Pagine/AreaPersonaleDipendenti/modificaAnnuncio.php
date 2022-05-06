<?php
session_start();
include "../../config.php";
echo file_get_contents("../../Template/HeadBase.txt");
if($_SESSION["dipendente"]){
        echo("Buon lavoro, ".$_SESSION["nome"]. " </br>");
        echo("<a href='../LoginRegistrati/logout.php'>Logout</a>");
}
else{
    echo("<a href='registrati.html'>Registrati</a> /             
    <a href='login.html#tab1'><span xml:lang='en' tabindex='1'>Login</span></a>");
}
echo file_get_contents("modificaAccount.txt");
    $telaio=$_GET["telaio"];
    echo"Modifica dei dati dell'auto con numero di telaio= \"$telaio\"";
    $query="SELECT * FROM Auto WHERE Num_Telaio='$telaio'";
    $result=mysqli_query($conn, $query);
    $row=mysqli_fetch_assoc($result);
    echo ("<form action='modify.php?telaio=$telaio' method='post' enctype='multipart/form-data'>"."<p>Modifica modello:</p>"."<input type='text'    name='modello' value='".$row['modello']."'/>".
          "<p>Modifica marca:</p>"."<input type='text' name='marca' value='".$row['marca']."' />".
          "<p>Modifica optional:</p><input type='text' name='optional' value='".$row['optional']."' />".
          "<p>Modifica cilindrata:</p>"."<input type='text' name='cilindrata' value='".$row['cilindrata']."'/>".
          "<p>Modifica alimentazione:</p>"."<input type='text' name='alimentazione' value='".$row['alimentazione']."'/>".
          "<p>Modifica kilometraggio:</p>"."<input type='text' name='km_percorsi' value='".$row['km_percorsi']."' />".
          "<p>Modifica stato:</p>"."<input type='text' name='stato' value='".$row['nuova']."' />".
          "<p>Modifica prezzo:</p>"."<input type='text' name='prezzo' value='".$row['prezzo']."' />".
          "<p>Modifica garanzia:</p>"."<input type='text' name='garanzia' value='".$row['mesiGaranzia']."' />".
          "<p>Modifica immagine:</p>"."<input name='img' type='file'/>".
          "<input type='submit' value='Inserisci annuncio' />"."</form>
	  <form action='rimozione.php'>
		<input type='submit' value='annulla'/>
	 </form>  </div>");

echo file_get_contents("../../Template/Footer.txt");
?>	
