<section id="sec-table" class="centred-section">
<!-- <section class="sec-title">
    <header>
        <h4>view operations</h4>
    </header>
</section> -->
    <header>
        <h3>VIEW OPERATIONS</h3>
    </header>

<table id="table_operations">

    <tr>
        <th>Id</th>
        <th>Date</th>
        <th>Floor</th>
        <th>Room</th>
        <th>Cost</th>
        <th>Actions</th>
    </tr>

<?php
    $color = 'color1';
    while($data = $operations->fetch()) {
        if(isset($_GET['id']) AND $_GET['id'] === $data['id']) {
            include('tab_line_edit.php');
        }
        else {
            // include('tab_line.php');
            include('tab_line_edit.php');
        }

    $color = $color === 'color1' ? 'color2' : 'color1'; 
    }
    $operations->closeCursor();
?> 

</table>
</section>


<script type="text/javascript">
    let btns_edit = document.querySelector(".btn-edit");
</script>

<style type="text/css">

</style>