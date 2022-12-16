<?php


$Site = $_POST["Site"];
$weather     = $_POST["weather"];
$date    = filter_input(INPUT_POST, "date" , FILTER_VALIDATE_INT);
$temperature    = filter_input(INPUT_POST, "temperature" , FILTER_VALIDATE_INT);
$windspeed    = filter_input(INPUT_POST, "windspeed" , FILTER_VALIDATE_INT);


$con=mysqli_connect('database-2022.comd0yvbqjgv.us-east-1.rds.amazonaws.com', 'admin', 'un!g*bun1984W','metadata','3306');




if (mysqli_connect_errno()) {
  echo "\n Failed to connect to MySQL: \n" . mysqli_connect_error();
}

echo "Connection is active";

var_dump($Site , $date, $temperature, $windspeed, $weather);



echo "                                                          ";
echo "                                                          ";
echo "                                                          ";
echo "__________________________________________________________________";

echo "                                                          ";
echo "                                                          ";
echo "                                                          ";

echo "                                                          ";
echo "                                                          ";
echo "                                                          ";
echo "                                                          ";
echo "                                                          ";
echo "                                                          ";




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
