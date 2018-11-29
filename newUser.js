function animateResize() {
    $login = $(".login");
    $("<div class='loadingCover'/>").appendTo($($login).css("position", "relative"));
    $login.wrapInner('<div/>');
    var newheight = $('div:first', $login).height();
    $login.animate( {height: newheight}, function() {
        $(".loadingCover").remove();
    });
}

function loadNewUserPage() {
    $.post("loginStatus.php", {"isNewUser":"True"});
    var $login = $(".login");
    $login.css('height', $login.height());
    $(".login").load("newuser.php", animateResize);
}

function loadExistingUserPage() {
    $.post("loginStatus.php", {"isNewUser":"False"});
    $(".login").load("existingUser.php", animateResize);
}

function onReady() {
    $(".login").on("click", "#newUserButton", loadNewUserPage);
    $(".login").on("click", "#existingUserButton", loadExistingUserPage);
}

$(document).ready(onReady);
