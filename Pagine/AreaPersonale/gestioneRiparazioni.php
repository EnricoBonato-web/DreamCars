<?php
session_start();
include '../../config.php';
echo file_get_contents("../../Template/HeadBase.txt");
if($_SESSION["user"]){ 
    echo("Buongiorno, ".$_SESSION["nome"]." </br>"); 
    echo("<a href='../../Pagine/LoginRegistrati/logout.php'>Logout</a>"); 
} 
echo file_get_contents("GestioneRiparazioni.txt");
        $autoutenteq="select StoricoVendite.Num_Telaio as telaio, Auto.Marca as marca, Auto.Modello as modello from StoricoVendite,Auto,Riparazione where StoricoVendite.Cliente='".$_SESSION["user"]."' and Auto.Num_Telaio=StoricoVendite.Num_Telaio and Riparazione.Numero_Telaio=StoricoVendite.Num_Telaio";
        $autoutente=mysqli_query($conn,$autoutenteq);
        if($autoutente && $autoutente->num_rows>0){
            echo"<h2>le tue auto in assistenza:</h2>";
            while($row=$autoutente->fetch_assoc()){
                echo 
                "<div class='autoInRiparazione'>
                    <p>marca: ".$row['marca']."</p>
                    <p>modello: ".$row['modello']."</p>
                 <a href='listaRiparazioni.php?telaio=$row[telaio]'>
                   <div class='ripa'>visualizza riparazioni</div></a>
                    </div>
  		</a>";
            }
        }
        else
            echo "non hai auto in assistenza"; 
echo file_get_contents("GestioneRiparazioni2.txt");
   echo file_get_contents("../../../Template/Footer.txt") 
?>
<<<<<<< Updated upstream
=======
    </div>
</div>
<?php
    echo file_get_contents("../../Template/Footer.txt");
?>
>>>>>>> Stashed changes
