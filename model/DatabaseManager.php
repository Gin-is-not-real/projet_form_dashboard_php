<?php
require_once('globals.php');

class DatabaseManager {
    protected $dbname;
    protected $tabname;

    function __construct() {
        $this->dbname = $GLOBALS['basename'];
        $this->tabname = $GLOBALS['log-tablename'];
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
        echo "Error creating database: " . $conn->error . '<br/>';
        }
    
        $conn->close();   
    }
    
    function initTable() {
        $conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['dbname']);
        if($conn->connect_error) {
            die("Connection failed:" . $conn->connect_error . '<br/>');
        }
    
        // $sql = "CREATE TABLE $this->tabname(
        $sql = "CREATE TABLE $this->tabname(
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
?>