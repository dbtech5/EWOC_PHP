<?php
error_reporting(E_ERROR | E_PARSE);

// ewoc dbname
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ewoc";
    
$conn = new mysqli($servername, $username, $password, $dbname);

// Get the dmainfo. php file
$content = file_get_contents("http://eswoc.rid.go.th/eastwater/controller/dmainfo.php?bnrsort=1");

// Returns a json - decoded API result
$result_api  = json_decode($content);
$results = (array)$result_api;

print_r($results);

for ($y = 0; $y <= count($results)-1; $y++) {
    // INSERT tele_data.
    $sta_code = "'".($results[$y]->STN_ID)."'";
    $date_time = "'".($results[$y]->DT)." ".($results[$y]->TM)."'";
    $wl_m = ($results[$y]->WL);
	$discharge_cms = ($results[$y]->Q);
	$rain_mm = ($results[$y]->R15);
	$sql = "INSERT INTO tele_data (sta_code, date_time, wl_m, discharge_cms, rain_mm) VALUES ($sta_code, $date_time, $wl_m, $discharge_cms, $rain_mm)";
     
    // Update the record.
    if ($conn->query($sql) === TRUE) {
        echo $pump_code." record successfully <br>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();

?>