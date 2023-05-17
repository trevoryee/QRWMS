<?php 
session_start();
DEFINE ('DB_USER', 'yeet_inventory');
DEFINE ('DB_PASSWORD', 'Guestuser22@');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'yeet_inventory');

$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
mysqli_set_charset($dbc, 'utf8');

//echo 'hello world'; 

//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $database= $_POST['database'];
    //$primary_id= '';
    $make= $_POST['make'];
    $model= $_POST['model'];
    $sn= $_POST['sn'];

    if(empty($make) OR empty($model) OR empty($sn)){
        echo "<h1>WARNING: Missing entry data.</h1>";
    }else{
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if(!$conn){die("Connection failed: " . mysqli_connect_error());}

    $sql= "INSERT INTO " . $database . " (primary_id, make, model, sn, timestamp) VALUES (NULL, ?, ?, ?, NOW())";
    $stmt= mysqli_prepare($conn,$sql);
     if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sss", $make, $model, $sn);
            mysqli_stmt_execute($stmt);
     
            if (mysqli_affected_rows($conn) === 1) {
                echo "Record added";
                echo "<br><br><a href='index.php'>Index</a>";
            } else {
                echo "Error adding entry!";
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Error preparing statement: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
//}
?>