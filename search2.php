<?php  include('server.php');
  echo $_SESSION['search'];
  echo " ";

  $var=$_SESSION['search'];
   
  $qry2="SELECT DISTINCT Doc_name, Doc_degree, Doc_Dept, Doc_mail, Doc_skill FROM doctor WHERE Doc_name LIKE '%{$var}%' OR Doc_degree LIKE '%{$var}%' OR Doc_Dept LIKE '%{$var}%' OR Doc_skill LIKE '%{$var}%'";

  $locVar=$_SESSION['option'];
  echo $locVar;

  $qry_option1="SELECT DISTINCT Doc_name, Doc_degree, Doc_dept, Doc_mail,Doc_skill FROM doctor WHERE Hospital_id IN 
(SELECT Hospital_id from  (SELECT DISTINCT Hospital_id FROM doctor WHERE Doc_name LIKE '%{$var}%' OR Doc_degree LIKE '%{$var}%' OR Doc_skill LIKE '%{$var}%' OR Doc_Dept LIKE '%{$var}%') AS A
JOIN
(SELECT DISTINCT institution_id FROM institution WHERE location IN (SELECT DISTINCT neighbour FROM location WHERE local = '{$locVar}' AND distance < 10)) AS B ON A.Hospital_id = B.institution_id)";



  $loc="SELECT DISTINCT local FROM location order by local asc";

 
  $rslt=mysqli_query($db,$loc);
  $rslt2=mysqli_query($db,$qry2);
  $rslt3=mysqli_query($db,$qry_option1);

   
  //$fetch2=mysqli_fetch_array($rslt2);

 
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Big Burn</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="style.css">
   <style type="text/css">
     body{
        margin-top: 35px;
     }
   </style>
</head>

<body>
<!-- Script -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous">
  </script>

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
</div>

  <form method="post" class="form-inline navbar-right">
   <ul class="navbar-nav">
    <li>
       <select name="locLoc">
          <option>Please Select an option</option>
        <?php

while ($drop = mysqli_fetch_array($rslt)) { ?>
    <option class="dropdown-item"><?php echo $drop['local']; ?></option>

<?php } ?>
      </select>
      <button name="loc" class="btn">Filter Search</button>
    </li>
      <li>
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="searchinput">  
      </li>
      
  <li>
   <button type="submit" class="btn btn-outline-success my-2 my-sm-0" name="insert_test2">Search</button> 
  </li>
   
   </ul>
      

  
</form>
</nav>

<!-- Include javascript && jquery for menu -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Navigation Menu END -->

<!-- Serach reasult will show -->
  
	<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="search.php">Institution</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="search2.php">Doctors</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="search3.php">Test</a>
  </li>
</ul>

<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Degree</th>
      <th>Department</th>
      <th>Email</th>
      <th>Skill</th>
    </tr>
  </thead>
  

<?php 

while ($row = mysqli_fetch_array($rslt2)) { ?>
    <tr>
      <td><?php echo $row['Doc_name']; ?></td>
      <td><?php echo $row['Doc_degree']; ?></td>
      <td><?php echo $row['Doc_Dept']; ?></td>
      <td><?php echo $row['Doc_mail']; ?></td>
      <td><?php echo $row['Doc_skill']; ?></td>
      
    </tr>
<?php } ?>
</table>
<br>
<br>
<br>
<!-- Special Qury Search -->

<H1>Filter Search</H1>
<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Degree</th>
      <th>Department</th>
      <th>Email</th>
      <th>Skill</th>
    </tr>
  </thead>
  

<?php 

while ($row1 = mysqli_fetch_array($rslt3)) { ?>
    <tr>
      <td><?php echo $row1['Doc_name']; ?></td>
      <td><?php echo $row1['Doc_degree']; ?></td>
      <td><?php echo $row1['Doc_dept']; ?></td>
      <td><?php echo $row1['Doc_mail']; ?></td>
      <td><?php echo $row1['Doc_skill']; ?></td>
      
    </tr>
<?php } ?>
</table>

</form>
</body>
</html>