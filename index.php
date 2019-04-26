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
                <h1 id="bodyHeader">Welcome to Andrew\'s  Company landing page, interim CEO!</br></h1>

                <h2>Were a fortune 431 company!! </h2>
                <p id="loggedOutText">Sign Up to access the company\'s secret pages.  See all the information about our employees. <br>
                You must be SIGNED UP/LOGGED in!</p>';
            }
        ?>
    </main>
    </div>

<?php
    require "footer.php";
?>