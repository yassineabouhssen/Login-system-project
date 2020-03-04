<?php
    try{
        $host= "localhost";
        $Username = "root";
        $Password = "";
        $dbName = "loginsysteemproject";
        
        
        $dsn = "mysql:host=$host;dbname=$dbName";
        $conn = new PDO($dsn,$Username,$Password);
       
    }
    catch(PDOException $e){
        echo "error".$e->getMessage();

    }

?>