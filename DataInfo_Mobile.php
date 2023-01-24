<?php

    include 'connect.php';

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM `reservoir_data` ORDER BY `date` DESC LIMIT 7";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
    ?>
    <?php
            $sql_info = "SELECT * FROM `reservoir_info` WHERE res_code = '".$row['res_code']."' LIMIT 1";
            $result_info = $conn->query($sql_info);
            if ($result_info->num_rows > 0) {
                while($row_info = $result_info->fetch_assoc()) {
                  echo $row_info['res_name'].",".$row['date'].",".$row['volume'].",".$row['inflow'].",".$row['outflow']."&n";
                }
            }
    ?>
    <?php
        }
    } else {

    }
    $conn->close();


?>
