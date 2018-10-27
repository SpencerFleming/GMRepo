/* Set the width of side nav to 0 or existing width dending on current width */
sbar_width = "260px";
function toggleMenu() {
    sbar = document.getElementById("sbar");
    sbar_c_width = sbar.style.width;
    push = document.getElementById("pushAside");
    menubut = document.getElementById("menubutton");
    if (sbar_c_width == "0px" || sbar_c_width == 0) {
        sbar.style.width = sbar_width;
        push.style.marginLeft = sbar_width;
        menubut.classList.add("activated");
    }
    else {
        sbar.style.width = "0px";
        push.style.marginLeft = "0px";
        menubut.classList.remove("activated");
    }
}
