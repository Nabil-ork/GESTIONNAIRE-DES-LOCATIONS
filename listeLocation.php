<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listes Locations</title>
</head>

<body>
    <?php
    require "./connexion.php";
    require "./header.php";
    ?>
    <form action="" method="POST">
        <dl>
            <dt><label for="debut">Date debut : </label></dt>
            <dd><input type="date" name="debut" id="debut" required></dd>
            <dt><label for="fin">Date fin : </label></dt>
            <dd><input type="date" name="fin" id="fin" required></dd>
        </dl>
        <input type="submit" value="Afficher" name="afficher">
    </form>
    <?php
    if (isset($_POST['afficher'])) {
        $debut = $_POST["debut"];
        $fin = $_POST["fin"];
        try {
            $operation = $connexion->query("SELECT * FROM location WHERE date_debut_location BETWEEN '$debut' AND '$fin'");
            $listLocations = $operation->fetchAll(PDO::FETCH_OBJ); ?>
            <h2>Liste de location entre <?= $debut . " et " . $fin ?></h2>
            <table border="1">
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
    <?php
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    ?>

</body>

</html>