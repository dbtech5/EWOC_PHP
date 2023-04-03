<?php 
    
    include 'connect.php';
            
    // Check if a connection failed.
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    if($_GET['type']=='reservoir'){
        $sql = "SELECT * FROM `reservoir_data` WHERE res_code = '".$_GET['id']."'";
        $result = $conn->query($sql);
        $txt = "{";
        // Outputs the result as a JSON string.
        if ($result->num_rows > 0) {
            $data = $result->fetch_all( MYSQLI_ASSOC );
            echo json_encode( $data );
        } else {
        }
        
        
        $txt =  $txt."}";
        echo json_encode($txt);
    }else if($_GET['type']=='flow'){
        $sql = "SELECT * FROM `flow_data` WHERE sta_code = '".$_GET['id']."'";
        $result = $conn->query($sql);
        $txt = "{";
        // Outputs the result as a JSON string.
        if ($result->num_rows > 0) {
            $data = $result->fetch_all( MYSQLI_ASSOC );
            echo json_encode( $data );
        } else {
        }
        
        
        $txt =  $txt."}";
        echo json_encode($txt);
    }else if($_GET['type']=='customer'){
        $sql = "SELECT * FROM `customer_wateruse` WHERE customer_code = '".$_GET['id']."'";
        $result = $conn->query($sql);
        $txt = "{";
        // Outputs the result as a JSON string.
        if ($result->num_rows > 0) {
            $data = $result->fetch_all( MYSQLI_ASSOC );
            echo json_encode( $data );
        } else {
        }
        
        
        $txt =  $txt."}";
        echo json_encode($txt);
    }else if($_GET['type']=='pump'){
        $sql = "SELECT * FROM `pump_data` WHERE pump_code = '".$_GET['id']."'";
        $result = $conn->query($sql);
        $txt = "{";
        // Outputs the result as a JSON string.
        if ($result->num_rows > 0) {
            $data = $result->fetch_all( MYSQLI_ASSOC );
            echo json_encode( $data );
        } else {
        }
        
        
        $txt =  $txt."}";
        echo json_encode($txt);
    }else if($_GET['type']=='wq'){
        $sql = "SELECT * FROM `wq_data` WHERE sta_code = '".$_GET['id']."'";
        $result = $conn->query($sql);
        $txt = "{";
        // Outputs the result as a JSON string.
        if ($result->num_rows > 0) {
            $data = $result->fetch_all( MYSQLI_ASSOC );
            echo json_encode( $data );
        } else {
        }
        
        $txt =  $txt."}";
        echo json_encode($txt);
    }else if($_GET['type']=='rain'){
        $sql = "SELECT * FROM `rain_data` WHERE sta_code = '".$_GET['id']."'";
        $result = $conn->query($sql);
        $txt = "{";
        // Outputs the result as a JSON string.
        if ($result->num_rows > 0) {
            $data = $result->fetch_all( MYSQLI_ASSOC );
            echo json_encode( $data );
        } else {
        }
        
        $txt =  $txt."}";
        echo json_encode($txt);
    }else if($_GET['type']=='tele'){
        $sql = "SELECT * FROM `tele_data` WHERE sta_code = '".$_GET['id']."' ORDER BY `date_time`";
        $result = $conn->query($sql);
        $txt = "{";
        // Outputs the result as a JSON string.
        if ($result->num_rows > 0) {
            $data = $result->fetch_all( MYSQLI_ASSOC );
            echo json_encode( $data );
        } else {
        }
        $txt =  $txt."}";
        echo json_encode($txt);
    }else if($_GET['type']=='customer_top10'){
        $sql = "SELECT customer_code,wateruse, MAX(DATE) AS laste_date FROM customer_wateruse GROUP BY customer_code,wateruse ORDER BY wateruse DESC, laste_date DESC LIMIT 10";
        $result = $conn->query($sql);
        $txt = "{";
        // Outputs the result as a JSON string.
        if ($result !== false && $result->num_rows > 0) {
            $data = $result->fetch_all( MYSQLI_ASSOC );
            echo json_encode( $data );
        } else {
        }
        
        
        $txt =  $txt."}";
        echo json_encode($txt);
    }else if($_GET['type']=='pump_top10'){
        $sql = "SELECT pump_code,flow, MAX(DATE) AS laste_date FROM pump_data GROUP BY pump_code,flow ORDER BY flow DESC, laste_date DESC LIMIT 10";
        $result = $conn->query($sql);
        $txt = "{";
        // Outputs the result as a JSON string.
        if ($result !== false && $result->num_rows > 0) {
            $data = $result->fetch_all( MYSQLI_ASSOC );
            echo json_encode( $data );
        } else {
        }
        
        
        $txt =  $txt."}";
        echo json_encode($txt);
    }
    $conn->close();
?>