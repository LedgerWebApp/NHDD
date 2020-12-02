<?php
// basically it will include pdo file for data connection to the sql server
include_once('pdo1.php');
// it make a new class of database_connection1 called signupdata
$signupdata=new Database_Connection1();
// it checks whether all field of form are filled or not
if(isset($_POST['name']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['psw']))
{
// Posted Values
$Name=$_POST['name'];
$Username=$_POST['username'];
$Useremail=$_POST['email'];
$Userpassword=md5($_POST['psw']);
//Function Calling
$sql=$signupdata->signup($Name,$Username,$Useremail,$Userpassword);
if($sql)
{
// Message for successfull insertion
//echo "<script>alert('Registration successfull.');</script>";
echo "<script>window.location.href='login.php'</script>";
}
else
{
// Message for unsuccessfull insertion
echo "<script>alert('Something went wrong. Please try again');</script>";
echo "<script>window.location.href='sign_up.php'</script>";
}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>NHDD | SIGN-UP</title>
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
  </head>
  <body>
  <img class="nhdd_logo" src="../Images/NHDD_logo.png" alt="NHDD logo">   
    <div>
    <div class="login__holder">
      <div class="login__container">
        <img class="bg__img" src=" ../images/half background.jpg" />
        <div class="login__field">
          <h1 class="login__name">Sign Up</h1>
          <form method
          ="POST">
          <input
            type="text"
            class="user__field__signup"
            placeholder="Enter Username"
            name="username"
            required
          />
          <input
            type="text"
            placeholder="First name"
            name="name"
            required
          />
          <input
            type="text"
            placeholder="Enter email"
            name="email"
            required
          />
          <input
            class="field"
            type="password"
            placeholder="Enter Password"
            name="psw"
            required
          />
          <input
            class="field"
            type="password"
            placeholder="Renter Password"
            name="password"
            required
          />
          <button class="BUTTON_KMY">Sign Up</button>
        </form>
        </div>
      </div>
    </div>
    </div>
  </body> -->
  <!-- <script src="../Script/Common.js"></script> -->
 </html>
