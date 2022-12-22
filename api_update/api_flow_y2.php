<?php
// Set default timezone for Asia.
	date_default_timezone_set("Asia/Bangkok");

	// ewoc dbname
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "ewoc";
	
	// Create a new mysqli connection.
	$conn = new mysqli($servername, $username, $password, $dbname);
	$consumerKey = '699e8a7558ff469b85f040579af8e7e1';
	$consumerSecret = '6bcbfd0907794e439bec884be7c01aab';
	
	// print_r - m_e
	$m_e = array(date('d/m/y'),date('d/m/y',strtotime("-1 days")),date('d/m/y',strtotime("-2 days")));
	print_r($m_e);
	
	for($n = 2; $n < 3; $n++){
		
		// Authenticate today from Hydro 6
		echo "<br><b>update ".$m_e[$n]."</b><br>";
		$uri ='http://hyd-app.rid.go.th/webservice/HydroAuthenticateService.svc/getHourlyTodayFromHydro6';
		$method = 'POST';
		
		$mt = microtime();
		$rand = mt_rand();
		$md5ran_nonce =  md5($mt . $rand);
		
		$time = time();
		
		$oauth =  array();
		$oauth['oauth_consumer_key'] =$consumerKey;
		$oauth['oauth_signature_method'] = 'HMAC-SHA1';
		$oauth['oauth_version'] = '1.0';
		
		$oauth['oauth_timestamp'] = $time;
		$oauth['oauth_nonce'] =  $md5ran_nonce;
		$oauth['oauth_signature']="";
		
		$http_verb = $method;
		$resource_url = $uri;
		
		$url_parameters ='oauth_consumer_key='.$oauth['oauth_consumer_key'].'&oauth_nonce='.$oauth['oauth_nonce'].'&oauth_signature_method=HMAC-SHA1&oauth_timestamp='.$oauth['oauth_timestamp'].'&oauth_version=1.0'  ;
		$sig_string = $http_verb . '&' .urlencode($resource_url) . '&' .urlencode($url_parameters);
		
		$consumerSecret=$consumerSecret.'&';
		
		$oauth['oauth_signature'] = base64_encode(hash_hmac('sha1', $sig_string, $consumerSecret, TRUE));
		
		$signurl = $uri.'?'.$url_parameters.'&oauth_signature='.urlencode($oauth['oauth_signature']);
		
		$curl = curl_init();
		
		// cURL options array
		curl_setopt_array($curl, array(
		CURLOPT_URL =>$signurl,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => "{\"hydro\":{\"hydroid\":\"6\" , \"TimeStart\" : \"".$m_e[$n]."\"}}",
		CURLOPT_HTTPHEADER => array(
		"Content-Type: application/json"
		)
		));
		
		// Execute a curl request and close the connection.
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		
		if ($err) {
			echo "cURL Error #:" . $err;
			} else {
			//print_r($response);
			$res = json_decode($response,true);
			foreach($res as $key => $value) {
				$tmp_date = str_replace(")/","",str_replace("/Date(","",str_replace("+0700","",$value["hourlytime"])));
				
				$txt_date = date("Y-m-d H:i:s", ((float)$tmp_date)/1000);

				$txt_split = explode(" ", $txt_date);
				//print_r($txt_split);
				
				if($txt_split[1]=="06:00:00"){
					
					$sql_s = " SELECT `sta_id`,`sta_code`, `gageht`, `discharge` FROM `flow_rating` WHERE sta_id = '".$value["stationid"]."' AND gageht LIKE ".round($value["wlvalues"],2)."";
					//echo $sql_s."<br>";
					$result_s = $conn->query($sql_s);
					if ($result_s->num_rows > 0) {
						while($row = $result_s->fetch_assoc()) {
							//echo $row['sta_id']."<br>";
							$sta_id = "'".$row['sta_id']."'";
							$sta_code = "'".$row['sta_code']."'";
							$gageht = $row['gageht'];
							$discharge = $row['discharge'];
							$dtxt = "'".$txt_split[0]."'";
							$sql = "INSERT INTO flow_data (sta_id, sta_code, date, wl, discharge) VALUES ($sta_id, $sta_code, $dtxt, $gageht, $discharge)";
							echo $sta_id." record updated successfully <br>";
							$result = $conn->query($sql);
						}
					}
					
				}
				
			}
		}
		
	}
?>