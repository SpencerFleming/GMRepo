<?php
class Dao {
    private $host = "us-cbdr-iron-east-01.cleardb.net";
    private $db   = "heroku_ad951a78739c51c";
    private $user = "bb8f5bb40607a5";
    private $pass = "45bea5ad";
    public function getConnection () {
        return
            new PDO("mysql:host={$this->host}
            ;dbname={$this->db}", {$this->user},
        {$this->pass});
    }
}
