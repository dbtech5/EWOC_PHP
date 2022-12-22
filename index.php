<?php 
    error_reporting(E_ERROR | E_PARSE);
?>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="GZ3wTJlC8BI43oAr5X7WBlHSvYCZTpxiXpuyWpZa">
	<title>EWOC</title>
	<link rel="stylesheet" href="./ajax/libs/bootstrap/4.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/ol.css">
	<link rel="stylesheet" type="text/css" href="./ajax/libs/jquery.scrollbar/0.2.11/jquery.scrollbar.min.css">
	<link rel="stylesheet" type="text/css" href="./ajax/libs/select2/4.0.5/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="./css/layout.css">
	<link rel="stylesheet" type="text/css" href="./css/map.css">
	<link rel="stylesheet" type="text/css" href="./css/switch.css">
	<link rel="stylesheet" type="text/css" href="./css/mapfilter.css">
	<link rel="stylesheet" type="text/css" href="./css/ol-layerswitcher.css">
	<link rel="stylesheet" type="text/css" href="./css/modal.css">
	<link rel="stylesheet" type="text/css" href="./css/lightbox.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		@import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";
		@import url('https://fonts.googleapis.com/css?family=Prompt');

		body {
			font-family: 'Prompt', sans-serif;
		}

		h5 {
			display: inline-block;
			font-size: 14px;
			font-weight: bold;
		}

		.panel {
			width: 80%;
			text-align:left;
		}

		select {
			padding: 10px 25px;
			font-size: 12px;
			width: 16%;
			margin-right: 20px;
		}
		table {
			font-family: 'Prompt', sans-serif;
			width: 1000px;
			
		}
		tr:nth-child(1) {
			border-radius: 25px;
			color: #FFF;
			background-color: #0B2B4C !important;
		}
		td {
			padding: 5px 8px;
			text-align: center;
			font-size: 10px;
			border:1px solid #ddd;
		}
		.sub-menu {
			margin-bottom: 20px;
			width: 1010px;
			
		}
		.sub-menu > a {
			width: 200px;
			background-color: #0B2B4C;
			padding: 10px 25px;
			color: #FFF;
			font-size: 12px;
			border-radius: 15px;
			font-family: 'Prompt', sans-serif;
		}
		canvas {
			margin-bottom: 10px;
		}

		.reservoir-canvas {
			height: 80vh;
			width: 80%;
			overflow-y:scroll;
		}

		.pad-Main {
			padding: 20px 80px;
		}
		@media only screen and (max-width: 600px) {
			.pad-Main {
				padding: 20px 0px;
			}

			::-webkit-scrollbar {
				width: 0px;
        		height: 0px;
			}

			canvas {
				width: 100%;
			}

			#reservoir-canvas {
				height: 80vh;
				width: 95%;
				margin-left: 0%;
				overflow-y:scroll;
				overflow-x: hidden;
			}
			#date-info {
				font-size: 12px !important;
				width: 100%;
				text-align: center;
			}
			.panel {
				width: 100%;
			}
			#canvas-pick {
				width: 100%;
				margin-bottom: 20px;
				margin-top: 20px;
				width: 95%;
				margin-left: 2.5%;
			}
		}
	</style>
</head>

<body>
	<div id="dialog_table">
		
	</div>
	<div id="dialog_temp">
		<i class="fa fa-times dialog_temp_fa"></i>
		<p id="text-dialog">none</p>
	</div>
	<div id="container" class="w-100 h-100">
		<!-- Header -->
		<div class="element-nav">
			<div id="toggleHead">
				<div id="header-element">
					<div>
						<div class="menu-action">
							<i class="fa fa-reorder" onclick="toggleMenuLeft()"></i>
						</div>
					
						
						<div class="header-title">
							<h5>โครงการเชื่อมโยงฐานข้อมูลและพัฒนาระบบช่วยตัดสินใจในการบริหารจัดการน้ำ</h5>
							<p>พื้นที่ชายฝั่งทะเลตะวันออก (จังหวัดระยอง ชลบุรี ฉะเชิงเทรา)</p>
						</div>

						<div class="logo">
							<img src="./img/logo.png" width="50px" />
							<span class="title-logo">( จังหวัดระยอง ชลบุรี ฉะเชิงเทรา )</span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div style="display: flex;">
			<!-- Menu Left -->
			<div class="MenuLeft">
				<div class="list-menu-hide">
					<div>
						<a href="index.php" class="tooltip-nav">
                            <i class="fa fa-home"></i>
                            <span class="tooltiptext">สรุปสถานการณ์น้ำ</span>
                        </a>
					</div>
					<div>
						<a href="map.php" class="tooltip-nav">
                            <i class="fa fa-map"></i>
                            <span class="tooltiptext">แผนที่</span>
                        </a>
					</div>
                    <div>
						<a href="data.php" class="tooltip-nav">
                            <i class="fa fa-line-chart"></i>
                            <span class="tooltiptext">ข้อมูล</span>
                        </a>
					</div>
					<div>
						<a href="" class="tooltip-nav">
                            <i class="fa fa-pie-chart"></i>
                            <span class="tooltiptext">แผนจัดสรรน้ำ</span>
                        </a>
					</div>
					<div>
						<a href="" class="tooltip-nav">
                            <i class="fa fa-server"></i>
                            <span class="tooltiptext">ระบบ</span>
                        </a>
					</div>
				</div>
				<div class="list-menu-show">
					<a href="/">
						<div>
							<i class="fa fa-home"></i>
							<p>สรุปสถานการณ์น้ำ</p>
						</div>
					</a>
					<a href="map.php">
						<div>
							<i class="fa fa-map"></i>
							<p>แผนที่</p>
						</div>
					</a>
                    <a href="data.php">
						<div>
							<i class="fa fa-line-chart"></i>
							<p>ข้อมูล</p>
						</div>
					</a>
					<a href="/">
						<div>
							<i class="fa fa-pie-chart"></i>
							<p>แผนจัดสรรน้ำ</p>
						</div>
					</a>
					<a href="/">
						<div>
							<i class="fa fa-server"></i>
							<p>ระบบ</p>
						</div>
					</a>
				</div>
		   	</div>


			<!-- Main Content -->
		   	<div class="Main-container pad-Main" style="overflow-y: scroll;">
					<div class="panel">
						<select onchange="loadCanvas()" id="canvas-pick">
							<option value="reservoir">อ่างเก็บน้ำ</option>
							<option value="flow">ปริมาณน้ำท่า</option>
							<option value="rain">ปริมาณน้ำฝน</option>
							<option value="wq">คุณภาพน้ำ</option>
							<option value="pump">สถานีสูบน้ำ</option>
							<option value="customer">การใช้น้ำลูกค้า</option>
							<option value="tele">โทรมาตร</option>
						</select>

						<h5 id="date-info">วันที่</h5>
					</div>
					<script>
						const queryString = window.location.search;
						const urlParams = new URLSearchParams(queryString);
						console.log(urlParams.get('type'))
						if(urlParams.get('type')!=undefined){
							document.getElementById('canvas-pick').value = urlParams.get('type')
						}
						
						function loadCanvas(){
							let url = "index.php?type="+document.getElementById('canvas-pick').value
							console.log(url)
							window.location.href = url
						}

						var parttern_label = {
								'01':'มกราคม',
								'02':'กุมภาพันธ์',
								'03':'มีนาคม',
								'04':'เมษายน',
								'05':'พฤกษาคม',
								'06':'มิถุนายน',
								'07':'กรกฏาคม',
								'08':'สิงหาคม',
								'09':'กันยายน',
								'10':'ตุลาคม',
								'11':'พฤศจิกายน',
								'12':'ธันวาคม',
								}
					</script>
					
					
					<center>
						
						<!--
					<div class='sub-menu'>
						<a href="index.php?type=reservoir">อ่างเก็บน้ำ</a>
						<a href="index.php?type=flow">ปริมาณน้ำท่า</a>
						<a href="index.php?type=rain">ปริมาณน้ำฝน</a>
						<a href="index.php?type=wq">คุณภาพน้ำ</a>
						<a href="index.php?type=pump">สถานีสูบน้ำ</a>
						<a href="index.php?type=customer">การใช้น้ำลูกค้า</a>
						<a href="index.php?type=tele">โทรมาตร</a>
					</div>
					-->
					<div id="reservoir-canvas">
					
					<?php
						include 'connect.php';

						// Returns the floor of the lookup table.
						function floorp($val, $precision)
						{
							$mult = pow(10, $precision); // Can be cached in lookup table        
							return floor($val * $mult) / $mult;
						}
						
					
						if($_GET['type']){
							if($_GET['type']=='reservoir'){
								$sql_s = "SELECT * FROM `reservoir_info` ORDER BY `no`";
							?>
							<canvas id="canvas" width="1000px" height="600px">

							</canvas>
							<script>
								// Translates a canvas element.
								var canvas = document.getElementById('canvas'),
								context = canvas.getContext('2d');
								context.translate(0.5, 0.5);

								var base_image = new Image();
								// Returns the position of the text.
								var position_text = [
									[
										[309,392],
										[309,412],
										[355,414],
									],
									[
										[390,306],
										[392,328],
										[437,329],
									],
									[
										[577,295],
										[577,316],
										[623,316],
									],
									[
										[183,136],
										[183,157],
										[235,157],
									],
									[
										[183,75],
										[183,97],
										[235,97],
									],
									[
										[350,190],
										[350,212],
										[400,213],
									],
									[
										[522,149],
										[522,170],
										[574,173],
									],
									[
										[183,372],
										[183,393],
										[235,394],
									],
									[
										[183,430],
										[183,453],
										[235,452],
									],
									[
										[183,309],
										[183,330],
										[235,330],
									],
									[
										[183,194],
										[183,215],
										[235,215],
									],
									[
										[505,50],
										[505,72],
										[553,72],
									],
									[
										[183,252],
										[183,273],
										[235,273],
									],
									[
										[425,372],
										[425,393],
										[468,393],
									],
								]

								canvas.addEventListener('click',(e)=>{
									console.log(e.offsetX,e.offsetY)
								})
								

								context.font = "10px Arial";
								base_image.src = 'img/main/reservoir.png';
								base_image.onload = function(){
									
									context.imageSmoothingQuality = "high";
									context.drawImage(base_image, 0, 0,canvas.width,canvas.height);
									
									
								
								
							<?php 
								$result_s = $conn->query($sql_s);
								$r = 0;
								$k = 1;
								if ($result_s->num_rows > 0) {
									while($row = $result_s->fetch_assoc()) {
										$sql = "SELECT * FROM `reservoir_data` WHERE res_code ='".$row['res_code']."' ORDER BY `date` DESC, `date` ASC LIMIT 1";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) {
											while($row_s = $result->fetch_assoc()) {
												/*
												echo "<tr>";
												echo "<td>".$row['no']."</td>";
												echo "<td>".$row['res_name']."</td>";
												echo "<td>".$row['district']."</td>";
												echo "<td>".$row['province']."</td>";
												echo "<td>".$row['maxvol']."</td>";
												echo "<td>".$row['nhvol']."</td>";
												echo "<td>".$row['minvol']."</td>";
												echo "<td>".$row_s['volume']."</td>";
												echo "<td>".floorp($row_s['volume']*100/$row['nhvol'],2)."</td>";
												echo "<td>".$row_s['inflow']."</td>";
												echo "<td>".$row_s['outflow']."</td>";
												echo "</tr>";
												*/
												echo 'console.log("'.$row['res_name'].'");';
												echo 'context.fillText("'.$row_s['volume'].'", position_text['.$r.'][0][0]*canvas.width/800, position_text['.$r.'][0][1]*canvas.height/500);';
												echo 'context.fillText("'.$row_s['inflow'].'", position_text['.$r.'][1][0]*canvas.width/800, position_text['.$r.'][1][1]*canvas.height/500);';
												echo 'context.fillText("'.$row_s['outflow'].'", position_text['.$r.'][2][0]*canvas.width/800, position_text['.$r.'][2][1]*canvas.height/500);';
												if($k==1){
													$k = 0;
													$f_d = explode('-',$row_s['date']);
													echo 'document.getElementById("date-info").innerHTML="รายงานสถานการณ์น้ำข้อมูลอ่างเก็บน้ำวันที่ '.$f_d[2].' "+parttern_label["'.$f_d[1].'"]+" '.((int)$f_d[0]+543).'";';
												}
												
												$r += 1;
												
											}
										}
									}
								}
								echo "}";

							?>
							</script>

								<table>
									<tr>
										<td>ลำดับ</td>
										<td>อ่างเก็บน้ำ</td>
										<td>อำเภอ</td>
										<td>จังหวัด</td>
										<td>ปริมาณน้ำสูงสุด<br>(ล้าน ลบ.ม.)</td>
										<td>ปริมาณน้ำเก็บกัก<br>(ล้าน ลบ.ม.)</td>
										<td>ปริมาณน้ำต่ำสุด<br>(ล้าน ลบ.ม.)</td>
										<td>ปริมาณน้ำ<br>(ล้าน ลบ.ม.)</td>
										<td>ร้อยละ<br>(ล้าน ลบ.ม.)</td>
										<td>น้ำไหลเข้าอ่าง<br>(ล้าน ลบ.ม.)</td>
										<td>น้ำระบาย<br>(ล้าน ลบ.ม.)</td>
									</tr>
									<?php 
										$result_s = $conn->query($sql_s);
										if ($result_s->num_rows > 0) {
											while($row = $result_s->fetch_assoc()) {
												$sql = "SELECT * FROM `reservoir_data` WHERE res_code ='".$row['res_code']."' LIMIT 1";
												$result = $conn->query($sql);
												if ($result->num_rows > 0) {
													while($row_s = $result->fetch_assoc()) {
														echo "<tr>";
														echo "<td>".$row['no']."</td>";
														echo "<td>".$row['res_name']."</td>";
														echo "<td>".$row['district']."</td>";
														echo "<td>".$row['province']."</td>";
														echo "<td>".$row['maxvol']."</td>";
														echo "<td>".$row['nhvol']."</td>";
														echo "<td>".$row['minvol']."</td>";
														echo "<td>".$row_s['volume']."</td>";
														echo "<td>".floorp($row_s['volume']*100/$row['nhvol'],2)."</td>";
														echo "<td>".$row_s['inflow']."</td>";
														echo "<td>".$row_s['outflow']."</td>";
														echo "</tr>";
													}
												}
											}
										}

									?>
								</table>
							<?php
						}else if($_GET['type']=='flow'){
								$sql_s = "SELECT * FROM `flow_info` ORDER BY `no`";
							?>
								<canvas id="canvas" width="1000px" height="600px">

								</canvas>
								<script>
									// Translates a canvas element.
									var canvas = document.getElementById('canvas'),
									context = canvas.getContext('2d');
									context.translate(0.5, 0.5);

									var base_image = new Image();
									// Returns a list of position text.
									var position_text = [
										[
											[532,14],
											[580,33],
										],
										[
											[365,28],
											[410,42],
										],
										[
											[430,68],
											[476,86],
										],
										[
											[515,120],
											[562,139],
										],
										[
											[740,110],
											[785,128],
										],
										[
											[607,134],
											[653,153],
										],
										[
											[442,326],
											[490,300],
										],
										[
											[442,223],
											[486,242],
										],
										[
											[660,508],
											[706,526],
										],
										[
											[475,568],
											[516,588],
										],
										[
											[535,530],
											[578,548],
										],
									]

									// Add click event listener.
									canvas.addEventListener('click',(e)=>{
										console.log(e.offsetX,e.offsetY)
									})
									context.font = "10px Arial";
									base_image.src = 'img/main/ปริมาณน้ำท่า.png';
									base_image.onload = function(){
										
										context.imageSmoothingQuality = "high";
										context.drawImage(base_image, 0, 0,canvas.width,canvas.height);
										
										
									
									
								<?php 
									$result_s = $conn->query($sql_s);
									$k = 1;
									$r = 0;
									if ($result_s->num_rows > 0) {
										while($row = $result_s->fetch_assoc()) {
											$sql = "SELECT * FROM `flow_data` WHERE sta_id ='".$row['sta_id']."' LIMIT 1";
											$result = $conn->query($sql);
											if ($result->num_rows > 0) {
												while($row_s = $result->fetch_assoc()) {
													
													echo 'console.log("'.$row['sta_code'].'");';
													echo 'context.fillText("'.$row_s['wl'].'", position_text['.$r.'][0][0], position_text['.$r.'][0][1]);';
													echo 'context.fillText("'.$row_s['discharge'].'", position_text['.$r.'][1][0], position_text['.$r.'][1][1]);';
													if($k==1){
														$k = 0;
														$f_d = explode('-',$row_s['date']);
														echo 'document.getElementById("date-info").innerHTML="รายงานสถานการณ์ข้อมูลน้ำท่าวันที่ '.$f_d[2].' "+parttern_label["'.$f_d[1].'"]+" '.((int)$f_d[0]+543).'";';
													}
													$r += 1;
												}
											}
										}
									}
									echo "}";

								?>
								</script>

								<table>
									<tr>
										<td>ลำดับ</td>
										<td>รหัสสถานี</td>
										<td>แม่น้ำ</td>
										<td>ที่ตั้ง</td>
										<td>อำเภอ</td>
										<td>จังหวัด</td>
										<td>พื้นที่รับน้ำ<br>(ตร.กม.)</td>
										<td>ความจุลำน้ำ<br>(ลบ.ม./วินาที)</td>
										<td>ระดับน้ำ<br>(ม.รทก.)</td>
										<td>ปริมาณน้ำ<br>(ลบ.ม./วินาที)</td>
									</tr>
									<?php 
										$result_s = $conn->query($sql_s);
										if ($result_s->num_rows > 0) {
											while($row = $result_s->fetch_assoc()) {
												$sql = "SELECT * FROM `flow_data` WHERE sta_id ='".$row['sta_id']."' LIMIT 1";
												$result = $conn->query($sql);
												if ($result->num_rows > 0) {
													while($row_s = $result->fetch_assoc()) {
														echo "<tr>";
														echo "<td>".$row['no']."</td>";
														echo "<td>".$row['sta_id']."</td>";
														echo "<td>".$row['river']."</td>";
														echo "<td>".$row['site']."</td>";
														echo "<td>".$row['district']."</td>";
														echo "<td>".$row['province']."</td>";
														echo "<td>".$row['da_km2']."</td>";
														echo "<td>372</td>";
														echo "<td>".$row_s['wl']."</td>";
														echo "<td>".$row_s['discharge']."</td>";
														echo "</tr>";
													}
												}
											}
										}

									?>
								</table>
							<?php
							}else if($_GET['type']=='rain'){
								$sql_s = "SELECT * FROM `rain_info`";
							?>
							<canvas id="canvas" width="1000px" height="600px">

							</canvas>
							<script>
							// Translates a canvas element.
								var canvas = document.getElementById('canvas'),
								context = canvas.getContext('2d');
								context.translate(0.5, 0.5);

								var base_image = new Image();
								// Returns the position of the text.
								var position_text = [
									[[583,210],],
									[[265,210],],
									[[268,144],],
									[[480,25],],
									[[697,28],],
									[[842,100],],
									[[369,269],],
									[[280,347],],
									[[317,446],],
									[[360,535],],
									[[325,385],],
									[[530,555],],
									[[438,515],],
									[[810,479],],
								]

								canvas.addEventListener('click',(e)=>{
									console.log(e.offsetX,e.offsetY)
								})
								context.font = "10px Arial";
								base_image.src = 'img/main/สถานีวัดน้ำฝน.png';
								base_image.onload = function(){
									
									context.imageSmoothingQuality = "high";
									context.drawImage(base_image, 0, 0,canvas.width,canvas.height);
									
									
								
								
							<?php 
								$result_s = $conn->query($sql_s);
								$k = 1;
								$r = 0;
								if ($result_s->num_rows > 0) {
									while($row = $result_s->fetch_assoc()) {
										$sql = "SELECT * FROM `rain_data` WHERE sta_code ='".$row['sta_code']."' LIMIT 1";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) {
											while($row_s = $result->fetch_assoc()) {
												
												echo 'console.log("'.$row['sta_code'].'");';
												echo 'context.fillText("'.$row_s['rain_mm'].'", position_text['.$r.'][0][0], position_text['.$r.'][0][1]);';
												if($k==1){
													$k = 0;
													$f_d = explode('-',$row_s['date']);
													echo 'document.getElementById("date-info").innerHTML="รายงานสถานการณ์สถานีน้ำฝนวันที่ '.$f_d[2].' "+parttern_label["'.$f_d[1].'"]+" '.((int)$f_d[0]+543).'";';
												}
												$r += 1;
											}
										}
									}
								}
								echo "}";

							?>
							</script>

								<table>
									<tr>
										<td>รหัสสถานี</td>
										<td>สถานี</td>
										<td>อำเภอ</td>
										<td>จังหวัด</td>
										<td>ปริมาณฝน<br>(มม.)</td>
									</tr>
									<?php 
										$result_s = $conn->query($sql_s);
										if ($result_s->num_rows > 0) {
											while($row = $result_s->fetch_assoc()) {
												$sql = "SELECT * FROM `rain_data` WHERE sta_code ='".$row['sta_code']."' LIMIT 1";
												$result = $conn->query($sql);
												if ($result->num_rows > 0) {
													while($row_s = $result->fetch_assoc()) {
														echo "<tr>";
														echo "<td>".$row['sta_code']."</td>";
														echo "<td>".$row['name']."</td>";
														echo "<td>".$row['tambon']."</td>";
														echo "<td>".$row['province']."</td>";
														echo "<td>".$row_s['rain_mm']."</td>";
														echo "</tr>";
													}
												}
											}
										}

									?>
								</table>
							<?php
							}else if($_GET['type']=='wq'){
								$sql_s = "SELECT * FROM `wq_info` ORDER BY `no`";
							?>
							<canvas id="canvas" width="1000px" height="600px">

							</canvas>
							<script>
								var canvas = document.getElementById('canvas'),
								context = canvas.getContext('2d');
								context.translate(0.5, 0.5);

								var base_image = new Image();
								// Returns the position of the text.
								var position_text = [
									[
										[585,105],
										[582,126],
										[585,148],
										[665,105],
										[670,125],
										[685,148],
									],
									[
										[398,58],
										[398,80],
										[398,102],
										[420,52],
										[480,80],
										[495,102],
									],
									[
										[220,147],
										[220,168],
										[223,190],
										[300,147],
										[310,168],
										[318,190],
									],
									[
										[425,162],
										[425,184],
										[425,205],
										[505,162],
										[510,184],
										[525,205],
									],
									[
										[235,250],
										[235,270],
										[235,292],
										[315,250],
										[325,270],
										[335,292],
									],
									[
										[435,250],
										[435,272],
										[435,293],
										[515,250],
										[520,272],
										[535,293],
									],
									[
										[428,330],
										[430,350],
										[430,372],
										[505,330],
										[515,350],
										[525,372],
									],
									[
										[155,358],
										[155,379],
										[155,400],
										[233,358],
										[238,379],
										[250,400],
									],
									[
										[180,473],
										[180,495],
										[180,515],
										[255,473],
										[265,495],
										[275,515],
									],
									[
										[350,403],
										[350,425],
										[350,445],
										[425,403],
										[435,425],
										[445,445],
									],
								]


								// Add click event listener.
								canvas.addEventListener('click',(e)=>{
									console.log(e.offsetX,e.offsetY)
								})
								context.font = "10px Arial";
								base_image.src = 'img/main/คุณภาพน้ำ.png';
								base_image.onload = function(){
									
									context.imageSmoothingQuality = "high";
									context.drawImage(base_image, 0, 0,canvas.width,canvas.height);
									
									
								
								
							<?php 
								$result_s = $conn->query($sql_s);
								$k = 1;
								$r = 0;
								if ($result_s->num_rows > 0) {
									while($row = $result_s->fetch_assoc()) {
										$sql = "SELECT * FROM `wq_data` WHERE sta_code ='".$row['sta_code']."' AND ec != '' LIMIT 1";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) {
											while($row_s = $result->fetch_assoc()) {
												
												echo 'console.log("'.$row['station'].'");';
												echo 'context.fillText("'.$row_s['salinity'].'", position_text['.$r.'][0][0], position_text['.$r.'][0][1]);';
												echo 'context.fillText("'.$row_s['ec'].'", position_text['.$r.'][1][0], position_text['.$r.'][1][1]);';
												echo 'context.fillText("'.$row_s['do'].'", position_text['.$r.'][2][0], position_text['.$r.'][2][1]);';
												echo 'context.fillText("'.$row_s['pH'].'", position_text['.$r.'][3][0], position_text['.$r.'][3][1]);';
												echo 'context.fillText("'.$row_s['tds'].'", position_text['.$r.'][4][0], position_text['.$r.'][4][1]);';
												echo 'context.fillText("'.$row_s['temp'].'", position_text['.$r.'][5][0], position_text['.$r.'][5][1]);';
												if($k==1){
													$k = 0;
													$f_d = explode('-',explode(' ',$row_s['date_time'])[0]);
													echo 'document.getElementById("date-info").innerHTML="รายงานสถานการณ์คุณภาพน้ำวันที่ '.$f_d[2].' "+parttern_label["'.$f_d[1].'"]+" '.((int)$f_d[0]+543).'";';
												}
												$r += 1;
											}
										}
									}
								}
								echo "}";

							?>
							</script>
								<table>
									<tr>
										<td>ลำดับ</td>
										<td>สถานี</td>
										<td>ระยะจากทะเล<br>(กม.)</td>
										<td>ความเค็ม<br>(g/l)</td>
										<td>ค่าการนำไฟฟ้า<br>(µS/cm)</td>
										<td>ออกซิเจนในน้ำ<br>(mg/l)</td>
										<td>กรด-ด่าง<br>(pH)</td>
										<td>ของแข็งละลายน้ํา<br>(mg/l)</td>
										<td>อุณหภูมิ<br>(°C)</td>
									</tr>
									<?php 
										$result_s = $conn->query($sql_s);
										if ($result_s->num_rows > 0) {
											while($row = $result_s->fetch_assoc()) {
												$sql = "SELECT * FROM `wq_data` WHERE sta_code ='".$row['sta_code']."' AND ec != '' LIMIT 1";
												$result = $conn->query($sql);
												if ($result->num_rows > 0) {
													while($row_s = $result->fetch_assoc()) {
														echo "<tr>";
														echo "<td>".$row['no']."</td>";
														echo "<td>".$row['station']."</td>";
														echo "<td>".$row['seadist_km']."</td>";
														echo "<td>".$row_s['salinity']."</td>";
														echo "<td>".$row_s['ec']."</td>";
														echo "<td>".$row_s['do']."</td>";
														echo "<td>".$row_s['ph']."</td>";
														echo "<td>".$row_s['tds']."</td>";
														echo "<td>".$row_s['temp']."</td>";
														echo "</tr>";
													}
												}
											}
										}

									?>
								</table>
							<?php
							}else if($_GET['type']=='pump'){
								$sql_s = "SELECT * FROM `pump_info` ORDER BY `no`";
							?>
							<canvas id="canvas" width="1000px" height="600px">

							</canvas>
							<script>
								// Translates a canvas element.
								var canvas = document.getElementById('canvas'),
								context = canvas.getContext('2d');
								context.translate(0.5, 0.5);

								var base_image = new Image();
								// Returns the position text for a given position.
								var position_text = [
									[[215,77],],
									[[215,100],],
									[[215,121],],
									[[215,142],],
									[[215,165],],
									[[215,184],],
									[[230,207],],
									[[230,229],],
									[[240,250],],
									[[240,270],],
									[[240,292],],
									[[250,313],],
									[[250,334],],
									[[250,355],],
									[[305,377],],
									
									[[880,198],],
									[[880,220],],
									[[880,241],],

									[[230,398],],
									[[40,224],],
									[[40,258],],
									[[40,291],],
									
								]

								// Add click event listener.
								canvas.addEventListener('click',(e)=>{
									console.log(e.offsetX,e.offsetY)
								})
								context.font = "10px Arial";
								base_image.src = 'img/main/สถานีสูบน้ำ.png';
								base_image.onload = function(){
									
									context.imageSmoothingQuality = "high";
									context.drawImage(base_image, 0, 0,canvas.width,canvas.height);
									
									
								
								
							<?php 
								$result_s = $conn->query($sql_s);
								$k = 1;
								$r = 0;
								if ($result_s->num_rows > 0) {
									while($row = $result_s->fetch_assoc()) {
										$sql = "SELECT * FROM `pump_data` WHERE pump_code ='".$row['pump_code']."' LIMIT 1";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) {
											while($row_s = $result->fetch_assoc()) {
												
												echo 'console.log("'.$row['pump_name'].'");';
												echo 'context.fillText("'.$row_s['flow'].'", position_text['.$r.'][0][0], position_text['.$r.'][0][1]);';
												if($k==1){
													$k = 0;
													$f_d = explode('-',$row_s['date']);
													echo 'document.getElementById("date-info").innerHTML="รายงานสถานการณ์สถานีสูบน้ำวันที่ '.$f_d[2].' "+parttern_label["'.$f_d[1].'"]+" '.((int)$f_d[0]+543).'";';
												}
												$r += 1;
											}
										}
									}
								}
								echo "}";

							?>
							</script>
								<table>
									<tr>
										<td>ลำดับที่</td>
										<td>รหัสสถานีสูบน้ำ</td>
										<td>สถานีสูบน้ำ</td>
										<td>ปริมาณการสูบน้ำ (ลบ.ม.)</td>
									</tr>
									<?php 
										$result_s = $conn->query($sql_s);
										if ($result_s->num_rows > 0) {
											while($row = $result_s->fetch_assoc()) {
												$sql = "SELECT * FROM `pump_data` WHERE pump_code ='".$row['pump_code']."' LIMIT 1";
												$result = $conn->query($sql);
												if ($result->num_rows > 0) {
													while($row_s = $result->fetch_assoc()) {
														echo "<tr>";
														echo "<td>".$row['no']."</td>";
														echo "<td>".$row['pump_code']."</td>";
														echo "<td>".$row['pump_name']."</td>";
														echo "<td>".$row_s['flow']."</td>";
														echo "</tr>";
													}
												}
											}
										}

									?>
								</table>
							<?php
							}else if($_GET['type']=='customer'){
								$sql_s = "SELECT * FROM `customer_info` ORDER BY `no`";
							?>
							<canvas id="canvas" width="1000px" height="600px">

							</canvas>
							<script>
								// var base_image = 0
								var canvas = document.getElementById('canvas'),
								context = canvas.getContext('2d');
								context.translate(0.5, 0.5);
								var page = 0
								var base_image = new Image();
								
								// Get the position text for the current position.
								var position_text = [
									[
										[
											[884,131],
										],
									],
									[
										[
											[800,131],
										],
									],
								]

								// Sets the position of the button.
								var button_position = [
									[
										[
											[0,0],
											[100,100]
										],
									],
								]
								var image_position = [
									'img/main/ลูกค้าพื้นที่ฉะเชิงเทรา.png',
								]
								var value_name = []
								canvas.addEventListener('click',(e)=>{
									console.log(e.offsetX,e.offsetY)
								})
								context.font = "10px Arial";
								base_image.src = image_position[page];
								base_image.onload = function(){
									
									context.imageSmoothingQuality = "high";
									context.drawImage(base_image, 0, 0,canvas.width,canvas.height);
									
									
								
								
							<?php 
								$result_s = $conn->query($sql_s);
								$page = 0;
								$key_page = 0;
								echo 'value_name.push([])';
								$r = 0;
								if ($result_s->num_rows > 0) {
									while($row = $result_s->fetch_assoc()) {
										$sql = "SELECT * FROM `customer_wateruse` WHERE customer_code ='".$row['customer_code']."' AND wateruse != '' LIMIT 1";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) {
											while($row_s = $result->fetch_assoc()) {
												/*
												echo 'console.log("'.$row['customer_name'].'");';
												echo "<br>";
												//echo 'context.fillText("'.$row_s['wateruse'].'", position_text[page]['.$r.'][0][0], position_text[page]['.$r.'][0][1]);';
												if($page >= 10){
													$page = 0;
													$key_page += 1;
													echo 'value_name.push([])';
												}else{
													$page += 1;
													echo 'value_name['.$key_page.'].push("'.$row_s['wateruse'].'")';
												}
												$r += 1;*/
											}
										}
									}
								}
								echo "}";

							?>
							</script>
								<table>
									<tr>
										<td>ลำดับลูกค้า</td>
										<td>ชื่อลูกค้า</td>
										<td>รหัสลูกค้า</td>
										<td>พื้นที่</td>
										<td>จำนวนมาตร</td>
										<td>ปริมาณการใช้น้ำ (ลบ.ม.)</td>
									</tr>
									<?php 
										$result_s = $conn->query($sql_s);
										if ($result_s->num_rows > 0) {
											while($row = $result_s->fetch_assoc()) {
												$sql = "SELECT * FROM `customer_wateruse` WHERE customer_code ='".$row['customer_code']."' LIMIT 1";
												$result = $conn->query($sql);
												if ($result->num_rows > 0) {
													while($row_s = $result->fetch_assoc()) {
														echo "<tr>";
														echo "<td>".$row['no']."</td>";
														echo "<td>".$row['customer_name']."</td>";
														echo "<td>".$row['customer_code']."</td>";
														echo "<td>".$row['area']."</td>";
														echo "<td>".$row['meter']."</td>";
														echo "<td>".$row_s['wateruse']."</td>";
														echo "</tr>";
													}
												}
											}
										}

									?>
								</table>
							<?php
							}else if($_GET['type']=='tele'){
								$sql_s = "SELECT * FROM `tele_info`";
							?>
							<canvas id="canvas" width="1000px" height="600px">

							</canvas>
							<script>
								var canvas = document.getElementById('canvas'),
								context = canvas.getContext('2d');
								context.translate(0.5, 0.5);

								// var base_image = newImage
								var base_image = new Image();
								
								// Get the position text.
								var position_text = [
									[
										[455,495],
										[560,495],
										[635,495],
									],
								]

								canvas.addEventListener('click',(e)=>{
									console.log(e.offsetX,e.offsetY)
								})
								context.font = "10px Arial";
								base_image.src = 'img/main/สถานีโทรมาตร.png';
								base_image.onload = function(){
									
									context.imageSmoothingQuality = "high";
									context.drawImage(base_image, 0, 0,canvas.width,canvas.height);
									
									
								
								
							<?php 
								$result_s = $conn->query($sql_s);
								$k = 1;
								$r = 0;
								if ($result_s->num_rows > 0) {
									while($row = $result_s->fetch_assoc()) {
										$sql = "SELECT * FROM `tele_data` WHERE sta_code ='".$row['sta_code']."' LIMIT 1";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) {
											while($row_s = $result->fetch_assoc()) {
												
												echo 'console.log("'.$row['tambon'].'");';
												echo 'context.fillText("'.($row_s['wl']==''?'ไม่มีค่า':$row_s['wl']).'", position_text['.$r.'][0][0], position_text['.$r.'][0][1]);';
												echo 'context.fillText("'.($row_s['discharge']==''?'ไม่มีค่า':$row_s['discharge']).'", position_text['.$r.'][1][0], position_text['.$r.'][1][1]);';
												echo 'context.fillText("'.$row_s['rain_mm'].'", position_text['.$r.'][2][0], position_text['.$r.'][2][1]);';
												if($k==1){
													$k = 0;
													$f_d = explode('-',explode(' ',$row_s['date_time'])[0]);
													echo 'document.getElementById("date-info").innerHTML="รายงานสถานการณ์สถานีโทรมาตรวันที่ '.$f_d[2].' "+parttern_label["'.$f_d[1].'"]+" '.((int)$f_d[0]+543).'";';
												}
												$r += 1;
											}
										}
									}
								}
								echo "}";

							?>
							</script>
								<table>
									<tr>
										<td>ลำดับ</td>
										<td>ตำบล</td>
										<td>อำเภอ</td>
										<td>จังหวัด</td>
										<td>ระดับน้ำ<br>(ม.รทก.)</td>
										<td>ปริมาณน้ำ<br>(ลบ.ม./วินาที)</td>
										<td>ปริมาณฝน<br>(มม.)</td>
									</tr>
									<?php 
										$result_s = $conn->query($sql_s);
										if ($result_s->num_rows > 0) {
											while($row = $result_s->fetch_assoc()) {
												$sql = "SELECT * FROM `tele_data` WHERE sta_code ='".$row['sta_code']."' LIMIT 1";
												$result = $conn->query($sql);
												if ($result->num_rows > 0) {
													while($row_s = $result->fetch_assoc()) {
														echo "<tr>";
														echo "<td>1</td>";
														echo "<td>".$row['tambon']."</td>";
														echo "<td>".$row['district']."</td>";
														echo "<td>".$row['province']."</td>";
														echo "<td>".$row_s['wl']."</td>";
														echo "<td>".$row_s['discharge']."</td>";
														echo "<td>".$row_s['rain_mm']."</td>";
														echo "</tr>";
													}
												}
											}
										}

									?>
								</table>
							<?php
							}

						}else{
							$sql_s = "SELECT * FROM `reservoir_info` ORDER BY `no`";
						?>
						<canvas id="canvas" width="1000px" height="600px">

						</canvas>
						<script>
							var canvas = document.getElementById('canvas'),
							context = canvas.getContext('2d');
							context.translate(0.5, 0.5);

							var base_image = new Image();
							var position_text = [
								[
									[309,392],
									[309,412],
									[355,414],
								],
								[
									[390,306],
									[392,328],
									[437,329],
								],
								[
									[577,295],
									[577,316],
									[623,316],
								],
								[
									[183,136],
									[183,157],
									[235,157],
								],
								[
									[183,75],
									[183,97],
									[235,97],
								],
								[
									[350,190],
									[350,212],
									[400,213],
								],
								[
									[522,149],
									[522,170],
									[574,173],
								],
								[
									[183,372],
									[183,393],
									[235,394],
								],
								[
									[183,430],
									[183,453],
									[235,452],
								],
								[
									[183,309],
									[183,330],
									[235,330],
								],
								[
									[183,194],
									[183,215],
									[235,215],
								],
								[
									[505,50],
									[505,72],
									[553,72],
								],
								[
									[183,252],
									[183,273],
									[235,273],
								],
								[
									[425,372],
									[425,393],
									[468,393],
								],
							]

							canvas.addEventListener('click',(e)=>{
								console.log(e.offsetX,e.offsetY)
							})
							

							context.font = "10px Arial";
							base_image.src = 'img/main/reservoir.png';
							base_image.onload = function(){
								
								context.imageSmoothingQuality = "high";
								context.drawImage(base_image, 0, 0,canvas.width,canvas.height);
								
								
							
							
						<?php 
							$result_s = $conn->query($sql_s);
							$r = 0;
							$k = 1;
							if ($result_s->num_rows > 0) {
								while($row = $result_s->fetch_assoc()) {
									$sql = "SELECT * FROM `reservoir_data` WHERE res_code ='".$row['res_code']."' ORDER BY `date` DESC, `date` ASC LIMIT 1";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										while($row_s = $result->fetch_assoc()) {
											/*
											echo "<tr>";
											echo "<td>".$row['no']."</td>";
											echo "<td>".$row['res_name']."</td>";
											echo "<td>".$row['district']."</td>";
											echo "<td>".$row['province']."</td>";
											echo "<td>".$row['maxvol']."</td>";
											echo "<td>".$row['nhvol']."</td>";
											echo "<td>".$row['minvol']."</td>";
											echo "<td>".$row_s['volume']."</td>";
											echo "<td>".floorp($row_s['volume']*100/$row['nhvol'],2)."</td>";
											echo "<td>".$row_s['inflow']."</td>";
											echo "<td>".$row_s['outflow']."</td>";
											echo "</tr>";
											*/
											echo 'console.log("'.$row['res_name'].'");';
											echo 'context.fillText("'.$row_s['volume'].'", position_text['.$r.'][0][0]*canvas.width/800, position_text['.$r.'][0][1]*canvas.height/500);';
											echo 'context.fillText("'.$row_s['inflow'].'", position_text['.$r.'][1][0]*canvas.width/800, position_text['.$r.'][1][1]*canvas.height/500);';
											echo 'context.fillText("'.$row_s['outflow'].'", position_text['.$r.'][2][0]*canvas.width/800, position_text['.$r.'][2][1]*canvas.height/500);';
											if($k==1){
												$k = 0;
												$f_d = explode('-',$row_s['date']);
												echo 'document.getElementById("date-info").innerHTML="รายงานสถานการณ์น้ำข้อมูลอ่างเก็บน้ำวันที่ '.$f_d[2].' "+parttern_label["'.$f_d[1].'"]+" '.((int)$f_d[0]+543).'";';
											}
											
											$r += 1;
											
										}
									}
								}
							}
							echo "}";

						?>
						</script>

							<table>
								<tr>
									<td>ลำดับ</td>
									<td>อ่างเก็บน้ำ</td>
									<td>อำเภอ</td>
									<td>จังหวัด</td>
									<td>ปริมาณน้ำสูงสุด<br>(ล้าน ลบ.ม.)</td>
									<td>ปริมาณน้ำเก็บกัก<br>(ล้าน ลบ.ม.)</td>
									<td>ปริมาณน้ำต่ำสุด<br>(ล้าน ลบ.ม.)</td>
									<td>ปริมาณน้ำ<br>(ล้าน ลบ.ม.)</td>
									<td>ร้อยละ<br>(ล้าน ลบ.ม.)</td>
									<td>น้ำไหลเข้าอ่าง<br>(ล้าน ลบ.ม.)</td>
									<td>น้ำระบาย<br>(ล้าน ลบ.ม.)</td>
								</tr>
								<?php 
									$result_s = $conn->query($sql_s);
									if ($result_s->num_rows > 0) {
										while($row = $result_s->fetch_assoc()) {
											$sql = "SELECT * FROM `reservoir_data` WHERE res_code ='".$row['res_code']."' LIMIT 1";
											$result = $conn->query($sql);
											if ($result->num_rows > 0) {
												while($row_s = $result->fetch_assoc()) {
													echo "<tr>";
													echo "<td>".$row['no']."</td>";
													echo "<td>".$row['res_name']."</td>";
													echo "<td>".$row['district']."</td>";
													echo "<td>".$row['province']."</td>";
													echo "<td>".$row['maxvol']."</td>";
													echo "<td>".$row['nhvol']."</td>";
													echo "<td>".$row['minvol']."</td>";
													echo "<td>".$row_s['volume']."</td>";
													echo "<td>".floorp($row_s['volume']*100/$row['nhvol'],2)."</td>";
													echo "<td>".$row_s['inflow']."</td>";
													echo "<td>".$row_s['outflow']."</td>";
													echo "</tr>";
												}
											}
										}
									}

								?>
							</table>
						<?php
					}
					?>
					</center>
					</div>
					
						<div class="container-right-box" style="display:none;">
							<!--
							<div class="header-right-box">
								<h3><i class="fa fa-exclamation-circle"></i> จำนวนอ่างเก็บน้ำ</h3>
							</div>
							<div class="right-box">
								<div>
									<i class="fa fa-database"></i>
								</div>
								<div class="content-box">
									<p class="header-inner-right">จำนวนอ่างทั้งหมด <%= data.length %> อ่าง</p>
									<a href="#"><i class="fa fa-link"></i>&nbsp;รายละเอียด</a>			
								</div>
							</div>
							<div class="container-select-group">
								<div class="content-box" onclick="filter_data()" style="background: rgb(40,55,139);
								background: linear-gradient(176deg, rgba(40,55,139,1) 0%, rgba(15,18,74,1) 100%);">
									<p>ทั้งหมด</p>
								</div>
								<div class="content-box" onclick="filter_data('l')" style="background: rgb(139,40,94);
								background: linear-gradient(176deg, rgba(139,40,94,1) 0%, rgba(74,15,44,1) 100%);">
									<p>ขนาดใหญ่</p>
								</div>
								<div class="content-box" onclick="filter_data('m')" style="background: rgb(139,81,40);
								background: linear-gradient(176deg, rgba(139,81,40,1) 0%, rgba(94,61,23,1) 100%);">
									<p>ขนาดกลาง</p>			
								</div>
							</div>
							-->
							<div class="select_type_data">
								<select onchange="load_info(this)">
									<option>อ่างเก็บน้ำ</option>
									<option>สถานีสูบน้ำ</option>
									<option>ปริมาณน้ำท่า</option>
									<option>สถานีคุณภาพน้ำ</option>
									<option>การใช้น้ำลูกค้า</option>
								</select>
							</div>
							<div id="feed-resorvoir">
								
							</div>

						</div>
			
		</div>
	</div>

	<!-- Javascripr -->
	<script type="text/javascript" src="./js/fontawesome/fa-filter.js"></script>
	<script type="text/javascript" src="https://d3js.org/topojson.v2.min.js"></script>
	<!-- <script type="text/javascript" src="https://mapbox.github.io/geojson-vt/geojson-vt-dev.js"></script> -->
	<script type="text/javascript" src="https://unpkg.com/geojson-vt@3.0.0/geojson-vt-dev.js"></script>
	<!-- <script type="text/javascript" src="https://unpkg.com/geojson-vt@3.2.0/geojson-vt.js"></script> -->
	<script type="text/javascript"
		src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.0.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<script type="text/javascript"
		src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<script type="text/javascript"
		src="https://cdnjs.cloudflare.com/ajax/libs/jquery.scrollbar/0.2.11/jquery.scrollbar.min.js"></script>
	
	<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
	<script type="text/javascript"
		src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>

	<!-- JS Load Element -->
	<script src="https://unpkg.com/elm-pep@1.0.6/dist/elm-pep.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/utm-latlng@1.0.5/UTMLatLngFront.js"></script>
	<script type="text/javascript" src="./js/ol-layerswitcher.js"></script>
	<script type="text/javascript" src="./js/modal.js"></script>
	<script type="text/javascript" src="./js/slidbar.js"></script>

	

	<script>
		
		var data_storage = []
		var data_storage_pump = []
		var data_storage_wq = []
		var data_storage_inflow = []
		var data_storage_customer = []
        <?php 
            
            
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $sql = "SELECT * FROM `reservoir_info` ORDER BY `no`";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
            ?>
            <?php
                    echo "data_storage.push(['".$row["res_name"]."','" . $row["res_code"]."','" . $row["maxvol"]."','" . $row["district"]."','" . $row["res_code"]."']);";
            ?>
            <?php
                }
            } else {
            
            }
			
			$sql = "SELECT * FROM `pump_info` ORDER BY `no`";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
            ?>
            <?php
                    echo "data_storage_pump.push(['".$row["pump_code"]."','" . $row["pump_name"]."']);";
            ?>
            <?php
                }
            } else {
            
            }

			$sql = "SELECT * FROM `customer_info` ORDER BY `no`";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
            ?>
            <?php
                    echo "data_storage_customer.push(['".$row["customer_code"]."','" . $row["customer_name"]."']);";
            ?>
            <?php
                }
            } else {
            
            }

			$sql = "SELECT * FROM `flow_info` ORDER BY `no`";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
            ?>
            <?php
                    echo "data_storage_inflow.push(['".$row["river"]."','" . $row["sta_code"]."','" . $row["sta_id"]."']);";
            ?>
            <?php
                }
            } else {
            
            }

			$sql = "SELECT * FROM `wq_info` ORDER BY `no`";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
            ?>
            <?php
                    echo "data_storage_wq.push(['".$row["sta_code"]."','" . $row["station"]."']);";
            ?>
            <?php
                }
            } else {
            
            }
			
			
            $conn->close();
        ?>

        /*
		<% data.forEach((e)=>{%>
			data_storage.push(['<%= e[0] %>','<%= e[1] %>',<%= e[2] %>,'<%= e[3] %>'])
		<% })%>
        */
		
		function filter_data(size='a'){
			let time = 0
			$('#feed-resorvoir').empty()
			data_storage.forEach((list_data)=>{
				setTimeout(()=>{
					if(size == 'a' || size == list_data[3]){
						$('#feed-resorvoir').append(`
						<a href='?page=data&key=อ่างเก็บน้ำ${list_data[0]}'>
							<div class="card-reservoir">
								<div class="card-title-show">
									<p>อ่างเก็บน้ำ${list_data[0]}</p><p id="${list_data[1]}_date"></p>
								</div>
								<div class="card-content">
									<span>
										<h5 id="${list_data[1]}_volume">น้ำในอ่าง : 0</h5>
										<h5 id="${list_data[1]}_inflow">น้ำไหลลงอ่าง : 0</h5>
									</span>
									<span>
										<h5>ความจุเก็บกัก : ${list_data[2]} ล้าน ลบ.ม</h5>
										
									</span>
								</div>
							</div>
						</a>
						`)
					}
					load_data_card(list_data[4])
				},time)
				time += 200
			})
			
			function load_data_card(code){
				let data_body = { 'code' : code, 'type':1}
				$.ajax({
                    type: 'POST',
                    url: 'info_data.php',
                    data: data_body
                }).done(function(data) {
                    let tmp = data.split(',')
                    $('#'+code+'_volume').text('น้ำในอ่าง : '+tmp[0]+' ล้าน ลบ.ม')
                    $('#'+code+'_inflow').text('น้ำไหลลงอ่าง : '+tmp[1]+' ล้าน ลบ.ม')
                    $('#'+code+'_date').text(tmp[2].split('-').reverse().join('/').replaceAll(' ',''))
                }).fail(function() {
                    // if posting your form failed
                    alert("Posting failed.");
                });
                
			}
		}


		function filter_data_wq(){
			let time = 0
			$('#feed-resorvoir').empty()
			data_storage_wq.forEach((list_data)=>{
				setTimeout(()=>{
					$('#feed-resorvoir').append(`
						<a href='?page=data&key=อ่างเก็บน้ำ${list_data[0]}'>
							<div class="card-reservoir">
								<div class="card-title-show">
									<p>${list_data[0]}</p><p id="${list_data[0]}_date" style="width:70%"></p>
								</div>
								<div class="card-content">
									<span style='width:100%'>
										<h5 id="${list_data[0]}_salinity">ระดับน้ำ : 0</h5>
										<h5 id="${list_data[0]}_ec">ปริมาณน้ำ : 0</h5>
										<h5 id="${list_data[0]}_do">ปริมาณน้ำ : 0</h5>
										<h5 id="${list_data[0]}_ph">ปริมาณน้ำ : 0</h5>
										<h5 id="${list_data[0]}_tds">ปริมาณน้ำ : 0</h5>
										<h5 id="${list_data[0]}_temp">ปริมาณน้ำ : 0</h5>
									</span>
								</div>
							</div>
						</a>
					`)
					load_data_qw(list_data[0])
				},time)
				time += 200
			})
			
			function load_data_qw(code){
				let data_body = { 'code' : code, 'type':3}
				$.ajax({
                    type: 'POST',
                    url: 'info_data.php',
                    data: data_body
                }).done(function(data) {
                    let tmp = data.split(',')
					console.log(code)
                    $('#'+code+'_salinity').text('ความเค็ม : '+tmp[0]+' g/l')
                    $('#'+code+'_ec').text('ค่าการนำไฟฟ้า : '+tmp[1]+' uS/cm')
					$('#'+code+'_do').text('ออกซิเจนในน้ำ : '+tmp[2]+' mg/l')
					$('#'+code+'_ph').text('กรดขด่าง : '+tmp[3]+' pH')
					$('#'+code+'_tds').text('ของแข็งละลายน้ำ : '+tmp[4]+' mg/l')
					$('#'+code+'_temp').text('อุณหภูมิ : '+tmp[5]+' C')
                    $('#'+code+'_date').text(tmp[6])
                }).fail(function() {
                    // if posting your form failed
                    alert("Posting failed.");
                });
                
			}
		}

		function filter_data_customer(){
			let time = 0
			$('#feed-resorvoir').empty()
			data_storage_customer.forEach((list_data)=>{
				setTimeout(()=>{
					$('#feed-resorvoir').append(`
						<a href='?page=data&key=อ่างเก็บน้ำ${list_data[0]}'>
							<div class="card-reservoir">
								<div class="card-title-show">
									<p>${list_data[1]}</p><p id="${list_data[0]}_date"></p>
								</div>
								<div class="card-content">
									<span style='width:100%'>
										<h5 id="${list_data[0]}_wateruse">ปริมาณการใช้น้ำ : 0 ลบ.ม.</h5>
									</span>
								</div>
							</div>
						</a>
					`)
					load_data_customer(list_data[0])
				},time)
				time += 200
			})
			
			function load_data_customer(code){
				let data_body = { 'code' : code, 'type':4}
				$.ajax({
                    type: 'POST',
                    url: 'info_data.php',
                    data: data_body
                }).done(function(data) {
                    let tmp = data.split(',')
					//console.log(tmp)
                    $('#'+code+'_wateruse').text('ปริมาณการใช้น้ำ : '+tmp[2]+' ลบ.ม.')
                    $('#'+code+'_date').text(tmp[1])
                }).fail(function() {
                    // if posting your form failed
                    alert("Posting failed.");
                });
                
			}
		}

		function filter_data_info(){
			let time = 0
			$('#feed-resorvoir').empty()
			data_storage_inflow.forEach((list_data)=>{
				setTimeout(()=>{
					$('#feed-resorvoir').append(`
						<a href='?page=data&key=อ่างเก็บน้ำ${list_data[0]}'>
							<div class="card-reservoir">
								<div class="card-title-show">
									<p>${list_data[1]}</p><p id="${list_data[2]}_date"></p>
								</div>
								<div class="card-content">
									<span>
										<h5 id="${list_data[2]}_wl">ระดับน้ำ : 0</h5>
										<h5 id="${list_data[2]}_discharge">ปริมาณน้ำ : 0</h5>
									</span>
									<span>
										
									</span>
								</div>
							</div>
						</a>
					`)
					load_data_card(list_data[2])
				},time)
				time += 200
			})
			
			function load_data_card(code){
				let data_body = { 'code' : code, 'type':2}
				$.ajax({
                    type: 'POST',
                    url: 'info_data.php',
                    data: data_body
                }).done(function(data) {
                    let tmp = data.split(',')
					console.log(code)
                    $('#'+code+'_wl').text('ระดับน้ำ : '+tmp[0]+' ม.รทก')
                    $('#'+code+'_discharge').text('ปริมาณน้ำ : '+tmp[1]+' ลบ.ม/วินาที')
                    $('#'+code+'_date').text(tmp[2].split('-').reverse().join('/').replaceAll(' ',''))
                }).fail(function() {
                    // if posting your form failed
                    alert("Posting failed.");
                });
                
			}
		}

		function filter_data_pump(){
			let time = 0
			$('#feed-resorvoir').empty()
			data_storage_pump.forEach((list_data)=>{
				setTimeout(()=>{
					$('#feed-resorvoir').append(`
						<a href='?page=data&key=อ่างเก็บน้ำ${list_data[0]}'>
							<div class="card-reservoir">
								<div class="card-title-show">
									<p>${list_data[1]}</p><p id="${list_data[0]}_date"></p>
								</div>
								<div class="card-content">
									<span>
										<h5 id="${list_data[0]}_flow">ระดับน้ำ : 0</h5>
									</span>
									<span>
										
									</span>
								</div>
							</div>
						</a>
					`)
					load_data_pump(list_data[0])
				},time)
				time += 200
			})
			
			function load_data_pump(code){
				let data_body = { 'code' : code, 'type':5}
				$.ajax({
                    type: 'POST',
                    url: 'info_data.php',
                    data: data_body
                }).done(function(data) {
                    let tmp = data.split(',')
					console.log(code)
                    $('#'+code+'_flow').text('ระดับน้ำ : '+tmp[0]+' ม.รทก')
                    $('#'+code+'_date').text(tmp[1].split('-').reverse().join('/').replaceAll(' ',''))
                }).fail(function() {
                    // if posting your form failed
                    alert("Posting failed.");
                });
                
			}
		}
			
		
		filter_data()

		function load_info(e){
			let select = e.value
			console.log(select)
			if(select == "อ่างเก็บน้ำ"){
				filter_data()
			}else if(select == "สถานีสูบน้ำ"){
				filter_data_pump()
			}else if(select == "ปริมาณน้ำท่า"){
				filter_data_info()
			}else if(select == "สถานีคุณภาพน้ำ"){
				filter_data_wq()
			}else if(select == "การใช้น้ำลูกค้า"){
				filter_data_customer()
			}
		}
	</script>
</body>

</html>