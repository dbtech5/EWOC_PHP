// Creates a new layer.
function initLayer(url, layer, options = undefined) {
    var params = {
        'LAYERS': layer,
        'TILED': true
    }
    if (options) {
        params = merge(params, options);
    }

    var newLayer = new ol.layer.Tile({
        name: layer,
        source: new ol.source.TileWMS({
            url: url,
            params: params,
            serverType: 'geoserver',
            transition: 200,
            transparent: true,
            name: layer
        })
    })
    return newLayer
}


// Creates a new wmts layer.
function initWmtsLayer(url, layer, options = undefined) {
    var titeSize = [256, 256];
    var bboxExtent = [-180.0, -90.0, 180.0, 90.0];
    var gridsetName = 'EPSG:4326';

    var resolutions = [
        0.703125,
        0.3515625,
        0.17578125,
        0.087890625,
        0.0439453125,
        0.02197265625,
        0.010986328125,
        0.0054931640625,
        0.00274658203125,
        0.001373291015625,
        6.866455078125E-4,
        3.4332275390625E-4,
        1.71661376953125E-4,
        8.58306884765625E-5,
        4.291534423828125E-5,
        2.1457672119140625E-5,
        1.0728836059570312E-5,
        5.364418029785156E-6,
        2.682209014892578E-6,
        1.341104507446289E-6,
        6.705522537231445E-7,
        3.3527612686157227E-7
    ];

    var gridNames = [];

    for (var i = 0; i <= 21; i++) {
        gridNames[i] = gridsetName + ':' + i;
    }

    var projection = ol.proj.get('EPSG:4326');

    var matrixIds = new Array(22);

    for (var z = 0; z <= 21; ++z) {
        matrixIds[z] = gridsetName + ':' + z;
    }

    var params = {}

    if (options) {
        params = merge(params, options);
    }

    var newLayer = new ol.layer.Tile({
        source: new ol.source.WMTS({
            url: url,
            layer: layer,
            matrixSet: 'EPSG:4326',
            format: 'image/png',
            projection: projection,
            tileGrid: new ol.tilegrid.WMTS({
                resolutions: resolutions,
                matrixIds: matrixIds,
                tileSize: titeSize,
                extent: bboxExtent,
            }),
            params: params
        })
    })
    return newLayer
}

// Set the center of the map
function setCenter(lat, lon, zoom = 8) {
    map.getView().animate({
        center: ol.proj.transform([parseFloat(lon), parseFloat(lat)], 'EPSG:4326', 'EPSG:3857'),
        duration: 1000,
        zoom: zoom
    });
}

// Add a layer to the map.
function addLayer(layer, layername = undefined, zIndex = undefined) {
    if (layer) {
        if (layername) {
            layer.set('layer_name', layername)
        }
        //layer.setOpacity(0.9)
        if (zIndex)
            layer.setZIndex(zIndex)
        console.log(layer)
        map.addLayer(layer)
    }
}

// Remove a layer from the map.
function removeLayer(layer) {
    if (layer){
        del_active([layer])
        map.removeLayer(layer);
    }
}

// Toggle a layer with checkbox
function toggleLayerWithCheckbox(checked, layer, layerName = undefined) {
    if (checked && layer) {
        addLayer(layer, layerName);
    } else {
        removeLayer(layer);
    }
}

// Toggle a feature layer with checkbox
function toggleFeatureLayerWithCheckbox(checked, layerName) {
    if (checked) {
        addFeatureLayer(layerName)
    } else {
        removeFeatureLayer(layerName)
    }
}

// Toggle info with checkbox
function toggleInfoWithCheckbox(checked, checkbox) {
    var info = $(checkbox).parent().parent().find('.filter_info')
    if (checked) {
        info.show()
    } else {
        info.hide()
    }
}

// Check if the layer is active.
var click_dialog = false
var corX = 0,corY = 0;
var layer_active = []

// Returns a json representation of the name.
var name_json = {
    'District':'อำเภอ',
    'Pump_PWA':'สถานีสูบน้ำ กปภ.',
    'Province':'จังหวัด',
    'reservoir':'อ่างเก็บน้ำ',
    'pump6':'สถานีสูบน้ำ กปภ.',
    'TAM_NAM_T,AMPHOE_T,PROV_NAM_T':'ตำบล',
    'res_name':'อ่างเก็บน้ำ',
    'Rain_Station':'สถานีน้ำฝน',
    'IRR_Name_T':'อ่างเก็บน้ำ (หลัก)',
    'Reservoir_Reserv':'อ่างเก็บน้ำ (รอง)',
    'Pump_Main':'สถานีสูบน้ำ (หลัก)',
    'Pump_Minor':'สถานีสูบน้ำ (รอง)',
    'Rain_Station_Code':'สถานีวัดน้ำฝน',
    'Railway':'ทางรถไฟ',
    'Hydro_Station_Code':'สถานีวัดน้ำท่า',
    'SubDistrict':'ตำบล',
    'Customer':'ลูกค้า',
    'Waterquality_Station':'สถานีตรวจวัดคุณภาพน้ำ',
    'Tele_Station':'สถานีโทรมาตร',
    'Tide_Station':'สถานีวัดระดับน้ำทะเล',
    'Rain_Station_Code':'สถานีวัดน้ำฝน',
    'Level_Station':'สถานีวัดน้ำท่า',
    'Trans_Station':'สถานีคมนาคม',
    'Pipe_Main':'ท่อ East Water ปัจจุบัน',

}

// Default checkbox for sub - districts klongluang
let default_checkbox = {
    'SubDistrict':true,
    'Pipe_Main':true,
    'Pipe_Klongluang':true,
}

// Set the layer options.
var layer_option = []
var set_layer_option = {}

// Choose the active layer.
function choose_active(text){
    var list_layer = document.getElementsByClassName('property-item')
    for(let i=0;i<list_layer.length;i++){
        list_layer[i].style.display = "none"
    }
    if($('.none-layer').text()){
        $('.none-layer').remove()
    }
    let text_format = ""
    text.forEach(item=>{
        text_format += "'" + item + "',"
    })
    console.log(layer_option.includes(text),text)
    if(!layer_option.includes(text[0])){
        layer_option.push(text[0])
        $('.group-property').append(`
        <div class="property-item property-${text}">
            <input type="checkbox" id="text-${text}" onchange="refresh_layer('${text}')" ${(default_checkbox[text]?'':'checked')}>
            <p>แสดงข้อความ</p>
            <br>
            <div class="control_font_size">
                <button onclick="size_text('${text}',-1,'${text}')"><i class="fa fa-minus"></i></button>
                <p id="size-${text}">12</p>
                <button onclick="size_text('${text}',1,'${text}')"><i class="fa fa-plus"></i></button>
            </div>
        </div>
        `)
    }

    $('#container-layer').prepend(`
        <div class="element-layer" onclick="active_layer([${text_format.substring(0,text_format.length-1)}])">${(name_json[text])?name_json[text]:text}<div>
    `)
    let element_in_layer = document.getElementsByClassName('property-'+text[0])
    console.log('property-'+text[0])
    for(let i=0;i<element_in_layer.length;i++){
        element_in_layer[i].style.display = "block"
    }
    console.log(text)
    layer_active.push(text)
}

// Delete the active layers in the given text
function del_active(text){
    let i = 0
    let copy_layer = []
    console.log(text)
    $('#container-layer').empty()
    while(i<layer_active.length){
        let temp_lit = []
        let n = 0
        while(n<layer_active[i].length){
            if(layer_active[i][n] == text[n]){
                temp_lit.push(text[n])
            }
            n++
        }
        if(temp_lit.length == layer_active[i].length){

        }else{
            copy_layer.push(layer_active[i])
            let text_format = ""
            layer_active[i].forEach(item=>{
                text_format += "'" + item + "',"
            })
            $('#container-layer').prepend(`
                <div class="element-layer" onclick="active_layer([${text_format.substring(0,text_format.length-1)}])">${name_json[layer_active[i]]}<div>
            `)
        }
        i++
    }
    layer_active = copy_layer
}

// element in layer group
function active_layer(name){
    let i = 0
    let copy_layer = []
    $('#container-layer').empty()
    while(i<layer_active.length){
        let temp_lit = []
        let n = 0
        while(n<layer_active[i].length){
            if(layer_active[i][n] == name[n]){
                temp_lit.push(name[n])
            }
            n++
        }
        if(temp_lit.length == layer_active[i].length){

        }else{
            copy_layer.push(layer_active[i])
            let text_format = ""
            layer_active[i].forEach(item=>{
                text_format += "'" + item + "',"
            })
            $('#container-layer').prepend(`
                <div class="element-layer" onclick="active_layer([${text_format.substring(0,text_format.length-1)}])">${name_json[layer_active[i]]}<div>
            `)
        }
        i++
    }
    console.log(layer_active)
    layer_active = copy_layer
    console.log(layer_active)
    console.log(name)
    layer_active.push(name)
    let text_format = ""
    layer_active[layer_active.length-1].forEach(item=>{
        text_format += "'" + item + "',"
    })
    console.log(text_format)
    // Activate a container layer
    $('#container-layer').prepend(`
        <div class="element-layer" onclick="active_layer(['${text_format.substring(0,text_format.length-1)}])">${name_json[layer_active[layer_active.length-1]]}<div>
    `)
    $('.'+name).click()
    setTimeout(()=>{
        $('.'+name).click()
    },100)
    var list_layer = document.getElementsByClassName('property-item')
    for(let i=0;i<list_layer.length;i++){
        list_layer[i].style.display = "none"
    }
    // Displays the block elements in the property layer.
    let element_in_layer = document.getElementsByClassName('property-'+name[0])
    console.log('property-'+name[0])
    for(let i=0;i<element_in_layer.length;i++){
        element_in_layer[i].style.display = "block"
    }
    //choose_active(name)
}

// show popup info
document.getElementsByClassName('dialog_temp_fa')[0].addEventListener('click',()=>{
    document.getElementById("dialog_temp").style.display = "none"
})

// Returns a parttern label for this parttern.
var parttern_label = {
    '01':'มกราคม',
    '02':'กุมภาพันธ์',
    '03':'มีนาคม',
    '04':'เมษายน',
    '05':'พฤกษาคม',
    '06':'มิถุนายน',
    '07':'กรกฎาคม',
    '08':'สิงหาคม',
    '09':'กันยายน',
    '10':'ตุลาคม',
    '11':'พฤศจิกายน',
    '12':'ธันวาคม',
}

// Shows a dialog.
function showDialog(text){
    console.log('---------------- show -------------------')
    document.getElementById('dialog_temp').style.display = 'block'
    document.getElementById('text-dialog').innerHTML = text
    document.getElementById("dialog_temp").style.top = (positionMouse[0]-document.getElementById('dialog_temp').clientHeight-10)+'px'
    document.getElementById("dialog_temp").style.left = (positionMouse[1]-40)+'px'
}

// Displays information about a given pixel.
function displayFeatureInfo(pixel, coordinate) {
    var features = []
    //var container = document.getElementById('popup')
    console.log(map.getLayers())
    map.forEachFeatureAtPixel(pixel, function (feature, layer) {
        features.push(feature)
    })

    console.log(features)
    if (features.length > 0) {
        var info = []
        var not = false
        for (var i = 0, ii = features.length; i < ii; ++i) {
            //info.push(features[i].get('name'))

                console.log(features[i]['values_'])
                let code = ""
                try {
                  code = features[i]['values_']['data']['properties']['res_code']
                } catch (e) {

                }
                console.log(features[i],features[i]['values_'])
                let data_body = { 'res_code' : 'dk'}
                text = ""
                let keys_check = []
                try{

                  keys_check = Object.keys(features[i]['values_']['data']['properties'])
                }catch(err){

                }
                console.log(keys_check)
                if(keys_check.includes("Reservoir_Name_T")){
                    $.ajax({
                        url: 'info_dam.php?res_code='+code+"&type=reservoir",
                    }).done(function(val) {
                        let values = val.split(',')
                        let temp_date = values[3].replace(' ','').split('-')
                        text += "<b style='color:#000'>อ่างเก็บน้ำ"+values[0]+"</b><br>"
                        text += "<b style='color:#000'>ที่ตั้ง: </b><a>"+values[1]+"</a><br>"
                        text += "<b style='color:#000'>ความจุกักเก็บ: </b><a>"+values[2]+" ล้าน ลบ.ม.</a><br>"
                        text += "<b style='color:#000'>ข้อมูลวันที่: </b><a>"+temp_date[2]+'/'+temp_date[1]+'/'+(parseInt(temp_date[0])+543)+"</a><br>"
                        text += "<b style='color:#000'>ปริมาตรน้ำในอ่าง: </b><a>"+values[4]+" ล้าน ลบ.ม.</a><br>"
                        text += "<b style='color:#000'>ปริมาณน้ำไหลเข้า: </b><a>"+values[5]+" ล้าน ลบ.ม.</a><br>"
                        text += "<b style='color:#000'>ปริมาณน้ำระบาย: </b><a>"+values[6]+" ล้าน ลบ.ม.</a><br>"
                        text += "<a href='data.php?type=0&name="+code+"' class='popup-reservoir'>ดูรายละเอียดเพิ่มเติม</a><br>"
                        showDialog(text)
                    }).fail(function() {
                        // if posting your form failed
                        alert("Posting failed.");
                    });
                }else if(features[i]['values_']['name']=='Level_Station'){
                    console.log(features[i]['values_']['data']['properties'])
                    code_name = features[i]['values_']['data']['properties']['Level_Station_Code']
                    code = features[i]['values_']['data']['properties']['sta_id']
                    console.log('info_dam.php?res_code='+code_name+"&type=Level_Station")
                    $.ajax({
                        url: 'info_dam.php?res_code='+code_name+"&type=Level_Station",
                    }).done(function(val) {
                        let values = val.split(',')
                        console.log(val)

                        let temp_date = values[5].replace(' ','').split('-')
                        text += "<b style='color:#000'>สถานี: </b><a>"+values[0]+"</a><br>"
                        text += "<b style='color:#000'>ที่ตั้ง: </b><a>"+values[1]+" "+values[2]+" "+values[3]+"</a><br>"
                        text += "<b style='color:#000'>พื้นที่รับน้ำ: </b><a>"+values[4]+" ตร.กม.</a><br>"
                        text += "<b style='color:#000'>ข้อมูลวันที่: </b><a>"+temp_date[2]+'/'+temp_date[1]+'/'+(parseInt(temp_date[0])+543)+"</a><br>"
                        //text += "<b style='color:#000'>ความจุลำน้ำ: </b><a>"+values[5]+" ลบ.ม./วินาที</a><br>"
                        text += "<b style='color:#000'>ระดับน้ำ: </b><a>"+values[6]+" ม.รทก.</a><br>"
                        text += "<b style='color:#000'>ปริมาณน้ำ: </b><a>"+values[7]+" ลบ.ม./วินาที</a><br>"
                        text += "<a href='data.php?type=1&name="+code+"' class='popup-reservoir'>ดูรายละเอียดเพิ่มเติม</a><br>"
                        showDialog(text)

                    }).fail(function() {
                        // if posting your form failed
                        alert("Posting failed.");
                    });
                }else if(features[i]['values_']['name']=='Rain_Station'){
                    code = features[i]['values_']['data']['properties']['sta_code']
                    console.log('info_dam.php?res_code='+code+"&type=Rain_Station")
                    $.ajax({
                        url: 'info_dam.php?res_code='+code+"&type=Rain_Station",
                    }).done(function(val) {
                        let values = val.split(',')
                        console.log(val)

                        let temp_date = values[4].replace(' ','').split('-')
                        text += "<b style='color:#000'>สถานี: </b><a>"+values[0]+" "+values[1]+"</a><br>"
                        text += "<b style='color:#000'>ที่ตั้ง: </b><a>"+values[2]+" "+values[3]+"</a><br>"
                        text += "<b style='color:#000'>ข้อมูลวันที่: </b><a>"+temp_date[1]+'/'+temp_date[2]+'/'+(parseInt(temp_date[0])+543)+"</a><br>"
                        text += "<b style='color:#000'>ปริมาณน้ำฝน: </b><a>"+values[5]+" ลบ.ม./วินาที</a><br>"
                        text += "<a href='data.php?type=3&name="+code+"' class='popup-reservoir'>ดูรายละเอียดเพิ่มเติม</a><br>"
                        showDialog(text)

                    }).fail(function() {
                        // if posting your form failed
                        alert("Posting failed.");
                    });
                }else if(features[i]['values_']['name']=='Waterquality_Station' || keys_check.includes('Waterquality_Station_Code')){
                    code = features[i]['values_']['data']['properties']['Waterquality_Station_Code']
                    console.log('info_dam.php?res_code='+code+"&type=Waterquality_Station")
                    $.ajax({
                        url: 'info_dam.php?res_code='+code+"&type=Waterquality_Station",
                    }).done(function(val) {
                        let values = val.split(',')
                        console.log(val)

                        let temp_date = values[4].split(' ')[0].split('-')

                        temp_date[0] = parseInt(temp_date[0])+543
                        temp_date = temp_date.reverse().join('/')
                        let temp_time = values[4].split(' ')[1]
                        text += "<b style='color:#000'>สถานี: </b><a>"+values[0]+" ("+values[1]+")</a><br>"
                        text += "<b style='color:#000'>ที่ตั้ง: </b><a>"+values[2]+" "+values[3]+"</a><br>"
                        text += "<b style='color:#000'>ข้อมูลวันที่: </b><a>"+temp_date+" "+temp_time+"</a><br>"
                        text += "<b style='color:#000'>ระยะจากทะเล: </b><a>"+values[5]+" กม.</a><br>"
                        text += "<b style='color:#000'>ความเค็ม: </b><a>"+values[6]+" ก./ล</a><br>"
                        text += "<b style='color:#000'>ค่าการนำไฟฟ้า: </b><a>"+values[7]+" ไมโครซีเมนส์/เซนติเมตร</a><br>"
                        text += "<b style='color:#000'>ออกซิเจนในน้ำ: </b><a>"+values[8]+" มก./ล.</a><br>"
                        text += "<b style='color:#000'>กรด-ด่าง: </b><a>"+values[9]+" pH</a><br>"
                        text += "<b style='color:#000'>ของแข็งละลายน้ำ: </b><a>"+values[10]+"มก./ล.</a><br>"
                        text += "<b style='color:#000'>อุณหภูมิ: </b><a>"+values[12]+" องศา</a><br>"
                        text += "<a href='data.php?type=5&name="+code+"' class='popup-reservoir'>ดูรายละเอียดเพิ่มเติม</a><br>"
                        showDialog(text)

                    }).fail(function() {
                        // if posting your form failed
                        alert("Posting failed.");
                    });
                }else if(features[i]['values_']['name']=='Tele_Station' || keys_check.includes('sta_code')){
                    code = features[i]['values_']['data']['properties']['sta_code']
                    console.log('info_dam.php?res_code='+code+"&type=Tele_Station")
                    $.ajax({
                        url: 'info_dam.php?res_code='+code+"&type=Tele_Station",
                    }).done(function(val) {
                        let values = val.split(',')
                        console.log(val)

                        let temp_date = values[3].split(' ')[0].split('-')
                        temp_date[0] = parseInt(temp_date[0])+543
                        temp_date = temp_date.reverse().join('/')
                        let temp_time = values[3].split(' ')[1]
                        text += "<b style='color:#000'>สถานีโทรมาตรวัดละหารไร่</b><a></a><br>"
                        text += "<b style='color:#000'>ที่ตั้ง: </b><a>"+values[0]+" "+values[1]+" "+values[2]+"</a><br>"
                        text += "<b style='color:#000'>ข้อมูลวันที่: </b><a>"+temp_date+" "+temp_time+"</a><br>"
                        text += "<b style='color:#000'>ระดับน้ำ: </b><a>"+values[4]+" ม.รทก.</a><br>"
                        text += "<b style='color:#000'>ปริมาณน้ำ: </b><a>"+values[5]+" ลบ.ม./วินาที</a><br>"
                        text += "<b style='color:#000'>ปริมาณน้ำฝน: </b><a>"+values[6]+" มม.</a><br>"
                        text += "<a href='data.php?type=6&name="+code+"' class='popup-reservoir'>ดูรายละเอียดเพิ่มเติม</a><br>"
                        showDialog(text)

                    }).fail(function() {
                        // if posting your form failed
                        alert("Posting failed.");
                    });
                }else if(features[i]['values_']['name']=='Customer' || keys_check.includes('customer_code')){
                    code = features[i]['values_']['data']['properties']['customer_code']
                    console.log('info_dam.php?res_code='+code+"&type=Customer")
                    $.ajax({
                        url: 'info_dam.php?res_code='+code+"&type=Customer",
                    }).done(function(val) {
                        let values = val.split(',')
                        console.log(val)

                        let temp_date = values[2].replace(' ','').split('-')
                        text += "<b style='color:#000'>"+values[0]+"</b><br>"
                        text += "<b style='color:#000'>ที่ตั้ง: </b><a>"+values[1]+"</a><br>"
                        text += "<b style='color:#000'>ข้อมูลวันที่: </b><a>"+temp_date[2]+'/'+temp_date[1]+'/'+(parseInt(temp_date[0])+543)+"</a><br>"
                        text += "<b style='color:#000'>ปริมาณการใช้น้ำ: </b><a>"+values[3]+" ม.รทก.</a><br>"
                        text += "<a href='data.php?type=4&name="+code+"' class='popup-reservoir'>ดูรายละเอียดเพิ่มเติม</a><br>"
                        showDialog(text)

                    }).fail(function() {
                        // if posting your form failed
                        alert("Posting failed.");
                    });
                }else if(keys_check.includes("pump_name") || keys_check.includes('pump_code')){
                    console.log(features[i]['values_']['data']['properties'])
                    code = features[i]['values_']['data']['properties']['pump_code']
                    console.log('info_dam.php?res_code='+code+"&type=Pump")
                    $.ajax({
                        url: 'info_dam.php?res_code='+code+"&type=Pump",
                    }).done(function(val) {
                        let values = val.split(',')
                        console.log(val)

                        let temp_date = values[2].replace(' ','').split('-')
                        text += "<b style='color:#000'>สถานี: </b><a>"+values[0]+"</a><br>"
                        text += "<b style='color:#000'>ที่ตั้ง: </b><a>"+values[1]+"</a><br>"
                        text += "<b style='color:#000'>ข้อมูลวันที่: </b><a>"+temp_date[2]+'/'+temp_date[1]+'/'+(parseInt(temp_date[0])+543)+"</a><br>"
                        text += "<b style='color:#000'>ปริมาณการสูบ: </b><a>"+values[3]+" ลบ.ม./วินาที</a><br>"
                        text += "<a href='data.php?type=2&name="+code+"' class='popup-reservoir'>ดูรายละเอียดเพิ่มเติม</a><br>"
                        showDialog(text)

                    }).fail(function() {
                        // if posting your form failed
                        alert("Posting failed.");
                    });
                }

                /*
				$.ajax({
                    type: 'POST',
                    url: 'info_dam.php',
                    data: data_body
                }).done(function(val) {
                    console.log(val)
                    text = "<p>อ่างเก็บน้ำ"+val+"</p>"+text
                    text += "<a href='?page=data&key=อ่างเก็บน้ำ"+val.replace(' ','')+"' class='link'>แสดงเพิ่มเติม</a>"
                    showDialog(text)
                }).fail(function() {
                    // if posting your form failed
                    alert("Posting failed.");
                });
                */

        }
    }
}

// Adds the mousemove event listener to the document.
positionMouse = []
document.addEventListener('mousemove',(e)=>{
    positionMouse[0] = (e.clientY)
    positionMouse[1] = (e.clientX)

    corX = e.clientX
    corY = e.clientY
})

// Displays the click dialog.
document.addEventListener('click',()=>{
    document.getElementById("dialog_temp").style.display = "none"
    click_dialog = false
})

// Remove feature info from a marker.
function removefeatureInfo(markerName) {
    //popups[markerName].popup.hide()
    popups[markerName].popup.setPosition(undefined)
}

// Generate a template for a given marker.
function getTemplateForMarker(markerType, data) {
    if (markerType == 'Village') {
        var str = data.properties.v_name_t + '<br />' +
            data.properties.tambon + '<br />' +
            data.properties.district + '<br />' +
            data.properties.province
        return str
    } else if (markerType == 'dams') {
        var str = data.properties.DAM_ID
        return str
    } else if (markerType == 'Trans_Station') {
        var str = data.properties.TFac_PT_Name_T
        return str
    } else if (markerType == 'River_Distance') {
        var str = 'กม.ที่ ' + data.properties.River_Distance + '<br />' +
            'แม่น้ำ ' + data.properties.River_Name
        return str
    } else if (markerType == 'Reservoir') {
        var str = data.properties.res_name + '<br />' +
            'จ.' + data.properties.province + '<br />' +
            'ความจุ ' + data.properties.vol_mcm + ' ล้าน ลบ.ม.'
        return str
    } else if (markerType == 'Irr_Project') {
        var str = data.properties.Irr_Project_Name_T
        return str
    } else if (markerType == 'Irr_Pump') {
        var str = 'สถานี: ' + data.properties.IRR_Name_T + '<br />' +
            'รหัส: ' + data.properties.IRR_PUMP_ID + '<br />' +
            data.properties.Tambon_Name_T + '<br />' +
            data.properties.District_Name_T + '<br />' +
            data.properties.Province_Name_T
        return str
    } else if (markerType == 'Well') {
        var str = 'สถานที่เจาะ: ' + data.properties.Well_Site + '<br />' +
            'รหัส: ' + data.properties.Well_ID + '<br />' +
            'ตำบล: ' + data.properties.SubDistrict + '<br />' +
            'อำเภอ: ' + data.properties.District + '<br />' +
            'จังหวัด: ' + data.properties.Province
        return str
    } else if (markerType == 'Weather_Station') {
        var str = 'สถานี: ' + data.properties.Weather_station_Name_T
        return str
    } else if (markerType == 'Rain_Station') {
        var str = 'สถานีวัดน้ำฝน: ' + data.properties.Rain_Station_Code
        return str
    } else if (markerType == 'Level_Station') {
        var str = 'สถานีวัดน้ำท่า: ' + data.properties.Level_Station_Code
        return str
    } else if (markerType == 'Bridge') {
        var str = data.properties.Name
        return str
    } else if (markerType == 'Diversion_Dam') {
        var str = data.properties.Name
        return str
    } else if (markerType == 'Weir') {
        var str = data.properties.Name
        return str
    } else if (markerType == 'Regulator') {
        var str = data.properties.Name
        return str
    } else if (markerType == 'Levee') {
        var str = data.properties.Name
        return str
    } else if (markerType == 'Polder') {
        var str = data.properties.Name
        return str
    } else if (markerType == 'Culvert') {
        var str = data.properties.Name
        return str
    } else if (markerType == 'Factory') {
        var str = 'โรงงาน: ' + data.properties.Factory_Name
        return str
    } else if (markerType == 'Wetland') {
        var str = data.properties.Name_Full
        return str
    } else if (markerType == 'Cross_Section') {
        const imgPath = './survey/xs/';
        // var imgName1 = data.properties.Cross_Section;
        // var imgName2 = data.properties.Node_Descr;
        var imgName1 = data.properties.Xsection_No + "-1.jpg";
        var imgName2 = data.properties.Xsection_No + "-2.jpg";
        //var imgWidth = data.properties.Node_Km;

        // ใช้รูปตัวอย่าง
        // var imgName1 = 'XS-sample-1.jpg';
        // var imgName2 = 'XS-sample-2.jpg';
        var imgWidth = '40vw';

        // check file exists
        var checkfile = imgPath + imgName1
        var http = new XMLHttpRequest();
        http.open('HEAD', checkfile, false);
        http.send();
        // alert (http.status)

        if (http.status == 404) {
            return (imgName1 === "") ? undefined : imgNamexxx;
        }
        var str = '<h4> รูปตัดน้ำที่ ' + imgName1.replace(/\.[^/.]+$/, "") + '</h4>';
        str += '<div id="imgXSBox"><img src="' + imgPath + imgName1 + '" style="width:' + imgWidth + '" /></div>';
        str += '<text id="imgXSname" style="cursor: pointer;" onclick="InsertXSImg(\'' + imgPath + '\',\'' + imgName1 + '\',\'' + imgName2 + '\',\'' + imgWidth + '\')"> แสดงรูปที่ 2 ▷▶ </text>';
        console.log(str);
        return str;
    } else if (markerType == 'MapControl') {
        const imgPath = './survey/mapct/';
        var imgName1 = data.properties.mapct + "-1.jpg";
        var imgName2 = data.properties.mapct + "-2.jpg";

        // ใช้รูปตัวอย่าง
        // var imgName1 = 'GPS-sample-1.jpg';
        // var imgName2 = 'GPS-sample-2.jpg';
        // Portrait 25vw, Landscape 40vw
        var imgWidth = "25vw";

        // check file exists
        var checkfile = imgPath + imgName1
        var http = new XMLHttpRequest();
        http.open('HEAD', checkfile, false);
        http.send();
        // alert (http.status)

        if (http.status == 404) {
            return (imgName1 === "") ? undefined : imgNamexxx;
        }

        var str = '<h4> หมุดหลักฐานที่ ' + imgName1.replace(/\.[^/.]+$/, "") + '</h4>';
        str += '<div id="imgMapControlBox"><img src="' + imgPath + imgName1 + '" style="width:' + imgWidth + '" /></div>';
        str += '<text id="imgMapControlname" style="cursor: pointer;" onclick="InsertMapControlImg(\'' + imgPath + '\',\'' + imgName1 + '\',\'' + imgName2 + '\',\'' + imgWidth + '\')"> แสดงรูปที่ 2 ▷▶ </text>';
        console.log(str);
        return str;

    } else if (markerType == 'Waterdepth') {
        const imgPath = './survey/waterdepth/';
        var imgName1 = data.properties.no + ".jpg";

        // ใช้รูปตัวอย่าง
        // var imgName1 = 'waterdepth-1.jpg';
        // Portrait 25vw, Landscape 40vw
        var imgWidth = "25vw";

        // check file exists
        var checkfile = imgPath + imgName1
        var http = new XMLHttpRequest();
        http.open('HEAD', checkfile, false);
        http.send();
        // alert (http.status)

        if (http.status == 404) {
            return (imgName1 === "") ? undefined : imgNamexxx;
        }

        var str = '<div><img src="' + imgPath + imgName1 + '" style="width:' + imgWidth + '" /></div>';
        return str;

    } else if (markerType == 'Floodmark') {
        const imgPath = './survey/floodmark/';
        var imgName1 = data.properties.no + ".jpg";

        // ใช้รูปตัวอย่าง
        // var imgName1 = 'floodmark-1.jpg';
        // Portrait 25vw, Landscape 40vw
        var imgWidth = "25vw";

        // check file exists
        var checkfile = imgPath + imgName1
        var http = new XMLHttpRequest();
        http.open('HEAD', checkfile, false);
        http.send();
        // alert (http.status)

        if (http.status == 404) {
            return (imgName1 === "") ? undefined : imgNamexxx;
        }

        var str = '<div><img src="' + imgPath + imgName1 + '" style="width:' + imgWidth + '" /></div>';
        return str;

    }

}

// Insert XS Image
var imgInBox = "img1";
var imgXSname;

// Inserts an XS image.
function InsertXSImg(imgPath, imgName1, imgName2, imgwidth) {
    imgName1file = imgPath + imgName1;
    imgName2file = imgPath + imgName2;
    if (imgInBox == "img1") {
        imgNo = "◀◁ แสดงรูปที่ 1";
        imgfile = imgName2file;
        imgInBox = "img2";
    } else {
        imgInBox = "img1";
        imgNo = "แสดงรูปที่ 2 ▷▶";
        imgfile = imgName1file;
    }
    document.getElementById("imgXSBox").innerHTML = '<img src="' + imgfile + '" style="width:' + imgwidth + '" />';
    document.getElementById("imgXSname").innerHTML = imgNo;
}

// Insert MapControl Image
var imgInBox = "img1";
var imgMapControlname;
function InsertMapControlImg(imgPath, imgName1, imgName2, imgwidth) {
    imgName1file = imgPath + imgName1;
    imgName2file = imgPath + imgName2;
    if (imgInBox == "img1") {
        imgNo = "◀◁ แสดงรูปที่ 1";
        imgfile = imgName2file;
        imgInBox = "img2";
    } else {
        imgInBox = "img1";
        imgNo = "แสดงรูปที่ 2 ▷▶";
        imgfile = imgName1file;
    }
    document.getElementById("imgMapControlBox").innerHTML = '<img src="' + imgfile + '" style="width:' + imgwidth + '" />';
    document.getElementById("imgMapControlname").innerHTML = imgNo;
}

$("#base-fab-menu").draggable();
$(".dialog-layer").draggable();
