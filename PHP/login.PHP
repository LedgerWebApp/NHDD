<?php
session_start();
// basically it will include pdo file for data connection to the sql server
include_once('pdo1.php');
// it is used to make a class of database-connection1 name logindata
$logindata=new Database_Connection1();
// used to check whether all the field are used or not 
if(isset($_POST['username']) && isset($_POST['pass']))
{
// After clicking on login button Values

$Username=$_POST['username'];
$Userpassword=md5($_POST['pass']);
//Function Calling for login checking variable
$sql=$logindata->signin($Username,$Userpassword);
$numbers=mysqli_fetch_array($sql);
if($numbers>0)
{

  $_SESSION['name']=$numbers['Name'];
// Message for successfull insertion
//echo "<script>alert('login successfull.');</script>";
echo "<script>window.location.href='dashboard.php'</script>";
}
else
{
// Message for unsuccessfull insertion
echo "<script>alert('Invalid Credential. Please try again');</script>";
echo "<script>window.location.href='login.php'</script>";
}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>NHDD | LOG-IN</title>
    <link rel="stylesheet" href="../CSS/login.css?v=<?php echo time(); ?>">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Poppins"
      rel="stylesheet"
    />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body>
      <img class="nhdd_logo" src="../Images/NHDD_logo.png" alt="NHDD logo">
    <div class="login__holder">
      <div class="login__container">
        <img class="bg__img" src="../Images/bg.jpg" />
        <div class="login__field">
          <h1 class="login__name">Login</h1>
          <img src="../Images/user.png" class="user__img" />
         <form method="POST">
          <input
            type="text"
            class="user__field"
            placeholder="Enter Username"
            name="username"
            required
          />
          <input
            class="field"
            type="password"
            placeholder="Enter Password"
            name="pass"
            required
          />
          <a href="report.html"><button class="BUTTON_KMY login_btn">Login</button></a>
        </form>
        </div>
      </div>
    </div>
    </div>
  </body>
  <script src="../Script/Common.js"></script>
</html>
<!-- <!DOCTYPE html>
<html>
  <head>
    <title>NHDD | LOG-IN</title>
    <link rel="stylesheet" href="../CSS/login.css?v=<?php echo time(); ?>">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Poppins"
      rel="stylesheet"
    />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body>
    <div class="loader__bg">
        <div class="loader"></div>
        </div>
    <div>
    <div class="login__holder">
      <div class="login__container">
        <img class="bg__img" src=" bg.jpg" />
        <div class="login__field">
          <h1 class="login__name">Login</h1>
          <img src="../Images/user.png" class="user__img" />
          <form method="POST">
          <input
            type="text"
            class="user__field"
            placeholder="Enter Username"
            name="username"
            required
          />
          <input
            class="field"
            type="password"
            placeholder="Enter Password"
            name="password"
            required
          />
          <button class="BUTTON_KMY login_btn">Login</button>
               </form>
        </div>
      </div>
    </div>
  </body>
  <script src="../Script/Common.js"></script>
</html> -->
