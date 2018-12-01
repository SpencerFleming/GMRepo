<?php
    session_start();
    if (isset($_POST['sbar_width'])) {
        $_SESSION['sbar_width'] = $_POST['sbar_width'];
    }
?>
