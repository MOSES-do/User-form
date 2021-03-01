<?php require 'server.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/jform.css">

<script>
		
	const form = document.querySelector('form');

	

	form.addEventListener('submit', (e) => {
		e.preventDefault();
		
		checkInputs();    

	});


	function checkInputs(){
	const form = document.getElementById('form');
	const usernameValue = username.value.trim();
	const emailValue = email.value.trim();
	const semesterValue = semester.value.trim();
	const passwordValue = password.value.trim();
	const password2Value = password2.value.trim();

		//get the values from the inputs
		// const usernameValue is the variable holding username.value.trim();

	if(usernameValue === ''){
		//show error
		//add error class
		setErrorFor(username, 'Username cannot be blank');
	} else {
		//add success class
		setSuccessFor(username);
	}

	//email
	if(emailValue === ''){
		//show error
		//add error class
		setErrorFor(email, 'Email cannot be blank'); 
		} else if(!isEmail(emailValue)){
		setErrorFor(email, 'Email is not valid'); 
		}else{
			setSuccessFor(email); 
		}

		if(semesterValue === 'NULL'){
			//show error
			//add error class
			setErrorFor(semester, 'Select a semester'); 
			}else{
				setSuccessFor(semester); 
			}


		//password
		if(passwordValue === ''){
			//show error
			//add error class
		setErrorFor(password, 'Password cannot be blank');
	
		} else {
			//add success class
			setSuccessFor(password);
		}

		if(password2Value === ''){
			//show error
			//add error class
		setErrorFor(password2, 'Confirm password is required');
		}else if(passwordValue !== password2Value){
		setErrorFor(password2, 'Passwords do not match'); 
		} else {
			//add success class
			setSuccessFor(password2);
		}
			
	}

		function setErrorFor(input, message){
			const formControl = input.parentElement; // .form-control
			const small = formControl.querySelector('small');
			// setTimeout(() => small.remove(), 3000);
		
			//add error mesaage inside small
			small.innerText = message;
		
			//add error class
			formControl.className = 'form-control error';
		}

		function setSuccessFor(input){
			const formControl = input.parentElement;
			formControl.className = 'form-control success';
		}

	function isEmail(email){
		return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
	}
	</script>

	<?php 
//field validation
$username = $email = $semester = $password = $password2 ="";
$sucess="";

//Controller
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
}			 
?>	
</head>
<body>
<div class="grid">
	<div class="container">
	<div class="header" style="text-align:center; font-family:calibri; font-weight:500%">
		<h2>CREATE ACCOUNT</h2>
	</div>

	<?php if(isset($success)):?>
		<?php echo $success; ?>
	<?php endif; ?>

	
	<form action="jform.php" method="POST" class="form" id="form" onClick= "return checkInputs();">
		<div class="form-control">
			<label>Username</label>
			<input type="text" placeholder="Ace Networks" name="username" id="username" value="<?php echo  $username ?>">
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
			<?php
             if(isset($error_msg['username'])){
                echo "<div class='error' style='font-size:13px';>" .$error_msg['username']. "</div>" ;
            } 
			?>
		</div>

		<div class="form-control">
			<label>Email</label>
			<input type="email" placeholder="Email" name="email" id="email" value="<?php echo  $email ?>">
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
			<?php 
            if(isset($error_msg['email'])){
                echo "<div class='error' style='font-size:13px';>" .$error_msg['email']. "</div>" ;
            }
        ?>
		</div>

		<div class="form-control">
		<label> Semester </label>
        <select name="semester" type="text" class="text" id="semester" value="<?php echo $semester ?>"> 
            <option value="NULL">--Select Semester</option>
            <option value="1st">1st</option>
            <option value="2nd">2nd</option>
            <option value="3rd">3rd</option>
            <option value="4th">4th</option>
            <option value="5th">5th</option>
            <option value="6th">6th</option>
            <option value="7th">7th</option>
            <option value="8th">8th</option>
        </select>
		<small>Error message</small>
		<?php 
            if(isset($error_msg['semester'])){
                echo "<div class='error'style='font-size:13px';>" .$error_msg['semester']. "</div>" ;
            }
        ?>
		</div>

		<div class="form-control">
			<label>Password</label>
			<input type="password" placeholder="Password" name="password" id="password" value="">
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
			<?php 
            if(isset($error_msg['password'])){
                echo "<div class='error' style='font-size:13px';>" .$error_msg['password']. "</div>" ;
            }
        ?>
		</div>

		<div class="form-control">
			<label>Password check</label>
			<input type="password" placeholder="Confirm Password" name="password2" id="password2" value="">
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
			<?php 
            if(isset($error_msg['password2'])){
                echo "<div class='error' style='font-size:13px';>" .$error_msg['password2']. "</div>" ;
            }
        ?>
		</div>
		<button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
	</form>
</div>
	
<div class="con">
<link rel="stylesheet" type="text/css" href="css/jform.css">
<table class="table table-light" cellspacing="0">
            <thead class="thead-dark">
           <?php  if($result->num_rows > 0):  ?>
                <tr>
                    <th class="mc" >#</th>
                    <th class="mc">USERNAME</th>
                    <th class="mc">EMAIL</th>
                    <th class="mc">SEMESTER</th>
                    <th class="mc">PASSWORD</th>
                </tr>
            </thead>
            <tbody>
                <?php while($result->fetch()):?>
                   
                <tr>
                     <td class="text"><?= $id; ?></td>
                    <td class="text"><?= $username; ?></td>
                    <td class="text"><?= $email; ?></td>
                    <td class="text"><?= $semester; ?></td>
                    <td class="text"><?= $password; ?></td>
                </tr>
                <?php endwhile; ?>
                <?php endif; ?>
            </tbody>
        </table>
		
	</div>
</div>
			

</body>
</html>
   