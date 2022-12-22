<?php
    
    include 'connect.php';
    
    // Check if a connection failed.
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Returns a list of all wateruses in the database.
    if($_POST['type']==1){
        $sql = "SELECT * FROM reservoir_data WHERE  res_code = '".$_POST['code']."' ORDER BY date DESC LIMIT 1";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
        <?php
                echo $row['volume'].",".$row['inflow'].",".$row['date'];
        ?>
        <?php
            }
        } else {
        
        }
    }else if($_POST['type']==2){
        $sql = "SELECT * FROM flow_data WHERE  sta_id = '".$_POST['code']."' ORDER BY date DESC LIMIT 1";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
        <?php
                echo $row['wl'].",".$row['discharge'].",".$row['date'];
        ?>
        <?php
            }
        } else {
        
        }
    }else if($_POST['type']==3){
        $sql = "SELECT * FROM wq_data WHERE  sta_code = '".$_POST['code']."' AND salinity != '' AND salinity != 'N/A' ORDER BY date_time DESC LIMIT 1";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
        <?php
                echo $row['salinity'].",".$row['ec'].",".$row['do'].",".$row['ph'].",".$row['tds'].",".$row['temp'].",".$row['date_time'];
        ?>
        <?php
            }
        } else {
        
        }
    }else if($_POST['type']==4){
        $sql = "SELECT * FROM customer_wateruse WHERE  customer_code = '".$_POST['code']."' ORDER BY date DESC LIMIT 1";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
        <?php
                echo $row['customer_code'].",".$row['date'].",".$row['wateruse'];
        ?>
        <?php
            }
        } else {
        
        }
    }else if($_POST['type']==5){
        $sql = "SELECT * FROM pump_data WHERE  pump_code = '".$_POST['code']."' ORDER BY date DESC LIMIT 1";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
        <?php
                echo $row['flow'].",".$row['date'];
        ?>
        <?php
            }
        } else {
        
        }
    }
    
    $conn->close();
?>