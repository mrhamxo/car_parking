<?php
    $servername = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $db_name = 'car';

    // create connection
    $connect = new mysqli($servername, $db_username, $db_password, $db_name);

    // check connection
    if($connect){
        // die(mysqli_error($connect));
        // echo "database connected";
    }
    else{
        echo 
        '
        <div class="container-fluid">
            <div class="text-center">
                <h1 class="error mx-auto" data-text="404">Database connection Failed</h1>
                <h2 class="lead text-gray-800 mb-5">Database Failure</h2>
                <p class="text-gray-500 mb-0">Please check your database connection</p>
                <a href="index.php">&larr; Back to Dashboard</a>
            </div>
        </div>
        ';
    }
