<?php 
    
    include 'connect.php';
     
    // Query the database and return the results.
    if($_GET['type']=='reservoir'){
        $sql = "SELECT * FROM reservoir_info";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
        <?php
                echo "[".$row["res_code"].",".$row["res_name"]."],";
        ?>
        <?php
            }
        } else {
        
        }
    }else if($_GET['type']=='flow'){
        $sql = "SELECT * FROM flow_info";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
        <?php
                echo "[".$row["sta_id"].",".$row["sta_code"]."],";
        ?>
        <?php
            }
        } else {
        
        }
    }else if($_GET['type']=='wq'){
        $sql = "SELECT * FROM wq_info";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
        <?php
                echo "[".$row["sta_code"].",".$row["station"]." (".$row["sta_code"].")"."],";
        ?>
        <?php
            }
        } else {
        
        }
    }else if($_GET['type']=='customer'){
        $sql = "SELECT * FROM customer_info";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
        <?php
                echo "[".$row["customer_code"].",".$row["customer_name"]."],";
        ?>
        <?php
            }
        } else {
        
        }
    }else if($_GET['type']=='pump'){
        $sql = "SELECT * FROM pump_info";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
        <?php
                echo "[".$row["pump_code"].",".$row["pump_name"]."],";
        ?>
        <?php
            }
        } else {
        
        }
    }else if($_GET['type']=='rain'){
        $sql = "SELECT * FROM rain_info";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
        <?php
                echo "[".$row["sta_code"].",".$row["sta_code"]." ".$row["name"]."],";
        ?>
        <?php
            }
        } else {
        
        }
    }else if($_GET['type']=='tele'){
        $sql = "SELECT * FROM tele_info";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
        <?php
                echo "[".$row["sta_code"].",".$row["sta_code"]."],";
        ?>
        <?php
            }
        } else {
        
        }
    }
     
    $conn->close();
?>