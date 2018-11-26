<?php
// index.php
    error_reporting(E_ALL);
    ini_set('display_errors',1);

    session_start();
    require_once "Dao.php";
    require_once "topbar.php";

    $email_preset = "";
    if (isset($_SESSION["email_preset"])) {
        $email = $_SESSION["email_preset"];
    }

    $status = "";
    if (isset($_SESSION["status"])) {
        $status = $_SESSION["status"];
    }

    $email = "";
    if (isset($_SESSION["email"])) {
        $email = $_SESSION["email"];
    }

    $username = "Guest";
    if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
    }

    $listitems = array(
        '<label id="menubutton">
            <input type="checkbox">
            <i class="material-icons" onclick="toggleMenu()">menu</i>
        </label>');
?>

<!DOCTYPE html>
<html>
    <header>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="menuScript.js"></script>
        <title>GMRepo</title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" type="text/css" href="/theme.php">
    </header>
    <body>

        <?php genTopbar($listitems); ?>

        <!-- This is the drawer that will slide in and out. It will be pinnable -->
        <div class="sidebar" id="sbar">
            <!-- Holds user info and some control buttons -->
            <div class="userinfo">
                <ul class="usercontrols">
                    <?php if (isset($_SESSION["access_granted"]) && $_SESSION["access_granted"]) { ?>
                    <li>
                        <img class="profpic" src="images/DefaultProfile.png" alt="Profile Picture"/>
                    </li>
                    <li id="settingbutton">
                        <button type="button">
                            <i class="material-icons">settings</i>
                        </button>
                    </li>
                    <li>
                        <form action="logout.php" method="POST">
                            <input type="submit" name="logout" value="Logout">
                        </form>
                    </li>
                    <h1> <?=$username?> </h1>
                    <?php } else { ?>
                    <div class="login">
                        <h1> Login </h1>
                        <?php if ($status != "") {
                            echo '<p class="statusmsg">' . $status . '</p>';
                        } ?>
                        <form action="login_handler.php" method="POST" id="LOGIN">
                            <div>
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" value="<?php echo $email_preset; ?>"/>
                            </div>
                            <div>
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" value=""/>
                            </div>
                            <div>
                                <input type="submit" name="submit" id="login" value="Login"/>
                            </div>
                        </form>
                        <a href="newuser.php">Create New Account</a>
                    </div>
                    <?php }; ?>
                </ul>
            </div>

            <!-- List of categories -->
            <ul class="categorylist">
                <li>
                    <h2>Creatures</h2>
                </li>
                <li>
                    <h2>Items</h2>
                </li>
                <li>
                    <h2>Etc.</h2>
                </li>
                <li>
                    <h2>^ Static Examples</h2>
                </li>
            </ul>

            <!-- Some space for buttons below the categories -->
            <ul class="categorycontrol">

            </ul>
        </div>

        <!-- Things that need to get pushed aside by sidebar -->
        <div id="pushAside">

            <!-- Main body of text -->
            <div class="main">
                <h1>A digital organizer that's <em>actually</em> 
                    faster than ole' pen and paper.
                    </h1>
                <p> Note: Site is still under construction!
                </p>

            </div>

        </div>

        <?php include_once "footer.php"; ?>
    </body>
</html>
