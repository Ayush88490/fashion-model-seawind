
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Login.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>MODELS</title>
  </head>

  <body>
  <header>
        <nav>
          
            <div class="nav-left">
              <a href="#"><img src="img/logo.jpg" alt="Logo"></a>
            </div>
            <div class="nav-right">
              <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Models</a></li>
                <li><a href="#">services</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#">Contact us</a></li>
              </ul>
             
            </div>

            <div>
            
            <button class="btn"><i class="fa-solid fa-right-to-bracket"></i>Login</button>
            
            <button class="btn2"><i class="fa-regular fa-address-card"></i>Register</button>
         </div>
          
        </nav>
</header>

      <form method="POST">
                <button class="culogin" name="b1" value="login">login</button>
                <button class="signin" name="b1" value="sign-in">Register</button>
      </form>


      <?php

$action=null;
$action=isset($_POST ["b1"]);

 if($action!=null)
 {
  $action=$_POST["b1"];
  if($action=="login")
  {
    ?>
   <div class="container-login">
        <h2>Login</h2><hr>
        <form method="POST">
            <input type="text" name="email" placeholder="Email" >
            <input type="password" name="pass" placeholder="Password" >
            <!-- <input type="submit" name="b1" value="Login"> -->
            <button class="submit" name="b1" value="login1">Login</button>
        </form>
    
       
    </div>
   <?php
  }
  $servername="localhost";
  $username="root";
  $password="";
  $databasename="mydb2";
  
  $conn= new mysqli($servername,$username,$password,$databasename);
  
  if($conn->connect_error)
  {
      echo"not connect with database";
  }
 
  $action=null;
  $action=isset($_POST ["b1"]);

  if($action!=null)
  {
      $action=$_POST["b1"];
      if($action=="login1")
      {
          $email=$_POST["email"];
          $password=$_POST["pass"];

          if ($email == "" || $password == "")
          {
              echo"<script>alert('Sorry, all fields are required')</script>";
          } 
          else 
          {
              $sql="select * from modeldata where email='$email' and password='$password'";
              $result=$conn->query($sql);
              $cnt=$result->num_rows;
              if($cnt==0)
              {
                  echo"<script> return false; </script>";
                  echo"<script>alert('sorry invalid user name and password')</script>";
              }
              else
              {
                  echo" <script>
                          document.location.href='indexhome.html'</script>";
              }
          }
      }
  }
  


    
    // front
  $action=$_POST["b1"];
  if($action=="sign-in")
  {
    ?>
 <div class="container-sign">
        <h2>Register</h2><hr>
        <form method="POST">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="phone" name="phone" placeholder="phone" required>
        <select name="gender" class="gender" placeholder="Select gender">
              <option value="male" >MALE</option>
              <option value="female">FEMALE</option>
              <option value="other">OTHER</option>
              </select> 
        <input type="password" name="pass" placeholder="Password" required>
            <button class="submit" name="b1" value="login2">Register</button>
            <!-- <input type="submit" name="b2" value="Login"> -->
        </form>
    
       
    </div>

    <!-- back-end -->
    <?php
  }
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "mydb2";

$conn = new mysqli($servername, $username, $password, $databasename);

if ($conn->connect_error) {
    echo "Failed to connect to the database";
}

$action=null;
$action=isset($_POST ["b1"]);

if($action!=null)
{
    $action=$_POST["b1"];
    if($action=="login2")
    {

 
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $password = $_POST["pass"];
   
    
 
    
    if (empty($name) || empty($email) || empty($phone)|| empty($gender) || empty($password) ) {
        echo "<script>alert('Sorry, all fields are required')</script>";
    } 
    else 
    {
            $sql = "INSERT INTO `modeldata` (name, email, phone, gender, password) VALUES ('$name', '$email', '$phone','$gender', '$password')";
   
            $result = $conn->query($sql);  
      
            if ($result === TRUE) {
                echo "<script>
                       alert('Data inserted successfully');
                       window.location.href='indexhome.html';
                     </script>";
            }
             else
              {
                echo "<script>alert('Sorry, an error occurred. Please try again.')</script>";
              }
        } 
       
    }
}
}
?>
</body>
</html>