<?php
    require "header.php";
?>

    <div class="d-flex justify-content-center border border-info" >
    <main>
       <h1 class="d-flex justify-content-center">Signup</h1>
       <?php
            if(isset($_GET['error'])){
                if ($_GET['error'] == "emptyfields"){
                    echo '<p> Fill in all fields! </p>';
                }
                else if ($_GET['error'] == "invaliduidmail"){
                    echo '<p> Invalid username and e-mail! </p>';
                }
                else if ($_GET['error'] == "invaliduid"){
                    echo '<p> Invalid username! </p>';
                }
                else if ($_GET['error'] == "invalidmail"){
                    echo '<p> Invalid e-mail! </p>';
                }
                else if ($_GET['error'] == "passwordcheck"){
                    echo '<p> Your passwords do not match! </p>';
                }
                else if ($_GET['error'] == "usertaken"){
                    echo '<p> Username is already taken! </p>';
                }
            }
            else if ($_GET["signup"] == "success"){
                echo '<p> Signup Successful! </p>';
            }
       ?>
       <form action="includes/signup.inc.php" method="post">
            <input type="text" name="uid" placeholder="Username" class="d-flex justify-content-center">
            <input type="text" name="mail" placeholder="E-mail" class="d-flex justify-content-center">
            <input type="text" name="uidfirst" placeholder="First Name" class="d-flex justify-content-center">
            <input type="text" name="uidlast" placeholder="Last Name" class="d-flex justify-content-center">
            <input type="password" name="pwd" placeholder="Password" class="d-flex justify-content-center">
            <input type="password" name="pwd-repeat" placeholder="Repeat Password" class="d-flex justify-content-center">
            <button type="submit" name="signup-submit" class="btn btn-info d-flex justify-content-center">Sign Me Up!</button>
        </form>
       
    </main>
    </div>
  

<?php
    require "footer.php";
?>