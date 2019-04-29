<?php
if(isset($_POST['insert-submit'])){

    require "dbh.inc.php";
    $clientid = $_POST['client_id'];
    $clientname = $_POST['client_name'];
    $branchid = $_POST['branch_id'];

    if (empty($clientname) ||  empty($branchid) || empty($clientid)){
        header("Location: ../companyinsert.php?error=emptyfields");
        exit();
    }
    else if(!preg_match('/^[a-zA-Z0-9\s]+$/', $clientname)){
        header("Location: ../companyinsert.php?error=invalidclientname");
        exit();
    }
    else if (!preg_match('/^[0-9]+$/', $clientid)){
        header("Location: ../companyinsert.php?error=invalidclientid");
        exit();
    }
    else if (!preg_match('/^[0-9]+$/', $branchid)){
        header("Location: ../companyinsert.php?error=invalidbranchid");
        exit();
    }
    else{
        $q = "INSERT INTO client (client_id, client_name, branch_id)
        VALUES ('" . $clientid . "','" . $clientname . "', '" . $branchid . "')" ;
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $q)){
            header("Location: ../companyinsert.php?error=sqlerror");
            exit();
        }
        if (mysqli_query($conn, $q)){
            header("Location: ../companyinsert.php?insert=success");
            echo '<h1> new record created successfully</h1>';
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