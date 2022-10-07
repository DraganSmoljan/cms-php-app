<?php include "db.php"; ?>

<?php 

if(isset($_POST["submit"])) {
    $username = $_POST["name"];
    $password = $_POST["password"];
    
    $username = mysqli_escape_string($connection, $username);

    $query = "SELECT * FROM users WHERE name = {$username}";

    $serch_query = mysqli_query($connection, $query);

    if(!$serch_query) {
        die("query failed!");
    }
    
}



?>