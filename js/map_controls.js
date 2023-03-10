var map;
var layers = {};


// Shows the menu.
var startPoint = []
var vectorSources = {};
var showFeatureLayers = [];
var menuOpened = true;
var zoom_change = 0
var zoomDisplay = false

// popups
var popups = {};
var popupTypes = [
    'Village',
    'Trans_Station',
    'River_Distance',
    'Reservoir',
    'Irr_Project',
    'Irr_Pump',
    'Well',
    'Weather_Station',
    'Rain_Station',
    'Level_Station',
    'Bridge',
    'Diversion_Dam',
    'Weir',
    'Regulator',
    'Levee',
    'Polder',
    'Culvert',
    'Cross_Section',
    'MapControl',
    'Waterdepth',
    'Floodmark',
    'Wetland',
    'Factory'
]

$.each(popupTypes, function (i, data) {
    var popupContainer = document.getElementById('popup-' + data)
    var popupCloser = document.getElementById('popup-closer-' + data)
    var popupContent = document.getElementById('popup-content-' + data)
    popups[data] = {
        popup: new ol.Overlay({
            element: popupContainer,
            autoPan: true,
            autoPanAnimation: {
                duration: 250
            }
        }),
        container: popupContainer,
        content: popupContent,
        closer: popupCloser
    }

    popups[data].popup.setOffset([0, -20]);
    popupCloser.onclick = function () {
        popups[data].popup.setPosition(undefined)
        this.blur()
        return false
    }
})

var toggle_header_action = false

// Gets the element nav and margin top
try{
    document.getElementsByClassName('element-nav')[0].style.top = "0px"
    document.getElementsByClassName('ol-viewport')[0].style.top = "0px"
    document.getElementById('sidebar').style.top = "121px"
    document.getElementById('control-fab').style.marginTop = "20px"
    document.getElementsByClassName('tooltip_menu')[0].style.top = "0px"
    document.getElementsByClassName('fa-chevron-down')[0].style.display = "none"
    document.getElementsByClassName('fa-chevron-up')[0].style.display = "inline-block"
    document.getElementsByClassName('tooltip_menu')[0].style.display = 'none'
}catch(err){

}


// Toggle the header of the tooltip
function toggleHeader(){
    let top = document.getElementsByClassName('element-nav')[0].style.top
    toggle_header_action = !toggle_header_action
    console.log(toggle_header_action)
    if(toggle_header_action){
        document.getElementsByClassName('element-nav')[0].style.top = "-100px"
        document.getElementsByClassName('ol-viewport')[0].style.top = "-100px"
        document.getElementById('sidebar').style.top = "30px"
        document.getElementById('control-fab').style.marginTop = "-80px"
        document.getElementsByClassName('tooltip_menu')[0].style.top = "-100px"
        document.getElementsByClassName('fa-chevron-down')[0].style.display = "inline-block"
        document.getElementsByClassName('fa-chevron-up')[0].style.display = "none"
        document.getElementsByClassName('tooltip_menu')[0].style.display = 'none'
    }else{
        document.getElementsByClassName('tooltip_menu')[0].style.display = 'none'
        document.getElementsByClassName('element-nav')[0].style.top = "0px"
        document.getElementsByClassName('ol-viewport')[0].style.top = "0px"
        document.getElementById('sidebar').style.top = "130px"
        document.getElementById('control-fab').style.marginTop = "20px"
        document.getElementsByClassName('tooltip_menu')[0].style.top = "0px"
        document.getElementsByClassName('fa-chevron-down')[0].style.display = "none"
        document.getElementsByClassName('fa-chevron-up')[0].style.display = "inline-block"
    }
}


// start
$(document).ready(function () {
    $('#map_filters').trigger("reset");
    $('.scrollbar-inner').scrollbar();

    document.getElementsByClassName('tooltip_menu')[0].style.display = 'none'

    $('#closebtn').on('click', function () {
        $('#sidebar').css("left","-800px")
        document.getElementsByClassName('tooltip_menu')[0].style.display = 'block'
    });

    $('#filter_icon').on('click', function () {
        $('#sidebar').css("left","64px")
        document.getElementsByClassName('tooltip_menu')[0].style.display = 'none'
    });

    // start layer
    $("#WaterNetworkSubmenu").addClass('show')
    $("#BasicInfoSubmenu").addClass('show')

    $('#Water_group').prop('checked', true)
    $("#Water_group").trigger("change")

    $('#reservoir').prop('checked', true)
    $("#reservoir").trigger("change")

    $('#Watersource_group').prop('checked', true)
    $("#Watersource_group").trigger("change")

    $('#Pipe_group').prop('checked', false)
    $("#Pipe_group").trigger("change")

    $('#Pipe_Main').prop('checked', true)
    $("#Pipe_Main").trigger("change")
/*
    $('#Pipe_Main').prop('checked', true)
    $("#Pipe_Main").trigger("change")
    $('#Pipe_Klongluang').prop('checked', true)
    $("#Pipe_Klongluang").trigger("change")
*/

    $('#Pipe_group').prop('checked', true)
    $("#Pipe_group").trigger("change")

    $('#StudyArea').prop('checked', true)
    $("#StudyArea").trigger("change")




});

var view = new ol.View({
    minZoom: 8,
    maxZoom: 20,
    center: ol.proj.fromLonLat([101.3485, 13.2003]),
    zoom: 9.7,
    //extent: ol.proj.transformExtent([101.2, 14, 105.6, 16.5],'EPSG:4326', 'EPSG:3857')
    extent: ol.proj.transformExtent([100.5, 12, 106.6, 18.5],'EPSG:4326', 'EPSG:3857')
})
// Measure map
var drawing = false
var currentInterActionType
var draw;
/**
    * Currently drawn feature.
    * @type  {module:ol/Feature~Feature}
    */
var sketch;

/**
    * The help tooltip element.
    * @type  {Element}
    */
var helpTooltipElement;

/**
    * Overlay to show the help messages.
    * @type  {module:ol/Overlay}
    */
var helpTooltip;

/**
    * The measure tooltip element.
    * @type  {Element}
    */
var measureTooltipElement;

/**
    * Overlay to show the measurement.
    * @type  {module:ol/Overlay}
    */
var measureTooltip;

/**
    * Message to show when the user is drawing a polygon.
    * @type  {string}
    */
var continuePolygonMsg = 'Click to continue drawing the polygon';

/**
    * Message to show when the user is drawing a line.
    * @type  {string}
    */
var continueLineMsg = 'Click to continue drawing the line';

var source = new ol.source.Vector();

var vector = new ol.layer.Vector({
    source: source,
    style: new ol.style.Style({
        fill: new ol.style.Fill({
            color: 'rgba(255, 255, 255, 0.2)'
        }),
        stroke: new ol.style.Stroke({
            color: '#ffcc33',
            width: 2
        }),
        image: new ol.style.Circle({
            radius: 7,
            fill: new ol.style.Fill({
                color: '#ffcc33'
            })
        })
    })
});

var pointerMoveHandler = function (evt) {

    if (!drawing) {
        return;
    }

    if (evt.dragging) {
        return;
    }
    /** @type  {string} */
    var helpMsg = 'Click to start drawing';

    if (sketch) {
        var geom = (sketch.getGeometry());
        if (geom instanceof ol.geom.Polygon) {
            helpMsg = continuePolygonMsg;
        } else if (geom instanceof ol.geom.LineString) {
            helpMsg = continueLineMsg;
        }
    }

    if (helpTooltipElement !== undefined) {
        helpTooltipElement.innerHTML = helpMsg;
        helpTooltip.setPosition(evt.coordinate);
        helpTooltipElement.classList.remove('hidden');
    }
};

var formatLength = function (line) {
    var length = ol.sphere.getLength(line);
    var output;
    if (length > 100) {
        output = (Math.round(length / 1000 * 100) / 100) +
            ' ' + '??????.';
    } else {
        output = (Math.round(length * 100) / 100) +
            ' ' + '???.';
    }
    return output;
};

var formatArea = function (polygon) {
    var area = ol.sphere.getArea(polygon);
    var output;
    if (area > 10000) {
        output = (Math.round(area / 1000000 * 100) / 100) +
            ' ' + '??????.??????.';
    } else {
        output = (Math.round(area * 100) / 100) +
            ' ' + '??????.???.';
    }
    return output;
};

function createHelpTooltip() {
    if (helpTooltipElement !== undefined) {
        helpTooltipElement.parentNode.removeChild(helpTooltipElement);
    }
    helpTooltipElement = document.createElement('div');
    helpTooltipElement.className = 'tooltip hidden';
    helpTooltip = new ol.Overlay({
        element: helpTooltipElement,
        offset: [15, 0],
        positioning: 'center-left'
    });
    map.addOverlay(helpTooltip);
}

function createMeasureTooltip() {
    if (measureTooltipElement) {
        measureTooltipElement.parentNode.removeChild(measureTooltipElement);
    }
    measureTooltipElement = document.createElement('div');
    measureTooltipElement.className = 'tooltip tooltip-measure';
    measureTooltip = new ol.Overlay({
        element: measureTooltipElement,
        offset: [0, -15],
        positioning: 'bottom-center'
    });
    map.addOverlay(measureTooltip);
}


function addInteraction() {
    //var type = 'Polygon' //(typeSelect.value == 'area' ? 'Polygon' : 'LineString');

    if (draw !== undefined)
        map.removeInteraction(draw);

    if(!zoomDisplay){
        draw = new ol.interaction.Draw({
            source: source,
            type: currentInterActionType,
            style: new ol.style.Style({
                fill: new ol.style.Fill({
                    color: 'rgba(255, 255, 255, 0.4)'
                }),
                stroke: new ol.style.Stroke({
                    color: 'rgba(0, 0, 0, 0.5)',
                    lineDash: [10, 10],
                    width: 2
                }),
                image: new ol.style.Circle({
                    radius: 5,
                    stroke: new ol.style.Stroke({
                        color: 'rgba(0, 0, 0, 0.7)'
                    }),
                    fill: new ol.style.Fill({
                        color: 'rgba(255, 255, 255, 0.2)'
                    })
                }),
                zIndex: 998
            })
        });
    }else{
        value = 'Circle';
        let geometryFunction = new ol.interaction.Draw.createBox();
        draw = new ol.interaction.Draw({
            source: source,
            type: value,
            geometryFunction: geometryFunction,
        });
    }


    map.addInteraction(draw);

    createMeasureTooltip();
    createHelpTooltip();
    let endPoint = 0
    var listener;
    draw.on('drawstart', function (evt) {
        // set sketch
        sketch = evt.feature;
        /** @type  {module:ol/coordinate~Coordinate|undefined} */
        var tooltipCoord = evt.coordinate;
        listener = sketch.getGeometry().on('change', function (evt) {
            var geom = evt.target;
            var output;
            if (geom instanceof ol.geom.Polygon) {
                output = formatArea(geom);
                tooltipCoord = geom.getInteriorPoint().getCoordinates();
            } else if (geom instanceof ol.geom.LineString) {
                output = formatLength(geom);
                tooltipCoord = geom.getLastCoordinate();
            }
            measureTooltipElement.innerHTML = output;
            measureTooltip.setPosition(tooltipCoord);
            if(zoomDisplay == 1){
                zoomDisplay = 2
            }
            console.log('change',zoomDisplay)
        });
    }, this);

    draw.on('drawend', function () {
        console.log('display:',zoomDisplay)
        measureTooltipElement.className = 'tooltip tooltip-static';
        measureTooltip.setOffset([0, -7]);
        // unset sketch
        sketch = null;
        // unset tooltip so that a new one can be created
        measureTooltipElement = null;
        createMeasureTooltip();
        ol.Observable.unByKey(listener);

        if(zoomDisplay == 2 || zoomDisplay == 1){
            setTimeout(()=>{
                zoomDisplay = false
                let maxLat = 0
                let maxLong = 0
                let minLat = 9999
                let minLong = 9999
                for(let i =0;i<startPoint.length;i++){
                    let temp = [startPoint[i][0],startPoint[i][1]]
                    if(maxLat < temp[0]){
                        maxLat = temp[0]
                    }
                    if(maxLong < temp[1]){
                        maxLong = temp[1]
                        //maxLat = temp[0]
                    }
                    if(minLat > temp[0]){
                        minLat = temp[0]
                    }
                    if(minLong > temp[1]){
                        minLong = temp[1]
                        //minLat = temp[0]
                    }
                }
                /*
                minLat = startPoint[0][1]
                minLong = startPoint[0][0]

                maxLat = startPoint[startPoint.length-1][1]
                maxLong = startPoint[startPoint.length-1][0]
                */
                //console.log()
                var lat_lng = [((maxLong+minLong)/2),((maxLat+minLat)/2)]
                console.log(lat_lng)
                console.log(minLat,minLong,maxLat,maxLong)

                //extent: ol.proj.transformExtent([100.5, 12, 106.6, 18.5],'EPSG:4326', 'EPSG:3857')

                map.getView().fit(
                    ol.proj.transformExtent([minLong,minLat,maxLong,maxLat].reverse(),'EPSG:4326','EPSG:3857'),
                    map.getSize()
                )

                map.getView().animate({
                    center: ol.proj.fromLonLat(lat_lng.reverse()),
                    duration: 0,
                    zoom: map.getView().getZoom()+0.5
                });

                setTimeout(function(){
                    stopInterAction()
                },10)
                startPoint = []
            },0)
        }

    }, this);
}

function stopInterAction() {
    drawing = false
    source.clear()
    map.removeInteraction(draw);
    $('.tooltip-static').remove()
    $('.tooltip').hide()
    console.log('stop interaction ')
}

function startInterAction(type) {
    //stopInterAction()
    console.log('start interaction : ', type)
    currentInterActionType = type
    $('.tooltip').show()
    //if(!drawing)
    addInteraction();

    drawing = true
}


var formatMousePosition = function (dgts) {
    return (
        function (coord1) {


            var coord2 = [coord1[1], coord1[0]];
            var utm = new UTMLatLng();
            //var utmData = ol.proj.transform(coord1, 'EPSG:4326','EPSG:900913')
            var utm2 = utm.convertLatLngToUtm(coord1[1], coord1[0], 0.1)

            //console.log('utmData', utmData, utm2)
            latlng_hist = ol.coordinate.toStringXY(coord2, dgts).split(",")
            if(zoomDisplay == 2){
                startPoint.push([parseFloat(latlng_hist[1]),parseFloat(latlng_hist[0])])
                console.log([parseFloat(latlng_hist[1]),parseFloat(latlng_hist[0])])

            }

            //console.log(ol.coordinate.toStringXY(coord2, dgts),corX,corY)
            return ol.coordinate.toStringXY(coord2, dgts) + '<br> UTM : ' + utm2.Easting + ',' + utm2.Northing
        });
}

var mousePositionControl = new ol.control.MousePosition({
    coordinateFormat: formatMousePosition(4),
    projection: 'EPSG:4326',
    // comment the following two lines to have the mouse position
    // be placed within the map.
    className: 'custom-mouse-position',
    target: document.getElementById('mouse-position'),
    undefinedHTML: '&nbsp;'
});
/********** End for measure map ***************/

// Base Map
map = new ol.Map({
    controls: ol.control.defaults().extend([mousePositionControl,new ol.control.FullScreen()]),
    target: 'content',
    layers: [
        new ol.layer.Tile({
            title: "?????????????????????",
            type: "base",
            visible: false,
            source: new ol.source.OSM({
                url: "",
            })
        }),
        new ol.layer.Tile({
            type: "base",
            title: "Toner BW",
            source: new ol.source.XYZ({
                url: 'https://stamen-tiles.a.ssl.fastly.net/toner/{z}/{x}/{y}.png'
            }),
            visible: false,
        }),
        new ol.layer.Tile({
            type: "base",
            title: "Terrain",
            source: new ol.source.XYZ({
                url: 'https://stamen-tiles.a.ssl.fastly.net/terrain/{z}/{x}/{y}.jpg'
            }),
            visible: false,
        }),
        new ol.layer.Tile({
            title: "??????????????????????????????????????????",
            type: "base",
            visible: false,
            source: new ol.source.XYZ({
                url: 'http://go-tiles1.gistda.or.th/mapproxy/wmts/thaichote/GLOBAL_WEBMERCATOR/{z}/{x}/{y}.png'
            }),
        }),
        new ol.layer.Tile({
            type: "base",
            title: "ESRI Light Gray",
            source: new ol.source.XYZ({
                url: 'http://services.arcgisonline.com/ArcGIS/rest/services/Canvas/World_Light_Gray_Base/MapServer/tile/{z}/{y}/{x}'
            }),
            visible: false,
        }),
        new ol.layer.Tile({
            type: "base",
            title: "ESRI Imagery",
            source: new ol.source.XYZ({
                url: 'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}'
            }),
            visible: false,
        }),
        new ol.layer.Tile({
            type: "base",
            title: "ESRI Topo",
            source: new ol.source.XYZ({
                url: 'https://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}'
            }),
            visible: false,
        }),
        new ol.layer.Tile({
            title: "Google Terrain",
            type: "base",
            visible: true,
            source: new ol.source.OSM({
                url: "https://mt1.google.com/vt/lyrs=p&x={x}&y={y}&z={z}",
            })
        }),
        new ol.layer.Tile({
            title: "Google Street Map",
            type: "base",
            visible: false,
            source: new ol.source.OSM({
                url: "http://mt{0-3}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}",
            })
        }),
        new ol.layer.Tile({
            title: "Google Map",
            type: "base",
            visible: false,
            source: new ol.source.OSM({
                url: "http://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}",
            })
        }),
        new ol.layer.Tile({
            type: "base",
            title: "Open Topo Map",
            source: new ol.source.XYZ({
                url: 'https://tile.opentopomap.org/{z}/{x}/{y}.png'
            }),
            visible: false,
        }),
        new ol.layer.Tile({
            type: "base",
            title: "Open Street Map",
            source: new ol.source.OSM(),
            // source: new ol.source.XYZ({
            //     url: 'https://tile.openstreetmap.org/{z}/{x}/{y}.png'
            // }),
            visible: false,
        }),
        vector
    ],
    view: view
});

// Control button

// toggle Layer

var toggle_dialog = false

function toggleDialog(close = -1){
    toggle_dialog = !toggle_dialog
    if(close != -1){
        toggle_dialog = close
    }
    if(toggle_dialog){
        document.getElementsByClassName('dialog-layer')[0].style.display = "block"
    }else{
        document.getElementsByClassName('dialog-layer')[0].style.display = "none"
    }
}

// layer

var Layer = document.createElement('button');
Layer.innerHTML = '<a href="#" data-toggle="tooltip" title="Setting"><i class="fa fa-gear" /></a>';
Layer.addEventListener('click', function () {
    toggleDialog()
});

// Home
var button = document.createElement('button');
button.innerHTML = '<a href="#" data-toggle="tooltip" title="Home"><i class="fa fa-home" /></a>';
button.addEventListener('click', function () {
    // setCenter(15.1600, 103.4651, 8)

    map.getView().animate({
        center: ol.proj.fromLonLat([101.3485, 13.2003]),
        duration: 2500,
        zoom: 9.7
    });
});

// Draw Line
var buttonLine = document.createElement('button');
buttonLine.innerHTML = '<a href="#" data-toggle="tooltip" title="Line"><i class="fas fa-slash"></i></a>';
buttonLine.addEventListener("click", function () {
    zoomDisplay = false
    startInterAction('LineString')
});

// Draw Polygon
var buttonPolygon = document.createElement('button');
buttonPolygon.innerHTML = '<a href="#" data-toggle="tooltip" title="Polygon"<i class="fas fa-draw-polygon"></i></a>';
buttonPolygon.addEventListener("click", function () {
    zoomDisplay = false
    startInterAction('Polygon')
});


// Remove Draw
var buttonRemoveInterAction = document.createElement('button');
buttonRemoveInterAction.innerHTML = '<a href="#" data-toggle="tooltip" title="Clear drawing"><i class="fas fa-times"></i></a>';
buttonRemoveInterAction.addEventListener("click", function () {
    stopInterAction()
});

var buttonBoxzoom = document.createElement('button');
buttonBoxzoom.innerHTML = '<a href="#" data-toggle="tooltip" title="Zoom box"><i class="fas fa-object-group"></i></a>';
buttonBoxzoom.addEventListener("click", function () {
    zoomDisplay = 1
    startInterAction('Polygon')
});

var buttonWithoutzoom = document.createElement('button');
buttonWithoutzoom.innerHTML = '<a href="#" data-toggle="tooltip" title="Zoom WithOut"><i class="fa fa-expand"></i></a>';
buttonWithoutzoom.addEventListener("click", function () {
    document.getElementsByClassName('ol-full-screen-false')[0].click()
});


// Home
var button_map = document.createElement('button');
button_map.innerHTML = '<a onclick="map_display()" data-toggle="tooltip" title="Base map"><i class="fa fa-map" /></a>';

// button group set
var element = document.createElement('div');
element.className = 'rotate-north ol-unselectable ol-control';
element.appendChild(button);
element.appendChild(buttonLine);
element.appendChild(buttonPolygon);
element.appendChild(Layer);
element.appendChild(button_map);

element.appendChild(buttonRemoveInterAction);

// Adds the ol - zoom element to the zoom control.
var zoomControl = document.getElementsByClassName('ol-zoom')[0];
zoomControl.appendChild(buttonBoxzoom);
zoomControl.appendChild(buttonWithoutzoom);
element.appendChild(buttonRemoveInterAction);

// Add a Layer Switcher to the map.
var layerSwitcher = new ol.control.LayerSwitcher({
    // Optional label for button
    tipLabel: 'Satellite'
});
map.addControl(layerSwitcher);



var toggle_fab = false
// map display.
function map_display(close = -1){
    toggle_fab = !toggle_fab
    console.log(toggle_fab)
    if(close != -1){
        toggle_fab = close
    }
    // Display the fab - menu
    if(toggle_fab){
        if(toggle_fab){
            document.getElementById('base-fab-menu').style.display='block'
        }else{
            document.getElementById('base-fab-menu').style.display='none'
        }
    }else{
        document.getElementById('base-fab-menu').style.display='none'
    }
}

// Change the image of a base element
function change_img(number){
    let set = document.querySelectorAll("[name='base']")
    set[number-1].click()
}

// Add the mouseover event to the display.
document.getElementsByClassName('panel')[0].addEventListener('mouseover',()=>{
    document.getElementsByClassName('panel')[0].style.display='block'
})

// Add the mouseeleave event to the panel.
document.getElementsByClassName('panel')[0].addEventListener('mouseleave',()=>{
    document.getElementsByClassName('panel')[0].style.display='none'
    toggle_fab = false
})

// Rotate north.
var RotateNorthControl = new ol.control.Control({
    element: element
});

map.addControl(RotateNorthControl);

// Add a scale line to the map.
var scaleLine = new ol.control.ScaleLine()
map.addControl(scaleLine);

// popup ????????? button group
$.each(popupTypes, function (i, data) {
    map.addOverlay(popups[String(data)].popup)
})

// Shows a feature info for a given coordinate.
map.on('click', function (evt) {
    if (drawing) {
        return;
    }
    var coordinate = evt.coordinate;
    console.log(evt)
    displayFeatureInfo(evt.pixel, coordinate);
})

map.on('pointermove', pointerMoveHandler);

// Adds the hidden event listener to the help tooltip.
map.getViewport().addEventListener('mouseout', function () {
    if (helpTooltipElement !== undefined) {
        helpTooltipElement.classList.add('hidden')
    };
});

// Displays the sub - district.
var zoom_display = [
    'SubDistrict',
]

var lst = map.getView().getZoom()
// Check if a sub - district is active and if so remove it.
map.on('moveend', function(e) {
    console.log(map.getView().getZoom())
    var newZoom = map.getView().getZoom();
    console.log($('#SubDistrict'))
    if(document.getElementById('SubDistrict').checked){
        try{
            removeLayer(layers['SubDistrict'],'SubDistrict')
            del_active(['SubDistrict'])
        }catch(err){

        }
        ilayer = 'SubDistrict';
        ilayerfile = './json/basicinfo/subdistrict.json';
        ifont = '10px Kanit, sans-serif';
        itextfillcolor = 'rgba(100,100,100,0.8)';
        itextstrokecolor = 'rgba(255,255,255,0.6)';
        ilayerfile = './json/basicinfo/subdistrict.json';
        ilayerobject = ilayer;
        itextfillcolor = 'rgba(100,100,100,1)';
        itextstrokecolor = 'rgba(255,255,255,1)';
        istrokewidth = 1;
        ilinedash = '0, 0, 0';
        ilabel = 'TAM_NAM_T'
        choose_active([ilayer])
        console.log(newZoom,lst,document.getElementById('text-SubDistrict').checked)
        if (newZoom >= 10 && lst < 10 ) {
            console.log('show')
            document.getElementById('text-SubDistrict').checked = true
            topojson_label(ilayer, ilayerfile, ifont, itextfillcolor, itextstrokecolor, itextstrokewidth, ifillcolor, istrokecolor, istrokewidth, ilinedash, ilabel,true);
        }else if(newZoom >= 10 && lst >= 10 ) {
            console.log('show')
            document.getElementById('text-SubDistrict').checked = true
            topojson_label(ilayer, ilayerfile, ifont, itextfillcolor, itextstrokecolor, itextstrokewidth, ifillcolor, istrokecolor, istrokewidth, ilinedash, ilabel,true);
        }else{
            console.log('hide')
            document.getElementById('text-SubDistrict').checked = false
            topojson_label(ilayer, ilayerfile, ifont, itextfillcolor, itextstrokecolor, itextstrokewidth, ifillcolor, istrokecolor, istrokewidth, ilinedash, ilabel,false);
        }
    }
    lst = map.getView().getZoom()
});
