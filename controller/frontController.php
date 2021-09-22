<?php
require_once('globals.php');

function goToHomeView() {
    // header('Location: view/homeView.php?visitor_location=home');
    require('view/homeView.php');
    exit();
}

function goToApplicationView() {
    // header('Location: view/applicationView.php?visitor_location=application');

    header('Location: view/applicationView.php');

    exit();
}

function getNotif() {
    $notif = '';
    forEach($GLOBALS['form_fields'] as $field) {

        if(isset($_POST[$field])) {
            $notif .= $_POST[$field] . " ";
        }
    }
    $GLOBALS['notif'] = $notif;
    return $notif;
}