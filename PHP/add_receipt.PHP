<?php
// Include the database configuration file
 session_start();
include_once('pdo1.php');// it consider the pdo1.php in this code also

$datainsert=new Database_Connection2();// it makes a new class of database connection
// If file upload form is submitted
if(isset($_POST['submit']) && isset($_POST['expense'])){
    if(!empty($_FILES["image"]["name"])) {
        // Get file info
        $namefile = basename($_FILES["image"]["name"]);
        $filetype = pathinfo($namefile, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allows = array('jpg','jpeg','PNG','png');
        if(in_array($filetype, $allows)){
            $picture = $_FILES['image']['tmp_name'];
            $image = addslashes(file_get_contents($picture));
         	$Name=$_POST['expense'];
		$Userdate=$_POST['date'];
		$user=$_SESSION['name'];

            // Insert image content into database

            $sql=$datainsert->imagesaving($Name,$image,$Userdate,$user);

            if($sql){
               // Message for successfull insertion
               $check = 1;
echo  '<div style="background-color:green"><h1 style="text-align:center;color:white">Success</h1></div>';
echo "<script>window.location.href='add_receipt.php'</script>";
            }else{
                // Message for unsuccessfull insertion
                echo  '<div style="background-color:red"><h1 style="text-align:center;color:white">Oops!! Try Again</h1></div>';
echo "<script>window.location.href='add_receipt.php'</script>";
            }
        }else{
           // Message for unsuccessfull insertionecho
            echo  '<div style="background-color:red"><h1 style="text-align:center;color:white">Oops!! Try Again</h1></div>';
echo "<script>window.location.href='add_receipt.php'</script>";
        }
    }else{
       // Message for unsuccessfull insertion echo
       echo  '<div style="background-color:red"><h1 style="text-align:center;color:white">Oops!! Try Again</h1></div>';
echo "<script>window.location.href='add_receipt.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/add.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../CSS/receipts.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>NHDD | Add Receipte </title>
    <header>
        <div class="logo__name">
        <img class="nhdd_logo" src="../Images/NHDD_logo.png" alt="NHDD logo">
            <button class="message"><a href="dashboard.php"><i style="font-size:34px;color:white" class="fa">&#xf0a8;</i></a></button>
            <button class="message"><a href="index.php"> <i class="fa fa-home" style="font-size:34px;color:white"></i></a></button>
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
        <div class="add__reciepts">
            <h1><u>Receipt</u></h1>
            <h2>Add images of your receipts for future </h1>
            <form method="POST" enctype="multipart/form-data">
            <input type="text" class="first" name="expense" placeholder="expense name"/><br>
            <input type="date" placeholder="Date" name="date"><br >
            <!-- <input type="text" placeholder="Description" /><br /> -->
            <textarea rows="7" cols="32" name="description" placeholder="Add description of receipt"></textarea><br>
            <label class="sel__img">Select Image File:(only .jpg ,.png , .jpeg)</label>
             <input type="file" name="image">
            <input class="add__it" type="submit" onclick="showAlert()" name="submit" value="Add it">
            </form>
        </div>
    </section>
    <script src="../Script/add_expense.js?v=<?php echo time(); ?>"></script>
</body>
</html>
