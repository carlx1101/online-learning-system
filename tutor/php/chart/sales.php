<?php
require "includes/start_session.php";
require "includes/connection.php";


?>  

<!-- Dashboard 1 -->
<?php 
$account_id = $_SESSION['account_id'];

// $query = sprintf("SELECT COUNT(payment_id) AS sales, MONTHNAME(date_purchased) AS MonthName FROM payment GROUP BY MonthName  ORDER BY date_purchased;");
$query = sprintf("SELECT COUNT(payment_id) AS sales, MONTHNAME(date_purchased) AS MonthName FROM payment WHERE account_id = '$account_id' GROUP BY MonthName ORDER BY date_purchased;");
$records=mysqli_query($conn,$query);

$sales_data = array();
foreach($records as $row)
{
    $row=$row["sales"];
    $sales_data[]=$row;
}

// to display array 
// foreach( $sales_data as $var ) {
//     echo "$var";
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Document</title>
</head>
<body>
    <div>
        <canvas id="sales_growth"></canvas>
      </div>

      <!-- <script>
        const labels = [
          'January',
          'February',
          'March',
          'April',
          'May',
          'June',
          'July',
          'August',
          'September',
          'October',
          'November',
          'December'
        ];
      
        const data = {
          labels: labels,
          datasets: [{
            label: 'Sales 2021',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45,67,44,33,88,13],
          }]
        };
      
        const config = {
          type: 'line',
          data: data,
          options: {}
        };
        
      </script>

    <script>
        const myChart = new Chart(
        document.getElementById('sales_growth'),
        config
        );
    </script> -->
        
    <script>

const sales_2022 = <?php echo json_encode($sales_data);?>;

new Chart(document.getElementById("sales_growth"), {
  type: 'line',
  data: {
    labels:  [
          'January',
          'February',
          'March',
          'April',
          'May',
          'June',
          'July',
          'August',
          'September',
          'October',
          'November',
          'December'
        ],
    datasets: [{ 
        data: [2, 10, 5, 2, 20, 30, 45,67,44,33,88,13],
        label: 'Sales 2021',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        fill: false
      }, { 
        data: sales_2022 ,
        label: 'Sales 2021',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        fill: false
      }, 
    ]
  },
  options: {
    title: {
      display: true,
      text: 'World population per region (in millions)'
    }
  }
});
    </script>

    
</body>
</html>