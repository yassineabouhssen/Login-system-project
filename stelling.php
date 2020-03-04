<?php
include "dbc.php";
if(isset($_POST["stelling"])){
    $date = $_POST["datum"];
    $stelling = $_POST["invul"];

    if ( empty($date) || empty($stelling) ) {
       header("location:../admin.php?errorLegeVelden");
       exit();
    }
    else{
        $insert = $conn->prepare("INSERT INTO stellingen (stellingZIN,stellingDAG,aantalEENS,aantalONEENS) VALUES (:invul,:datum,0,0)");
        $insert->bindParam(":invul",$stelling);
        $insert->bindParam(":datum",$date);
        $insert->execute();
        header("location:../admin.php");
        exit();
    }
}

elseif(isset($_POST["delete"])){
    $var = $_POST["check"];
    $insert = $conn->prepare('DELETE  FROM  stellingen  WHERE stellingID = '.$var.'  ') ;
    $insert->execute();
    header("location: ../admin.php")    ;
    exit(); 
}
    ?>


