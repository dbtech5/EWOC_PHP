<?php 
    
    include 'connect.php';
    
    // Query reservation rc
    $sql = "SELECT * FROM `reservoir_rc`";
    $result = $conn->query($sql);
    $txt = "{";
        
    // Returns a textual representation of the results.
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $txt = $txt."'".$row['date']."':{";
            $txt = $txt."'upper_rc':'".$row[$_GET['res_code'].'-urc']."',";
            $txt = $txt."'lower_rc':".$row[$_GET['res_code'].'-lrc'].",";
            
            // Returns the lbc and mrc txt if there is one.
            if(isset($row[$_GET['res_code'].'-m1'])){
                $txt = $txt."'lbc':".$row[$_GET['res_code'].'-m2'].",";
                $txt = $txt."'mrc':".$row[$_GET['res_code'].'-m1'].",";
            }
            
            $txt =  $txt."},";
        }
    } else {
    }
    
    // Outputs a JSON - encoded string.
    $txt =  $txt."}";
    echo json_encode($txt);
    
    $conn->close();
?>