<?php
include "../../config.php";
session_start();
echo file_get_contents("../../Template/HeadBase.txt");
if($_SESSION["dipendente"]){
    echo("Buon lavoro, ".$_SESSION["nome"]." </br>");
    echo("<a href='../LoginRegistrati/logout.php'>Logout</a>");
}
else{
    echo "<a href='login.html#tab2'><span xml:lang='en' tabindex='1'>Login</span></a>";}
	echo file_get_contents("gestioneTestDrive.txt");	
		//////conferma
		if(isset($_GET['idconf'])){
			$update="update Testdrive set Confirmed='1' where Id='".$_GET['idconf']."'";
			$res=mysqli_query($conn,$update);
			if($res)
				echo"testdrive confermato</br>";
			else
				echo"testdrive non confermato</br>";
		}		
		//////inserimento/modifica
		if(isset($_POST['username']) && isset($_POST['telaio']) && isset($_POST['data']) && isset($_POST['ora'])){
			$ins="";
			if(!isset($_POST['idtdm']))////caso inserimento		
				$ins="insert into Testdrive (Username,Numero_Telaio,Data,Ora) values ('".$_POST['username']."','".$_POST['telaio']."','".$_POST['data']."','".$_POST['ora']."')";
			else///caso modifica
				$ins="update Testdrive set Username='".$_POST['username']."',Numero_Telaio='".$_POST['telaio']."', Data='".$_POST['data']."', Ora='".$_POST['ora']."' where Id='".$_POST['idtdm']."'";			
			
			$result=mysqli_query($conn,$ins);
			if($result){
				if(!isset($_POST['idtdm']))
					echo"inserimento avvenuto correttamente</br>";
				else
					echo"modifica avvenuta correttamente</br>";			
			}			
			else
				if(!isset($_POST['idtdm']))
					echo"inserimento non avvenuto</br>";
				else
					echo"modifica non avvenuta</br>";		
		}
		/////////eliminazione		
		if(isset($_GET['idtd'])){
			$remove="delete from Testdrive where Id='".$_GET['idtd']."'";
			$res=mysqli_query($conn,$remove);
			if($res)
				echo"eliminazione avvenuta correttamente</br>";
			else
				echo"eliminazione non avvenuta</br>";	
		}	
		echo "<div id='tabellaTestdrive'>";
		$testdrive="select * from Testdrive where Confirmed='1' order by Username";
		$res=mysqli_query($conn,$testdrive);
		if($res && $res->num_rows>0){
				echo file_get_contents("gestioneTestDrive2.txt");
			while($row=$res->fetch_assoc()){
				echo"<tr>
					<td>".$row['Username']."</td>
					<td>".$row['Numero_Telaio']."</td>
					<td>".$row['Data']."</td>				
					<td>".$row['Ora']."</td>
					<td><a href='modificaTestdrive.php?idtd=$row[Id]'><img class='miniicon' src='../../img/key.jpg'></img></a></td>
					<td><a href='gestioneTestDrive.php?idtd=$row[Id]'><img class='miniicon' src='../../img/bin.png'></img></a></td>				
				</tr>";				
			}
			?>
			</table>
			<?php			
		}
		else
			echo"non ci sono test drive confermati</br>";
		$testdrive="select * from Testdrive where Confirmed='0' order by Username";
		$res=mysqli_query($conn,$testdrive);
		if($res && $res->num_rows>0){
			echo file_get_contents("gestioneTestDrive3.txt");
			while($row=$res->fetch_assoc()){
				echo"<tr>
					<td>".$row['Username']."</td>
					<td>".$row['Numero_Telaio']."</td>
					<td>".$row['Data']."</td>
					<td>".$row['Ora']."</td>
					<td><a href='modificaTestdrive.php?idtd=$row[Id]'><img class='miniicon' src='../../img/key.jpg'></a></td>
					<td><a href='gestioneTestDrive.php?idtd=$row[Id]'><img class='miniicon' src='../../img/bin.png'></img></a></td>	
					<td><a href='gestioneTestDrive.php?idconf=$row[Id]'><img class='miniicon' src='../../img/confirm.jpg'></img></a></td>											
				</tr>";		
			}
			echo "</table>";			
		}
		else
			echo"non ci sono testdrive da confermare</br>";			
			echo file_get_contents("gestioneTestDrive4.txt");
				$usernameq="select Username from Cliente";
				$user=mysqli_query($conn,$usernameq);
				if($user && $user->num_rows>0){
					while($row=$user->fetch_assoc()){
						echo"<option value='".$row['Username']."'>".$row['Username']."</option>";
					}
				}
				echo file_get_contents("gestioneTestDrive5.txt");
				$telaioq="select Num_Telaio from Auto";
				$telaio=mysqli_query($conn,$telaioq);
				if($telaio && $telaio->num_rows>0){
					while($row=$telaio->fetch_assoc()){
						echo"<option value='".$row['Num_Telaio']."'>".$row['Num_Telaio']."</option>";
					}
				}
			
		echo file_get_contents("gestioneTestDrive6.txt");
echo file_get_contents("../../Template/Footer.txt");
?>
