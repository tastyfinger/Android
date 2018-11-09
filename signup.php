<?php
//case 'signup':
 
 //in this part we will handle the registration
if(isTheseParametersAvailable(array('username', 'mobile','email','nationality','aadhar'))){
 
 //getting the values 
 $username = $_POST['username'];
 $mobile = $_POST['mobile'];
 $email = $_POST['email']; 
 $nationality = $_POST['nationality'];
 $aadhar = $_POST['aadhar']; 
 
 //checking if the user is already exist with this username or email
 //as the email and username should be unique for every user 
 $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
 $stmt->bind_param("ss", $mobile, $email);
 $stmt->execute();
 $stmt->store_result();
 
 //if the user already exist in the database 
 if($stmt->num_rows > 0){
 $response['error'] = true;
 $response['message'] = 'User already registered';
 $stmt->close();
 }else{
 
 //if user is new creating an insert query 
 $stmt = $conn->prepare("INSERT INTO users (username, mobile, email, nationality, aadhar) VALUES (?, ?, ?, ?)");
 $stmt->bind_param("ssss", $username, $mobile, $email, $nationality, $aadhar);
 
 //if the user is successfully added to the database 
 if($stmt->execute()){
 
 //fetching the user back 
 $stmt = $conn->prepare("SELECT id, id, username, mobile, email, nationality FROM users WHERE username = ?"); 
 $stmt->bind_param("s",$username);
 $stmt->execute();
 $stmt->bind_result($userid, $id, $username, $mobile, $email, $nationality);
 $stmt->fetch();
 
 $user = array(
 'id'=>$id, 
 'username'=>$username,
 'mobile'=>$mobile,
 'email'=>$email,
 'nationality'=>$nationality,
 'aadhar'=>$aadhar
 );
 
 $stmt->close();
 
 //adding the user data in response 
 $response['error'] = true; 
 $response['message'] = 'User registered successfully'; 
 $response['user'] = $user; 
 }
 }
 
 }else{
 $response['error'] = true; 
 $response['message'] = 'required parameters are not available'; 
 }
 include ('ConnectClose.php');
 //break;
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