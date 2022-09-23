<?php ob_start(); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, inital-scale=1.0" />

    <title>Login</title>

    <link rel="stylesheet" href="Index.css" />

    <?php include_once "ox4sClasses/ConnectDB.php";?>
</head>
<body>
    
    <?php

    $usrnameErr = "";
    $pwdErr = "";
    $username = "";
    $pwd = "";
    $loginError = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty(trim($_POST["usrname"]))){
            $usrnameErr = "*Feld darf nicht leer sein!";
        }
        elseif(!filter_var($_POST["usrname"], FILTER_VALIDATE_EMAIL)){
            $usrnameErr = "*Bitte eine gültige Email-Adresse angeben!";
        }else{
            $username = trim($_POST["usrname"]);
        }

        if(empty(trim($_POST["pwd"]))){
            $pwdErr = "*Feld darf nicht leer sein!";
        }else{
            $pwd = trim($_POST["pwd"]);
        }

        if(empty($usrnameErr) && empty($pwdErr)){

            $dbConnection = new ConnectDB();
            $connection = new mysqli($dbConnection->get_serverName(), $dbConnection->get_user(), $dbConnection->get_passWord(), $dbConnection->get_dataBase());
            
            //$sqlCommandInsert = "INSERT INTO `users` (`username`, `password`) VALUES ('" . $username . "', '" . password_hash($pwd, PASSWORD_DEFAULT) . "')";
            $sqlCommand = "SELECT * FROM `users` WHERE `username` = '" . $username . "'";

            //$connection->query($sqlCommandInsert);
            $connection->query($sqlCommand);
            $result = $connection->query($sqlCommand);
            $row = mysqli_fetch_assoc($result);

            if($result->num_rows == 1)
            {
                if(password_verify($pwd, $row["password"]))
                {
                    session_start();

                    $_SESSION["loggedIn"] = true;
                    $_SESSION["username"] = $row["username"];
                    $_SESSION["id"] = $row["ID"];

                    header("location: Start/Start.php");
                }
                else{
                    $loginError = "Oops - Passwort ist falsch!!";
                }
            }
            else{
                $loginError = "Oops - Username ist falsch.";
            }


        }
    }
    ?>

    <div class="gridContainer">
        <div class="gridItem_1">
            <h1>Ox4S Datenbanken</h1>
			<p>This is the first file in my new Git Repo.</p>
			<p>A new line in our file!</p>
						<p>Emergency Fis!</p>

        </div>
        <div class="gridItem_2">
            <form id="loginFormular" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <h2>Login</h2>                
                <div id="loginContainer">
                    <div class="inputContainer">
                        <label for="usrname">Email-Adresse</label>
                        <input type="text" id="usrname" name="usrname"/>
                        <span><?php echo $usrnameErr; ?></span>
                    </div>

                    <div class="inputContainer">
                        <label for="pwd">Passwort</label>
                        <input type="password" id="pwd" name="pwd" />
                        <span ><?php echo $pwdErr; ?></span>
                        <input name="goButton" form="loginFormular" type="submit" value="Start!" id="goButton" />
                    </div>
                </div>
                    <span id="loginError"><?php echo $loginError; ?></span>
            </form>
        </div>
    </div>
</body>
</html>
