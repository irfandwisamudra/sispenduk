<?php
function fetchTglLhChartData($koneksi)
{
  $chartData = [];
  $result = $koneksi->query("SELECT tgl_lh, COUNT(*) as total FROM tb_lahir GROUP BY tgl_lh");
  $colors = generateRandomColor($result->num_rows);

  while ($row = $result->fetch_assoc()) {
    $chartData[] = [
      'label' => $row['tgl_lh'],
      'count' => $row['total'],
      'color' => array_shift($colors),
    ];
  }

  return $chartData;
}

function fetchJekelChartData($koneksi)
{
  $chartData = [];
  $result = $koneksi->query("SELECT jekel, COUNT(*) as total FROM tb_lahir GROUP BY jekel");
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
  <title>Data Kelahiran</title>
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
        <i class="fa fa-table"></i> Report Data Kelahiran
      </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

      <div class="grid-container">

        <!-- Tgl Lh Chart -->
        <div class="chart-container">
          <h2>Tanggal Lahir Chart</h2>
          <canvas id="tglLhChart"></canvas>
        </div>

        <!-- Jekel Chart -->
        <div class="chart-container">
          <h2>Jenis Kelamin Chart</h2>
          <canvas id="jekelChart"></canvas>
        </div>

      </div>

      <?php
      // Tgl Lh Chart
      $tglLhChartData = fetchTglLhChartData($koneksi);
      ?>

      <script>
        document.addEventListener("DOMContentLoaded", function() {
          var tglLhChartData = <?php echo json_encode($tglLhChartData); ?>;

          var tglLhLabels = tglLhChartData.map(item => item.label);
          var tglLhCounts = tglLhChartData.map(item => item.count);
          var tglLhColors = tglLhChartData.map(item => item.color);

          var tglLhDataConfig = {
            labels: tglLhLabels,
            datasets: [{
              label: 'Number of Births',
              data: tglLhCounts,
              borderColor: tglLhColors[0],
              fill: false,
            }],
          };

          var ctx = document.getElementById('tglLhChart').getContext('2d');
          var myChart = new Chart(ctx, {
            type: 'line',
            data: tglLhDataConfig,
            options: {
              responsive: true,
              maintainAspectRatio: false,
            },
          });
        });
      </script>

      <?php
      // Jekel Chart
      $jekelChartData = fetchJekelChartData($koneksi);
      ?>

      <script>
        document.addEventListener("DOMContentLoaded", function() {
          var jekelChartData = <?php echo json_encode($jekelChartData); ?>;

          var jekelLabels = jekelChartData.map(item => item.label);
          var jekelCounts = jekelChartData.map(item => item.count);
          var jekelColors = jekelChartData.map(item => item.color);

          var jekelDataConfig = {
            labels: jekelLabels,
            datasets: [{
              data: jekelCounts,
              backgroundColor: jekelColors,
            }],
          };

          var ctx = document.getElementById('jekelChart').getContext('2d');
          var myChart = new Chart(ctx, {
            type: 'pie',
            data: jekelDataConfig,
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