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
        $sql = "SELECT * FROM `flow_data` WHERE sta_id = '".$_GET['id']."'";
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
        $sql = "SELECT * FROM `tele_data` WHERE sta_code = '".$_GET['id']."'";
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
    }
    $conn->close();
?>