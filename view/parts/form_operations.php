<section id="sec-formulaire" class="centred-section">

    <form id="form-operation-add" action="index.php?action=add-operation" method="post">
        <header>
            <h3>ADD NEW OPERATION</h3>
        </header>

            <table id="table-formulaire">
                <tr>
                    <th>Date</th>
                    <th>Floor</th>
                    <th>Room</th>
                    <th>Cost</th>
                    <th>Actions</th>
                </tr>

                <tr>
                    <td> <input type="date" name="inp-date" value="<?php echo date('Y-m-d'); ?>" </td>
                    <td> 
                        <select name="sel-floor" id="sel-floor">
                            <?php 
                                foreach($GLOBALS['floors'] as $value) {
                            ?>
                                <option value="<?= $value ?> "> <?= $value ?> </option></br>;
                            <?php 
                                }
                            ?>
                        </select>
                    </td>
    
                    <td> 
                        <select name="sel-room" id="sel-room">
                            <?php 
                                foreach($GLOBALS['rooms'] as $value) {
                            ?>
                                <option value="<?= $value ?> "> <?= $value ?> </option></br>;
                            <?php 
                                }
                            ?>
                        </select>
                    </td>
                
                    <td> 
                        <select name="sel-cost" id="sel-cost">
                            <?php 
                                foreach($GLOBALS['cost'] as $value) {
                            ?>
                                <option value="<?= $value ?> "> <?= $value ?> </option></br>;
                            <?php 
                                }
                            ?>
                        </select> 
                    </td>
    
                    <td id="td-actions">
                        <input type="submit" class="round-btn little green" name="sub-add-op" value="add" id="sub-add">
                    </td>

            </table>
        </div>
    </form>

</section>
