<?php
include('pdo1.php');
session_start();
$name=$_SESSION['name'];
$t=time();

$p=date("m",$t);
error_reporting(0);
?>
<?php
for ($i = 0; $i <= 6; $i++)
{
   $startmonths[] = date("Y-m-d",strtotime( date( 'Y-m-01' )." -$i months"));
}
for ($i = 0; $i <= 6; $i++)
{
   $endmonths[] = date("Y-m-d", strtotime( date( 'Y-m-30' )." -$i months"));
}
$dataviewing=new Database_Connection();
$totalcost=array(0,0,0,0,0,0);
for($i=0;$i<=6;$i++)
{
  $sql = $dataviewing->dateviewing('Occasional',$startmonths[$i],$endmonths[$i], $name );
$totalcost[$i]=0;
                while ($row=mysqli_fetch_array($sql)) {
?>

<?php
  // totalcost[0] stores sum of occasional expense of current month
  //simlarly totalcost[1] stores is sum of occasional expense of previous month
  $totalcost[$i]=$totalcost[$i]+$row['cost'];
}

                    }
$totalcost1=array(0,0,0,0,0,0);
for($i=0;$i<=6;$i++)
{
  $sql = $dataviewing->dateviewing('monthly',$startmonths[$i],$endmonths[$i],$name);
$totalcost1[$i]=0;
                while ($row=mysqli_fetch_array($sql)) {
?>

<?php
                 // totalcost1[0] stores is sum of monthly expense of current month
                 //simlarly totalcost1[1] stores is sum of montly expense of previous month
			              $totalcost1[$i]=$totalcost1[$i]+$row['cost'];
}

                    }
$dataviewing=new Database_Connection();
$totalcost2=array(0,0,0,0,0,0);
for($i=0;$i<=6;$i++)
{
  $sql = $dataviewing->dateviewing('daily',$startmonths[$i],$endmonths[$i],$name);
$totalcost2[$i]=0;
                while ($row=mysqli_fetch_array($sql)) {

                 ?>

<?php
                 // totalcost2[0] stores in sum of daily expense of current month
                 //simlarly totalcost2[1] stores is sum of daily expense of previous month
			              $totalcost2[$i]=$totalcost2[$i]+$row['cost'];
}
        }
?>
<?php
$sql = $dataviewing->take($name);
while($row = mysqli_fetch_array($sql)){
 ?>

<?php  $expenses= $row['expenses'];
$income=$row['income'];
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
    setTimeout(function(){
    $('.loader__bg').fadeToggle();
     },1500);
//dropdown abstract class to maintain the dropdown functionality
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
//subclass of dropdown abstract class which implements the displayDropDown method for dropdown functionality
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
//various objects of different dropdown buttons for proper functioning
var viewObj = new viewExpDropdown()
var ExpenseObj = new viewExpDropdown()
var ExpenseReportObj = new viewExpDropdown()
//calling methods via objects
function viewingExp(){
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
//handles click on quotes button
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
  //xml request get quotes hosted on github report "RawQuotesData" and display it in random manner
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
//alert message class which handles the display of alert message based of current day date
 class alertMessage{
   //constructor which initilizes object with last date of current month
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
  //method to check if date passed is the last date of month or not
   checker(date){
     if(this.date ===date){
       return true;
     }else
     return false;
   }
   //method to show deviation of currentmonth expenditure it always called after checker() method returns true to the call
   showMessage(deviation){
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
   //method to display alertbox which proclaims to check the alert at the month end. this method get excecuted when checklater return with false
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
 //this function get called when user click alert button on dashboard
 function alertHandler(){
    let todayDate = new Date();
    //get current month
    let currenMonth = todayDate.getMonth();
    // init obj with current month and last date of current month
    let alertObj = new  alertMessage(currenMonth);
                      // passes todays date to check the if today is the end day of the month/
    if(alertObj.checker(todayDate.getDate())){
      alertObj.showMessage(deviation);
    }
    else{
      alertObj.checklater();
    }
  }
  //function executes when window onload to display figure like bar,line,pie chart etc
  window.onload = function () {
    //copying array
  occArray = <?php echo json_encode($totalcost); ?> ;
  montharray =  <?php echo json_encode($totalcost1); ?> ;
  dailyArray = <?php echo json_encode($totalcost2); ?> ;
  //Getting users income for proper analysis
var income =  Number(<?php echo $income; ?>)
for(let i=0;i<6;i++){
    finalArray.push(montharray[i]+occArray[i]+dailyArray[i])
    savingArray.push(income-(montharray[i]+occArray[i]+dailyArray[i]))
    prevAvg = prevAvg + montharray[i]+occArray[i]+dailyArray[i];
}
var pieSec1,pieSec2,pieSec3;
//total contains expenditure of current month
var total = montharray[0] + occArray[0] + dailyArray[0]
//different sections of pie chart
pieSec1 = (montharray[0]/total);
pieSec2 = (occArray[0]/total);
pieSec3 = (dailyArray[0]/total);
prevAvg = prevAvg/6;
//calculating expenditure deviation figure which get displayed in the alert message
deviation = total/(prevAvg+total);
deviation = deviation*100;
currMonth = montharray[0] + occArray[0] + dailyArray[0]
console.log(currMonth)
//calculating credit score
var frac = currMonth/(currMonth+prevAvg)
console.log("frac"+frac)
 score = frac
 score = 1-score;
 // to get it as an overall figure with the scale of 100
 score = score*50;
 score = score.toPrecision(3);
 console.log(score);
 var finalScore;
 if(score === 16.7){
   finalScore =5;
 }
 else if(score === 33.3){
   finalScore = 45;
 }
 else if(score>16.7 && score < 33.3){
   console.log("yeah")
   finalScore = 2.41*(score - 16.7)+5;
 }
 else if(score > 33.3 && score < 40){
   score = 0.6*(score - 33.3)+40;
 }
 else if(score ===40){
   finalScore = 49;
 }
 else if(score > 40){
   finalScore = 50;
 }
 else{
   finalScore = 0.3*score;
 }
  // it will always remain 25 for those household who income don't vary for vast amount of time
var incscore = 25;
finalScore = incscore+ finalScore;
  let credit_set = document.getElementById('credit__score');
  finalScore = finalScore.toPrecision(5);
  credit_set.innerHTML = finalScore;
  //to display notif dot over alert bell on the last date of month
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
  //handling title configuration for different charts
  function titleConfig(text, dis, size, color, font) {
  this.text = text;
  this.display = dis;
  this.fontSize = size;
  this.fontColor = color;
  this.fontFamily = font;
}
 //handling tick configuration for different charts
function tickConfig(stepSize, size, font, begin, color) {
  this.stepSize = stepSize;
  this.fontSize = size;
  this.beginAtZero = begin;
  this.fontFamily = font;
  this.fontColor = color;
}
let mychart = document.getElementById('myChart').getContext('2d');
// handling the configuration for display of data in different graphs
//parent function
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
//bar dataConfing inheriting dataConfing function for getting proper data configuration for displaying bar graph
//child function
function barDataConfig(
  borderColor,
  borderWidth,
  hoverBorderWidth,
  hoverBorderColor,
  fill,
  fontColor,
  label
) {
  //calling parent function
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
//pieDataConfing inheriting dataConfing function for getting proper data configuration for displaying pie chart
//child function
function pieDataConfig(
  borderColor,
  borderWidth,
  hoverBorderWidth,
  hoverBorderColor,
  fill,
  fontColor,
  label
) {
  //calling the parent function
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
//lineDataConfing inheriting dataConfing function for getting proper data configuration for displaying line graph
//child function
function lineDataConfig(
  borderColor,
  borderWidth,
  hoverBorderWidth,
  hoverBorderColor,
  fill,
  fontColor,
  label
) {
  //parent function
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
//setting configuration for different charts and graph by making there objects
//setting linegraph config object
let lineDataConfiguration = new lineDataConfig(
  'grey',
  5,
  3,
  'yellow',
  false,
  'white',
  'Expenditure'
);
//making an object array of object lineDataConfiguration to pass it as a dataset
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
//making an object array of object pieDataConfiguration to pass it as a dataset
//doing similarly for bar chart data
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
  //main object of function chart which is responsible for setting all configuration of bar graph and displaying it. it inculcates user of all
  //inherting functions showned above by making there objects
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
  //main object of function chart which is responsible for setting all configuration of pie chart and displaying it. it inculcates use of all
  //inheriting/non inheriting functions showned above by making there objects
try {
  let mypiechart = document.getElementById('mypiechart').getContext('2d');
  let massPopChartarea = new Chart(mypiechart, {
    type: 'pie', //bar, pie, horizontal , line, donuts , radar, polararea
    data: {
      labels: ['Monthly Expenditure', 'Occasional Expenditure', 'Daily Expenditure'],
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
 //main object of function chart which is responsible for setting all configuration of line graph and displaying it. it inculcates use of all
  //inheriting/non inheriting functions showned above by making there objects
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
};
</script>
</html>

