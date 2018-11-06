<?php
// Dao.php
class Dao {
    /*
    private $host = "us-cbdr-iron-east-01.cleardb.net";
    private $db   = "heroku_ad951a78739c51c?reconnect=true";
    private $user = "bb8f5bb40607a5";
    private $pass = "45bea5ad";
    private $port = "3066";

    public function getConnection () {
        $host = $this->host;
        $db = $this->db;
        $user = $this->user;
        $pass = $this->pass;
        $port = $this->port;
        return
            new PDO(
            "mysql:host={$host};port={$port};dbname={$db}",
            $user,
            $pass);
    }
    */

    public function getConnection() {
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

        $server = $url["host"];
        $username = $url["user"];
        $password = $url["pass"];
        $db = substr($url["path"], 1);

        return new PDO("mysql:host={$server};dbname={$db}", $username, $password);
    }

    /* Functions that retrieve data should be below here */

    //getPassword returns null if user doesn't exist.
    public function getPassword ($email) {
        $conn = $this->getConnection();
        // The syntax of the query below makes 'no row' become NULL.
        $query =
            "SELECT (SELECT password FROM Users WHERE email=:email) AS password";
        $q = $conn->prepare($query);
        $q->bindParam(":email", $email);
        $q->execute();
        $pass = $q->fetch(PDO::FETCH_LAZY);
        return $pass->password;
        /*
        $query =
            "SELECT (SELECT password FROM Users WHERE email='$email') AS password";
        $pass = $conn->query($query)->fetch(PDO::FETCH_LAZY);
        return $pass->password;
        */
    }

    public function checkUsername($username) {
        $conn = $this->getConnection();
        $query =
            "SELECT (SELECT username FROM Users WHERE username=:user) AS username";
        $q = $conn->prepare($query);
        $q->bindParam(":user", $username);
        $q->execute();
        $usr = $q->fetch(PDO::FETCH_LAZY);
        return $usr->username == $username;
        /*
        $query =
            "SELECT (SELECT username FROM Users WHERE username='$username') AS username";
        $usr = $conn->query($query)->fetch(PDO::FETCH_LAZY);
        return $usr->username == $username;
        */
    }

    public function getUsername ($email) {
        $conn = $this->getConnection();
        $query = "SELECT (SELECT username FROM Users WHERE email='$email') AS username";
        $usr = $conn->query($query)->fetch(PDO::FETCH_LAZY);
        return $usr->username;
    }

    public function CreateUser ($username, $email, $password) {
        $conn = $this->getConnection();
        $query =
            "INSERT INTO Users (username, email, password)
            VALUES (:username, :email, :password)";
        $q = $conn->prepare($query);
        $q->bindParam(":username", $username);
        $q->bindParam(":email", $email);
        $q->bindParam(":password", $password);
        $q->execute();
    }
}
