<?php
    const host = 'localhost';
    const database = 'qlnhasach';
    const user = 'root';
    const password = '';

    $conn = new mysqli(host, user, password, database);
    mysqli_set_charset($conn, 'utf8');
    if(!$conn){
        die("Connect failed: " . mysqli_connect_error());
    }

?>