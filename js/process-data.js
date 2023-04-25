// Returns a list of all vols in the system.
// Creates a nested json object containing the inflow outflow and storage data.
var inflow_set = {}
var outflow_set = {}
var storage_data = {}
var storage_data_viow = {}
var data_filter_start = ''
var data_filter_end = ''
var tmp_lst = []
var year = []
var upper_data = []
var lower_data = []
var nh_data = []
var mrc_data = []
// The name of the reserved name.
var name_reservoir = ""
var year_list = []
var data_list = []
var vol_list = []
var color_list = ["#7D3C98","#5DADE2","#16A085","#F4D03F","#DF42CA","#EB984E"]
// Get a list of inflow and outflow variables.
var inflow_list = []
var outflow_list = []
// varvol_list = var_vol
var new_vol_list = [[],[],[],[],[],[],[],[]]

// Default parttern label.
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

var parttern_label = {
  '01':'ม.ค.',
  '02':'ก.พ.',
  '03':'มี.ค.',
  '04':'เม.ย.',
  '05':'พ.ค.',
  '06':'มิ.ย.',
  '07':'ก.ค.',
  '08':'ส.ค.',
  '09':'ก.ย.',
  '10':'ต.ค.',
  '11':'พ.ย.',
  '12':'ธ.ค.',
}




/* init */
// Returns a new URLSearchParams object with the given query string.
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);

// Get url params.
const type_select = urlParams.get('type')
const name_select = urlParams.get('name')

// set var parameter_set
var parameter_set = false

// Click a urlParams.
if(type_select){
  parameter_set = true
  select_data(["reservoir","flow","pump","rain","customer","wq","tele"][type_select])
  document.getElementsByClassName('header')[0].style.display = 'block'
  let el = document.getElementsByTagName('h4')
  for(let i =0;i<el.length;i++){
    document.getElementsByTagName('h4')[i].style.display = 'block'
  }

  // val_type feed btn_feed
  setTimeout(()=>{
    document.getElementById("val_data").disabled = false;
    document.getElementById("btn_feed").disabled = false;
    document.getElementById("val_type").disabled = false;
    document.getElementById("year_select_start").disabled = false;
    document.getElementById("year_select_end").disabled = false;
    document.getElementById("year_select").disabled = false;
  },1000)
  console.log('debug')
  //document.getElementsByClassName('box-select')[type_select].click()
  //document.getElementsByClassName('box-select')[type_select].initEvent('click',true,true)
}


// Adds a comma to a number
function number_add_comma(txt){
  if(txt == "" || txt+[] == 'NaN'){
    return " "
  }else{
    let k = ""
    let spt = txt.split('.')
    txt = spt[0]
    let l = txt.length

    for(let i=0;i<txt.length/3;i++){
      k = (l>=4?"&#44;":"") + txt.substring(l-3,l) + k
      l -= 3
    }
    k += "."+spt[1]
    return k
  }
}

// Filter charecter.
function filter_charecter(text){
    return text.replaceAll("`","").replaceAll("'","").replaceAll("\"","").replaceAll("\\","").replaceAll("{","")
}

// Load a csv to table
function load_csv_totable(){
  let type = document.getElementById('val_type').value
  year = []
  if($('#val_data').val() != "เลือกอ่างเก็บน้ำ" && type == 'reservoir'){
    storage_data = {}
    let json_tmp = {}
    let max = 0
    let nh = 0
    let min = 0
    upper_data = []
    lower_data = []
    nh_data = []
    mrc_data = []
    $.get("load_data_max.php?res_code="+$('#val_data').val(), function( data ) {
      let tmp = data.split(":")
      max = parseFloat(filter_charecter(tmp[14].split(',')[0]))
      nh = parseFloat(filter_charecter(tmp[15].split(',')[0]))
      min = parseFloat(filter_charecter(tmp[16].split(',')[0]))
    })

    document.getElementById('img_reservoir').src = './img/reservoir/'+$('#val_data').val()+'_img.jpg'
    document.getElementById('map_reservoir').src = './img/reservoir/'+$('#val_data').val()+'_map.jpg'
    $.get("load_data.php?type=reservoir&id="+$('#val_data').val(), function( datas ) {
        console.log(datas)
        let tmp = (datas.replaceAll('{','').replace('[','').replace(']','').split('},'))
        //console.log(tmp)
        tmp.forEach((data)=>{

          let tmp_split = data.replace("}","").split(":")
          let tmp_json = {}
          let tmp_key = filter_charecter(tmp_split[2].split(',')[0])
          //console.log(tmp_split)
          if(tmp_key != ""){
            tmp_json['dam_code'] = filter_charecter(tmp_split[1].split(',')[0])
            tmp_json['wl'] = parseFloat(filter_charecter(tmp_split[3].split(',')[0]))
            tmp_json['volume'] = parseFloat(filter_charecter(tmp_split[4].split(',')[0]))
            tmp_json['inflow'] = parseFloat(filter_charecter(tmp_split[5].split(',')[0]))
            tmp_json['outflow'] = parseFloat(filter_charecter(tmp_split[6].split(',')[0]))
            tmp_json['maxvol'] = max
            tmp_json['nhvol'] = nh
            tmp_json['minvol'] = min
            storage_data[tmp_key] = tmp_json
            //console.log(tmp_json)
            let t = tmp_key.split('-')[0]
            if(!year.includes(t)){
              year.push(t)
            }

          }

        })
        //console.log(storage_data)
        //console.log(year)
        tmp_lst = year
        $('#year_select').empty()
        $('#year_select_start').empty()
        $('#year_select_end').empty()

        $('#year_select').append('<option>เลือกปี</option>')
        $('#year_select').append('<option>-- ไม่ระบุปี --</option>')

        $('#year_select_start').append('<option>เลือกปี</option>')
        //$('#year_select_start').append('<option>-- ไม่ระบุปี --</option>')

        $('#year_select_end').append('<option>เลือกปี</option>')
        //$('#year_select_end').append('<option>-- ไม่ระบุปี --</option>')
        year.forEach(item=>{
          console.log(item)
          if(parseInt(item) > 0){
            $('#year_select').append('<option>'+(parseInt(item)+543)+'</option>')
            $('#year_select_start').append('<option>'+(parseInt(item)+543)+'</option>')
            $('#year_select_end').append('<option>'+(parseInt(item)+543)+'</option>')
          }

        })
    });
    setTimeout(()=>{
      let tmp = document.getElementById('year_select_start').options[document.getElementById('year_select_start').options.length-1].value
      document.getElementById('year_select_start').value = tmp
      makeTable()
    }, 200)

    $.get("load_rulecurve.php?res_code="+$('#val_data').val(), function( data ) {
      let tmp = (data.substring(1,data.length-2).split('},'))
      storage_data = {}
      tmp.forEach((data)=>{
        console.log(data)
        if(data.trim() != ""){
          let t = data.split(":{")[1].replaceAll("'","\"")
          let jm = (JSON.parse("{"+t.substring(0,t.length-1)+"}"))
          if(jm['upper_rc']){
            upper_data.push(parseFloat(jm['upper_rc']))
            lower_data.push(parseFloat(jm['lower_rc']))
            try {
              mrc_data.push(parseFloat(jm['mrc']))
              nh_data.push(parseFloat(jm['lbc']))
            } catch (error) {

            }

            //console.log(tmp_key)

          }
        }
      })
    });

    $.get("info_name.php?res_code="+name_select, function( data ) {
      name_reservoir = data
    })

  }else if($('#val_data').val() != "เลือกน้ำท่า" && type == 'flow'){
    storage_data = {}
    console.log("load_data.php?type=flow&id="+$('#val_data').val())
    console.log($('#val_data option:selected').text())
    document.getElementById('img_flow').src = './img/flow/'+$('#val_data option:selected').text()+'_img.jpg'
    document.getElementById('map_flow').src = './img/flow/'+$('#val_data option:selected').text()+'_map.jpg'
    $.get("load_data.php?type=flow&id="+$('#val_data option:selected').text(), function( datas ) {
      let tmp = (datas.replaceAll('{','').replace('[','').replace(']','').split('},'))
      //console.log(tmp)
      tmp.forEach((data)=>{
        console.log(data)
        let tmp_split = (data).replace("}","").split(":")
        
        let tmp_json = {}
        let tmp_key = filter_charecter(tmp_split[3].split(',')[0])
        //console.log(tmp_key)
        if(tmp_key != ""){
          tmp_json['date'] = filter_charecter(tmp_split[3].split(',')[0])
          tmp_json['wl'] = parseFloat(filter_charecter(tmp_split[5].split(',')[0]))
          tmp_json['discharge'] = parseFloat(filter_charecter(tmp_split[4].split(',')[0]))

          storage_data[tmp_key] = tmp_json
          //console.log(tmp_json)
          let t = tmp_key.split('-')[0]
          if(!year.includes(t)){
            year.push(t)
          }

        }

      })
      console.log(storage_data)
      //console.log(year)
      tmp_lst = year
      $('#year_select').empty()
      $('#year_select_start').empty()
      $('#year_select_end').empty()

      $('#year_select').append('<option>เลือกปี</option>')
      $('#year_select').append('<option>-- ไม่ระบุปี --</option>')

      $('#year_select_start').append('<option>เลือกปี</option>')
      //$('#year_select_start').append('<option>-- ไม่ระบุปี --</option>')

      $('#year_select_end').append('<option>เลือกปี</option>')
      //$('#year_select_end').append('<option>-- ไม่ระบุปี --</option>')
      year.forEach(item=>{
        if(parseInt(item) > 0){
          $('#year_select').append('<option>'+(parseInt(item)+543)+'</option>')
          $('#year_select_start').append('<option>'+(parseInt(item)+543)+'</option>')
          $('#year_select_end').append('<option>'+(parseInt(item)+543)+'</option>')
        }

      })
    });

    // The start of the year select.
    setTimeout(()=>{
      let tmp = document.getElementById('year_select_start').options[document.getElementById('year_select_start').options.length-1].value
      document.getElementById('year_select_start').value = tmp
      makeTable()
    }, 200)


  }else if($('#val_data').val() != "เลือกเลือกสถานีโทรมาตร" && type == 'tele'){
    storage_data = {}
    console.log("load_data.php?type=tele&id="+$('#val_data').val())
    $.get("load_data.php?type=tele&id="+$('#val_data').val(), function( datas ) {
      console.log(datas)
      let tmp = (datas.replaceAll('{','').replace('[','').replace(']','').split('},'))
      //console.log(tmp)
      tmp.forEach((data)=>{

        let tmp_split = (data).replace("}","").split(":")
        let tmp_json = {}
        let tmp_key = filter_charecter(tmp_split[2]+" "+tmp_split[3])
        if(tmp_key != ""){
          //console.log(tmp_split)
          tmp_json['date'] = tmp_key
          tmp_json['wl'] = parseFloat(filter_charecter(tmp_split[5].split(',')[0]))
          tmp_json['discharge'] = parseFloat(filter_charecter(tmp_split[6].split(',')[0]))
          tmp_json['rain'] = parseFloat(filter_charecter(tmp_split[7].split(',')[0]))
          storage_data[tmp_key] = tmp_json
          //console.log(tmp_json)
          let t = tmp_key.split('-')[0]
          if(!year.includes(t)){
            year.push(t)
          }

        }

      })
      console.log(storage_data)
      //console.log(year)
      tmp_lst = year
      $('#year_select').empty()
      $('#year_select_start').empty()
      $('#year_select_end').empty()

      $('#year_select').append('<option>เลือกปี</option>')
      $('#year_select').append('<option>-- ไม่ระบุปี --</option>')

      $('#year_select_start').append('<option>เลือกปี</option>')
      //$('#year_select_start').append('<option>-- ไม่ระบุปี --</option>')

      $('#year_select_end').append('<option>เลือกปี</option>')
      //$('#year_select_end').append('<option>-- ไม่ระบุปี --</option>')
      year.forEach(item=>{
        if(parseInt(item) > 0){
          $('#year_select').append('<option>'+(parseInt(item)+543)+'</option>')
          $('#year_select_start').append('<option>'+(parseInt(item)+543)+'</option>')
          $('#year_select_end').append('<option>'+(parseInt(item)+543)+'</option>')
        }

      })
    });

    // The start of the year select.
    setTimeout(()=>{
      let tmp = document.getElementById('year_select_start').options[document.getElementById('year_select_start').options.length-1].value
      document.getElementById('year_select_start').value = tmp
      makeTable()
    }, 200)


  }else if($('#val_data').val() != "เลือกสถานีน้ำฝน" && type == 'rain'){
    storage_data = {}
    console.log("load_data.php?type=rain&id="+$('#val_data').val())
    $.get("load_data.php?type=rain&id="+$('#val_data').val(), function( datas ) {
      console.log(datas)
      let tmp = (datas.replaceAll('{','').replace('[','').replace(']','').split('},'))
      //console.log(tmp)
      tmp.forEach((data)=>{

        let tmp_split = (data).replace("}","").split(":")
        let tmp_json = {}
        console.log(tmp_split)
        let tmp_key = filter_charecter(tmp_split[2].split(',')[0])
        console.log(tmp_key)
        if(tmp_key != ""){
          tmp_json['date'] = tmp_key
          tmp_json['rain'] = parseFloat(filter_charecter(tmp_split[3]))

          storage_data[tmp_key] = tmp_json
          //console.log(tmp_json)
          let t = tmp_key.split('-')[0]
          if(!year.includes(t)){
            year.push(t)
          }

        }

      })
      console.log(storage_data)
      //console.log(year)
      tmp_lst = year
      $('#year_select').empty()
      $('#year_select_start').empty()
      $('#year_select_end').empty()

      $('#year_select').append('<option>เลือกปี</option>')
      $('#year_select').append('<option>-- ไม่ระบุปี --</option>')

      $('#year_select_start').append('<option>เลือกปี</option>')
      //$('#year_select_start').append('<option>-- ไม่ระบุปี --</option>')

      $('#year_select_end').append('<option>เลือกปี</option>')
      //$('#year_select_end').append('<option>-- ไม่ระบุปี --</option>')
      year.forEach(item=>{
        if(parseInt(item) > 0){
          $('#year_select').append('<option>'+(parseInt(item)+543)+'</option>')
          $('#year_select_start').append('<option>'+(parseInt(item)+543)+'</option>')
          $('#year_select_end').append('<option>'+(parseInt(item)+543)+'</option>')
        }

      })
    });

    // The start of the year select.
    setTimeout(()=>{
      let tmp = document.getElementById('year_select_start').options[document.getElementById('year_select_start').options.length-1].value
      document.getElementById('year_select_start').value = tmp
      makeTable()
    }, 200)

  }else if($('#val_data').val() != "เลือกสถานีสูบน้ำ" && type == 'pump'){
    storage_data = {}
    console.log("load_data.php?type=pump&id="+$('#val_data option:selected').text())
    $.get("load_data.php?type=pump&id="+$('#val_data').val(), function( datas ) {
      console.log(datas)
      let tmp = (datas.replaceAll('{','').replace('[','').replace(']','').split('},'))
      console.log(tmp)
      tmp.forEach((data)=>{

        let tmp_split = (data).replace("}","").split(":")
        let tmp_json = {}
        let tmp_key = filter_charecter(tmp_split[2].split(',')[0])
        console.log(tmp_key)
        if(tmp_key != ""){
          tmp_json['date'] = filter_charecter(tmp_split[2].split(',')[0])
          tmp_json['wl'] = parseFloat(filter_charecter(tmp_split[3].split(',')[0]))

          storage_data[tmp_key] = tmp_json
          //console.log(tmp_json)
          let t = tmp_key.split('-')[0]
          if(!year.includes(t)){
            year.push(t)
          }

        }

      })
      console.log(storage_data)
      //console.log(year)
      tmp_lst = year
      $('#year_select').empty()
      $('#year_select_start').empty()
      $('#year_select_end').empty()

      $('#year_select').append('<option>เลือกปี</option>')
      $('#year_select').append('<option>-- ไม่ระบุปี --</option>')

      $('#year_select_start').append('<option>เลือกปี</option>')
      //$('#year_select_start').append('<option>-- ไม่ระบุปี --</option>')

      $('#year_select_end').append('<option>เลือกปี</option>')
      //$('#year_select_end').append('<option>-- ไม่ระบุปี --</option>')
      year.forEach(item=>{
        if(parseInt(item) > 0){
          $('#year_select').append('<option>'+(parseInt(item)+543)+'</option>')
          $('#year_select_start').append('<option>'+(parseInt(item)+543)+'</option>')
          $('#year_select_end').append('<option>'+(parseInt(item)+543)+'</option>')
        }

      })
    });

    // The start of the year select.
    setTimeout(()=>{
      let tmp = document.getElementById('year_select_start').options[document.getElementById('year_select_start').options.length-1].value
      document.getElementById('year_select_start').value = tmp
      makeTable()
    }, 200)

  }else if($('#val_data').val() != "เลือกการใช้น้ำลูกค้า" && type == 'customer'){
    storage_data = {}
    console.log("load_data.php?type=customer&id="+$('#val_data').val())
    $.get("load_data.php?type=customer&id="+$('#val_data').val(), function( datas ) {
      console.log(datas)
      let tmp = (datas.replaceAll('{','').replace('[','').replace(']','').split('},'))
      console.log(tmp)
      tmp.forEach((data)=>{

        let tmp_split = (data).replace("}","").split(":")
        let tmp_json = {}
        let tmp_key = filter_charecter(tmp_split[2].split(',')[0])
        console.log(tmp_key)
        if(tmp_key != ""){
          tmp_json['date'] = filter_charecter(tmp_split[2].split(',')[0])
          tmp_json['wl'] = parseFloat(filter_charecter(tmp_split[3].split(',')[0]))

          storage_data[tmp_key] = tmp_json
          //console.log(tmp_json)
          let t = tmp_key.split('-')[0]
          if(!year.includes(t)){
            year.push(t)
          }

        }

      })
      console.log(storage_data)
      //console.log(year)
      tmp_lst = year
      $('#year_select').empty()
      $('#year_select_start').empty()
      $('#year_select_end').empty()

      $('#year_select').append('<option>เลือกปี</option>')
      $('#year_select').append('<option>-- ไม่ระบุปี --</option>')

      $('#year_select_start').append('<option>เลือกปี</option>')
      //$('#year_select_start').append('<option>-- ไม่ระบุปี --</option>')

      $('#year_select_end').append('<option>เลือกปี</option>')
      //$('#year_select_end').append('<option>-- ไม่ระบุปี --</option>')
      year.forEach(item=>{
        if(parseInt(item) > 0){
          $('#year_select').append('<option>'+(parseInt(item)+543)+'</option>')
          $('#year_select_start').append('<option>'+(parseInt(item)+543)+'</option>')
          $('#year_select_end').append('<option>'+(parseInt(item)+543)+'</option>')
        }

      })
    });

    // The start of the year select.
    setTimeout(()=>{
      let tmp = document.getElementById('year_select_start').options[document.getElementById('year_select_start').options.length-1].value
      document.getElementById('year_select_start').value = tmp
      makeTable()
    }, 200)

  }else if($('#val_data').val() != "เลือกคุณภาพ" && type == 'wq'){
    storage_data = {}
    console.log("load_data.php?type=wq&id="+$('#val_data').val())
    $.get("load_data.php?type=wq&id="+$('#val_data').val(), function( datas ) {
      console.log(datas)
      let tmp = (datas.replaceAll('{','').replace('[','').replace(']','').split('},'))
      console.log(tmp)
      tmp.forEach((data)=>{

        let tmp_split = (data).replaceAll("}","").split(":")
        let tmp_json = {}
        let tmp_key = filter_charecter(tmp_split[2].split(' ')[0])
        //console.log(tmp_key)
        if(tmp_key != ""){
          //console.log(tmp_split)
          tmp_json['date'] = filter_charecter(tmp_split[2]+" "+tmp_split[3]+" "+tmp_split[4])
          tmp_json['temp'] = parseFloat(filter_charecter(tmp_split[10].split(',')[0]))
          tmp_json['wl'] = parseFloat(filter_charecter(tmp_split[11].split(',')[0]))
          tmp_json['DO'] = parseFloat(filter_charecter(tmp_split[7].split(',')[0]))
          tmp_json['EC'] = parseFloat(filter_charecter(tmp_split[6].split(',')[0]))
          tmp_json['PH'] = parseFloat(filter_charecter(tmp_split[8].split(',')[0]))
          tmp_json['Salinty'] = parseFloat(filter_charecter(tmp_split[5].split(',')[0]))
          tmp_json['TDS'] = parseFloat(filter_charecter(tmp_split[9].split(',')[0]))

          storage_data[tmp_key] = tmp_json
          //console.log(tmp_json)
          let t = tmp_key.split('-')[0]
          if(!year.includes(t)){
            year.push(t)
          }

        }

      })
      console.log(storage_data)
      //console.log(year)
      tmp_lst = year
      $('#year_select').empty()
      $('#year_select_start').empty()
      $('#year_select_end').empty()

      $('#year_select').append('<option>เลือกปี</option>')
      $('#year_select').append('<option>-- ไม่ระบุปี --</option>')

      $('#year_select_start').append('<option>เลือกปี</option>')
      //$('#year_select_start').append('<option>-- ไม่ระบุปี --</option>')

      $('#year_select_end').append('<option>เลือกปี</option>')
      //$('#year_select_end').append('<option>-- ไม่ระบุปี --</option>')
      year.forEach(item=>{
        if(parseInt(item) > 0){
          $('#year_select').append('<option>'+(parseInt(item)+543)+'</option>')
          $('#year_select_start').append('<option>'+(parseInt(item)+543)+'</option>')
          $('#year_select_end').append('<option>'+(parseInt(item)+543)+'</option>')
        }

      })
    });

    // The start of the year select.
    setTimeout(()=>{
      let tmp = document.getElementById('year_select_start').options[document.getElementById('year_select_start').options.length-1].value
      document.getElementById('year_select_start').value = tmp
      makeTable()
    }, 200)

  }
}

// init disabled
document.getElementById("btn_feed").disabled = true;
document.getElementById("val_data").disabled = true;
document.getElementById("year_select_start").disabled = true;
document.getElementById("year_select_end").disabled = true;
document.getElementById("year_select").disabled = true;
document.getElementById("val_type").disabled = true;

function select_data(type){
  // load val_data from csv to table
  if(parameter_set){
    setTimeout(()=>{
      document.getElementById('val_data').value = urlParams.get('name')
      
      console.log('successful load parameters',document.getElementById('val_data').value)

      // Load csv to table
      load_csv_totable()

      // The start of the year select.
      setTimeout(()=>{
        let tmp = document.getElementById('year_select_start').options[document.getElementById('year_select_start').options.length-1].value
        document.getElementById('year_select_start').value = tmp
        // Dispatch the HTMLEvents event for the year select start
        var evt = document.createEvent("HTMLEvents");
        evt.initEvent("change", false, true);
        document.getElementById('year_select_start').dispatchEvent(evt);
        makeTable()
      }, 1000)

    },1000)
  }

  // Display a container box select.
  document.getElementsByClassName('container-box-select')[0].style.display = 'none'
  document.getElementById('val_type').value = type
  document.getElementById('val_type').onchange()
  document.getElementById("val_data").disabled = false;
  document.getElementById("btn_feed").disabled = false;
  document.getElementById("val_type").disabled = false;
  document.getElementById("year_select_start").disabled = false;
  document.getElementById("year_select_end").disabled = false;
  document.getElementById("year_select").disabled = false;

  // Display the info loops.
  let loop = document.getElementsByClassName('info_div').length
  for(let i=0;i<loop;i++){
    document.getElementsByClassName('info_div')[i].style.display = 'none'
  }

  // Displays a list of charts.
  let name_charts = ['flow','pump','customer','reservoir','rain','tele','wq']
  for(let i=0;i<name_charts.length;i++){
    document.getElementsByClassName('chart-'+name_charts[i])[0].style.display = 'none'
  }

  // Display a chart.
  if(type=='reservoir'){
      document.getElementById('reservoir_info').style.display = 'block'
      document.getElementsByClassName('chart-'+type)[0].style.display = 'block'
  }else if(type == 'flow'){
      document.getElementById('flow_info').style.display = 'block'
      document.getElementsByClassName('chart-'+type)[0].style.display = 'block'
  }else if(type == 'pump'){
      document.getElementById('pump_info').style.display = 'block'
      document.getElementsByClassName('chart-'+type)[0].style.display = 'block'
  }else if(type == 'customer'){
      document.getElementById('customer_info').style.display = 'block'
      document.getElementsByClassName('chart-'+type)[0].style.display = 'block'
  }else if(type == 'wq'){
      document.getElementById('wq_info').style.display = 'block'
      document.getElementsByClassName('chart-'+type)[0].style.display = 'block'
  }else if(type == 'rain'){
      document.getElementById('rain_info').style.display = 'block'
      document.getElementsByClassName('chart-'+type)[0].style.display = 'block'
  }else if(type == 'tele'){
      document.getElementById('tele_info').style.display = 'block'
      document.getElementsByClassName('chart-'+type)[0].style.display = 'block'
  }

  // Display the box.
  document.getElementsByClassName('box-group')[2].style.display = (type == 'wq'?'none':'flex')
  document.getElementsByClassName('box-group')[3].style.display = (type == 'wq'?'none':'flex')

  // Get the margin left of the feed.
  if(type == 'wq'){
    document.getElementById('btn_feed').style.marginLeft = '30%';
  }else{
    document.getElementById('btn_feed').style.marginLeft = '0%';
  }
}

// Loads the options.
function load_option(){
  // Display a container box select box
  document.getElementsByClassName('container-box-select')[0].style.display = 'none'

  // Get value type by id
  let type = document.getElementById('val_type').value

  // disabled
  document.getElementById("btn_feed").disabled = false;
  document.getElementById("val_data").disabled = false;
  document.getElementById("year_select_start").disabled = false;
  document.getElementById("year_select_end").disabled = false;
  document.getElementById("year_select").disabled = false;

  if(type == 'reservoir'){
    $.get("info_type.php?type="+type, (data)=>{
      // Parse a comma - separated list of data.
      let dt = (data).replaceAll('[','').split('],')

      // Add an option to the option list.
      $('#val_data').empty()
      $('#val_data').append(`<option>เลือกอ่างเก็บน้ำ</option>`)

      // Parse a comma - separated list of options.
      dt.forEach((it)=>{
        let d = it.split(',')
        // Returns a string containing the option value.
        if(d[1] != undefined){
          $('#val_data').append(`<option value='${d[0].trim()}'>อ่างเก็บน้ำ${d[1]}</option>`)
        }
      })

      // Display the info loops.
      let loop = document.getElementsByClassName('info_div').length
      for(let i=0;i<loop;i++){
        document.getElementsByClassName('info_div')[i].style.display = 'none'
      }

      // Display the reservation info block.
      document.getElementById('reservoir_info').style.display = 'block'

      // Displays a list of charts.
      let name_charts = ['flow','pump','customer','reservoir','rain','tele','wq']
      for(let i=0;i<name_charts.length;i++){
        document.getElementsByClassName('chart-'+name_charts[i])[0].style.display = 'none'
      }

      // Display a chart.
      document.getElementsByClassName('chart-'+type)[0].style.display = 'block'
    })
  }else if(type == 'flow'){
    $.get("info_type.php?type="+type, (data)=>{
      // Parse a comma - separated list of data.
      let dt = (data).replaceAll('[','').split('],')

      // Add an option to the option list.
      $('#val_data').empty()
      $('#val_data').append(`<option>เลือกน้ำท่า</option>`)

      // Parse a comma - separated list of options.
      dt.forEach((it)=>{
        // Parse a comma - separated list of options.
        let d = it.split(',')
        if(d[1] != undefined){
          $('#val_data').append(`<option value='${d[0].trim()}'>${d[1]}</option>`)
        }
      })

      // Display the info loops.
      let loop = document.getElementsByClassName('info_div').length
      for(let i=0;i<loop;i++){
        document.getElementsByClassName('info_div')[i].style.display = 'none'
      }

      // Display the flow info block
      document.getElementById('flow_info').style.display = 'block'

      // Displays a list of charts.
      let name_charts = ['flow','pump','customer','reservoir','rain','tele','wq']
      for(let i=0;i<name_charts.length;i++){
        document.getElementsByClassName('chart-'+name_charts[i])[0].style.display = 'none'
      }

      // Display a chart.
      document.getElementsByClassName('chart-'+type)[0].style.display = 'block'
    })
  }else if(type == 'pump'){
    $.get("info_type.php?type="+type+"&limit=1000", (data)=>{
      // Parse a comma - separated list of data.
      let dt = (data).replaceAll('[','').split('],')

      // Add an option to the option list.
      $('#val_data').empty()
      $('#val_data').append(`<option>เลือกสถานีสูบน้ำ</option>`)

      // Parse a comma - separated list of options.
      dt.forEach((it)=>{
        // Parse a comma - separated list of options.
        let d = it.split(',')
        if(d[1] != undefined){
          $('#val_data').append(`<option value='${d[0].trim()}'>${d[1]}</option>`)
        }
      })

      // Display the info loops.
      let loop = document.getElementsByClassName('info_div').length
      for(let i=0;i<loop;i++){
        document.getElementsByClassName('info_div')[i].style.display = 'none'
      }


      // Display the dump info block
      document.getElementById('pump_info').style.display = 'block'

      // Displays a list of charts.
      let name_charts = ['flow','pump','customer','reservoir','rain','tele','wq']
      for(let i=0;i<name_charts.length;i++){
        document.getElementsByClassName('chart-'+name_charts[i])[0].style.display = 'none'
      }

      // Display a chart.
      document.getElementsByClassName('chart-'+type)[0].style.display = 'block'
    })
  }else if(type == 'customer'){
    $.get("info_type.php?type="+type+"&limit=1000", (data)=>{
      // Parse a comma - separated list of data.
      let dt = (data).replaceAll('[','').split('],')

      // Add an option to the option list.
      $('#val_data').empty()
      $('#val_data').append(`<option>เลือกการใช้น้ำลูกค้า</option>`)

      // Parse a comma - separated list of options.
      dt.forEach((it)=>{
        let d = it.split(',')
        if(d[1] != undefined){
          $('#val_data').append(`<option value='${d[0].trim()}'>${d[1]}</option>`)
        }
      })

      // Display the info loops.
      let loop = document.getElementsByClassName('info_div').length
      for(let i=0;i<loop;i++){
        document.getElementsByClassName('info_div')[i].style.display = 'none'
      }

      // Display the customer info block.
      document.getElementById('customer_info').style.display = 'block'

      // Displays a list of charts.
      let name_charts = ['flow','pump','customer','reservoir','rain','tele','wq']
      for(let i=0;i<name_charts.length;i++){
        document.getElementsByClassName('chart-'+name_charts[i])[0].style.display = 'none'
      }

      // Display a chart.
      document.getElementsByClassName('chart-'+type)[0].style.display = 'block'
    })
  }else if(type == 'wq'){
    $.get("info_type.php?type="+type+"&limit=1000", (data)=>{
      // Parse a comma - separated list of data.
      let dt = (data).replaceAll('[','').split('],')

      // Add an option to the option list.
      $('#val_data').empty()
      $('#val_data').append(`<option>เลือกคุณภาพ</option>`)

      // Parse a comma - separated list of options.
      dt.forEach((it)=>{
        // Parse a comma - separated list of options.
        let d = it.split(',')
        if(d[1] != undefined){
          $('#val_data').append(`<option value='${d[0].trim()}'>${d[1]}</option>`)
        }
      })

      // Display the info loops.
      let loop = document.getElementsByClassName('info_div').length
      for(let i=0;i<loop;i++){
        document.getElementsByClassName('info_div')[i].style.display = 'none'
      }

      // Display the wq_info block
      document.getElementById('wq_info').style.display = 'block'

      // Displays a list of charts.
      let name_charts = ['flow','pump','customer','reservoir','rain','tele','wq']
      for(let i=0;i<name_charts.length;i++){
        document.getElementsByClassName('chart-'+name_charts[i])[0].style.display = 'none'
      }

      // Display a chart.
      document.getElementsByClassName('chart-'+type)[0].style.display = 'block'
    })
  }else if(type == 'rain'){
    $.get("info_type.php?type="+type, (data)=>{
      // Parse a comma - separated list of data.
      let dt = (data).replaceAll('[','').split('],')

      // Add an option to the option list.
      $('#val_data').empty()
      $('#val_data').append(`<option>เลือกสถานีน้ำฝน</option>`)

      // Parse a comma - separated list of options.
      dt.forEach((it)=>{
        // Parse a comma - separated list of options.
        let d = it.split(',')
        console.log(d)
        if(d[1] != undefined){
          $('#val_data').append(`<option value='${d[0].trim()}'>${d[1]}</option>`)
        }
      })

      // Display the info loops.
      let loop = document.getElementsByClassName('info_div').length
      for(let i=0;i<loop;i++){
        document.getElementsByClassName('info_div')[i].style.display = 'none'
      }

      // Renderrain_info block
      document.getElementById('rain_info').style.display = 'block'

      // Displays a list of charts.
      let name_charts = ['flow','pump','customer','reservoir','rain','tele','wq']
      for(let i=0;i<name_charts.length;i++){
        document.getElementsByClassName('chart-'+name_charts[i])[0].style.display = 'none'
      }

      // Display a chart.
      document.getElementsByClassName('chart-'+type)[0].style.display = 'block'
    })
  }else if(type == 'tele'){
    $.get("info_type.php?type="+type, (data)=>{
      // Parse a comma - separated list of data.
      let dt = (data).replaceAll('[','').split('],')

      // Add an option to the option list.
      $('#val_data').empty()
      $('#val_data').append(`<option>เลือกสถานีโทรมาตร</option>`)

      // Parse a comma - separated list of options.
      dt.forEach((it)=>{
        // Parse a comma - separated list of options.
        let d = it.split(',')
        if(d[1] != undefined){
          // ${d[1]}
          $('#val_data').append(`<option value='${d[0].trim()}'>วัดระหารไร่</option>`)
        }
      })

      // Display the info loops.
      let loop = document.getElementsByClassName('info_div').length
      for(let i=0;i<loop;i++){
        document.getElementsByClassName('info_div')[i].style.display = 'none'
      }

      // Display tele_info block
      document.getElementById('tele_info').style.display = 'block'

      // Displays a list of charts.
      let name_charts = ['flow','pump','customer','reservoir','rain','tele','wq']
      for(let i=0;i<name_charts.length;i++){
        document.getElementsByClassName('chart-'+name_charts[i])[0].style.display = 'none'
      }

      // Display a chart.
      document.getElementsByClassName('chart-'+type)[0].style.display = 'block'
    })
  }
  // Display the box.
  document.getElementsByClassName('box-group')[2].style.display = (type == 'wq'?'none':'flex')
  document.getElementsByClassName('box-group')[3].style.display = (type == 'wq'?'none':'flex')

  // Get the margin left of the feed.
  if(type == 'wq'){
    document.getElementById('btn_feed').style.marginLeft = '30%';
  }else{
    document.getElementById('btn_feed').style.marginLeft = '0%';
  }
}

// Display the info loops.
let loop = document.getElementsByClassName('info_div').length
for(let i=0;i<loop;i++){
  document.getElementsByClassName('info_div')[i].style.display = 'none'
}

// Displays a list of charts.
let name_charts = ['flow','pump','customer','reservoir','rain','tele','wq']
for(let i=0;i<name_charts.length;i++){
  document.getElementsByClassName('chart-'+name_charts[i])[0].style.display = 'none'
}

//load_option()

// Displays a year select.
document.getElementById('year_select_start').addEventListener('change',()=>{
  let lit = []

  // Computes the number of items in a year select.
  tmp_lst.forEach((item)=>{
    if(( parseInt(item)+543 > parseInt(document.getElementById('year_select_end').value) || parseInt(item)+543 < parseInt(document.getElementById('year_select_start').value) )){
      lit.push(parseInt(item)+543)
    }
  })


  $('#year_select').empty()
  $('#year_select').append('<option>เลือกปี</option>')
  // Generate a year select clause.
  lit.forEach((item)=>{
    if(document.getElementById('year_select_end').value == 'เลือกปี'){
      $('#year_select').append('<option>'+item+'</option>')
    }
  })

  // Filter the start of a year select.
  let tmp_year_filter = document.getElementById('year_select_start').innerHTML.replaceAll('<option>','').split('</option>')

  // Select the end of a year
  $('#year_select_end').empty()
  $('#year_select_end').append('<option>เลือกปี</option>')
  //$('#year_select_end').append('<option>-- ไม่ระบุปี --</option>')

  // Generates a year select.
  let year_ref = parseInt(document.getElementById('year_select_start').value)
  for(let i=2;i<tmp_year_filter.length;i++){
    // Select the end of the current year.
    let year_exam = parseInt(tmp_year_filter[i])
    if(year_exam > year_ref && year_exam <= (year_ref+4)){
      $('#year_select_end').append('<option>'+year_exam+'</option>')
    }
  }
})

// Returns a list of year selects.
document.getElementById('year_select_end').addEventListener('change',()=>{
  let lit = []

  // Computes the number of items in a year select.
  tmp_lst.forEach((item)=>{
    // Adds a year_select_end to the lit.
    if(( parseInt(item)+543 > parseInt(document.getElementById('year_select_end').value) || parseInt(item)+543 < parseInt(document.getElementById('year_select_start').value) )){
      lit.push(parseInt(item)+543)
    }
  })

  // Generates a SELECT.
  $('#year_select').empty()
  $('#year_select').append('<option>เลือกปี</option>')
  $('#year_select').append('<option>-- ไม่ระบุปี --</option>')

  // Generate a year select clause.
  lit.forEach((item)=>{
    $('#year_select').append('<option>'+item+'</option>')
  })
})

// Gets the text range of the selection
function getTextRange(){
  // Generates the text to be selected
  let text = ""
  text += "ข้อมูล"
  text += $("#val_data :selected").text()

  // Generates a year select.
  if(document.getElementById('year_select_end').value == 'เลือกปี'){
    text += " ปี "
    text += document.getElementById('year_select_start').value
  }else if(document.getElementById('year_select').value == 'เลือกปี'){
    text += " ช่วงปี "
    text += document.getElementById('year_select_start').value
    text += " ถึงปี "
    text += document.getElementById('year_select_end').value
  }else{
    text += " ช่วงปี "
    text += document.getElementById('year_select_start').value
    text += " ถึงปี "
    text += document.getElementById('year_select_end').value
    text += " และ "
    text += document.getElementById('year_select').value
  }
  return text
}

// Plots the data list.
function plot_data_list(){
  // Returns the value of the storage data.
  let n = 0
  let data_val = Object.values(storage_data)
  let key_label = []
  let key_label_empty = []
  let type = document.getElementById('val_type').value

  if(type == 'reservoir'){
    // Returns a key for a given key label.
    key_label = []
    let inflow = []
    let outflow = []
    key_label_empty = []
    let max = []
    let min = []
    let tmp_key = null

    // Parse a volume list.
    Object.keys(storage_data).forEach(head=>{
      // Parse a comma separated list of labels.
      tmp_key = Object.keys(data_val[n])
      let tmp_data = Object.values(data_val[n])
      key_label_empty.push(' ')
      let m = head.split(' ')[0]
      let tmp = parttern_label[m.split("-")[1]]

      // Adds a key label if it doesn t already exist.
      key_label.push(tmp)

      // Checks if the start and end date of a year are in the range of 543.
      let tmp_year = (parseInt(head)+543)
      let rule = (parseInt(document.getElementById('year_select_start').value) <= tmp_year && document.getElementById('year_select_end').value =='เลือกปี' || (parseInt(document.getElementById('year_select_start').value) <= tmp_year && tmp_year <= parseInt(document.getElementById('year_select_end').value)))

      // Parse a rule into inflow and outflow.
      if(rule){
        inflow.push(parseFloat(tmp_data[2]))
        outflow.push(parseFloat(tmp_data[3]))
      }

      // Create a volume list.
      for(let k=0;k<5;k++){
        new_vol_list[k].push(data_val[n][tmp_key[k]] == NaN ? 0: data_val[n][tmp_key[k]])
      }

      n++
    })

    // This is the main entry point for all dataset series storage_data_viow
    let dataset_series = []
    let storage_data_viow = {}
    let inflow_process = []
    let outflow_process = []
    let year_ref = parseInt(document.getElementById('year_select_start').value)
    let year_ref_end = parseInt(document.getElementById('year_select_end').value)

    // Parses storage data from a year select.
    Object.entries(storage_data).forEach(([key, value]) => {
      let tmp = parseInt(key.split(' ')[0])+543

      if((document.getElementById('year_select_start').value <= tmp && tmp <= document.getElementById('year_select_end').value) ||(['เลือกปี','-- ไม่ระบุปี --'].includes(document.getElementById('year_select_start').value) && tmp <= document.getElementById('year_select_end').value) ||(document.getElementById('year_select_start').value <= tmp && ['เลือกปี','-- ไม่ระบุปี --'].includes(document.getElementById('year_select_end').value)) ||tmp == document.getElementById('year_select').value){
        // Sets the storage_data_viow.
        let rule = (
          (storage_data_viow[tmp] == undefined && tmp >= year_ref && tmp <= year_ref_end) ||
          (storage_data_viow[tmp] == undefined && tmp == year_ref && document.getElementById('year_select_end').value == 'เลือกปี')||
          (storage_data_viow[tmp] == undefined && document.getElementById('year_select').value == tmp)
        )

        if(rule){
          storage_data_viow[tmp] = []
        }

        if((document.getElementById('year_select').value == tmp) ||
          (tmp == year_ref || tmp >= year_ref && tmp <= year_ref_end) ||
          (tmp == year_ref && document.getElementById('year_select_end').value == 'เลือกปี')){
          storage_data_viow[tmp].push(value['volume'])
        }

        // Sets the maximum and minvol values if necessary.
        if(max.length < 366){
          max.push(value['maxvol'])
          min.push(value['minvol'])
        }
      }
    })

    console.log(storage_data_viow)
    // Parse the year_select_start and year_filter.

    let tmp_year_filter = document.getElementById('year_select_start').innerHTML.replaceAll('<option>','').split('</option>')

    let index = 0
    // Parse the year_select and year_exam elements.
    for(let i=1;i<tmp_year_filter.length;i++){
      let year_exam = parseInt(tmp_year_filter[i])
      // Creates a set of inflow and inflow processes for a given year.
      if(year_exam == year_ref && document.getElementById('year_select_end').value == 'เลือกปี' || year_exam >= year_ref && year_exam <= (year_ref_end) || year_exam == document.getElementById('year_select').value){
        outflow_process.push({
          name: year_exam,
          data: outflow_set[year_exam],
          color: color_list[index]
        })
        inflow_process.push({
          name: year_exam,
          data: inflow_set[year_exam],
          color: color_list[index]
        })
        index += 1
      }
    }


    document.getElementById('alert_reservoir').innerHTML = getTextRange()
    let name_bar = []
    index = 0
    Object.entries(storage_data_viow).forEach(([key, value]) => {
      dataset_series.push({
        name: key,
        data: value,
        color: color_list[index]
      })
      name_bar.push(key)
      index += 1
    })

    dataset_series.push({
      name: 'upper',
      color: '#ff0000d9',
      data: upper_data
    })
    
    dataset_series.push({
      name: 'lower',
      dashStyle: 'dash',
      color: '#ff0000d9',
      data: lower_data
    })
    
    dataset_series.push({
      name: 'mid',
      color: '#0000c9d9',
      data: mrc_data
    })

    dataset_series.push({
      name: 'nh',
      color: '#0000c9d9',
      data: nh_data
    })

    dataset_series.push({
      name: 'max',
      color: '#000000',
      dashStyle: 'dash',
      data: new Array(365).fill(max[0])
    })

    dataset_series.push({
      name: 'min',
      dashStyle: 'dash',
      color: '#000000',
      data: new Array(365).fill(min[0])
    })

    name_bar.push('upper')
    name_bar.push('lower')
    name_bar.push('mid')
    name_bar.push('nh')
    name_bar.push('max')
    name_bar.push('min')
    Highcharts.chart('highcharts-main', {
      chart: {
        type: 'spline'
      },
      title: {
        text: 'ปริมาตรน้ำในอ่าง'
      },
      xAxis: {
        categories: key_label,
        labels: {
          formatter: function() {
            return this.value ;
          }
        },
        accessibility: {
          description: 'Months of the year'
        },
        labels: {
            step: 31,
            style: {
              fontSize: '14px',
            }
        }
      },
      yAxis: {
        title: {
          text: 'ปริมาตรน้ำในอ่าง,ล้าน ลบ.ม.'
        },
          labels: {
            formatter: function () {
              return this.value;
            },
            style: {
              fontSize: '14px',
            }
          }
      },
      tooltip: {
        crosshairs: true,
        shared: true,
        outside: true,
        useHTML: true,
        formatter: function() {
          let txt= ""
          txt += this.x+"<br>"
          for(let i=0;i<this.points.length;i++){
            txt+= "<div style='border-radius:25px;width:10px;height:10px;display:inline-block;background:"+this.points[i]['color']+";'></div>&nbsp;"+name_bar[i]+"&nbsp;"+this.points[i]['y']+" ล้าน ลบ.ม.<br>"
          }
          console.log(this.points)
            return txt
        }
      },
      plotOptions: {
        spline: {
          marker: {
            radius: 4,
            lineColor: '#666666',
            lineWidth: 1
          }
        }
      },
      series: dataset_series
    });

    Highcharts.chart('highcharts-outflow', {
      chart: {
        type: 'spline'
      },
      title: {
        text: '   '
      },
      xAxis: {
        categories: key_label_empty,
        accessibility: {
          description: 'Months of the year'
        },
        labels: {
            step: 31,
            style: {
              fontSize: '14px',
            }
        }
      },
      yAxis: {
        title: {
          text: 'ปริมาตรน้ำระบาย,ล้าน ลบ.ม.'
        },
        labels: {
          formatter: function () {
            return this.value;
          },
          style: {
            fontSize: '14px',
          }
        }
      },
      tooltip: {
        crosshairs: true,
        shared: true,
        outside: true,
        useHTML: true,
        formatter: function() {
          let txt= ""
          txt += this.x+"<br>"
          for(let i=0;i<this.points.length;i++){
            txt+= "<div style='border-radius:25px;width:10px;height:10px;display:inline-block;background:"+this.points[i]['color']+";'></div>&nbsp;"+name_bar[i]+"&nbsp;"+this.points[i]['y']+" ล้าน ลบ.ม.<br>"
          }
          console.log(this.points)
            return txt
          }
      },
      plotOptions: {
        spline: {
          marker: {
            radius: 4,
            lineColor: '#666666',
            lineWidth: 1
          }
        }
      },
      series: outflow_process
    });

    Highcharts.chart('highcharts-inflow', {
      chart: {
        type: 'spline'
      },
      title: {
        text: '   '
      },
      xAxis: {
        categories:key_label_empty,
        accessibility: {
          description: 'Months of the year'
        },
        labels: {
            step: 31
        }
      },
      yAxis: {
        title: {
          text: 'ปริมาตรน้ำไหลลงอ่าง,ล้าน ลบ.ม.'
        },
        labels: {
          formatter: function () {
            return this.value;
          },
          style: {
            fontSize: '14px',
          }
        }
      },
      tooltip: {
        crosshairs: true,
        shared: true,
        outside: true,
        useHTML: true,
        formatter: function() {
          let txt= ""
          txt += this.x+"<br>"
          for(let i=0;i<this.points.length;i++){
            txt+= "<div style='border-radius:25px;width:10px;height:10px;display:inline-block;background:"+this.points[i]['color']+";'></div>&nbsp;"+name_bar[i]+"&nbsp;"+this.points[i]['y']+" ล้าน ลบ.ม.<br>"
          }
          console.log(this.points)
            return txt
          }
      },
      plotOptions: {
        spline: {
          marker: {
            radius: 4,
            lineColor: '#666666',
            lineWidth: 1
          }
        }
      },
      series: inflow_process
    });

  }else if(type == "pump"){

    let dataset_series = []
    key_label = []
    let n = 0
    let item_lit = []

    document.getElementById('alert_pump').innerHTML = getTextRange()

    let year_item = {}
    Object.entries(storage_data).forEach(([key, value]) => {
      let tmp_split = parseInt(value['date'].split('-')[0])+543
      if(document.getElementById('year_select_start').value == tmp_split && document.getElementById('year_select_end').value == "เลือกปี"){
        if(year_item[tmp_split]==undefined){
          year_item[tmp_split] = []
        }
        year_item[tmp_split].push((value['wl']+""=="NaN"?0:value['wl']))
        key_label.push(parttern_label[value['date'].split('-')[1]])
      }else if(document.getElementById('year_select_start').value <= tmp_split && document.getElementById('year_select_end').value >= tmp_split){
        if(year_item[tmp_split]==undefined){
          year_item[tmp_split] = []
        }
        year_item[tmp_split].push((value['wl']+""=="NaN"?0:value['wl']))
        key_label.push(parttern_label[value['date'].split('-')[1]])
      }
    })
    let name_bar = []
    Object.entries(year_item).forEach(([key, value]) => {
      dataset_series.push({
        name: key,
        data: value
      })
      name_bar.push(key)
    })
    Highcharts.chart('highcharts-pump', {
      chart: {
        type: 'spline'
      },
      title: {
        text: 'ปริมาณการสูบน้ำ'
      },
      xAxis: {
        categories:key_label,
        accessibility: {
          description: 'Months of the year'
        },
        labels: {
            step: 31,
            style: {
              fontSize: '14px',
            }
        }
      },
      yAxis: {
        title: {
          text: 'ปริมาณการสูบน้ำ,ลบ.ม.'
        },
          labels: {
            formatter: function () {
              return this.value;
            },
            style: {
              fontSize: '14px',
            }
          }
      },
      tooltip: {
        crosshairs: true,
        shared: true,
        outside: true,
        useHTML: true,
        formatter: function() {
          let txt= ""
          txt += this.x+"<br>"
          for(let i=0;i<this.points.length;i++){
            txt+= "<div style='border-radius:25px;width:10px;height:10px;display:inline-block;background:"+this.points[i]['color']+";'></div>&nbsp;"+name_bar[i]+"&nbsp;"+this.points[i]['y']+" ลบ.ม.<br>"
          }
          console.log(this.points)
            return txt
          }
      },
      plotOptions: {
        spline: {
          marker: {
            radius: 4,
            lineColor: '#666666',
            lineWidth: 1
          }
        }
      },
      series: dataset_series
    });
  }else if(type == "flow"){
    let dataset_series = []
    key_label = []
    let item_lit = []

    document.getElementById('alert_flow').innerHTML = getTextRange()

    let year_tmp = {}
    let year_name = {}

    Object.entries(storage_data).forEach(([key, value]) => {

      let tmp_split = parseInt(value['date'].split('-')[0])+543
      if(document.getElementById('year_select_start').value == tmp_split && document.getElementById('year_select_end').value == "เลือกปี"){
        if(year_tmp[tmp_split] == undefined){
          year_tmp[tmp_split] = []
          year_name[tmp_split] = []
        }
        year_tmp[tmp_split].push(value['wl'])
        year_name[tmp_split].push(parttern_label[value['date'].split('-')[1]])

        console.log(value['date'],value['wl'])
      }else if(document.getElementById('year_select_start').value <= tmp_split && document.getElementById('year_select_end').value >= tmp_split || document.getElementById('year_select').value >= tmp_split){
        if(year_tmp[tmp_split] == undefined){
          year_tmp[tmp_split] = []
          year_name[tmp_split] = []
        }
        year_tmp[tmp_split].push(value['wl'])
        year_name[tmp_split].push(parttern_label[value['date'].split('-')[1]])

        console.log(value['date'],value['wl'])
      }
    })
    let name_bar = []
    let i = 0
    Object.entries(year_tmp).forEach(([key,value])=>{
      dataset_series.push({
        name: key,
        data: value,
        color: color_list[i]
      })
      name_bar.push(key)
      i+=1
    })

    Highcharts.chart('highcharts-flow-wl', {
      chart: {
        type: 'spline'
      },
      title: {
        text: 'ปริมาตรการไหล'
      },
      xAxis: {
        categories:Object.values(year_name)[0],
        accessibility: {
          description: 'Months of the year'
        },
        labels: {
            step: 31,
            style: {
              fontSize: '14px',
            }
        }
      },
      yAxis: {
        title: {
          text: 'ปริมาตรน้ำ,ล้าน ลบ.ม.'
        },
          labels: {
            formatter: function () {
              return this.value;
            },
            style: {
              fontSize: '14px',
            }
          }
      },
      tooltip: {
        crosshairs: true,
        shared: true,
        outside: true,
        useHTML: true,
        formatter: function() {
          let txt= ""
          txt += this.x+"<br>"
          for(let i=0;i<this.points.length;i++){
            txt+= "<div style='border-radius:25px;width:10px;height:10px;display:inline-block;background:"+this.points[i]['color']+";'></div>&nbsp;"+name_bar[i]+"&nbsp;"+this.points[i]['y']+" ล้าน ลบ.ม.<br>"
          }
          console.log(this.points)
            return txt
        }
      },
      plotOptions: {
        spline: {
          marker: {
            radius: 4,
            lineColor: '#666666',
            lineWidth: 1
          }
        }
      },
      series: dataset_series
    });
    dataset_series = []
    item_lit = []


    year_tmp = {}
    year_name = {}

    Object.entries(storage_data).forEach(([key, value]) => {

      let tmp_split = parseInt(value['date'].split('-')[0])+543
      if(document.getElementById('year_select_start').value == tmp_split && document.getElementById('year_select_end').value == "เลือกปี"){
        if(year_tmp[tmp_split] == undefined){
          year_tmp[tmp_split] = []
          year_name[tmp_split] = []
        }
        year_tmp[tmp_split].push(value['discharge'])
        year_name[tmp_split].push(parttern_label[value['date'].split('-')[1]])

      }else if(document.getElementById('year_select_start').value <= tmp_split && document.getElementById('year_select_end').value >= tmp_split || document.getElementById('year_select').value >= tmp_split){
        if(year_tmp[tmp_split] == undefined){
          year_tmp[tmp_split] = []
          year_name[tmp_split] = []
        }
        year_tmp[tmp_split].push(value['discharge'])
        year_name[tmp_split].push(parttern_label[value['date'].split('-')[1]])

      }


    })
    dataset_series = []
    i = 0
    name_bar = []
    Object.entries(year_tmp).forEach(([key,value])=>{
      dataset_series.push({
        name: key,
        data: value,
        color: color_list[i]
      })
      name_bar.push(key)
      i+=1
    })
    console.log(year_name)
    
    Highcharts.chart('highcharts-flow-discharge', {
      chart: {
        type: 'spline'
      },
      title: {
        text: 'ระดับน้ำ'
      },
      xAxis: {
        categories:Object.values(year_name)[0],
        accessibility: {
          description: 'Months of the year'
        },
        labels: {
            step: 31,
            style: {
              fontSize: '14px',
            }
        }
      },
      yAxis: {
        title: {
          text: 'ระดับน้ำ,ม.รทก.'
        },
          labels: {
            formatter: function () {
              return this.value;
            },
            style: {
              fontSize: '14px',
            }
          }
      },
      tooltip: {
        crosshairs: true,
        shared: true,
        outside: true,
        useHTML: true,
        formatter: function() {
          let txt= ""
          txt += this.x+"<br>"
          for(let i=0;i<this.points.length;i++){
            txt+= "<div style='border-radius:25px;width:10px;height:10px;display:inline-block;background:"+this.points[i]['color']+";'></div>&nbsp;"+name_bar[i]+"&nbsp;"+this.points[i]['y']+" ม.รทก.<br>"
          }
          console.log(this.points)
            return txt
        }
      },
      plotOptions: {
        spline: {
          marker: {
            radius: 4,
            lineColor: '#666666',
            lineWidth: 1
          }
        }
      },
      series: dataset_series
    });
  }else if(type == "customer"){
    let dataset_series = []
    key_label = []
    let n = 0
    let item_lit = []
    console.log(storage_data)

    document.getElementById('alert_customer').innerHTML = getTextRange()

    let year_item = {}
    Object.entries(storage_data).forEach(([key, value]) => {
      let tmp_split = parseInt(value['date'].split('-')[0])+543
      if(document.getElementById('year_select_start').value == tmp_split && document.getElementById('year_select_end').value == "เลือกปี"){
        if(year_item[tmp_split]==undefined){
          year_item[tmp_split] = []
        }
        year_item[tmp_split].push((value['wl']+""=="NaN"?0:value['wl']))
        key_label.push(parttern_label[value['date'].split('-')[1]])
      }else if(document.getElementById('year_select_start').value <= tmp_split && document.getElementById('year_select_end').value >= tmp_split){
        if(year_item[tmp_split]==undefined){
          year_item[tmp_split] = []
        }
        year_item[tmp_split].push((value['wl']+""=="NaN"?0:value['wl']))
        key_label.push(parttern_label[value['date'].split('-')[1]])
      }else if(document.getElementById('year_select').value == tmp_split){
        if(year_item[tmp_split]==undefined){
          year_item[tmp_split] = []
        }
        year_item[tmp_split].push((value['wl']+""=="NaN"?0:value['wl']))
        key_label.push(parttern_label[value['date'].split('-')[1]])
      }
      console.log(value['date'],value['wateruse'],((value['wateruse']+""=="NaN"?" ":value['wateruse'])))
    })
    console.log(item_lit)
    let name_bar = []
    Object.entries(year_item).forEach(([key, value]) => {
      dataset_series.push({
        name: key,
        data: value
      })
      name_bar.push(key)
    })
    Highcharts.chart('highcharts-customer', {
      chart: {
        type: 'spline'
      },
      title: {
        text: 'ปริมาณการใช้น้ำของลูกค้า'
      },
      xAxis: {
        categories:key_label,
        accessibility: {
          description: 'Months of the year'
        },
        labels: {
            step: 31
        }
      },
      yAxis: {
        title: {
          text: 'ปริมาณการใช้น้ำของลูกค้า,ลบ.ม.'
        },
          labels: {
            formatter: function () {
              return this.value;
            },
            style: {
              fontSize: '14px',
            }
          }
      },
      tooltip: {
        crosshairs: true,
        shared: true,
        outside: true,
        useHTML: true,
        formatter: function() {
          let txt= ""
          txt += this.x+"<br>"
          for(let i=0;i<this.points.length;i++){
            txt+= "<div style='border-radius:25px;width:10px;height:10px;display:inline-block;background:"+this.points[i]['color']+";'></div>&nbsp;"+name_bar[i]+"&nbsp;"+this.points[i]['y']+" ลบ.ม.<br>"
          }
          console.log(this.points)
            return txt
        }
      },
      plotOptions: {
        spline: {
          marker: {
            radius: 4,
            lineColor: '#666666',
            lineWidth: 1
          }
        }
      },
      series: dataset_series
    });
  }else if(type == "wq"){
    let dataset_series = []
    key_label = []
    let n = 0
    let item_lit = []
    let text = ""

    text += "ข้อมูลคุณภาพน้ำสถานี "
    text += $("#val_data :selected").text()
    text += " ปี "
    text += document.getElementById('year_select_start').value
    document.getElementById('alert_wq').innerHTML = text

    item_lit = []
    dataset_series = []

    let data_lit = {}
    let data_lit_key = {}
    Object.entries(storage_data).forEach(([key, value]) => {
      let tmp_date = value['date'].split(',')[0].split(' ')[0]
      let tmp_date_format = tmp_date.split('-')[0]
      if(data_lit[parseInt(tmp_date_format)+543] == undefined){
        data_lit[parseInt(tmp_date_format)+543] = []
        data_lit_key[parseInt(tmp_date_format)+543] = []
      }
      data_lit[parseInt(tmp_date_format)+543].push(!Number.isInteger(value['Salinty'])?0:value['Salinty'])
      data_lit_key[parseInt(tmp_date_format)+543].push(parttern_label[tmp_date.split('-')[1]])
    })
    let name_bar = []
    Object.entries(data_lit).forEach(([key, value]) => {
      console.log(key,document.getElementById('year_select_start').value)
      if(key == document.getElementById('year_select_start').value){
        dataset_series.push({
          name: key,
          data: value
        })
        name_bar.push(key)
      }
    })

    console.log(Object.values(data_lit_key)[0])
    Highcharts.chart('highcharts-wq-Salinty', {
      chart: {
        type: 'spline'
      },
      title: {
        text: 'ความเค็ม'
      },
      xAxis: {
        categories:Object.values(data_lit_key)[0],
        accessibility: {
          description: 'Months of the year'
        },
        labels: {
            step: 31,
            style: {
              fontSize: '14px',
            }
        }
      },
      yAxis: {
        title: {
          text: 'ความเค็ม,g/l'
        },
          labels: {
            formatter: function () {
              return this.value;
            },
            style: {
      				fontSize: '14px',
      			}
          }
      },
      tooltip: {
        crosshairs: true,
        shared: true,
        outside: true,
        useHTML: true,
        formatter: function() {
          let txt= ""
          txt += this.x+"<br>"
          for(let i=0;i<this.points.length;i++){
            txt+= "<div style='border-radius:25px;width:10px;height:10px;display:inline-block;background:"+this.points[i]['color']+";'></div>&nbsp;"+name_bar[i]+"&nbsp;"+this.points[i]['y']+" g/l<br>"
          }
          console.log(this.points)
            return txt
        }
      },
      plotOptions: {
        spline: {
          marker: {
            radius: 4,
            lineColor: '#666666',
            lineWidth: 1
          }
        }
      },
      series: dataset_series
    });

    item_lit = []
    dataset_series = []

    data_lit = {}
    data_lit_key = {}
    Object.entries(storage_data).forEach(([key, value]) => {
      let tmp_date = value['date'].split(',')[0].split(' ')[0]
      let tmp_date_format = tmp_date.split('-')[0]
      if(data_lit[parseInt(tmp_date_format)+543] == undefined){
        data_lit[parseInt(tmp_date_format)+543] = []
        data_lit_key[parseInt(tmp_date_format)+543] = []
      }
      data_lit[parseInt(tmp_date_format)+543].push(!Number.isInteger(value['pH'])?0:value['pH'])
      data_lit_key[parseInt(tmp_date_format)+543].push(parttern_label[tmp_date.split('-')[1]])
    })
    name_bar = []
    Object.entries(data_lit).forEach(([key, value]) => {
      if(key == document.getElementById('year_select_start').value){
        dataset_series.push({
          name: key,
          data: value
        })
        name_bar.push(key)
      }
    })

    Highcharts.chart('highcharts-wq-pH', {
      chart: {
        type: 'spline'
      },
      title: {
        text: 'กรด-ด่าง'
      },
      xAxis: {
        categories:Object.values(data_lit_key)[0],
        accessibility: {
          description: 'Months of the year'
        },
        labels: {
            step: 31,
            style: {
              fontSize: '14px',
            }
        }
      },
      yAxis: {
        title: {
          text: 'กรด-ด่าง,pH'
        },
          labels: {
            formatter: function () {
              return this.value;
            },
            style: {
      				fontSize: '14px',
      			}
          }
      },
      tooltip: {
        crosshairs: true,
        shared: true,
        outside: true,
        useHTML: true,
        formatter: function() {
          let txt= ""
          txt += this.x+"<br>"
          for(let i=0;i<this.points.length;i++){
            txt+= "<div style='border-radius:25px;width:10px;height:10px;display:inline-block;background:"+this.points[i]['color']+";'></div>&nbsp;"+name_bar[i]+"&nbsp;"+this.points[i]['y']+" pH<br>"
          }
          console.log(this.points)
            return txt
        }
      },
      plotOptions: {
        spline: {
          marker: {
            radius: 4,
            lineColor: '#666666',
            lineWidth: 1
          }
        }
      },
      series: dataset_series
    });

    item_lit = []
    dataset_series = []

    data_lit = {}
    data_lit_key = {}
    Object.entries(storage_data).forEach(([key, value]) => {
      let tmp_date = value['date'].split(',')[0].split(' ')[0]
      let tmp_date_format = tmp_date.split('-')[0]
      if(data_lit[parseInt(tmp_date_format)+543] == undefined){
        data_lit[parseInt(tmp_date_format)+543] = []
        data_lit_key[parseInt(tmp_date_format)+543] = []
      }
      data_lit[parseInt(tmp_date_format)+543].push(!Number.isInteger(value['Temp'])?0:value['Temp'])
      data_lit_key[parseInt(tmp_date_format)+543].push(parttern_label[tmp_date.split('-')[1]])
    })
    name_bar = []
    Object.entries(data_lit).forEach(([key, value]) => {
      if(key == document.getElementById('year_select_start').value){
        dataset_series.push({
          name: key,
          data: value
        })
        name_bar.push(key)
      }
    })

    Highcharts.chart('highcharts-wq-Temp', {
      chart: {
        type: 'spline'
      },
      title: {
        text: 'อุณหภูมิ'
      },
      xAxis: {
        categories:Object.values(data_lit_key)[0],
        accessibility: {
          description: 'Months of the year'
        },
        labels: {
            step: 31,
            style: {
              fontSize: '14px',
            }
        }
      },
      yAxis: {
        title: {
          text: 'อุณหภูมิ,°C'
        },
          labels: {
            formatter: function () {
              return this.value;
            },
            style: {
      				fontSize: '14px',
      			}
          }
      },
      tooltip: {
        crosshairs: true,
        shared: true,
        outside: true,
        useHTML: true,
        formatter: function() {
          let txt= ""
          txt += this.x+"<br>"
          for(let i=0;i<this.points.length;i++){
            txt+= "<div style='border-radius:25px;width:10px;height:10px;display:inline-block;background:"+this.points[i]['color']+";'></div>&nbsp;"+name_bar[i]+"&nbsp;"+this.points[i]['y']+" °C<br>"
          }
          console.log(this.points)
            return txt
        }
      },
      plotOptions: {
        spline: {
          marker: {
            radius: 4,
            lineColor: '#666666',
            lineWidth: 1
          }
        }
      },
      series: dataset_series
    });

    item_lit = []
    dataset_series = []

    data_lit = {}
    data_lit_key = {}
    Object.entries(storage_data).forEach(([key, value]) => {
      let tmp_date = value['date'].split(',')[0].split(' ')[0]
      let tmp_date_format = tmp_date.split('-')[0]
      if(data_lit[parseInt(tmp_date_format)+543] == undefined){
        data_lit[parseInt(tmp_date_format)+543] = []
        data_lit_key[parseInt(tmp_date_format)+543] = []
      }
      data_lit[parseInt(tmp_date_format)+543].push(!Number.isInteger(value['TDS'])?0:value['TDS'])
      data_lit_key[parseInt(tmp_date_format)+543].push(parttern_label[tmp_date.split('-')[1]])
    })
    name_bar = []
    Object.entries(data_lit).forEach(([key, value]) => {
      if(key == document.getElementById('year_select_start').value){
        dataset_series.push({
          name: key,
          data: value
        })
        name_bar.push(key)
      }
    })

    Highcharts.chart('highcharts-wq-TDS', {
      chart: {
        type: 'spline'
      },
      title: {
        text: 'ของแข็งละลายน้ำ'
      },
      xAxis: {
        categories:Object.values(data_lit_key)[0],
        accessibility: {
          description: 'Months of the year'
        },
        labels: {
            step: 31,
            style: {
              fontSize: '14px',
            }
        }
      },
      yAxis: {
        title: {
          text: 'ของแข็งละลายน้ำ,mg/l'
        },
          labels: {
            formatter: function () {
              return this.value;
            },
            style: {
      				fontSize: '14px',
      			}
          }
      },
      tooltip: {
        crosshairs: true,
        shared: true,
        outside: true,
        useHTML: true,
        formatter: function() {
          let txt= ""
          txt += this.x+"<br>"
          for(let i=0;i<this.points.length;i++){
            txt+= "<div style='border-radius:25px;width:10px;height:10px;display:inline-block;background:"+this.points[i]['color']+";'></div>&nbsp;"+name_bar[i]+"&nbsp;"+this.points[i]['y']+" mg/l<br>"
          }
          console.log(this.points)
            return txt
        }
      },
      plotOptions: {
        spline: {
          marker: {
            radius: 4,
            lineColor: '#666666',
            lineWidth: 1
          }
        }
      },
      series: dataset_series
    });

    item_lit = []
    dataset_series = []

    data_lit = {}
    data_lit_key = {}
    Object.entries(storage_data).forEach(([key, value]) => {
      let tmp_date = value['date'].split(',')[0].split(' ')[0]
      let tmp_date_format = tmp_date.split('-')[0]
      if(data_lit[parseInt(tmp_date_format)+543] == undefined){
        data_lit[parseInt(tmp_date_format)+543] = []
        data_lit_key[parseInt(tmp_date_format)+543] = []
      }
      data_lit[parseInt(tmp_date_format)+543].push(!Number.isInteger(value['DO'])?0:value['DO'])
      data_lit_key[parseInt(tmp_date_format)+543].push(parttern_label[tmp_date.split('-')[1]])
    })
    name_bar = []
    Object.entries(data_lit).forEach(([key, value]) => {
      if(key == document.getElementById('year_select_start').value){
        dataset_series.push({
          name: key,
          data: value
        })
        name_bar.push(key)
      }
    })

    Highcharts.chart('highcharts-wq-DO', {
      chart: {
        type: 'spline'
      },
      title: {
        text: 'ออกซิเจนในน้ำ'
      },
      xAxis: {
        categories:Object.values(data_lit_key)[0],
        accessibility: {
          description: 'Months of the year'
        },
        labels: {
            step: 31,
            style: {
              fontSize: '14px',
            }
        }
      },
      yAxis: {
        title: {
          text: 'ออกซิเจนในน้ำ,mg/l'
        },
          labels: {
            formatter: function () {
              return this.value;
            },
            style: {
      				fontSize: '14px',
      			}
          }
      },
      tooltip: {
        crosshairs: true,
        shared: true,
        outside: true,
        useHTML: true,
        formatter: function() {
          let txt= ""
          txt += this.x+"<br>"
          for(let i=0;i<this.points.length;i++){
            txt+= "<div style='border-radius:25px;width:10px;height:10px;display:inline-block;background:"+this.points[i]['color']+";'></div>&nbsp;"+name_bar[i]+"&nbsp;"+this.points[i]['y']+" mg/l<br>"
          }
          console.log(this.points)
            return txt
        }
      },
      plotOptions: {
        spline: {
          marker: {
            radius: 4,
            lineColor: '#666666',
            lineWidth: 1
          }
        }
      },
      series: dataset_series
    });

    item_lit = []
    dataset_series = []

    data_lit = {}
    data_lit_key = {}
    Object.entries(storage_data).forEach(([key, value]) => {
      let tmp_date = value['date'].split(',')[0].split(' ')[0]
      let tmp_date_format = tmp_date.split('-')[0]
      if(data_lit[parseInt(tmp_date_format)+543] == undefined){
        data_lit[parseInt(tmp_date_format)+543] = []
        data_lit_key[parseInt(tmp_date_format)+543] = []
      }
      data_lit[parseInt(tmp_date_format)+543].push(!Number.isInteger(value['EC'])?0:value['EC'])
      data_lit_key[parseInt(tmp_date_format)+543].push(parttern_label[tmp_date.split('-')[1]])
    })
    name_bar = []
    Object.entries(data_lit).forEach(([key, value]) => {
      console.log(key,)
      if(key == document.getElementById('year_select_start').value){
        dataset_series.push({
          name: key,
          data: value
        })
        name_bar.push(key)
      }
    })

    Highcharts.chart('highcharts-wq-EC', {
      chart: {
        type: 'spline'
      },
      title: {
        text: 'ค่าการนำไฟฟ้า'
      },
      xAxis: {
        categories:Object.values(data_lit_key)[0],
        accessibility: {
          description: 'Months of the year'
        },
        labels: {
            step: 31,
            style: {
              fontSize: '14px',
            }
        }
      },
      yAxis: {
        title: {
          text: 'ค่าการนำไฟฟ้า,µS/cm'
        },
          labels: {
            formatter: function () {
              return this.value;
            },
            style: {
      				fontSize: '14px',
      			}
          }
      },
      tooltip: {
        crosshairs: true,
        shared: true,
        outside: true,
        useHTML: true,
        formatter: function() {
          let txt= ""
          txt += this.x+"<br>"
          for(let i=0;i<this.points.length;i++){
            txt+= "<div style='border-radius:25px;width:10px;height:10px;display:inline-block;background:"+this.points[i]['color']+";'></div>&nbsp;"+name_bar[i]+"&nbsp;"+this.points[i]['y']+" µS/cm<br>"
          }
          console.log(this.points)
            return txt
        }
      },
      plotOptions: {
        spline: {
          marker: {
            radius: 4,
            lineColor: '#666666',
            lineWidth: 1
          }
        }
      },
      series: dataset_series
    });

  }else if(type == "rain"){
    let dataset_series = []
    key_label = []
    let n = 0
    let item_lit = []

    document.getElementById('alert_rain').innerHTML = getTextRange()
    console.log(Object.keys(storage_data).length)

    year_tmp = {}
    year_name = {}

    Object.entries(storage_data).forEach(([key, value]) => {

      let tmp_split = parseInt(value['date'].split('-')[0])+543
      if(document.getElementById('year_select_start').value == tmp_split && document.getElementById('year_select_end').value == "เลือกปี"){
        if(year_tmp[tmp_split] == undefined){
          year_tmp[tmp_split] = []
          year_name[tmp_split] = []
        }
        year_tmp[tmp_split].push(value['rain'])
        year_name[tmp_split].push(parttern_label[value['date'].split('-')[1]])

      }else if(document.getElementById('year_select_start').value <= tmp_split && document.getElementById('year_select_end').value >= tmp_split || document.getElementById('year_select').value >= tmp_split){
        if(year_tmp[tmp_split] == undefined){
          year_tmp[tmp_split] = []
          year_name[tmp_split] = []
        }
        year_tmp[tmp_split].push(value['rain'])
        year_name[tmp_split].push(parttern_label[value['date'].split('-')[1]])

      }


    })
    dataset_series = []
    i = 0
    let name_bar = []
    Object.entries(year_tmp).forEach(([key,value])=>{
      dataset_series.push({
        name: key,
        data: value,
        color: color_list[i]
      })
      name_bar.push(key)
      i+=1
      let last = ''
      key_label = []
      let count = 0
      for(let n=0;n<12;n++){
        for(let i=0;i<30;i++){
          console.log(parttern_label[(((n+1)+[]).length == 1?'0'+((n+1)+[]):(n+1)+[])])
          if(last != parttern_label[(((n+1)+[]).length == 1?'0'+((n+1)+[]):(n+1)+[])]){
            last = parttern_label[(((n+1)+[]).length == 1?'0'+((n+1)+[]):(n+1)+[])]
            key_label.push(last)
            count += 1
          }else{
            key_label.push(' ')
            count = 0
          }
          
        }
      }
      for(let i=0;i<5;i++){
        key_label.push(' ')
      }
      console.log(key_label)
    })

    

    Highcharts.chart('highcharts-rain', {
      chart: {
        type: 'column'
      },
      title: {
        text: 'ปริมาณน้ำฝน'
      },
      xAxis: {
        categories:key_label,
        accessibility: {
          description: 'Months of the year'
        },
        labels: {
            step: 31,
            style: {
              fontSize: '14px',
            }
        }
      },
      yAxis: {
        title: {
          text: 'ปริมาณน้ำฝน,มม.'
        },
          labels: {
            formatter: function () {
              return this.value;
            },
            style: {
      				fontSize: '14px',
      			}
          }
      },
      tooltip: {
        crosshairs: true,
        shared: true,
        outside: true,
        useHTML: true,
        formatter: function() {
          let txt= ""
          txt += this.x+"<br>"
          for(let i=0;i<this.points.length;i++){
            txt+= "<div style='border-radius:25px;width:10px;height:10px;display:inline-block;background:"+this.points[i]['color']+";'></div>&nbsp;"+name_bar[i]+"&nbsp;"+this.points[i]['y']+" มม.<br>"
          }
          console.log(this.points)
            return txt
        }
      },
      plotOptions: {
        spline: {
          marker: {
            radius: 4,
            lineColor: '#666666',
            lineWidth: 1
          }
        }
      },
      series: dataset_series
    });

  }else if(type == "tele"){
    let dataset_series = []
    key_label = []
    let n = 0
    let item_lit = []

    let text = ""
    text += "ข้อมูลสถานีโทรมาตร "
    if(document.getElementById('year_select_end').value == 'เลือกปี'){
      text += " ปี "
      text += document.getElementById('year_select_start').value
    }else{
      text += " ช่วงปี "
      text += document.getElementById('year_select_start').value
      text += " ถึงปี "
      text += (document.getElementById('year_select').value !='เลือกปี' && parseInt(document.getElementById('year_select').value)>parseInt(document.getElementById('year_select_end').value)?document.getElementById('year_select').value:document.getElementById('year_select_end').value)
    }
    document.getElementById('alert_tele').innerHTML = text
    let date_count = []
    let month_tmp = ''
    let data_set = {}
    // Creates a label for each item in the storage data.
    Object.entries(storage_data).forEach(([key, value]) => {
      //console.log(value['date'].split('-'))
      if(month_tmp != value['date'].split('-')[1]){
        date_count = []
      }

      //console.log(value['date'].split('-')[0],document.getElementById('year_select_start').value)
      if(!date_count.includes(value['date'].split('-')[2].split(' ')[0]) && (value['date'].split('-')[0] == document.getElementById('year_select_start').value-543 || value['date'].split('-')[0] == document.getElementById('year_select_end').value-543)){
        console.log(data_set[key.split('-')[0]])
        if(data_set[key.split('-')[0]]==undefined){
          console.log('s')
          data_set[key.split('-')[0]] = []
        }
        data_set[key.split('-')[0]].push(value['wl']==undefined?0:value['wl'])
        item_lit.push(value['wl']==undefined?0:value['wl'])
        key_label.push(parttern_label[value['date'].split('-')[1]])
        date_count.push(value['date'].split('-')[2].split(' ')[0])
        //console.log(value['date'])
        month_tmp = value['date'].split('-')[1]
      }
    })
    key_label = []
    for(let n=0;n<12;n++){
      for(let i=0;i<30;i++){
        console.log((((n+1)+[]).length == 1?'0'+((n+1)+[]):(n+1)+[]))
        key_label.push(parttern_label[(((n+1)+[]).length == 1?'0'+((n+1)+[]):(n+1)+[])])
      }
    }
    let name_bar = []
    console.log(key_label,key_label.length,data_set)
    for(let n=0;n<Object.values(data_set).length;n++){
      let tmp_l = (365-Object.values(data_set)[n].length)
      console.log(tmp_l)
      for(let i=0;i<(tmp_l);i++){
        console.log(Object.keys(data_set)[n])
        if(Object.keys(data_set)[n] == '2023'){
          data_set[Object.keys(data_set)[n]].push(0);
        }else if(Object.keys(data_set)[n] == '2022'){
          data_set[Object.keys(data_set)[n]].splice(1, 0, 0);
        }
      }
      dataset_series.push({
        name: parseInt(Object.keys(data_set)[n])+543,
        data: Object.values(data_set)[n],
        color: color_list[n]
      })
      name_bar.push(parseInt(Object.keys(data_set)[n])+543)
    }


    // Plots the value of the dataset.
    Highcharts.chart('highcharts-tele-wl', {
      chart: {
        type: 'spline'
      },
      title: {
        text: 'ระดับน้ำ'
      },
      xAxis: {
        categories:key_label,
        accessibility: {
          description: 'Months of the year'
        },
        labels: {
            step: 31,
            style: {
              fontSize: '14px',
            }
        }
      },
      yAxis: {
        title: {
          text: 'ระดับน้ำ,ม.รทก.'
        },
          labels: {
            formatter: function () {
              return this.value;
            },
            style: {
      				fontSize: '14px',
      			}
          }
      },
      tooltip: {
        crosshairs: true,
        shared: true,
        outside: true,
        useHTML: true,
        formatter: function() {
          let txt= ""
          txt += this.x+"<br>"
          for(let i=0;i<this.points.length;i++){
            txt+= "<div style='border-radius:25px;width:10px;height:10px;display:inline-block;background:"+this.points[i]['color']+";'></div>&nbsp;"+name_bar[i]+"&nbsp;"+this.points[i]['y']+" ม.รทก.<br>"
          }
          console.log(this.points)
            return txt
        }
      },
      plotOptions: {
        spline: {
          marker: {
            radius: 4,
            lineColor: '#666666',
            lineWidth: 1
          }
        }
      },
      series: dataset_series
    });

    item_lit = []
    dataset_series = []
    data_set = {}
    date_count = []
    month_tmp = ''
    // Creates a label for each item in the storage data.
    Object.entries(storage_data).forEach(([key, value]) => {
      //console.log(value['date'].split('-'))
      if(month_tmp != value['date'].split('-')[1]){
        date_count = []
      }
      if(!date_count.includes(value['date'].split('-')[2].split(' ')[0]) && (value['date'].split('-')[0] == document.getElementById('year_select_start').value-543 || value['date'].split('-')[0] == document.getElementById('year_select_end').value-543)){

        if(data_set[key.split('-')[0]]==undefined){
          console.log('s')
          data_set[key.split('-')[0]] = []
        }
        data_set[key.split('-')[0]].push(value['discharge']==undefined?0:value['discharge'])
        key_label.push(parttern_label[value['date'].split('-')[1]])
        date_count.push(value['date'].split('-')[2].split(' ')[0])
        month_tmp = value['date'].split('-')[1]
      }
    })


    console.log(key_label,key_label.length,data_set)
    for(let n=0;n<Object.values(data_set).length;n++){
      let tmp_l = (365-Object.values(data_set)[n].length)
      for(let i=0;i<(tmp_l);i++){
        console.log(Object.keys(data_set)[n])
        if(Object.keys(data_set)[n] == '2023'){
          data_set[Object.keys(data_set)[n]].push(0);
        }else if(Object.keys(data_set)[n] == '2022'){
          data_set[Object.keys(data_set)[n]].splice(1, 0, 0);
        }
      }
      console.log(365-Object.values(data_set)[n].length)
      console.log(Object.values(data_set)[n])
      dataset_series.push({
        name: parseInt(Object.keys(data_set)[n])+543,
        data: Object.values(data_set)[n],
        color: color_list[n]
      })
    }

    // Creates a spline plot
    Highcharts.chart('highcharts-tele-discharge', {
      chart: {
        type: 'spline'
      },
      title: {
        text: 'ปริมาณน้ำ'
      },
      xAxis: {
        categories:key_label,
        accessibility: {
          description: 'Months of the year'
        },
        labels: {
            step: 31,
            style: {
              fontSize: '14px',
            }
        }
      },
      yAxis: {
        title: {
          text: 'ปริมาณน้ำ,ลบ.ม./วินาที'
        },
          labels: {
            formatter: function () {
              return this.value;
            }
          }
      },
      tooltip: {
        crosshairs: true,
        shared: true,
        outside: true,
        useHTML: true,
        formatter: function() {
          let txt= ""
          txt += this.x+"<br>"
          for(let i=0;i<this.points.length;i++){
            txt+= "<div style='border-radius:25px;width:10px;height:10px;display:inline-block;background:"+this.points[i]['color']+";'></div>&nbsp;"+this.points[i]['y']+" ลบ.ม./วินาที<br>"
          }
          console.log(this.points)
            return txt
        }
      },
      plotOptions: {
        spline: {
          marker: {
            radius: 4,
            lineColor: '#666666',
            lineWidth: 1
          }
        }
      },
      series: dataset_series
    });

    item_lit = []
    dataset_series = []
    data_set = {}
    date_count = []
    month_tmp = ''
    // Creates a label for each item in the storage data.
    Object.entries(storage_data).forEach(([key, value]) => {
      //console.log(value['date'].split('-'))
      if(month_tmp != value['date'].split('-')[1]){
        date_count = []
      }
      if(!date_count.includes(value['date'].split('-')[2].split(' ')[0]) && (value['date'].split('-')[0] == document.getElementById('year_select_start').value-543 || value['date'].split('-')[0] == document.getElementById('year_select_end').value-543)){

        if(data_set[key.split('-')[0]]==undefined){
          console.log('s')
          data_set[key.split('-')[0]] = []
        }
        data_set[key.split('-')[0]].push(value['rain']==undefined?0:value['rain'])
        key_label.push(parttern_label[value['date'].split('-')[1]])
        date_count.push(value['date'].split('-')[2].split(' ')[0])
        month_tmp = value['date'].split('-')[1]
      }
    })

    for(let n=0;n<Object.values(data_set).length;n++){
      dataset_series.push({
        name: parseInt(Object.keys(data_set)[n])+543,
        data: Object.values(data_set)[n],
        color: color_list[n]
      })
    }


    // Generates tele - rain plot.
    Highcharts.chart('highcharts-tele-rain', {
      chart: {
        type: 'column'
      },
      title: {
        text: 'ปริมาณน้ำฝน'
      },
      xAxis: {
        categories:key_label,
        accessibility: {
          description: 'Months of the year'
        },
        labels: {
            step: 31,
            style: {
              fontSize: '14px',
            }
        }
      },
      yAxis: {
        title: {
          text: 'ปริมาณน้ำฝน,มม.'
        },
          labels: {
            formatter: function () {
              return this.value;
            }
          }
      },
      tooltip: {
        crosshairs: true,
        shared: true,
        outside: true,
        useHTML: true,
        formatter: function() {
          let txt= ""
          txt += this.x+"<br>"
          for(let i=0;i<this.points.length;i++){
            txt+= "<div style='border-radius:25px;width:10px;height:10px;display:inline-block;background:"+this.points[i]['color']+";'></div>&nbsp;"+this.points[i]['y']+" มม.<br>"
          }
          console.log(this.points)
            return txt
        }
      },
      plotOptions: {
        spline: {
          marker: {
            radius: 4,
            lineColor: '#666666',
            lineWidth: 1
          }
        }
      },
      series: dataset_series
    });
  }
}

// Creates a table for the storage data.
function makeTable(){
  // empty - empty empty string
  $('#group_make_table').empty()

  let n = 0
  let tmp = Object.values(storage_data)

  // Returns a list of data and volumes for a given year.
  year_list = []
  data_list = []
  vol_list = []
  inflow_list = []
  outflow_list = []

  if(true){
    // let s get the label for a value
    let parttern_label = {
      '01':'ม.ค.',
      '02':'ก.พ.',
      '03':'มี.ค.',
      '04':'เม.ย.',
      '05':'พ.ค.',
      '06':'มิ.ย.',
      '07':'ก.ค.',
      '08':'ส.ค.',
      '09':'ก.ย.',
      '10':'ต.ค.',
      '11':'พ.ย.',
      '12':'ธ.ค.',
    }
    let type = document.getElementById('val_type').value

    // Creates a SELECT statement for a storage table
    if(type=='reservoir'){
      $('#group_make_table').append("<table id='reservoir_bodyT'></table>")
        let data_val = Object.values(storage_data)
        let n = 0
        let text = getTextRange()

        $('#reservoir_bodyT').empty()
        $('#reservoir_bodyT').append(`
          <tr style="display: none;">
            <th>${text}</th>
          </tr>
          <tr style="display: none;">
              <th>วันที่</th><th>ระดับน้ำ<br>(ม.รทก.)</th><th>ปริมาตรน้ำ<br>(ล้าน ลบ.ม)</th><th>น้ำไหลเข้าอ่าง<br>(ล้าน ลบ.ม)</th><th>น้ำระบาย<br>(ล้าน ลบ.ม)</th>
          </tr>
        `)

        Object.keys(storage_data).forEach(head => {
          // Parse date and column labels.
          let data_filter = Object.values(data_val[n])
          let da_t = head.split(' ')
          da_t = da_t[0].split(',')
          da_t = da_t[0].split('-')
          let date_col = parseInt(da_t[2]) +" "+parttern_label[da_t[1]] + " "+(parseInt(da_t[0])+543)

          let rule = (parseInt(document.getElementById('year_select_start').value) == (parseInt(da_t[0])+543) &&

                      document.getElementById('year_select_end').value =='เลือกปี' ||
                      (parseInt(document.getElementById("year_select").value) == (parseInt(da_t[0])+543) &&

                      document.getElementById("year_select").value != 'เลือกปี') ||
                      (parseInt(document.getElementById("year_select").value) == (parseInt(da_t[0])+543) &&
                      document.getElementById("year_select").value != 'เลือกปี') ||
                      parseInt(document.getElementById("year_select").value) == (parseInt(da_t[0])+543) ||
                      ((parseInt(da_t[0])+543) >= parseInt(document.getElementById("year_select_start").value) &&

                      (parseInt(da_t[0])+543) <= parseInt(document.getElementById("year_select_end").value)))

          if(rule){
            // Render a reserved body.
            $('#reservoir_bodyT').append(`
              <tr>
                  <td>${(date_col)}</td>
                  <td>${number_add_comma((data_filter[1])?data_filter[1].toFixed(2):"")}</td>
                  <td>${number_add_comma((data_filter[2] && data_filter[2] != "" && data_filter[2] != '#N/A')?data_filter[2].toFixed(2):"0.00")}</td>
                  <td>${number_add_comma((data_filter[3] && data_filter[3] != "" && data_filter[3] != '#N/A')?data_filter[3].toFixed(2):"0.00")}</td>
                  <td>${number_add_comma((data_filter[4] && data_filter[4] != "" && data_filter[4] != '#N/A')?data_filter[4].toFixed(2):"0.00")}</td>
              </tr>`)

            // Update the inflow set if necessary.
            if(inflow_set[(parseInt(da_t[0])+543)]==undefined){
              inflow_set[(parseInt(da_t[0])+543)] = []
            }

            // Checks if the outflow set is undefined and adds it to the output set.
            if(outflow_set[(parseInt(da_t[0])+543)]==undefined){
              outflow_set[(parseInt(da_t[0])+543)] = []
            }

            // Converts a string to a number.
            inflow_set[(parseInt(da_t[0])+543)].push((data_filter[3] && data_filter[3] != "" && data_filter[3] != '#N/A')?data_filter[3]:0)
            outflow_set[(parseInt(da_t[0])+543)].push((data_filter[4] && data_filter[4] != "" && data_filter[4] != '#N/A')?data_filter[4]:0)
          }
          n++
        })
    }else if(type=='flow'){
      // Remove the flow body.
      try {
        $('#flow_bodyT').remove()
      }catch(err){
        console.log('error')
      }

      $('#flow_group_make_table').append("<table id='flow_bodyT'></table>")
        // Returns a n - dimensional let data value
        let data_val = Object.values(storage_data)
        let n = 0
        let text = getTextRange()

        // Render flow body.
        $('#flow_bodyT').empty()
        $('#flow_bodyT').append(`
          <tr style="display: none;">
            <th>${text}</th>
          </tr>
          <tr style="display: none;">
            <th>วันที่</th><th>ระดับน้ำ<br>(ม.รทก.)</th><th>ปริมาตรน้ำ<br>(ล้าน ลบ.ม.)</th>
          </tr>
        `)

        Object.keys(storage_data).forEach(head => {
          // Parse date and column labels.
          let data_filter = Object.values(data_val[n])
          let da_t = head.split(' ')
          da_t = da_t[0].split(',')
          da_t = da_t[0].split('-')
          let date_col = parseInt(da_t[2]) +" "+parttern_label[da_t[1]] + " "+(parseInt(da_t[0])+543)
          console.log(parseInt(document.getElementById("year_select_start").value) == (parseInt(da_t[0])+543))
          if((parseInt(document.getElementById("year_select_start").value) == (parseInt(da_t[0])+543) && document.getElementById("year_select_end").value == 'เลือกปี') || (parseInt(document.getElementById("year_select").value) == (parseInt(da_t[0])+543) && document.getElementById("year_select").value != 'เลือกปี') || parseInt(document.getElementById("year_select").value) == (parseInt(da_t[0])+543) || ((parseInt(da_t[0])+543) >= parseInt(document.getElementById("year_select_start").value) && (parseInt(da_t[0])+543) <= parseInt(document.getElementById("year_select_end").value))){
            console.log('debug')

            // Convert the flow body to a td.
            $('#flow_bodyT').append(`
              <tr>
                <td>${(date_col)}</td>
                <td>${number_add_comma(data_filter[2].toFixed(2))}</td>
                <td>${number_add_comma(data_filter[1].toFixed(2))}</td>
              </tr>`)
          }
          n++
        })
    }else if(type=='pump'){
      $('#pump_group_make_table').append("<table id='pump_bodyT'></table>")
        // Returns a n - dimensional let data value
        let data_val = Object.values(storage_data)
        let n = 0
        let text = getTextRange()

        // Returns a string with the body of apump body.
        $('#pump_bodyT').empty()
        $('#pump_bodyT').append(`
          <tr style="display: none;">
            <th>${text}</th>
          </tr>
          <tr style="display: none;">
            <th>วันที่</th><th>ปริมาณการสูบน้ำ</th>
          </tr>
        `)

        Object.keys(storage_data).forEach(head => {
          // Parse date and column labels.
          let data_filter = Object.values(data_val[n])
          let da_t = head.split(' ')
          da_t = da_t[0].split(',')
          da_t = da_t[0].split('-')
          let date_col = parseInt(da_t[2]) +" "+parttern_label[da_t[1]] + " "+(parseInt(da_t[0])+543)

          // Returns a td for a year select.
          if((parseInt(document.getElementById("year_select_start").value) == (parseInt(da_t[0])+543) && document.getElementById("year_select_end").value == 'เลือกปี') || (parseInt(document.getElementById("year_select").value) == (parseInt(da_t[0])+543) && document.getElementById("year_select").value != 'เลือกปี') || parseInt(document.getElementById("year_select").value) == (parseInt(da_t[0])+543) || ((parseInt(da_t[0])+543) >= parseInt(document.getElementById("year_select_start").value) && (parseInt(da_t[0])+543) <= parseInt(document.getElementById("year_select_end").value))){
            $('#pump_bodyT').append(`
              <tr>
                  <td>${(date_col)}</td>
                  <td>${number_add_comma(data_filter[1].toFixed(2))}</td>
              </tr>`)
          }
          n++
        })
    }else if(type=='customer'){
      $('#customer_group_make_table').append("<table id='customer_bodyT'></table>")
        // Returns a n - dimensional let data value
        let data_val = Object.values(storage_data)
        let n = 0
        let text = getTextRange()

        // Returns a string with the body of apump body.
        $('#customer_bodyT').empty()
        $('#customer_bodyT').append(`
          <tr style="display: none;">
            <th>${text}</th>
          </tr>
          <tr style="display: none;">
            <th>วันที่</th><th>ปริมาณการใช้น้ำของลูกค้า (ลบ.ม.)</th>
          </tr>
        `)

        Object.keys(storage_data).forEach(head => {
          // Parse date and column labels.
          let data_filter = Object.values(data_val[n])
          let da_t = head.split(' ')
          da_t = da_t[0].split(',')
          da_t = da_t[0].split('-')
          let date_col = parseInt(da_t[2]) +" "+parttern_label[da_t[1]] + " "+(parseInt(da_t[0])+543)

          // Returns a td containing the customer body
          if((parseInt(document.getElementById("year_select_start").value) == (parseInt(da_t[0])+543) && document.getElementById("year_select_end").value == 'เลือกปี') || parseInt(document.getElementById("year_select").value) == (parseInt(da_t[0])+543) || ((parseInt(da_t[0])+543) >= parseInt(document.getElementById("year_select_start").value) && (parseInt(da_t[0])+543) <= parseInt(document.getElementById("year_select_end").value))){
            $('#customer_bodyT').append(`
              <tr>
                  <td>${(date_col)}</td>
                  <td>${number_add_comma(data_filter[1].toFixed(2)+[])}</td>
              </tr>`)
          }
          n++
        })
    }else if(type=='wq'){
      $('#wq_group_make_table').append("<table id='wq_bodyT'></table>")
        // Returns a n - dimensional let data value
        let data_val = Object.values(storage_data)
        let n = 0
        let text = getTextRange()

        // Returns a displayable version of the dump body.
        $('#wq_bodyT').empty()
        $('#wq_bodyT').append(`
          <tr style="display: none;">
            <th>${text}</th>
          </tr>
          <tr style="display: none;">
            <th>วันที่</th><th>ความเค็ม (g/l)</th><th>กรด-ด่าง (pH)</th><th>ออกซิเจนในน้ำ (mg/l)</th><th>ค่าการนำไฟฟ้า (µS/cm)</th><th>อุณหภูมิ (°C)</th><th>ของแข็งละลายน้ำ (mg/l)</th>
          </tr>
        `)

        Object.keys(storage_data).forEach(head => {
          // Parse date and column labels.
          let data_filter = Object.values(data_val[n])
          let da_t = head.split(' ')
          da_t = da_t[0].split(',')
          da_t = da_t[0].split('-')
          let date_col = parseInt(da_t[2]) +" "+parttern_label[da_t[1]] + " "+(parseInt(da_t[0])+543)

          // Returns a WQ body for a date select.
          if((parseInt(document.getElementById("year_select_start").value) == (parseInt(da_t[0])+543) && document.getElementById("year_select_end").value == 'เลือกปี')){
            $('#wq_bodyT').append(`
              <tr>
                  <td>${(date_col)}</td>
                  <td>${number_add_comma(data_filter[6].toFixed(2))}</td>
                  <td>${number_add_comma(data_filter[5].toFixed(2))}</td>4
                  <td>${number_add_comma(data_filter[3].toFixed(2))}</td>
                  <td>${number_add_comma(data_filter[4].toFixed(2))}</td>3
                  <td>${number_add_comma(data_filter[1].toFixed(2))}</td>5
                  <td>${number_add_comma(data_filter[2].toFixed(2))}</td>2
                  <!--<td>${number_add_comma(data_filter[7].toFixed(2))}</td>-->
              </tr>`)
          }
          n++
        })
    }else if(type=='rain'){
      // Renders a table to be used in a row.
      $('#rain_group_make_table').empty()
      $('#rain_group_make_table').append("<table id='rain_bodyT'></table>")

      // Returns a n - dimensional let data value
      let data_val = Object.values(storage_data)
      let n = 0
      let text = getTextRange()

      // Renders a tr tag for the Rrain Body.
      $('#rain_bodyT').empty()
      $('#rain_bodyT').append(`
        <tr style="display: none;">
          <th>${text}</th>
        </tr>
        <tr style="display: none;">
            <th>วันที่</th><th>ปริมาณน้ำฝน (มม.)</th>
        </tr>
      `)

      Object.keys(storage_data).forEach(head => {
        // Parse a comma - separated list of values.
        let data_filter = Object.values(data_val[n])
        let da_t = head.split(' ')
        da_t = da_t[0].split(',')
        da_t = da_t[0].split('-')

        // Returns a tr for a year select
        if(parseInt(document.getElementById("year_select_start").value) == (parseInt(da_t[0])+543) && (document.getElementById("year_select_end").value == 'เลือกปี') || (parseInt(document.getElementById("year_select").value) == (parseInt(da_t[0])+543) && document.getElementById("year_select").value != 'เลือกปี') || parseInt(document.getElementById("year_select").value) == (parseInt(da_t[0])+543) || ((parseInt(da_t[0])+543) >= parseInt(document.getElementById("year_select_start").value) && (parseInt(da_t[0])+543) <= parseInt(document.getElementById("year_select_end").value))){
          $('#rain_bodyT').append(`
            <tr>
                <td>${(data_filter[0])}</td>
                <td>${number_add_comma(data_filter[1].toFixed(2))}</td>
            </tr>`)
        }
        n++
      })
    }else if(type=='tele'){
      $('#tele_group_make_table').append("<table id='tele_bodyT'></table>")
        // Returns a n - dimensional let data value
        let data_val = Object.values(storage_data)
        let n = 0
        let text = getTextRange()

        // Display the Tele Body T.
        $('#tele_bodyT').empty()
        $('#tele_bodyT').append(`
          <tr style="display: none;">
            <th>${text}</th>
          </tr>
          <tr style="display: none;">
              <th>วันที่</th><th>ระดับน้ำ (ม.รทก.)</th><th>ปริมาณน้ำ (ลบ.ม./วินาที)</th><th>ปริมาณน้ำฝน (มม.)</th>
          </tr>
        `)
        let dt = new Date()
        let m = (dt.getMonth()+1)
        let format_date = (dt.getDate()+[]).length == 1?'0'+dt.getDate():dt.getDate()+[]
        let format_ftp = (dt.getFullYear()+[])+(((m+[]).length == 1)?'0'+m:m+[])+format_date
        let h_tmp = (dt.getHours()+[].length == 1)?'0'+dt.getHours()+[]:dt.getHours()+[]
        let format_time = 15*parseInt(dt.getMinutes()/15)
        format_time = (format_time+[].length == 1)?'0'+format_time+[]:format_time+[]
        format_time = (format_time == '0')?'0'+format_time:format_time

        h_tmp = (h_tmp+[] == '0')?'0'+h_tmp:h_tmp
        console.log(dt.getMinutes(),h_tmp,format_time)
        console.log('http://eswoc.rid.go.th/ipcam/STN0001/'+format_ftp+'/EAST_'+format_ftp+'_'+h_tmp+format_time+'.jpg')
        $('#image_ftp').attr('src','http://eswoc.rid.go.th/ipcam/STN0001/'+format_ftp+'/EAST_'+format_ftp+'_'+h_tmp+format_time+'.jpg')
        Object.keys(storage_data).forEach(head => {
          // Parse a date and column from a string.
            let data_filter = Object.values(data_val[n])
            let da_t = head.split(' ')
            da_t = da_t[0].split(',')
            da_t = da_t[0].split('-')
            let date_col = parseInt(da_t[2]) +" "+parttern_label[da_t[1]] + " "+(parseInt(da_t[0])+543) +" " + data_filter[0].split(' ')[1] + ":" + data_filter[0].split(' ')[2]

            if(parseInt(document.getElementById("year_select_start").value) == (parseInt(da_t[0])+543) && (document.getElementById("year_select_end").value == 'เลือกปี') || (parseInt(document.getElementById("year_select").value) == (parseInt(da_t[0])+543) && document.getElementById("year_select").value != 'เลือกปี') || parseInt(document.getElementById("year_select").value) == (parseInt(da_t[0])+543) || ((parseInt(da_t[0])+543) >= parseInt(document.getElementById("year_select_start").value) && (parseInt(da_t[0])+543) <= parseInt(document.getElementById("year_select_end").value))){
              // Returns a tele_bodyT formatted string.
              //console.log(data_filter)
              $('#tele_bodyT').append(`
                <tr>
                    <td>${(date_col)}</td>
                    <td>${number_add_comma((data_filter[1] && data_filter[2] != "" && data_filter[1] != '#N/A')?data_filter[1].toFixed(2):"0.00")}</td>
                    <td>${number_add_comma((data_filter[2] && data_filter[2] != "" && data_filter[2] != '#N/A')?data_filter[2].toFixed(2):"0.00")}</td>
                    <td>${number_add_comma((data_filter[3] && data_filter[2] != "" && data_filter[3] != '#N/A')?data_filter[3].toFixed(2):"0.00")}</td>
                </tr>`)
            }
            n++
        })
    }
  }
  plot_data_list()
}

// Plot chnage data
function chnage_plot(){
  plot_data_list()
}
