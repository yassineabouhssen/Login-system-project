<?php
session_start();
$_SESSION["login"]= false;
if(isset($_POST["Login"])){

    require "dbc.php"; 
    $naam = $_POST["gebruiker"];
    $pass = $_POST["wachtw"];
    if( empty($naam) || empty($pass)){
        header("location: ../aanmelden.php?errorlege_velden")    ;
        exit();
    }
    else{
    $select = $conn->prepare("SELECT * FROM gebruikers WHERE gebruikerNaam= '$naam' AND gebruikerWachtw='$pass' ");
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $select->execute();
    $data= $select->fetch();
    if ($data["gebruikerNaam"] != $naam && $data["gebruikerWachtw"] != $pass) {
        header("location: ../aanmelden.php?errorVerkeerd_wachtwoord_of_naam")    ;
        exit();
        echo " verkeerd wachtwoord of naam ". "<br>";
    }
    
    elseif($data["gebruikerNaam"] == $naam && $data["gebruikerWachtw"] == $pass && $data["is_gast"] == "1" ) {
        if ($data["is_blocked"] == "1" ) {
            header("location: ../aanmelden.php?errorAccount_geblokkeerd")    ;
            exit();
        }
        
        else{
        $_SESSION["login"] = true;
        $_SESSION["gebruikerNaam"]=$data["gebruikerNaam"];
        $_SESSION["gebruikerEmail"]=$data["gebruikerEmail"];
        header("location: ../profiel.php")    ;
        exit();
        }    
    }
    elseif ($data["gebruikerNaam"] == $naam && $data["gebruikerWachtw"] == $pass && $data["is_admin"] == "1") {
        if ($data["is_blocked"] == "1" ) {
            header("location: ../aanmelden.php?errorAccount_geblokkeerd")    ;
            exit();
        }
        else{
        $_SESSION["login"] = true;
        $_SESSION["gebruikerNaam"]=$data["gebruikerNaam"];
        $_SESSION["gebruikerEmail"]=$data["gebruikerEmail"];
        header("location: ../admin.php")    ;
        exit();
        }   
    }
    elseif($_SESSION == false){
        header("location: ../aanmelden.php?error")    ;
        exit();
    }
    else{
        header("location: ../aanmelden.php")    ;
        exit();
        echo " verkeerd wachtwoord of naam ". "<br>";
    }
}
    
}
else{
    echo "niet gelukt";
}


?>