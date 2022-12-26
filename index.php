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

		.ol-zoom {
			display: none !important;
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
			padding: 0px 0px;
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
			<div class="Spilt-Screen">
					<div>
						<!-- content -->
						<div id="content">
							<!-- Page Content  -->
							<!-- tooltip style -->
							<style>
								canvas {
									width: 100% !important;
									height: 100% !important;
								}
								div.tooltip_menu span {
									display: none;
									position: absolute;
									width: 120px;
									text-align: center;
									padding: 5px 0;
									border-radius: 6px;
									background: rgba(0, 0, 0, 0.267);
									color: #fff;
									position: absolute;
									z-index: 1;
								}
	
								div.tooltip_menu:hover span {
									display: block;
								}
							</style>
	
							<div id="filter_icon" style=" padding:4px; position:absolute; left:10px; z-index:99;
													/* top:64px; border-radius:1px; border: 1px solid #42ACA8; */">
								<!-- <i class="fa fa-align-justify fa-1.5x"></i> -->
								<div class="tooltip_menu">
									<img src=./img/OpenLayers_logo.svg style="width:42px;">
									<span class="tooltiptext">รายการข้อมูล</span>
								</div>
							</div>
	
							<!-- tooltip -->
							<div id="tooltip" class="ol-popup">
								<div id="tooltip-content"></div>
							</div>
	
							<!-- Hover -->
							<div id="hover-Cross_Section"></div>
							<div id="hover-MapControl"></div>
							<div id="hover-Trans_Station"></div>
							<div id="hover-River_Distance"></div>
							<div id="hover-Reservoir"></div>
							<div id="hover-Irr_Project"></div>
							<div id="hover-Irr_Pump"></div>
							<div id="hover-Weather_Station"></div>
							<div id="hover-Rain_Station"></div>
							<div id="hover-Level_Station"></div>
							<div id="hover-Bridge"></div>
							<div id="hover-Diversion_Dam"></div>
							<div id="hover-Regulator"></div>
							<div id="hover-Weir"></div>
							<div id="hover-Levee"></div>
							<div id="hover-Polder"></div>
							<div id="hover-Culvert"></div>
							<div id="hover-Factory"></div>
							<div id="hover-Waterdepth"></div>
							<div id="hover-Floodmark"></div>
							<div id="hover-Wetland"></div>
	
							<!-- popup -->
							<!-- <div id="popup" class="ol-popup">
								<a href="#" id="popup-closer" class="ol-popup-closer"></a>
								<div id="popup-content"></div>
							</div> -->
	
							<!-- province -->
							<div id="popup-Province" class="ol-popup">
								<a href="#" id="popup-closer-Province" class="ol-popup-closer"></a>
								<div id="popup-content-Province"></div>
							</div>
	
							<!-- village -->
							<div id="popup-Village" class="ol-popup">
								<a href="#" id="popup-closer-Village" class="ol-popup-closer"></a>
								<div id="popup-content-Village"></div>
							</div>
	
							<!-- Trans_Station -->
							<div id="popup-Trans_Station" class="ol-popup">
								<a href="#" id="popup-closer-Trans_Station" class="ol-popup-closer"></a>
								<div id="popup-content-Trans_Station"></div>
							</div>
	
							<!-- Wetland -->
							<div id="popup-Wetland" class="ol-popup">
								<a href="#" id="popup-closer-Wetland" class="ol-popup-closer"></a>
								<div id="popup-content-Wetland"></div>
							</div>
	
							<!-- River_Distance -->
							<div id="popup-River_Distance" class="ol-popup">
								<a href="#" id="popup-closer-River_Distance" class="ol-popup-closer"></a>
								<div id="popup-content-River_Distance"></div>
							</div>
	
							<!-- Reservoir -->
							<div id="popup-Reservoir" class="ol-popup">
								<a href="#" id="popup-closer-Reservoir" class="ol-popup-closer"></a>
								<div id="popup-content-Reservoir"></div>
							</div>
	
							<!-- Irr_Project -->
							<div id="popup-Irr_Project" class="ol-popup">
								<a href="#" id="popup-closer-Irr_Project" class="ol-popup-closer"></a>
								<div id="popup-content-Irr_Project"></div>
							</div>
	
							<!-- Irr_Pump -->
							<div id="popup-Irr_Pump" class="ol-popup">
								<a href="#" id="popup-closer-Irr_Pump" class="ol-popup-closer"></a>
								<div id="popup-content-Irr_Pump"></div>
							</div>
	
							<!-- Well -->
							<div id="popup-Well" class="ol-popup">
								<a href="#" id="popup-closer-Well" class="ol-popup-closer"></a>
								<div id="popup-content-Well"></div>
							</div>
	
							<!-- Weather_Station -->
							<div id="popup-Weather_Station" class="ol-popup">
								<a href="#" id="popup-closer-Weather_Station" class="ol-popup-closer"></a>
								<div id="popup-content-Weather_Station"></div>
							</div>
	
							<!-- Rain_Station -->
							<div id="popup-Rain_Station" class="ol-popup">
								<a href="#" id="popup-closer-Rain_Station" class="ol-popup-closer"></a>
								<div id="popup-content-Rain_Station"></div>
							</div>
	
							<!-- Level_Station -->
							<div id="popup-Level_Station" class="ol-popup">
								<a href="#" id="popup-closer-Level_Station" class="ol-popup-closer"></a>
								<div id="popup-content-Level_Station"></div>
							</div>
	
							<!-- Obstruction -->
							<!-- Bridge -->
							<div id="popup-Bridge" class="ol-popup">
								<a href="#" id="popup-closer-Bridge" class="ol-popup-closer"></a>
								<div id="popup-content-Bridge"></div>
							</div>
							<!-- Diversion_Dam -->
							<div id="popup-Diversion_Dam" class="ol-popup">
								<a href="#" id="popup-closer-Diversion_Dam" class="ol-popup-closer"></a>
								<div id="popup-content-Diversion_Dam"></div>
							</div>
							<!-- Weir -->
							<div id="popup-Weir" class="ol-popup">
								<a href="#" id="popup-closer-Weir" class="ol-popup-closer"></a>
								<div id="popup-content-Weir"></div>
							</div>
							<!-- Regulator -->
							<div id="popup-Regulator" class="ol-popup">
								<a href="#" id="popup-closer-Regulator" class="ol-popup-closer"></a>
								<div id="popup-content-Regulator"></div>
							</div>
							<!-- Levee -->
							<div id="popup-Levee" class="ol-popup">
								<a href="#" id="popup-closer-Levee" class="ol-popup-closer"></a>
								<div id="popup-content-Levee"></div>
							</div>
							<!-- Polder -->
							<div id="popup-Polder" class="ol-popup">
								<a href="#" id="popup-closer-Polder" class="ol-popup-closer"></a>
								<div id="popup-content-Polder"></div>
							</div>
							<!-- Culvert -->
							<div id="popup-Culvert" class="ol-popup">
								<a href="#" id="popup-closer-Culvert" class="ol-popup-closer"></a>
								<div id="popup-content-Culvert"></div>
							</div>
	
							<!-- Cross_Section -->
							<div id="popup-Cross_Section" class="ol-popup">
								<a href="#" id="popup-closer-Cross_Section" class="ol-popup-closer"></a>
								<div id="popup-content-Cross_Section"></div>
							</div>
	
							<!-- MapControl -->
							<div id="popup-MapControl" class="ol-popup">
								<a href="#" id="popup-closer-MapControl" class="ol-popup-closer"></a>
								<div id="popup-content-MapControl"></div>
							</div>
							<!-- Waterdepth -->
							<div id="popup-Waterdepth" class="ol-popup">
								<a href="#" id="popup-closer-Waterdepth" class="ol-popup-closer"></a>
								<div id="popup-content-Waterdepth"></div>
							</div>
	
							<!-- Floodmark -->
							<div id="popup-Floodmark" class="ol-popup">
								<a href="#" id="popup-closer-Floodmark" class="ol-popup-closer"></a>
								<div id="popup-content-Floodmark"></div>
							</div>
	
							<!-- Factory -->
							<div id="popup-Factory" class="ol-popup">
								<a href="#" id="popup-closer-Factory" class="ol-popup-closer"></a>
								<div id="popup-content-Factory"></div>
							</div>
	
							<div id="mouse-position" class="text-right" ></div>
						</div>
					</div>

					<div>
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
				</div>
				
			</div>


			<!--  Layer Dialog -->
			<div class="dialog-layer">
				<div class="header-close">
					<a onclick="toggleDialog(false)">
						<i class="fa fa-times" aria-hidden="true" style="top:10px; right:10px; position:absolute;"></i>
					</a>
				</div>
				<div class="header-layer">
					<h4>ตั้งค่าเพิ่มเติม <i class="fa fa-gear"></i></h4>
				</div>
				<div>
					<div class="group-property">
					</div>
					<div id="container-layer">
						<div class="none-layer element-layer"><p>ไม่มีเลเยอร์</p></div>
					</div>
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
	<script type="text/javascript" src="./js/lightbox.js"></script>
	<script type="text/javascript" src="./js/map_script.js"></script>
	<script type="text/javascript" src="./js/map_layers.js"></script>
	<script type="text/javascript" src="./js/map_controls_index.js"></script>
	<script type="text/javascript" src="./js/map_layercontrols.js"></script>
	<script type="text/javascript" src="./js/slidbar.js"></script>

	

</body>

</html>