<?php
    error_reporting(E_ALL);
    ini_set('display_errors',1);

    $status = "";
    if (isset($_SESSION["status"])) {
        $status = $_SESSION["status"];
    }

    $username_preset = "";
    if (isset($_SESSION["username_preset"])) {
        $username_preset = $_SESSION["username_preset"];
    }

    $email_preset = "";
    if (isset($_SESSION["email_preset"])) {
        $email_preset = $_SESSION["email_preset"];
    }
?>

<div>
    <h1>Create New Account</h1>
    <form action="create_account.php" method="POST" id=newuser>
        <?php if ($status != "") {
            echo '<p class="statusmsg">' . $status . "</p>";
        } ?>
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="<?php echo $username_preset; ?>"/>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="<?php echo $email_preset; ?>"/>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" value=""/>
        </div>
        <div>
            <label for="passwordconf">Password (again)</label>
            <input type="password" name="passwordconf" id="passwordconf" value=""/>
        </div>
        <div>
            <input type="submit" name="submit" id="create user" value="create user"/>
        </div>
    </form>
    <button id="existingUserButton">Login with existing account</button>
</div>
