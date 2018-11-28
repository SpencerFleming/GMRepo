<?php
    error_reporting(E_ALL);
    ini_set('display_errors',1);

    $status = "";
    if (isset($_SESSION["status"])) {
        $status = $_SESSION["status"];
    }

    $email_preset = "";
    if (isset($_SESSION["email_preset"])) {
        $email_preset = $_SESSION["email_preset"];
    }
?>

<div>
    <h1> Login </h1>
    <?php if ($status != "") {
        echo '<p class="statusmsg">' . $status . '</p>';
    } ?>
    <form action="login_handler.php" method="POST" id="LOGIN">
        <div>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="<?php echo $email_preset; ?>"/>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" value=""/>
        </div>
        <div>
            <input type="submit" name="submit" id="login" value="Login"/>
        </div>
    </form>
    <button id="newUserButton">Create New Account</button>
</div>
