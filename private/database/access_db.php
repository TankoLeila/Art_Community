<?php
    $pdo = new PDO('mysql:dbname=art_community_db;host=localhost', 'root', '')

    $pdo -> setAttribute(PDO::ATTR_ERRORMODE, PDO::ERRMODE_EXCEPTION);

    if(!$pdo){
        die("connection failed")
    }
?>