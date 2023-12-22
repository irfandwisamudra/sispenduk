<?php
function fetchGenderChartData($koneksi)
{
  $chartData = [];
  $result = $koneksi->query("SELECT jekel, COUNT(*) as total FROM tb_datang GROUP BY jekel");
  $colors = generateRandomColor($result->num_rows);

  while ($row = $result->fetch_assoc()) {
    $chartData[] = [
      'label' => $row['jekel'],
      'count' => $row['total'],
      'color' => array_shift($colors),
    ];
  }

  return $chartData;
}

function fetchArrivalDateChartData($koneksi)
{
  $chartData = [];
  $result = $koneksi->query("SELECT tgl_datang, COUNT(*) as total FROM tb_datang GROUP BY tgl_datang");
  $colors = generateRandomColor($result->num_rows);

  while ($row = $result->fetch_assoc()) {
    $chartData[] = [
      'label' => $row['tgl_datang'],
      'count' => $row['total'],
      'color' => array_shift($colors),
    ];
  }

  return $chartData;
}

function generateRandomColor($count)
{
  $colors = [];
  for ($i = 0; $i < $count; $i++) {
    $colors[] = '#' . substr(md5(rand()), 0, 6);
  }
  return $colors;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Datang</title>
  <style>
    .grid-container {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 20px;
    }

    .chart-container {
      border: 1px solid #ccc;
      padding: 10px;
      border-radius: 8px;
      height: 500px;
    }

    .chart-container canvas {
      max-height: 400px;
    }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

  <div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">
        <i class="fa fa-table"></i> Report Data Pendatang
      </h3>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
      <div class="grid-container">

        <!-- Gender Chart -->
        <div class="chart-container">
          <h2>Gender Chart</h2>
          <canvas id="genderChart"></canvas>
        </div>

        <!-- Arrival Date Chart -->
        <div class="chart-container">
          <h2>Arrival Date Chart</h2>
          <canvas id="arrivalDateChart"></canvas>
        </div>

      </div>

      <?php
      // Gender Chart
      $genderData = fetchGenderChartData($koneksi);
      ?>

      <script>
        document.addEventListener("DOMContentLoaded", function() {
          var genderData = <?php echo json_encode($genderData); ?>;

          var genderLabels = genderData.map(item => item.label);
          var genderCounts = genderData.map(item => item.count);
          var genderColors = genderData.map(item => item.color);

          var genderDataConfig = {
            labels: genderLabels,
            datasets: [{
              data: genderCounts,
              backgroundColor: genderColors,
            }],
          };

          var ctx = document.getElementById('genderChart').getContext('2d');
          var myChart = new Chart(ctx, {
            type: 'pie',
            data: genderDataConfig,
            options: {
              responsive: true,
              maintainAspectRatio: false,
            },
          });
        });
      </script>

      <?php
      // Arrival Date Chart
      $arrivalDateData = fetchArrivalDateChartData($koneksi);
      ?>

      <script>
        document.addEventListener("DOMContentLoaded", function() {
          var arrivalDateData = <?php echo json_encode($arrivalDateData); ?>;

          var arrivalDateLabels = arrivalDateData.map(item => item.label);
          var arrivalDateCounts = arrivalDateData.map(item => item.count);
          var arrivalDateColors = arrivalDateData.map(item => item.color);

          var arrivalDateDataConfig = {
            labels: arrivalDateLabels,
            datasets: [{
              label: 'Number of Arrivals',
              data: arrivalDateCounts,
              borderColor: '#3498db',
              backgroundColor: arrivalDateColors,
              borderWidth: 2,
              fill: true,
            }],
          };

          var ctx = document.getElementById('arrivalDateChart').getContext('2d');
          var myChart = new Chart(ctx, {
            type: 'line',
            data: arrivalDateDataConfig,
            options: {
              responsive: true,
              maintainAspectRatio: false,
            },
          });
        });
      </script>
    </div>
  </div>

</body>

</html>