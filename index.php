<?php
// index.php
    error_reporting(E_ALL);
    ini_set('display_errors',1);

    session_start();
    require_once "Dao.php";
    require_once "topbar.php";

    $status = "";
    if (isset($_SESSION["status"])) {
        $status = $_SESSION["status"];
    }

    $email = "";
    if (isset($_SESSION["access_granted"])
        && $_SESSION["access_granted"] && isset($_SESSION["email"])) {
        $email = $_SESSION["email"];
    }

    $username = "Guest";
    if (isset($_SESSION["access_granted"])
        && $_SESSION["access_granted"] && isset($_SESSION["username"])) {
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
        <script src="newUser.js"></script>
        <script src="awareFooter.js"></script>
        <script src="settingspopup.js"></script>
        <title>GMRepo</title>
        <link href="https://fonts.googleapis.com/css?family=Arvo|Raleway"
            rel="stylesheet">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" type="text/css" href="/theme.php">
        <link rel="stylesheet" type="text/css" href="/sbar_width.php">
    </header>
    <body>

        <?php genTopbar($listitems); ?>

        <!-- This is the drawer that will slide in and out. It will be pinnable -->
        <div class="sidebar" id="sbar">
            <!-- Holds user info and some control buttons -->
            <div class="userinfo">
                <ul class="usercontrols">
                    <!-- DEVELOPMENT ONLY url that bypasses login -->
                    <?php if (isset($_GET["loggedIn"]) && $_GET["loggedIn"]) {
                        $_SESSION["access_granted"] = True;
                    } ?>
                    <?php if (isset($_SESSION["access_granted"]) && $_SESSION["access_granted"]) { ?>
                    <li>
                        <img class="profpic" src="images/DefaultProfile.png" alt="Profile Picture"/>
                    </li>
                    <li id="settingbutton">
                        <button type="button">
                            <i class="material-icons" onclick="showsettings()">settings</i>
                        </button>
                    </li>
                    <h1> <?php echo $username; ?> </h1>
                    <?php } else { ?>
                    <div class="login">
                        <?php
                            if (isset($_SESSION['isNewUser']) && $_SESSION['isNewUser'] == "True") {
                                ob_start();
                                include_once("newuser.php");
                                echo ob_get_clean();
                            }
                            else {
                                ob_start();
                                include_once("existingUser.php");
                                echo ob_get_clean();
                            }
                        ?>
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
            <div class="browsingtabs">
            </div>
            <div class="browsingcontent">
            </div>
            <!-- Temporary -->
            <div class="main">
                <h1>A digital TTRPG organizer that is actually faster than writing it down yourself!
                    </h1>
                <p> Note: Site is still under construction!
                </p>
            </div>

        </div>

        <?php include_once "footer.php"; ?>
    </body>
</html>
