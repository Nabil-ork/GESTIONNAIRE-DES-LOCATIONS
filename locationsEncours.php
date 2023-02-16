<?php
session_start();
require "./connexion.php";
require "./header.php";
$id = $_SESSION["id"];
try {
    $operation = $connexion->prepare("SELECT * FROM location WHERE id_client = $id  AND current_date() BETWEEN date_debut_location AND date_fin_location;");
    $operation->execute();
    $listLocations = $operation->fetchAll(PDO::FETCH_OBJ);
} catch (PDOException $e) {
    echo $e->getMessage();
}
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
    <h1 align="center"><?= "Bonjour, $_SESSION[nom] $_SESSION[prenom]." ?></h1>
    <h2 align="center">Tout votre location on cour</h2>
    <table border="1" align="center">
        <tr>
            <th>id_location</th>
            <th>id_immobillier</th>
            <th>id_client</th>
            <th>date_debut_location</th>
            <th>date_fin_location</th>
        </tr>
        <?php foreach ($listLocations as $location) { ?>
            <tr>
                <td align="center"><?= $location->id_location ?></td>
                <td align="center"><?= $location->id_immobillier ?></td>
                <td align="center"><?= $location->id_client ?></td>
                <td align="center"><?= $location->date_debut_location ?></td>
                <td align="center"><?= $location->date_fin_location ?></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>