<?php 
require_once('globals.php');
require_once('model/EntryManager.php');

    function listOperations() {
        $opManager = new EntryManager();
        $operations = $opManager->getEntries();
        require_once('view/applicationView.php');
    }
    //CALLTEST
    // listOperations();

    function addOperation() {
        $notice = "";
        forEach($GLOBALS['form_fields'] as $field) {
            if(isset($_POST[$field])) {
                $notice .+ $field . " ";
            }
        }
        if($notice === "") {
            $opManager = new EntryManager();
            $affectedLines = $opManager->recordEntry();
    
            if($affectedLines === false) {
                //l'erreur remonte jusqu'au bloc try du routeur
                throw new Exception('Unable to record operation');
            }
            else {
                header('Location: index.php?action=start-app&notice=op-added');
                // require_once('view/applicationView.php');
            }
        }
        else {
            // echo "<script>alert(\'Unable to record operation: field(s) ' . $notice . ' void</script>";
            throw new Exception('Unable to record operation, ' . $notice);
        }
    }

    function removeOperation($id) {
        $opManager = new EntryManager();
        $operation = $opManager->deleteEntry($id);
        header('Location: index.php?action=start-app&notice=op-suppr');
        
        // require_once('view/applicationView.php');
    }
    //CALLTEST
    // removeOperation(33);

    function editOperation($id) {
        $opManager = new EntryManager();
        $operation = $opManager->updateEntry($id);
        header('Location: index.php?action=start-app&notice=op-update');
    }

    function getOperation($opId) {
        $opManager = new EntryManager();
        $operation = $opManager->getEntry($opId);
    }
    //CALLTEST
    // getOperation(17);

