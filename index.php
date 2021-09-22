<?php
require_once('controller/dbController.php');
require_once('controller/operationController.php');
require_once('controller/frontController.php');
/*
    ici on récupere GETaction et on appele les controllers
*/
try {
    if(!isset($_GET['action'])) {
        header('Location: accounts_index.php?session-state=first-load');
        // goToHomeView();
        // goToHomeView('first-load');
    }
    else {  
        if($_GET['action'] == 'start-app') {
            listOperations();
        }

        elseif($_GET['action'] == 'add-operation') {
            if(!empty($_POST['sub-add-op']) ) {
                getNotif();
                addOperation();
            }
            else {
                throw new Exception('Something\'s wrong: index action add-opp: empty($_POST[\'sub-add-op\'])</br>');
            } 
        }

        elseif($_GET['action'] == 'suppr-operation') {
            if(!empty($_POST['sub-suppr-op']) ) {
                removeOperation($_GET['id']);
            }
            else {
                throw new Exception('Something\'s wrong: index action suppr-opp: empty($_POST[\'sub-suppr-op\']) </br>');
            } 
        }

        elseif($_GET['action'] == 'able-edit') {
            if(!empty($_POST['sub-able-edit']) ) {
                // echo "able-edit " . $_POST['sub-able-edit'] . " " . $_GET['id'] .'</br>';
                listOperations();
            }
            else {
                throw new Exception('Something\'s wrong: index action able-edit: empty($_POST[\'sub-able-edit\']) </br>');
            } 
        }

        elseif($_GET['action'] == 'edit-operation') {
            if(!empty($_POST['sub-edit-operation']) ) {
                // echo "edit-operation " . $_POST['sub-edit-operation'] . " " . $_GET['id'] .'</br>';
                editOperation($_GET['id']);
            }
            else {
                throw new Exception('Something\'s wrong: index action edit-operation: empty($_POST[\'sub-edit-operation\']) </br>');
            } 
        }

        else if($_GET['action'] == 'cancel-edit-operation') {
            $_GET['id'] = '';
            listOperations();
        }
    }

} catch(Exception $e) {
    echo 'Erreur index: ' . $e->getMessage() . '</br>';
}