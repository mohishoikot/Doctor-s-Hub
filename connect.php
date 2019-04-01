 <?php
$server_name = "www.techzone.com.bd";
$server_username = "techzone_admin";
$server_password = "yjPi3P8Bis3bFMH";
$db_name="techzone_hospitals";

// Create connection
$db = mysqli_connect($server_name, $server_username, $server_password,$db_name);
//db=mysqli_connect("localhost",$username,$pass,$dbname);
// Check connection
if(!$db)
            {
                echo "Connection Error...".mysqli_connect_error();
            }
            else
            {
                echo"<br/> Succes!<br/>";
            }




?> 