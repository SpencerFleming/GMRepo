function loadNewUserPage() {
    $(".login").empty();
    $(".login").load("newuser.php");
    $.post("loginStatus.php", {"isNewUser":"True"});
}

function loadExistingUserPage() {
    $(".login").empty();
    $(".login").load("existingUser.php");
    $.post("loginStatus.php", {"isNewUser":"False"});
}

function onReady() {
    $(".login").on("click", "#newUserButton", loadNewUserPage);
    $(".login").on("click", "#existingUserButton", loadExistingUserPage);
}

$(document).ready(onReady);
