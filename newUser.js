function animateResize() {
    $(".loadingCover").remove();
    $login = $(".login");
    $("<div class='loadingCover'/>").appendTo($($login).css("position", "relative"));
    $(".loadingCover").css('opacity', '1');
    $login.wrapInner('<div/>');
    var newheight = $('div:first', $login).height();
    $(".loadingCover").css('opacity', '0');
    $login.animate( {height: newheight} );
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
