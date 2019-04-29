
<?php
    require "header.php";
    require "includes/dbh.inc.php";
    require "includes/queries.inc.php";
?>
    <div class="text-center">
    <main>
        <?php
            if (isset($_SESSION['userId'])){
                echo '<div class = "card text-white bg-info mb-3 col-sm-12">';
                echo '<h3> Please feel free to UPDATE our client table from our database</h3>';
                echo '<p> UPDATE client SET client_name = " " WHERE ID = " "';
                echo '<form action="includes/update.inc.php" method="post">
                        New Client Name: <input type="text" name="client_name">
                        Client ID: <input type="text" name="client_id"><br><br>
                        <button type="submit" name="update-submit"> UPDATE CLIENT!</button><br>
                        The query below will update after hitting the button!
                    </form>';
                echo '</p>';
                echo '</div>';
                
                echo '<div class = "row">';
                    select_query($conn, "client"); 
                echo '</div>';
                
                if (isset($_GET['error'])){
                    if ($_GET['error'] == "emptyfields"){
                        echo '<p> Fill in the field! </p>';
                    }
                }
                else if ($_GET["delete"] == "success"){
                    echo '<h1> Record Successfully Deleted! <br>You can look at the company_select page and select clients to view your action</p>';
                }
            }
            else{
                header("Location: ../index.php?error=YOURENOTLOGGEDIN");
                exit();
            }
        ?>
    </main>
    </div>

<?php
    require "footer.php";
?>