<?php 
    include 'connect.php';
    
    // Check if a connection failed.
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Query the database for rain information.
    if($_GET['type']=='reservoir'){
        $sql_s = "SELECT * FROM reservoir_info WHERE res_code = '".$_GET['res_code']."'";
        
        $result_s = $conn->query($sql_s);
		if ($result_s->num_rows > 0) {
			while($row = $result_s->fetch_assoc()) {
                
				$sql = "SELECT * FROM `reservoir_data` WHERE res_code ='".$_GET['res_code']."' ORDER BY `date` DESC LIMIT 1";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row_s = $result->fetch_assoc()) {
                        echo $row["res_name"].",".$row["province"].",".$row["nhvol"].",".$row_s["date"].",".$row_s["volume"].",".$row_s["inflow"].",".$row_s["outflow"];
                    }
                }
            }
        }
    }else if($_GET['type']=='Level_Station'){
        $sql_s = "SELECT * FROM flow_info WHERE sta_code = '".$_GET['res_code']."'";
        
        $result_s = $conn->query($sql_s);
		if ($result_s->num_rows > 0) {
			while($row = $result_s->fetch_assoc()) {
                
                // Query for discharges.
				$sql = "SELECT * FROM `flow_data` WHERE sta_code ='".$_GET['res_code']."' ORDER BY `date` DESC LIMIT 1";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row_s = $result->fetch_assoc()) {
                        echo $row["sta_code"].",".$row["site"].",".$row["district"].",".$row["province"].",".$row["da_km2"].",".$row_s["date"].",".$row_s["wl"].",".$row_s["discharge"];
                    }
                }
            }
        }
    }else if($_GET['type']=='Rain_Station'){
        $sql_s = "SELECT * FROM rain_info WHERE sta_code = '".$_GET['res_code']."'";
        
        $result_s = $conn->query($sql_s);
		if ($result_s->num_rows > 0) {
			while($row = $result_s->fetch_assoc()) {
                
                // Query for a row.
				$sql = "SELECT * FROM `rain_data` WHERE sta_code ='".$_GET['res_code']."' ORDER BY `date` DESC LIMIT 1";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row_s = $result->fetch_assoc()) {
                        echo $row["sta_code"].",".$row["name"].",".$row["district"].",".$row["province"].",".$row_s["date"].",".$row_s["rain_mm"];
                    }
                }
            }
        }
    }else if($_GET['type']=='Waterquality_Station'){
        $sql_s = "SELECT * FROM wq_info WHERE sta_code = '".$_GET['res_code']."'";
        
        $result_s = $conn->query($sql_s);
		if ($result_s->num_rows > 0) {
			while($row = $result_s->fetch_assoc()) {
                
                // Fetch data from wq_data.
				$sql = "SELECT * FROM `wq_data` WHERE sta_code ='".$_GET['res_code']."' AND ec !='' ORDER BY `date_time` LIMIT 1";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row_s = $result->fetch_assoc()) {
                        echo $row["station"].",".$row["sta_code"].",".$row["district"].",".$row["province"].",".$row_s["date_time"].",".$row["seadist_km"].",".$row_s["salinity"].",".$row_s["ec"].",".$row_s["do"].",".$row_s["ph"].",".$row_s["tds"].",".$row_s["ec"].",".$row_s["temp"];
                    }
                }
            }
        }
    }else if($_GET['type']=='Tele_Station'){
        $sql_s = "SELECT * FROM tele_info WHERE sta_code = '".$_GET['res_code']."'";
        
        $result_s = $conn->query($sql_s);
		if ($result_s->num_rows > 0) {
			while($row = $result_s->fetch_assoc()) {
                
                // Query for discharges and discharges.
				$sql = "SELECT * FROM `tele_data` WHERE rain_mm != '' and sta_code ='".$_GET['res_code']."' ORDER BY `date_time` LIMIT 1";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row_s = $result->fetch_assoc()) {
                        echo $row["tambon"].",".$row["district"].",".$row["province"].",".$row_s["date_time"].",".$row_s["wl_m"].",".$row_s["discharge_cms"].",".$row_s["rain_mm"];
                    }
                }
            }
        }
    }else if($_GET['type']=='Customer'){
        $sql_s = "SELECT * FROM customer_info WHERE customer_code = '".$_GET['res_code']."'";
        
        $result_s = $conn->query($sql_s);
		if ($result_s->num_rows > 0) {
			while($row = $result_s->fetch_assoc()) {
                
				$sql = "SELECT * FROM `customer_wateruse` WHERE customer_code ='".$_GET['res_code']."' ORDER BY `date` DESC LIMIT 1";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row_s = $result->fetch_assoc()) {
                        echo $row["customer_name"].",".$row["area"].",".$row_s["date"].",".$row_s["wateruse"];
                    }
                }
            }
        }
    }else if($_GET['type']=='Pump'){
        $sql_s = "SELECT * FROM pump_info WHERE pump_code = '".$_GET['res_code']."'";
        
        $result_s = $conn->query($sql_s);
		if ($result_s->num_rows > 0) {
			while($row = $result_s->fetch_assoc()) {
                
                // Query for pump data.
				$sql = "SELECT * FROM `pump_data` WHERE pump_code ='".$_GET['res_code']."' ORDER BY `date` DESC LIMIT 1";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row_s = $result->fetch_assoc()) {
                        echo $row["pump_name"].",".$row["area"].",".$row_s["date"].",".$row_s["flow"];
                    }
                }
            }
        }
    }
    
    $conn->close();
?>