<html>
<head>
<?php
//Includes
include('../Model/bestelModel.php');
include('../includes/pageincludes.php');
?>
    <link rel="stylesheet" href="../Css/style.css">
</head>
<body>
<?php include('../includes/pagenav.php'); ?>
<form method="post" action="../Model/bestelModel.php" onsubmit="return validate(this)">
                <div id="newlink">
                    <div class="feed">
                        <label for="tafelnummer">Tafelnummer</label><br>
                        <input type="text" name="tafelnummer" id="tafelnummer"><br>

                        <label for="gerechtsnummer">Gerecht</label><br>
                        <select name="gerechtsnummer[]" id="gerechtsnummer">
                            <option value="0">Kies een gerecht</option>
                            <?php foreach($results as $result) {
                                echo '<option value="' . $result['gerechtsnummer'] . '">' . $result['gerechtsnaam'] . '</option>';
                            } ?>
                        </select><br>

                        <label for="toevoeging">Toevoeging</label><br>
                        <input type="text" name="toevoeging[]" id="toevoeging"><br>
                    </div>
                </div>
        <input type="submit" name="submit" value="Plaats bestelling">
    <p id="addgerecht">
        <a href="javascript:addGerecht()">Voeg gerecht toe</a>
    </p>
    <p id="addgerecht">
        <a href="javascript:addDrank()">Voeg drank toe</a>
    </p>
</form>
<!-- Dit wordt ingevoerd naar het scherm -->
<div id="nieuw_gerecht" style="display:none">
    <div class="feed">
        <label for="gerechtsnummer">Gerecht:</label><br>
        <select name="gerechtsnummer[]" id="gerechtsnummer">
            <option value="0">Kies een gerecht</option>
            <?php foreach($results as $result) {
                echo '<option value="' . $result['gerechtsnummer'] . '">' . $result['gerechtsnaam'] . '</option>';
            } ?>
        </select><br>
    </div>
    <div class="feed">
        <label for="toevoeging">Toevoeging:</label><br>
        <input id="toevoeging" type="text" name="toevoeging[]" value="" size="50">
    </div>
</div>

<div id="nieuw_drank" style="display:none">
    <div class="feed">
        <label for="gerechtsnummer">Drank:</label><br>
        <select name="dranknummer[]" id="gerechtsnummer">
            <option value="0">Kies een drank</option>
            <?php foreach($drank_results as $result) {
                echo '<option value="' . $result['gerechtsnummer'] . '">' . $result['gerechtsnaam'] . '</option>';
            } ?>
        </select><br>
    </div>
</div>
<script type="text/javascript">
    function addGerecht() {
        var div1 = document.createElement('div');
        //Haal div op voor gerecht
        div1.innerHTML = document.getElementById('nieuw_gerecht').innerHTML;
        document.getElementById('newlink').appendChild(div1);
    }

    function addDrank() {
        var div2 = document.createElement('div');
        //Haal div op voor drank
        div2.innerHTML = document.getElementById('nieuw_drank').innerHTML;
        document.getElementById('newlink').appendChild(div2);
    }
</script>
<?php include('../includes/pagefooter.php'); ?>
</body>
</html>