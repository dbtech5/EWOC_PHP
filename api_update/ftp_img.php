<?php
error_reporting(E_ERROR | E_PARSE);

// ewoc dbname
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ewoc";

// Create a mysqli connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Authenticate to the FTP server.
$ftp_server = "61.47.2.28";
$conn_id = ftp_connect($ftp_server);
$ftp_user_name = "Prachin1";
$ftp_user_pass = "1q2w3e+-";
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

// Outputs a formatted show ALL directory.
$mode = ftp_pasv($conn_id, TRUE);
echo 'show ALL directory';
$contents = ftp_nlist($conn_id, '/');
print_r($contents);
/*
for ($n = 0 ; $n < count($contents) ; $n++){
    // Output a. substr file.
    echo 'show '.substr($contents[$n],1).' files (Sample)<br>';
    $contents = ftp_nlist($conn_id, '/'.substr($contents[$n],1));
    $d_s=mktime(0,0,0,06,24,2021);
    $count = 0;
    for ($i = 0 ; $i < 10 ; $i++){
        if((int)ftp_mdtm($conn_id, substr($contents[$i],0))){
            // Convert a FTP connection id to a date.
            $str_date = date("Y/m/d", ftp_mdtm($conn_id, substr($contents[$i],0)));
            $str_time = date("H:i:s.", ftp_mdtm($conn_id, substr($contents[$i],0)));

            if(date("Y/m/d") == $str_date){
                if($count < ((int)substr($str_time,0,2))){
                    // Print a substring of a connection.
                    echo substr($contents[$i],6)." > " . substr($contents[$i],1)." > " . substr($str_time,0,2) . "<br>";
                    $count = ((int)substr($str_time,0,2));
                    ftp_get($conn_id,"d:/".substr($contents[$i],6),substr($contents[$i],1),FTP_ASCII);
                                
                    // Opens a file and returns the data.
                    $name = "d:/".substr($contents[$i],6);
                    $name_key = "'".explode("_",$name)[0]."'";
                    $f = fopen($name, 'r' );
                    $c = 0;
                    $DO = 0;
                    $PH = 0;
                    $EC = 0;
                    $Sal = 0;
                    $TDS = 0;
                    $Temp = 0;
                    $date_time = '';
                    
                    while( $line = fgets( $f ) ) {
                        if($c > 0 && $c < 9){
                            $tmp_val = explode(",",$line);
                            echo $tmp_val[0].":".$tmp_val[1].">".$tmp_val[3]."<br>";
                            
                            // Returns a string representation of a date.
                            if($c == 1){
                                $DO = $tmp_val[3];
                            }
                            if($c == 3){
                                $PH = $tmp_val[3];
                            }
                            if($c == 4){
                                $EC = $tmp_val[3];
                            }
                            if($c == 5){
                                $Sal = $tmp_val[3];
                            }
                            if($c == 6){
                                $TDS = $tmp_val[3];
                            }
                            if($c == 7){
                                $Temp = $tmp_val[3];
                                $fmt = explode("/",$tmp_val[0]);
                                $txt_tmp = $fmt[2]."-".$fmt[0]."-".$fmt[1]." ".$tmp_val[1];
                                $dmt = explode(":",$tmp_val[1]);
                                $d=mktime((int)$dmt[0], (int)$dmt[1], (int)$dmt[2], (int)$fmt[0], (int)$fmt[1], (int)$fmt[2]);
                                
                                $date_time = "'".date("Y-m-d h:i:s", $d)."'";
                            }
                        }
                        
                    
                        $c += 1;
                    }

                    $sql = "INSERT INTO wq_data (sta_code, date_time, salinity, ec, do, ph, tds, temp, wl, discharge, velocity) VALUES ($name_key, $date_time, $Sal, $EC, $DO, $PH, $TDS, $Temp, '-','-','-')";
                    echo $sql;

                    // Updates the record.
                    if ($conn->query($sql) === TRUE) {
                        echo " record updated successfully <br>";
                    } else {
                        echo "Error updating record: " . $conn->error;
                    }
                    fclose( $f );
                    unlink($name);
                }
            }
        }
    }
}

echo "<br />";
*/
ftp_close($conn_id);
?>