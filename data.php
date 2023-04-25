<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="GZ3wTJlC8BI43oAr5X7WBlHSvYCZTpxiXpuyWpZa">
	<title>EWOC</title>
	<link rel="stylesheet" href="./ajax/libs/bootstrap/4.1.0/css/bootstrap.min.css">
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
  <link rel="stylesheet" href="./css/data.css">
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
                            <img src="./img/icon_realtime.png" width="23px" style="margin-left: 20px;">
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

            <div class="Main-container" style="overflow: scroll;">

    <!-- Option element for load data-->
    <div class="header">
        <div class="group-element">
            <div style="width: 100%;">
                <div style="width: 100%;padding:0;">
                    <div class="box-group">
                        <select id="val_type" onchange="load_option()" style='display:none;'>
                            <option value="reservoir">อ่างเก็บน้ำ</option>
                            <option value="flow">ปริมาณน้ำท่า</option>
                            <option value="pump">สถานีสูบน้ำ</option>
                            <option value="customer">การใช้น้ำลูกค้า</option>
                            <option value="wq">คุณภาพน้ำ</option>
                            <option value="rain">สถานีวัดน้ำฝน</option>
                            <option value="tele">สถานีโทรมาตร</option>
                        </select>
                        <select onchange="load_csv_totable()" id="val_data" style="width: 100%;margin-left: 0px;border-radius: 5px;">

                        <option>-- เลือกอ่างเก็บน้ำ --</option>
                            <option value="ky">อ่างเก็บน้ำคลองใหญ่</option>
                            <!--<option value="krb">อ่างเก็บน้ำคลองระบม</option>
                            <option value="">อ่างเก็บน้ำคลองระโอก</option>
                            <option value="ksy">อ่างเก็บน้ำคลองสียัด</option>
                            <option value="kl">อ่างเก็บน้ำคลองหลวงรัชชโลทร</option>-->
                            <option value="dk">อ่างเก็บน้ำดอกกราย</option>
                            <option value="bp">อ่างเก็บน้ำบางพระ</option>
                            <!--<option value="">อ่างเก็บน้ำบ้านบึง</option>-->
                            <option value="ps">อ่างเก็บน้ำประแสร์</option>
                            <!--<option value="mpc">อ่างเก็บน้ำมาบประชัน</option>
                            <option value="">อ่างเก็บน้ำมาบฟักทอง 1</option>
                            <option value="">อ่างเก็บน้ำมาบฟักทอง 2</option>
                            <option value="">อ่างเก็บน้ำลาดกระทิง</option>
                            <option value="">อ่างเก็บน้ำลุ่มน้ำโจน 16</option>
                            <option value="">อ่างเก็บน้ำลุ่มน้ำโจน 2</option>
                            <option value="nkd">อ่างเก็บน้ำหนองกลางดง</option>-->
                            <option value="nk">อ่างเก็บน้ำหนองค้อ</option>
                            <option value="npl">อ่างเก็บน้ำหนองปลาไหล</option>
                            <!--<option value="hkj">อ่างเก็บน้ำห้วยขุนจิต</option>
                            <option value="cn">อ่างเก็บน้ำห้วยชากนอก</option>
                            <option value="">อ่างเก็บน้ำห้วยตู้1</option>
                            <option value="">อ่างเก็บน้ำห้วยตู้2</option>
                            <option value="hkp">อ่างเก็บน้ำห้วยสะพาน</option>-->
                        </select>
                    </div>
                    <div class="box-group">
                        <p>เริ่มปี</p>
                        <div class="lr">

                        </div>
                        <select id="year_select_start">
                            <option>เลือกปี</option>
                            <option>-- ไม่ระบุปี --</option>
                            <option>2559</option>
                            <option>2560</option>
                            <option>2561</option>
                            <option>2562</option>
                        </select>
                    </div>

                    <div class="box-group">
                        <p>ถึงปี</p>
                        <div class="lr">

                        </div>
                        <select id="year_select_end">
                            <option>เลือกปี</option>
                            <option>-- ไม่ระบุปี --</option>
                            <option>2559</option>
                            <option>2560</option>
                            <option>2561</option>
                            <option>2562</option>
                        </select>
                    </div>


                    <div class="box-group">
                        <p>เพิ่มปี</p>
                        <div class="lr">
                        </div>
                        <select id="year_select">
                            <option>เลือกปี</option>
                            <option>-- ไม่ระบุปี --</option>
                            <option>2559</option>
                            <option>2560</option>
                            <option>2561</option>
                            <option>2562</option>
                        </select>
                    </div>

                    <button onclick="makeTable()" id="btn_feed">แสดงผล</button>
                </div>
            </div>
        </div>
    </div>

    <!-- container select image-->
    <center>
    <div class='container-box-select'>
        <a href='data.php?type=0&name=bp'>
            <div class='box-select' onclick='select_data("reservoir")'>
                <div>
                    <img src="./img/menu_select/อ่างเก็บน้ำ.png">
                </div>
                <div>
                    อ่างเก็บน้ำ
                </div>
            </div>
        </a>

        <a href='data.php?type=1&name=362'>
            <div class='box-select' onclick='select_data("flow")'>
                <div>
                    <img src="./img/menu_select/น้ำท่า.png">
                </div>
                <div>
                    ปริมาณน้ำท่า
                </div>
            </div>
        </a>

        <a href='data.php?type=2&name=tm'>
            <div class='box-select' onclick='select_data("pump")'>
                <div>
                    <img src="./img/menu_select/สถานีสูบน้ำ.png">
                </div>
                <div>
                    สถานีสูบน้ำ
                </div>
            </div>
        </a>

        <a href='data.php?type=3&name=48458'>
            <div class='box-select' onclick='select_data("rain")'>
                <div>
                    <img src="./img/menu_select/สถานีวัดน้ำฝน.png">
                </div>
                <div>
                    สถานีวัดน้ำฝน
                </div>
            </div>
        </a>

        <a href='data.php?type=4&name=RILCOM'>
            <div class='box-select' onclick='select_data("customer")'>
                <div>
                    <img src="./img/menu_select/ลูกค้า.png">
                </div>
                <div>
                    การใช้น้ำลูกค้า
                </div>
            </div>
        </a>

        <a href='data.php?type=5&name=SP01'>
            <div class='box-select' onclick='select_data("wq")'>
                <div>
                    <img src="./img/menu_select/คุณภาพน้ำ.png">
                </div>
                <div>
                    คุณภาพน้ำ
                </div>
            </div>
        </a>

        <a href='data.php?type=6&name=tele_watlhr'>
            <div class='box-select' onclick='select_data("tele")'>
                <div>
                    <img src="./img/menu_select/โทรมาตร.png">
                </div>
                <div>
                    สถานีโทรมาตร
                </div>
            </div>
        </a>
    </div>

    <!-- container div split image and table-->
    </center>

    <!-- reservoir -->
    <div id="reservoir_info" class="info_div">
        <br>
        <div style="display:flex;">
            <div style="width:30%;padding-left:10%">
                <div>
                    <img src="./img/reservoir/bp_img01.jpg" width="100%" height="200px" style="margin-bottom: 20px;" id="img_reservoir">
                    <img src="./img/reservoir/bp_map01.jpg" width="100%" height="200px" id="map_reservoir">
                </div>
            </div>
            <div style="width:70%;margin-left:0;padding-left:2%;">
                <div class="tool-bar" style="width:90%;display:flex;margin-left:0;">
                    <div style="width:70%;">
                        <h4 style="margin-left:0;" id="alert_reservoir">รายงานปริมาณน้ำ</h4>
                    </div>
                    <div style="width:25%;float:right;">
                        <button onclick="exportReportToExcel()"><i class="fa fa-file-excel-o"></i> Export</button>
                    </div>
                </div>

                <div class="group_make_header" style="margin-left:0;width:85%;">
                    <table style="width:100%;margin-left:0;">
                        <tr>
                            <th>วันที่</th><th>ระดับน้ำ<br>(ม.รทก.)</th><th>ปริมาตรน้ำ<br>(ล้าน ลบ.ม.)</th><th>น้ำไหลเข้าอ่าง<br>(ล้าน ลบ.ม.)</th><th>น้ำระบาย<br>(ล้าน ลบ.ม.)</th>
                        </tr>
                    </table>
                </div>
                <div id="group_make_table" style="margin-left:0;width:85%;">

                    <table id="table_data" style="margin-left:0;width:85%;">
                        <tr style="display: none;">
                            <th>วันที่</th><th>ระดับน้ำ<br>(ม.รทก.)</th><th>ปริมาตรน้ำ<br>(ล้าน ลบ.ม.)</th><th>น้ำไหลเข้าอ่าง<br>(ล้าน ลบ.ม.)</th><th>น้ำระบาย<br>(ล้าน ลบ.ม.)</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- flow -->
    <div id="flow_info" class="info_div">
        <br>
        <div style="display:flex;height:40vh;">
            <div style="width:30%;padding-left:10%">
                <div>
                    <img src="./img/reservoir/bp_img01.jpg" width="100%" height="160px" style="margin-bottom: 5px;" id="img_flow">
                    <img src="./img/reservoir/bp_map01.jpg" width="100%" height="160px" id="map_flow">
                </div>
            </div>
            <div style="width:70%;margin-left:0;padding-left:2%;">
                <div class="tool-bar" style="width:90%;display:flex;margin-left:0;">
                    <div style="width:75%;">
                        <h4 style="margin-left:0;" id="alert_flow">รายงานปริมาณน้ำท่า</h4>
                    </div>
                    <div style="width:20%;float:right;">
                        <button onclick="exportReportToExcel()"><i class="fa fa-file-excel-o"></i> Export</button>
                    </div>
                </div>
                
                <div class="group_make_header" style="margin-left:0;">
                    <table style="width:87%;margin-left:0;">
                        <tr>
                            <th>วันที่</th><th>ระดับน้ำ<br>(ม.รทก.)</th><th>ปริมาตรน้ำ<br>(ล้าน ลบ.ม.)</th>
                        </tr>
                    </table>
                </div>
                <div id="flow_group_make_table" style="width:87%;height:70%;margin-left:0;">

                    <table id="flow_table_data" >
                        <tr style="display: none;">
                            <th>วันที่</th><th>ระดับน้ำ<br>(ม.รทก.)</th><th>ปริมาตรน้ำ<br>(ล้าน ลบ.ม.)</th><th>น้ำไหลเข้าอ่าง<br>(ล้าน ลบ.ม.)</th><th>น้ำระบาย<br>(ล้าน ลบ.ม.)</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- wq -->
    <div id="wq_info" class="info_div">
        <br>
        <h4 id="alert_wq">รายงานคุณภาพน้ำ</h4>
        <div class="tool-bar" style="width:85%;margin-left:0;">
                    <div>
                        <button onclick="exportReportToExcel()"><i class="fa fa-file-excel-o"></i> Export</button>
                    </div>
                </div>

        <div class="wq_group_make_header">
            <table>
                <tr>
                    <th>วันที่</th><th>ความเค็ม (g/l)</th><th>กรด-ด่าง (pH)</th><th>ออกซิเจนในน้ำ (mg/l)</th><th>ค่าการนำไฟฟ้า (µS/cm)</th><th>อุณหภูมิ (°C)</th><th>ของแข็งละลายน้ำ (mg/l)</th>
                </tr>
            </table>
        </div>
        <div id="wq_group_make_table">

            <table id="wq_table_data">

            </table>
        </div>
    </div>

    <!-- customer -->
    <div id="customer_info" class="info_div">
        <br>
        <div style="display:flex;">
            <div style="width:30%;padding-left:10%">
                <div>
                    <img src="./img/reservoir/bp_img01.jpg" width="100%" height="200px" style="margin-bottom: 20px;">
                    <img src="./img/reservoir/bp_map01.jpg" width="100%" height="200px">
                </div>
            </div>
            <div style="width:70%;margin-left:0;padding-left:2%;">
                <div class="tool-bar" style="width:90%;display:flex;margin-left:0;">
                    <div style="width:40%;">
                        <h4 style="margin-left:0;" id="alert_customer">รายงานปริมาณการใช้น้ำของลูกค้า</h4>
                    </div>
                    <div style="width:45%;float:right;">
                        <button onclick="exportReportToExcel()"><i class="fa fa-file-excel-o"></i> Export</button>
                    </div>
                </div>

                <div class="group_make_header" >
                    <table style="width:85%;margin-left:0;">
                        <tr>
                            <th>วันที่</th><th>ปริมาณการใช้น้ำของลูกค้า (ลบ.ม.)</th>
                        </tr>
                    </table>
                </div>
                <div id="customer_group_make_table" style="width:85%;margin-left:0;">

                    <table id="customer_table_data" style="margin-left:0;">
                        <tr style="display: none;">
                            <th>วันที่</th><th>ระดับน้ำ<br>(ม.รทก.)</th><th>ปริมาตรน้ำ<br>(ล้าน ลบ.ม.)</th><th>น้ำไหลเข้าอ่าง<br>(ล้าน ลบ.ม.)</th><th>น้ำระบาย<br>(ล้าน ลบ.ม.)</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- pump -->
    <div id="pump_info" class="info_div">
        <br>
        <div style="display:flex;">
            <div style="width:30%;padding-left:10%">
                <div>
                    <img src="./img/reservoir/bp_img01.jpg" width="100%" height="200px" style="margin-bottom: 20px;">
                    <img src="./img/reservoir/bp_map01.jpg" width="100%" height="200px">
                </div>
            </div>
            <div style="width:70%;margin-left:0;padding-left:2%;">
                <div class="tool-bar" style="width:90%;display:flex;margin-left:0;">
                    <div style="width:40%;">
                        <h4 style="margin-left:0;" id="alert_pump">รายงานสถานีสูบน้ำ</h4>
                    </div>
                    <div style="width:45%;float:right;">
                        <button onclick="exportReportToExcel()"><i class="fa fa-file-excel-o"></i> Export</button>
                    </div>
                </div>

                <div class="group_make_header" style="margin-left:0;">
                    <table style="width:85%;margin-left:0;">
                        <tr>
                            <th>วันที่</th><th>ปริมาณการสูบน้ำ (ลบ.ม.)</th>
                        </tr>
                    </table>
                </div>
                <div id="pump_group_make_table" style="width:85%;margin-left:0;">
                    <table id="pump_table_data">
                        <tr style="display: none;">
                            <th>วันที่</th><th>ระดับน้ำ<br>(ม.รทก.)</th><th>ปริมาตรน้ำ<br>(ล้าน ลบ.ม.)</th><th>น้ำไหลเข้าอ่าง<br>(ล้าน ลบ.ม.)</th><th>น้ำระบาย<br>(ล้าน ลบ.ม.)</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- rain -->
    <div id="rain_info" class="info_div">
        <br>
        <div style="display:flex;">
            <div style="width:30%;padding-left:10%">
                <div>
                    <img src="./img/reservoir/bp_img01.jpg" width="100%" height="200px" style="margin-bottom: 20px;">
                    <img src="./img/reservoir/bp_map01.jpg" width="100%" height="200px">
                </div>
            </div>
            <div style="width:70%;margin-left:0;padding-left:2%;">
                <div class="tool-bar" style="width:90%;display:flex;margin-left:0;">
                    <div style="width:40%;">
                        <h4 style="margin-left:0;" id="alert_rain">รายงานสถานีน้ำฝน</h4>
                    </div>
                    <div style="width:45%;float:right;">
                        <button onclick="exportReportToExcel()"><i class="fa fa-file-excel-o"></i> Export</button>
                    </div>
                </div>
                <div class="group_make_header" style="margin-left:0;">
                    <table style="width:85%;margin-left:0;">
                        <tr>
                            <th>วันที่</th><th>ปริมาณน้ำฝน (มม.)</th>
                        </tr>
                    </table>
                </div>
                <div id="rain_group_make_table" style="width:85%;margin-left:0;">
                    <table id="rain_table_data" style="margin-left:0;">
                        <tr style="display: none;">
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- tele -->
    <div id="tele_info" class="info_div">
        <br>
        <div style="display:flex;">
            <div style="width:30%;padding-left:10%">
                <div>
                    <img src="./img/tele/tele_sta.jpg" width="100%" height="200px" style="margin-bottom: 20px;">
                    <img src="./img/tele/EAST_20230222_0845.jpg" width="100%" height="200px" id="image_ftp">
                </div>
            </div>
            <div style="width:70%;margin-left:0;padding-left:2%;">
                <div class="tool-bar" style="width:90%;display:flex;margin-left:0;">
                    <div style="width:40%;">
                        <h4 style="margin-left:0;" id="alert_tele">รายงานสถานีโทรมาตรวัดละหารไร่</h4>
                    </div>
                    <div style="width:45%;float:right;">
                        <button onclick="exportReportToExcel()"><i class="fa fa-file-excel-o"></i> Export</button>
                    </div>
                </div>
                <div class="group_make_header" style="margin-left:0;">
                    <table style="width:85%;margin-left:0;">
                        <tr>
                            <th>วันที่</th>
                            <th>ระดับน้ำ (ม.รทก.)</th>
                            <th>ปริมาณน้ำ (ลบ.ม./วินาที)</th>
                            <th>ปริมาณน้ำฝน (มม.)</th>
                        </tr>
                    </table>
                </div>
                <div id="tele_group_make_table" style="width:85%;margin-left:0;">
                    <table id="tele_table_data">
                        <tr style="display: none;">
                            <th>วันที่</th><th>ระดับน้ำ<br>(ม.รทก.)</th><th>ปริมาตรน้ำ<br>(ล้าน ลบ.ม.)</th><th>น้ำไหลเข้าอ่าง<br>(ล้าน ลบ.ม.)</th><th>น้ำระบาย<br>(ล้าน ลบ.ม.)</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <br>

    <!-- highcharts -->
    <h4>กราฟแสดงผล</h4>

    <div>
        <!--
        <div class="box-group" style="margin-left: 10%;">
            <p>เลือกปี</p>
            <div class="lr">

            </div>

            <select id="range_start" onchange="chnage_plot()" style="margin-left:20px;height: 30px;">
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
            </select>
        </div>
        -->
        <br>

        <div class="chart-reservoir">
            <figure class="highcharts-main">
                <div id="highcharts-main" style="height: 800px;"></div>
            </figure>

            <figure class="highcharts-inflow">
                <div id="highcharts-inflow"></div>
            </figure>

            <figure class="highcharts-outflow">
                <div id="highcharts-outflow"></div>
            </figure>
        </div>

        <div class="chart-flow">
            <div style="display: flex;width:90%;height: 30vh;float:left;">
                <figure class="highcharts-main">
                    <div id="highcharts-flow-discharge" style="width: 40vw;height: 100%;"></div>
                </figure>
                <figure class="highcharts-main" style="float: left;margin-left:0;">
                    <div id="highcharts-flow-wl" style="width: 40vw;height: 100%;margin-left:0;"></div>
                </figure>
            </div>
        </div>

        <div class="chart-pump">
            <figure class="highcharts-main">
                <div id="highcharts-pump" style="height: 800px;"></div>
            </figure>
        </div>

        <div class="chart-customer">
            <figure class="highcharts-main">
                <div id="highcharts-customer" style="height: 800px;"></div>
            </figure>
        </div>

        <div class="chart-wq">
            <figure class="highcharts-main">
                <div id="highcharts-wq-Salinty" style="height: 800px;"></div>
            </figure>

            <figure class="highcharts-main">
                <div id="highcharts-wq-pH" style="height: 800px;"></div>
            </figure>

            <figure class="highcharts-main">
                <div id="highcharts-wq-DO" style="height: 800px;"></div>
            </figure>

            <figure class="highcharts-main">
                <div id="highcharts-wq-EC" style="height: 800px;"></div>
            </figure>

            <figure class="highcharts-main">
                <div id="highcharts-wq-Temp" style="height: 800px;"></div>
            </figure>

            <figure class="highcharts-main">
                <div id="highcharts-wq-TDS" style="height: 800px;"></div>
            </figure>
        </div>

        <div class="chart-rain">
            <figure class="highcharts-main">
                <div id="highcharts-rain" style="height: 800px;"></div>
            </figure>
        </div>

        <div class="chart-tele">
            <figure class="highcharts-main">
                <div id="highcharts-tele-wl" style="height: 800px;"></div>
            </figure>

            <figure class="highcharts-main">
                <div id="highcharts-tele-discharge" style="height: 800px;"></div>
            </figure>

            <figure class="highcharts-main">
                <div id="highcharts-tele-rain" style="height: 800px;"></div>
            </figure>
        </div>

        
    </div>
</div>

</div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/10.2.0/highcharts.js"></script>
    <script>
        function exportReportToExcel() {
            console.log(document.getElementById('val_type').value)
            let table = document.getElementById(document.getElementById('val_type').value+"_bodyT");
            let name_txt = ""
            if($("#val_type").val() == 'reservoir'){
                name_txt = "ปริมาณน้ำ "
            }else if($("#val_type").val() == 'flow'){
                name_txt = "ปริมาณน้ำท่า "
            }else if($("#val_type").val() == 'rain'){
                name_txt = "สถานีวัดน้ำฝน "
            }else if($("#val_type").val() == 'customer'){
                name_txt = "ปริมาณการใช้น้ำ "
            }else if($("#val_type").val() == 'wq'){
                name_txt = "สถานีวัดคุณภาพน้ำ "
            }else if($("#val_type").val() == 'tele'){
                name_txt = "สถานีโทรมาตร "
            }
            name_txt += $("#val_data :selected").text()
            console.log('download file '+name_txt)
            TableToExcel.convert(table, {
                name: `${name_txt}.xlsx`,
                sheet: {
                    name: 'ข้อมูล'
                }
            });
        }
    </script>

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
	<script type="text/javascript"
		src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>

    <script src="./js/process-data.js"></script>
    <script type="text/javascript" src="./js/slidbar.js"></script>


</body>

</html>
