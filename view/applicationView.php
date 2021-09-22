<?php 
$title = 'Bulbs Dashboard'; 
ob_start();
require_once('globals.php');
?>

<main id="main-application">
    <?php
        include('parts/form_operations.php');
    ?>
    <?php
        include('parts/table.php');
    ?>
</main>

<?php $content = ob_get_clean(); ?>
<?php require_once('parts/template.php'); ?>
