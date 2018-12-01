<?php
    session_start();
    header("Content-Type: text/css");

    $sbar_width = "0px";
    if (isset($_SESSION["sbar_width"])) {
        $sbar_width = $_SESSION["sbar_width"];
    }
?>

.sidebar {
    width: <?=$sbar_width?>;
}

#pushAside {
    margin-left: <?=$sbar_width?>;
}
