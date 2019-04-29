
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
                echo '<h3> Please feel free to DELETE Client from our database</h3>';
                echo '<p> DELETE FROM client WHERE client_name = " "';
                echo '<form action="includes/delete.inc.php" method="post">
                        Client Name: <input type="text" name="client_name"><br><br>
                        <button type="submit" name="delete-submit"> DELETE CLIENT!</button><br>
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
                    echo '<h1> Record Successfully Deleted! </h1>';
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