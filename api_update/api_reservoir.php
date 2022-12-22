<?php
error_reporting(E_ERROR | E_PARSE);

// ewoc dbname
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ewoc";
    
// Create a mysqli connection
$conn = new mysqli($servername, $username, $password, $dbname);
$content = file_get_contents("http://app.rid.go.th/reservoir/api/dams");

// Returns a json - decoded API result
$result_api  = json_decode($content);
$results = (array)$result_api;

for ($y = 0; $y <= count($result_api->regions)-1; $y++) {
    for ($x = 0; $x <= count($result_api->regions[$y]->dams); $x++) {
        // Returns the date and time of the DMD.
        $DAM_ID = ($result_api->regions[$y]->dams[$x]->DAM_ID);
        $DMD_Date = "'".($result_api->regions[$y]->dams[$x]->DMD_Date)."'";
        $DAM_Name = ($resulresult_apit->regions[$y]->dams[$x]->DAM_Name);
        $DMD_QUse = ($result_api->regions[$y]->dams[$x]->DMD_QUse);
        $DMD_Inflow = ($result_api->regions[$y]->dams[$x]->DMD_Inflow);
        $DMD_Outflow = ($result_api->regions[$y]->dams[$x]->DMD_Outflow);

        $sql_s = "SELECT * FROM `reservoir_info` WHERE rid_code = '".$DAM_ID."'";
        
        // Query the database and return the results.
        $result_s = $conn->query($sql_s);
        if ($result_s->num_rows > 0) {
            while($row = $result_s->fetch_assoc()) {
                try{
                    // INSERT into reservoir data.
                    $res_code_search = "'".$row['res_code']."'";
                    $sql = "INSERT INTO reservoir_data (res_code, date, wl, volume, inflow, outflow)
                    VALUES ($res_code_search, $DMD_Date, 0, $DMD_QUse, $DMD_Inflow, $DMD_Outflow) ON DUPLICATE KEY UPDATE volume=".$DMD_QUse.", inflow=".$DMD_Inflow.", outflow=".$DMD_Outflow;
                    
                    // Update a record.
                    if ($conn->query($sql) === TRUE) {
                        echo $res_code_search." record updated successfully <br>";
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }
                }catch(Exception $e) {
                    echo 'Caught exception: ',  $e->getMessage(), "\n";
                }
                
                
            }
            
        }   
    print_r("\n");
    }
}



$content = file_get_contents("https://app.rid.go.th/reservoir/api/rsvmiddles");

// Returns a json - decoded API result
$result_api  = json_decode($content);
$results = (array)$result_api;

for ($y = 0; $y <= count($result_api->region)-1; $y++) {
    for($x = 0; $x <= count($result_api->region[$y]->reservoir); $x++){
        // Returns the date and time of the result.
        $DAM_ID = ($result_api->region[$y]->reservoir[$x]->cresv);
        $DMD_Date = "'".($result_api->region[$y]->reservoir[$x]->date)."'";
        $DAM_Name = ($resulresult_apit->region[$y]->reservoir[$x]->project_name);
        $DAM_QUsage = ($result_api->region[$y]->reservoir[$x]->qdisc_curr);
        $DMD_Inflow = ($result_api->region[$y]->reservoir[$x]->q_info);
        $DMD_Outflow = ($result_api->region[$y]->reservoir[$x]->q_outfo);

        $sql_s = "SELECT * FROM `reservoir_info` WHERE rid_code = '".$DAM_ID."'";

        // Query the database and return the results.
        $result_s = $conn->query($sql_s);
        if ($result_s->num_rows > 0) {
            while($row = $result_s->fetch_assoc()) {
                try{
                    // INSERT into reservoir data.
                    $res_code_search = "'".$row['res_code']."'";
                    $sql = "INSERT INTO reservoir_data (res_code, date, wl, volume, inflow, outflow)
                    VALUES ($res_code_search, $DMD_Date, 0, $DAM_QUsage, $DMD_Inflow, $DMD_Outflow)";
                    
                    // Update a record.
                    if($conn->query($sql) === TRUE) {
                        echo $res_code_search." record updated successfully <br>";
                    }else{
                        echo "Error updating record: " . $conn->error;
                    }
                } catch (Exception $e) {
                    echo 'Caught exception: ',  $e->getMessage(), "\n";
                }
                
                
            }
            
        }   
    }
    print_r("\n");
}


$conn->close();

?>