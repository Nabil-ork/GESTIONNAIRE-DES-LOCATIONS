<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Clients</title>
</head>

<body>
    <?php
    require "./connexion.php";
    require "./header.php";
    try {
        $operation = $connexion->prepare("SELECT * FROM client");
        $operation->execute();
        $listClients = $operation->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    ?>
    <br><br>
    <table border="1">
        <tr>
            <th>Identifiant</th>
            <th>CIN</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Password</th>
            <th>Supprimer</th>
        </tr>
        <?php foreach ($listClients as $client) { ?>
            <tr>
                <td align="center"><?= $client->id_client ?></td>
                <td align="center"><?= $client->cin ?></td>
                <td align="center"><?= $client->nom ?></td>
                <td align="center"><?= $client->prenom ?></td>
                <td align="center"><?= $client->email ?></td>
                <td align="center"><?= $client->password ?></td>
                <td align="center">
                    <a href="?id=<?= $client->id_client ?>" onclick="return confirm('Voullez-vous vraiment supprimer ce client?')" style="text-decoration: none;">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <?php
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        try {
            $operation = $connexion->query("DELETE FROM client WHERE id_client = $id");
            header("location: ./listerC.php");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    ?>
</body>

</html>