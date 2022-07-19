
<?php require '../include/config.php';
$value=array();
$array=array();
$i = 0;
$result=mysqli_query($con,"SELECT *  FROM `committee` ");
  while($row = $result->fetch_assoc()) {
    //echo $row["Session"]."<br>";
    if($row["Session"]!=NULL){
      if (!array_key_exists($row["Session"],$value)){
        $i = 0;
        array_push($array,$row["Session"]);
      }
        $value[$row["Session"]][$i]["Session"] = $row["Session"];
        $value[$row["Session"]][$i]["Name"] = $row["Name"];
        $value[$row["Session"]][$i]["Role"] = $row["Role"];
        $value[$row["Session"]][$i]["Picture"] = $row["Picture"];
        $i++;
    }
  }
  //print_r($value);
  //print_r($array);
  //echo count($value);
  //echo count($value["2020/2021"]);
  for ($x = 0; $x <= count($array)-1; $x++){
    for($y = 0; $y <= count($value[$array[$x]])-1; $y++){
      echo "<br>";
      echo $value[$array[$x]][$y]["Session"]." ";
      echo $value[$array[$x]][$y]["Name"]." ";
      echo $value[$array[$x]][$y]["Role"]." ";
      echo $value[$array[$x]][$y]["Picture"]." ";
    }

  }

?>