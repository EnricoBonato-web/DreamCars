<?php
session_start();
include "../../config.php";
echo file_get_contents("../../Template/HeadBase.txt");
    if($_SESSION["dipendente"]){
        echo("Buon lavoro, ".$_SESSION["nome"]. " </br>");
        echo("<a href='../LoginRegistrati/logout.php'>Logout</a>");}
 
echo file_get_contents("rimozione1.txt");

if(!$_SESSION['dipendente'])
    echo("Non sei autorizzato a visualizzare questa pagina");
else{
    echo("<table class='TDtab'>"."<caption><p>Lista delle auto disponibili alla vendita</p></caption>");
    echo("    <thead><tr><th>Marca</th><th>Modello</th><th>Num. Telaio</th><th>Modifica</th><th>Elimina</th></tr></thead>");
    include "../../config.php";
    $query="SELECT marca, modello, Num_Telaio FROM Auto ORDER BY    marca";
    $result = mysqli_query($conn, $query);
    if($result->num_rows==0)
        echo("Nessun risultato!");
    else{
        while($row = $result->fetch_assoc()) {
            echo "<tr>"."<td>".$row['marca']."</td>"."  <td>".$row['modello']."</td>"."<td>".$row['Num_Telaio']."</td>"."<td>".
                "<a href='modificaAnnuncio.php?telaio=$row[Num_Telaio]&marca=$row[marca]&modello=  $row[modello]'><img class='miniicon' src='../../img/key.jpg'></img></a>". "</td>"."<td>". 
                "<a href='remove.php?   telaio=$row[Num_Telaio]'><img class='miniicon' src='../../img/bin.png'></img></a>"."</td>"."   </tr>"; 
        }// liberazione delle risorse occupate dal risultato
        echo("</table>");
        $result->free();
    }
}
?>
<a href='gestioneAnnunci.php'>torna alla gestione annunci</a>
<?php
    echo file_get_contents("../../Template/Footer.txt");
?>
