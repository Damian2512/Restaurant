<html>
<head>
    <?php include('../includes/pageincludes.php');
    include('../Model/reserveringModel.php');
    ?>
    <style>
        body {
            text-align: center;
        }
    </style>
</head>
<body>

<?php include('../includes/pagenav.php');
?>

<form action="../Model/reserveringModel.php?id=<?php echo $_GET['id'] ?>" method="post">
    <label for="tafelnummer">Tafelnummer:</label><br>
    <select name="tafelnummer" id="tafelnummer">
        <option value="0">Selecteer een tafel</option><?php
        foreach ($tafel_results as $tafel_result) {
            foreach ($tafel as $key => $tafels) {
                if ($tafels == $tafel_result['tafelnummer']) {
                    unset($tafel[$key]);
                }
            }
        }
        foreach ($tafel as $tafelnummer) {
            ?>
            <option value="<?php echo $tafelnummer; ?>"><?php echo $tafelnummer; ?></option>
            <?php
        }
        ?>
    </select><br>
    <input type="submit" name="submit_tafel" value="Reserveer">
</form>

<?php include('../includes/pagefooter.php'); ?>
</body>
</html>