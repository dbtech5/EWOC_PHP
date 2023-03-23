<?php 
    
    include 'connect.php';
     
    if($_GET['type']=='wq'){
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
    }else if($_GET['type']=='customer'){
        $sql_s = "SELECT * FROM customer_info";
        
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
    }
     
    $conn->close();
?>