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
		.rotate-north {
			right: 240px;
		}

		.highcharts-figure,
		.highcharts-data-table table {
			min-width: 600px;
			max-width: 800px;
			margin: 1em auto;
		}

		#container-grach {
			height: 200px;
			width: 600px;
		}

		.highcharts-data-table table {
			font-family: Verdana, sans-serif;
			border-collapse: collapse;
			border: 1px solid #ebebeb;
			margin: 10px auto;
			text-align: center;
			width: 500px;
			max-width: 500px;
		}

		.highcharts-data-table caption {
			padding: 1em 0;
			font-size: 1.2em;
			color: #555;
		}

		.highcharts-data-table th {
			font-weight: 600;
			padding: 0.5em;
		}

		.highcharts-data-table td,
		.highcharts-data-table th,
		.highcharts-data-table caption {
			padding: 0.5em;
		}

		.highcharts-data-table thead tr,
		.highcharts-data-table tr:nth-child(even) {
			background: #f8f8f8;
		}

		.highcharts-data-table tr:hover {
			background: #f1f7ff;
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
						<a href="realtime.php" class="tooltip-nav">
							<i class="fa fa-pie-chart"></i>
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
					<a href="realtime.php">
						<div>
							<i class="fa fa-pie-chart"></i>
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
				<div class="flex " style="margin-bottom: 10px;margin-top:10px;">
					<div class="dark-gray pa-md ma-sm" style="width:35%;border-radius:10px;">
						<div class="flex">
							<div style="margin:10px;">
								<img src="./img/diversion_dam.png">
							</div>
							<div style="margin:10px;width: 100px;">
								<p class="size-12">ระดับน้ำ</p>
								<p class="size-12" id="volume">0.18</p>
								<p class="size-12">ม.รทก.</p>
							</div>
							<div style="margin:10px;">
								<p class="size-12">ปริมาณน้ำ</p>
								<p class="size-12">2.60</p>
								<p class="size-12">ล้าน ลบ.ม.</p>
							</div>
						</div>

					</div>
					<figure class="highcharts-figure">
						<div id="container-grach"></div>
					</figure>
				</div>
				<div class="felx">
					<div class="ma-sm left" style="width:38%;">
						<div class="flex dark-gray pa-md" style="height:400px;border-radius:10px;">
							<div style="margin:10px;">
								<img src="./img/diversion_dam.png">
							</div>
							<div>
								<p class="size-12">ปริมาณน้ำ</p>
								<p class="size-12">28.50</p>
								<p class="size-12">ล้าน ลบ.ม.</p>
							</div>
							<div>
								<p class="size-12">ความจุ</p>
								<p class="size-12">28.50%</p>
							</div>
						</div>
					</div>
					<div class="flex-55 right">

						<div id="content">
							<!-- Page Content  -->
							<!-- tooltip style -->
							<style>
								canvas {
									border-radius: 10px;
									width: 70% !important;
									height: 55% !important;
									margin-left: 2% !important;
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


				</div>

				<div id="container-pie" style="position: fixed;width:200px;right:10;bottom:10px;"></div>

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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/10.2.0/highcharts.js"></script>
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


			Object.entries(position_label).forEach((k, v) => {
				measureTooltipElement = document.createElement('div');
				let txt = document.createElement('p');
				measureTooltipElement.className = 'tooltip-info';
				<?php
				if ($_GET['type']) {
					if ($_GET['type'] == 'reservoir') {
				?>
						let txts = ""
						txts += "V : " + k[1][3] + " m³<br>"
						txts += "% : " + k[1][4] + "<br>"
						txt.innerHTML = txts;
					<?php
					} else if ($_GET['type'] == 'flow') {
					?>
						let txts = ""
						txts += "wl : " + k[1][3] + " MSL<br>"
						txts += "discharge : " + k[1][4] + " m³/s<br>"
						txt.innerHTML = txts;
					<?php
					} else if ($_GET['type'] == 'rain') {
					?>
						let txts = ""
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
					choose_active([ilayer])
					point_label(ilayer, ilayerfile, iconfile, 'resorvoir', iconscale, 'name');
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




				async function loadAPI(key) {
					await fetch('http://localhost/EWOC%20V.11%2001-10-65/EWOC%20V.Desktop/load_data.php?type=reservoir&id=' + key).then(response => response.text()).then((data) => {
						let d = data.replace('{}"', '')
						let arr = eval(d.substring(0, d.length - 1))
						console.log(arr[arr.length - 1])
						return arr[arr.length - 1]
					})
				}

				async function loadTitleAPI(type = 'reservoir') {
					await fetch('http://localhost/EWOC%20V.11%2001-10-65/EWOC%20V.Desktop/info_type.php?type=' + type).then(response => response.text()).then((data) => {
						let d = data.substring(2, data.length - 2).replaceAll('       ', '').replace('],      ', '').replace('      [', '')
						let arr = d.split('],  [')
						console.log(arr)
						return arr
					})
				}

				async function initData() {
					var titleReservoir = await loadTitleAPI()
					console.log(titleReservoir)
					var data_reservoir = await loadAPI(titleReservoir[0].split(',')[0])
					return data_reservoir
				}

				var array_data = []
				var wl_data = []
				var volume_data = []
				var title_data = []
				var data_pie = []

				var pieColors = (function() {
					var colors = [],
						base = Highcharts.getOptions().colors[0],
						i;

					for (i = 0; i < 10; i += 1) {
						// Start out with a darkened base color (negative brighten), and end
						// up with a much brighter color
						colors.push(Highcharts.color(base).brighten((i - 3) / 7).get());
					}
					return colors;
				}());


				fetch('http://localhost/EWOC%20V.11%2001-10-65/EWOC%20V.Desktop/info_type.php?type=reservoir').then(response => response.text()).then((data) => {
					let d = data.substring(2, data.length - 2).replaceAll('       ', '').replace('],      ', '').replace('      [', '')
					let arr = d.split('],  [')
					let n = 0
					arr.forEach((dd) => {
						n+= 1
						fetch('http://localhost/EWOC%20V.11%2001-10-65/EWOC%20V.Desktop/load_data.php?type=reservoir&id=' + dd.split(',')[0]).then(response => response.text()).then((data_inner) => {
							let d = data_inner.replace('{}"', '')
							let arrs = eval(d.substring(0, d.length - 1))
							let subset_pie = {}
							array_data.push([dd.split(',')[0], dd.split(',')[1], arrs[arrs.length - 1]])
							console.log('array', arrs[arrs.length - 1])
							wl_data.push(parseFloat(arrs[arrs.length - 1]['wl']))
							title_data.push(dd.split(',')[1])
							volume_data.push(parseFloat(arrs[arrs.length - 1]['volume']))
							subset_pie['name'] = dd.split(',')[1]
							subset_pie['y'] = parseFloat(arrs[arrs.length - 1]['volume'])
							data_pie.push(subset_pie)
							if(n>=14){
								Highcharts.chart('container-grach', {
					chart: {
						type: 'bar'
					},
					title: {
						text: ''
					},
					xAxis: {
						categories: title_data
					},
					yAxis: {
						min: 0,
						title: {
							text: ''
						}
					},
					legend: {
						reversed: true
					},
					plotOptions: {
						series: {
							stacking: 'normal',
							dataLabels: {
								enabled: true
							}
						}
					},
					series: [{
						name: 'ระดับน้ำ (ม.รทก.)',
						data: volume_data
					}, {
						name: 'ปริมาณน้ำ (ลบ.ม./วินาที)',
						data: wl_data
					}]
				});

				Highcharts.chart('container-pie', {
					chart: {
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: false,
						type: 'pie'
					},
					title: {
						text: '',
						align: 'left'
					},
					tooltip: {
						pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
					},
					accessibility: {
						point: {
							valueSuffix: '%'
						}
					},
					plotOptions: {
						pie: {
							allowPointSelect: true,
							cursor: 'pointer',
							colors: pieColors,
							dataLabels: {
								enabled: true,
								format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
								distance: -50,
								filter: {
									property: 'percentage',
									operator: '>',
									value: 4
								}
							}
						}
					},
					series: [{
						name: 'Share',
						data: data_pie
					}]
				});
							}
						})
					})
					console.log('=>',title_data,volume_data,wl_data)
				})


				
				

			</script>

		<?php
		}
		?>



</body>

</html>