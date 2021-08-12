//Remote database connection
    $servername = 'remotemysql.com';
    $username = 'PPrQ0WqkGX';
    $password = 'JmImUhgrUc';
    $db_name = 'PPrQ0WqkGX';

    $conn = mysqli_connect($servername, $username, $password, $db_name);

    if(!$conn){
        echo 'failed';
    }else{
        // echo 'success';
    
    
    }
