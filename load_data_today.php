<?php 
    
    include 'connect.php';
    
    if($_GET['type']=='reservoir'){
        $sql = "SELECT * FROM reservoir_data WHERE date LIKE %".date("Y-m-d")."%";
        $sql = 'SELECT * FROM reservoir_data WHERE date LIKE "%2021-11-01%"';
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
        $sql = "SELECT * FROM flow_data WHERE date LIKE %".date("Y-m-d")."%";
        $sql = 'SELECT * FROM flow_data WHERE date LIKE "%2021-11-01%"';
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
        $sql = "SELECT * FROM customer_wateruse WHERE date LIKE %".date("Y-m-d")."%";
        $sql = 'SELECT * FROM customer_wateruse WHERE date LIKE "%2021-11-01%"';
        
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
        $sql = "SELECT * FROM pump_data WHERE date LIKE %".date("Y-m-d")."%";
        $sql = 'SELECT * FROM pump_data WHERE date LIKE "%2021-11-01%"';
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
        $sql = "SELECT * FROM wq_data WHERE date_time LIKE %".date("Y-m-d")."%";
        $sql = 'SELECT * FROM wq_data WHERE date_time LIKE "%2021-11-01%"';
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
        $sql = "SELECT * FROM rain_data WHERE date LIKE %".date("Y-m-d")."%";
        $sql = 'SELECT * FROM rain_data WHERE date LIKE "%2021-11-01%"';
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
        $sql = "SELECT * FROM tele_data WHERE date_time LIKE %".date("Y-m-d")."%";
        $sql = 'SELECT * FROM tele_data WHERE date_time LIKE "%2021-11-01%"';

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