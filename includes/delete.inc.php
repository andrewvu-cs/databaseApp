<?php
if(isset($_POST['delete-submit'])){

    require "dbh.inc.php";
    $clientname = $_POST['client_name'];

    if (empty($clientname)){
        header("Location: ../companydelete.php?error=emptyfields");
        exit();
    }
    else if(!preg_match('/^[a-zA-Z0-9\s]+$/', $clientname)){
        header("Location: ../companydelete.php?error=invalidclientname");
        exit();
    }
    else{
        $q = "DELETE FROM client WHERE client_name = '" . $clientname . "'"; 
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $q)){
            header("Location: ../companydelete.php?error=sqlerror");
            exit();
        }
        if (mysqli_query($conn, $q)){
            header("Location: ../companydelete.php?delete=success");
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