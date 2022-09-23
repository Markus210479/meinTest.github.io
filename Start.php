<?php ob_start(); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, inital-scale=1.0" />

    <title>Index</title>

    <link rel="stylesheet" href="Start.css" />
</head>
<body>
    <?php
        session_start();

if(!isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] !== true)
        {
            header("location: Index.php");
            exit;
        }
    ?>
<div class="gridContainer">
    <div class="gridItem_1">
        <h1>Ox4S Datenbanken</h1>
        <div class="gridItem_2">
            <div class="abmeldenButtonContainer">
                <button class="abmeldenButton" onclick="window.location.href = 'Logout.php'">Abmelden</button>
            </div>
            <div id="linkContainer">
                <h2>Inhalte</h2>
                <div id="link">
                    <button type="button" onclick="window.open('../ox4sPHP/Bauteildaten/Bauteildaten.php','Artikeldatenbank','')" >Artikel</button>
                    <button type="button" onclick="window.open('../ox4sPHP/Servicedaten/Servicedaten.php','Servicedatenbank','')" >Services</button>
                    <!--<button type="button" onclick="window.location.href = '../ox4sPHP/Bauteildaten/Bauteildaten.php'">Artikeldatenbank</button>-->
                    <button type="button" onclick="window.open('../ox4sPHP/Baugruppen/Baugruppen.php', 'Baugruppen', '')">Baugruppen</button>
                    <button type="button" onclick="window.location.href = '../UserData/ChangePWD.php'">PWD &Auml;ndern</button>
                    <!--<button type="button" onclick="window.location.href = '../ox4sPHP/Baugruppen/Baugruppen.php'">Baugruppen</button>-->
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
