<?php
//error_reporting(E_ERROR | E_PARSE);

ini_set("memory_limit","10M");

// ewoc dbname
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ewoc";
    
$conn = new mysqli($servername, $username, $password, $dbname);

// Context options for the ssl and verify_peer
$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);  

// Reads a witness. eastwater. com file
$url = "http://witness.eastwater.com/witness/witness-ewoc_api.php";
$response = file_get_contents($url);

//echo $response;

// Returns a JSON - decoded API response.
$result_api  = json_decode($response);
$results = (array)$result_api;

for($i = 0;$i < count($results);$i++){
    //sprint_r($results[$i]);
    $customer_code = $results[$i]->customer_code;
    $date_customer = $results[$i]->date;
    $qa_customer = $results[$i]->qa;
    // Select all wateruses for a given customer code.
    $sql_s = "SELECT * FROM `customer_wateruse` WHERE customer_code = '".$customer_code."'";
    
    $result_s = $conn->query($sql_s);
    if ($result_s->num_rows > 0) {
        while($row = $result_s->fetch_assoc()) {
            // Update the customer wateruse record.
            try {
                // Outputs the update customer wateruse statement.
                $sql = "UPDATE customer_wateruse SET date = '".$date_customer."',wateruse = ".$qa_customer." WHERE customer_code='".$customer_code."'";
                echo $sql;
                
                // Output the error message if the record has been updated successfully
                if ($conn->query($sql) === TRUE) {
                    echo $customer_code." updated successfully <br>";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
        }
    }else{
        try {
            // INSERT INTO customer wateruse
            $sql = "INSERT INTO customer_wateruse (customer_code, date, wateruse)
            VALUES ($customer_code, $date_customer, $qa_customer)";

            // Update a record.
            if ($conn->query($sql) === TRUE) {
                echo $customer_code." record successfully <br>";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }   
}
$conn->close();

?>