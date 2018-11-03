<?php
    $username = 'Cool McGuy';
?>

<!DOCTYPE html>
<html>
    <header>
        <script src="menuScript.js"></script>
        <title>GMRepo</title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" type="text/css" href="/theme.php">
    </header>
    <body>
        <div class="topbar">
            <!-- unordered list in case there are more buttons on the top bar eventually -->
            <ul>
                <li>
                    <label id="menubutton">
                        <input type="checkbox">
                        <i class="material-icons" onclick="toggleMenu()">menu</i>
                    </label>
                </li>
            </ul>

            <!-- The all-important logo, which will kind of hang off the side -->
            <img id="tbarlogo" src="logo/logo_128px.png" alt="GMRepo Logo"/>
        </div>

        <!-- This is the drawer that will slide in and out. It will be pinnable -->
        <div class="sidebar" id="sbar">
            <!-- Holds user inonfo and some control buttons -->
            <div class="userinfo">
                <ul class="usercontrols">
                    <li>
                        <img class="profpic" src="images/DefaultProfile.png" alt="Profile Picture"/>
                    </li>
                    <li id="settingbutton">
                        <button type="button">
                            <i class="material-icons">settings</i>
                        </button>
                    </li>
                    <h1> <?=$username?> </h1>
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

        <div class="footer">
            <a href="index.php">App</a>
            <a href="about.php">About</a>
        </div>
    </body>
</html>
