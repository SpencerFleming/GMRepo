<?php
function genTopbar($listItems) {
    echo '<div class="topbar">';
    echo '<ul>';
    foreach ($listItems as $item) {
        echo '<li>';
        echo $item;
        echo '</li>';
    }
    echo '</ul>';
    echo '<img id="tbarlogo" src="logo/logo_128px.png" alt="GMRepo Logo"/>';
    echo '</div>';
}
?>
