<?php
require_once('ConnectionManager.php');
require_once('./globals.php');

class AccountManager extends ConnectionManager {
    public $basename;
    public $tablename;
    public $dbPDO;

    public function __construct() {
        $this->basename = $GLOBALS['basename'];
        $this->tablename = $GLOBALS['log-tablename'];
        $this->dbPDO = $this->connectBase();
    }

    public function init() {
        $this->initDatabase();
        $this->initAccountsTable();
    }

    public function getLogs($pseudo) {
        $req = $this->dbPDO->prepare("SELECT pseudo, pass FROM $this->tablename WHERE pseudo = :pseudo");
        $req->execute(array('pseudo' => $pseudo));
        return $req;
    }

    public function insertLogs($pseudo, $mail, $pass) {
        $req = $this->dbPDO->prepare("INSERT INTO $this->tablename(pseudo, mail, pass) VALUES(:pseudo, :mail, :pass)");
        $affectedLine = $req->execute(array(
            'pseudo' => $pseudo,
            'mail' => $mail,
            'pass' => $pass
        ));
        return $affectedLine;
    }

}
?>