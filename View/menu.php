<html>
<head>
    <?php
    //Includes
    include('../includes/pageincludes.php');
    include('../Model/menumodel.php');
    ?>
    <link rel="stylesheet" href="../Css/style.css">
</head>
<body>
<?php include('../includes/pagenav.php'); ?>

<table style="background:white; float:left;">
    <tr>
        <th>Warme dranken</th>
        <th>Prijs</th>
    </tr>
    <?php foreach ($gangen as $gang) {
    if($gang['gang'] == 1){
    ?>
    <tr>
        <td>
            <?php echo $gang['gerechtsnaam']; ?>
        </td>
        <td>
            <?php echo '€' . $gang['gerechtsprijs']; ?>
        </td>
    </tr>
    <?php } } ?>
    <table style="background:white; float:left;">
        <tr>
            <th>Bieren</th>
            <th>Prijs</th>
        </tr>
        <?php foreach ($gangen as $gang) {
            if ($gang['gang'] == 2) {
                ?>
                <tr>
                    <td>
                        <?php echo $gang['gerechtsnaam']; ?>
                    </td>
                    <td>
                        <?php echo '€' . $gang['gerechtsprijs']; ?>
                    </td>
                </tr>
            <?php }
        } ?>
    </table>
    <table style="background:white; float:left;">
        <tr>
            <th>Huiswijnen</th>
            <th>Prijs</th>
        </tr>
        <?php foreach ($gangen as $gang) {
            if ($gang['gang'] == 3) {
                ?>
                <tr>
                    <td>
                        <?php echo $gang['gerechtsnaam']; ?>
                    </td>
                    <td>
                        <?php echo '€' . $gang['gerechtsprijs']; ?>
                    </td>
                </tr>
            <?php }
        } ?>
    </table>
    <table style="background:white; float:left;">
        <tr>
            <th>Frisdranken</th>
            <th>Prijs</th>
        </tr>
        <?php foreach ($gangen as $gang) {
            if ($gang['gang'] == 4) {
                ?>
                <tr>
                    <td>
                        <?php echo $gang['gerechtsnaam']; ?>
                    </td>
                    <td>
                        <?php echo '€' . $gang['gerechtsprijs']; ?>
                    </td>
                </tr>
            <?php }
        } ?>
    </table>
    <table style="background:white; float:left;">
        <tr>
            <th>Warme hapjes</th>
            <th>Prijs</th>
        </tr>
        <?php foreach ($gangen as $gang) {
            if ($gang['gang'] == 5) {
                ?>
                <tr>
                    <td>
                        <?php echo $gang['gerechtsnaam']; ?>
                    </td>
                    <td>
                        <?php echo '€' . $gang['gerechtsprijs']; ?>
                    </td>
                </tr>
            <?php }
        } ?>
    </table>
    <table style="background:white; float:left;">
        <tr>
            <th>Koude hapjes</th>
            <th>Prijs</th>
        </tr>
        <?php foreach ($gangen as $gang) {
            if ($gang['gang'] == 6) {
                ?>
                <tr>
                    <td>
                        <?php echo $gang['gerechtsnaam']; ?>
                    </td>
                    <td>
                        <?php echo '€' . $gang['gerechtsprijs']; ?>
                    </td>
                </tr>
            <?php }
        } ?>
    </table>
    <table style="background:white; float:left;">
        <tr>
            <th>Koude voorgerechten</th>
            <th>Prijs</th>
        </tr>
        <?php foreach ($gangen as $gang) {
            if ($gang['gang'] == 7) {
                ?>
                <tr>
                    <td>
                        <?php echo $gang['gerechtsnaam']; ?>
                    </td>
                    <td>
                        <?php echo '€' . $gang['gerechtsprijs']; ?>
                    </td>
                </tr>
            <?php }
        } ?>
    </table>
    <table style="background:white; float:left;">
        <tr>
            <th>Warme voorgerechten</th>
            <th>Prijs</th>
        </tr>
        <?php foreach ($gangen as $gang) {
            if ($gang['gang'] == 8) {
                ?>
                <tr>
                    <td>
                        <?php echo $gang['gerechtsnaam']; ?>
                    </td>
                    <td>
                        <?php echo '€' . $gang['gerechtsprijs']; ?>
                    </td>
                </tr>
            <?php }
        } ?>
    </table>
    <table style="background:white; float:left;">
        <tr>
            <th>Visgerechten</th>
            <th>Prijs</th>
        </tr>
        <?php foreach ($gangen as $gang) {
            if ($gang['gang'] == 9) {
                ?>
                <tr>
                    <td>
                        <?php echo $gang['gerechtsnaam']; ?>
                    </td>
                    <td>
                        <?php echo '€' . $gang['gerechtsprijs']; ?>
                    </td>
                </tr>
            <?php }
        } ?>
    </table>
    <table style="background:white; float:left;">
        <tr>
            <th>Vleesgerechten</th>
            <th>Prijs</th>
        </tr>
        <?php foreach ($gangen as $gang) {
            if ($gang['gang'] == 10) {
                ?>
                <tr>
                    <td>
                        <?php echo $gang['gerechtsnaam']; ?>
                    </td>
                    <td>
                        <?php echo '€' . $gang['gerechtsprijs']; ?>
                    </td>
                </tr>
            <?php }
        } ?>
    </table>
    <table style="background:white; float:left;">
        <tr>
            <th>Vegetarische gerechten</th>
            <th>Prijs</th>
        </tr>
        <?php foreach ($gangen as $gang) {
            if ($gang['gang'] == 11) {
                ?>
                <tr>
                    <td>
                        <?php echo $gang['gerechtsnaam']; ?>
                    </td>
                    <td>
                        <?php echo '€' . $gang['gerechtsprijs']; ?>
                    </td>
                </tr>
            <?php }
        } ?>
    </table>
    <table style="background:white; float:left;">
        <tr>
            <th>IJs</th>
            <th>Prijs</th>
        </tr>
        <?php foreach ($gangen as $gang) {
            if ($gang['gang'] == 12) {
                ?>
                <tr>
                    <td>
                        <?php echo $gang['gerechtsnaam']; ?>
                    </td>
                    <td>
                        <?php echo '€' . $gang['gerechtsprijs']; ?>
                    </td>
                </tr>
            <?php }
        } ?>
    </table>
    <table style="background:white; float:left;">
        <tr>
            <th>Mousse</th>
            <th>Prijs</th>
        </tr>
        <?php foreach ($gangen as $gang) {
            if ($gang['gang'] == 13) {
                ?>
                <tr>
                    <td>
                        <?php echo $gang['gerechtsnaam']; ?>
                    </td>
                    <td>
                        <?php echo $gang['gerechtsprijs']; ?>
                    </td>
                </tr>
            <?php }
        } ?>
    </table>
    <?php include('../includes/pagefooter.php'); ?>
</body>
</html>