<?php

$site = $_POST["site"];
$weather     = $_POST["weather"];
$date    = filter_input(INPUT_POST, "date" , FILTER_VALIDATE_INT);
$hour    = filter_input(INPUT_POST, "hour" , FILTER_VALIDATE_INT);
$temperature    = filter_input(INPUT_POST, "temperature" , FILTER_VALIDATE_INT);
$windspeed    = filter_input(INPUT_POST, "windspeed" , FILTER_VALIDATE_INT);

$con=mysqli_connect('database-2022.comd0yvbqjgv.us-east-1.rds.amazonaws.com', 'admin', 'passwordW','metadata','3306');



if (mysqli_connect_errno()) {
  echo "\n Failed to connect to MySQL: \n" . mysqli_connect_error();
}

echo "Connection is active";

echo "<br>";
echo "<br>";
echo "New Observation";
echo "<br>";
echo "<br>";


var_dump($site , $date, $hour, $temperature, $windspeed, $weather);
echo "<br>";
echo "<br>";





$insert = "INSERT INTO  `weatherobs` (date, hour, site, temp, windspeed, weather) VALUES (? , ?, ?, ?, ?, ?)  ";
$stmt = mysqli_stmt_init($con);

if ( !  mysqli_stmt_prepare($stmt,$insert)){
    die(mysqli_error(con));
}

mysqli_stmt_bind_param($stmt, "iisiis",
                       $date,
                       $hour, 
                       $site,
                       $temperature,
                       $windspeed,
                       $weather);


mysqli_stmt_execute($stmt);


$sql = "SELECT * FROM `weatherobs` ";

if ($result = mysqli_query($con, $sql))
{
 $resultArray = array();
 $tempArray = array();

 while($row = $result->fetch_object())
 {
         $tempArray = $row;
     array_push($resultArray, $tempArray);
 }
 echo "<br>";
 echo json_encode($resultArray);
}

// Close connections






mysqli_close($con);

?>
