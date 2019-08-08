<html>
<head>
    <?php
    //Includes
    include('../Model/keukenoverzichtModel.php');
    include('../Model/getters.php');
    include('../includes/pageincludes.php');
    $get = new getters();
    ?>
    <link rel="stylesheet" href="../Css/style.css">
</head>
<?php include('../includes/pagenav.php'); ?>
<body>
    <table>
        <tr>
            <th>Tafelnummer</th>
            <th>Bestelling</th>
            <th>Toevoeging</th>
            <th></th>
        </tr>

        <?php foreach ($results as $result) {
            //String to array voor gerechten en toevoegingen
            $gerechtsnummer = explode(', ', $result['gerechtsnummer']);
            $toevoegingen = explode(', ', $result['toevoeging']);
            ?>

            <tr>
                <td><?php echo $result['tafelnummer']; ?></td>
                <td><?php foreach ($gerechtsnummer as $gerecht) {
                        echo $get->getGerecht($gerecht) . '<br>';
                    } ?>
                </td>
                <td>
                    <?php foreach ($toevoegingen as $toevoeging) {
                        echo $toevoeging . '<br>';
                    } ?>
                </td>
                <td>
                    <a href="../Model/activeerkeukenbestelling.php?id=<?php echo $result['bestellingsnummer']; ?>">Voltooi
                        bestelling</a>
                </td>
            </tr>
        <?php } ?>
    </table>
<?php include('../includes/pagefooter.php') ?>
</body>
</html>