//jshint:version:ES6
window.onload = function () {
  let credit_set = document.getElementById('credit__score');
  credit_set.innerHTML = 98.32;
  // console.log("hello")
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
    if (todayDate.getDate() === 30) {
      let dot__bell = document.getElementById('dot__bell');
      dot__bell.style.display = 'block';
    }
  } else {
    if (todayDate.getDate() === 28) {
      let dot__bell = document.getElementById('dot__bell');
      dot__bell.style.display = 'block';
    }
  }
  let alert__btn = document.getElementById('alert__btn');
  alert__btn.addEventListener('click', alertHandler);
};

function alertHandler() {
  let todayDate = new Date();
  let currenMonth = todayDate.getMonth();
  //deviation will be the calculated percentage
  let deviation = 18;
  // 31 days wale month niche
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
      dot__bell.style.display = 'none';
      console.log('i click');
      let alert_box = document.getElementById('alert__box');
      let check = document.getElementById('alert__box').classList.toggle('dis');
      if (check) {
        alert_box.style.display = 'block';
      } else {
        alert_box.style.display = 'none';
      }
      let alert_msg = document.getElementById('alert__msg');
      let dev__detail = document.getElementById('dev__detail');
      //  alert_msg.innerHTML = ""
      if (deviation > 7 && deviation < 10) {
        alert_msg.innerHTML = 'You are doing well';
        dev__detail.innerHTML = 'Deviation of almost 7% from average';
      }
      if (deviation > 12 && deviation < 20) {
        alert_msg.innerHTML = 'There is some need to worry';
        dev__detail.innerHTML = 'Deviation of almost 14% from average';
      }
      if (deviation > 25 && deviation < 35) {
        alert_msg.innerHTML = 'There is serious need for attention';
        dev__detail.innerHTML = 'Deviation of almost 30% from average';
      }
    } else {
      let alt_box = document.getElementById('alt__box');
      let check = document.getElementById('alt__box').classList.toggle('dis');
      if (check) {
        alt_box.style.display = 'block';
      } else {
        alt_box.style.display = 'none';
      }
    }
  } else if (currenMonth === 2) {
    if (todayDate.getDate() === 30) {
      let dot__bell = document.getElementById('dot__bell');
      dot__bell.style.display = 'block';
      let alert_box = document.getElementById('alert__box');
      let check = document.getElementById('alert__box').classList.toggle('dis');
      if (check) {
        alert_box.style.display = 'block';
      } else {
        alert_box.style.display = 'none';
      }
      let alert_msg = document.getElementById('alert__msg');
      let dev__detail = document.getElementById('dev__detail');
      //  alert_msg.innerHTML = ""
      if (deviation > 7 && deviation < 10) {
        alert_msg.innerHTML = 'You are doing well';
        dev__detail.innerHTML = 'Deviation of almost 7% from average';
      }
      if (deviation > 12 && deviation < 20) {
        alert_msg.innerHTML = 'There is some need to worry';
        dev__detail.innerHTML = 'Deviation of almost 14% from average';
      }
      if (deviation > 25 && deviation < 35) {
        alert_msg.innerHTML = 'There is serious need for attention';
        dev__detail.innerHTML = 'Deviation of almost 30% from average';
      }
    } else {
      let alt_box = document.getElementById('alt__box');
      let check = document.getElementById('alt__box').classList.toggle('dis');
      if (check) {
        alt_box.style.display = 'block';
      } else {
        alt_box.style.display = 'none';
      }
    }
  } else {
    if (todayDate.getDate() === 28) {
      let dot__bell = document.getElementById('dot__bell');
      dot__bell.style.display = 'block';
      let alert_box = document.getElementById('alert__box');
      let check = document.getElementById('alert__box').classList.toggle('dis');
      if (check) {
        alert_box.style.display = 'block';
      } else {
        alert_box.style.display = 'none';
      }
      let alert_msg = document.getElementById('alert__msg');
      let dev__detail = document.getElementById('dev__detail');
      //  alert_msg.innerHTML = ""
      if (deviation > 7 && deviation < 10) {
        alert_msg.innerHTML = 'You are doing well';
        dev__detail.innerHTML = 'Deviation of almost 7% from average';
      }
      if (deviation > 12 && deviation < 20) {
        alert_msg.innerHTML = 'There is some need to worry';
        dev__detail.innerHTML = 'Deviation of almost 14% from average';
      }
      if (deviation > 25 && deviation < 35) {
        alert_msg.innerHTML = 'There is serious need for attention';
        dev__detail.innerHTML = 'Deviation of almost 30% from average';
      }
    } else {
      let alt_box = document.getElementById('alt__box');
      let check = document.getElementById('alt__box').classList.toggle('dis');
      if (check) {
        alt_box.style.display = 'block';
      } else {
        alt_box.style.display = 'none';
      }
    }
  }
}

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
  var TOKEN = 'ANMFGFDGBWLFJPVIHLUGNDK7TURBA';
  console.log('Evet treiger');
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'https://nlok5923.github.io/RawQuotesData/quotes.json', true);

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
  this.data = [1000, 2000, 3000, 2000, 1000, 4000];
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
  this.data = [0.2, 0.3, 0.4, 0.1];
  this.backgroundColor = ['#feca57', '#ff6b6b', '#48dbfb', '#1dd1a1'];
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
  this.data = [1000, 2000, 3000, 3000, 1000, 2000];
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
