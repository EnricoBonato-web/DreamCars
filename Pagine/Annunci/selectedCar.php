<?php
session_start();
echo file_get_contents("../../Template/HeadBase.txt");
			 if(!$_SESSION["user"]){
				 if($_SESSION["dipendente"]){
					echo("Buon lavoro, ".$_SESSION["nome"]. " <br/>");
					echo("<a href='../../AreaPersonaleDipendenti/AreaPersonaleDipendenti.php'>Area personale </a>"." ");
					echo("<a href='../LoginRegistrati/logout.php'>Logout</a>");}
					else{
						echo("<a href='../LoginRegistrati/registrati.html'>Registrati</a> /      <a href='../LoginRegistrati/login.html#tab1'><span xml:lang='en' >Login</span></a>");}
					}
					else{
						echo("Buongiorno, ".$_SESSION["nome"]." <br/>");
						echo("<a href='../AreaPersonaleDipendenti/areaPersonale.php'>Area Personale </a>"); 
						echo("<a href='../LoginRegistrati/logout.php'>Logout</a>");}
						
echo("</div>"."</div>");
require("../../config.php");
$tel=$_GET["telaio"];
$query="SELECT * FROM Auto WHERE Num_Telaio='$tel'";
$res=mysqli_query($conn, $query);
$row=mysqli_fetch_array($res);

if($row["nuova"]==0)
echo("<div id='breadcrumb'>"." <a href='Nuove/nuove.php'>"."Torna alla ricerca"."</a>"."</div>");
else
echo("<div id='breadcrumb'>"." <a href='Usate/usate.php'>"."Torna alla ricerca"."</a>"."</div>");
echo("
    <label for='show-menu' class='show-menu'>Menu</label>
    <input type='checkbox' id='show-menu' role='button'>

    <div id='menu'>
         <ul>
            <a href='../../index.php'><span xml:lang='en' ><li>Home</li></span></a>
            <a href='../../Pagine/Annunci/Nuove/nuove.php' ><li>Nuove</li></a>
            <a href='../../Pagine/Annunci/Usate/usate.php' ><li>Usate</li></a>
            <a href='../../Pagine/Info/info.php'><li>Info</li></a>
            <a href='../../Pagine/AreaPersonale/TestDrive/testDrive.php' ><li>Test Drive</li></a>
            <a href='../../Pagine/ChiSiamo/chiSiamo.php'><li>Chi siamo</li></a>
         </ul>
      </div>
      ");
echo ("
    <div id='contenuto'>
<div id='tabellaAuto' >"."
<img src=/DreamCars/$row[Immagine]>
<table>"."
<tr class='pari'>"."<td>Marca: </td>"."<td>".$row["marca"]."</td>"."</tr>"."
<tr>"."<td>Modello:</td>"."<td>".$row["modello"]."</td>"."</tr>"."
<tr class='pari'>"."<td>Cilindrata:</td>"."<td>".$row["cilindrata"]."</td>"."</tr>"."
<tr>"."<td>Optional:</td>"."<td>".$row["optional"]."</td>"."</tr>"."
<tr class='pari'>"."<td>Alimentazione:</td>"."<td>".$row["alimentazione"]."</td>"."</tr>"."
<tr>"."<td>Km:</td>"."<td>".$row["km_percorsi"]."</td>"."</tr>"."
<tr class='pari'>"."<td>Prezzo:</td>"."<td>".$row["prezzo"]."</td>"."</tr>"."
<tr>"."<td>Colore:</td>"."<td>".$row["Colore"]."</td>"."</tr>"."
</table>".
"<div id='descrizione'><p>Descrizione:</p> ".$row["Descrizione"]."
</div>
</div>
</div>
" );

echo file_get_contents("../../Template/Footer.txt");
?>
