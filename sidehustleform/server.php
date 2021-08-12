<?php 
$db_host = "remotemysql.com";
$db_user = "PPrQ0WqkGX";
$db_pass = "JmImUhgrUc";
$db_name = "PPrQ0WqkGX";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if($conn->connect_error){
    die("Connection Failed");
}else{
    // echo "Connected Succesfully <hr>";

}


if(isset($_POST['submit'])){
    // echo "Yeah";
    //checking for empty field
    $username = $conn->real_escape_string($_POST['username']);
    if($_POST['username']== ""){
        $error_msg['username'] = "Username cannot be blank";
    } 
    
    $email = $conn->real_escape_string($_POST['email']);
    if(($_POST['email'])==""){
        $error_msg['email'] = "Email cannot be blank";
    } 


     //Department
     $semester = $_POST['semester'];
     if($semester == "NULL"){
         $error_msg['semester'] = "Select a semester";
     }

    $password = $conn->real_escape_string($_POST['password']);    
    $password2 = $conn->real_escape_string($_POST['password2']); 


	if($password !== $password2){
		$error_msg['password2'] = "Passwords do not match";
	}

	else if(empty($password)){
		$error_msg['password'] = "Password required";
	}

	if(empty($password2)){
		$error_msg['password2'] = "Confirm password is required";
	}

	else if((strlen($password) >= 8) && strlen($password2) <= 50){
	//    $error_msg['pass2'] = "Password match";
	} else {
		$error_msg['password2'] = "Passwords must  be between 8 - 20 characters";
    }
         if(!empty($error_msg)== 0) {
//         //INSERT  statement
        $sql = "INSERT INTO user (username, email, semester, password) VALUES (?, ?, ?, ?)";
    
    //Prepare Statement
    $result = mysqli_prepare($conn, $sql);
    
    if($result){
    //Bind variables to Prepare Statement as Parameters
    mysqli_stmt_bind_param($result, 'ssss', $username, $email, $semester, $password);
    
    //Variables and values
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $semester = $conn->real_escape_string($_POST['semester']);
    $password = $conn->real_escape_string($_POST['password']);
    
  
   
        
    //Execute Prepared Statement
    mysqli_stmt_execute($result);
     $success = "Success";
     } else {
         echo mysqli_error($conn);
     }
    //CLose prepares statement
    mysqli_stmt_close($result);
    }
}

//RETRIEVE DATA FROM DATABASE

$sql = "SELECT * FROM user";

//Prepared Statement
$result = $conn->prepare($sql);

//Bind Result Set in variables
$result->bind_result($id, $username, $email, $semester, $password);

//Execute prepared statement
$result->execute();

//Store result
$result->store_result();



?>



