<html>
<head>
    <?php
    //Includes
    include('../includes/pageincludes.php');
    include('../Model/connection.php');
    include('../Model/getters.php');

    //Leg connectie
    $connection = new connection();
    $get = new getters();
    //Zet variabele als er niet is gepost
    $search = isset($_POST['tafelnummer']) ? $_POST['tafelnummer'] : '';

    //Check of er is gepost
    if (isset($_POST['submit'])) {
        $query = $connection->connect()->prepare('SELECT * FROM bestellingen WHERE gerecht_voltooid = 1 
                                                   AND drank_voltooid = 1 
                                                   AND bestelling_afgerond = 0
                                                   AND tafelnummer LIKE :tafelnummer');
        $exec = $query->execute(array(
            ':tafelnummer' => $search
        ));
        $bon_results = $query->fetchAll();
    } else {
        $bon_results = isset($_POST['tafelnummer']) ? $_POST['tafelnummer'] : '';
    } ?>

    <link rel="stylesheet" href="../Css/style.css">
</head>
<body>
<?php include('../includes/pagenav.php') ?>
<form action="bon.php" method="post">
    <input type="number" name="tafelnummer">
    <input type="submit" name="submit">
</form>
<div style="background:white;">
    <table>
        <tr>
            <th>Gerecht/drank</th>
            <th>Prijs</th>
            <th>Datum</th>
        </tr>
        <?php
        if (!empty($search)) {
            foreach ($bon_results as $bon_result) {
                $gerechten = explode(', ', $bon_result['gerechtsnummer']);
                $dranken = explode(', ', $bon_result['dranknummer']);
                foreach ($gerechten as $gerecht) {
                    //Laat de gerechten, prijzen en data in
                    echo '<tr><td>' . $get->getGerecht($gerecht) . '</td><td>€' . $get->getPrijs($gerecht) . ',-</td><td>' . $bon_result['datum_tijd'] . '</td></tr>';
                }
                foreach ($dranken as $drank) {
                    //Laat de dranken, prijzen en data in
                    echo '<tr><td>' . $get->getGerecht($gerecht) . '</td><td>€' . $get->getPrijs($gerecht) . ',-</td><td>' . $bon_result['datum_tijd'] . '</td></tr>';
                }
            }
        } ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
</div>
<?php include('../includes/pagefooter.php') ?>
</body>
</html>