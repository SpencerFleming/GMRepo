function showsettings() {
    $.get("settings.php","html", function(data) {
        $(data).appendTo($('body'));
        $('.popupmenu,.curtain').css('opacity','0');
        $('.popupmenu,.curtaion').css('opacity');
        $('.popupmenu').css('opacity','1');
        $('.curtain').css('opacity','.4');
    });
}

function closemenu() {
    $(".curtain").remove();
    $(".popupmenu").remove();
};
