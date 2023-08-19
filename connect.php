<?php 

$conn = new mysqli('localhost', 'root', '', 'comingsoon');
if (!$conn){
    echo "Connection Denied!". mysqli_connect_error();
}

?>