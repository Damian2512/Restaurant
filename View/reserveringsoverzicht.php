<html>
<head>
    <?php
    //Includes
    include('../Model/reserveringModel.php');
    include('../includes/pageincludes.php'); ?>
    <link rel="stylesheet" href="../Css/style.css">
</head>
<body>
<?php include('../includes/pagenav.php') ?>
<table>
    <tr>
        <th>Naam</th>
        <th>Datum</th>
        <th>Tijd</th>
        <th>Tafelnummer</th>
        <th>Personen</th>
        <th>Telefoonnummer</th>
        <th><a class="headerlink" href="reserveringen.php">Reservering toevoegen</a></th>
    </tr>
    <?php foreach ($reserveringen as $reservering) { ?>
        <tr>
            <td><?php echo $reservering['naam']; ?></td>
            <td><?php echo $reservering['datum']; ?></td>
            <td><?php echo $reservering['tijd']; ?></td>
            <td><?php echo $reservering['tafelnummer']; ?></td>
            <td><?php echo $reservering['personen']; ?></td>
            <td><?php echo $reservering['telefoonnummer']; ?></td>
            <td><a href="../Model/activeerreservering.php?id=<?php echo $reservering['reserveringsnummer']; ?>">Activeer</a></td>
        </tr>
    <?php } ?>
</table>
<?php include('../includes/pagefooter.php'); ?>
</body>
</html>