<?php
// login_handler.php
session_start();

error_reporting(E_ALL);
ini_set('display_errors',1);

require_once "Dao.php";

function failLogin($status) {
    $_SESSION["status"] = $status;
    $_SESSION["email_preset"] = $_POST["email"];
    $_SESSION["access_granted"] = false;
    header("Location:index.php");
    exit();
}

function passLogin() {
    $dao = new Dao();
    $username = $dao->getUsername($_POST["email"]);
    $_SESSION["username"] = $username;
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["access_granted"] = true;
    $_SESSION["status"] = "";
    header("Location:index.php");
}

// If email is not valid the login fails.
if ($_POST["email"] == "") {
    failLogin("Please enter email address");
}
if ($_POST["email"] != filter_var($_POST["email"], FILTER_SANITIZE_EMAIL)) {
    failLogin("Email contains invalid characters");
}
if ($_POST["email"] != filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    failLogin("Invalid email address");
}


// Time to look up the email in the DATABASE
$dao = new Dao();
$password = $dao->getPassword($_POST["email"]);
if ($password != NULL && $password === hash('sha256', $_POST["password"] . $_POST["username"])) {
    passLogin();
}
else {
    failLogin("Incorrect email or password");
}
?>
