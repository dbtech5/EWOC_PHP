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
			right: 24px;
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

		.hover-opacity {
			opacity: 0.5;
		}

		.hover-opacity:hover {
			opacity: 1;
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
							<i class="fa fa-line-chart"></i>
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
							<i class="fa fa-line-chart"></i>
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
			<div style="text-align:center;padding: 10px;font-size:13px;background-color: #adcdea;">
				<h5 style="display: inline-block;font-size:13px;" id="date_show">วันที่</h5>
				<img src="./img/icon/clock.png" width="20px" style="display: inline-block;">
			</div>
				<div class="flex pl-5" style="overflow: hidden;height:380px;">
					<div class="w-30 pt-10" style="background-color: #dbeef1;">
						<center>
							<a href="./popup_more.php?type=rain" target="_blank">
								<img src="./img/icon/rain.png" width="20px" style="display: inline-block;">
							</a>
							<h5 style="display: inline-block;font-size:13px;">ปริมาณน้ำฝน</h5>
							<div id="content_rain">

							</div>
						</center>
					</div>
					<div class="w-40" style="background-color: #dae3f3;">
						<center>
							<a href="./popup_more.php?type=reservoir" target="_blank">
								<img src="./img/icon/resvoir.png" width="20px" style="display: inline-block;">
							</a>
							<h5 style="display: inline-block;font-size:13px;">อ่างเก็บน้ำ</h5>
							<div id="content_reservoir" style="position:relative;width: 400px;height: 280px;background-image:url('./img/ภาพรวมอ่างเก็บน้ำ.png');background-size:cover;">

							</div>
						</center>
					</div>
					<div class="w-30" style="overflow-y: scroll;background-color: #fbe5d6;">
						<center>
							<img src="./img/icon/customer.png" width="20px" height="15px" style="display: inline-block;">
							<h5 style="display: inline-block;font-size:13px;">การใช้น้ำลูกค้าสะสม</h5>
							<div id="content_customer">
								<figure class="highcharts-customer">
									<div id="highcharts-customer" style="height: 800px;"></div>
								</figure>
							</div>
						</center>
					</div>
				</div>
				<div class="flex pl-5" style="overflow: hidden;height:400px;">
					<div class="w-30 pt-10" style="background: #e3daea;">
						<center>
							<a href="./popup_more.php?type=flow" target="_blank">
								<img src="./img/icon/flow.png" width="20px" height="15px" style="display: inline-block;">
							</a>
							<h5 style="display: inline-block;font-size:13px;">ปริมาณน้ำท่า</h5>
							<div id="content_flow">
								<figure class="highcharts-flow">
									<div id="highcharts-flow" style="height: 400px;"></div>
								</figure>
							</div>
						</center>
					</div>
					<div class="w-40" style="background: #fff2cc;">
						<center>
							<img src="./img/icon/pump.png" width="20px" height="15px" style="display: inline-block;">
							<h5 style="display: inline-block;font-size:13px;">สถานีสูบน้ำ</h5>


							<div id="content_pump">

							</div>
						</center>
					</div>
					<div class="w-30" style="background: #e2f0d9;">
						<center>
							<a href="./popup_more.php?type=wq" target="_blank">
								<img src="./img/icon/wq.png" width="20px" height="15px" style="display: inline-block;">
							</a>
							<h5 style="display: inline-block;font-size:13px;">คุณภาพน้ำ</h5>
							<div id="content_wq" style="position:relative;width: 400px;height: 290px;background-image:url('./img/แผนที่คุณภาพน้ำ.png');background-size:cover;">

							</div>
						</center>
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
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/10.2.0/highcharts.js"></script>
		<script>
			var dataset = []

			var parttern_label = {
				'01': 'มกราคม',
				'02': 'กุมภาพันธ์',
				'03': 'มีนาคม',
				'04': 'เมษายน',
				'05': 'พฤกษาคม',
				'06': 'มิถุนายน',
				'07': 'กรกฎาคม',
				'08': 'สิงหาคม',
				'09': 'กันยายน',
				'10': 'ตุลาคม',
				'11': 'พฤศจิกายน',
				'12': 'ธันวาคม',
			}

			var position_box = {
				'บางพระ': [90, 0],
				'หนองค้อ': [170, 60],
				'คลองใหญ่': [300, 100],
				'ประแสร์': [190, 100],
				'หนองปลาไหล': [240, 220],
				'ดอกกราย': [60, 170]
			}

			var position_box_wq = {
				'SP01': [100, 20],
				'SP02': [100, 60],
				'SP03': [210, 40],
				'SP04': [100, 110],
				'SP05': [210, 80],
				'SP06': [210, 150],
				'SP07': [100, 170],
				'SP08': [210, 190],
				'SP09': [80, 220],
				'SP10': [210, 260],
			}
			var n_key = 0

			function load_data(type_data = 'reservoir') {
				let dataset_pump = []
				let dataset_customer = []
				let dataset_flow = []
				var pump_n = []
				fetch('info_type.php?type=' + type_data).then(response => response.text()).then(data => {
					let lit = data.replaceAll('                ', '').replace('        ', '').split('],[')
					lit.forEach((dt) => {
						console.log(dt)
						n_key = -1
						fetch('load_data.php?type=' + type_data + '&id=' + dt.replace('[', '').replace(']', '').split(',')[0]).then(response_copy => response_copy.text()).then(D => {
							try {
								let json_data = eval(D.substring(0, D.length - 4))[eval(D.substring(0, D.length - 4)).length - 1]
								console.log(json_data, type_data,dt.split(',')[0].replace(']', ''))
								if (type_data == 'rain') {
									$('#content_rain').append(`
										<div style="overflow:hidden;position:relative;box-shadow: 0px 5px 10px #00000020;display:inline-block; width: 80px;height: 120px;margin: 5px;padding: 5px;">
											<p style="font-size:12px;">${dt.split(',')[1].split(' ').reverse().join('<br>')}</p>
											<div style="position:absolute;bottom:5;background:#a4c8e8;border-radius:5px;width:90%;text-align:center;">
												${json_data['rain_mm']}
											</div>
										<div>
									`)
								} else if (type_data == 'reservoir' && dt.split(',')[0].replace('[', '').replace(']', '').includes(json_data['res_code'])) {
									n_key += 1
									let format = json_data['date'].split('-')
									let display_date = format[2] + parttern_label[format[1]] + " " + ((parseInt(format[0]) + 543) + [])
									$('#date_show').text('วันที่ ' + display_date)
									$('#content_reservoir').append(`
									<div class="hover-opacity" style="position:absolute;left:${position_box[dt.split(',')[1].replace(']','')][0]};top:${position_box[dt.split(',')[1].replace(']','')][1]};background-color: #FFF;text-align:left;border-radius: 5px;width:120px;">
										<b class="size-12">อ่างเก็บน้ำ${dt.split(',')[1].replace(']','')}</b>
										<p class="size-12" style="margin:0;">น้ำไหลเข้า ${json_data['inflow']}</p>
										<p class="size-12" style="margin:0;">น้ำไหลออก ${json_data['outflow']}</p>
									</div>
									`)
								} else if (type_data == 'wq' && dt.split(',')[0].replace('[', '').replace(']', '').includes(json_data['sta_code'])) {
									let pos = dt.split(',')[0].replace('[', '').replace(']', '')
									$('#content_wq').append(`
									<div class="hover-opacity" style="position:absolute;left:${position_box_wq[pos][0]};top:${position_box_wq[pos][1]};background-color: #FFF;text-align:left;border-radius: 5px;width:120px;">
										<p class="size-12" style="margin:0;">ค่าความเค็ม ${json_data['ec']==''?'0':json_data['ec']}</p>
									</div>
									`)
								} else if (type_data == 'pump') {
									dataset_pump.push(
										[dt.split(',')[0], parseInt([json_data['flow']])]
									)
									pump_n.push(dt.split(',')[1])
									Highcharts.chart('content_pump', {
										chart: {
											type: 'bar',
											backgroundColor: '#fff2cc',
										},
										title: {
											text: '',
											align: 'left'
										},
										xAxis: {
											type: 'category',
											title: {
												text: null
											},
											min: 0,
											scrollbar: {
												enabled: true
											},
											tickLength: 0
										},
										yAxis: {
											min: 0,
											max: 1200,
											title: {
												text: 'Votes',
												align: 'high'
											}
										},
										plotOptions: {
											bar: {
												dataLabels: {
													enabled: true
												}
											}
										},
										legend: {
											enabled: false
										},
										credits: {
											enabled: false
										},
										series: [{
											name: 'a',
											data: dataset_pump
										}]
									});
								} else if (type_data == 'customer') {
									dataset_customer.push(
										[dt.split(',')[0], parseInt([json_data['wateruse']])]
									)
									Highcharts.chart('content_customer', {
										chart: {
											type: 'column',backgroundColor: { //<<--that is what you are using as fill color
											linearGradient : {
											x1: 0,
											y1: 0,
											x2: 0,
											y2: 250
											},
											stops : [
											[0, '#DDD'],
											[1, '#000']
											]
										},
										},
										
										title: {
											text: ''
										},
										xAxis: {
											type: 'category',
											labels: {
												rotation: -45,
												style: {
													fontSize: '13px',
													fontFamily: 'Verdana, sans-serif'
												}
											}
										},
										yAxis: {
											min: 0,
											title: {
												text: 'Population (millions)'
											}
										},
										legend: {
											enabled: false
										},
										tooltip: {
											pointFormat: 'Population in 2021: <b>{point.y:.1f} millions</b>'
										},
										series: [{
											name: 'Population',
											data: dataset_customer,
										}]
									});

								} else if (type_data == 'flow') {
									dataset_flow.push(
										[dt.split(',')[1], parseFloat([json_data['wl']])]
									)
									Highcharts.chart('content_flow', {
										chart: {
											type: 'column',
											backgroundColor: '#e3daea',
										},
										title: {
											text: ''
										},
										xAxis: {
											type: 'category',
											labels: {
												rotation: -45,
												style: {
													fontSize: '13px',
													fontFamily: 'Verdana, sans-serif'
												}
											}
										},
										yAxis: {
											min: 0,
											title: {
												text: 'Population (millions)'
											}
										},
										legend: {
											enabled: false
										},
										tooltip: {
											pointFormat: 'Population in 2021: <b>{point.y:.1f} millions</b>'
										},
										series: [{
											name: 'Population',
											data: dataset_flow,
										}]
									});

								}
								//console.log(type_data)


							} catch (e) {

							}

						})
					})
				})
			}

			//load_data('rain')

			//load_data('reservoir')
			console.log('start')

			load_data('rain')
			load_data('reservoir')

			load_data('pump')
			load_data('flow')
			load_data('wq')
			setTimeout(() => {
				load_data('customer')
			}, 1000)


		</script>
</body>

</html>
