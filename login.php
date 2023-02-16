<?php
session_start();
require "./connexion.php";
require "./header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 align="center">Log In</h1>
    <div align="center">
        <form action="" method="POST">
            <label for="mail">E-mail</label><br>
            <input type="email" name="mail" id="mail" placeholder="Entrer votre e-mail" required><br><br>
            <label for="pass">Password</label><br>
            <input type="password" name="pass" id="pass" placeholder="Entrer votre password" required><br><br>
            <input type="submit" value="Login" name="log">
        </form>
    </div>
    <?php
    if(isset($_POST["log"])){
        $login = $_POST["mail"];
        $pass = $_POST["pass"];
        try {
            $operation = $connexion->prepare("SELECT * FROM client WHERE email = '$login' AND password = '$pass'");
            $operation->execute();
            $user = $operation->fetchAll(PDO::FETCH_OBJ);
            if(count($user) == 1){
                $_SESSION["nom"] = $user[0]->nom;
                $_SESSION["prenom"] = $user[0]->prenom;
                $_SESSION["id"] = $user[0]->id_client;
                header("location: ./locationsEncours.php");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    ?>
</body>
</html>