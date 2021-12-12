<?php
session_start();

if((!isset($_SESSION['access']))||($_SESSION['access'] == 3)){
    echo '<script>document.location.replace("index.php");</script>';
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RepairZone74</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    
<div id="divBlock">
  <span id="span1"></span>
</div>

<section class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-2 mt-2">
                <a href="index.php" style="font-size: 30px; color: black; text-decoration: none;">RepairZone74</a>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div id="list-example" class="col-2 list-group">
            <a class="list-group-item list-group-item-action" href="#list-item-1">Item 1</a>
            <a class="list-group-item list-group-item-action" href="#list-item-2">Item 2</a>
            <a class="list-group-item list-group-item-action" href="#list-item-3">Item 3</a>
            <a class="list-group-item list-group-item-action" href="#list-item-4">Item 4</a>
        </div>
        <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-offset="0" class="col-10 scrollspy-example" tabindex="0">
            <h4 id="list-item-1">Поступила заявка:</h4>
            <div id="carout2"></div>
            <h4 id="list-item-2">Ожидание в сервисном центре:</h4>
            <div id="carout3"></div>
            <h4 id="list-item-3">В работе:</h4>
            <div id="carout4"></div>
            <h4 id="list-item-4">Ожидает владельца:</h4>
            <div id="carout5"></div>
        </div>
        </div>
    </div>
</section>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Изменить статус работы №</h5>
                <h5 class="modal-title" id="idOutput"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <div class="modal-body">
            <select class="form-select" aria-label="Default select example" id="InputStatus">
                <option value="2">Изменить статус заявки на 2 - заявка поступила.</option>
                <option value="3">Изменить статус заявки на 3 - подтверждено.</option>
                <option value="4">Изменить статус заявки на 4 - в работе.</option>
                <option value="5">Изменить статус заявки на 5 - завершено.</option>
            </select>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closeForm">Закрыть</button>
                <button type="button" class="btn btn-primary" id="saveStatus">Сохранить</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>


<script>
    $(document).ready(function() {
        $('#divBlock').hide();
        loadTableProcess();
    });
    
    let logic_menu = '<div class="btn-group dropstart">';
    logic_menu += '<button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"'; 
    logic_menu += 'aria-expanded="false"></button><ul class="dropdown-menu">';
    logic_menu += '<li onclick="sndStrId(this)" data-bs-toggle="modal" data-bs-target="#exampleModal">';
    logic_menu += '<a class="dropdown-item">Изменить статус</a></li></ul></div>';

function loadTableProcess() { 
    
  	$.ajax({
        type: "POST",
  		dataType: "json",
  		url: "api/Controller.php",
  		data: {
  		    method: 'loadTableProcess'
  		},
  		success:function(data){
        
       		let str = '<table class="table table-bordered table-hover"><tr><th>id</th><th>Марка</th><th>Модель</th><th>Гос. номер</th><th>Тип работ</th><th>Начало</th><th>Завершение</th><th>Телефон</th><th>Ст</th><th>+</th></tr>';

            for(let i=0; i< data.length; i++){
                str += '<tr><td>' + data[i]['id'] + '</td><td>' + data[i]['brand'] + '</td><td>' + data[i]['model'] + '</td><td>' + data[i]['stateNumber'] + '</td><td>' + data[i]['name'] + '</td><td>' + data[i]['start'] + '</td><td>' + data[i]['finish'] + '</td><td>' + data[i]['phone'] + '</td><td>' + data[i]['status'] + '</td><td data-id='+data[i]["id"]+'>' + logic_menu + '</td></tr>';
            }
      
            str += '</table>';
      
            $('#carout2').empty();
   		    $('#carout2').append(str);
        }
  	})
}

function sndStrId(strId){               
    let dataId = $(strId).parent().parent().parent().data('id');
    $('#idOutput').empty();
    $('#idOutput').append(dataId);
}

$('#saveStatus').click(function() {
    let val = $('#idOutput').text();
    let status = $('#InputStatus').find(":selected").val();
    $.ajax({
        type: "POST",
  		dataType: "json",
  		url: "api/Controller.php",
  		data: {
  		    method: 'saveStatus',
  		    id: val,
  		    stat: status
  		},
  		success:function(data){
            if(data['code'] == '110'){
                loadTableProcess();
        	    $('#divBlock').hide();
        		$('#closeForm').click();
        		alert('Статус был изменен.');
        		return;
        	}
        	else if(data['code'] == '100'){
        	    loadTableProcess();
        		$('#divBlock').hide();
        	    alert('Метод не определён.');
        		return;
        	}
        	else{
        		$('#divBlock').hide();
        	    alert('Неопределённая ошибка.');
        		return;
        	}
        }
  	})
});
      
</script>
