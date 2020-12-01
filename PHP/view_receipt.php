<?php
session_start();
include_once('pdo1.php');
$username=($_SESSION['name']);
  ?>

<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../CSS/add.css?v=<?php echo time(); ?>">
      <link rel="stylesheet" href="../CSS/expense_report.css?v=<?php echo time(); ?>">
      <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
      <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
      <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <title>NHDD | View Receipt </title>
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
          <div class ="user__inputarea">
           <h1 class="input__head">ADDED RECEIPTS</h1>
           <hr />
           <table class="expense__report__table">
            <thead>
            <tr>
              <th>Reciept</th>

            </tr>
            </thead>

              <?php
              $dataviewing=new Database_Connection();
                $sql = $dataviewing->viewing1($username);
                    ?>
	<?php if($sql->num_rows > 0){ ?>

        <?php while($row = $sql->fetch_assoc()){ ?>
        <tr>
        <td><img width="50%"src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" /></td>
        </tr>
        <?php } ?>
    </div>
<?php }else{ ?>
    <!-- <p class="status error">Image(s) not found...</p> -->
    <h1 class="oops"> Oops !!</h1>
    <h1 class="error"> Probably on images saved </p>
<?php } ?>
                              </div>
</div>
</table>
      </section>
      <script src="../Script/add_expense.js?v=<?php echo time(); ?>"></script>
  </body>
    </html>
