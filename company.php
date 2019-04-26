
<?php
    require "header.php";
?>
    <div class="text-center">
    <main>
        <?php
            if (isset($_SESSION['userId'])){
                echo '<h1  >Welcome to the library!</h1>';
                echo '<h2> Feel free to search/checkout a book within our system </h2>';
                echo '
                    <div class = "row">
                    <div class = "card text-white bg-info mb-3 col-sm-3"  style="width: 75rem;">
                        <section> hello!</section>
                    </div>
                    <div class = "card text-white bg-info mb-3 col-sm-9"  style="width: 75rem;">
                        <section> hello!</section>
                    </div>
                    <div class = "card text-white bg-info mb-3 col-sm-4"  style="width: 75rem;">
                        <section> hello!</section>
                    </div>
                    </div>';
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