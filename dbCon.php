<?php

    /*$server ="sql210.epizy.com";
    $username = "epiz_33174184";
    $password ="HYAfQFjTjHzNKXj";
    $dbname = "epiz_33174184_todo_base";

$con = mysqli_connect($server,$username,$password,$dbname);*/

$con = mysqli_connect("localhost","root","","loginSystem");
 // Check connection
 if (mysqli_connect_errno()){
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

?>