<?php
session_start();
// basically it will include pdo1 file for data connection to the sql server
include_once('pdo1.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NHDD Landing page</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Poppins"
      rel="stylesheet"
    />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../CSS/styles.css?v=<?php echo time(); ?>">
  </head>
  <body>
    <section id="navbar">
      <ul>
        <img class="nhdd__logo" src="../Images/NHDD_logo.png" alt="NHDD logo">
        <li>
          <a href="login.php"
            ><button class="BUTTON_KMY log">Explore</button></a
          >
        </li>
        <li>
          <a href="login.php"
            ><button class="BUTTON_KMY log">Login</button></a
          >
        </li>
        <li>
          <a href="sign_up.php"
            ><button class="BUTTON_KMY log">Sign up</button></a
          >
        </li>
      </ul>
    </section>
    <div class="mid__area">
      <img class="mid__img" src="../Images/hand.jpg" />
      <button class="BUTTON_KMY handle__free">Free account</button>
      <div class="hori__rul mid"></div>
    </div>

    <div class="salient__feat">
      <h1>Salient features</h1>
      <div class="sal__card">
        <img src="../Images/transact_1.jpeg" />
        <img src="../Images/dashboard_1.jpeg" />
        <img src="../Images/analy_1.jpeg" />
      </div>
    </div>
    <div class="accounting">
      <div class="hori__rul"></div>
      <h1>Organized and stress free acounting</h1>
      <div class="handle__mid">
        <div class="all__points">
          <h1>&#9989; Quick and easy to use dashboard</h1>
          <h1>&#9989; Easy tracking of expenses</h1>
          <h1>&#9989; Analysis pie charts and credit reports</h1>
        </div>
        <img src="../Images/dash_1.png" />
      </div>
    </div>
    <div class="first"></div>
    <div class="second"></div>
    <div class="third"></div>

    <div class="footer__area">
      <div class="add__r">
        <h1>NHDD Accounting Services</h1>
        <h1>21, New Avenue</h1>
        <h1>Bedford Street</h1>
        <h1>New york, NY, 971208</h1>
        <h1>United States</h1>
      </div>
      <div class="add__links">
        <h1>Products</h1>
        <h1>Contact us</h1>
        <h1>Login</h1>
        <h1>Sign up</h1>
      </div>
      <div class="add__cont">
        <h1>Contact us</h1>
        <h1>(+91)8811112112</h1>
        <h1>NHDD7381@gmail.com</h1>
      </div>
    </div>
    <!-- <img class="adjust__hori" src="./Images/vec2.png" /> -->
    <div class="foot__line"></div>
  </body>
  <script src="../Script/Common.js"></script>
</html>
