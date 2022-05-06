<?php
$sql = "UPDATE Cliente SET Pswd='$nuovapsw' WHERE Email='$mail'";
echo $sql;
$result=mysqli_query($conn, $sql);
if ($result) {
    echo "Password cambiata";
} else {
    echo "Password non cambiata " . $conn->error;
}
?>


