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
	<link rel="stylesheet" href="./css/index.css">
	<style>
		.ol-viewport {
			height: 600px !important;
		}
		.tooltip-info > p {
			color: #000 !important;
		}
	</style>
</head>

<body>
	<div id="dialog_table">

	</div>
	<div id="dialog_temp">
		<i class="fa fa-times dialog_temp_fa"></i>
		<p id="text-dialog">ss</p>
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
							<h5>โครงการเชื่อมโยงฐานข้อมูลและพัฒนาระบบช่วยตัดสินใจในการบริหารจัดการน้ำ พื้นที่ชายฝั่งทะเลตะวันออก (จังหวัดระยอง ชลบุรี ฉะเชิงเทรา)</h5>
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
							<span class="tooltiptext">หน้าแรก</span>
						</a>
					</div>
					<div>
						<a href="realtime.php?type=reservoir" class="tooltip-nav">
							<img src="./img/icon_realtime.png" width="23px">
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
							<p>หน้าแรก</p>
						</div>
					</a>
					<a href="realtime.php?type=reservoir">
						<div>
							<img src="./img/icon_realtime.png" width="15px" height="15px" style="margin-top:8px;">
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
			<div class="Main-container pad-Main" style="overflow:hidden;">
				<div class='sub-menu' style="font-size:12px;width: 59%; margin-top: 20px; margin-right: 10px;float:right;">
					<a href="?type=reservoir">อ่างเก็บน้ำ</a>
					<a href="?type=flow">ปริมาณน้ำท่า</a>
					<a href="?type=rain">ปริมาณน้ำฝน</a>
					<a href="?type=wq">คุณภาพน้ำ</a>
					<a href="?type=pump">สถานีสูบน้ำ</a>
					<a href="?type=customer">การใช้น้ำลูกค้า</a>
					<a href="?type=tele">โทรมาตร</a>
				</div>
				<div class="Spilt-Screen" >
					<div>

						<div id="content">
							<!-- Page Content  -->
							<!-- tooltip style -->
							<style>
								canvas {
									width: 97% !important;
									height: 600px !important;
									margin-left: 1% !important;
									margin-right: 2.5% !important;
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


							<!-- Dialog Map -->
							<div id="dialog_map">

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

							<div id="mouse-position" class="text-right"></div>
						</div>
					</div>

					<div style="padding-top:0px;">



						<script>
							var parttern_label = {
								'01': 'มกราคม',
								'02': 'กุมภาพันธ์',
								'03': 'มีนาคม',
								'04': 'เมษายน',
								'05': 'พฤกษาคม',
								'06': 'มิถุนายน',
								'07': 'กรกฏาคม',
								'08': 'สิงหาคม',
								'09': 'กันยายน',
								'10': 'ตุลาคม',
								'11': 'พฤศจิกายน',
								'12': 'ธันวาคม',
							}
							var position_label = {}
						</script>

						<h2 class="header-content">รายงานสถาการณ์น้ำ</h2>

						<div id="reservoir-canvas">

							<?php
							include 'connect.php';

							// Returns the floor of the lookup table.
							function floorp($val, $precision)
							{
								$mult = pow(10, $precision); // Can be cached in lookup table
								return floor($val * $mult) / $mult;
							}


							if ($_GET['type']) {
								if ($_GET['type'] == 'reservoir') {
									$sql_s = "SELECT * FROM `reservoir_info` ORDER BY `no`";
							?>

									<script>
										<?php
										$result_s = $conn->query($sql_s);
										$r = 0;
										$k = 1;
										if ($result_s->num_rows > 0) {
											while ($row = $result_s->fetch_assoc()) {
												echo 'position_label["' . $row['res_code'] . '"] = [' . $row['long'] . ',' . $row['lat'] . '];';
												$sql = "SELECT * FROM `reservoir_data` WHERE res_code ='" . $row['res_code'] . "' ORDER BY `date` DESC, `date` ASC LIMIT 1";
												$result = $conn->query($sql);
												if ($result->num_rows > 0) {
													while ($row_s = $result->fetch_assoc()) {
														if ($k == 1) {
															$k = 0;
															$f_d = explode('-', $row_s['date']);
															echo 'document.getElementsByClassName("header-content")[0].innerHTML="รายงานสถานการณ์น้ำข้อมูลอ่างเก็บน้ำวันที่ ' . $f_d[2] . ' "+parttern_label["' . $f_d[1] . '"]+" ' . ((int)$f_d[0] + 543) . '";';
														}
														$r += 1;
													}
												}
											}
										}
										?>
									</script>
									<table>
										<tr>
											<td>ลำดับ</td>
											<td>อ่างเก็บน้ำ</td>
											<td>จังหวัด</td>
											<td>ปริมาณน้ำสูงสุด<br>(ล้าน ลบ.ม.)</td>
											<td>ปริมาณน้ำเก็บกัก<br>(ล้าน ลบ.ม.)</td>
											<td>ปริมาณน้ำต่ำสุด<br>(ล้าน ลบ.ม.)</td>
											<td>ปริมาณน้ำ<br>(ล้าน ลบ.ม.)</td>
											<td>ร้อยละ<br>( % )</td>
											<td>น้ำไหลเข้าอ่าง<br>(ล้าน ลบ.ม.)</td>
											<td>น้ำระบาย<br>(ล้าน ลบ.ม.)</td>
										</tr>
										<?php
										$result_s = $conn->query($sql_s);
										if ($result_s->num_rows > 0) {
											while ($row = $result_s->fetch_assoc()) {
												$sql = "SELECT * FROM `reservoir_data` WHERE res_code ='" . $row['res_code'] . "' LIMIT 1";
												$result = $conn->query($sql);
												if ($result->num_rows > 0) {
													while ($row_s = $result->fetch_assoc()) {
														echo "<tr onclick='GoToPosition(\"" . $row['res_code'] . "\",\"reservoir\",[\"" . $row['res_name'] . "\"," . number_format((float)$row_s['volume'], 2, '.', '') . "," . number_format($row_s['volume'] * 100 / $row['nhvol'], 2) . "," . number_format((float)$row_s['inflow'], 2) . "," . number_format((float)$row_s['outflow'], 2) . "])'>";
														echo "<td >" . $row['no'] . "</td>";
														echo "<td class='left_txt'>" . $row['res_name'] . "</td>";
														echo "<td class='left_txt'>" . $row['province'] . "</td>";
														echo "<td>" . number_format((float)$row['maxvol'], 2) . "</td>";
														echo "<td>" . number_format((float)$row['nhvol'], 2) . "</td>";
														echo "<td>" . number_format((float)$row['minvol'], 2) . "</td>";
														echo "<td>" . number_format((float)$row_s['volume'], 2) . "</td>";
														echo "<td>" . number_format((float)$row_s['volume'] * 100 / $row['nhvol'], 2) . "</td>";
														echo "<td>" . number_format((float)$row_s['inflow'], 2) . "</td>";
														echo "<td>" . number_format((float)$row_s['outflow'], 2) . "</td>";
														echo "</tr>";
														echo "<script>";
														echo 'position_label["' . $row['res_code'] . '"].push("' . $row['res_name'] . '");';
														echo 'position_label["' . $row['res_code'] . '"].push(' . number_format((float)$row_s['volume'], 2) . ');';
														echo 'position_label["' . $row['res_code'] . '"].push(' . number_format((float)$row_s['volume'] * 100 / $row['nhvol'], 2) . ');';
														echo "</script>";
													}
												}
											}
										}

										?>
									</table>
								<?php
								} else if ($_GET['type'] == 'flow') {
									$sql_s = "SELECT * FROM `flow_info` ORDER BY `no`";
								?>
									<script>
										<?php
										$result_s = $conn->query($sql_s);
										$k = 1;
										$r = 0;
										if ($result_s->num_rows > 0) {
											while ($row = $result_s->fetch_assoc()) {
												echo 'position_label["' . $row['sta_code'] . '"] = [' . $row['long'] . ',' . $row['lat'] . '];';
												$sql = "SELECT * FROM `flow_data` WHERE sta_id ='" . $row['sta_id'] . "' ORDER BY date DESC LIMIT 1";
												$result = $conn->query($sql);
												if ($result->num_rows > 0) {
													while ($row_s = $result->fetch_assoc()) {
														if ($k == 1) {
															$k = 0;
															$f_d = explode('-', $row_s['date']);
															echo 'document.getElementsByClassName("header-content")[0].innerHTML="รายงานสถานการณ์ข้อมูลน้ำท่าวันที่ ' . $f_d[2] . ' "+parttern_label["' . $f_d[1] . '"]+" ' . ((int)$f_d[0] + 543) . '";';
														}
														$r += 1;
													}
												}
											}
										}
										?>
									</script>
									<table>
										<tr>
											<td>ลำดับ</td>
											<td>รหัสสถานี</td>
											<td>แม่น้ำ</td>
											<td>ที่ตั้ง</td>
											<td>จังหวัด</td>
											<td>พื้นที่รับน้ำ<br>(ตร.กม.)</td>
											<td>ระดับน้ำ<br>(ม.รทก.)</td>
											<td>ปริมาณน้ำ<br>(ลบ.ม./วินาที)</td>
										</tr>
										<?php
										$result_s = $conn->query($sql_s);
										if ($result_s->num_rows > 0) {
											while ($row = $result_s->fetch_assoc()) {
												$sql = "SELECT * FROM `flow_data` WHERE sta_id ='" . $row['sta_id'] . "' LIMIT 1";
												$result = $conn->query($sql);
												if ($result->num_rows > 0) {
													while ($row_s = $result->fetch_assoc()) {
														echo "<tr onclick='GoToPosition(\"" . $row['sta_code'] . "\",\"flow\",[\"" . $row['sta_code'] . "\"," . number_format((float)$row_s['wl'], 2) . "," . number_format((float)$row_s['discharge'], 2) . "])' >";
														echo "<td>" . $row['no'] . "</td>";
														echo "<td class='left_txt'>" . $row['sta_code'] . "</td>";
														echo "<td class='left_txt'>" . $row['river'] . "</td>";
														echo "<td class='left_txt'>" . $row['site'] . "</td>";
														echo "<td class='left_txt'>" . $row['province'] . "</td>";
														echo "<td>" . number_format((float)$row['da_km2'], 2) . "</td>";
														echo "<td>" . number_format((float)$row_s['wl'], 2) . "</td>";
														echo "<td>" . number_format((float)$row_s['discharge'], 2) . "</td>";
														echo "</tr>";
														echo "<script>";
														echo 'position_label["' . $row['sta_code'] . '"].push("' . $row['sta_code'] . '");';
														echo 'position_label["' . $row['sta_code'] . '"].push(' . number_format((float)$row_s['wl'], 2) . ');';
														echo 'position_label["' . $row['sta_code'] . '"].push(' . number_format((float)$row_s['discharge'], 2) . ');';
														echo "</script>";
													}
												}
											}
										}

										?>
									</table>
								<?php
								} else if ($_GET['type'] == 'rain') {
									$sql_s = "SELECT * FROM `rain_info`";
								?>
									<script>
										<?php
										$result_s = $conn->query($sql_s);
										$k = 1;
										$r = 0;
										if ($result_s->num_rows > 0) {
											while ($row = $result_s->fetch_assoc()) {
												echo 'position_label["' . $row['sta_code'] . '"] = [' . $row['long'] . ',' . $row['lat'] . '];';
												$sql = "SELECT * FROM `rain_data` WHERE sta_code ='" . $row['sta_code'] . "' ORDER BY date DESC  LIMIT 1";
												$result = $conn->query($sql);
												if ($result->num_rows > 0) {
													while ($row_s = $result->fetch_assoc()) {
														if ($k == 1) {
															$k = 0;
															$f_d = explode('-', $row_s['date']);
															echo 'document.getElementsByClassName("header-content")[0].innerHTML="รายงานสถานการณ์สถานีน้ำฝนวันที่ ' . $f_d[2] . ' "+parttern_label["' . $f_d[1] . '"]+" ' . ((int)$f_d[0] + 543) . '";';
														}
														$r += 1;
													}
												}
											}
										}
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
											while ($row = $result_s->fetch_assoc()) {
												$sql = "SELECT * FROM `rain_data` WHERE sta_code ='" . $row['sta_code'] . "' LIMIT 1";
												$result = $conn->query($sql);
												if ($result->num_rows > 0) {
													while ($row_s = $result->fetch_assoc()) {
														echo "<tr onclick='GoToPosition(\"" . $row['sta_code'] . "\",\"rain\",[\"" . $row['sta_code'] . " (" . $row['name'] . ")\"," . number_format((float)$row_s['rain_mm'], 2) . "])'>";
														echo "<td>" . $row['sta_code'] . "</td>";
														echo "<td class='left_txt'>" . $row['name'] . "</td>";
														echo "<td class='left_txt'>" . $row['tambon'] . "</td>";
														echo "<td class='left_txt'>" . $row['province'] . "</td>";
														echo "<td>" . number_format((float)$row_s['rain_mm'], 2) . "</td>";
														echo "</tr>";
														echo "<script>";
														echo 'position_label["' . $row['sta_code'] . '"].push("' . $row['sta_code'] . '");';
														echo 'position_label["' . $row['sta_code'] . '"].push(' . number_format((float)$row_s['rain_mm'], 2) . ');';
														echo "</script>";
													}
												}
											}
										}

										?>
									</table>
								<?php
								} else if ($_GET['type'] == 'wq') {
									$sql_s = "SELECT * FROM `wq_info` ORDER BY `no`";
								?>
									<script>
										<?php
										$result_s = $conn->query($sql_s);
										$k = 1;
										$r = 0;
										if ($result_s->num_rows > 0) {
											while ($row = $result_s->fetch_assoc()) {
												echo 'position_label["' . $row['sta_code'] . '"] = [' . (((float)$row['lon'])) . ',' . (((float)$row['lat']) + 0.03) . '];';
												$sql = "SELECT * FROM `wq_data` WHERE sta_code ='" . $row['sta_code'] . "' AND ec != '' ORDER BY date_time DESC LIMIT 1";
												$result = $conn->query($sql);
												if ($result->num_rows > 0) {
													while ($row_s = $result->fetch_assoc()) {
														if ($k == 1) {
															$k = 0;
															$f_d = explode('-', explode(' ', $row_s['date_time'])[0]);
															echo 'document.getElementsByClassName("header-content")[0].innerHTML="รายงานสถานการณ์คุณภาพน้ำวันที่ ' . $f_d[2] . ' "+parttern_label["' . $f_d[1] . '"]+" ' . ((int)$f_d[0] + 543) . '";';
														}
														$r += 1;
													}
												}
											}
										}
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
											while ($row = $result_s->fetch_assoc()) {
												$sql = "SELECT * FROM `wq_data` WHERE sta_code ='" . $row['sta_code'] . "' AND ec != '' LIMIT 1";
												$result = $conn->query($sql);
												if ($result->num_rows > 0) {
													while ($row_s = $result->fetch_assoc()) {
														echo "<tr onclick='GoToPosition(\"" . $row['sta_code'] . "\",\"wq\",[\"" .
															$row['station'] .
															" (" . $row['sta_code'] . ")\"," .
															number_format((float)$row_s['salinity'], 2) . "," .
															number_format((float)$row_s['ec'], 2) . "," .
															number_format((float)$row_s['do'], 2) . "," .
															number_format((float)$row_s['ph'], 2) . "," .
															number_format((float)$row_s['tds'], 2) . "," .
															number_format((float)$row_s['temp'], 2) . "," .
															"])'>";
														echo "<td>" . $row['no'] . "</td>";
														echo "<td class='left_txt'>" . $row['station'] . "</td>";
														echo "<td>" . $row['seadist_km'] . "</td>";
														echo "<td>" . number_format((float)$row_s['salinity'], 2) . "</td>";
														echo "<td>" . number_format((float)$row_s['ec'], 2) . "</td>";
														echo "<td>" . number_format((float)$row_s['do'], 2) . "</td>";
														echo "<td>" . number_format((float)$row_s['ph'], 2) . "</td>";
														echo "<td>" . number_format((float)$row_s['tds'], 2) . "</td>";
														echo "<td>" . number_format((float)$row_s['temp'], 2) . "</td>";
														echo "</tr>";
														echo "<script>";
														echo 'position_label["' . $row['sta_code'] . '"].push("' . $row['station'] . '");';
														echo 'position_label["' . $row['sta_code'] . '"].push(' . number_format((float)$row_s['salinity'], 2) . ');';
														echo 'position_label["' . $row['sta_code'] . '"].push(' . number_format((float)$row_s['ec'], 2) . ');';
														echo 'position_label["' . $row['sta_code'] . '"].push(' . number_format((float)$row_s['do'], 2) . ');';
														echo 'position_label["' . $row['sta_code'] . '"].push(' . number_format((float)$row_s['ph'], 2) . ');';
														echo 'position_label["' . $row['sta_code'] . '"].push(' . number_format((float)$row_s['tds'], 2) . ');';
														echo 'position_label["' . $row['sta_code'] . '"].push(' . number_format((float)$row_s['temp'], 2) . ');';
														echo "</script>";
													}
												}
											}
										}

										?>
									</table>
								<?php
								} else if ($_GET['type'] == 'pump') {
									$sql_s = "SELECT * FROM `pump_info` ORDER BY `no`";
								?>
									<script>
										<?php
										$result_s = $conn->query($sql_s);
										$k = 1;
										$r = 0;
										if ($result_s->num_rows > 0) {
											while ($row = $result_s->fetch_assoc()) {
												echo 'position_label["' . $row['pump_code'] . '"] = [' . $row['long'] . ',' . $row['lat'] . '];';
												$sql = "SELECT * FROM `pump_data` WHERE pump_code ='" . $row['pump_code'] . "' ORDER BY date DESC LIMIT 1";
												$result = $conn->query($sql);
												if ($result->num_rows > 0) {
													while ($row_s = $result->fetch_assoc()) {
														if ($k == 1) {
															$k = 0;
															$f_d = explode('-', $row_s['date']);
															echo 'document.getElementsByClassName("header-content")[0].innerHTML="รายงานสถานการณ์สถานีสูบน้ำวันที่ ' . $f_d[2] . ' "+parttern_label["' . $f_d[1] . '"]+" ' . ((int)$f_d[0] + 543) . '";';
														}
														$r += 1;
													}
												}
											}
										}
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
											while ($row = $result_s->fetch_assoc()) {
												$sql = "SELECT * FROM `pump_data` WHERE pump_code ='" . $row['pump_code'] . "' LIMIT 1";
												$result = $conn->query($sql);
												if ($result->num_rows > 0) {
													while ($row_s = $result->fetch_assoc()) {
														echo "<tr onclick='GoToPosition(\"" . $row['pump_code'] . "\",\"pump\",[\"" . $row['pump_name'] . "\"," . number_format((float)$row_s['flow'], 2) . "])'>";
														echo "<td>" . $row['no'] . "</td>";
														echo "<td class='left_txt'>" . $row['pump_code'] . "</td>";
														echo "<td class='left_txt'>" . $row['pump_name'] . "</td>";
														echo "<td>" . number_format((float)$row_s['flow'], 2) . "</td>";
														echo "</tr>";
														echo "<script>";
														echo 'position_label["' . $row['pump_code'] . '"].push("' . $row['pump_name'] . '");';
														echo 'position_label["' . $row['pump_code'] . '"].push(' . number_format((float)$row_s['flow'], 2) . ');';
														echo "</script>";
													}
												}
											}
										}

										?>
									</table>
								<?php
								} else if ($_GET['type'] == 'customer') {
									$sql_s = "SELECT * FROM `customer_info`";
									$h = 0;
								?>
									<script>
										<?php
										$result_s = $conn->query($sql_s);
										$k = 1;
										$r = 0;
										if ($result_s->num_rows > 0) {
											while ($row = $result_s->fetch_assoc()) {
												echo 'position_label["' . $row['customer_code'] . '"] = [' . $row['long'] . ',' . $row['lat'] . '];';
												$sql = "SELECT * FROM `customer_wateruse` WHERE customer_code ='" . $row['customer_code'] . "' ORDER BY date DESC";
												$result = $conn->query($sql);
												if ($result->num_rows > 0) {
													while ($row_s = $result->fetch_assoc()) {
														if ($k == 1) {
															$k = 0;
															$f_d = explode('-', $row_s['date']);
															echo 'document.getElementsByClassName("header-content")[0].innerHTML="รายงานสถานการณ์การใช้น้ำลูกค้าวันที่ ' . $f_d[2] . ' "+parttern_label["' . $f_d[1] . '"]+" ' . ((int)$f_d[0] + 543) . '";';
														}
														$r += 1;
													}
												}
											}
										}
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
											while ($row = $result_s->fetch_assoc()) {

												$sql = "SELECT * FROM `customer_wateruse` WHERE customer_code ='" . $row['customer_code'] . "'  LIMIT 1";
												$result = $conn->query($sql);
												if ($result->num_rows > 0) {
													while ($row_s = $result->fetch_assoc()) {
														$h += 1;
														if(strpos(strval($row['no']),strval($h)) !== false) {
															echo "<tr onclick='GoToPosition(\"" . $row['customer_code'] . "\",\"customer\",[\"" . $row['customer_name'] . "\"," . number_format((float)$row_s['wateruse'], 2) . "])'>";
															echo "<td>". $row['no'] . "</td>";
															echo "<td class='left_txt'>" . $row['customer_name'] . "</td>";
															echo "<td class='left_txt'>" . $row['customer_code'] . "</td>";
															echo "<td>" . number_format((float)$row['area'], 2) . "</td>";
															echo "<td>" . number_format((float)$row['meter'], 2) . "</td>";
															echo "<td>" . number_format((float)$row_s['wateruse'], 2) . "</td>";
															echo "</tr>";
															echo "<script>";
															echo 'position_label["' . $row['customer_code'] . '"].push("' . $row['customer_name'] . '");';
															echo 'position_label["' . $row['customer_code'] . '"].push(' . number_format((float)$row_s['wateruse'], 2) . ');';
															echo "</script>";
														}
													}
												}
											}
											print_r($count);
										}

										?>
									</table>

								<?php
								} else if ($_GET['type'] == 'tele') {
									$sql_s = "SELECT * FROM `tele_info`";
								?>
									<script>
										<?php
										$result_s = $conn->query($sql_s);
										$k = 1;
										$r = 0;
										if ($result_s->num_rows > 0) {
											while ($row = $result_s->fetch_assoc()) {
												echo 'position_label["' . $row['sta_code'] . '"] = [' . $row['long'] . ',' . $row['lat'] . '];';
												$sql = "SELECT * FROM `tele_data` WHERE sta_code ='" . $row['sta_code'] . "' ORDER BY date_time DESC LIMIT 1";
												$result = $conn->query($sql);
												if ($result->num_rows > 0) {
													while ($row_s = $result->fetch_assoc()) {
														if ($k == 1) {
															$k = 0;
															$f_d = explode('-', explode(' ', $row_s['date_time'])[0]);
															echo 'document.getElementsByClassName("header-content")[0].innerHTML="รายงานสถานการณ์สถานีโทรมาตรวันที่ ' . $f_d[2] . ' "+parttern_label["' . $f_d[1] . '"]+" ' . ((int)$f_d[0] + 543) . '";';
														}
														$r += 1;
													}
												}
											}
										}
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
											while ($row = $result_s->fetch_assoc()) {
												$sql = "SELECT * FROM `tele_data` WHERE sta_code ='" . $row['sta_code'] . "' LIMIT 1";
												$result = $conn->query($sql);
												if ($result->num_rows > 0) {
													while ($row_s = $result->fetch_assoc()) {
														echo "<tr onclick='GoToPosition(\"" . $row['sta_code'] . "\",\"tele\",[\"สรุปสถานการณ์น้ำโทรมาตรวัดละหารไร่\"," . number_format((float)$row_s['wl'], 2) . "," . number_format((float)$row_s['discharge'], 2) . "," . number_format((float)$row_s['rain_mm'], 2) . "])'>";
														echo "<td>1</td>";
														echo "<td class='left_txt'>" . $row['tambon'] . "</td>";
														echo "<td class='left_txt'>" . $row['district'] . "</td>";
														echo "<td class='left_txt'>" . $row['province'] . "</td>";
														echo "<td>" . number_format((float)$row_s['wl'], 2) . "</td>";
														echo "<td>" . number_format((float)$row_s['discharge'], 2) . "</td>";
														echo "<td>" . number_format((float)$row_s['rain_mm'], 2) . "</td>";
														echo "</tr>";
														echo "<script>";
														echo 'position_label["' . $row['sta_code'] . '"].push("' . $row['pump_name'] . '");';
														echo 'position_label["' . $row['sta_code'] . '"].push(' . number_format((float)$row_s['rain_mm'], 2) . ');';
														echo "</script>";
													}
												}
											}
										}

										?>
									</table>
								<?php
								}
							} else {
								$sql_s = "SELECT * FROM `reservoir_info` ORDER BY `no`";
								?>
								<script>
									<?php
									$result_s = $conn->query($sql_s);
									$r = 0;
									$k = 1;
									if ($result_s->num_rows > 0) {
										while ($row = $result_s->fetch_assoc()) {
											echo 'position_label["' . $row['res_code'] . '"] = [' . $row['long'] . ',' . $row['lat'] . '];';
											$sql = "SELECT * FROM `reservoir_data` WHERE res_code ='" . $row['res_code'] . "' ORDER BY `date` DESC, `date` ASC LIMIT 1";
											$result = $conn->query($sql);
											if ($result->num_rows > 0) {
												while ($row_s = $result->fetch_assoc()) {
													if ($k == 1) {
														$k = 0;
														$f_d = explode('-', $row_s['date']);
														echo 'document.getElementsByClassName("header-content")[0].innerHTML="รายงานสถานการณ์น้ำข้อมูลอ่างเก็บน้ำวันที่ ' . $f_d[2] . ' "+parttern_label["' . $f_d[1] . '"]+" ' . ((int)$f_d[0] + 543) . '";';
													}
													$r += 1;
												}
											}
										}
									}
									?>
								</script>
								<table>
									<tr>
										<td>ลำดับ</td>
										<td>อ่างเก็บน้ำ</td>
										<td>จังหวัด</td>
										<td>ปริมาณน้ำสูงสุด<br>(ล้าน ลบ.ม.)</td>
										<td>ปริมาณน้ำเก็บกัก<br>(ล้าน ลบ.ม.)</td>
										<td>ปริมาณน้ำต่ำสุด<br>(ล้าน ลบ.ม.)</td>
										<td>ปริมาณน้ำ<br>(ล้าน ลบ.ม.)</td>
										<td>ร้อยละ<br>( % )</td>
										<td>น้ำไหลเข้าอ่าง<br>(ล้าน ลบ.ม.)</td>
										<td>น้ำระบาย<br>(ล้าน ลบ.ม.)</td>
									</tr>
									<?php
									$result_s = $conn->query($sql_s);
									if ($result_s->num_rows > 0) {
										while ($row = $result_s->fetch_assoc()) {
											$sql = "SELECT * FROM `reservoir_data` WHERE res_code ='" . $row['res_code'] . "' LIMIT 1";
											$result = $conn->query($sql);
											if ($result->num_rows > 0) {
												while ($row_s = $result->fetch_assoc()) {
													echo "<tr onclick='GoToPosition(\"" . $row['res_code'] . "\",\"reservoir\",[\"" . $row['res_name'] . "\"," . number_format((float)$row_s['volume'], 2, '.', '') . "," . number_format($row_s['volume'] * 100 / $row['nhvol'], 2) . "," . number_format((float)$row_s['inflow'], 2) . "," . number_format((float)$row_s['outflow'], 2) . "])'>";
													echo "<td>" . $row['no'] . "</td>";
													echo "<td class='left_txt'>" . $row['res_name'] . "</td>";
													echo "<td class='left_txt'>" . $row['province'] . "</td>";
													echo "<td>" . number_format((float)$row['maxvol'], 2) . "</td>";
													echo "<td>" . number_format((float)$row['nhvol'], 2) . "</td>";
													echo "<td>" . number_format((float)$row['minvol'], 2) . "</td>";
													echo "<td>" . number_format((float)$row_s['volume'], 2) . "</td>";
													echo "<td>" . number_format((float)$row_s['volume'] * 100 / $row['nhvol'], 2) . "</td>";
													echo "<td>" . number_format((float)$row_s['inflow'], 2) . "</td>";
													echo "<td>" . number_format((float)$row_s['outflow'], 2) . "</td>";
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
							<div class="none-layer element-layer">
								<p>ไม่มีเลเยอร์</p>
							</div>
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
		<script type="text/javascript" src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>

		<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.0.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
		<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.scrollbar/0.2.11/jquery.scrollbar.min.js"></script>

		<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>

		<!-- JS Load Element -->
		<script src="https://unpkg.com/elm-pep@1.0.6/dist/elm-pep.js"></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/utm-latlng@1.0.5/UTMLatLngFront.js"></script>
		<script type="text/javascript" src="./js/ol-layerswitcher.js"></script>
		<script type="text/javascript" src="./js/modal.js"></script>
		<script type="text/javascript" src="./js/lightbox.js"></script>
		<script type="text/javascript" src="./js/map_script.js"></script>
		<script type="text/javascript" src="./js/map_layers.js"></script>
		<script type="text/javascript" src="./js/map_controls_index.js"></script>
		<script type="text/javascript" src="./js/map_layercontrols_index.js"></script>
		<script type="text/javascript" src="./js/slidbar.js"></script>
		<script>
			//ท่อส่ง
			ilayer = 'Pipe_Main';
			ilayerfile = './json/waternetwork/pipe_main.json';
			ilayerobject = ilayer;
			ifillcolor = '';
			istrokecolor = 'rgba(219, 137, 103, 1)';
			istrokewidth = 2.5;
			izIndex = 2;
			ilinedash = '0, 0, 0';
			ilabel = ''
			choose_active([ilayer])
			geojson_vt(ilayer, ilayerfile, ilayerobject, ifillcolor, istrokecolor, istrokewidth, ilinedash, ilabel, izIndex, );

			//พื้นที่ศึกษา
			ilayer = 'StudyArea';
			ilayerfile = './json/studyarea/' + ilayer + '.json';
			ifont = 'Bold 18px Sriracha,sans-serif';
			itextfillcolor = 'rgba(0, 0, 0, 1)';
			itextstrokecolor = 'rgba(255, 255, 255)';
			itextstrokewidth = 4
			ifillcolor = 'rgba(0, 0, 0, 0)';
			istrokecolor = 'rgba(255, 0, 0, 1)';
			istrokewidth = 1.5;
			ilinedash = '0, 0, 0';
			topojson_label(ilayer, ilayerfile, ifont, itextfillcolor, itextstrokecolor, itextstrokewidth, ifillcolor, istrokecolor, istrokewidth, ilinedash);

			console.log(position_label)
			Object.entries(position_label).forEach((k, v) => {
				measureTooltipElement = document.createElement('div');
				let txt = document.createElement('p');
				
				measureTooltipElement.className = 'tooltip-info';
				<?php
				if ($_GET['type']) {
					if ($_GET['type'] == 'reservoir') {
				?>
						txts = ""
						txts += "V : " + k[1][3] + " m³<br>"
						txts += "% : " + k[1][4] + "<br>"
						txt.innerHTML = txts;
					<?php
					} else if ($_GET['type'] == 'flow') {
					?>
						txts = ""
						txts += "wl : " + k[1][3] + " MSL<br>"
						txts += "discharge : " + k[1][4] + " m³/s<br>"
						txt.innerHTML = txts;
					<?php
					} else if ($_GET['type'] == 'rain') {
					?>
						txts = ""
						txts += "rain : " + k[1][3] + " mm<br>"
						txt.innerHTML = txts;
					<?php
					} else if ($_GET['type'] == 'wq') {
					?>
						let txts = ""
						txts += "Sal : " + k[1][3] + " g/l<br>"
						txts += "ec : " + k[1][4] + " µS/cm<br>"
						txts += "do : " + k[1][5] + " mg/l<br>"
						txts += "pH : " + k[1][6] + " pH<br>"
						txts += "tds : " + k[1][7] + " mg/l<br>"
						txts += "temp : " + k[1][8] + " °C<br>"
						txt.innerHTML = txts;
					<?php
					} else if ($_GET['type'] == 'pump') {
					?>
						let txts = ""
						txts += "flow : " + k[1][3] + " m³<br>"
						txt.innerHTML = txts;
					<?php
					} else if ($_GET['type'] == 'tele') {
					?>
						let txts = ""
						txts += "rain : " + k[1][3] + " mm<br>"
						txt.innerHTML = txts;
					<?php
					} else if ($_GET['type'] == 'customer') {
					?>
						console.log(k)
						let txts = ""
						txts += "wateruse  : " + k[1][3] + " m³<br>"
						txt.innerHTML = txts;
				<?php
					}
				}
				?>
				console.log(k[0])
				measureTooltipElement.appendChild(txt)
				measureTooltip = new ol.Overlay({
					element: measureTooltipElement,
					offset: [0, 0],
					positioning: 'bottom-center'
				});
				let d = k[1]
				measureTooltip.setPosition(ol.proj.fromLonLat([d[0] - 0.0, (d[1] + 0.1)]))
				map.addOverlay(measureTooltip);
			})


			function GoToPosition(name, type = 'reservoir', data = []) {
				/*
				map.getView().animate({
				    center: ol.proj.transform([parseFloat(position_label[name][0]), parseFloat(position_label[name][1])], 'EPSG:4326', 'EPSG:3857'),
				    duration: 1000,
				    zoom: 12
				});
				if(type == 'reservoir') {
				  $('#dialog_map').empty();
				  $('#dialog_map').css('display','block');
				  $('#dialog_map').css('transform','scale(1)');
				  let txt = "";
				  txt += "<h4>สรุปสถานการณ์น้ำอ่างเก็บน้ำ "+data[0]+"</h4>";
				  txt += "<hr>";
				  txt += "<p>ปริมาตรน้ำในอ่าง : "+data[1]+" ล้าน ลบ.ม.</p>";
				  txt += "<p>ร้อยละ : "+data[2]+" %</p>";
				  txt += "<p>ปริมาณน้ำไหลเข้า : "+data[3]+" ล้าน ลบ.ม.</p>";
				  txt += "<p>ปริมาณน้ำระบาย : "+data[4]+" ล้าน ลบ.ม.</p>";
				  $('#dialog_map').append(txt)
				}else if(type == 'flow') {
				  $('#dialog_map').empty();
				  $('#dialog_map').css('display','block');
				  $('#dialog_map').css('transform','scale(1)');
				  let txt = "";
				  txt += "<h4>สรุปสถานการณ์น้ำปริมาณน้ำท่าสถานี "+data[0]+"</h4>";
				  txt += "<hr>";
				  txt += "<p>ระดับน้ำ  : "+data[1]+" ม.รทก.</p>";
				  txt += "<p>ปริมาณน้ำ : "+data[2]+" ลบ.ม./วินาที</p>";
				  $('#dialog_map').append(txt)
				}else if(type == 'rain') {
				  $('#dialog_map').empty();
				  $('#dialog_map').css('display','block');
				  $('#dialog_map').css('transform','scale(1)');
				  let txt = "";
				  txt += "<h4>สรุปสถานการณ์น้ำปริมาณน้ำฝนสถานี "+data[0]+"</h4>";
				  txt += "<hr>";
				  txt += "<p>ปริมาณน้ำฝน : "+data[1]+" มม.</p>";
				  $('#dialog_map').append(txt)
				}else if(type == 'wq') {
				  $('#dialog_map').empty();
				  $('#dialog_map').css('display','block');
				  $('#dialog_map').css('transform','scale(1)');
				  let txt = "";
				  txt += "<h4>สรุปสถานการณ์น้ำคุณภาพน้ำสถานี "+data[0]+"</h4>";
				  txt += "<hr>";
				  txt += "<p>ความเค็ม : "+data[1]+" ก./ล.</p>";
				  txt += "<p>ค่าการนำไฟฟ้า : "+data[2]+" ไมโครซีเมนส์/เซนติเมตร</p>";
				  txt += "<p>ออกซิเจนในน้ำ : "+data[3]+" ก./ล.</p>";
				  txt += "<p>กรด-ด่าง : "+data[4]+" pH</p>";
				  txt += "<p>ของแข็งละลายน้ำ : "+data[5]+" ก./ล.</p>";
				  txt += "<p>อุณหภูมิ : "+data[6]+" องศา</p>";
				  $('#dialog_map').append(txt)
				}else if(type == 'pump') {
				  $('#dialog_map').empty();
				  $('#dialog_map').css('display','block');
				  $('#dialog_map').css('transform','scale(1)');
				  let txt = "";
				  txt += "<h4>สรุปสถานการณ์น้ำสถานีสูบน้ำ "+data[0]+"</h4>";
				  txt += "<hr>";
				  txt += "<p>ปริมาณการสูบ : "+data[1]+" ลบ.ม.</p>";
				  $('#dialog_map').append(txt)
				}else if(type == 'customer') {
				  $('#dialog_map').empty();
				  $('#dialog_map').css('display','block');
				  $('#dialog_map').css('transform','scale(1)');
				  let txt = "";
				  txt += "<h4>สรุปสถานการณ์น้ำการใช้น้ำลูกค้า "+data[0]+"</h4>";
				  txt += "<hr>";
				  txt += "<p>ปริมาณการใช้น้ำ : "+data[1]+" ลบ.ม.</p>";
				  $('#dialog_map').append(txt)
				}else if(type == 'tele') {
				  $('#dialog_map').empty();
				  $('#dialog_map').css('display','block');
				  $('#dialog_map').css('transform','scale(1)');
				  let txt = "";
				  txt += "<h4>"+data[0]+"</h4>";
				  txt += "<hr>";
				  txt += "<p>ระดับน้ำ : "+data[1]+" ลบ.ม.</p>";
				  txt += "<p>ปริมาณน้ำ : "+data[2]+" ลบ.ม./วินาที</p>";
				  txt += "<p>ปริมาณน้ำฝน : "+data[3]+" มม.</p>";
				  $('#dialog_map').append(txt)
				}
				*/
				console.error('disabled function')
			}
		</script>
		<?php
		if ($_GET['type']) {
			if ($_GET['type'] == 'reservoir') {
		?>

				<script>
					//อ่างเก็บน้ำหลัก
					choose_active(['resorvoir'])
					ilayer = 'Reservoir_Main';
					ilayerfile = './json/waternetwork/reservoir_main.geojson';
					iconfile = './img/reservoir.png';
					iconscale = 24 / 60;
					ilabel = 'Reservoir_Name_T'
					point_label(ilayer, ilayerfile, iconfile, 'Reservoir_Main', iconscale, 'Reservoir_Name_T');

					//อ่างเก็บน้ำรอง
					ilayer = 'Reservoir_Reserv';
					ilayerfile = './json/waternetwork/reservoir_reserv.geojson';
					iconfile = './img/diversion_dam.png';
					iconscale = 20 / 85;
					ilabel = 'Reservoir_Reserv'
					point_label(ilayer, ilayerfile, iconfile, 'Reservoir_Reserv', iconscale, 'Reservoir_Name_T');
				</script>
			<?php
			} else if ($_GET['type'] == 'flow') {
			?>

				<script>
					ilayer = 'Level_Station';
					ilayerfile = './json/data_index/flow_station.geojson';
					iconfile = './img/Level_Station.png';
					iconscale = 14 / 12;
					choose_active([ilayer])
					point_label(ilayer, ilayerfile, iconfile, 'resorvoir', iconscale, 'Level_Station_Code');
				</script>
			<?php
			} else if ($_GET['type'] == 'rain') {
			?>

				<script>
					ilayer = 'Rain_Station';
					ilayerfile = './json/data_index/rain_station.geojson';
					iconfile = './img/Rain_Station.png';
					iconscale = 12 / 12;
					choose_active([ilayer])
					point_label(ilayer, ilayerfile, iconfile, 'resorvoir', iconscale, 'sta_code');
				</script>
			<?php
			} else if ($_GET['type'] == 'wq') {
			?>

				<script>
					ilayer = 'Waterquality_Station';
					ilayerfile = './json/data_index/wq_station.geojson';
					iconfile = './img/wq_station.png';
					iconscale = 28 / 29;
					choose_active([ilayer])
					point_label(ilayer, ilayerfile, iconfile, 'resorvoir', iconscale, 'Waterquality_Station_Code');
				</script>
			<?php
			} else if ($_GET['type'] == 'pump') {
			?>

				<script>
					ilayer = 'pump_station';
					ilayerfile = './json/data_index/pump_station.geojson';
					iconfile = './img/pump2.png';
					iconscale = 20 / 24;
					choose_active([ilayer])
					point_label(ilayer, ilayerfile, iconfile, 'resorvoir', iconscale, 'Name');
				</script>
			<?php
			} else if ($_GET['type'] == 'customer') {
			?>

				<script>
					ilayer = 'Customer';
					ilayerfile = './json/data_index/customer.geojson';
					iconfile = './img/customer.png';
					iconscale = 4 / 100;
					point_label(ilayer, ilayerfile, iconfile, 'customer', iconscale, '');

					map.on('moveend', function(e) {
						map.removeLayer(map.getLayers()['array_'][map.getLayers()['array_'].length-1])
						if(map.getView().getZoom() >= 12){
							point_label(ilayer, ilayerfile, iconfile, 'customer', iconscale, 'name');
						}else{
							point_label(ilayer, ilayerfile, iconfile, 'customer', iconscale, '');
						}
					});

				</script>
			<?php
			} else if ($_GET['type'] == 'tele') {
			?>

				<script>
					ilayer = 'Tele_Station';
					ilayerfile = './json/data_index/tele_station.geojson';
					iconfile = './img/tele_station.png';
					iconscale = 10 / 200;
					choose_active([ilayer])
					point_label(ilayer, ilayerfile, iconfile, 'resorvoir', iconscale, 'sta_code');
				</script>
			<?php
			}
		} else {
			?>
			<script>
				//อ่างเก็บน้ำหลัก
				choose_active(['resorvoir'])
				ilayer = 'Reservoir_Main';
				ilayerfile = './json/waternetwork/reservoir_main.geojson';
				iconfile = './img/reservoir.png';
				iconscale = 24 / 60;
				ilabel = 'Reservoir_Name_T'
				point_label(ilayer, ilayerfile, iconfile, 'resorvoir', iconscale, 'Reservoir_Name_T');

				//อ่างเก็บน้ำรอง
				ilayer = 'Reservoir_Reserv';
				ilayerfile = './json/waternetwork/reservoir_reserv.geojson';
				iconfile = './img/diversion_dam.png';
				iconscale = 20 / 85;
				ilabel = 'Reservoir_Reserv'
				point_label(ilayer, ilayerfile, iconfile, 'resorvoir', iconscale, 'Reservoir_Name_T');
			</script>

		<?php
		}
		?>



</body>

</html>
