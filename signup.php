  <?php include('server.php'); ?>

<!DOCTYPE html>
<html>
<head>
  <title>Big Burn</title>

  
  <link rel="stylesheet" type="text/css" href="bootstrap.css">
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
        <a class="nav-link" href="index.php"><i class="fas fa-hospital-symbol"></i> Hospitals <span class="sr-only">(current)</span></a>
      </li>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="#"><i class="far fa-hospital"></i> Diagnostic Center</a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="signin.php"><i class="fas fa-user-tie"></i> Login/Register</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" id="searchfrom" style="margin-left: 5%;">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    
  </div>
</nav>


<!-- Include javascript && jquery for menu -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Navigation Menu END -->


  <!-- Heading --> 
  <div class="header">
    <h2>Register</h2>
  </div>
<!-- Register form -->
<form method="post" action="signup.php" id="fromClass">
  <!-- Display error here -->
  <?php include('error.php'); ?>
  <div class="input-group">
    <label>Institution Type:</label>
  </div>
  <div>
    <input type="radio" name="institution_type" id="hospital" value="Hospital">
    <label for="hospital">Hospital</label>
    <input type="radio" name="institution_type" id="Diagnostic_center" value="Diagnostic Center">
    <label for="Diagnostic_center">Diagnostic center</label>
  </div>
  <div class="input-group">
    <label>Institution Name</label>
    <input type="text" name="institution_name" required>
  </div>
  <div class="input-group">
    <label>Institution Phone</label>
    <input type="text" name="institution_phone" required>
  </div>
  <div class="input-group">
    <label>Email</label>
    <input type="Email" name="email"required>
  </div>
  <div class="input-group">
    <label>Username</label>
    <input type="text" name="username"required>
  </div>
  <div class="input-group">
    <label>Password</label>
    <input type="Password" name="password_1"required>
  </div> 
  <div class="input-group">
    <label>Confirm Password</label>
    <input type="Password" name="password_2"required>
  </div>
  <div class="input-group">
    <button type="submit" name="register" class="btn">Register</button>
  </div>
    <p>
      Already a member? <a href="signin.php">Sign in</a>
    </p>
</form>

</body>
</html>