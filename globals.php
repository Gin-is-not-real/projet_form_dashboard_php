<?php
$GLOBALS['servername'] = 'localhost';
$GLOBALS['username'] = 'admin';
$GLOBALS['password'] = 'admin';
$GLOBALS['basename'] = 'bulbs_dashboard';
$GLOBALS['tablename'] = 'bulbs_dash';
$GLOBALS['log-tablename'] = 'log_bulbs_dash';

$GLOBALS['sitename'] = "";
$GLOBALS['homeview'] = "view/homeView.php";
$GLOBALS['applicationview'] = "view/applicationView.php";

$GLOBALS['msg_connect_ok'] = "connected with database \"" . $GLOBALS['basename'] . '"</br>';
$GLOBALS['msg_record_ok'] = "\" has been correctly recorded";

$GLOBALS['create_table_request'] = [
    "id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    date_operation DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    b_floor SET('ground floor','floor 1','floor 2','floor 3','floor 4','floor 5','floor 6','floor 7','floor 8','floor 9','floor 10','floor 11') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
    room SET('entrance','living room','kitchen','bathroom','bedroom') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
    "];
    
    $GLOBALS['fields'] = ['date_operation', 'b_floor', 'room', 'cost'];
    $GLOBALS['floors'] = ['ground floor','floor 1','floor 2','floor 3','floor 4','floor 5','floor 6','floor 7','floor 8','floor 9','floor 10','floor 11'];
    $GLOBALS['rooms'] = ['entrance','living room','kitchen','bathroom','bedroom'];
    $GLOBALS['cost'] = ['1.25', '2.10', '3.20'];

    $GLOBALS['form_fields'] = ['inp-date', 'sel-floor', 'sel-room', 'sel-cost'];
    $GLOBALS['form_fields_operations'] = [$GLOBALS['floors'], $GLOBALS['rooms']];