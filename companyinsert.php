
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
                echo '<h3> Please feel free to INSERT a new Client into our database</h3>';
                echo '<p> INSERT INTO client (client_name, branch_id)';
                echo '<form action="includes/insert.inc.php" method="post">
                        Client ID: <input type="text" name="client_id">
                        Client Name: <input type="text" name="client_name"><br><br>
                        Branch ID: <input type="radio" name="branch_id" value = "2"checked> 2
                        <input type = "radio" name = "branch_id" value="3"> 3<br><br>
                        <button type="submit" name="insert-submit"> NEW CLIENT!</button><br>
                        The query below will update after hitting the button!
                    </form>';
                echo '</p>';
                echo '</div>';
                
                select_query($conn, "client");
                if (isset($_GET['error'])){
                    if ($_GET['error'] == "emptyfields"){
                        echo '<p> Fill in all fields! </p>';
                    }
                }
                else if ($_GET["insert"] == "success"){
                    echo '<h1> New Record Successfully Entered!';
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