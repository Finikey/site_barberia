<?php 
    try{
        $connect = new PDO('mysql:host=localhost;dbname=bar', 'root', '');
        echo 'db';
    }catch(PDOException $e){
        echo $e;
    }
?>