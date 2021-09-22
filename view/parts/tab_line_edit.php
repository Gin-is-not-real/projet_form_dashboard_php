<form action="index.php?action=edit-operation&amp;id=<?= $data['id'] ?>" method="post"> 

        <tr class="<?= $color; ?> tr<?= $data['id'] ?>" id="<?= $data['id'] ?>">
            <td> <?= $data['id'] ?> </td>
            <td> <input type="date" name="inp-date" value="<?= date('Y-m-d', strtotime($data['date_forma'])); ?>" disabled>  </td>

            <td> 
                <select name="sel-floor" id="sel-floor" disabled>
                    <?php 
                        foreach($GLOBALS['floors'] as $value) {
                    ?>
                        <option value="<?= $value ?>" <?= $value == $data['b_floor'] ? 'selected="selected"' : ''; ?>> <?= $value ?> </option></br>;
                    <?php 
                        }
                    ?>
                </select>
            </td>

            <td> 
                <select name="sel-room" id="sel-room"  disabled>
                    <?php 
                        foreach($GLOBALS['rooms'] as $value) {
                    ?>
                        <option value="<?= $value ?>" <?= $value == $data['room'] ? 'selected="selected"' : ''; ?>> <?= $value ?> </option></br>;
                    <?php 
                        }
                    ?>
                </select>
            </td>
            
            <td> 
                <select name="sel-cost" id="sel-cost"  disabled>
                    <?php 
                        foreach($GLOBALS['cost'] as $value) {
                    ?>
                        <option value="<?= $value ?>" <?= $value == $data['cost'] ? 'selected="selected"' : ''; ?>> <?= $value ?> </option></br>;
                    <?php 
                        }
                    ?>
                </select> 
            </td>

            <td id="td-actions">

                    <!-- SUB CONFIRM EDIT hidden-->
                    <!-- confirm button of the edition mode, appears when the line is being edited, after a clic on the sub-edit button  -->
                    <input type="submit" class="round-btn big green sub-edit-operation appear-on-edit" id="sub-confirm-edit-<?= $data['id'] ?>" name="sub-edit-operation" value="confirm" hidden ></input>
                </form>

                    <!-- SUB EDIT MODE-->
                    <!-- make line's inputs availables, make disappear sub-edit- and sub-suppr-op buttons and appears buttons sub-confirm-edit and sub-cancel-edit -->
                    <input type="submit" class="round-btn little neutral sub-edit disappear-on-edit" id="sub-edit-<?= $data['id'] ?>" name="sub-able-edit" value="edit" onclick="switchEditModeForLine(<?= $data['id'] ?>)"></input>

                    <!-- SUB CANCEL EDIT hidden-->
                    <!-- visible only if line is being edited -->
                    <input type="submit" class="round-btn big red sub-cancel-edit appear-on-edit" id="sub-cancel-edit-<?= $data['id'] ?>" name="sub-cancel-edit" onclick="switchEditModeForLine(<?= $data['id'] ?>, false)" value="cancel" hidden>

                    <!-- SUB SUPPR OP -->
                    <!-- made appear a popup who ask confirm for delete the line -->
                    <input type="submit" class="round-btn little red sub-suppr disappear-on-edit" id="suppr-<?= $data['id'] ?>" name="sub-suppr-op" value="X" onclick="return displayHiddePopupConfirm('You will delete the entry n° ' + <?= $data['id'] ?> + ' ?', '#sub-suppr-' + <?= $data['id']; ?>)" >

                    <form action="index.php?action=suppr-operation&amp;id=<?= $data['id'] ?>" method="post">
                        <!-- SUB SUPPR ID hidden-->
                        <!-- hidden. Is activated by clic on the "yes" button of the confirm popup-->
                        <input type="submit" class="round-btn little red sub-suppr disappear-on-edit" id="sub-suppr-<?= $data['id'] ?>" name="sub-suppr-op" value="X" hidden>
                </form>
            </td>