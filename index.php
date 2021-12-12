<?php
session_start();
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
    
<div id="divBlock">           <!--Анимация загрузки-->
  <span id="span1"></span>
</div>
    
<header>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-2 mt-2"><h1 style="font-size: 30px; color: white;">RepairZone74</h1></div>
                <div class="col-5"></div>
                <div class="col-md-3 mt-4"><p style="font-size: 18px; color: white; text-align: center;">г. Челябинск, ул.Кузнецова, 3А</p></div>
                <div class="col-md-2 mt-4"><p style="font-size: 18px; color: white; text-align: center;">8 (922) 777 77-77</p></div>
            </div>
        </div>
        <div class="row">
            
          <div class="overlay"></div>

          <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
            <source src="assets/img/McQueen.mp4" type="video/mp4">
          </video>

          <div class="container h-100">
            <div class="d-flex h-100 text-center align-items-center">
              <div class="w-100 text-white mt-3">
                <h1 class="display-4 mt-5">Выбирайте Лучшее</h1>
                <p class="lead mb-2">Для себя и своего автомобиля</p>
              </div>
            </div>
          </div>
            
        </div>
    </div>
</header>
    
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-2">
                <h1 class="display-4">Почему именно мы?</h1>
            </div>
            <div class="col-1"></div>
            <div class="col-md-2 mt-4 neomorphism1">
                <div style="text-align: center;">
                    <?php
                        if (isset($_SESSION["access"])) {
                            if($_SESSION["access"] == "1"){
                                echo '<p>' . $_SESSION["fio"] . '</p>' . '<p><a href="userPanel.php">Мои автомобили</a></p>' . '<p><a href="adminPanel.php">Панель управления</a></p>' . '<p class="exitBtn">Выйти</p>';
                            }
                            else if($_SESSION["access"] == "2"){
                                echo '<p>' . $_SESSION["fio"] . '</p>' . '<p><a href="userPanel.php">Мои автомобили</a></p>' . '<p><a href="adminPanel.php">Панель управления</a></p>' . '<p class="exitBtn">Выйти</p>';
                            }
                            else if($_SESSION["access"] == "3"){
                                echo '<p>' . $_SESSION["fio"] . '</p>' . '<p><a href="userPanel.php">Мои автомобили</a></p>' . '<p class="exitBtn">Выйти</p>';
                            }
                        }
                        
                        else{
                            echo '<p>Гость</p>' . '<p><a data-bs-toggle="modal" data-bs-target="#exampleModal">Зарегистрироваться</a></p>' . '<p><a data-bs-toggle="modal" data-bs-target="#exampleModal1">Войти</a></p>';
                        }
                    ?>
                </div>
            </div>
        </div>
        
        
        <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Регистрация</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="InputFIO" class="form-label">ФИО:</label>
                                        <input type="text" class="form-control" id="InputFIO" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="InputEmail" class="form-label">Email:</label>
                                        <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="InputPhone" class="form-label">Телефон:</label>
                                        <input type="text" class="form-control" id="InputPhone" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="InputPassword" class="form-label">Пароль:</label>
                                        <input type="password" class="form-control" id="InputPassword" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="reInputPassword" class="form-label">Повторите пароль:</label>
                                        <input type="password" class="form-control" id="reInputPassword" required>
                                    </div>
                                </form>
                            </div>
                            
                            <div class="modal-footer">
                                <p id="errOut" style="color: red"></p>
                                <button id="closeForm" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                <input id="subRegistr" type="submit" class="btn btn-primary" value="Сохранить">
                            </div>
                        </div>
                  </div>
                </div>
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Авторизация</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="AuthPhone" class="form-label">Телефон:</label>
                                        <input type="text" class="form-control" id="AuthPhone" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="AuthPassword" class="form-label">Пароль:</label>
                                        <input type="password" class="form-control" id="AuthPassword" required>
                                    </div>
                                </form>
                            </div>
                            
                            <div class="modal-footer">
                                <p id="errOut" style="color: red"></p>
                                <button id="closeForm" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                <input id="subAuth" type="submit" class="btn btn-primary" value="Войти">
                            </div>
                        </div>
                  </div>
                </div>
        
        
        <div class="row">
            <div class="col-1"></div>
            <div class="col-8">
                <div class="row">
                    <div class="col-1">
                        <img class="mt-2" style="width: 50px; height:50px;" src="assets/img/free-icon-avatar-126486.png">
                    </div>
                    <div class="col-md-3">
                        <p class="ml-2" style="font-size: 20px;"> Команда профессионалов</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <img style="width: 50px; height:50px;" src="assets/img/free-icon-piggy-bank-126511.png">
                    </div>
                    <div class="col-md-3">
                        <p class="ml-2" style="font-size: 20px;">Адекватные цены и система скидок</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <img style="width: 50px; height:50px;" src="assets/img/free-icon-like-126473.png">
                    </div>
                    <div class="col-md-4">
                        <p class="ml-2" style="font-size: 20px;">Качество выполненной работы</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <img style="width: 50px; height:50px;" src="assets/img/free-icon-glasses-126514.png">
                    </div>
                    <div class="col-md-4">
                        <p class="ml-2" style="font-size: 20px;">Специалисты высокой квалификации</p>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
            
        </div>
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
    
</body>
</html>

<script>
    $(document).ready(function(){       //анимация загрузки страницы
        $('#divBlock').hide();
    });
    
    $('#subRegistr').click(function() {     //регистрация
        if(($('#InputPassword').val()!="")&&($('#reInputPassword').val()!="")&&($('#InputFIO').val()!="")&&($('#InputEmail').val()!="")&&($('#InputPhone').val()!="")){
            if($('#InputPassword').val() == $('#reInputPassword').val()){
                $('#divBlock').show();
                $.ajax({
            		type: "POST",
            		dataType: "json",
            		url: "api/Controller.php",
            		data: {
            		    method: 'registr',
            		    fio: $('#InputFIO').val(),
            		    mail: $('#InputEmail').val(),
            		    phone: $('#InputPhone').val(),
            		    password: $('#InputPassword').val()
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
            			    alert('Регистрация прошла успешно! Теперь вы можете войти в свой аккаунт.');
            				return;
            			}
            			else if(data['code'] == '120'){
            				$('#divBlock').hide();
            			    alert('Пользователь с таким номером телефона уже существует.');
            				return;
            			}
            		}
            	})
            }
            else{
                $('#errOut').text('Пароли не совпадают.');
            }
        }
        else{
            $('#errOut').text('Заполните все поля.');
        }
    });
    
    $('#subAuth').click(function() {      //авторизация
        if(($('#AuthPhone').val() != "")&&($('#AuthPassword').val() != "")){
            $('#divBlock').show();
            $.ajax({
            	type: "POST",
            	dataType: "json",
            	url: "api/Controller.php",
            	data: {
            	    method: 'auth',
            	    phone: $('#AuthPhone').val(),
            	    password: $('#AuthPassword').val()
            	},
            	success:function(data){
            	    if(data['code'] == '100'){
            			$('#divBlock').hide();
            			alert("Ошибка на сервере.");
            			return;
            		}
            		else if(data['code'] == '110'){
            			$('#divBlock').hide();
            			alert("Успешно.");
            			document.location.reload();
            			return;
            		}
            		else if(data['code'] == '120'){
            			$('#divBlock').hide();
            			alert("Неверный логин/пароль.");
            			return;
            		}
            	}
            })
        } 
    });
    
    $('.exitBtn').click(function() {
        $('#divBlock').show();
        $.ajax({
        	type: "POST",
        	dataType: "json",
        	url: "api/Controller.php",
        	data: {
        	    method: 'exit'
        	},
        	success:function(data){
        	    if(data['code'] == '100'){
        			$('#divBlock').hide();
        			alert("Ошибка на сервере.");
        			return;
        		}
        		else if(data['code'] == '110'){
        			$('#divBlock').hide();
        			document.location.reload();
        			return;
        		}
        	}
        })
    });
</script>
