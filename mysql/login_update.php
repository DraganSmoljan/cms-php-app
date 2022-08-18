<?php include ""

if(isset($_POST['submit'])) {
    
    $username = $_POST['username'];
    $password = $_POST ['password'];
    
    $connection = mysqli_connect('localhost:3308', 'root', 'root', 'example');

    if($connection){
        echo 'connected';
    }else {
        die("Database connection failed");
    }


    $query = 'SELECT * FROM users';
    $result = mysqli_query($connection, $query);

    $query = 'INSERT INTO users (username, password)';
    $query .= "VALUES ('$username', '$password')";
    $result = mysqli_query($connection, $query);

    

    if(!$result) {
        die('Query Failed' . mysqli_error());
    }

}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>

    <div class="container">
        <div class="col-xs-6">
            
            <?php  
            while($row = mysqli_fetch_assoc($result)) {
            ?>

            <pre>

            <?php 
                print_r($row);
            ?>

            </pre>
            <?php
        }
        ?>
            <form action="login.php" method="POST">
                <div class="form-group">
                <label for="username">Username</label>    
                <input type="text" name="username" class="form-control">
                </div>

                <div class="form-group">
                    <label for="username">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
            </form>
        </div>

    </div>
</body>

</html>