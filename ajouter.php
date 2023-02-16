<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
</head>

<body>
    <?php 
    require "./connexion.php"; 
    require "./header.php";
    ?>
    <h2>Ajouter un client :</h2>
    <form action="" method="post">
        <dl>
            <dt><label for="cin">CIN :</label></dt>
            <dd><input type="text" name="cin" id="cin" required></dd>
            <dt><label for="nom">Nom :</label></dt>
            <dd><input type="text" name="nom" id="nom" required></dd>
            <dt><label for="prenom">Prenom</label></dt>
            <dd><input type="text" name="prenom" id="prenom" required></dd>
            <dt><label for="email">E-mail : </label></dt>
            <dd><input type="email" name="email" id="email" required></dd>
            <dt><label for="pass">Password : </label></dt>
            <dd><input type="password" name="pass" id="pass" required></dd>
        </dl>
        <input type="submit" value="Ajouter" name="ajouter">
    </form>
    <?php
    if (isset($_POST['ajouter'])) {
        $cin = $_POST["cin"];
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $mail = $_POST["email"];
        $pass = $_POST["pass"];
        try {
            $operation = $connexion->prepare("INSERT INTO client(cin,nom,prenom,email,password) values('$cin','$nom','$prenom','$mail','$pass')");
            $operation->execute(); ?>
            <script>
                alert("L'ajout a été effectuer avec sucsses!");
                document.location.href = "./listerC.php";
            </script>
    <?php
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    ?>
</body>

</html>