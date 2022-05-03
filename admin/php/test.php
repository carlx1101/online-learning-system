<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<canvas  id = "users">
        

</canvas>   


<script>


new Chart(document.getElementById("users"), {
    type: 'bar',
    data: {
      labels: ["Learner", "Tutor", "Administrator"],
      datasets: [
        {
          label: "Disable",
          backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(255, 159, 64, 0.2)'],
          data: [num_course_data,blog_data, 10]
       

        }

      ]
    },

    
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Predicted world population (millions) in 2050'
      }
    }
});
</script>
</body>
</html>