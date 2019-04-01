<?php
session_start();
$_SESSION['isLoggedIn']="NO";
	$username="";
	$email="";
	$institution_name="";
	$institution_id="";
	$password_1="";
  //$_SESSION['userid']='';
	
	$institution_type="";
	$errors=array();

 //connect the database
  include ('connect.php');
	//$db=mysqli_connect("localhost",$username,$pass,$dbname);

 	//if the register button is clicked
 	if (isset($_POST['register'])) {
 		# code...
 		#Storing Veriables
 		$username = $_POST['username'];
 		$institution_name = $_POST['institution_name'];
 		$institution_id = $_POST['institution_phone'];
 		$email = $_POST['email'];
    $institution_type=$_POST['institution_type'];
 		$password_1 = $_POST['password_1'];
 		$password_2 = $_POST['password_2'];
 		
 		
 		//ensure form is filled_up
 		if (empty($username)) {
 			# code...
 			array_push($errors, "Username is required");
 		}
 		if (empty($email)) {
 			# code...
 			array_push($errors, "Email is required");
 		}
 		if (empty($password_1)) {
 			# code...
 			array_push($errors, "Password is required");
 		}
 		if ($password_1 !=  $password_2) {
 			# code...
 			array_push($errors, "Password doesn't is match");
 		}

 		// first check the database to make sure 
  //a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user WHERE username='$username'  LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  

 		if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

      # code...
     // $password= md5($password_1);//encrypt password
     $institution_phone= $_POST['institution_phone'];
      $sql = "INSERT INTO user(username,password) VALUES('$username','$password')";
      $qry="INSERT INTO userinfo VALUES('$username','$institution_type','$institution_name','$email','$institution_phone')";



    if (mysqli_query($db, $sql) &&  mysqli_query($db, $qry)) {
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    $_SESSION['isLoggedIn']="YES";
   header('location: create_hospital.php');
} else {
    echo "Error updating record: " . mysqli_error($db);
}

   
    


 	}




 // LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }
  if (count($errors) == 0) {
  	//$password = md5($password);
  	$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
    $row = mysqli_fetch_array($results);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
      $_SESSION['userid']= $row['uid'];
    header('location:hospital.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
  
}

//update
if (isset($_POST['update'])) {
	$username = $_POST['username'];
	$phone = $_POST['institution_phone'];
      $email = $_POST['email'];

	mysqli_query($db, "UPDATE userinfo SET phone_number='$phoe', email='$email' WHERE username=$username");
	$_SESSION['message'] = "Address updated!"; 
	header('location: index.php');
}

//EnterHospitalInfo
if (isset($_POST['update_user'])) {
  # code...
  $location=$_POST['location'];
  $img=$_POST['imgLink'];
  $details=$_POST['details'];
  
  $infoqry="INSERT INTO hospitalinfo(location,Hospital_details,img,hospital_name) VALUES('$location','$details','$img','$institution_name')";
  if ( mysqli_query($db,$infoqry)) {
    $_SESSION['message']="location updated";
  header('location: login.php');
  }
  else
  {
    echo "Problem!!";
  }
  
}
 //update
if (isset($_POST['update_details'])) {
  $uid= $_SESSION['userid'];
  
  $location=$_POST['location'];
  echo $location;
  $details=$_POST['details'];

  $upqry="UPDATE hospitalinfo SET location='$location', Hospital_details='$details' WHERE Hospital_id='$uid' ";
  if (mysqli_query($db, $upqry)) {
   $_SESSION['message'] = "Address updated!"; 
   header('location: hospital.php');
  }
}
//add Doctor

if (isset($_POST['insert_doc_details'])) {
  # code...
  $name=$_POST['docName'];
  $degree=$_POST['docDegree'];
  $dept=$_POST['depertment'];
  $mail=$_POST['docEmail'];
  $skill=$_POST['docSkill'];
  $hospital_id=$_SESSION['userid'];
  echo $hospital_id;
  
  $infoqry="INSERT INTO doctor(`Hospital_id`, `Doc_name`, `Doc_degree`, `Doc_Dept`, `Doc_mail`, `Doc_skill`) VALUES('$hospital_id','$name','$degree','$dept','$mail','$skill')";
  if ( mysqli_query($db,$infoqry)) {
    $_SESSION['message']="Doctor Added";
  header('location: index.php');
  }
  else
  {
    echo " Problem!!";
  }
  
}

if (isset($_POST['insert_test'])) {
  # code...
  $name=$_POST['testName'];
  $testType=$_POST['testType'];
  $testPrice=$_POST['testPrice'];
  $hospital_id=$_SESSION['userid'];
  echo $hospital_id;
  
  $infoqry="INSERT INTO test(`Diagnostic_id`, `Test_name`, `Test_type`, `Test_price`) VALUES('$hospital_id','$name','$testType','$testPrice')";
  if ( mysqli_query($db,$infoqry)) {
    $_SESSION['message']="Test Added";
  header('location:index.php');
  }
  else
  {
    echo " Problem!!";
  }
  
}
//Search
  if (isset($_POST['insert_test2'])) {
    # code...
    $_SESSION['search']=$_POST['searchinput'];
     header('location:search.php');
   
     
   }

  if (isset($_POST['loc'])) {
      # code...
      $_SESSION['option'] = $_POST['locLoc'];
    }
    else
       $_SESSION['option'] = "Uttara";
?>