<?php  include('server.php'); 
//   if (isset($_POST['search'])) {
//     # code...
//     echo("DOne");
//   }
//   else{
// echo("Problem");
//   }

  //   if (isset($_POST['insert_test2'])) {
  //   # code...
  //   echo $_POST['searchinput'];
  // }
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
<?php $results = mysqli_query($db, "SELECT * FROM userinfo"); ?>
<?php if (isset($_SESSION['message'])): ?>
  <div class="msg">
    <?php 
      echo $_SESSION['message']; 
      unset($_SESSION['message']);
    ?>
  </div>
<?php endif ?>

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
  
   <!--  onclick="location.href = 'www.yoursite.com';" -->
      <form method="post" class="form-inline my-2 my-lg-0 navbar-right">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="searchinput">
  
   <button type="submit" class="btn btn-outline-success my-2 my-sm-0" name="insert_test2">Search</button>

  
</form>
 
</nav>

<!-- Include javascript && jquery for menu -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Navigation Menu END -->

<!-- Bootstrap Heading -->

<div class="container">
  <div class="jumbotron">
  <h1 class="display-4">Big Burn-Data Center</h1>
  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
  <hr class="my-4">
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <a class="btn btn-primary btn-lg" href="signin.php" role="button">JOIN TODAY</a>
</div>
  

<!-- Heading ends -->

<a class="btn btn-primary btn-lg btn-block" role="button" href="map.html" style="margin-bottom: 3%; font-size: 30px;"><i class="fab fa-searchengin"></i> Search Nearby Hospitals</a>

<!-- Hospital list shows here -->

  <div class="row">
    <div class="col-sm col-lg-4 col-mg">
     <figure class="figure">
  <img src="https://www.daily-sun.com/assets/news_images/2017/10/29/DMCH.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure."class="img-thumbnail">
  
  <h1 class="figure-caption">Dhaka Medical Hospital</h1>
  <a class="btn btn-primary btn-sm" href="#" role="button">Learn more</a>
</figure>
    </div>
    <div class="col-sm col-lg-4 col-mg">
      <figure class="figure">
  <img src="http://labaidgroup.com/img/slider/selected/2.jpg" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  <figcaption class="figure-caption"class="img-thumbnail">Labaid Hospital</figcaption>
 <a class="btn btn-primary btn-sm" href="#" role="button">Learn more</a>
</figure>
    </div>
    <div class="col-sm col-lg-4 col-mg">
     <figure class="figure">
  <img src="https://images.unsplash.com/photo-1505587043598-a6da2ee1da2f?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=4a2f9e5c9364a880bd4dd482fe6a658a&auto=format&fit=crop&w=1351&q=80" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure."class="img-thumbnail">
  <figcaption class="figure-caption">United Hospital</figcaption>
  <a class="btn btn-primary btn-sm" href="#" role="button">Learn more</a>
</figure>
    </div>

<!--     <form>
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="searchinput">
      
      <a class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search" href="#" >Search</a>
    </form> -->

  
</form>
  
    <!-- hospital list ends here -->
<!-- <table>
  <thead>
    <tr>
      <th>Type</th>
      <th>Institution Name</th>
      <th>Institution Phone</th>
      <th>Email</th>
      <th>Actions</th>
    </tr>
  </thead>
  
  <?php while ($row = mysqli_fetch_array($results)) { ?>
    <tr>
      <td><?php echo $row['institution_type']; ?></td>
      <td><?php echo $row['institution_name']; ?></td>
      <td><?php echo $row['phone_number']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td>
        <a href="index.php?edit=<?php echo $row['username']; ?>" class="edit_btn" >Edit</a>
      </td>
    </tr>
  <?php } ?>
</table> -->
<!-- <form method="post" action="index.php">
<!-- // newly added field -->
<!-- <label>Institution Phone: </label>
<input type="hidden" name="id" value="<?php echo $id; ?>">
 -->
<!-- // modified form fields -->
<!-- <input type="text" name="institution_phone" value="<?php echo($phone_number); ?>">
<label>Email: </label>
<input type="text" name="email" value="<?php echo $email; ?>">


<?php //if ($update == true): ?>
  <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
<?php //else: ?>
  <button class="btn" type="submit" name="save" >Save</button>
<?php //endif ?>
</form>
 --> 
</div>
</body>
</html>