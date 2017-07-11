<?php

namespace app\model;

class abstractdb {

    protected $servername;
    protected $username;
    protected $password;

    public static function getDb()
    {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "wordlist";

        $conn = new \mysqli($servername, $username, $password, $db);

        if ($conn->connect_error) {
            return $conn->connect_error;
        }
            return $conn;
    }

}
