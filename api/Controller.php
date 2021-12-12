<?php
    
    if(isset( $_POST['method'] )) {
    	switch($_POST['method']){
    		case 'registr': 
    			$conn = new mysqli('localhost', 'id17636247_root', '-RX4WAxVYIk39f2q', 'id17636247_test');
    			
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    return;
                }
                    //экранизация полученных данных
                $fi0 = htmlentities(mysqli_real_escape_string($conn, $_POST['fio']));
                $mail = htmlentities(mysqli_real_escape_string($conn, $_POST['mail']));
                $phone = htmlentities(mysqli_real_escape_string($conn, $_POST['phone']));
                $password = htmlentities(mysqli_real_escape_string($conn, $_POST['password']));
                    
                $queryCheck = "select * from users where (phone = '$phone')";       //проверка на уникальность
                $resultCheck = mysqli_query($conn, $queryCheck) or die("Ошибка " . mysqli_error($conn)); 
                
                if(mysqli_num_rows($resultCheck) != false){
                    $itog['code'] = 120;            //Ошибка! телефон не уникален
                    print_r(json_encode($itog));
        	        return;
                }
                
                    //запрос
                $query = "insert into users (fio, mail, phone, password) values('$fi0', '$mail', '$phone', '$password')";
                $result = mysqli_query($conn, $query) or die("Ошибка " . mysqli_error($conn)); 

                mysqli_close($conn);
                
                $itog['code'] = 110;        //запрос выполнен
                print_r(json_encode($itog));
    	        return;
    			
    		case 'auth': 
    		    $conn = new mysqli('localhost', 'id17636247_root', '-RX4WAxVYIk39f2q', 'id17636247_test');
    			
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    return;
                }
                    //экранизация полученных данных
                $phone = htmlentities(mysqli_real_escape_string($conn, $_POST['phone']));
                $password = htmlentities(mysqli_real_escape_string($conn, $_POST['password']));
                    //запрос
                $query = mysqli_query($conn, "SELECT id, fio, password, access FROM users WHERE phone='" . $phone . "' LIMIT 1");
                $result = mysqli_fetch_assoc($query);
                    //проверка
                if($result['password'] == $password)
                {
                    session_start();
                    
                    $_SESSION['id']=$result['id'];
                    $_SESSION['fio']=$result['fio'];
                    $_SESSION['access']=$result['access'];
                    
                    $itog['code'] = 110;        //запрос выполнен
                    print_r(json_encode($itog));
    	            return;
                    
                }
                else{
                    $itog['code'] = 120;        //Ошибка! пароли не совпадают
                    print_r(json_encode($itog));
                    return;
                }
            
            case 'exit':
                session_start();
                session_unset();
                $itog['code'] = 110;        //запрос выполнен
                print_r(json_encode($itog));
    	        return;
            
            case 'RegAuto':
                $conn = new mysqli('localhost', 'id17636247_root', '-RX4WAxVYIk39f2q', 'id17636247_test');
    			
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    return;
                }
                    //экранизация полученных данных
                $owner_id = $_POST['owner_id'];
                $brand = htmlentities(mysqli_real_escape_string($conn, $_POST['brand']));
                $model = htmlentities(mysqli_real_escape_string($conn, $_POST['model']));
                $color = $_POST['color'];
                $num = htmlentities(mysqli_real_escape_string($conn, $_POST['num']));
                $img = htmlentities(mysqli_real_escape_string($conn, $_POST['img']));
                
                    //запрос
                $query = "insert into vehicles (owner_id, brand, model, color, stateNumber, image) values('$owner_id', '$brand', '$model', '$color', '$num', '$img')";
                $result = mysqli_query($conn, $query) or die("Ошибка " . mysqli_error($conn)); 

                mysqli_close($conn);
                
                $itog['code'] = 110;        //запрос выполнен
                print_r(json_encode($itog));
    	        return;
            
            case 'loadVehicle':
                $conn = new mysqli('localhost', 'id17636247_root', '-RX4WAxVYIk39f2q', 'id17636247_test');
                
                $owner_id = $_POST['owner_id'];
  
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    return;
                }
                  
                $result = $conn->query("select * from vehicles where (owner_id = '$owner_id')");
                $itog = [];
                 
                while($lines = mysqli_fetch_assoc($result))
                {
                    array_push($itog, $lines);
                }
                  
                print_r(json_encode($itog));
                return;		
            
            case 'loadSelectVehicles':
                $conn = new mysqli('localhost', 'id17636247_root', '-RX4WAxVYIk39f2q', 'id17636247_test');
                
                $owner_id = $_POST['owner_id'];
  
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    return;
                }
                  
                $result = $conn->query("select id, stateNumber from vehicles where (owner_id = '$owner_id')");
                $itog = [];
                 
                while($lines = mysqli_fetch_assoc($result))
                {
                    array_push($itog, $lines);
                }
                  
                print_r(json_encode($itog));
                return;		
            
            case 'loadSelectServices':
                $conn = new mysqli('localhost', 'id17636247_root', '-RX4WAxVYIk39f2q', 'id17636247_test');
  
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    return;
                }
                  
                $result = $conn->query("select id, name from services");
                $itog = [];
                 
                while($lines = mysqli_fetch_assoc($result))
                {
                    array_push($itog, $lines);
                }
                  
                print_r(json_encode($itog));
                return;	
            
            case 'subService':
                $conn = new mysqli('localhost', 'id17636247_root', '-RX4WAxVYIk39f2q', 'id17636247_test');
    			
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    return;
                }
                    
                $vehicle_id = $_POST['vehicle_id'];
                $service_id = $_POST['service_id'];
                
                $query = "insert into history (vehicle_id, service_id) values('$vehicle_id', '$service_id')";
                $result = mysqli_query($conn, $query) or die("Ошибка " . mysqli_error($conn));

                $query1 = "UPDATE vehicles SET status = 2 WHERE id = '$vehicle_id';";
                $result1 = mysqli_query($conn, $query1) or die("Ошибка " . mysqli_error($conn));

                mysqli_close($conn);
                
                $itog['code'] = 110;        //запрос выполнен
                print_r(json_encode($itog));
    	        return;
    	        
    	    case 'loadTableProcess':
    	        $conn = new mysqli('localhost', 'id17636247_root', '-RX4WAxVYIk39f2q', 'id17636247_test');
    			
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    return;
                }
                
                $result = $conn->query("SELECT history.id, vehicles.brand,vehicles.model, vehicles.stateNumber, services.name, history.start, history.finish, users.phone, vehicles.status
                    from history 
                    INNER JOIN vehicles ON history.vehicle_id = vehicles.id 
                    INNER JOIN services ON history.service_id = services.id INNER JOIN users on vehicles.owner_id = users.id");

                $itog = [];
                while($lines = mysqli_fetch_assoc($result))
                {
                    array_push($itog, $lines);
                }
                  
                print_r(json_encode($itog));
                mysqli_close($conn);
                return;	
            
            case 'saveStatus':
                $conn = new mysqli('localhost', 'id17636247_root', '-RX4WAxVYIk39f2q', 'id17636247_test');
    			
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    return;
                }
                
                $id = $_POST['id'];
                $stat = $_POST['stat'];
                
                $query = "UPDATE vehicles SET status = '$stat' WHERE vehicles.id = (SELECT vehicle_id from history WHERE id = '$id');";
                $result = mysqli_query($conn, $query) or die("Ошибка " . mysqli_error($conn)); 

                mysqli_close($conn);
                
                $itog['code'] = 110;        //запрос выполнен
                print_r(json_encode($itog));
    	        return;
            
    		default: 
        		$itog['code'] = 100;        //метод не определён
        		print_r(json_encode($itog));
        		return;
    	}
    }
