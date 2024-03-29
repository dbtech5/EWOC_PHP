// ข้อมูลพื้นฐาน (BasinInfoSubmenu)

function size_text(name,number,layer){
    let size = document.getElementById('size-'+name).innerHTML
    console.log(size)
    size = parseInt(size) + (number)
    console.log(size)
    refresh_layer(name)
    document.getElementById('size-'+name).innerHTML = (size)
}


function refresh_layer(name){
    $('#'+name).click()
    setTimeout(()=>{
        console.log('#'+name)
        $('#'+name).click()
    },10)
}

// จังหวัด
$('#Province').change(function () {
    if (this.checked) {
        ilayer = this.name;
        choose_active([this.name])
        ilayerfile = './json/basicinfo/province.json';
        ifont = '16px Sriracha,sans-serif';
        itextfillcolor = 'rgba(0, 0, 0, 1)';
        itextstrokecolor = 'rgba(255, 255, 255)';
        itextstrokewidth = 4
        ifillcolor = 'rgba(0, 0, 0, 0)';
        istrokecolor = 'rgba(84, 84, 84, 1)';
        istrokewidth = 1.5;
        ilinedash = '10, 0, 10';
        ilabel = 'PROV_NAM_T';
        topojson_label(ilayer, ilayerfile, ifont, itextfillcolor, itextstrokecolor, itextstrokewidth, ifillcolor, istrokecolor, istrokewidth, ilinedash, ilabel);

    } else {
        del_active([this.name])
        removeLayer(layers[this.name],this.name)
    }
})

// อำเภอ
$('#District').change(function () {
    if (this.checked) {
        choose_active([this.name])
        ilayer = this.name;
        ilayerfile = './json/basicinfo/district.json';
        ifont = '14px Kanit, sans-serif';
        itextfillcolor = 'rgba(0, 0, 0, 1)';
        itextstrokecolor = 'rgba(255, 255, 255)';
        itextstrokewidth = 2
        ifillcolor = 'rgba(0, 0, 0, 0)';
        istrokecolor = 'rgba(99, 84, 84, 0.8)';
        istrokewidth = 1.5;
        ilinedash = '0, 0, 0, 0, 0';
        ilabel = 'AMPHOE_T';
        topojson_label(ilayer, ilayerfile, ifont, itextfillcolor, itextstrokecolor, itextstrokewidth, ifillcolor, istrokecolor, istrokewidth, ilinedash, ilabel);
    } else {
        del_active([this.name])
        removeLayer(layers[this.name],this.name)
    }
})

// ตำบล
$('#SubDistrict').change(function () {
    if (this.checked) {
        ilayer = this.name;
        ilayerfile = './json/basicinfo/subdistrict.json';
        ilayerobject = ilayer;
        ifillcolor = 'rgba(0, 0, 0, 0)';
        istrokecolor = 'rgba(128, 128, 128, 1)';
        istrokewidth = 1;
        ilinedash = '0, 0, 0';
        ilabel = 'TAM_NAM_T'
        choose_active([ilayer])
        geojson_vt(ilayer, ilayerfile, ilayerobject, ifillcolor, istrokecolor, istrokewidth, ilinedash,ilabel);

    } else {
        del_active([this.name])
        removeLayer(layers[this.name],this.name)
    }
})

// ลำน้ำ river
$('#River').change(function () {
    if (this.checked) {
        ilayer = this.name;
        ilayerfile = './json/basicinfo/river.json';
        ilayerobject = ilayer;
        ifillcolor = 'rgba(0, 0, 0, 0)';
        istrokecolor = 'rgba(15, 79, 255, 0.5)';
        istrokewidth = 1.5;
        geojson_vt(ilayer, ilayerfile, ilayerobject, ifillcolor, istrokecolor, istrokewidth);
    } else {
        removeLayer(layers[this.name],this.name)
    }
})

// แหล่งน้ำ
$('#Waterbody').change(function () {
    if (this.checked) {
        ilayer = this.name;
        ilayerfile = './json/basicinfo/waterbody.json';
        ilayerobject = ilayer;
        ifillcolor = 'rgba(15, 79, 255, 0.1)';
        istrokecolor = 'rgba(15, 79, 255, 0.5)';
        istrokewidth = 1;
        geojson_vt(ilayer, ilayerfile, ilayerobject, ifillcolor, istrokecolor, istrokewidth);
    } else {
        removeLayer(layers[this.name],this.name)
    }
})

// ถนน
$('#Road').change(function () {
    if (this.checked) {
        ilayer = this.name;
        ilayerfile = './json/basicinfo/road.json';
        ilayerobject = ilayer;
        ifillcolor = '';
        istrokecolor = '';
        istrokewidth = undefined;
        izIndex = 2;
        geojson_vt(ilayer, ilayerfile, ilayerobject, ifillcolor, istrokecolor, istrokewidth, 2);
    } else {
        removeLayer(layers[this.name],this.name)
    }
})

// ทางรถไฟ
$('#Railway').change(function () {
    if (this.checked) {
        ilayer = this.name;
        ilayerfile = './json/basicinfo/railway.json';
        ilayerobject = ilayer;
        ifillcolor = '';
        istrokecolor = '';
        istrokewidth = undefined;
        izIndex = 2;
        choose_active([ilayer])
        geojson_vt(ilayer, ilayerfile, ilayerobject, ifillcolor, istrokecolor, istrokewidth, izIndex);
    } else {
        del_active([this.name])
        removeLayer(layers[this.name],this.name)
    }
})


//---------------------------------------------------------------------------
// โครงข่ายระบบแหล่งน้ำ (WaterNetworkSubmenu)

// reservoir (main)
$('#reservoir').change(function () {
    if (this.checked) {
        choose_active(['reservoir'])
        markerName = $(this).attr('marker-id')
        ilayer = 'Reservoir_Main';
        ilayerfile = './json/waternetwork/reservoir_main.geojson';
        iconfile = './img/reservoir.png';
        iconscale = 24 / 60;
        ilabel = 'IRR_Name_T'
        point_label(ilayer, ilayerfile, iconfile, markerName, iconscale,'Reservoir_Name_T');
        let element_in_layer = document.getElementsByClassName('property-'+ilabel)
        for(let i=0;i<element_in_layer.length;i++){
            element_in_layer[i].style.display = "block"
        }
        // display popup on hover
        var element = document.getElementById("hover-Reservoir");

        var popup = new ol.Overlay({
            element: element,
            positioning: "bottom-center",
            stopEvent: false,
            offset: [0, -20]
        });
        map.addOverlay(popup);

        map.on("pointermove", function (evt) {
            var feature = map.forEachFeatureAtPixel(evt.pixel, function (feature) {
                try {
                    console.log(Object.keys(feature.get('data').properties).includes('Reservoir_Name_T'))
                    if (Object.keys(feature.get('data').properties).includes('Reservoir_Name_T')) {
                        return feature;
                    };
                } catch (error) {
                    
                }
                
            });

            let featureContent;
            
            if (feature) {
                var coordinates = feature.getGeometry().getCoordinates();
                popup.setPosition(coordinates);

                featureContent = "อ่างเก็บน้ำ: " + feature.get('data').properties.Reservoir_Name_T;
                map.getTargetElement().style.cursor = 'pointer';
                console.log(element,featureContent)
                $(element).popover({
                    placement: "top",
                    html: true,
                    content: featureContent
                });
                // change mouse cursor when over marker
                map.getTargetElement().style.cursor = 'pointer';
                $(element).popover("show");
            } else {
                $(element).popover("dispose");
                map.getTargetElement().style.cursor = '';
            }
        })

       

        markerName = $(this).attr('marker-id')
        ilayer = 'Reservoir_Reserv';
        ilayerfile = './json/waternetwork/reservoir_reserv.geojson';
        iconfile = './img/diversion_dam.png';
        iconscale = 20 / 85;
        ilabel = 'Reservoir_Reserv'
        point_label(ilayer, ilayerfile, iconfile, markerName, iconscale,'Reservoir_Name_T');

    } else {
        removeLayer(layers['Reservoir_Main'],'Reservoir_Main')
        if (markerName)
            removefeatureInfo('Reservoir_Main')
        del_active(['reservoir'])

        removeLayer(layers['Reservoir_Reserv'],'Reservoir_Reserv')
        if (markerName)
            removefeatureInfo('Reservoir_Reserv')
    }
})



// pipe
// ท่อ East Water ปัจจุบัน
$('#Pipe_Main').change(function () {
    if (this.checked) {
        ilayer = this.name;
        ilayerfile = './json/waternetwork/pipe_main.json';
        ilayerobject = ilayer;
        ifillcolor = '';
        istrokecolor = 'rgba(219, 137, 103, 1)';
        istrokewidth = 2.5;
        izIndex = 2;
        ilinedash = '0, 0, 0';
        ilabel = 'name'
        choose_active([ilayer])
        geojson_vt(ilayer, ilayerfile, ilayerobject, ifillcolor, istrokecolor, istrokewidth, ilinedash,ilabel,izIndex,);
    } else {
        del_active([this.name])
        removeLayer(layers[this.name],this.name)
    }
})

// ท่อคลองหลวง
$('#Pipe_Klongluang').change(function () {
    if (this.checked) {
        ilayer = this.name;
        ilayerfile = './json/waternetwork/pipe_klongluang.json';
        ilayerobject = ilayer;
        ifillcolor = '';
        istrokecolor = 'rgba(147, 112, 219, 1)';
        istrokewidth = 2.5;
        izIndex = 2;
        ilinedash = '0, 0, 0';
        ilabel = 'name'
        geojson_vt(ilayer, ilayerfile, ilayerobject, ifillcolor, istrokecolor, istrokewidth, ilinedash,ilabel,izIndex,);
    } else {
        removeLayer(layers[this.name],this.name)
    }
})

// ท่อคลองพระองค์ไชยานุชิต
$('#Pipe_Klongphraong').change(function () {
    if (this.checked) {
        ilayer = this.name;
        ilayerfile = './json/waternetwork/pipe_klongphraong.json';
        ilayerobject = ilayer;
        ifillcolor = '';
        istrokecolor = 'rgba(219, 137, 103, 1)';
        istrokewidth = 2.5;
        izIndex = 2;
        geojson_vt(ilayer, ilayerfile, ilayerobject, ifillcolor, istrokecolor, istrokewidth, izIndex);
    } else {
        removeLayer(layers[this.name],this.name)
    }
})

// ท่อคลองสะพาน-อ่างประแสร์
$('#Pipe_Klongsaphan-Prasae').change(function () {
    if (this.checked) {
        ilayer = this.name;
        ilayerfile = './json/waternetwork/pipe_klongsaphan-prasae.json';
        ilayerobject = ilayer;
        ifillcolor = '';
        istrokecolor = 'rgba(219, 137, 103, 1)';
        istrokewidth = 2.5;
        izIndex = 2;
        geojson_vt(ilayer, ilayerfile, ilayerobject, ifillcolor, istrokecolor, istrokewidth, izIndex);
    } else {
        removeLayer(layers[this.name],this.name)
    }
})

// ท่อประแสร์-คลองใหญ่
$('#Pipe_Prasae-Klongyai').change(function () {
    if (this.checked) {
        ilayer = this.name;
        ilayerfile = './json/waternetwork/pipe_prasae-klongyai.json';
        ilayerobject = ilayer;
        ifillcolor = '';
        istrokecolor = 'rgba(219, 137, 103, 1)';
        istrokewidth = 2.5;
        izIndex = 2;
        geojson_vt(ilayer, ilayerfile, ilayerobject, ifillcolor, istrokecolor, istrokewidth, izIndex);
    } else {
        removeLayer(layers[this.name],this.name)
    }
})

// ท่อส่งน้ำ คลองวังโตนด
$('#Pipe_Wangtanod').change(function () {
    if (this.checked) {
        ilayer = this.name;
        ilayerfile = './json/waternetwork/pipe_wangtanod.json';
        ilayerobject = ilayer;
        ifillcolor = '';
        istrokecolor = 'rgba(219, 137, 103, 1)';
        istrokewidth = 2.5;
        izIndex = 2;
        geojson_vt(ilayer, ilayerfile, ilayerobject, ifillcolor, istrokecolor, istrokewidth, izIndex);
    } else {
        removeLayer(layers[this.name],this.name)
    }
})


// pump_main
$('#Pump_Main').change(function () {
    if (this.checked) {
        markerName = $(this).attr('marker-id')
        ilayer = this.name;
        ilayerfile = './json/waternetwork/pump_main.geojson';
        iconfile = './img/pump.png';
        iconscale = 20 / 24;
        choose_active(['Pump_Main'])
        ilabel = 'name'
        let check = document.getElementById('text-Pump_Main').checked
        let isize = document.getElementById('size-Pump_Main').innerHTML/10.5
        point_label(ilayer, ilayerfile, iconfile, markerName, iconscale,'name',check,isize);

        // display popup on hover
        var element = document.getElementById("hover-Reservoir");

        var popup = new ol.Overlay({
            element: element,
            positioning: "bottom-center",
            stopEvent: false,
            offset: [0, -20]
        });
        map.addOverlay(popup);

        map.on("pointermove", function (evt) {
            var feature = map.forEachFeatureAtPixel(evt.pixel, function (feature) {

                if (feature.get('name') == 'Pump_Main') {
                    return feature;
                };
            });

            let featureContent;
            if (feature) {
                var coordinates = feature.getGeometry().getCoordinates();
                popup.setPosition(coordinates);
                console.log(feature.get('data').properties)
                featureContent = "สถานี: " + feature.get('data').properties.name;

                $(element).popover({
                    placement: "top",
                    html: true,
                    content: featureContent
                });
                // change mouse cursor when over marker
                map.getTargetElement().style.cursor = 'pointer';
                $(element).popover("show");
            } else {
                $(element).popover("dispose");
                map.getTargetElement().style.cursor = '';
            }
        })

    } else {
        removeLayer(layers[this.name],this.name)
        if (markerName)
            removefeatureInfo(this.name)
        del_active(['Pump_Main'])
    }
})

//---------------------------------------------------------------------------
// ข้อมูลสนับสนุน (SupportInfoSubmenu)

// ตำแหน่งลูกค้า Customer
$('#Customer').change(function () {
    if (this.checked) {
        markerName = $(this).attr('marker-id')
        ilayer = this.name;
        ilayerfile = './json/supportinfo/customer.geojson';
        iconfile = './img/customer.png';
        iconscale = 4 / 100;
        choose_active([ilayer])
        ilabel = 'customer_text'
        point_label(ilayer, ilayerfile, iconfile, markerName, iconscale,'name');
        // display popup on hover
        var element = document.getElementById("hover-Weather_Station");

        var popup = new ol.Overlay({
            element: element,
            positioning: "bottom-center",
            stopEvent: false,
            offset: [0, -20]
        });
        map.addOverlay(popup);
        map.on("pointermove", function (evt) {
            var feature = map.forEachFeatureAtPixel(evt.pixel, function (feature) {

                if (feature.get('name') == 'Weather_Station') {
                    return feature;
                };
            });

            let featureContent;
            if (feature) {
                var coordinates = feature.getGeometry().getCoordinates();
                popup.setPosition(coordinates);

                featureContent = "สถานี: " + feature.get('data').properties.station_th;

                $(element).popover({
                    placement: "top",
                    html: true,
                    content: featureContent
                });
                // change mouse cursor when over marker
                map.getTargetElement().style.cursor = 'pointer';
                $(element).popover("show");
            } else {
                $(element).popover("dispose");
                map.getTargetElement().style.cursor = '';
            }
        })
    } else {
        del_active([ilayer])
        removeLayer(layers[this.name],this.name)
        if (markerName)
            removefeatureInfo(this.name)

    }
})

// สถานีตรวจอากาศ Weather_Station
$('#Weather_Station').change(function () {
    if (this.checked) {
        markerName = $(this).attr('marker-id')
        ilayer = this.name;
        ilayerfile = './json/supportinfo/weather_station.geojson';
        iconfile = './img/Weather_Station.png';
        iconscale = 14 / 24;
        choose_active([ilayer])
        point_label(ilayer, ilayerfile, iconfile, markerName, iconscale, 'Weather_Station_Name_T');

        // display popup on hover
        var element = document.getElementById("hover-Weather_Station");

        var popup = new ol.Overlay({
            element: element,
            positioning: "bottom-center",
            stopEvent: false,
            offset: [0, -20]
        });
        map.addOverlay(popup);

        map.on("pointermove", function (evt) {
            var feature = map.forEachFeatureAtPixel(evt.pixel, function (feature) {

                if (feature.get('name') == 'Weather_Station') {
                    return feature;
                };
            });

            let featureContent;
            if (feature) {
                var coordinates = feature.getGeometry().getCoordinates();
                popup.setPosition(coordinates);
                console.log(feature.get('data').properties)
                if(feature.get('data').properties.Weather_Station_Name_T!=undefined){
                    featureContent = "สถานีตรวจอากาศ: " + feature.get('data').properties.Weather_Station_Name_T;

                    $(element).popover({
                        placement: "top",
                        html: true,
                        content: featureContent
                    });
                    // change mouse cursor when over marker
                    map.getTargetElement().style.cursor = 'pointer';
                    $(element).popover("show");
                }

            } else {
                $(element).popover("dispose");
                map.getTargetElement().style.cursor = '';
            }
        })
    } else {
        del_active([this.name])
        removeLayer(layers[this.name],this.name)
        if (markerName)
            removefeatureInfo(this.name)
    }
})

// สถานีวัดน้ำฝน Rain_Station
$('#Rain_Station').change(function () {
    if (this.checked) {
        markerName = $(this).attr('marker-id')
        ilayer = this.name;
        ilayerfile = './json/supportinfo/rain_station.geojson';
        iconfile = './img/Rain_Station.png';
        iconscale = 12 / 12;
        choose_active([ilayer])
        point_label(ilayer, ilayerfile, iconfile, markerName, iconscale, 'sta_code');

        // display popup on hover
        var element = document.getElementById("hover-rain_station");

        var popup = new ol.Overlay({
            element: element,
            positioning: "bottom-center",
            stopEvent: false,
            offset: [0, -20]
        });
        map.addOverlay(popup);

        map.on("pointermove", function (evt) {
            var feature = map.forEachFeatureAtPixel(evt.pixel, function (feature) {

                if (feature.get('name') == 'Rain_Station') {
                    return feature;
                };
            });

            let featureContent;
            if (feature) {
                var coordinates = feature.getGeometry().getCoordinates();
                popup.setPosition(coordinates);
                console.log(feature.get('data'))
                featureContent = "สถานีวัดน้ำฝน: " + feature.get('data').properties.sta_code;

                $(element).popover({
                    placement: "top",
                    html: true,
                    content: featureContent
                });
                // change mouse cursor when over marker
                console.log(element,featureContent)
                map.getTargetElement().style.cursor = 'pointer';
                $(element).popover("show");
            } else {
                $(element).popover("dispose");
                map.getTargetElement().style.cursor = '';
            }
        })
    } else {
        del_active([this.name])
        removeLayer(layers[this.name],this.name)
        if (markerName)
            removefeatureInfo(this.name)
    }
})


// สถานีโทรมาตร
$('#Tele_Station').change(function () {
    if (this.checked) {
        markerName = $(this).attr('marker-id')
        ilayer = this.name;
        ilayerfile = './json/supportinfo/tele_station.geojson';
        iconfile = './img/tele_station.png';
        iconscale = 10 / 200;
        choose_active([ilayer])
        point_label(ilayer, ilayerfile, iconfile, markerName, iconscale, 'sta_code');

        // display popup on hover
        var element = document.getElementById("hover-tele_station");

        var popup = new ol.Overlay({
            element: element,
            positioning: "bottom-center",
            stopEvent: false,
            offset: [0, -20]
        });
        map.addOverlay(popup);

        map.on("pointermove", function (evt) {
            var feature = map.forEachFeatureAtPixel(evt.pixel, function (feature) {               
                if (feature.get('name') == 'Tele_Station') {
                    return feature;
                };
            });

            let featureContent;
            if (feature) {
                var coordinates = feature.getGeometry().getCoordinates();
                popup.setPosition(coordinates);

                featureContent = "สถานีโทรมาตร: " + feature.get('data').properties.sta_code;

                $(element).popover({
                    placement: "top",
                    html: true,
                    content: featureContent
                });
                // change mouse cursor when over marker
                map.getTargetElement().style.cursor = 'pointer';
                $(element).popover("show");
            } else {
                $(element).popover("dispose");
                map.getTargetElement().style.cursor = '';
            }
        })
        
    } else {
        del_active([this.name])
        removeLayer(layers[this.name],this.name)
        if (markerName)
            removefeatureInfo(this.name)
    }
})


// สถานีวัดน้ำท่า Level_Station
$('#Level_Station').change(function () {
    if (this.checked) {
        markerName = $(this).attr('marker-id')
        ilayer = this.name;
        ilayerfile = './json/supportinfo/flow_station.geojson';
        iconfile = './img/Level_Station.png';
        iconscale = 14 / 12;
        choose_active([ilayer])
        point_label(ilayer, ilayerfile, iconfile, markerName, iconscale, 'Level_Station_Code');

        // display popup on hover
        var element = document.getElementById("hover-Level_Station");

        var popup = new ol.Overlay({
            element: element,
            positioning: "bottom-center",
            stopEvent: false,
            offset: [0, -20]
        });
        map.addOverlay(popup);
        map.on("pointermove", function (evt) {
            var feature = map.forEachFeatureAtPixel(evt.pixel, function (feature) {

                if (feature.get('name') == 'Level_Station') {
                    return feature;
                };
            });

            let featureContent;
            if (feature) {
                var coordinates = feature.getGeometry().getCoordinates();
                popup.setPosition(coordinates);
                if(feature.get('data').properties.Level_Station_Code!=undefined){
                    featureContent = "สถานีวัดน้ำท่า: " + feature.get('data').properties.Level_Station_Code;

                    $(element).popover({
                        placement: "top",
                        html: true,
                        content: featureContent
                    });
                    // change mouse cursor when over marker
                    map.getTargetElement().style.cursor = 'pointer';
                    $(element).popover("show");
                }

            } else {
                $(element).popover("dispose");
                map.getTargetElement().style.cursor = '';
            }
        })
    } else {
        del_active([this.name])
        removeLayer(layers[this.name],this.name)
        if (markerName)
            removefeatureInfo(this.name)
    }

})

// สถานีวัดคุณภาพน้ำ Waterquality_Station
$('#Waterquality_Station').change(function () {
    if (this.checked) {
        markerName = $(this).attr('marker-id')
        ilayer = this.name;
        ilayerfile = './json/supportinfo/wq_station.geojson';
        iconfile = './img/wq_station.png';
        iconscale = 28 / 29;
        choose_active([ilayer])
        point_label(ilayer, ilayerfile, iconfile, markerName, iconscale, 'Waterquality_Station_Code');

        // display popup on hover
        var element = document.getElementById("hover-Waterquality_Station");

        var popup = new ol.Overlay({
            element: element,
            positioning: "bottom-center",
            stopEvent: false,
            offset: [0, -20]
        });
        map.addOverlay(popup);
        map.on("pointermove", function (evt) {
            var feature = map.forEachFeatureAtPixel(evt.pixel, function (feature) {

                if (feature.get('name') == 'Waterquality_Station') {
                    return feature;
                };
            });

            let featureContent;
            if (feature) {
                var coordinates = feature.getGeometry().getCoordinates();
                popup.setPosition(coordinates);
                if(feature.get('data').properties.Waterquality_Station_Code!=undefined){
                    featureContent = "สถานีวัดคุณภาพน้ำ: " + feature.get('data').properties.Waterquality_Station_Code;

                    $(element).popover({
                        placement: "top",
                        html: true,
                        content: featureContent
                    });
                    // change mouse cursor when over marker
                    map.getTargetElement().style.cursor = 'pointer';
                    $(element).popover("show");
                }

            } else {
                $(element).popover("dispose");
                map.getTargetElement().style.cursor = '';
            }
        })
    } else {
        del_active([this.name])
        removeLayer(layers[this.name],this.name)
        if (markerName)
            removefeatureInfo(this.name)
    }

})

// สถานีระดับน้ำทะเล Tide_Station
$('#Tide_Station').change(function () {
    if (this.checked) {
        markerName = $(this).attr('marker-id')
        ilayer = this.name;
        ilayerfile = './json/supportinfo/Tide_Station.geojson';
        iconfile = './img/Tide_Station.png';
        iconscale = 6.5 / 171;
        choose_active([ilayer])
        point_label(ilayer, ilayerfile, iconfile, markerName, iconscale, 'Tide_Station_Code');

        // display popup on hover
        var element = document.getElementById("hover-Tide_Station");

        var popup = new ol.Overlay({
            element: element,
            positioning: "bottom-center",
            stopEvent: false,
            offset: [0, -20]
        });
        map.addOverlay(popup);
        map.on("pointermove", function (evt) {
            var feature = map.forEachFeatureAtPixel(evt.pixel, function (feature) {

                if (feature.get('name') == 'Tide_Station') {
                    return feature;
                };
            });

            let featureContent;
            if (feature) {
                var coordinates = feature.getGeometry().getCoordinates();
                popup.setPosition(coordinates);
                if(feature.get('data').properties.Tide_Station_Code!=undefined){
                    featureContent = "สถานีระดับน้ำทะเล: " + feature.get('data').properties.Tide_Station_Code;

                    $(element).popover({
                        placement: "top",
                        html: true,
                        content: featureContent
                    });
                    // change mouse cursor when over marker
                    map.getTargetElement().style.cursor = 'pointer';
                    $(element).popover("show");
                }

            } else {
                $(element).popover("dispose");
                map.getTargetElement().style.cursor = '';
            }
        })
        console.log('successful Tide_Station_Code')
    } else {
        del_active([this.name])
        removeLayer(layers[this.name],this.name)
        if (markerName)
            removefeatureInfo(this.name)
    }

})

// Isohyet
$('#Isohyet').change(function () {
    if (this.checked) {
        ilayer = 'Isohyet';
        ilayerfile = './json/supportinfo/' + 'Isohyet' + '.json';
        ilayerobject = 'Isohyet';
        ifillcolor = '';
        istrokecolor = '';
        istrokewidth = undefined;
        izIndex = 2;

        choose_active([this.name])
        geojson_vt(ilayer, ilayerfile, ilayerobject, ifillcolor, istrokecolor, istrokewidth, izIndex);
        /*

        ilayer = this.name;
        ilayerfile = './json/supportinfo/Isohyet.json';
        ilayerobject = ilayer;
        ifillcolor = '';
        istrokecolor = '';
        istrokewidth = undefined;
        izIndex = 2;
        choose_active([this.name])
        geojson_vt(ilayer, ilayerfile, ilayerobject, ifillcolor, istrokecolor, istrokewidth, izIndex);
        */
    } else {
        removeLayer(layers[this.name],this.name)
    }
})

// สถานีสูบน้ำ กปภ.
$('#Pump_PWA').change(function () {
    if (this.checked) {
        markerName = $(this).attr('marker-id')
        ilayer = this.name;
        ilayerfile = './json/supportinfo/pump_pwa.geojson';
        iconfile = './img/pump2.png';
        iconscale = 20 / 24;
        choose_active([ilayer])
        ilabel = 'กปภ_'
        point_label(ilayer, ilayerfile, iconfile, markerName, iconscale,ilabel);
        // display popup on hover
        var element = document.getElementById("hover-pump_pwa");

        var popup = new ol.Overlay({
            element: element,
            positioning: "bottom-center",
            stopEvent: false,
            offset: [0, -20]
        });
        map.addOverlay(popup);
        let element_in_layer = document.getElementsByClassName('property-'+ilabel)
        for(let i=0;i<element_in_layer.length;i++){
            element_in_layer[i].style.display = "block"
        }
        map.on("pointermove", function (evt) {
            var element = document.getElementById("hover-pump_pwa");
    
    
            var feature = map.forEachFeatureAtPixel(evt.pixel, function (feature) {
                
                    let list_pointer = ['pump_code','res_code']
                    let check = false
                    list_pointer.forEach(item=>{
                        //console.log(Object.keys(feature['values_']['data']['properties']).includes(item))
                        try{
                            if(Object.keys(feature['values_']['data']['properties']).includes(item) && check == false){
                                check = true
                            }
                        }catch(e){
    
                        }
                    })
                    if (check) {
                        return feature;
                    };
            });
    
            if (feature) {
                map.getTargetElement().style.cursor = 'pointer';
            } else {
                map.getTargetElement().style.cursor = '';
            }
        })

        
    } else {
        del_active([this.name])
        removeLayer(layers[this.name],this.name)
        if (markerName)
            removefeatureInfo(this.name)
    }
})

setTimeout(()=>{
    console.log('-----------------------------')
    map.on("pointermove", function (evt) {
        var element = document.getElementById("hover-pump_pwa");


        var feature = map.forEachFeatureAtPixel(evt.pixel, function (feature) {
            
                let list_pointer = ['pump_code','res_code']
                let check = false
                list_pointer.forEach(item=>{
                    //console.log(Object.keys(feature['values_']['data']['properties']).includes(item))
                    try{
                        if(Object.keys(feature['values_']['data']['properties']).includes(item) && check == false){
                            check = true
                        }
                    }catch(e){

                    }
                })
                if (check) {
                    return feature;
                };
        });

        if (feature) {
            map.getTargetElement().style.cursor = 'pointer';
        } else {
            map.getTargetElement().style.cursor = '';
        }
    })
},1000)
// สถานีสูบน้ำ รอง.
$('#Pump_Minor').change(function () {
    if (this.checked) {
        markerName = $(this).attr('marker-id')
        ilayer = this.name;
        ilayerfile = './json/supportinfo/Pump_Minor.geojson';
        iconfile = './img/pump6.png';
        iconscale = 20 / 24;
        choose_active([ilayer])
        ilabel = 'pump_name'
        point_label(ilayer, ilayerfile, iconfile, markerName, iconscale,ilabel);
        // display popup on hover
        var element = document.getElementById("hover-pump_name");

        var popup = new ol.Overlay({
            element: element,
            positioning: "bottom-center",
            stopEvent: false,
            offset: [0, -20]
        });
        map.addOverlay(popup);
        let element_in_layer = document.getElementsByClassName('property-'+ilabel)
        for(let i=0;i<element_in_layer.length;i++){
            element_in_layer[i].style.display = "block"
        }
        map.on("pointermove", function (evt) {
            var feature = map.forEachFeatureAtPixel(evt.pixel, function (feature) {
                try{
                    console.log(feature.get('name'),feature['values_']['data']['properties'])
                    if (feature['values_']['data']['properties']['pump_code']) {
                        return feature;
                    };
                }catch(e){

                }
            });

            let featureContent;
            if (feature) {
                var coordinates = feature.getGeometry().getCoordinates();
                popup.setPosition(coordinates);
                console.log(feature.get('data').properties)
                featureContent = "สถานี: " + feature.get('data').properties.pump_name;

                $(element).popover({
                    placement: "top",
                    html: true,
                    content: featureContent
                });
                // change mouse cursor when over marker
                map.getTargetElement().style.cursor = 'pointer';
                $(element).popover("show");
            } else {
                $(element).popover("dispose");
                map.getTargetElement().style.cursor = '';
            }
        })
    } else {
        del_active([this.name])
        removeLayer(layers[this.name],this.name)
        if (markerName)
            removefeatureInfo(this.name)
    }
})
// สถานีคมนาคม.
$('#Trans_Station').change(function () {
    if (this.checked) {
        markerName = $(this).attr('marker-id')
        ilayer = this.name;
        ilayerfile = './json/supportinfo/trans_station.geojson';
        iconfile = './img/transtation.png';
        iconscale = 8 / 24;
        choose_active([ilayer])
        ilabel = 'Name'
        point_label(ilayer, ilayerfile, iconfile, markerName, iconscale,ilabel);
        // display popup on hover
        var element = document.getElementById("hover-Weather_Station");

        var popup = new ol.Overlay({
            element: element,
            positioning: "bottom-center",
            stopEvent: false,
            offset: [0, -20]
        });
        map.addOverlay(popup);
        let element_in_layer = document.getElementsByClassName('property-'+ilabel)
        for(let i=0;i<element_in_layer.length;i++){
            element_in_layer[i].style.display = "block"
        }
        map.on("pointermove", function (evt) {
            var feature = map.forEachFeatureAtPixel(evt.pixel, function (feature) {

                if (feature.get('name') == 'Weather_Station') {
                    return feature;
                };
            });

            let featureContent;
            if (feature) {
                var coordinates = feature.getGeometry().getCoordinates();
                popup.setPosition(coordinates);
                console.log(feature.get('data').properties)
                featureContent = "สถานี: " + feature.get('data').properties.กปภ_;

                $(element).popover({
                    placement: "top",
                    html: true,
                    content: featureContent
                });
                // change mouse cursor when over marker
                map.getTargetElement().style.cursor = 'pointer';
                $(element).popover("show");
            } else {
                $(element).popover("dispose");
                map.getTargetElement().style.cursor = '';
            }
        })
    } else {
        del_active([this.name])
        removeLayer(layers[this.name],this.name)
        if (markerName)
            removefeatureInfo(this.name)
    }
})

// ท่อน้ำประปา กปภ.
$('#Pipe_PWA').change(function () {
    if (this.checked) {
        ilayer = this.name;
        ilayerfile = './json/supportinfo/pipe_pwa.json';
        ilayerobject = ilayer;
        ifillcolor = 'rgba(0, 0, 0, 0)';
        istrokecolor = 'rgba(48, 48, 48, 1)';
        istrokewidth = 1;
        izIndex = 2;
        ilinedash = '0, 0, 0';
        ilabel = 'TAM_NAM_T'
        //choose_active([ilayer])
        geojson_vt(ilayer, ilayerfile, ilayerobject, ifillcolor, istrokecolor, istrokewidth, izIndex);
    } else {
        removeLayer(layers[this.name],this.name)
    }
})

// นิคมอุตสาหกรรม Industrial
$('#Industrial').change(function () {
    if (this.checked) {
        var labelStyle = new ol.style.Style({
            text: new ol.style.Text({
                font: '14px Calibri,sans-serif',
                overflow: true,
                fill: new ol.style.Fill({
                    color: 'rgba(0, 0, 0, 1)'
                }),
                stroke: new ol.style.Stroke({
                    color: '#fff',
                    width: 2
                })
            })
        });

        var IndustrialStyle = new ol.style.Style({
            fill: new ol.style.Fill({
                color: 'rgba(255, 73, 76, 0.4)'
            }),
            stroke: new ol.style.Stroke({
                color: 'rgba(181, 52, 54, 0.8)',
                width: 2
            })
        });
        var style = [IndustrialStyle, labelStyle];

        layers['Industrial'] = new ol.layer.Vector({
            source: new ol.source.Vector({
                url: './json/Support/Industrial.json',
                format: new ol.format.TopoJSON()
            }),
            style: function (feature) {

                var geometry = feature.getGeometry();
                if (geometry.getType() == 'MultiPolygon') {
                    // Only render label for the widest polygon of a multipolygon
                    var polygons = geometry.getPolygons();
                    var widest = 0;
                    for (var i = 0, ii = polygons.length; i < ii; ++i) {
                        var polygon = polygons[i];
                        var width = ol.extent.getWidth(polygon.getExtent());
                        if (width > widest) {
                            widest = width;
                            geometry = polygon;
                        }
                    }
                }
                // Check if default label position fits in the view and move it inside if necessary
                geometry = geometry.getInteriorPoint();
                var size = map.getSize();
                var extent = map.getView().calculateExtent([size[0] - 12, size[1] - 12]);
                var textAlign = 'center';
                var coordinates = geometry.getCoordinates();
                if (!geometry.intersectsExtent(extent)) {
                    geometry = new ol.geom.Point(ol.geom.Polygon.fromExtent(extent).getClosestPoint(coordinates));
                    // Align text if at either side
                    var x = geometry.getCoordinates()[0];
                    if (x > coordinates[0]) {
                        textAlign = 'left';
                    }
                    if (x < coordinates[0]) {
                        textAlign = 'right';
                    }
                }

                labelStyle.setGeometry(geometry);
                labelStyle.getText().setText(feature.get('Industrial_Name'));
                labelStyle.getText().setTextAlign(textAlign);
                return style;
            },
            declutter: true,
            renderBuffer: 1  // If left at default value labels will appear when countries not visible
        });
        addLayer(layers['Industrial'])
    } else {
        removeLayer(layers['Industrial'],'Industrial')
    }
});

// โรงงาน Factory
$('#Factory').change(function () {
    if (this.checked) {
        markerName = $(this).attr('marker-id')
        ilayer = this.name;
        ilayerfile = './json/Support/' + ilayer + '.geojson';
        iconfile = './img/factory.png';
        iconscale = 20 / 22;
        choose_active([ilayer])
        point_label(ilayer, ilayerfile, iconfile, markerName, iconscale);
        // display popup on hover
        var element = document.getElementById("hover-Factory");

        var popup = new ol.Overlay({
            element: element,
            positioning: "bottom-center",
            stopEvent: false,
            offset: [0, -20]
        });
        map.addOverlay(popup);

        map.on("pointermove", function (evt) {
            var feature = map.forEachFeatureAtPixel(evt.pixel, function (feature) {
                if (feature.get('name') == 'Factory') {
                    return feature;
                };
            });
            let featureContent;
            if (feature) {
                var coordinates = feature.getGeometry().getCoordinates();
                popup.setPosition(coordinates);

                featureContent = feature.get('data').properties.Factory_Name;

                $(element).popover({
                    placement: "top",
                    html: true,
                    content: featureContent
                });
                // change mouse cursor when over marker
                map.getTargetElement().style.cursor = 'pointer';
                $(element).popover("show");
            } else {
                $(element).popover("dispose");
                map.getTargetElement().style.cursor = '';
            }
        });

    } else {
        del_active([this.name])
        removeLayer(layers[this.name],this.name)
        if (markerName)
            removefeatureInfo(this.name)
    }
})

// Contour
$('#Contour').change(function () {
    if (this.checked) {
        ilayer = this.name;
        ilayerfile = './json/Topo/' + ilayer + '.json';
        ilayerobject = ilayer;
        ifillcolor = '';
        istrokecolor = '';
        istrokewidth = 1;
        geojson_vt(ilayer, ilayerfile, ilayerobject, ifillcolor, istrokecolor, istrokewidth);

        layerzoom = 10;
        var actualZoom = map.getView().getZoom();
        if (actualZoom < layerzoom) {
            map.getView().animate({
                //center: ol.proj.fromLonLat([103, 15.0500]),
                duration: 3500,
                zoom: layerzoom
            });
        }


    } else {
        removeLayer(layers[this.name],this.name)
    }
    toggleInfoWithCheckbox(this.checked, this)
})

// แปลงที่ดิน Parcel
$('#Parcel').change(function () {
    if (this.checked) {
        ilayer = this.name;
        ilayerfile = './json/Support/' + ilayer + '.json';
        ilayerobject = ilayer;
        ifillcolor = 'rgba(163, 200, 255, 0)';
        istrokecolor = 'rgba(255, 0, 0, 0.8)';
        istrokewidth = 1;
        izIndex = undefined;
        maxres = 50;
        geojson_vt(ilayer, ilayerfile, ilayerobject, ifillcolor, istrokecolor, istrokewidth, izIndex, maxres);

        layerzoom = 15;
        var actualZoom = map.getView().getZoom();
        if (actualZoom < layerzoom) {
            map.getView().animate({
                //center: ol.proj.fromLonLat([103, 15.0500]),
                duration: 2500,
                zoom: layerzoom
            });
        }
    } else {
        removeLayer(layers[this.name],this.name)
    }
})

$("#RainPrediction").change(function () {
    if (this.checked) {
        layers['RainPrediction'] = new ol.layer.Tile({
            source: new ol.source.XYZ({
                url: 'http://realearth.ssec.wisc.edu/tiles/NESDIS-GHE-HourlyRainfall/{z}/{x}/{y}.png'
            })
        });
        addLayer(layers['RainPrediction']);
    } else {
        removeLayer(layers[this.name],this.name)
    }
    toggleInfoWithCheckbox(this.checked, this)
})

$("#StudyArea").change(function () {
    if (this.checked) {
        ilayer = this.name;
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

    } else {
        //del_active([this.name])
        removeLayer(layers[this.name],this.name)
    }
})
