<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
//create_account.php
session_start();

require_once "Dao.php";

function failAccount($status) {
    $_SESSION["status"] = $status;
    $_SESSION["email_preset"] = $_POST["email"];
    $_SESSION["username_preset"] = $_POST["username"];
    header("Location:index.php");
    exit();
}

$dao = new Dao();

// Fail if email is invalid
if ($_POST["email"] == "") {
    failAccount("Please enter email address");
}
if ($_POST["email"] != filter_var($_POST["email"], FILTER_SANITIZE_EMAIL)) {
    failAccount("Email contains invalid characters");
}
if ($_POST["email"] != filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    failAccount("Invalid email address");
}

// Fail if email already exists in database
$testpass = $dao->getPassword($_POST["email"]);
if ($testpass != null) {
    failAccount("Account with this email address already exists");
}

// Fail if username fails regex comparison
$usernameRegex = "^(?=.{8,20}$)[a-zA-Z0-9._]^";
$isUsernameValid = preg_match($usernameRegex, $_POST["username"]);
if ($isUsernameValid === 0 || $isUsernameValid === false) {
    failAccount(
        "Username must be 8-20 characters long, and only contain alphanumeric characters," .
        " underscore and dot"
    );
}

// EXAMPLE OF SANITATION: Make sure username doesn't contain the word 'poo'
if (strpos($_POST["username"], "poo") !== false) {
    failAccount("Username cannot contain the word 'poo' you poor troglodyte");
}

// Fail is username already exists in database
$testuser = $dao->checkUsername($_POST["username"]);
if ($testuser) {
    failAccount("Username already exists.");
}

// Make sure that password is at least 8 characters long.
if (strlen($_POST["password"]) < 8) {
    failAccount("Password must contain at least 8 characters");
}

// Make sure that password re-entry matches password.
if ($_POST["password"] != $_POST["passwordconf"]) {
    failAccount("Password re-entry must match password");
}

// Pass account if there are no problems.
$_SESSION["status"] = "Account created!";
$_SESSION["isNewUser"] = "False";
$dao->CreateUser($_POST["username"],$_POST["email"],$_POST["password"]);
header("Location:index.php");
?>
