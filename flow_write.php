<?php
    error_reporting(E_ERROR | E_PARSE);

    include 'connect.php';

    // INSERT INTO Flow Data
    $sql = "INSERT INTO flow_data (sta_id, sta_code, date, wl, discharge) VALUES ($sta_id, $sta_code, $sta_date, $gageht, $discharge)";
    echo $sql;
    // Update the record.
    if ($conn->query($sql) === TRUE) {
        echo $pump_code." record successfully <br>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $conn->close();

?>