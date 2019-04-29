<?php
    function show_employees( $dbName, $msg, $query )
    {
        # QUERY STRING  
        $q = $query; 

        # EXECUTE QUERY
        $r = mysqli_query( $dbName, $q );
        $num = mysqli_num_rows( $r );
        
        if( $r )
        {
            echo '<div class = "card text-white bg-info mb-3 col-sm-4"><h1>' . $msg . '</h1>' . '(' . $num . ' rows)';
            while( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ) )
            {
                echo '<br>' . $row['emp_id'] . ' | ' . $row['first_name'] . " " . $row['last_name'];
            }
            echo '</div>';	
        }
        else 
        {
            echo '<p>' . mysqli_error( $dbName ).'</p>';
        }
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
                    echo '<h4> Performing query... </br>"' . $query .  '"</h4>';
                    echo '<p> BRANCH_ID | BRANCH_NAME | MGR_ID | MGR_START_DATE </p>';
                    while ($row = mysqli_fetch_array( $r, MYSQLI_ASSOC))
                    {
                        echo $row['branch_id'] . ' | ' . $row['branch_name'] . " | " . $row['mgr_id'] . " | " . $row['mgr_start_date'] . '</br>';
                    } 
                    echo '<br></div>';
                }
                elseif ($choice == "branch_supplier")
                {
                    echo '<div class = "card text-white bg-info mb-3 col-sm-12"><h1>' . $msg . '</h1>';
                    echo '<h4> Performing query... </br>"' . $query .  '"</h4>';
                    echo '<p> BRANCH_ID | SUPPLIER_NAME | SUPPLY_TYPE </p>';
                    while ($row = mysqli_fetch_array( $r, MYSQLI_ASSOC))
                    {
                        echo $row['branch_id'] . ' | ' . $row['supplier_name'] . " | " . $row['supply_type'] . '<br>';
                    }
                    echo '<br></div>';
                }
                elseif ($choice == "client")
                {
                    echo '<div class = "card text-white bg-info mb-3 col-sm-12  "><h2>' . $msg . '</h2>';
                    echo '<h4> Performing query... </br>"' . $query .  '"</h4>';
                    echo '<p> CLIENT_ID | CLIENT_NAME | BRANCH_ID </p>';
                    while ($row = mysqli_fetch_array( $r, MYSQLI_ASSOC))
                    {
                        echo $row['client_id'] . ' | ' . $row['client_name'] . " | " . $row['branch_id'] . '<br>';
                    }
                    echo '<br></div>';
                }
                elseif ($choice == "employee")
                {
                    echo '<div class = "card text-white bg-info mb-3 col-sm-12"><h1>' . $msg . '</h1>';
                    echo '<h3> Performing query... </br>"' . $query .  '"</h3>';
                    echo '<p> EMP_ID | FIRST_NAME | LAST_NAME | BIRTH_DAY | SEX | SALARY | BRANCH_ID </p>';
                    while ($row = mysqli_fetch_array( $r, MYSQLI_ASSOC))
                    {
                        echo $row['emp_id'] . ' | ' . $row['first_name'] . " | " . $row['last_name'] . " | " . $row['birth_day'] . " | " . $row['sex'] . " | " . $row['salary'] . " | " . $row['super_id'] . " | " . $row['branch_id'] . '<br>';
                    }
                    echo '<br></div>';
                }
                elseif ($choice == "works_with")
                {
                    echo '<div class = "card text-white bg-info mb-3 col-sm-12"><h1>' . $msg . '</h1>';
                    echo '<h3> Performing query... </br>"' . $query .  '"</h3>';
                    echo '<p> EMP_ID | CLIENT_ID | TOTAL_SALES </p>';
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