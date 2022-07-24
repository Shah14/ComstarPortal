
<?php
$value=array();
$array=array();
$i = 0;
$con = new mysqli("localhost","root","","comstar_portal");

$result=mysqli_query($con,"SELECT *  FROM `homepage` ");
  while($row = $result->fetch_assoc()) {
    //echo $row["Year"]."<br>";
    if($row["Year"]!=NULL){
      if (!array_key_exists($row["Year"],$value)){
        $i = 0;
        array_push($array,$row["Year"]);
      }
        $value[$row["Year"]][$i]["Year"] = $row["Year"];
        $value[$row["Year"]][$i]["Type"] = $row["Type"];
        $value[$row["Year"]][$i]["About"] = $row["About"];
        $value[$row["Year"]][$i]["Image"] = $row["Image"];
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
      echo $value[$array[$x]][$y]["Year"]." ";
      echo $value[$array[$x]][$y]["Type"]." ";
      echo $value[$array[$x]][$y]["About"]." ";
      echo $value[$array[$x]][$y]["Image"]." ";
    }
  }

?>