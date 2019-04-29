<?php
if(isset($_POST['update-submit'])){

    require "dbh.inc.php";
    $clientid = $_POST['client_id'];
    $clientname = $_POST['client_name'];

    if (empty($clientname) ||  empty($clientid)){
        header("Location: ../companyupdate.php?error=emptyfields");
        exit();
    }
    else if(!preg_match('/^[a-zA-Z0-9\s]+$/', $clientname)){
        header("Location: ../companyupdate.php?error=invalidclientname");
        exit();
    }
    else if (!preg_match('/^[0-9]+$/', $clientid)){
        header("Location: ../companyupdate.php?error=invalidclientid");
        exit();
    }
    else{
        $q = "UPDATE client SET client_name = '" . $clientname . "' WHERE client_id = '" . $clientid . "'"; 
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $q)){
            header("Location: ../companyupdate.php?error=sqlerror");
            exit();
        }
        if (mysqli_query($conn, $q)){
            header("Location: ../companyupdate.php?insert=success");
            echo '<h1> new record updated successfully</h1>';
            exit();
        }
        else{
            echo "Error: " . $q . "<br>" . mysqli_error($conn);
        }
        
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else{
    header("Location: ../companyinsert.php");
    exit();
}