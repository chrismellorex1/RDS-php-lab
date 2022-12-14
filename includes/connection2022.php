<?php


$con=mysqli_connect('database-2022.comd0yvbqjgv.us-east-1.rds.amazonaws.com', 'admin', 'yourpassword','metadata','3306');

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

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

 echo json_encode($resultArray);
}

// Close connections
mysqli_close($con);

?>
