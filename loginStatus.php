<?php
    session_start();
    if (isset($_POST['isNewUser'])) {
        $_SESSION['isNewUser'] = $_POST['isNewUser'];
    }
?>
