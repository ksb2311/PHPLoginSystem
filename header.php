<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link id="light" rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css" />
    <!-- <link id="dark" rel="alternate stylesheet" type="text/css" media="screen" href="css/bootstrapdark.css" /> -->
    <link rel="stylesheet" type="text/css" media="screen" href="css/font-awesome.min.css" />
    <script src="main.js"></script>
</head>

<body>
    <header>
        <!-- navebar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="index.php">Social</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch1" unchecked="">
                        <label class="custom-control-label" for="customSwitch1">Dark Theme</label>
                    </div>
                </ul>
                <?php
                if (isset($_SESSION['id'])) {
                    echo '<form action="includes/logout.inc.php" method="post">
                        <button class="btn btn-secondary my-2 my-sm-0" name="logoutBtn" type="submit">Logout</button> &nbsp
                        </form>';
                } else {
                    echo '<form class="form-inline my-2 my-lg-0" action="includes/login.inc.php" method="post">
                        <input class="form-control mr-sm-2" type="text" name="emailid" placeholder="Username / Email">
                        <input class="form-control mr-sm-2" type="password" name="pws" placeholder="Password">
                        <button class="btn btn-secondary my-2 my-sm-0" name="loginBtn" type="submit">Login</button> &nbsp
                        </form>
                        <button class="btn btn-secondary my-2 my-sm-0" onclick="location.href=\'signup.php\'" name="signupBtn" type="submit">SignUp</button> &nbsp';
                }

                ?>
            </div>
        </nav>
    </header>
</body>

</html>