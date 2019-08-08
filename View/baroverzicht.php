<html>
<head>
    <?php
    //Includes
    include('../Model/baroverzichtModel.php');
    include('../Model/getters.php');
    include('../includes/pageincludes.php');
    $get = new getters();
    ?>
    <link rel="stylesheet" href="../Css/style.css">
</head>
<body>
<?php include('../includes/pagenav.php') ?>
    <table>
        <tr>
            <th>Tafelnummer</th>
            <th>Bestelling</th>
            <th></th>
        </tr>
        <?php foreach ($results as $result) {
//Array van string voor dranken
            $dranknummer = explode(', ', $result['dranknummer']);
            ?>
            <tr>
                <td><?php echo $result['tafelnummer']; ?></td>
                <td>
                    <?php
                    foreach ($dranknummer as $drank) {
                        echo $get->getGerecht($drank) . '<br>';
                    }

                    ?>
                </td>
                <td>
                    <a href="../Model/activeerbestelling.php?id=<?php echo $result['bestellingsnummer']; ?>">Voltooi
                        bestelling</a>
                </td>
            </tr>
            <?php
        } ?>

    </table>
<?php include('../includes/pagefooter.php'); ?>
</body>
</html>