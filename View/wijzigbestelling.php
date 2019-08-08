<html>
<head>
    <?php
    //Includes
    include('../includes/pageincludes.php');
    include('../Model/wijzigbestellingModel.php');
    include('../Model/getters.php');
    include('../Model/bestelModel.php');
    $get = new getters();
    ?>
    <style>
        table, th, tr, td {
            border: solid;
            border-collapse: collapse;
            text-align: center;
            background: white;
        }
    </style>
</head>
<body>
<?php include('../includes/pagenav.php');
//Laad alle bestellingen in
foreach ($bestelling_results as $bestelling_result) {
    //String to array
    $gerechten = explode(', ', $bestelling_result['gerechtsnummer']);
    $dranken = explode(', ', $bestelling_result['dranknummer']);
    ?>
    <form action="../Model/wijzigbestellingModel.php" method="post">
        <table style="margin:auto;">
            <tr>
                <td>
                    <label for="tafelnummer">Tafel <?php echo $bestelling_result['tafelnummer']; ?></label><br>
                </td>
            </tr>
            <?php foreach ($gerechten as $gerecht) {
                ?>
                <tr>
                    <td>
                        <select name="gerechten[]" id="gerechtsnummer">
                            <option value="0">Kies een gerecht</option>
                            <?php foreach ($results as $result) {
                                echo '<option value="' . $result['gerechtsnummer'] . '">' . $result['gerechtsnaam'] . '</option>';
                            } ?>
                        </select>
                    </td>
                </tr>
            <?php }
            foreach ($dranken as $drank) {
                ?>
                <tr>
                    <td>
                        <select name="gerechten[]" id="gerechtsnummer">
                            <option value="0">Kies een gerecht</option>
                            <?php foreach ($results as $result) { ?>
                                <option value="<?php echo $result['gerechtsnummer'] ?>" <?php echo $result['gerechtsnummer'] == $drank ? ' selected="selected"' : ''; ?>><?php echo $result['gerechtsnaam'] ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td>
                    <input type="submit" name="submit" value="Bestelling aanpassen">
                </td>
            </tr>
        </table>
    </form>

    <?php
} ?>

<?php include('../includes/pagefooter.php'); ?>
</body>
</html>