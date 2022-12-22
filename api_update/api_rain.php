<?php
//error_reporting(E_ERROR | E_PARSE);

// ewoc dbname
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ewoc";
    
// Returns a mysqli object for the weather today.
$conn = new mysqli($servername, $username, $password, $dbname);
$content = file_get_contents("https://data.tmd.go.th/api/WeatherToday/V1/?type=json");

// Returns a list of STATIONs.
$result_api  = json_decode($content);
$results = (array)$result_api;
print_r($results[0]->Stations);

for($y = 0; $y <= count($results)-1; $y++) {
    // Returns a string containing the results of a discharge.
    $sta_code = "'".($results[$y]->STN_ID)."'";
    $date_time = "'".($results[$y]->DT)." ".($results[$y]->TM)."'";
    $wl_m = ($results[$y]->WL);
	$discharge_cms = ($results[$y]->Q);
	$rain_mm = ($results[$y]->R15);
	
    $sql = "INSERT INTO tele_data (sta_code, date_time, wl_m, discharge_cms, rain_mm) VALUES ($sta_code, $date_time, $wl_m, $discharge_cms, $rain_mm)";

    // Update the record.
    if($conn->query($sql) === TRUE) {
        echo $pump_code." record successfully <br>";
    }else{
        echo "Error updating record: " . $conn->error;
    }
    
}


$conn->close();

?>