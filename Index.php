 <!DOCTYPE html>
<html>
<head>
<title>Hello World!</title>
<link rel="stylesheet" href="bluestyle.css">
</head>
<body>


<div><img src="img_hello_git.jpg" alt="Hello Git" style="width:100%;max-width:640px"></div>
    <div class="gridContainer">
        <div class="gridItem_1">
            <h1>Ox4S Datenbanken</h1>
			<p>This is the first file in my new Git Repo.</p>
			<p>A new line in our file!</p>
			<p>Emergency Fis!</p>
			<h1>Hello world!</h1>
			<div><img src="img_hello_world.jpg" alt="Hello World from Space" style="width:100%;max-width:960px"></div>
			<p>This is the first file in my new Git Repo.</p>
			<p>A new line in our file!</p>

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