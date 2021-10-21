<?php


//creare conexiune
$conn = mysqli_connect("localhost", "root", "", "licenta");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$timp_disponibil = ($_GET['q']);
$timp_alocat =('00:00:00');

// $o = strtotime($time1)+strtotime($time2);
$sql = "SELECT * FROM licenta"; //ORDER BY durata
$result = $conn->query($sql);
$result_1 = $conn->query($sql);
$exact_match_index = -1;
if ($result_1->num_rows > 0) {
// output data of each row
  $timp_disponibil_dec = decimalHours($timp_disponibil);
  $timp_alocat_dec = decimalHours($timp_alocat);
  while($row_1 = $result_1->fetch_assoc()) {
    $convert_row = date("H:i:s", strtotime($row_1["durata"]));
    $timp_actiune_dec = decimalHours($convert_row);
    if ($timp_actiune_dec == $timp_disponibil_dec and $exact_match_index == -1){
      echo "<tr class = 'text-light font-weight-bold'>";
      echo "<td>" . $row_1["ID"]. "</td><td>" . $row_1["activitate"]. "</td><td>" . $row_1["durata"]. "</td>";
      echo "</tr>";
      $timp_alocat_dec = $timp_alocat_dec + $timp_actiune_dec;
      $exact_match_index = (int)$row_1["ID"];
    }
  }
}
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $convert_row = date("H:i:s", strtotime($row["durata"]));
    $timp_actiune_dec = decimalHours($convert_row);
    if (($timp_alocat_dec + $timp_actiune_dec) <= $timp_disponibil_dec and $row["ID"] != $exact_match_index ){
      echo "<tr  class = 'text-light font-weight-bold'>";
      echo "<td>" . $row["ID"]. "</td><td>" . $row["activitate"]. "</td><td>" . $row["durata"]. "</td>";
      echo "</tr>";
      $timp_alocat_dec = $timp_alocat_dec + $timp_actiune_dec;
      // $timp_alocat = date("H:i:s",$time);
    }
  }
}
function decimalHours($time){
    $hms = explode(":", $time);
    return ($hms[0] + ($hms[1]/60) + ($hms[2]/3600));
}
?>
