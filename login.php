<?php
//case 'login':
 
 //this part will handle the login 
 if(isTheseParametersAvailable(array('username', 'password'))){
 //getting values 
 $username = $_POST['username'];
 $password = md5($_POST['password']); 
 
 //creating the query 
 $stmt = $conn->prepare("SELECT id, username, email, gender FROM users WHERE username = ? AND password = ?");
 $stmt->bind_param("ss",$username, $password);
 
 $stmt->execute();
 
 $stmt->store_result();
 
 //if the user exist with given credentials 
 if($stmt->num_rows > 0){
 
 $stmt->bind_result($id, $username, $email, $gender);
 $stmt->fetch();
 
 $user = array(
 'id'=>$id, 
 'username'=>$username, 
 'email'=>$email,
 'gender'=>$gender
 );
 
 $response['error'] = false; 
 $response['message'] = 'Login successfull'; 
 $response['user'] = $user; 
 }else{
 //if the user not found 
 $response['error'] = false; 
 $response['message'] = 'Invalid username or password';
 }
 }
 include ('ConnectClose.php');
 //break; 
 
 /*default: 
 $response['error'] = true; 
 $response['message'] = 'Invalid Operation Called';
 }*/
 
 /*}else{
 //if it is not api call 
 //pushing appropriate values to response array 
 $response['error'] = true; 
 $response['message'] = 'Invalid API Call';
 }*/
 
 //displaying the response in json structure 
 //echo json_encode($response);
/*function isTheseParametersAvailable($params){
 
 //traversing through all the parameters 
 foreach($params as $param){
 //if the paramter is not available
 if(!isset($_POST[$param])){
 //return false 
 return false; 
 }
 }
 //return true if every param is available 
 return true; 
 }*/