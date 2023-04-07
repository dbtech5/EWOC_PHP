
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
		   	<div class="Main-container">
				<!-- button fab select menu
				<a id="control-fab">
					<input type="image" style="background-color: Transparent; border: none; margin-left:70%;"
						src='./img/basemap_button_48x48.png' width=38 alt="website" title="website" />
				</a>
				-->

				<!-- Window for Select Menu -->
				<div id="base-fab-menu">
					<div class="title">
						<a onclick="map_display(false)">
							<i class="fa fa-times" aria-hidden="true" style="top:10px; right:10px; position:absolute;"></i>
						</a>
						<span>Base Map</span>
					</div>
					<br>
					<br>
					<div class="img-base" onclick="change_img(1)">
						<div class="bg-inner" style="background-image: url('./img/base_map/b1.png');"></div>
						<h3>Open Street Map</h3>
					</div>
					<div class="img-base" onclick="change_img(2)">
						<div class="bg-inner" style="background-image: url('./img/base_map/b2.png');"></div>
						<h3>Open Topo Map</h3>
					</div>
					<div class="img-base" onclick="change_img(3)">
						<div class="bg-inner" style="background-image: url('./img/base_map/b3.png');"></div>
						<h3>Google Map</h3>
					</div>
					<div class="img-base" onclick="change_img(4)">
						<div class="bg-inner" style="background-image: url('./img/base_map/b4.png');"></div>
						<h3>Google Street Map</h3>
					</div>
					<div class="img-base" onclick="change_img(5)">
						<div class="bg-inner" style="background-image: url('./img/base_map/b5.png');"></div>
						<h3>Google Terrain</h3>
					</div>
					<div class="img-base" onclick="change_img(6)">
						<div class="bg-inner" style="background-image: url('./img/base_map/b6.png');"></div>
						<h3>ESRI Topo</h3>
					</div>
					<div class="img-base" onclick="change_img(7)">
						<div class="bg-inner" style="background-image: url('./img/base_map/b7.png');"></div>
						<h3>ESRI Imagery</h3>
					</div>
					<div class="img-base" onclick="change_img(8)">
						<div class="bg-inner" style="background-image: url('./img/base_map/b8.png');"></div>
						<h3>ESRI Light Gray</h3>
					</div>
					<div class="img-base" onclick="change_img(9)">
						<div class="bg-inner" style="background-image: url('./img/base_map/b9.png');"></div>
						<h3>ดาวเทียมไทยโชต</h3>
					</div>
					<div class="img-base" onclick="change_img(10)">
						<div class="bg-inner" style="background-image: url('./img/base_map/b10.png');"></div>
						<h3>Terrain</h3>
					</div>
					<div class="img-base" onclick="change_img(11)">
						<div class="bg-inner" style="background-image: url('./img/base_map/b11.png');"></div>
						<h3>Toner BW</h3>
					</div>
					<div class="img-base" onclick="change_img(12)">
						<div class="bg-inner" style="background-image: url('./img/base_map/b12.png');"></div>
						<h3>ไม่แสดง</h3>
					</div>
				</div>

				<!-- Sidebar  -->
				<nav id="sidebar">
					<div class="scrollbar-inner" style="overflow-x: hidden !important;">
						<!-- <div class="sidebar-header">
							<button id="menu">รายการข้อมูล</button>
						</div> -->
						<form id="map_filters" name="map_filters">
							<!-- <a href="javascript:void(0)" id="closebtn" name="closebtn">X</a> -->
							<a href="javascript:void(0)" id="closebtn" name="closebtn">
								<i class="fa fa-times" aria-hidden="true" style="top:10px; right:10px; position:absolute;"></i>
							</a>

							<ul class="list-unstyled components">
								<!--  ข้อมูลพื้นฐาน -->
								<li>
									<div class="panel-component">
										<div class="panel-heading">
											<a href="#BasicInfoSubmenu" data-toggle="collapse" aria-expanded="false"
												class="dropdown-toggle">
												<!--i class="fas fa-info-circle section-icon"--></i><img src=./img/basicinfo.png
													style="width:20px; margin-right:5px;">ข้อมูลพื้นฐาน
											</a>
										</div>
										<ul class="collapse list-unstyled" id="BasicInfoSubmenu">

											<!-- พื้นที่ศึกษา -->
											<li>
												<div class="material-switch">
													<input type="checkbox" id="StudyArea" name="StudyArea"
														class="switch-input" />
													<!-- class="switch-input rainprediction-switch" /> -->
													<label for="StudyArea" class="switch-label">พื้นที่ศึกษา</label>
												</div>
												<div class="filter_info">
													<div class="row">
														<div class="col-lg-2"></div>
														<div class="col-lg-10">
															<a href="./img/legend/legend-Rain_Prediction-large2.png"
																data-lightbox="legend-rainprediction"
																data-title="สัญลักษณ์ Rainfall Prediction"><img
																	src="./img/legend/legend-Rain_Prediction1.png" width="200"
																	style="margin-left:-30px;" /></a>
														</div>
													</div>
												</div>
											</li>

											<!-- ขอบเขตการปกครอง -->
											<li>
												<div class="material-switch">
													<input type="checkbox" id="Admin_group" name="Admin_group"
														class="switch-input">
													<label for="Admin_group" class="switch-label">การปกครอง</label>
												</div>
												<div class="filter_info">
													<ul class="sub-filter list-unstyled">

														<!-- จังหวัด -->
														<li class="row">
															<div class="col-lg-2" style="padding-top:4px;">
																<div class="round">
																	<input type="checkbox" id="Province" name="Province"
																		class="admin_checkbox layer-PROV_NAM_T" />
																	<label for="Province"></label>
																</div>
															</div>
															<div class="sub-filter-text col-lg-10">จังหวัด</div>
														</li>

														<!-- อำเภอ -->
														<li class="row">
															<div class="col-lg-2" style="padding-top:4px;">
																<div class="round">
																	<input type="checkbox" id="District" name="District"
																		class="admin_checkbox" />
																	<label for="District"></label>
																</div>
															</div>
															<div class="sub-filter-text col-lg-10">อำเภอ</div>
														</li>

														<!-- ตำบล -->
														<li class="row">
															<div class="col-lg-2" style="padding-top:4px;">
																<div class="round">
																	<input type="checkbox" id="SubDistrict" name="SubDistrict"
																		class="admin_checkbox" />
																	<label for="SubDistrict"></label>
																</div>
															</div>
															<div class="sub-filter-text col-lg-10">ตำบล</div>
														</li>
													</ul>
												</div>
											</li>

											<!-- ทรัพยากรน้ำ -->
											<li>
												<div class="material-switch">
													<input type="checkbox" id="River_group" name="River_group"
														class="switch-input">
													<label for="River_group" class="switch-label">ทรัพยากรน้ำ</label>
												</div>
												<div class="filter_info">
													<ul class="sub-filter list-unstyled">

														<!-- ลำน้ำ -->
														<li class="row">
															<div class="col-lg-2" style="padding-top:4px;">
																<div class="round">
																	<input type="checkbox" id="River" name="River"
																		class="river_checkbox" />
																	<label for="River"></label>
																</div>
															</div>
															<div class="sub-filter-text col-lg-10">ลำน้ำ</div>
														</li>

														<!-- แหล่งน้ำ -->
														<li class="row">
															<div class="col-lg-2" style="padding-top:4px;">
																<div class="round">
																	<input type="checkbox" id="Waterbody" name="Waterbody"
																		class="river_checkbox" />
																	<label for="Waterbody"></label>
																</div>
															</div>
															<div class="sub-filter-text col-lg-10">แหล่งน้ำ</div>
														</li>
													</ul>
												</div>
											</li>

											<!-- เส้นทางคมนาคม -->
											<li>
												<div class="material-switch">
													<input type="checkbox" id="Trans_group" name="Trans_group"
														class="switch-input">
													<label for="Trans_group" class="switch-label">เส้นทางคมนาคม</label>
												</div>
												<div class="filter_info">
													<ul class="sub-filter list-unstyled">

														<!-- ถนน -->
														<li class="row">
															<div class="col-lg-2" style="padding-top:4px;">
																<div class="round">
																	<input type="checkbox" id="Road" name="Road"
																		class="trans_checkbox" />
																	<label for="Road"></label>
																</div>
															</div>
															<div class="sub-filter-text col-lg-10">ถนน</div>
														</li>

														<!-- ทางรถไฟ -->
														<li class="row">
															<div class="col-lg-2" style="padding-top:4px;">
																<div class="round">
																	<input type="checkbox" id="Railway" name="Railway"
																		class="trans_checkbox" />
																	<label for="Railway"></label>
																</div>
															</div>
															<div class="sub-filter-text col-lg-10">ทางรถไฟ</div>
														</li>

														<!-- สถานีคมนาคม -->
														<li class="row">
															<div class="col-lg-2" style="padding-top:4px;">
																<div class="round">
																	<input type="checkbox" id="Trans_Station" name="Trans_Station"
																		class="trans_checkbox" />
																	<label for="Trans_Station"></label>
																</div>
															</div>
															<div class="sub-filter-text col-lg-10">สถานีคมนาคม</div>
														</li>
													</ul>
												</div>
											</li>
										</ul>
									</div>
								</li>

								<!-- โครงข่ายระบบแหล่งน้ำ -->
								<li>
									<div class="panel-component">
										<div class="panel-heading">
											<a href="#WaterNetworkSubmenu" id="WaterNetworkCat" data-toggle="collapse"
												aria-expanded="false" class="dropdown-toggle">
												<!--i class="fas fa-water section-icon"></i--> <img src=./img/natural.png
													style="width:20px; margin-right:5px;">โครงข่ายระบบแหล่งน้ำ
											</a>
										</div>
										<ul class="collapse list-unstyled" id="WaterNetworkSubmenu">

											<!-- แหล่งน้ำต้นทุน -->
											<li>
												<div class="material-switch">
													<input type="checkbox" id="Watersource_group" name="Watersource_group"
														class="switch-input" >
													<label for="Watersource_group" class="switch-label">แหล่งน้ำต้นทุน</label>
												</div>
												<div class="filter_info">
													<ul class="sub-filter list-unstyled">

														<!-- อ่างเก็บน้ำ (หลัก) -->
														<li class="row">
															<div class="col-lg-2" style="padding-top:4px;">
																<div class="round">
																	<input type="checkbox" id="reservoir" name="reservoir"
																		class="watersource_checkbox layer-reservoir" />
																	<label for="reservoir"></label>
																</div>
															</div>
															<div class="sub-filter-text col-lg-10">อ่างเก็บน้ำ</div>
														</li>

													</ul>
												</div>
											</li>

											<!-- ท่อส่งน้ำ -->
											<li>
												<div class="material-switch">
													<input type="checkbox" id="Pipe_group" name="Pipe_group"
														class="switch-input">
													<label for="Pipe_group" class="switch-label">ท่อส่งน้ำ</label>
												</div>

												<div class="filter_info">
													<ul class="sub-filter list-unstyled">

														<!-- pipe EW -->
														<li class="row">
															<div class="col-lg-2" style="padding-top:4px;">
																<div class="round">
																	<input type="checkbox" id="Pipe_Main" name="Pipe_Main"
																		class="pipe_checkbox" />
																	<label for="Pipe_Main"></label>
																</div>
															</div>
															<div class="sub-filter-text col-lg-10">ท่อส่งน้ำ East Water</div>
														</li>

														<!-- ท่อคลองหลวง -->
														<li class="row">
															<div class="col-lg-2" style="padding-top:4px;">
																<div class="round">
																	<input type="checkbox" id="Pipe_Klongluang"
																		name="Pipe_Klongluang" class="pipe_checkbox" />
																	<label for="Pipe_Klongluang"></label>
																</div>
															</div>
															<div class="sub-filter-text col-lg-10">ท่อคลองหลวง</div>
														</li>

														<!-- ท่อคลองพระองค์ไชยานุชิต -->
														<!-- <li class="row">
															<div class="col-lg-2" style="padding-top:4px;">
																<div class="round">
																	<input type="checkbox" id="pipe_klongphraong"
																		name="pipe_klongphraong" class="pipe_checkbox" />
																	<label for="pipe_klongphraong"></label>
																</div>
															</div>
															<div class="sub-filter-text col-lg-10">ท่อคลองพระองค์ไชยานุชิต
															</div>
														</li> -->

														<!-- ท่อคลองสะพาน-อ่างประแสร์ -->
														<!-- <li class="row">
															<div class="col-lg-2" style="padding-top:4px;">
																<div class="round">
																	<input type="checkbox" id="pipe_klongsaphan-prasae"
																		name="pipe_klongsaphan-prasae" class="pipe_checkbox" />
																	<label for="pipe_klongsaphan-prasae"></label>
																</div>
															</div>
															<div class="sub-filter-text col-lg-10">ท่อคลองสะพาน-อ่างประแสร์</div>
														</li> -->

														<!-- ท่อประแสร์-คลองใหญ่ -->
														<!-- <li class="row">
															<div class="col-lg-2" style="padding-top:4px;">
																<div class="round">
																	<input type="checkbox" id="pipe_prasae-klongyai"
																		name="pipe_prasae-klongyai" class="pipe_checkbox" />
																	<label for="pipe_prasae-klongyai"></label>
																</div>
															</div>
															<div class="sub-filter-text col-lg-10">ท่อประแสร์-คลองใหญ่</div>
														</li> -->

														<!-- ท่อส่งน้ำ คลองวังโตนด -->
														<!-- <li class="row">
															<div class="col-lg-2" style="padding-top:4px;">
																<div class="round">
																	<input type="checkbox" id="pipe_wangtanod"
																		name="pipe_wangtanod" class="pipe_checkbox" />
																	<label for="pipe_wangtanod"></label>
																</div>
															</div>
															<div class="sub-filter-text col-lg-10">ท่อคลองวังโตนด</div>
														</li> -->
													</ul>
												</div>
											</li>

											<!-- สถานีสูบน้ำ -->
											<li>
												<div class="material-switch">
													<input type="checkbox" id="Pump_group" name="Pump_group"
														class="switch-input">
													<label for="Pump_group" class="switch-label">สถานีสูบน้ำ</label>
												</div>
												<div class="filter_info">
													<ul class="sub-filter list-unstyled">

														<!-- สถานีสูบน้ำ (หลัก) -->
														<li class="row">
															<div class="col-lg-2" style="padding-top:4px;">
																<div class="round">
																	<input type="checkbox" id="Pump_Main" name="Pump_Main"
																		class="pump_checkbox" />
																	<label for="Pump_Main"></label>
																</div>
															</div>
															<div class="sub-filter-text col-lg-10">สถานีสูบน้ำ (หลัก)</div>
														</li>

														<!-- สถานีสูบน้ำ (รอง) -->
														<li class="row">
															<div class="col-lg-2" style="padding-top:4px;">
																<div class="round">
																	<input type="checkbox" id="Pump_Minor" name="Pump_Minor"
																		class="pump_checkbox" />
																	<label for="Pump_Minor"></label>
																</div>
															</div>
															<div class="sub-filter-text col-lg-10">สถานีสูบน้ำ (รอง)</div>
														</li>

													</ul>
												</div>
											</li>

										</ul>
									</div>
								</li>

								<!-- ข้อมูลสนับสนุน -->
								<li>
									<div class="panel-component">
										<div class="panel-heading">
											<a href="#SupportSubmenu" id="Support-filter" data-toggle="collapse"
												aria-expanded="false" class="dropdown-toggle">
												<img src=./img/support.png
													style="width:20px; margin-right:5px;">ข้อมูลสนับสนุน</a>
										</div>
										<ul class="collapse list-unstyled" id="SupportSubmenu">

											<!-- ลูกค้า -->
											<li>
												<div class="material-switch">
													<input type="checkbox" id="Customer_group" name="Customer_group"
														class="switch-input">
													<label for="Customer_group" class="switch-label">ลูกค้า</label>
												</div>
												<div class="filter_info">
													<ul class="sub-filter list-unstyled">

														<!-- ตำแหน่งลูกค้า -->
														<li class="row">
															<div class="col-lg-2" style="padding-top:4px;">
																<div class="round">
																	<input type="checkbox" id="Customer"
																		name="Customer" class="customer_checkbox"
																		marker-id="Customer" />
																	<label for="Customer"></label>
																</div>
															</div>
															<div class="sub-filter-text col-lg-10">ตำแหน่งลูกค้า</div>
														</li>

													</ul>
												</div>
											</li>

											<!-- สถานีตรวจวัด -->
											<li>
												<div class="material-switch">
													<input type="checkbox" id="Station_group" name="Station_group"
														class="switch-input">
													<label for="Station_group" class="switch-label">สถานีตรวจวัด</label>
												</div>
												<div class="filter_info">
													<ul class="sub-filter list-unstyled">

														<!-- สถานีตรวจอากาศ
														<li class="row">
															<div class="col-lg-2" style="padding-top:4px;">
																<div class="round">
																	<input type="checkbox" id="Weather_Station"
																		name="Weather_Station" class="station_checkbox"
																		marker-id="Weather_Station" />
																	<label for="Weather_Station"></label>
																</div>
															</div>
															<div class="sub-filter-text col-lg-10">สถานีตรวจอากาศ
															</div>
														</li>-->

														<!-- สถานีวัดน้ำฝน -->
														<li class="row">
															<div class="col-lg-2" style="padding-top:4px;">
																<div class="round">
																	<input type="checkbox" id="Rain_Station" name="Rain_Station"
																		class="station_checkbox" marker-id="Rain_Station" />
																	<label for="Rain_Station"></label>
																</div>
															</div>
															<div class="sub-filter-text col-lg-10">สถานีวัดน้ำฝน
															</div>
														</li>

														<!-- สถานีวัดน้ำท่า -->
														<li class="row">
															<div class="col-lg-2" style="padding-top:4px;">
																<div class="round">
																	<input type="checkbox" id="Level_Station"
																		name="Level_Station" class="station_checkbox"
																		marker-id="Level_Station" />
																	<label for="Level_Station"></label>
																</div>
															</div>
															<div class="sub-filter-text col-lg-10">สถานีวัดน้ำท่า</div>
														</li>

														<!-- สถานีวัดคุณภาพน้ำ -->
														<li class="row">
															<div class="col-lg-2" style="padding-top:4px;">
																<div class="round">
																	<input type="checkbox" id="Waterquality_Station"
																		name="Waterquality_Station" class="station_checkbox"
																		marker-id="Waterquality_Station" />
																	<label for="Waterquality_Station"></label>
																</div>
															</div>
															<div class="sub-filter-text col-lg-10">สถานีวัดคุณภาพน้ำ
															</div>
														</li>

														<!-- สถานีระดับน้ำทะเล -->
														<li class="row">
															<div class="col-lg-2" style="padding-top:4px;">
																<div class="round">
																	<input type="checkbox" id="Tide_Station"
																		name="Tide_Station" class="station_checkbox"
																		marker-id="Tide_Station" />
																	<label for="Tide_Station"></label>
																</div>
															</div>
															<div class="sub-filter-text col-lg-10">สถานีระดับน้ำทะเล
															</div>
														</li>

														<!-- สถานีโทรมาตร -->
														<li class="row">
															<div class="col-lg-2" style="padding-top:4px;">
																<div class="round">
																	<input type="checkbox" id="Tele_Station"
																		name="Tele_Station" class="station_checkbox"
																		marker-id="Tele_Station" />
																	<label for="Tele_Station"></label>
																</div>
															</div>
															<div class="sub-filter-text col-lg-10">สถานีโทรมาตร
															</div>
														</li>

														<!-- เส้นชั้นน้ำฝน
														<li class="row">
															<div class="col-lg-2" style="padding-top:4px;">
																<div class="round">
																	<input type="checkbox" id="Isohyet" name="Isohyet"
																		class="station_checkbox" />
																	<label for="Isohyet"></label>
																</div>
															</div>
															<div class="sub-filter-text col-lg-10">เส้นชั้นน้ำฝน</div>
														</li>-->
													</ul>
												</div>
											</li>

											<!-- ระบบประปา -->
											<li>
												<div class="material-switch">
													<input type="checkbox" id="Watersupply_group" name="Watersupply_group"
														class="switch-input">
													<label for="Watersupply_group" class="switch-label">ระบบประปา</label>
												</div>
												<div class="filter_info">
													<ul class="sub-filter list-unstyled">

														<!-- สถานีสูบน้ำ กปภ. -->
														<li class="row">
															<div class="col-lg-2" style="padding-top:4px;">
																<div class="round">
																	<input type="checkbox" id="Pump_PWA"
																		name="Pump_PWA" class="watersupply_checkbox"
																		marker-id="Pump_PWA" />
																	<label for="Pump_PWA"></label>
																</div>
															</div>
															<div class="sub-filter-text col-lg-10">สถานีสูบน้ำ กปภ.</div>
														</li>

														<!-- ท่อน้ำประปา กภป. -->
														<li class="row">
															<div class="col-lg-2" style="padding-top:4px;">
																<div class="round">
																	<input type="checkbox" id="Pipe_PWA"
																		name="Pipe_PWA" class="waterwork_checkbox" />
																	<label for="Pipe_PWA"></label>
																</div>
															</div>
															<div class="sub-filter-text col-lg-10">ท่อน้ำประปา กปภ.</div>
														</li>

													</ul>
												</div>
											</li>


											<!-- ฝนคาดการณ์ -->
											<li>
												<div class="material-switch">
													<input type="checkbox" id="RainPrediction" name="RainPrediction"
														class="switch-input" />
													<!-- class="switch-input rainprediction-switch" /> -->
													<label for="RainPrediction" class="switch-label">ฝนคาดการณ์</label>
												</div>
												<div class="filter_info">
													<div class="row">
														<div class="col-lg-2"></div>
														<div class="col-lg-10">
															<a href="./img/legend/legend-Rain_Prediction-large2.png"
																data-lightbox="legend-rainprediction"
																data-title="สัญลักษณ์ Rainfall Prediction"><img
																	src="./img/legend/legend-Rain_Prediction1.png" width="200"
																	style="margin-left:-30px;" /></a>
														</div>
													</div>
													<div class="row">
														<div class="col-lg-2"></div>
														<div class="col-lg-10 text-muted" style="margin-left:-30px;">
															<a href="http://realearth.ssec.wisc.edu/products/NESDIS-GHE-HourlyRainfall/"
																target="_blank">แหล่งที่มา </a>
														</div>
													</div>
												</div>
											</li>

										</ul>
									</div>
								</li>
							</ul>
							<!--ul class="list-unstyled components"-->
						</form>
						<br>
					</div>
				<!-- div class="scrollbar-inner" -->
				</nav>

				<!--
					<div class="opacity-controls">
						<input type="range" class="opacity-change" id="pipe_EW_ed" min="0" max="2" value="2" step="1"
							onchange="opacity_pipe_EW()">
						<input type="range" class="opacity-change" id="Floodway_ed" min="0" max="2" value="2" step="1"
							onchange="opacity_Floodway()">
						<input type="range" class="opacity-change" id="FloodArea_ed" min="0" max="2" value="2" step="1"
							onchange="opacity_FloodArea()">
						<input type="range" class="opacity-change" id="pipe_wangtanod_ed" min="0" max="2" value="2" step="1"
							onchange="opacity_pipe_wangtanod()">
					</div>
				-->
				<div>
					<div>
						<div>

						</div>
						<!-- content -->
						<div id="content">
							<!-- Page Content  -->
							<!-- tooltip style -->
							<style>
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
	<script type="text/javascript" src="./js/map_controls.js"></script>
	<script type="text/javascript" src="./js/map_layercontrols.js"></script>
	<script type="text/javascript" src="./js/slidbar.js"></script>



	<script>
		// script inside
		var data_storage = []
		var data_storage_inflow = []
        <?php

			include 'connect.php';

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


		filter_data()

		function load_info(e){
			let select = e.value
			console.log(select)
			if(select == "อ่างเก็บน้ำ"){
				filter_data()
			}else if(select == "สถานีสูบน้ำ"){

			}else if(select == "ปริมาณน้ำท่า"){
				filter_data_info()
			}
		}
	</script>
</body>

</html>
