<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel = "stylesheet" href = "style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Andrew Vu DB App</title>
</head>
<body id="body">
    <header id="headerAll">
        <nav class="navbar navbar-light justify-content-between">
        <?php
            if (isset($_SESSION['userId'])){
                echo '<a class="navbar-brand" href="index.php"> Andrew Vu\'s company</a>
                        <ul class="navbar-nav mr-auto d-inline-block">
                            <li class="nav-item d-inline-block"><a class="nav-link" href="companyselect.php">Company_SELECT</a></li>
                            <li class="nav-item d-inline-block"><a class="nav-link" href="companyinsert.php">Company_INSERT</a></li>
                            <li class="nav-item d-inline-block"><a class="nav-link" href="companydelete.php">Company_DELETE</a></li>
                            <li class="nav-item d-inline-block"><a class="nav-link" href="companyupdate.php">Company_UPDATE</a></li>
                            <li class="nav-item d-inline-block"><a class="nav-link" href="secrets.php">Company Secrets</a></li>
                        </ul>';
            }
            else{
                echo'<a class="navbar-brand" href="index.php"> Andrew Vu\'s company</a>';
            }

        ?>
        <?php
             if (isset($_SESSION['userId'])){
                echo '<form action="includes/logout.inc.php" method ="post">
               <button type="submit" class="btn btn-info" name="logout-submit">Logout</button>
                </form>';
                }
                else{
                    echo '<form class="form-inline" action="includes/login.inc.php" method = "post">
                    <div class="input-group">
                    <input type="text" name = "mailuid" placeholder = "Username/E-mail...">
                    <input type="password" name = "pwd" placeholder = "Password...">
                    <button type="submit" name="login-submit" class = "btn btn-info">Login</button>
                    <a href="signup.php" class="btn btn-info" role="button">Signup</a> 
                    </div>
                </form>';
                }
        ?>
        </nav>
    </header>