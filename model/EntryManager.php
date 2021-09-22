<?php 
require_once('model/ConnectionManager.php');

class EntryManager extends ConnectionManager {
    public $basename;
    public $tablename;
    public $connectManager;
    public $dbPDO;

    public function __construct() {
        $this->connectManager = new ConnectionManager();
        $this->basename = $GLOBALS['basename'];
        $this->tablename = $GLOBALS['tablename'];
        $this->dbPDO = $this->connectManager->connectBase();
    }

    public function recordEntry() {
        try {
            $entry = $this->dbPDO->prepare("INSERT INTO $this->tablename (date_operation, b_floor, room, cost) VALUES (:date_operation, :b_floor, :room, :cost)");
            $affectedLines = $entry->execute(array(
                'date_operation' => $_POST['inp-date'],
                'b_floor' => $_POST['sel-floor'],
                'room' => $_POST['sel-room'],
                'cost' => $_POST['sel-cost']
            ));
        } catch (Exception $e) {
            die('Error on recordEntry(): ' . $e->getMessage());
        }
        return $affectedLines;
    }

    public function updateEntry($opId) {
        try {
            $toUp = $this->dbPDO->prepare("UPDATE $this->tablename SET date_operation = :date_operation, b_floor = :b_floor, room = :room, cost = :cost WHERE id = $opId");

            $affectedLines = $toUp->execute(array(
                'date_operation' => $_POST['inp-date'],
                'b_floor' => $_POST['sel-floor'],
                'room' => $_POST['sel-room'],
                'cost' => $_POST['sel-cost']
            ));
        } catch (Exception $e) {
            die('Error on updateEntry(): ' . $e->getMessage());
        }
    }

    public function getEntry($opId) {
        $entry = $this->dbPDO->query("SELECT id, DATE_FORMAT(date_operation, '%d/%m/%y') AS date_forma, b_floor, room, cost FROM $this->tablename  WHERE id =" . $opId);

        //FOR PAGINATION 
        // $req = $db->prepare("SELECT id, date_operation, b_floor, room, cost FROM {$GLOBALS['tablename']}  WHERE id =" . $opId);
        // $req->execute(array($opId));
        // $Entry = $req->fetch();

        return $entry;
    }

    public function getEntries() {
        $entries = $this->dbPDO->query("SELECT id, DATE_FORMAT(date_operation, '%m/%d/%y') AS date_forma, b_floor, room, cost FROM $this->tablename ORDER BY id DESC");
        return $entries;
    }

    public function deleteEntry($opId) {
        $this->dbPDO->exec("DELETE FROM $this->tablename WHERE id =" . $opId);
    }


    //### A TESTER
    public function getElementsWithOptions($options) {
        $connector = new ConnectionManager();
        $db = $connector->dbConnect($this->dbName);

        $elements = $db->query("SELECT nom, symbole, numero_atomique, famille, etat_standard FROM $this->tableName $options");

        return $elements;
    }
}