<?php
session_start();
require_once "topbar.php";
$listitems = array();
?>
<!DOCTYPE html>
<html>
    <header>
        <title>About GMRepo</title>
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="theme.php">
    </header>
    <body>
        <?php genTopbar($listitems); ?>
        <div class="main">
            <h1>Under construction!</h1>
            <p><a href="index.php">Go back</a></p>
        </div>

        <?php include_once "footer.php"; ?>
    </body>