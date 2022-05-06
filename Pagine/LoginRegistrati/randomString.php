<?php
 
// genera una stringa casuale della lunghezza desiderata
 
function random_string($length) {
    $string = "";
 
    // genera una stringa casuale che ha lunghezza
    // uguale al multiplo di 32 successivo a $length
    for ($i = 0; $i <= ($length/32); $i++)
        $string .= md5(time()+rand(0,99));
 
    // indice di partenza limite
    $max_start_index = (32*$i)-$length;
 
    // seleziona la stringa, utilizzando come indice iniziale
    // un valore tra 0 e $max_start_point
    $random_string = substr($string, rand(0, $max_start_index), $length);
 
    return $random_string;
}
 
?>
