<?php 

    include 'connect.php';
    
    $sql = "SELECT * FROM `reservoir_info` WHERE res_code = '".$_GET['res_code']."'";
    $result = $conn->query($sql);
    
    // Outputs the result as a JSON string.
    if ($result->num_rows > 0) {
        $data = $result->fetch_all( MYSQLI_ASSOC );
        echo json_encode( $data );
    } else {
    }
    
    $conn->close();
?>