<?php
function fetchRTChartData($koneksi)
{
  $chartData = [];
  $result = $koneksi->query("SELECT rt, COUNT(*) as total FROM tb_kk GROUP BY rt");
  $colors = generateRandomColor($result->num_rows);

  while ($row = $result->fetch_assoc()) {
    $chartData[] = [
      'label' => 'RT ' . $row['rt'],
      'count' => $row['total'],
      'color' => array_shift($colors),
    ];
  }

  return $chartData;
}

function fetchRWChartData($koneksi)
{
  $chartData = [];
  $result = $koneksi->query("SELECT rw, COUNT(*) as total FROM tb_kk GROUP BY rw");
  $colors = generateRandomColor($result->num_rows);

  while ($row = $result->fetch_assoc()) {
    $chartData[] = [
      'label' => 'RW ' . $row['rw'],
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
        <i class="fa fa-table"></i> Report Data Kartu Keluarga
      </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

      <div class="grid-container">

        <!-- RW Chart -->
        <div class="chart-container">
          <h2>RW Chart</h2>
          <canvas id="rwChart"></canvas>
        </div>

      </div>

      <?php
      // RW Chart
      $rwChartData = fetchRWChartData($koneksi);
      ?>

      <script>
        document.addEventListener("DOMContentLoaded", function() {
          var rwChartData = <?php echo json_encode($rwChartData); ?>;

          var rwLabels = rwChartData.map(item => item.label);
          var rwCounts = rwChartData.map(item => item.count);
          var rwColors = rwChartData.map(item => item.color);

          var rwDataConfig = {
            labels: rwLabels,
            datasets: [{
              label: 'Number of Households',
              data: rwCounts,
              backgroundColor: rwColors,
            }],
          };

          var ctx = document.getElementById('rwChart').getContext('2d');
          var myChart = new Chart(ctx, {
            type: 'bar',
            data: rwDataConfig,
            options: {
              responsive: true,
              maintainAspectRatio: false,
              scales: {
                y: {
                  beginAtZero: true,
                },
              },
            },
          });
        });
      </script>
    </div>
  </div>

</body>

</html>