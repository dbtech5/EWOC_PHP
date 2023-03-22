<!DOCTYPE html>
<html lang="en">

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
        body {
            width: 100%;
            height: 100%;
        }

        .main-info {
            width: 50%;
            margin-left: 25.2%;
            height: 580px;
            display: block;
            background-size: cover;
            background-repeat: no-repeat;
            background-image: url('./img/pic_popup/popup_reservoir.png');
            background-position: -70px;
        }
    </style>
</head>

<body>
    <div id="container" class="w-100 h-100">
        <!-- Header -->
        <div class="element-nav">
            <div id="toggleHead">
                <div id="header-element">
                    <div>
                        <div class="menu-action">
                            <i class="fa fa-question-circle-o" onclick="toggleMenuLeft()"></i>
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
    </div>
    <div style="padding:10px;width: 46%;margin-left: 25%;display:flex;margin-top:2%;background-color: #5a9bd5;color:#FFF;">
        <div style="height:24px;line-height:50px;width:25%;font-size: 13px;color:#FFF;">
            <p id="date_show" style="height:24px;line-height:24px;color:#FFF;"></p>
        </div>
        <div style="height:24px;width:50%;font-size: 13px;color:#FFF;">
            <p id="title" style="height:24px;line-height:24px;text-align: center;color:#FFF;"> </p>
        </div>
    </div>
    <div class="main-info">

    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
    <script>
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
        
        var position_reservoir = {
            "cn":{"x":816,"y":257},
            "dk":{"x":817,"y":359},
            "hkj":{"x":561,"y":575},
            "hsp":{"x":565,"y":551},
            "kl":{"x":575,"y":527},
            "krb":{"x":595,"y":510},
            "ksy":{"x":604,"y":497},
            "ky":{"x":567,"y":425},
            "mpc":{"x":616,"y":449},
            "nk":{"x":644,"y":549},
            "nkd":{"x":679,"y":534},
            "npl":{"x":787,"y":513},
            "ps":{"x":910,"y":585},
        }
        var position_flow = {
            "365":{"x":708,"y":485},
            "389":{"x":613,"y":391},
            "383":{"x":792,"y":297},
            "362":{"x":868,"y":297},
            "380":{"x":690,"y":232},
            "397":{"x":817,"y":610},
            "403":{"x":643,"y":657},
            "410":{"x":606,"y":209},
            "412":{"x":644,"y":241},
            "409":{"x":704,"y":652},
            "612":{"x":748,"y":269},
        }
        var position_rain = {
            "459201":{"x":666,"y":557},
            "090160":{"x":549,"y":444},
            "478201":{"x":665,"y":365},
            "480201":{"x":763,"y":306},
            "423301":{"x":801,"y":545},
            "090171":{"x":776,"y":605},
            "480241":{"x":570,"y":377},
        }

        var position_wq = {
            "SP01":{"x":622,"y":399},
            "SP02":{"x":622,"y":399},
            "SP03":{"x":622,"y":399},
            "SP04":{"x":622,"y":399},
            "SP05":{"x":622,"y":399},
            "SP06":{"x":622,"y":399},
            "SP07":{"x":622,"y":399},
            "SP08":{"x":622,"y":399},
            "SP09":{"x":622,"y":399},
            "SP10":{"x":622,"y":399},
        }
        var param1var = getQueryVariable("type");

        function getQueryVariable(variable) {
            var query = window.location.search.substring(1);
            var vars = query.split("&");
            for (var i = 0; i < vars.length; i++) {
                var pair = vars[i].split("=");
                if (pair[0] == variable) {
                    return pair[1];
                }
            }
        }
        load_data(param1var)
        document.getElementsByClassName('main-info')[0].style.backgroundImage = 'url("./img/pic_popup/popup_' + param1var + '.png")'

        if(param1var == 'reservoir'){
            $('#title').text('อ่างเก็บน้ำ')
        }else if(param1var == 'rain'){
            $('#title').text('สถานีวัดน้ำฝน')
        }else if(param1var == 'flow'){
            $('#title').text('สถานีวัดน้ำท่า')
        }else if(param1var == 'wq'){
            $('#title').text('คุณภาพน้ำ')
        }
        function load_data(type_data = 'reservoir') {
            let dataset_pump = []
            let dataset_customer = []
            let dataset_flow = []
            var pump_n = []
            fetch('./info_type.php?type=' + type_data).then(response => response.text()).then(data => {
                let lit = data.replaceAll('                ', '').replace('        ', '').split('],[')
                lit.forEach((dt) => {
                    console.log(dt)
                    n_key = -1
                    fetch('./load_data.php?type=' + type_data + '&id=' + dt.replace('[', '').replace(']', '').split(',')[0]).then(response_copy => response_copy.text()).then(D => {
                        try {
                            let json_data = eval(D.substring(0, D.length - 4))[eval(D.substring(0, D.length - 4)).length - 1]
                            console.log(json_data, type_data, dt.split(',')[0].replace(']', ''))
                            console.log(type_data == 'reservoir' && json_data['res_code']==dt.split(',')[0].replace(']','').replace('[',''))
                            if (type_data == 'rain' && json_data['sta_code']==dt.split(',')[0].replace(']','').replace('[','')) {
                                let format = json_data['date'].split('-')
                                let display_date = format[2] + " " + parttern_label[format[1]] + " " + ((parseInt(format[0]) + 543) + [])
                                document.getElementById('date_show').innerHTML = 'วันที่ ' + display_date
                                let k = dt.split(',')[0].replace(']', '').replace('[', '')
                                $('.main-info').append(`
									<div class="hover-opacity" style="padding:10px;position:absolute;left:${position_rain[k]['x']}px;top:${position_rain[k]['y']}px;background-color: #FFF;text-align:left;border-radius: 5px;width:120px;">
											<p style="font-size:12px;">${dt.split(',')[1].split(' ').reverse().join('<br>')}</p>
											<p class="size-12" style="margin:0;">${json_data['rain_mm']}</p>
										<div>
									`)
                            } else if (type_data == 'reservoir' && json_data['res_code']==dt.split(',')[0].replace(']','').replace('[','')) {
                                let format = json_data['date'].split('-')
                                let display_date = format[2] + " " + parttern_label[format[1]] + " " + ((parseInt(format[0]) + 543) + [])
                                document.getElementById('date_show').innerHTML = 'วันที่ ' + display_date
                                let k = dt.split(',')[0].replace(']', '')
                                $('.main-info').append(`
									<div class="hover-opacity" style="padding:10px;position:absolute;left:${position_reservoir[k]['x']}px;top:${position_reservoir[k]['y']}px;background-color: #FFF;text-align:left;border-radius: 5px;width:120px;">
										<b class="size-12">อ่างเก็บน้ำ${dt.split(',')[1].replace(']', '')}</b>
										<p class="size-12" style="margin:0;">น้ำไหลเข้า ${json_data['inflow']}</p>
										<p class="size-12" style="margin:0;">น้ำไหลออก ${json_data['outflow']}</p>
									</div>
									`)

                            } else if (type_data == 'wq' && json_data['sta_code']==dt.split(',')[0].replace(']','').replace('[','')) {
                                let format = json_data['date_time'].split(' ')[0].split('-')
                                let display_date = format[2] + " " + parttern_label[format[1]] + " " + ((parseInt(format[0]) + 543) + [])
                                document.getElementById('date_show').innerHTML = 'วันที่ ' + display_date
                                let k = dt.split(',')[0].replace(']', '')
                                $('.main-info').append(`
                                    <p class="size-12" style="position:absolute;left:${position_wq[k]['x']}px;top:${position_wq[k]['y']}px;"> ${json_data['ec']}</p>
									`)
                            } else if (type_data == 'flow' && json_data['sta_id']==dt.split(',')[0].replace(']','').replace('[','')) {
                                let format = json_data['date'].split('-')
                                let display_date = format[2] + " " + parttern_label[format[1]] + " " + ((parseInt(format[0]) + 543) + [])
                                document.getElementById('date_show').innerHTML = 'วันที่ ' + display_date
                                let k = dt.split(',')[0].replace(']', '').replace('[','')
                                $('.main-info').append(`
									<div class="hover-opacity" style="padding:10px;position:absolute;left:${position_flow[k]['x']}px;top:${position_flow[k]['y']}px;background-color: #FFF;text-align:center;border-radius: 5px;width:50px;">
											<p class="size-12" style="margin:0;">${json_data['wl']}</p>
										<div>
									`)
                            }
                            //console.log(type_data)


                        } catch (e) {

                        }

                    })
                })
            })
        }

        
        var point_position = {}
        document.addEventListener('click', (e) => {
            point_position['a'] = {
                'x':e['clientX'],
                'y':e['clientY']
            }
            console.log(JSON.stringify(point_position))
        })
    </script>
</body>

</html>