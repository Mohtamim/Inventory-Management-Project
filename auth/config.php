<?php
    function connect(){
        $host = "localhost";
        $user="root";
        $pass="";
        $db="inventory";
        $conn= mysqli_connect($host,  $user, $pass, $db);
        return $conn;
    }
    function disconnect($cn){
        $cn->close();
    }
?>