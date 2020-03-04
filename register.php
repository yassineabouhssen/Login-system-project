<?php

require "dbc.php"; 
if(isset($_POST["register"])){
    

   
    $naam = $_POST["gebruiker"];
    $email= $_POST["email"];
    $pass = $_POST["wachtw"];
    $passRepeat = $_POST["wachtw-repeat"];
    
    if (empty($naam) ||  empty($email) || empty($pass) || empty($passRepeat)){
        header("location: ../aanmelden.php?errorlege_velden")    ;
        exit();
    }
    elseif ($pass !== $passRepeat) {
        
        header("location: ../aanmelden.php?errorwachwoord_not_equal");
        exit();
    }
    else{
    $insert = $conn->prepare("INSERT INTO gebruikers (gebruikerNaam,gebruikerEmail,gebruikerWachtw,is_admin) VALUES (:gebruiker,:email,:wachtw,0)");
    $insert->bindParam(":gebruiker",$naam);
    $insert->bindParam(":email",$email);
    //$hashedpass = password_hash($pass,PASSWORD_DEFAULT);
    $insert->bindParam(":wachtw",$pass);
    
    $insert->execute();
    header("location:../aanmelden.php?aanmelding_voltooid");
    }
    

}
else{
    echo "niet gelukt";
}