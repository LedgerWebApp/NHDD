<?php
session_start();// it basically start the session so that it should have the name of session
include_once('pdo1.php');// it  include the pdo1.php so that when function is called it uses that function
$datainsert=new Database_Connection();
//it checks where all the form field are written or not
if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['income']) && isset($_POST['sum'])){
   // below save the fname,lname,email,password
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $pass=md5($_POST['password']);
    $income=$_POST['income'];
    $sum=$_POST['sum'];
    $user=($_SESSION['name']);
    $sql=$datainsert->updatevalue($fname,$lname,$email,$pass,$income,$sum,$user);// it calls the function and move to the pdo1 file function and works on it
    if($sql)
    {
        echo '<div style="background-color:green"><h1 style="text-align:center;color:white">Success</h1></div>';
        echo"<script>window.location.href='Update.php'</script>";

    }
    else
    {
        echo '<div style="background-color:red"><h1 style="text-align:center;color:white">Oops!! Try Again</h1></div>';
        echo"<script>window.location.href='Update.php'</script>";

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/add.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../CSS/update.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>NHDD | Update Profile </title>
    <header>
        <div class="logo__name">
        <img class="nhdd_logo" src="../Images/NHDD_logo.png" alt="NHDD logo">
            <button class="message"><a href="dashboard.php"><i style="font-size:34px;color:white" class="fa">&#xf0a8;</i></a></button>
            <button class="message"><a href="index.php"> <i class="fa fa-home" style="font-size:34px;color:white"></i></a></button>
        </div></div>
    </header>
</head>
<body>
    <section id="add__expense">
    <div class = "user__panel">
        <img class="user__img" src ="../Images/bg.jpg" alt="bg image">
        <h1 class="user__name"><?php echo $_SESSION['name'] ?></h1>
        <hr>
        <button onclick="ExpenseDropdown()"class="panel__item first__item"><i class="fas fa-dollar-sign adjust__size"></i>Expenses</button>
        <div id="dropdown" class="expense__content">
            <a href="add_expenses.php">Add expenses</a>
            <a href="view_expense_categorywise.php">Manage expenses</a>
        </div>
        <button onclick="ExpenseReportDropdown()" class="panel__item first__item call__drop"><i class="fa fa-file-text adjust__size"></i></i>Expense Report</button>
        <div id="dropdown_er" class="expense_report__content">
            <a href="daywise_exp_view.php">Daywise expenses</a>
        </div>
        <button  class="panel__item first__item"><i class="fa fa-save  adjust__size"></i> <a href="add_receipt.php">Save Receipts</a></h1></button>
        <button onclick="viewingExp()" id="viewDis"  class="panel__item first__item"><i class="fa fa-eye adjust__size"></i> <a href="#">View Receipts</a></h1></button>
        <div id="dropdown_vr" class="vr_content">
            <a href="date_reciept.php">View datewise</a>
            <a href="view_receipt.php">View All</a>
        </div>
        <button class="panel__item first__item"><i class="fa fa-angle-double-up adjust__size"></i> <a href="Update.php">Update Profile</a></h1></button>
        </div>
        <div class="upd__prof">
            <h1 class="upd__head"> Update Profile</h1>
            <form method="POST">
            <input type="text" id="lname" name="fname" placeholder="First Name">
            <input type="text" id="lname" name="lname" placeholder="Last Name">
            <input type="text" id="lname" name="email" placeholder="Email">
            <input type="password" id="lname" name="password" placeholder="Password">
            <input type="text" id="lname" name="income" placeholder="Income">
            <button class="BUTTON_KMY">Update</button></form>
        </div>
    </section>
    <script src="../Script/add_expense.js?v=<?php echo time(); ?>"></script>
    <script  src="../Script/report.js?v=<?php echo time(); ?>"></script>

</body>
</html>
