<?php 
DEFINE ('DB_USER', 'yeet_guest');
DEFINE ('DB_PASSWORD', 'Guestuser22@');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'yeet_440final');

$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
mysqli_set_charset($dbc, 'utf8');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $database= $_POST['database'];
    $primary_id= '';
    $make= $_POST['make'];
    $model= $_POST['model'];
    $sn= $_POST['sn'];

    if(empty($make) OR empty($model) OR empty($sn)){
        echo "<h1>WARNING: Missing entry data.</h1>";
    }else{
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if(!$conn){die("Connection failed: " . mysqli_connect_error());}

    $sql= "INSERT INTO ? ('primary_id','make','model','sn','timestamp') VALUES (NULL,?,?,? now())";
    $stmt= mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt, "ssss", $database, $make, $model,$sn);
    mysqli_stmt_execute($stmt);
     
    if ($stmt && mysqli_affected_rows($conn) === 1) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error adding blog post!";
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    }
}
?>