<?php  include('server.php'); 

$uid=$_SESSION['userid'];
$deta="Select * from hospitalinfo where Hospital_id=$uid";
   		$data=mysqli_query($db, $deta);
   		$row = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Big Burn</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

  <!-- Navigation Menu Start -->
<nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">

  <a class="navbar-brand" href="index.php">BIG BURN</a>
  <div class="container">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="hospital.php"><i class="fas fa-hospital-symbol"></i> Hospitals <span class="sr-only">(current)</span></a>
      </li>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="#"><i class="far fa-hospital"></i> Diagnostic Center</a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="signin.php" ><i class="fas fa-user-tie"></i> Login/Register</a>
      </li>
    </ul>
    
  </div>
  <form class="form-inline my-2 my-lg-0 navbar-right" id="searchfrom" style="margin-left: 5%;">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</nav>

<!-- Include javascript && jquery for menu -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Navigation Menu END -->


<!-- First Container -->
<div class="container-fluid bg-1 text-center">
  <h3 class="margin"><?php echo $row['hospital_name']; ?></h3>
  <img src="<?php echo $row['img']; ?>" class="img-responsive img-round margin" style="display:inline" alt="hosp img" width="350" height="350">
<div class="dropdown">
<button onclick="alert('<?php echo $row['location'];?>')" class="docBtn"><i class="fas fa-map-marker-alt"></i> <?php echo $row['location'];?></button>
</div>
  <a class="btn btn-success" type="button" id="edit" href="editinfo.php" ><i class="fas fa-pencil-alt"></i> Edit!</a>
  <a type="button" class="btn btn-success" id="edit" href="adddoctor.php"><i class="fas fa-user-plus"></i> Add Doctor</a>
</div>

<!-- Second Container -->
<div class="container-fluid bg-2 text-center">
  <h3 class="margin">Hospital Details?</h3>
   <?php 
   		echo $row['Hospital_details'];
    ?>
</div>


</body>
</html>