<?php
    function connectDatabase() {
        $server = 'localhost';
        $user = 'root';
        $pass = '';
        $database = 'xaml';

        $conn = new mysqLi($server, $user, $pass, $database);

        if (!$conn){
            echo 'CANT CONNECT !!!' . mysqli_connect_error($conn);
        }

        return $conn;
    }
?>