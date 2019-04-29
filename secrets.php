<?php
    require "header.php";
?>
    <div class="text-center">
    <main>
        <?php
            if (isset($_SESSION['userId'])){
                echo '<h1 id="secretsHeader" style="padding-top:2em;">Secrets to our success...</h1>';
                echo '<h2 id="secrets-text"><span id="hardwork" style="color:DodgerBlue;"> hard work! </span></h2></br>
                      <h3 style="padding-top:2em;">  On another note.... Look at these cool images!</h3>';
                echo '<img src="/images/pic1.jpg" class = "img-thumbnail" style = "max-width: 10%;">';
                echo '<img src="/images/pic3.jpg" class = "img-thumbnail" style = "max-width: 8.5%; max-height: 10%;">';
                echo '<img src="/images/pic2.jpg" class = "img-thumbnail" style = "max-width: 10%; max-height: 10%;">';
                echo '<p> Images were free to use via <a href=https://unsplash.com/>Unsplash</a></p>';

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