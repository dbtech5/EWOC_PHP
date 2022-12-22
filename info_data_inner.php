<?php

    include 'connect.php';
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT * FROM reservoir_data WHERE  dam_code = '".$_POST['code']."' ORDER BY date DESC LIMIT 1";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
    ?>
    <?php
            echo $row['date'].",".$row['volume'].",".$row['inflow'].",".$row['outflow'];
    ?>
    <?php
        }
    } else {
    
    }
    $conn->close();


?>