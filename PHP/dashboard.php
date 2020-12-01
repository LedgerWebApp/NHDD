<?php
include('pdo1.php');
session_start();
$name=$_SESSION['name'];
$t=time();

$p=date("m",$t);
error_reporting(0);
// $totalcost = array(0,0,0,0,0,0);
// $totalcost2 = array(0,0,0,0,0,0);
// $totalcost1=  array(0,0,0,0,0,0);
?>
<?php
for ($i = 0; $i <= 6; $i++)
{
   $startmonths[] = date("Y-m-d",strtotime( date( 'Y-m-01' )." -$i months"));
}
for ($i = 0; $i <= 6; $i++)
{
   $endmonths[] = date("Y-m-d", strtotime( date( 'Y-m-30' )." -$i months"));
   //echo $startmonths[$i];
}
$dataviewing=new Database_Connection();
$totalcost=array(0,0,0,0,0,0);
for($i=1;$i<=6;$i++)
{
  $sql = $dataviewing->dateviewing('Occasional',$startmonths[$i],$endmonths[$i], $name );
$totalcost[$i]=0;
                while ($row=mysqli_fetch_array($sql)) {

              //       echo($row['cost']);
			 // echo($row['name']);?>

<?php
  // occasional monthly data totalcost[1] sum of occasional cost of previous month
  $totalcost[$i]=$totalcost[$i]+$row['cost'];
}
//  echo('total');


//  echo($totalcost[$i]);
// echo('<br>');
                    }
$totalcost1=array(0,0,0,0,0,0);
for($i=0;$i<=6;$i++)
{
  $sql = $dataviewing->dateviewing('monthly',$startmonths[$i],$endmonths[$i],$name);
$totalcost1[$i]=0;
                while ($row=mysqli_fetch_array($sql)) {

      //                echo($row['cost']);
			// echo($row['name']);?>

<?php
                 // occasional monthly data totalcost[1] sum of daily cost of previous month
			              $totalcost1[$i]=$totalcost1[$i]+$row['cost'];
}
//  echo('total');
//  echo($totalcost1[$i]);
// echo('<br>');
                    }
$dataviewing=new Database_Connection();
$totalcost2=array(0,0,0,0,0,0);
for($i=0;$i<=6;$i++)
{
  $sql = $dataviewing->dateviewing('daily',$startmonths[$i],$endmonths[$i],$name);
$totalcost2[$i]=0;
                while ($row=mysqli_fetch_array($sql)) {

      //                echo($row['cost']);
			// echo($row['name']);?>

<?php

			              $totalcost2[$i]=$totalcost2[$i]+$row['cost'];
}
//  echo('total');
//  echo($totalcost2[$i]);
// echo('<br>');
        }
?>
<?php
$sql = $dataviewing->take($name);
while($row = mysqli_fetch_array($sql)){
 ?>

<?php  $expenses= $row['expenses'];
$income=$row['income'];
// echo $expenses;
// echo $income;
?>
<?php }?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../CSS/report.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>NHDD | Dashboard </title>
    <header>
        <div class="logo__name">
            <img class="nhdd_logo" src="../Images/NHDD_logo.png" alt="NHDD logo">
            <button class="message" id="fetch__btn"><i class="material-icons" style="font-size:40px;color:white;"><span class="dot" id="dot__dis">&#8226;</span>email</i></button>
            <button class="message_1" onclick="alertHandler()" id="alert__btn"> <i class="material-icons" style="font-size:35px;color:white"><span class="dot_bell" id="dot__bell">&#8226;</span>add_alert</i></button>
            <button class="message"><a href="index.php"> <i class="fa fa-home" style="font-size:34px;color:white"></i></a>
            <button class="message"><a href="dashboard.php"><i style="font-size:34px;color:white" class="fa">&#xf0a8;</i></a></button>
        </div>
        <div id="quote__box">
            <h1 id="quote" ></h1>
            <h1 id="author"></h1>
        </div>
        <div id="alert__box">
            <h1 id="alert_msg"></h1>
            <h1 id="dev_detail"></h1>
        </div>
        <div id="alt__box">
            <h1 id="alt__msg">Check alert at the end of the month</h1>
            <h1 id="greet">Have a Nice day</h1>
        </div>
    </header>
</head>
<body>

<div class="loader__bg">
        <div class="loader"></div>
        </div>
    <section id="add__expense">
        <ul id="list"></ul>
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
        <button class="panel__item first__item" onclick="downloadInit()"><i class="fa fa-save  adjust__size"></i>  <a>Save Report</a></h1></button>
        <button class="panel__item first__item"><i class="fa fa-angle-double-up adjust__size"></i> <a href="Update.php">Update Profile</a></h1></button>
        </div>
        <div class ="user__inputarea">
        <div id="content">
         <hr />
         <h1 class="content__head">Report Analysis</h1>
        <div class="graph__holder">
        <div class="bar__chart__container">
            <canvas id="myChart"></canvas>
        </div>
        <div class="pie__chart__container">
            <canvas id="mypiechart"></canvas>
        </div>
        <div class="line__chart__container">
            <canvas id="mylinechart"></canvas>
        </div>
        <div class="credit__display">
            <h1 class="credit__head">Your credit score</h1>
            <h1 id="credit__score">&emsp;</h1>
            <div class="credit__holder">
            </div>
        </div>
         </div>
         </div>
         </div>
    </section>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script type="text/javascript" charset="utf-8">

   // const axios = require('axios')
    setTimeout(function(){
  $('.loader__bg').fadeToggle();
},1500);
class dropdown{
  constructor(){
    if(this.constructor === dropdown){
      throw new Error("you can't instantiate a object of abstract class")
    }
  }
  displayDropDown(dropdownEle,toggleClass){
    throw new Error("Abstract Method has no implementation");
  }

}
class viewExpDropdown extends dropdown{
  displayDropDown(dropdownEle,toggleClass){
  var check = document.getElementById(dropdownEle).classList.toggle(toggleClass);
  var dropdown_display = document.getElementById(dropdownEle);
  if(check)
  dropdown_display.style.display="block";
  else
  dropdown_display.style.display="none";
  }
}
var viewObj = new viewExpDropdown()
var ExpenseObj = new viewExpDropdown()
var ExpenseReportObj = new viewExpDropdown()
function viewingExp(){
  console.log("dsds")
  viewObj.displayDropDown("dropdown_vr","show");
}
function ExpenseDropdown() {
  ExpenseObj.displayDropDown("dropdown","show")

}
function ExpenseReportDropdown(){
  ExpenseReportObj.displayDropDown("dropdown_er","show");
}
var finalArray = []
var savingArray = []
var montharray =[]
   var occArray = []
  var dailyArray = []
  var prevAvg = 0;
  var score  = 0 ;
  var currMonth =0;


// for starting download of report
function downloadInit() {
  const input = document.getElementById('content');
  html2canvas(input).then((canvas) => {
    const imgData = canvas.toDataURL('image/png');
    console.log(imgData);
    const pdf = new jsPDF('landscape', 'cm', [27, 15]);
    pdf.addImage(imgData, 'JPEG', 0, 0);
    pdf.save('download.pdf');
  });
}


let fetch_btn = document.getElementById('fetch__btn');
fetch_btn.addEventListener('click', clickHandler);

var quoteArray = [];
var author = [];

function clickHandler() {
  let query_sign = document.getElementById('dot__dis');
  query_sign.style.display = 'none';
  let quote_box = document.getElementById('quote__box');
  var check = document.getElementById('quote__box').classList.toggle('dis');
  if (check) {
    quote_box.style.display = 'block';
  } else {
    quote_box.style.display = 'none';
  }
  var xhr = new XMLHttpRequest();
  let obj1 =  xhr.open('GET', 'https://nlok5923.github.io/RawQuotesData/quotes.json', true);
  console.log(obj1+"await")
  xhr.onload = function () {
    console.log(this.state);
    console.log(JSON.parse(this.responseText));
    object = JSON.parse(this.responseText);
    let randomNo = Math.floor(Math.random() * 26);
    object.map((data) => quoteArray.push(data.text));
    object.map((data) => author.push(data.author));
    let quote = document.getElementById('quote');
    quote.innerHTML = quoteArray[randomNo];
    let authorName = document.getElementById('author');
    authorName.innerHTML = author[randomNo];
  };
  xhr.send();
}
var deviation = 0;
 class alertMessage{
   constructor(month){
     this.month =  month;
     if (
    month === 1 ||
    month === 3 ||
    month === 5 ||
    month === 7 ||
    month === 8 ||
    month === 10 ||
    month === 12
   ){
     this.date = 31;
   }
   else if(month ===2){
     this.date = 28;
   }
    else{
     this.date = 30;
   }
  }
   checker(date){
     if(this.date ===date){
       return true;
     }else
     return false;
   }
   showMessage(deviation){
    // console.log("sdsd")
    console.log(deviation)
    deviation = deviation.toPrecision(5);
      let alert_msg = document.getElementById('alert_msg');
      let dev__detail = document.getElementById('dev_detail');
      if (deviation < 10) {
        alert_msg.innerHTML = 'You are doing well';
        dev__detail.innerHTML = `Deviation of almost ${deviation}% from average`;
      }
      if (deviation > 12 && deviation < 20) {
        alert_msg.innerHTML = 'There is some need to worry';
        dev__detail.innerHTML = `Deviation of almost ${deviation}% from average`;
      }
      if (deviation > 25 && deviation < 35) {
        alert_msg.innerHTML = 'There is serious need for attention';
        dev__detail.innerHTML = `Deviation of almost ${deviation}% from average`;
      }
      let alert_box = document.getElementById('alert__box');
      let check = document.getElementById('alert__box').classList.toggle('dis');
      if (check) {
        alert_box.style.display = 'block';
      } else {
        alert_box.style.display = 'none';
      }
   }
   checklater(){
    let alt_box = document.getElementById('alt__box');
      let check = document.getElementById('alt__box').classList.toggle('dis');
      if (check) {
        alt_box.style.display = 'block';
      } else {
        alt_box.style.display = 'none';
   }
   }
 }
 function alertHandler(){
    let todayDate = new Date();
    console.log("sd")

    let currenMonth = todayDate.getMonth();
    let alertObj = new  alertMessage(currenMonth);
    if(alertObj.checker(todayDate.getDate())){
      alertObj.showMessage(deviation);
    }
    else{
      alertObj.checklater();
    }
  }
  window.onload = function () {
  console.log(<?php echo json_encode($totalcost); ?>)
  console.log(<?php echo json_encode($totalcost1); ?>)
  console.log(<?php echo json_encode($totalcost2); ?>)
   montharray = <?php echo json_encode($totalcost); ?> ;
   occArray =  <?php echo json_encode($totalcost1); ?> ;
   dailyArray = <?php echo json_encode($totalcost2); ?> ;
  // console.log(montharray)
  // console.log(occArray)
  // console.log(dailyArray)
  //console.log(income+"income")
  console.log("ma"+montharray);
  console.log("oa"+occArray);
  console.log("da"+dailyArray);
var income =  Number(<?php echo $income; ?>)
console.log("incomenhai"+income)
for(let i=0;i<6;i++){
    finalArray.push(montharray[i]+occArray[i]+dailyArray[i])
    savingArray.push(income-(montharray[i]+occArray[i]+dailyArray[i]))
    prevAvg = prevAvg + montharray[i]+occArray[i]+dailyArray[i];
}
var pieSec1,pieSec2,pieSec3;
var total = montharray[0] + occArray[0] + dailyArray[0]
pieSec1 = (montharray[0]/total);
pieSec2 = (occArray[0]/total);
pieSec3 = (dailyArray[0]/total);
deviation = total/(prevAvg+total);
// console.log("prev"+prevAvg+"total"+total)
// console.log("deviation"+deviation);
deviation = deviation*100;
//console.log("deviation"+deviation);
//console.log(prevAvg)
prevAvg = prevAvg/6;
currMonth = montharray[0] + occArray[0] + dailyArray[0]
console.log(currMonth)
var frac = currMonth/(currMonth+prevAvg)
console.log("frac"+frac)
 score = frac
 console.log(score)
 score = 1-score;
 console.log(score)
 score = score*50;
 console.log(score)
var incscore = 25;// it will always remain 25 for those household who income don't vary for vast amount of time
console.log("credit_score"+score)
console.log(score)
score = score.toPrecision(5);
  let credit_set = document.getElementById('credit__score');
  credit_set.innerHTML = score;
  // console.log("hello")
  //to display notif dot over alert bell
  let todayDate = new Date();
  let currenMonth = todayDate.getMonth();
  if (
    currenMonth === 1 ||
    currenMonth === 3 ||
    currenMonth === 5 ||
    currenMonth === 7 ||
    currenMonth === 8 ||
    currenMonth === 10 ||
    currenMonth === 12
  ) {
    if (todayDate.getDate() === 31) {
      let dot__bell = document.getElementById('dot__bell');
      dot__bell.style.display = 'block';
    }
  } else if (currenMonth === 2) {
    if (todayDate.getDate() === 28) {
      let dot__bell = document.getElementById('dot__bell');
      dot__bell.style.display = 'block';
    }
  } else {
    if (todayDate.getDate() === 30) {
      let dot__bell = document.getElementById('dot__bell');
      dot__bell.style.display = 'block';
    }
  }
  // let alert__btn = document.getElementById('alert__btn');
  // alert__btn.addEventListener('click', alertHandler);
  function titleConfig(text, dis, size, color, font) {
  this.text = text;
  this.display = dis;
  this.fontSize = size;
  this.fontColor = color;
  this.fontFamily = font;
}
function tickConfig(stepSize, size, font, begin, color) {
  this.stepSize = stepSize;
  this.fontSize = size;
  this.beginAtZero = begin;
  this.fontFamily = font;
  this.fontColor = color;
}
// $(document).ready(function displayGraph(){

let mychart = document.getElementById('myChart').getContext('2d');

function dataConfig(
  borderColor,
  borderWidth,
  hoverBorderWidth,
  hoverBorderColor,
  fill,
  fontColor,
  label
) {
  this.borderColor = borderColor;
  this.borderWidth = borderWidth;
  this.hoverBorderColor = hoverBorderColor;
  this.hoverBorderWidth = hoverBorderWidth;
  this.fill = fill;
  this.fontColor = fontColor;
  this.label = label;
}
function barDataConfig(
  borderColor,
  borderWidth,
  hoverBorderWidth,
  hoverBorderColor,
  fill,
  fontColor,
  label
) {
  dataConfig.call(
    this,
    borderColor,
    borderWidth,
    hoverBorderWidth,
    hoverBorderColor,
    fill,
    fontColor,
    label
  );
  this.data = finalArray;
  this.backgroundColor = [
    '#01c5c4',
    '#01c5c4',
    '#01c5c4',
    '#01c5c4',
    '#01c5c4',
    '#01c5c4',
  ];
}
function pieDataConfig(
  borderColor,
  borderWidth,
  hoverBorderWidth,
  hoverBorderColor,
  fill,
  fontColor,
  label
) {
  dataConfig.call(
    this,
    borderColor,
    borderWidth,
    hoverBorderWidth,
    hoverBorderColor,
    fill,
    fontColor,
    label
  );
  this.data = [pieSec1,pieSec2,pieSec3];
  this.backgroundColor = ['#feca57', '#ff6b6b', '#48dbfb',];
}

function lineDataConfig(
  borderColor,
  borderWidth,
  hoverBorderWidth,
  hoverBorderColor,
  fill,
  fontColor,
  label
) {
  dataConfig.call(
    this,
    borderColor,
    borderWidth,
    hoverBorderWidth,
    hoverBorderColor,
    fill,
    fontColor,
    label
  );
  this.data = savingArray;
  this.pointBackgroundColor = '#55bae7';
  this.pointBorderColor = '#55bae7';
  this.pointHoverBackgroundColor = '#55bae7';
  this.pointHoverBorderColor = '#55bae7';
}

let lineDataConfiguration = new lineDataConfig(
  'grey',
  5,
  3,
  'yellow',
  false,
  'white',
  'Expenditure'
);
let lineData = [lineDataConfiguration];
let pieDataConfiguration = new pieDataConfig(
  'white',
  2,
  3,
  'yellow',
  false,
  'white',
  'Expenditure'
);
let pieData = [pieDataConfiguration];

let barData = new barDataConfig(
  'grey',
  1,
  3,
  'white',
  'none',
  'white',
  'Expenditure'
);
let barNew = [barData];
console.log(barNew);

try {
  let massPopChart = new Chart(mychart, {
    type: 'bar', //bar, pie, horizontal , line, donuts , radar, polararea
    data: {
      labels: [
        'Month-1',
        'Month-2',
        'Month-3',
        'Month-4',
        'Month-5',
        'Month-6',
      ],
      datasets: barNew,
    },
    options: {
      title: new titleConfig(
        'Expenditure of last 6 months',
        true,
        24,
        'white',
        'montserrat'
      ),
      legend: {
        display: false,
        position: 'bottom',
        labels: {
          fontColor: 'white',
        },
      },
      scales: {
        yAxes: [
          {
            gridLines: {
              color: '#FFFFFF',
            },
            ticks: new tickConfig(500, 14, 'montserrat', true, 'white'),
          },
        ],
        xAxes: [
          {
            gridLines: {
              color: '#FFFFFF',
            },
            ticks: new tickConfig(1, 14, 'montserrat', true, 'white'),
          },
        ],
      },
      layout: {
        width: 100,
        height: 100,
      },
      tooltips: {
        enabled: true,
      },
      responsive: true,
    },
  });
} catch (err) {
  console.log(`Wrong configuration detected ${err}`);
  alert(`Something wrong happended ${err}`);
}

try {
  let mypiechart = document.getElementById('mypiechart').getContext('2d');
  let massPopChartarea = new Chart(mypiechart, {
    type: 'pie', //bar, pie, horizontal , line, donuts , radar, polararea
    data: {
      labels: ['Month-1', 'Month-2', 'Month-3', 'Month-4'],
      datasets: pieData,
    },
    options: {
      title: new titleConfig(
        'Sections of Expenditure',
        true,
        24,
        'white',
        'montserrat'
      ),
      legend: {
        display: false,
        position: 'right',
        labels: {
          fontColor: 'black',
        },
      },
      layout: {
        width: 100,
        height: 100,
      },
      tooltips: {
        enabled: true,
      },
      responsive: true,
    },
  });
} catch (err) {
  console.log(`Wrong configuration detected ${err}`);
  alert(`Something wrong happended ${err}`);
}

try {
  let mylinechart = document.getElementById('mylinechart').getContext('2d');
  let massPopChartarealine = new Chart(mylinechart, {
    type: 'line', //bar, pie, horizontal , line, donuts , radar, polararea
    data: {
      labels: [
        'Month-1',
        'Month-2',
        'Month-3',
        'Month-4',
        'Month-5',
        'Month-6',
      ],
      datasets: lineData,
    },
    options: {
      title: new titleConfig(
        'Savings of last 6 months',
        true,
        24,
        'white',
        'montserrat'
      ),
      legend: {
        display: false,
        position: 'right',
        labels: {
          fontColor: 'black',
        },
      },
      layout: {
        width: 100,
        height: 100,
      },
      scales: {
        yAxes: [
          {
            gridLines: {
              color: '#FFFFFF',
            },
            ticks: new tickConfig(500, 14, 'montserrat', true, 'white'),
          },
        ],
        xAxes: [
          {
            gridLines: {
              color: '#FFFFFF',
            },
            ticks: new tickConfig(1, 14, 'montserrat', true, 'white'),
          },
        ],
      },
      tooltips: {
        enabled: true,
      },
      responsive: true,
    },
  });
} catch (err) {
  console.log(`Wrong configuration detected ${err}`);
  alert(`Something wrong happended ${err}`);
}
console.log("hey");
//});
};
</script>
</html>

