<?php
    error_reporting(E_ERROR | E_PARSE);

    include 'connect.php';
    
    // Query the reservoir info.
    if($_GET['type'] == 'reservoir'){
        $sql = "SELECT res_name FROM reservoir_info WHERE  res_code = '".$_GET['id']."'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
        <?php
                echo $row['res_name'];
        ?>
        <?php
            }
        } else {
        
        }

    }else if($_GET['type'] == 'flow'){
        $sql = "SELECT res_name FROM flow_info WHERE  std_id = '".$_GET['id']."'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
        <?php
                echo $row['res_name'];
        ?>
        <?php
            }
        } else {
        
        }
    }
    
    $conn->close();


?>