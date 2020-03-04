 
<?php
session_start();
$_SESSION["login"] = false;


?>

<html>
    <head>
    <link rel="stylesheet" href="css/aanmelden2.css">
        
    </head>
    <header>
        <a href="home.php"><img src="img/logo.png" alt="image" class="logo" ></a>
        <nav class= "nav-bar">
        <a href="home.php">Home</a>
        <a href="partij.php">Partij</a>
        <a href="standpunten.php">Standpunten</a>
        <a href="aanmelden.php" class="amd-btn">aanmelden</a>
        </nav>
    </header>
    <main>
    <div class="register-div">
        <form   action="extra/register.php" method="post">
        <ul class="register-ul">
            <li>
                <label for="gebruiker" >Gebruikersnaam :</label>
                <input type="text" name="gebruiker" placeholder="Gebruikersnaam">
            </li>
            <li>
                <label for="gebruiker" >E-mail :</label>
                <input type="email" name="email" placeholder="E-mail">
            </li>
            <li>
                <label for="gebruiker" >Wachtwoord :</label>
                <input type="password" name="wachtw" placeholder="Wachtwoord">
            </li>
            <li>
                <label for="gebruiker" >Herhaal uw Wachtoord :</label>
                <input type="password" name="wachtw-repeat" placeholder="Herhaal uw Wachtoord" >
            </li>
        </ul>
        <div class="btn-div">
            <button class="lgn-btn" type="submit"  name="register" >Registreer</button>
        </div>
    </form>
    </div>


        
    <div class="login-div">
        <img class="login-img" src="img/login-icon.png" alt="image">
        <form  action="extra/login.php" method="post">
        <ul class="register-ul">
            <li>
                <label for="gebruiker" >Gebruikersnaam :</label>
                <input type="text" name="gebruiker" placeholder="Gebruikersnaam">
            </li>
            <li>
                <label for="gebruiker" >Wachtwoord :</label>
                <input type="password" name="wachtw" placeholder="Wachtwoord">
            </li>
                
        </ul>
        <div class="btn-div">
            <button class="lgn-btn"  type="submit"  name="Login" >Login</button>
        </div>
        </form>
    </div>
    
    </main>


</html>