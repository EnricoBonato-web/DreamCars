<?php 
include "config.php"; 
session_start(); 
?><!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="it" lang="it"> 
   <head> 
      <meta http-equiv="Content-type" content="txt/html; charset=utf-8" /> 
      <title> Area Personale </title> 
      <meta name="title" content="Concessionaria Dreamcars" /> 
      <meta name="description" content="" /> 
      <!--da mettere robot.txt che non vogliamo indicizzare i cazzi degli altri su google, meglio tutto nel deepweb--> 
      <link rel="shortcut icon" href="img/logo-min.jpg" /> 
      <link href="style.css" rel="stylesheet" type="text/css"> 
      <link href="print.css" rel="stylesheet" type="text/css" media="print"> 
       <script type="text/javascript"  src="javascript.js"></script> 
   </head> 
   <body onload="start()" > 
      <div id="header"> 
          <img id ="logoDC2" src="img/logoDC2.png" />
         <h1><span xml:lang="en">DreamCars</span></h1>
         
<?php 
      if($_SESSION["user"]){ 
        echo("Benvenuto, ".$_SESSION["nome"]." "); 
        echo("<a href='logout.php'>Logout</a>"); 
      } 
?>   
     </div> 
        <div id="breadcrumb"> 
        Ti trovi in: <a href="home.php" tabindex="2">Home</a> / <a href="areaPersonale.php" tabindex="1">Area Personale</a> / Visualizza riparazioni
      </div> 
    
      <label for="show-menu" class="show-menu">Menu</label>
	  <input type="checkbox" id="show-menu" role="button">
       
      <div id="menu">
         <ul>
            <a href="home.php"><span xml:lang="en" tabindex="2"><li>Home</li></span></a>
            <a href="new.php" tabindex="3"><li>Nuove</li></a>
            <a href="used.php" tabindex="4"><li>Usate</li></a>
            <a href="info.php" tabindex="5"><li>Info</li></a>
	        <a href="testDrive.php" tabindex="7"><li>Test Drive</li></a>
            <a href="chiSiamo.php" tabindex="6"><li>Chi Siamo</li></a>  
	</ul>
      </div>
       
<div id="contenuto"> 
  <div id="funzioniPag">
     <ul id ="listaFunz">
     <li><a href='gestioneAnnunci.php'>Gestione Annunci</a></li>
     <li ><a href="gestioneAccountDipendenti.php" tabindex="8">Gestione Account</a></li>
     <li ><a href="gestioneRiparazioniDipendenti.php">Gestione Riparazioni</a> </li>
     </ul>
    </div>
       
  <p>Qui puoi visualizzare lo stato delle tue riparazioni</p> 
       </div> 

<?php	
					if(!$_SESSION['dipendente'])
						echo("Non sei autorizzato a visualizzare questa pagina");
				else{
						echo("<table>"."<caption><p>Lista Riparazioni</p></caption>");
						echo"<thead><tr><th>Num.Telaio</th><th>Descrizione</th><th>Costo</th><th>Data</th><th>Ora</th><th>Aggiungi Intervento</th><th>Modifica</th><th>Elimina</th></tr></thead>";
						$query="SELECT Id_Riparazione, Numero_Telaio, dataInizio, ora, costo, descrizione FROM Riparazione ORDER BY Id_Riparazione";
						$result = mysqli_query($conn, $query);
						if($result->num_rows==0)
							echo("Nessun risultato!");
						else{
							while($row = $result->fetch_assoc()) {
							echo "<tr><td>".$row['Numero_Telaio']."</td><td>".$row['descrizione']."</td><td>".$row['costo']."</td><td>".$row['dataInizio']."</td><td>".$row['ora']."</td><td><a href='addInterRip.php?id=$row[Id_Riparazione]'>Aggiungi Intervento</a></td><td><a href='modificaSingolaRip.php?id=$row[Id_Riparazione]'>Modifica</a></td><td><a href='removeSingolaRip.php?id=$row[Id_Riparazione]'>Elimina</a></td></tr>"; 
							}// liberazione delle risorse occupate dal risultato
							echo("</table>");
							$result->free();
							}
						}
		?>
		
		
      <footer> 
           <p><small>Il sito è stato creato per un progetto nell'ambito del corso di <a href="http://docenti.math.unipd.it/gaggi/tecweb/">Tecnologie Web</a> </small> 
           </p> 
    </footer> 
    </body> 
</html> 
