<?php
$eens = $_POST["eens"];
$oneens = $_POST["oneens"];
require "dbc.php" ;

if(isset($eens)){

    if(isset($_POST["opslaan"])){
        $eens = $_POST["eens"];
        $insert = $conn->prepare('UPDATE stellingen SET aantalEENS = aantalEENS +1 WHERE stellingID = '.$eens.'  ') ;
        
        $insert->execute();
        header("location:../profiel.php");
        exit();
        echo "gelukt";
        
    }
    
}
elseif(isset($oneens)){
    if(isset($_POST["opslaan"])){
        $oneens = $_POST["oneens"];
        $insert = $conn->prepare('UPDATE stellingen SET aantalONEENS = aantalONEENS +1 WHERE stellingID = '.$oneens.'  ') ;
        
        $insert->execute();
        header("location:../profiel.php");
        exit();
        echo "gelukt";
    }
}
?>