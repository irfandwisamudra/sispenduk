<?php
function fetchTglMenduChartData($koneksi)
{
  $chartData = [];
  $result = $koneksi->query("SELECT tgl_mendu, COUNT(*) as total FROM tb_mendu GROUP BY tgl_mendu");
  $colors = generateRandomColor($result->num_rows);

  while ($row = $result->fetch_assoc()) {
    $chartData[] = [
      'label' => $row['tgl_mendu'],
      'count' => $row['total'],
      'color' => array_shift($colors),
    ];
  }

  return $chartData;
}

function fetchJekelChartData($koneksi)
{
  $chartData = [];
  $result = $koneksi->query("SELECT jekel, COUNT(*) as total FROM tb_pdd INNER JOIN tb_mendu ON tb_pdd.id_pend = tb_mendu.id_pdd GROUP BY jekel");
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
  <title>Data Meninggal Dunia</title>
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
        <i class="fa fa-table"></i> Report Data Meninggal Dunia
      </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

      <div class="grid-container">

        <!-- Tgl Mendu Chart -->
        <div class="chart-container">
          <h2>Tanggal Meninggal Dunia Chart</h2>
          <canvas id="tglMenduChart"></canvas>
        </div>

        <!-- Jekel Chart -->
        <div class="chart-container">
          <h2>Jenis Kelamin Chart</h2>
          <canvas id="jekelChart"></canvas>
        </div>

      </div>

      <?php
      // Tgl Mendu Chart
      $tglMenduChartData = fetchTglMenduChartData($koneksi);
      ?>

      <script>
        document.addEventListener("DOMContentLoaded", function() {
          var tglMenduChartData = <?php echo json_encode($tglMenduChartData); ?>;

          var tglMenduLabels = tglMenduChartData.map(item => item.label);
          var tglMenduCounts = tglMenduChartData.map(item => item.count);
          var tglMenduColors = tglMenduChartData.map(item => item.color);

          var tglMenduDataConfig = {
            labels: tglMenduLabels,
            datasets: [{
              label: 'Number of Mendu',
              data: tglMenduCounts,
              borderColor: tglMenduColors[0],
              fill: false,
            }],
          };

          var ctx = document.getElementById('tglMenduChart').getContext('2d');
          var myChart = new Chart(ctx, {
            type: 'line',
            data: tglMenduDataConfig,
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