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

$status = "";

// Fail if email is invalid
if ($_POST["email"] == "") {
    $status = $status . "ERROR: No email address\n";
}
else if ($_POST["email"] != filter_var($_POST["email"], FILTER_SANITIZE_EMAIL)) {
    $status = $status . "ERROR: Email contains invalid characters\n";
}
else if ($_POST["email"] != filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $status = $status . "ERROR: Invalid email address\n";
}
else {
    // Fail if email already exists in database
    $testpass = $dao->getPassword($_POST["email"]);
    if ($testpass != null) {
        $status = $status . "ERROR: Account with this email address already exists\n";
    }
}

// Fail if username fails regex comparison
$usernameRegex = "^(?=.{5,20}$)[a-zA-Z0-9._]$";
$isUsernameValid = preg_match($usernameRegex, $_POST["username"]);
if ($isUsernameValid === 0 || $isUsernameValid === false) {
    $status = $status .
        "ERROR: Username must be 5-20 characters long, and only contain alphanumeric characters," .
        " underscore and dot\n";
}
else {

// EXAMPLE OF SANITATION: Make sure username doesn't contain the word 'poo'
//if (strpos($_POST["username"], "poo") !== false) {
//    failAccount("Username cannot contain the word 'poo' you poor troglodyte");
//}

    // Fail is username already exists in database
    $testuser = $dao->checkUsername($_POST["username"]);
    if ($testuser) {
        $status = $status . "ERROR: Username already exists\n";
    }
}

// Make sure that password is at least 8 characters long.
if (strlen($_POST["password"]) < 8) {
    $status = $status . "ERROR: Password must contain at least 8 characters\n";
}

// Make sure that password re-entry matches password.
if ($_POST["password"] != $_POST["passwordconf"]) {
    $status = $status . "ERROR: Password re-entry must match password\n";
}

if ($status != "") {
    failAccount($status);
}

// Pass account if there are no problems.
$_SESSION["status"] = "Account created!";
$_SESSION["isNewUser"] = "False";
$_SESSION["email_preset"] = $_POST["email"];
$dao->CreateUser($_POST["username"],$_POST["email"],$_POST["password"]);
header("Location:index.php");
?>
