<?php
    require "header.php";
?>
    <div class="text-center">
    <main>
        <?php
            if (isset($_SESSION['userId'])){
                echo '<h1 id="bodyHeader">You are logged in!</h1>';
            }
            else{
                echo '
                <h1 id="bodyHeader">Welcome to Andrew\'s Secret Library</h1>

                
                <p id="loggedOutText"> We got some really cool books in store but you\'ll 
                wont be able to see to check it out unless you are <br>SIGNED UP/LOGGED in!</p>';
            }
        ?>
    </main>
    </div>

<?php
    require "footer.php";
?>