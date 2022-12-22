<?php
error_reporting(E_ERROR | E_PARSE);

// ewoc dbname
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ewoc";
    
$conn = new mysqli($servername, $username, $password, $dbname);

$content = file_get_contents("http://witness.eastwater.com/witness/witness-pump_api.php");

$result_api  = json_decode($content);
$results = (array)$result_api;
//print_r($results);

for ($y = 0; $y <= count($results)-1; $y++) {
    // Returns a string containing the output of a query.
    $pump_code = "'".($results[$y]->pump_code)."'";
    $pump_date = "'".($results[$y]->date)."'";
    $pump_flow = ($results[$y]->flow);

    // Get all the pump data for a given code.
    $sql_s = "SELECT * FROM `pump_data` WHERE pump_code = ".$pump_code." AND date = ".$pump_date."";
    $result_s = $conn->query($sql_s);
    
    if ($result_s->num_rows > 0) {
        while($row = $result_s->fetch_assoc()) {
            try {
                $sql = "UPDATE pump_data SET pump_code = ".$pump_code.",flow = ".$pump_flow." WHERE pump_code=".$pump_code." AND date = ".$pump_date."";
                
                // Update a record.
                if ($conn->query($sql) === TRUE) {
                    echo $pump_code." updated successfully <br>";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
        }
    }else{
        $sql = "INSERT INTO pump_data (pump_code, date, flow) VALUES ($pump_code, $pump_date, $pump_flow)";
        
        // Update the record.
        if ($conn->query($sql) === TRUE) {
            echo $pump_code." record successfully <br>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }  
}


$conn->close();

?>