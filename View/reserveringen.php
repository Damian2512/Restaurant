<html>
<head>
    <?php
    //Includes
    include('../Model/reserveringModel.php');
    include('../includes/pageincludes.php');
    ?>
    <link rel="stylesheet" href="../Css/style.css">
    <style>
        body {
            text-align: center;
        }
    </style>
</head>
<body>
<?php include('../includes/pagenav.php'); ?>
<p class="error" id="datum_error"></p>
<p class="error" id="tijd_error"></p>
<p class="error" id="tafelnummer_error"></p>
<p class="error" id="naam_error"></p>
<p class="error" id="telefoonnummer_error"></p>
<p class="error" id="personen_error"></p>
<p class="error" id="reservering_error"><?php
    if (isset($_SESSION['reservering_error'])) {
        if ($_SESSION['reservering'] == false) {
            echo $_SESSION['reservering_error'];
        }
    } ?></p>

<form action="../Model/reserveringModel.php" method="post" name="reserverings_form" id="reserverings_form"
      style="margin-top: 8%">
    <label for="datum">Datum: </label><br>
    <input type="date" name="datum" id="datum"><br>

    <label for="tijd">Tijd: </label><br>
    <input type="time" name="tijd" id="tijd"><br>

    <label for="naam">Naam klant: </label><br>
    <input type="text" name="naam" id="naam"><br>

    <label for="telefoonnummer">Telefoonnummer: </label><br>
    <input type="text" name="telefoonnummer" id="telefoonnummer"><br>

    <label for="personen">Aantal personen: </label><br>
    <input min="1" type="number" name="personen" id="personen"><br>

    <input type="submit" name="submit" value="Reserveren">
</form>


<script>
    //Form validatie
    document.getElementById("reserverings_form").onsubmit = function () {
        var datum = document.forms["reserverings_form"]["datum"].value;
        var tijd = document.forms["reserverings_form"]["tijd"].value;
        var tafelnummer = document.forms["reserverings_form"]["tafelnummer"].value;
        var naam = document.forms["reserverings_form"]["naam"].value;
        var telefoonnummer = document.forms["reserverings_form"]["telefoonnummer"].value;
        var personen = document.forms["reserverings_form"]["personen"].value;

        var submit = true;
//Als er geen datum is
        if (datum == null || datum == "") {
            datumError = "Vul een datum in";
            document.getElementById("datum_error").innerHTML = datumError;
            submit = false;
        }
//Als er geen tijd is
        if (tijd == null || tijd == "") {
            tijdError = "Vul een tijd in";
            document.getElementById("tijd_error").innerHTML = tijdError;
            submit = false;
        }
//Als er geen tafelnummer is
        if (tafelnummer == null || tafelnummer == "") {
            tafelError = "Vul een tafelnummer in";
            document.getElementById("tafelnummer_error").innerHTML = tafelError;
            submit = false;
        }
//Als er geen naam is
        if (naam == null || naam == "") {
            naamError = "Vul een naam in";
            document.getElementById("naam_error").innerHTML = naamError;
            submit = false;
        }
//Als er geen telefoonnummer is
        if (telefoonnummer == null || telefoonnummer == "") {
            telefoonError = "Vul een telefoonnummer in";
            document.getElementById("telefoonnummer_error").innerHTML = telefoonError;
            submit = false;
        }
//Als er geen personenaantal is
        if (personen == null || personen == "") {
            personenError = "Vul het aantal personen in";
            document.getElementById("personen_error").innerHTML = personenError;
            submit = false;
        }
        //Anders true
        return submit;
    }

    //Verwijder de errors
    function removeWarning() {
        document.getElementById(this.id + "_error").innerHTML = "";
    }

    document.getElementById("datum").onkeyup = removeWarning;
    document.getElementById("tijd").onkeyup = removeWarning;
    document.getElementById("tafelnummer").onkeyup = removeWarning;
    document.getElementById("naam").onkeyup = removeWarning;
    document.getElementById("telefoonnummer").onkeyup = removeWarning;
    document.getElementById("personen").onkeyup = removeWarning;
</script>

<?php include('../includes/pagefooter.php'); ?>

</body>
</html>
