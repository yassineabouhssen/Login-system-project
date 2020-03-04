<?php

$var = $_POST["checker"];
require "dbc.php" ;


if(isset($var)){
    $var = $_POST["checker"];
    if(isset($_POST["blokkeren"])) { 
        $insert = $conn->prepare('UPDATE gebruikers SET is_blocked = "1" WHERE gebruikerID = '.$var.'  ') ;
        $insert->execute();
        
        header("location: ../admin.php")    ;
        exit();
        
    }
    elseif(isset($_POST["deblokkeren"])){
        $insert = $conn->prepare('UPDATE gebruikers SET is_blocked = "0" WHERE gebruikerID = '.$var.'  ') ;
        $insert->execute();
        header("location: ../admin.php")    ;
        exit();
        
    } 
    elseif(isset($_POST["delete"])){
        $insert = $conn->prepare('DELETE FROM gebruikers  WHERE gebruikerID = '.$var.'  ') ;
        $insert->execute();
        header("location: ../admin.php")    ;
        exit(); 
    }
    else{
        echo "niet gelukt";
    }
}
else{
    echo "niet gelukt2"; 
}

?>

