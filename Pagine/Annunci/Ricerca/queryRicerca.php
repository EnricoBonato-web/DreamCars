<?php
session_start();
echo file_get_contents("../../../Template/HeadBase.txt");
if(!$_SESSION["user"]){
    if($_SESSION["dipendente"]){
        echo("Buon lavoro, ".$_SESSION["nome"]."</br>");
        echo("<a href='../../AreaPersonaleDipendenti/AreaPersonaleDipendenti.php'>Area Personale </a>"." /");
        echo("<a href='../../LoginRegistrati/logout.php'>Logout</a>");
    }
    else{
        echo("<a href='../../LoginRegistrati/registrati.html'>Registrati</a> /     
        <a href='../../LoginRegistrati/login.html#tab1'><span xml:lang='en' tabindex='1'>Login</span></a>");
    }
}
else{
    echo("Buongiorno, ".$_SESSION["nome"]."");
    echo("<a href='../../AreaPersonale/areaPersonale.php'><br/>Area Personale </a>"); 
    echo(" / ");
    echo("<a href='../../LoginRegistrati/logout.php'>Logout</a>");
};
echo file_get_contents("ricerca2.txt");
include "../../../config.php"; 
$pagina=1;
if(isset($_GET['page'])){
    $pagina=$_GET["page"];
}

$res="select count(Num_Telaio)as conta FROM Auto WHERE Num_Telaio NOT IN(select Num_Telaio from StoricoVendite)";
$result =mysqli_query($conn, $res);
$row=$result->fetch_assoc();
$conta=$row["conta"];
$sql = "SELECT Num_Telaio, marca, modello, prezzo, Immagine FROM Auto WHERE Num_Telaio NOT IN(select Num_Telaio from StoricoVendite) and ";

if(isset($_GET['marca'])&& !empty($_GET['marca']))
$sql.=" marca='".$_GET['marca']."' ";

if(isset($_GET['tipo']))
$sql.=" alimentazione='".$_GET['tipo']."' ";

if(isset($_GET['nuova']))
$sql.=" nuova='".$_GET['nuova']."' ";

if(isset($_GET['prezzo']))
$sql.=" prezzo <='".$_GET['prezzo']."' ";



$sql.= " limit 10 offset ".($pagina-1)*10;
echo $sql;
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<a href='../selectedCar.php?telaio=$row[Num_Telaio]'><div class='nuova'>"."<h1 id='marca'>". $row["marca"]."</h1>". "<h2 id='modello'>" . $row["modello"]."</h2>"; 
        echo "<img class='fotoNuove' src='../../../".$row["Immagine"]."'></img>";
        echo "<button class='button' style='vertical-align:middle'><span>Scopri</span></button>"; 
        echo "<h3 id='prezzo'>". $row["prezzo"]." ".???."</h3>"."</div>"."</a>";
    }
    echo"<div id='navigatori'>";
    if($pagina>1){
        echo "<div id='precedente' ><a href='queryRicerca.php?page=". ($pagina-1) ."'><div>Precedente</div></a></div> ";   
    }
    else{
        echo"<div id='precedente' >Precedente</div>";
    }
    echo "<div id='pag'>pag. ".$pagina." / ".ceil($conta/10)."</div>";
    if($conta>10*($pagina)){
        echo "<div id='successivo' > <a href='queryRicerca.php?page=". ($pagina+1) ."'><div>Successiva</a></div>";}
    else{
        echo" <div id='successivo' >Successiva </div>";
    }
    echo"</div>";
}else    {
    echo "0 results";
}
echo file_get_contents("../../../Template/Footer.txt"); 
?>
