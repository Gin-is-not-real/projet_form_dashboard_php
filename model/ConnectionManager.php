<?php
require_once('./globals.php');

class ConnectionManager {
    public $basename;
    public $tablename;
    public $log_tablename;

    public function __construct() {
        $this->basename = $GLOBALS['basename'];
        $this->tablename = $GLOBALS['tablename'];
        $this->log_tablename = $GLOBALS['log-tablename'];
    }

    public function connectServer() {
        try {
            $db = new PDO("mysql:host=localhost", $GLOBALS['username'], $GLOBALS['password']);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die('Erreur connect server: ' . $e->getMessage());
        }
        //#echo 'connection au serveur' . '<br/>';
        return $db;
    }

    protected function connectBase() {
        try {
            $pdoConnect = new PDO("mysql:host=" . $GLOBALS['servername'] . ";dbname=" . $this->basename . ";charset=utf8", $GLOBALS['username'], $GLOBALS['password'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $e) {
            die('Erreur connect base: ' . $e->getMessage());
        }
        // echo "connected with database \"" . $GLOBALS['basename'] . '"</br>';
        // echo "connect base: " . $GLOBALS['msg_connect_ok'];
        return $pdoConnect;
    }

    function initDatabase() {
        $conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password']);
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error . '<br/>' . "please check globals.php and edit the file with host, user ect..");
        }
    
        $sql = "CREATE DATABASE $this->dbname";
        if ($conn->query($sql) === TRUE) {
        echo "Database created successfully" . '<br/>';
        } else {
        echo "Error during creating database: " . $conn->error . '<br/>';
        }
    
        $conn->close();   
    }
    
    function initAccountsTable() {
        $conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['basename']);
        if($conn->connect_error) {
            die("Connection failed:" . $conn->connect_error . '<br/>');
        }
    
        $sql = "CREATE TABLE $this->log_tablename(
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            pseudo VARCHAR(30) NOT NULL,
            mail VARCHAR(50) NOT NULL,
            pass VARCHAR(255) NOT NULL,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";
        
        if($conn->query($sql) === TRUE) {
            echo "Table create succefully" . '<br/>';
        } else {
            echo "Error creating table: " . $conn->error . '<br/>';
        }
        $conn->close();
    }
}

