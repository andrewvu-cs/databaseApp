
<?php
    require "header.php";

    if(isset($_POST['select-submit'])){
        require "includes/dbh.inc.php";
        $choice = $_POST['select'];
        
    }
    function select_query($dbName, $choice)
    {
            $query = "SELECT * FROM " . $choice;
            $r = mysqli_query( $dbName, $query );
            $num = mysqli_num_rows($r);

            if($r)
            {
                if ($choice == "branch")
                {
                    echo '<div class = "card text-white bg-info mb-3 col-sm-12"><h1>' . $msg . '</h1>';
                    echo '<h2> Performing query... </br>"' . $query .  '"</h2>';
                    echo '<p> BRANCH_ID | BRANCH_NAME | MGR_ID | MGR_START_DATE </p>(' . $num . ' rows) <br>';
                    while ($row = mysqli_fetch_array( $r, MYSQLI_ASSOC))
                    {
                        echo $row['branch_id'] . ' | ' . $row['branch_name'] . " | " . $row['mgr_id'] . " | " . $row['mgr_start_date'] . '</br>';
                    } 
                    echo '<br></div>';
                }
                elseif ($choice == "branch_supplier")
                {
                    echo '<div class = "card text-white bg-info mb-3 col-sm-12"><h1>' . $msg . '</h1>';
                    echo '<h2> Performing query... </br>"' . $query .  '"</h2>';
                    echo '<p> BRANCH_ID | SUPPLIER_NAME | SUPPLY_TYPE </p>(' . $num . ' rows) <br>';
                    while ($row = mysqli_fetch_array( $r, MYSQLI_ASSOC))
                    {
                        echo $row['branch_id'] . ' | ' . $row['supplier_name'] . " | " . $row['supply_type'] . '<br>';
                    }
                    echo '<br></div>';
                }
                elseif ($choice == "client")
                {
                    echo '<div class = "card text-white bg-info mb-3 col-sm-12"><h1>' . $msg . '</h1>';
                    echo '<h2> Performing query... </br>"' . $query .  '"</h2>';
                    echo '<p> CLIENT_ID | CLIENT_NAME | BRANCH_ID </p>(' . $num . ' rows) <br>';
                    while ($row = mysqli_fetch_array( $r, MYSQLI_ASSOC))
                    {
                        echo $row['client_id'] . ' | ' . $row['client_name'] . " | " . $row['branch_id'] . '<br>';
                    }
                    echo '<br></div>';
                }
                elseif ($choice == "employee")
                {
                    echo '<div class = "card text-white bg-info mb-3 col-sm-12"><h1>' . $msg . '</h1>';
                    echo '<h2> Performing query... </br>"' . $query .  '"</h2>';
                    echo '<p> EMP_ID | FIRST_NAME | LAST_NAME | BIRTH_DAY | SEX | SALARY | BRANCH_ID </p>(' . $num . ' rows) <br>';
                    while ($row = mysqli_fetch_array( $r, MYSQLI_ASSOC))
                    {
                        echo $row['emp_id'] . ' | ' . $row['first_name'] . " | " . $row['last_name'] . " | " . $row['birth_day'] . " | " . $row['sex'] . " | " . $row['salary'] . " | " . $row['super_id'] . " | " . $row['branch_id'] . '<br>';
                    }
                    echo '<br></div>';
                }
                elseif ($choice == "works_with")
                {
                    echo '<div class = "card text-white bg-info mb-3 col-sm-12"><h1>' . $msg . '</h1>';
                    echo '<h2> Performing query... </br>"' . $query .  '"</h2>';
                    echo '<p> EMP_ID | CLIENT_ID | TOTAL_SALES </p>(' . $num . ' rows) <br>';
                    while ($row = mysqli_fetch_array( $r, MYSQLI_ASSOC))
                    {
                        echo $row['emp_id'] . ' | ' . $row['client_id'] . " | " . $row['total_sales'] . '<br>' ;
                    }
                    echo '<br></div>';
                }
                else 
                {
                    header("Location: ../companyselect.php?error=WHATYOUDO");
                    exit();
                }

            }
            else
            {
                echo '<p>' . mysqli_error($dbName) . '</p>';
            }
    
    }

?>
    <div class="text-center">
    <main>
        <?php

            if (isset($_SESSION['userId'])){
                echo '<div class = "card text-white bg-info mb-3 col-sm-12">';
                echo '<h3> SELECT a table from our Company\'s Database to view their contents </h3>';
                echo '<p> SELECT * FROM ';
                echo '<form method="post">
                        <input type="radio" name="select" value="branch" checked> branch<br>
                        <input type="radio" name="select" value="branch_supplier"> branch_supplier<br>
                        <input type="radio" name="select" value="client"> client<br>  
                        <input type="radio" name="select" value="employee"> employee<br>  
                        <input type="radio" name="select" value="works_with"> works_with<br>
                        <button type="submit" name="select-submit">Submit</button>
                    </form>';
                echo '</p>';
                echo '</div>';
                select_query($conn, $choice);
                echo '<h1>THIS PAGE HANDLES ITS FORM, NOT A TWO FORM HANDLER!</h1>';
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