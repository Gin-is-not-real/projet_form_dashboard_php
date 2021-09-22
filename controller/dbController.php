<?php
require_once('model/ConnectionManager.php');

function connectOrCreateBase() {
    $connector = new ConnectionManager();
    $exist = $connector->checkTable();
    if(!$exist) {
        // echo 'Connect or create: La table "' . $connector->tableName . '" n\'existe pas dans la base "' . $this->basename .'" et va être crée' . '<br/>';
        $connector->createBase();
        $connector->createTable();
    }
    $db = $connector->connectBase();
    return $db;
}