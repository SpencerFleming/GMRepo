/* Set the width of side nav to 0 or existing width dending on current width */
sbar_width = "260px";
function toggleMenu() {
    sbar_c_width = $("#sbar").css("width");
    if (sbar_c_width == "0px") {
        $("#sbar").css("width", sbar_width);
        $("#pushAside").css("marginLeft", sbar_width);
        $("#menubutton").addClass("activated");
    }
    else {
        $("#sbar").css("width", "0px");
        $("#pushAside").css("marginLeft", "0px");
        $("#menubutton").removeClass("activated");
    }
}
