function loadNewUserPage() {
    $(".login").replaceWith($.get("newuser.php", "html"));
    $.post("loginStatus.php", {"isNewUser":"True"});
}

function loadExistingUserPage() {
    $(".login").replaceWith($.get("existingUser.php", "html"));
    $.post("loginStatus.php", {"isNewUser":"False"});
}

$(document).ready(function() {
    $("#newUserButton").click(loadNewUserPage());
    $("#existingUserButton").click(loadExistingUserPage());
} );
