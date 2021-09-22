    <div id="div-logout">
        <div id="r-notice">
            <?php 
                if(isset($_SESSION['pseudo'])) {
                    echo "You are logged in as <strong>" . $_SESSION['pseudo'] . "</strong>";
                }
            ?>
        </div>

        <div>
            <?php 
                if(isset($_SESSION['pseudo'])) {
                    echo '<a href="accounts_index.php?action=deconnection"><input class="round-btn super red visible-on-app" id="btn-deconnection" type="submit" name="action" value="LOG OUT"></a>';
                }
                ?>
        </div>
    </div>
