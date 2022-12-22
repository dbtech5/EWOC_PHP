
<?php
    if(isset($_FILES['file']['name'])){
        // file name
        $filename = $_FILES['file']['name'];
        
        // Location
        $location = 'upload/'.$filename;

        // file extension
        $file_extension = pathinfo($location, PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);

        // Valid extensions

        $response = 0;
        if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
            $response = 1;
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "ewoc";
                
            $conn = new mysqli($servername, $username, $password, $dbname);
            if($_POST['type']=='pump'){
                $open = fopen($location, "r");
                $data = fgetcsv($open, 1000, ",");
                while (($data = fgetcsv($open, 1000, ",")) !== FALSE) 
                {
                    if($data[0] != ''){
                        // Generates a dump code based on the input data.
                        $pump_code = "'".$data[0]."'";
                        $pump_date = "'".$data[1]."'";
                        $pump_flow = $data[2];

                        $sql = "INSERT INTO pump_data (pump_code, date, flow) VALUES ($pump_code, $pump_date, $pump_flow)";
                        //echo $sql;
                        if ($conn->query($sql) === TRUE) {
                            
                        } else {
                            
                        }
                    }  
                    $response = 1;
                }
                fclose($open);
            }else if($_POST=='flow'){
                $open = fopen("flow.csv", "r");
                $data = fgetcsv($open, 1000, ",");
                while (($data = fgetcsv($open, 1000, ",")) !== FALSE) 
                {
                    if($data[0] != ''){
                        // GAHAHA - 02 - 01
                        $sta_id = "'".$data[0]."'";
                        $sta_code = "'".$data[1]."'";
                        $sta_date = "'".$data[2]."'";
                        $gageht = $data[3];
                        $discharge = $data[4];

                        $sql = "INSERT INTO flow_data (sta_id, sta_code, date, wl, discharge) VALUES ($sta_id, $sta_code, $sta_date, $gageht, $discharge)";
                        //echo $sql;
                        if ($conn->query($sql) === TRUE) {
                            
                        } else {
                            //echo "Error updating record: " . $conn->error;
                        }
                        $conn->close();
                    }   
                    $response = 1;
                }
                fclose($open);
            }else if($_POST=='reservoir'){
                $open = fopen("reservoir.csv", "r");
                $data = fgetcsv($open, 1000, ",");
                while (($data = fgetcsv($open, 1000, ",")) !== FALSE) 
                {
                    if($data[0] != ''){
                        $res_code_search = "'".$data[0]."'";
                        $DMD_Date = "'".$data[1]."'";
                        $DAM_QUsage = $data[2];
                        $DMD_Inflow = $data[3];
                        $DMD_Outflow = $data[4];
                        $sql = "INSERT INTO reservoir_data (res_code, date, wl, volume, inflow, outflow)
                        VALUES ($res_code_search, $DMD_Date, 0, $DAM_QUsage, $DMD_Inflow, $DMD_Outflow)";
        
                        if ($conn->query($sql) === TRUE) {
                        } else {
                        }
                        $conn->close();
                    }   
                    $response = 1;
                }
                fclose($open);
            }else if($_POST=='wateruse'){
                // Reservoir. csv
                $open = fopen("reservoir.csv", "r");
                $data = fgetcsv($open, 1000, ",");
                
                while (($data = fgetcsv($open, 1000, ",")) !== FALSE) 
                {
                    if($data[0] != ''){
                        // Select customer wateruses.
                        $customer_code = "'".$data[0]."'";
                        $date_customer = "'".$data[1]."'";
                        $qa_customer = $data[1];
                        $sql_s = "SELECT * FROM `customer_wateruse` WHERE customer_code = '".$customer_code."'";
                        
                        $result_s = $conn->query($sql_s);
                        if ($result_s->num_rows > 0) {
                            while($row = $result_s->fetch_assoc()) {
                                try {
                                    $sql = "UPDATE customer_wateruse SET date = '".$date_customer."',wateruse = ".$qa_customer." WHERE customer_code='".$customer_code."'";
                                    echo $sql;
                                    
                                    // Checks if the query is TRUE.
                                    if ($conn->query($sql) === TRUE) {

                                    } else {

                                    }
                                } catch (Exception $e) {
                                }
                            }
                        }else{
                            try {
                                $sql = "INSERT INTO customer_wateruse (customer_code, date, wateruse)
                                VALUES ($customer_code, $date_customer, $qa_customer)";
                                
                                // Checks if the query is TRUE.
                                if ($conn->query($sql) === TRUE) {

                                } else {

                                }
                            } catch (Exception $e) {

                            }
                        }
                        $response = 1;
                    }  
                }
                fclose($open);
            }
        } 
        echo $response;
        exit;
    }
?>