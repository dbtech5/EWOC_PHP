<style>
    .container-main {
        padding-top: 50px;
        width: 13%;
        margin-left: 40%;
        margin-right: 40%;
    }

    .container-main > h5 {
        text-align: center;
    }
    .file {
        overflow: hidden;
        position: relative;
        width: 200px;
        margin-bottom: 10px;
        height: 60px;
        border: 1px solid #DDD;
        
        border: 2px;
        cursor: pointer;
        user-select: none;
        display: block;
    }

    .file:hover {
        transform: scale(0.9);
    }

    .file > p {
        margin:0;
    }
    .file > input[type='file'] {
        left: 0;
        top: 0;
        height: 100%;
        position:absolute;
        opacity: 0;
    }

    .submit {
        border: 1px solid transparent;
        padding: 10px 25px;
        color: #FFF;
        margin-top: 20px;
        border-radius: 5px;
        width: 200px;
        background: rgb(46,195,34);
        background: linear-gradient(51deg, rgba(46,195,34,1) 0%, rgba(253,187,45,1) 100%);
    }

    .submit:hover {
        transform: scale(0.9);
    }
</style>
<div class="container-main">
    
    <h5>เพิ่มข้อมูล</h5>
    <button class='file'>
        <p id="name_reservoir">อ่างเก็บน้ำ</p>
        <input type="file" name="file_reservoir" id="file_reservoir" onchange="getFileName('reservoir')">
    </button>

    <button class='file'>
        <p id="name_pump">สถานีสูบน้ำ</p>
        <input type="file" name="file_pump" id="file_pump" onchange="getFileName('pump')">
    </button>

    <button class='file'>
        <p id="name_rain">สถานีวัดน้ำฝน</p>
        <input type="file" name="file_rain" id="file_rain" onchange="getFileName('rain')">
    </button>

    <button class='file'>
        <p id="name_flow">สถานีวัดน้ำท่า</p>
        <input type="file" name="file_flow" id="file_flow" onchange="getFileName('flow')">
    </button>

    <button class='file'>
        <p id="name_wq">สถานีตรวจวัดคุณภาพน้ำ</p>
        <input type="file" name="file_wq" id="file_wq" onchange="getFileName('wq')">
    </button>
    
    <button class='file'>
        <p id="name_wateruse">ปริมาณการใช้น้ำของลูกค้า</p>
        <input type="file" name="file_wateruse" id="file_wateruse" onchange="getFileName()">
    </button>
    
    
    
    
    <input type="button" 
     onclick="uploadFile();" value="อัพโหลด" class="submit">

</div>
<script>
    var lit_element = ['file_reservoir', 'file_pump', 'file_rain', 'file_flow', 'file_wq', 'file_wateruse']
    var name_element = {
        'file_pump':'สถานีสูบน้ำ',
        'file_wateruse':'ปริมาณการใช้น้ำของลูกค้า',
        'file_rain':'สถานีวัดน้ำฝน',
        'file_flow':'สถานีวัดน้ำท่า',
        'file_reservoir':'อ่างเก็บน้ำ',
        'file_wq':'สถานีตรวจวัดคุณภาพน้ำ',
    }

    function getFileName(e){
        document.getElementById('name_'+e).innerHTML = document.getElementById('name_'+e).innerHTML +" "+ document.getElementById("file_"+e).files[0]['name']
    }
    function uploadFile(type) {
        lit_element.forEach((item)=>{
            if( document.getElementById(item).files.length != 0 ){
                var files = document.getElementById(item).files;
                if(files.length > 0 ){
                    var formData = new FormData();
                    formData.append("file", files[0]);
                    formData.append("type", type);

                    var xhttp = new XMLHttpRequest();
                    xhttp.open("POST", "update_manual.php", true);
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {

                            var response = this.responseText;
                            console.log(response);
                            
                            if(response == 1){
                                alert("อัพโหลด "+name_element[(item)]+" สำเร็จ!");
                            }else{
                                alert("ไม่สามารถอัพโหลดไฟล์ได้สำเร็จ.");
                            }
                        }
                    };
                    xhttp.send(formData);

                }else{
                    alert("โปรดเลือกไฟล์");
                }
            }      
        })
    }


</script>
