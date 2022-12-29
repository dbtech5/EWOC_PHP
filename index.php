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
			width: 98%;

		}
    tr:nth-child(odd) {
      background-color: #DDD !important;
    }
    tr:nth-child(even) {
      background-color: #FFF !important;
    }

		td {
			padding: 5px 8px;
			text-align: center;
			font-size: 10px;
			border:1px solid #ddd;
		}
    td:nth-child(2),td:nth-child(3),td:nth-child(4) {
      text-align: left;
    }

    tr:nth-child(1) {
			border-radius: 25px;
			color: #FFF;
			background-color: #0B2B4C !important;
		}

    tr:nth-child(1) > td:nth-child(2),tr:nth-child(1) > td:nth-child(3),tr:nth-child(1) > td:nth-child(4) {
      text-align: center !important;
    }

		.sub-menu {
			margin-bottom: 20px;
			width: 100%;

		}
		.sub-menu > a {
			width: 14.2%;
			background-color: #0B2B4C;
			padding: 10px 25px;
			color: #FFF;
			font-size: 12px;
			border-radius: 15px;
			font-family: 'Prompt', sans-serif;
      cursor: pointer;
		}
  	.sub-menu > a:hover {
      background-color: #000;
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
            <h3 class="header-content">รายงานสถาการณ์น้ำ</h3>
              <div id="content">
  							<!-- Page Content  -->
  							<!-- tooltip style -->
  							<style>
  								canvas {
  									width: 97% !important;
  									height: 82% !important;
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


  							<div id="mouse-position" class="text-right" ></div>
  						</div>
            </div>

					<div>
					<center>


          <script>
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

					<div id="reservoir-canvas">
            <div class='sub-menu'>
              <a href="index.php?type=reservoir">อ่างเก็บน้ำ</a>
              <a href="index.php?type=flow">ปริมาณน้ำท่า</a>
              <a href="index.php?type=rain">ปริมาณน้ำฝน</a>
              <a href="index.php?type=wq">คุณภาพน้ำ</a>
              <a href="index.php?type=pump">สถานีสูบน้ำ</a>
              <a href="index.php?type=customer">การใช้น้ำลูกค้า</a>
              <a href="index.php?type=tele">โทรมาตร</a>
            </div>
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

              <script>
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
												if($k==1){
													$k = 0;
													$f_d = explode('-',$row_s['date']);
													echo 'document.getElementsByClassName("header-content")[0].innerHTML="รายงานสถานการณ์น้ำข้อมูลอ่างเก็บน้ำวันที่ '.$f_d[2].' "+parttern_label["'.$f_d[1].'"]+" '.((int)$f_d[0]+543).'";';
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
                <script>
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
                          if($k==1){
														$k = 0;
														$f_d = explode('-',$row_s['date']);
														echo 'document.getElementsByClassName("header-content")[0].innerHTML="รายงานสถานการณ์ข้อมูลน้ำท่าวันที่ '.$f_d[2].' "+parttern_label["'.$f_d[1].'"]+" '.((int)$f_d[0]+543).'";';
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
														echo "<td>".$row['sta_code']."</td>";
														echo "<td>".$row['river']."</td>";
														echo "<td>".$row['site']."</td>";
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
                <script>
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
                          if($k==1){
  													$k = 0;
  													$f_d = explode('-',$row_s['date']);
  													echo 'document.getElementsByClassName("header-content")[0].innerHTML="รายงานสถานการณ์สถานีน้ำฝนวันที่ '.$f_d[2].' "+parttern_label["'.$f_d[1].'"]+" '.((int)$f_d[0]+543).'";';
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
                <script>
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
                          if($k==1){
  													$k = 0;
  													$f_d = explode('-',explode(' ',$row_s['date_time'])[0]);
  													echo 'document.getElementsByClassName("header-content")[0].innerHTML="รายงานสถานการณ์คุณภาพน้ำวันที่ '.$f_d[2].' "+parttern_label["'.$f_d[1].'"]+" '.((int)$f_d[0]+543).'";';
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
                <script>
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
                          if($k==1){
  													$k = 0;
  													$f_d = explode('-',$row_s['date']);
  													echo 'document.getElementsByClassName("header-content")[0].innerHTML="รายงานสถานการณ์สถานีสูบน้ำวันที่ '.$f_d[2].' "+parttern_label["'.$f_d[1].'"]+" '.((int)$f_d[0]+543).'";';
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
                <script>
                <?php
                  $sql_s = "SELECT * FROM `customer_info` ORDER BY `no`";
                  $result_s = $conn->query($sql_s);
                  $k = 1;
                  $r = 0;
                  if ($result_s->num_rows > 0) {
                    while($row = $result_s->fetch_assoc()) {
                      $sql = "SELECT * FROM `customer_wateruse` WHERE customer_code ='".$row['customer_code']."' LIMIT 1";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while($row_s = $result->fetch_assoc()) {
                          if($k==1){
                            $k = 0;
                            $f_d = explode('-',$row_s['date']);
                            echo 'document.getElementsByClassName("header-content")[0].innerHTML="รายงานสถานการณ์การใช้น้ำลูกค้าวันที่ '.$f_d[2].' "+parttern_label["'.$f_d[1].'"]+" '.((int)$f_d[0]+543).'";';
                          }
                          $r += 1;
                        }
                      }
                    }
                  }
                ?>
                </script>
							<?php
							}else if($_GET['type']=='tele'){
								$sql_s = "SELECT * FROM `tele_info`";
							?>
              <script>
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
                        if($k==1){
													$k = 0;
													$f_d = explode('-',explode(' ',$row_s['date_time'])[0]);
													echo 'document.getElementsByClassName("header-content")[0].innerHTML="รายงานสถานการณ์สถานีโทรมาตรวันที่ '.$f_d[2].' "+parttern_label["'.$f_d[1].'"]+" '.((int)$f_d[0]+543).'";';
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
              <script>
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
                        if($k==1){
                          $k = 0;
                          $f_d = explode('-',$row_s['date']);
                          echo 'document.getElementsByClassName("header-content")[0].innerHTML="รายงานสถานการณ์น้ำข้อมูลอ่างเก็บน้ำวันที่ '.$f_d[2].' "+parttern_label["'.$f_d[1].'"]+" '.((int)$f_d[0]+543).'";';
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
    geojson_vt(ilayer, ilayerfile, ilayerobject, ifillcolor, istrokecolor, istrokewidth, ilinedash,ilabel,izIndex,);

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


  </script>
  <?php
  if($_GET['type']){
    if($_GET['type']=='reservoir'){
    ?>

    <script>
    //อ่างเก็บน้ำหลัก
    choose_active(['resorvoir'])
    ilayer = 'Reservoir_Main';
    ilayerfile = './json/waternetwork/reservoir_main.geojson';
    iconfile = './img/reservoir.png';
    iconscale = 24 / 60;
    ilabel = 'Reservoir_Name_T'
    point_label(ilayer, ilayerfile, iconfile, 'resorvoir', iconscale,'Reservoir_Name_T');

    //อ่างเก็บน้ำรอง
    ilayer = 'Reservoir_Reserv';
    ilayerfile = './json/waternetwork/reservoir_reserv.geojson';
    iconfile = './img/diversion_dam.png';
    iconscale = 20 / 85;
    ilabel = 'Reservoir_Reserv'
    point_label(ilayer, ilayerfile, iconfile, 'resorvoir', iconscale,'Reservoir_Name_T');


    </script>
  <?php
  }else if($_GET['type']=='flow'){
  ?>

  <script>
    ilayer = 'Level_Station';
    ilayerfile = './json/data_index/flow_station.geojson';
    iconfile = './img/Level_Station.png';
    iconscale = 14 / 12;
    choose_active([ilayer])
    point_label(ilayer, ilayerfile, iconfile, 'resorvoir', iconscale,'Level_Station_Code');
  </script>
  <?php
  }else if($_GET['type']=='rain'){
  ?>

  <script>
    ilayer = 'Rain_Station';
    ilayerfile = './json/data_index/rain_station.geojson';
    iconfile = './img/Rain_Station.png';
    iconscale = 12 / 12;
    choose_active([ilayer])
    point_label(ilayer, ilayerfile, iconfile, 'resorvoir', iconscale,'sta_code');
  </script>
  <?php
  }else if($_GET['type']=='wq'){
  ?>

  <script>
    ilayer = 'Waterquality_Station';
    ilayerfile = './json/data_index/wq_station.geojson';
    iconfile = './img/wq_station.png';
    iconscale = 28 / 29;
    choose_active([ilayer])
    point_label(ilayer, ilayerfile, iconfile, 'resorvoir', iconscale,'Waterquality_Station_Code');
  </script>
  <?php
  }else if($_GET['type']=='pump'){
  ?>

  <script>
    ilayer = 'pump_station';
    ilayerfile = './json/data_index/pump_station.geojson';
    iconfile = './img/pump2.png';
    iconscale = 20 / 24;
    choose_active([ilayer])
    point_label(ilayer, ilayerfile, iconfile, 'resorvoir', iconscale,'กปภ_');
  </script>
  <?php
  }else if($_GET['type']=='customer'){
  ?>

  <script>
    ilayer = 'Customer';
    ilayerfile = './json/data_index/customer.geojson';
    iconfile = './img/customer.png';
    iconscale = 4 / 100;
    choose_active([ilayer])
    point_label(ilayer, ilayerfile, iconfile, 'resorvoir', iconscale,'name');
  </script>
  <?php
  }else if($_GET['type']=='tele'){
  ?>

  <script>
    ilayer = 'Tele_Station';
    ilayerfile = './json/data_index/tele_station.geojson';
    iconfile = './img/tele_station.png';
    iconscale = 10 / 200;
    choose_active([ilayer])
    point_label(ilayer, ilayerfile, iconfile, 'resorvoir', iconscale,'sta_code');
  </script>
  <?php
  }
}else{
  ?>
  <script>
  //อ่างเก็บน้ำหลัก
  choose_active(['resorvoir'])
  ilayer = 'Reservoir_Main';
  ilayerfile = './json/waternetwork/reservoir_main.geojson';
  iconfile = './img/reservoir.png';
  iconscale = 24 / 60;
  ilabel = 'Reservoir_Name_T'
  point_label(ilayer, ilayerfile, iconfile, 'resorvoir', iconscale,'Reservoir_Name_T');

  //อ่างเก็บน้ำรอง
  ilayer = 'Reservoir_Reserv';
  ilayerfile = './json/waternetwork/reservoir_reserv.geojson';
  iconfile = './img/diversion_dam.png';
  iconscale = 20 / 85;
  ilabel = 'Reservoir_Reserv'
  point_label(ilayer, ilayerfile, iconfile, 'resorvoir', iconscale,'Reservoir_Name_T');


  </script>

  <?php
}
  ?>



</body>

</html>
