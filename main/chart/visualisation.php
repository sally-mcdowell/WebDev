<?php
include "../navigation.php";
?> 

<!doctype html>
<html lang="en">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déjà Mood</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css"> 
<style>

    .chartCard {
 
      background: white;
      display: flex;
      align-items: left;
      justify-content: left;
    }
 
    .chartBox {
      width: 100%;
      padding: 20px;
      border-radius: 20px;
      border: solid 3px rgba(54, 162, 235, 1);
      background: white;
    }
  </style>
</head>

<body class="has-background-info"> 
<div class="container py-5 px-2">
  <div class="notification is-white">
  <h1 class="title is-1">Mood history</h1>
  <h4 class="subtitle is-4">View a summary of all moods logged, or select a month using the date filter below</h4>
  <div class="chartCard">
    <div class="chartBox">
      <canvas id="moodChart"></canvas>
      <input type="month" id="moodDatePicker" onchange="filterChartDateButton(userMoodLogs, this)">
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

  <script type="module">
    
    let moodChart;
    
    // retrieve data
    async function apiData() {
      const sessId = <?php echo "{$_SESSION['userid']}" ?>;

      const endpoint = "http://localhost/dejamood/api/apichart.php?userid=";
      const userid = sessId
      const apiLink = endpoint.concat(userid);

      const response = await fetch(apiLink)
      const userMoodLogs = await response.json()

      return userMoodLogs;
    }

    // global
    window.userMoodLogs = await apiData(); 

// Takes user mood logs array and returns an array of all entries "isWithinMonth"
function filterMoodsByDate(userMoodLogs, inputMonth, inputYear) {
  return userMoodLogs.filter(mood => isWithinMonth(inputMonth, inputYear, mood.date_time));
}

// Returns boolean to check if mood date matches input date
function isWithinMonth(inputMonth, inputYear, moodDateTime) {
  const moodYear = moodDateTime.substring(0,4);
  const moodMonth = moodDateTime.substring(5,7);
  
  return Boolean(moodMonth == inputMonth && moodYear == inputYear);
}
// getting the distinct mood names 
function moodCount (userMoodLogs) {
  const moodNamesArray = userMoodLogs.map(mood => mood.mood_name);
  // array of unique values
  const distinctMoods = [...new Set(moodNamesArray)];

  let moodObj = {};

    // for each distinct mood make a new filtered array if the original moods match the distinct mood
    // and then record the length 
  distinctMoods.forEach(mood => {
    //  makes an array of all the entries in the original datapoints array
    moodObj[mood] = moodNamesArray.filter(moodName => moodName === mood).length;
  });
  
  return moodObj;
  }
  
  // will have all the distinct moods and their count
  const filteredMoodCount = moodCount(userMoodLogs);

  var xValues = Object.keys(filteredMoodCount); // array of the objects key (mood names)
  var yValues = Object.values(filteredMoodCount); // array of the objects values (mood counts)

  // creating the chart
moodChart = createChart(xValues, yValues);

function createChart(moods, moodCount) {
  let ctx = document.getElementById("moodChart");

  let moodChart = new Chart(ctx, {
    type: "pie",
    data: {
      labels: moods,
      datasets: [
        {
          backgroundColor: [
            "#4d4843",
            "#03a0e7",
            "#f8c6c7",
            "#ffcb60",
            "#ee5183",
            "#0168bd",
            "#764c4b",
            "#ec6000",
          ],
          data: moodCount,
        },
      ],
    },
  });

  return moodChart; // return chart object
}

// recreating the chart when the date form is submitted
window.filterChartDateButton = function filterChartDateButton(userMoodLogs, inputDate) {
  //destructuring javascript object
  const {inputYear, inputMonth} = parsedInputDate(inputDate);

const filteredMoods = filterMoodsByDate(userMoodLogs, inputMonth, inputYear);
const filteredMoodCount = moodCount(filteredMoods);
  moodChart.destroy(); //destroy before loading new data
  const xValues = Object.keys(filteredMoodCount); // array Object keys
  const yValues = Object.values(filteredMoodCount); //array Object values
    moodChart = createChart(xValues, yValues);
}

 // return month and year values from input date
 window.parsedInputDate = function parsedInputDate(date){
     const inputYear = date.value.substring(0,4);
     const inputMonth = date.value.substring(5,7);
      
     return {
      inputYear, // "inputYear: inputYear"
      inputMonth
     }
  }

  </script>
 

</body>

</html>









    

   



            


