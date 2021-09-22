<?php
require_once('model/AccountManager.php');
require_once('controller/frontController.php');

if(session_id() == '') {
    session_start();
}

function goToSite() {
    // header('Location: ' . $GLOBALS['sitepath'] . '?visitor_location=site');
    header('Location: index.php?action=start-app');

}

function initialize() {
    $accManager = new AccountManager();
    $accManager->init();
}

function deconnection() {
    // $_SESSION['pseudo'] = array();
    unset($_SESSION['pseudo']);
    session_destroy();

    goToHomeView();
}

function connection($pseudo, $pass) {
    $accountManager = new AccountManager();
    $logsDb = $accountManager->getLogs($pseudo);

    if($data = $logsDb->fetch()) {
        if($pass == $data['pass']) {
            $_SESSION['pseudo'] = $pseudo;
        }    
        else {    
            $_POST['log-error'] = 'Wrong password or pseudo';
            goToHomeView();
        }
    }
    else { 
        $_POST['log-error'] = 'Wrong password or pseudo';
        goToHomeView();
    }       
}

function registration($pseudo, $mail, $pass, $pass_repeat) {
    $accountManager = new AccountManager();
    $logsDb = $accountManager->getLogs($pseudo);

    if($pass != $pass_repeat) {
        $_POST['log-error'] = 'The two passwords must be identical';
        goToHomeView();
        // header('Location: view/accountView.php?log-notice=wrongPassRepeat&visitor_location=accountView');
    }
    elseif($data = $logsDb->fetch()) {
        $_POST['log-error'] = 'This pseudo is not available';
        goToHomeView();
        // header('Location: view/accountView.php?log-notice=pseudoNotAvailable&visitor_location=accountView');   
    }
    else {
        $accountManager->insertLogs($pseudo, $mail, $pass);
        //header("Location: view/siteView.php");       
        $_SESSION['pseudo'] = $pseudo; 
    }

}

