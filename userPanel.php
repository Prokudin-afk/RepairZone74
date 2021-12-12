<?php
session_start();

if(!isset($_SESSION['access'])){
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

<section class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="display-1">Как пользоваться панелью управления:</h1>
            </div>
            <div class="col-md-6">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Шаг 1:
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>Зарегистрируйте </strong>свой автомобиль в нашей системе. Это можно сделать, нажав кнопку "Добавить" на панели.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Шаг 2:
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>Перейдите </strong>в режим создания заявки по кнопке "Новая заявка". Выберите один из своих автомобилей, тип работ и оставьте комментарий, если в этом есть необходимость.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Шаг 3:
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>После того, </strong>как статус в карточке автомобиля изменится на "ожидание", вы приезжаете в сервисный центр, оставляя своё ТС.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Шаг 4:
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>Как только </strong>в карточке изменится статус на "ожидает владельца", можно ехать в сервисный центр принимать работу и забрать автомобиль.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="modal" data-bs-target="#exampleModal">Добавить ТС</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal1">Новая заявка</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Комментарии</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled">Сообщить о проблеме</a>
            </li>
        </ul>
    </div>
</section>

<section>
    <div class="container-fluid">
        <h1 class="display-4">Ваши автомобили:</h1>
        <div class="row" id="vehicleDiv"></div>
    </div>
</section>

<footer class="page-footer font-small unique-color-dark">

  <div style="background-color: #3e4551;">
  <div class="container text-center text-md-left mt-5">
    <div class="row mt-3 text-white" style="text-decoration: none;">
      <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4 mt-3">
        <h6 class="text-uppercase font-weight-bold">RepairZone74</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>Компания занимается ремонтом, обслуживанием, восстановлением и тюнингом автомобилей
        с 2021 года.</p>
      </div>
     
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4 mt-3">
        <h6 class="text-uppercase font-weight-bold">Наши заслуги</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a style="color: white;">Отзывы клиентов</a>
        </p>
        <p>
          <a style="color: white;">Готовые работы</a>
        </p>
        <p>
          <a style="color: white;">Награды</a>
        </p>
        <p>
          <a style="color: white;">Гарантии качества</a>
        </p>
      </div>
      
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4 mt-3">
        <h6 class="text-uppercase font-weight-bold">Ссылки</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a style="color: white;">ВКонтакте</a>
        </p>
        <p>
          <a style="color: white;">instagram</a>
        </p>
        <p>
          <a style="color: white;">Tik-Tok</a>
        </p>
        <p>
          <a style="color: white;">Twitter</a>
        </p>
      </div>
     
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4 mt-3">
        <h6 class="text-uppercase font-weight-bold">Контакты</h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a style="color: white;">ул.Кузнецова, 3А</a>
        </p>
        <p>
          <a style="color: white;">info@example.com</a>
        </p>
        <p>
          <a style="color: white;">8 (922) 777 77-77</a>
        </p>
        <p>
          <a style="color: white;">8 (922) 777 77-77</a>
        </p>
      </div>
    </div>
  </div>
  <div class="footer-copyright text-center py-3 text-white">© 2021 Copyright:
    <a href="https://bootstrap2710.000webhostapp.com/">bootstrap2710.000webhostapp.com</a>
  </div>
</footer>

<!--modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавить ТС:</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                            
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="InputBrand" class="form-label">Марка:</label>
                            <input type="text" class="form-control" id="InputBrand" required>
                        </div>
                        <div class="mb-3">
                            <label for="InputModel" class="form-label">Модель:</label>
                            <input type="text" class="form-control" id="InputModel" required>
                        </div>
                        <div class="mb-3">
                            <label for="InputColor" class="form-label">Цвет:</label>
                            <input type="color" class="form-control" id="InputColor" required>
                        </div>
                        <div class="mb-3">
                            <label for="InputNum" class="form-label">Гос. номер:</label>
                            <input type="text" class="form-control" id="InputNum" required>
                        </div>
                        <div class="mb-3">
                            <label for="InputImg" class="form-label">Изображение URL:</label>
                            <input type="text" class="form-control" id="InputImg" required>
                        </div>
                    </form>
                </div>
                            
                <div class="modal-footer">
                    <p id="errOut" style="color: red"></p>
                    <button id="closeForm" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <input id="subRegAuto" type="submit" class="btn btn-primary" value="Сохранить">
                </div>
            </div>
        </div>
    </div>
<!--modal-->


<!--modal-->
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Создать заявку:</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                            
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="InputTs" class="form-label">Автомобиль:</label>
                            <select id="InputTs" class="form-select"></select>
                        </div>
                        <div class="mb-3">
                            <label for="InputService" class="form-label">Тип работ:</label>
                            <select class="form-select" id="InputService"></select>
                        </div>
                    </form>
                </div>
                            
                <div class="modal-footer">
                    <p id="errOut" style="color: red"></p>
                    <button id="closeForm1" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <input id="subService" type="submit" class="btn btn-primary" value="Сохранить">
                </div>
            </div>
        </div>
    </div>
<!--modal-->

</body>

<script>
    $(document).ready(function() {
        $('#divBlock').hide();
        loadVehicle();
        loadSelectVehicles();
        loadSelectServices();
    });
    
    $('#subRegAuto').click(function() {
        if(($('#InputBrand').val() != "")&&($('#InputModel').val() != "")&&($('#InputColor').val() != "")&&($('#InputNum').val() != "")&&($('#InputImg').val() != "")){
            let ownerid="<?=$_SESSION['id'];?>";
            
            $('#divBlock').show();
            $.ajax({
            	type: "POST",
            	dataType: "json",
            	url: "api/Controller.php",
            	data: {
            	    method: 'RegAuto',
            	    owner_id: ownerid,
            	    brand: $('#InputBrand').val(),
            	    model: $('#InputModel').val(),
            	    color: $('#InputColor').val(),
            	    num: $('#InputNum').val(),
            	    img: $('#InputImg').val()
            	},
            	success:function(data){
            	    if(data['code'] == '100'){
            			$('#divBlock').hide();
            			alert("Ошибка на сервере.");
            			return;
            		}
            
            		else if(data['code'] == '110'){
            			$('#divBlock').hide();
            			$('#closeForm').click();
            		    alert('Ваше ТС зарегестрировано.');
            		    loadVehicle();
            			return;
            		}
            		else{
            			$('#divBlock').hide();
            		    alert('Неопределенная ошибка.');
            			return;
            		}
            	}
            })
        }
        else{
            $('#errOut').text('Заполните все поля.');
        }
    });
    
    function loadVehicle() {
        let ownerid="<?=$_SESSION['id'];?>";
        $.ajax
		({
			type: "POST",
			dataType: "json",
			url: "api/Controller.php",
            data:{
                method: 'loadVehicle',
                owner_id: ownerid
            },
			success:function(data){
				let str = "";
				for(let i=0; i< data.length; i++){
                str += '<div class="col-md-3">';
                    str += '<div class="card" style="width: 18rem; display: block; margin-left: auto; margin-right: auto; border: solid' + data[i]['color'] + '">';
                        str += '<img style="height: 200px;" src="' + data[i]['image'] + '" class="card-img-top" alt="car">';
                        str += '<div class="card-body">';
                            str += '<h5 class="card-title">' + data[i]['brand'] + " " + data[i]['model'] + '</h5>';
                            str += '<p class="card-text">' + data[i]['stateNumber'] + '</p>';
                            str += '<a style="text-align: center;" class="nav-link disabled">Статус: ';
                            if(data[i]['status'] == 1) {
                                str += 'зарегистрирован.</a>';
                            }
                            else if(data[i]['status'] == 2) {
                                str += 'заявка создана. ожидайте.</a>';
                            }
                            else if(data[i]['status'] == 3) {
                                str += '<strong>ожидание в сервисном центре.</strong></a>';
                            }
                            else if(data[i]['status'] == 4) {
                                str += 'в работе.</a>';
                            }
                            else if(data[i]['status'] == 5) {
                                str += '</a><h4 style="color: green;">ожидает владельца.</h4>';
                            }
                        str += '</div></div></div>';
				}
				$('#vehicleDiv').empty();
				$('#vehicleDiv').append(str);
			}
		}) 
    }
    
    function loadSelectVehicles() {
        let ownerid="<?=$_SESSION['id'];?>";
        $.ajax
		({
			type: "POST",
			dataType: "json",
			url: "api/Controller.php",
            data:{
                method: 'loadSelectVehicles',
                owner_id: ownerid
            },
			success:function(data){
				let str = "";
				for(let i=0; i< data.length; i++){
                    str += '<option data-id="' + data[i]['id'] + '">' + data[i]['stateNumber'] + '</option>';
				}
				$('#InputTs').empty();
				$('#InputTs').append(str);
			}
		}) 
    }
    
    function loadSelectServices() {
        $.ajax
		({
			type: "POST",
			dataType: "json",
			url: "api/Controller.php",
            data:{
                method: 'loadSelectServices'
            },
			success:function(data){
				let str = "";
				for(let i=0; i< data.length; i++){
                    str += '<option data-idSer="' + data[i]['id'] + '">' + data[i]['name'] + '</option>';
				}
				$('#InputService').empty();
				$('#InputService').append(str);
			}
		}) 
    }
    
    $('#subService').click(function() {
        let a = $('#InputTs').find(":selected").attr('data-id');
        let b = $('#InputService').find(":selected").attr('data-idSer');
        let date = new Date();
    
        $('#divBlock').show();
        $.ajax
		({
			type: "POST",
			dataType: "json",
			url: "api/Controller.php",
            data:{
                method: 'subService',
                vehicle_id: a,
                service_id: b
            },
			success:function(data){
				if(data['code'] == '110'){
            	    $('#divBlock').hide();
            		$('#closeForm').click();
            		alert('Заявка принята. Ожидайте.');
            		loadVehicle();
            		return;
            	}
            	else{
            		$('#divBlock').hide();
            	    alert('Неопределенная ошибка.');
            		return;
            	}
			}
		})
    });
</script>
