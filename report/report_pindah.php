<?php
function fetchPindahChartData($koneksi)
{
  $chartData = [];
  $result = $koneksi->query("SELECT tgl_pindah, COUNT(*) as total FROM tb_pindah GROUP BY tgl_pindah");
  $colors = generateRandomColor($result->num_rows);

  while ($row = $result->fetch_assoc()) {
    $chartData[] = [
      'label' => $row['tgl_pindah'],
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
  <title>Data Pindah</title>
  <style>
    .grid-container {
      display: grid;
      grid-template-columns: repeat(1, 1fr);
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

        <!-- Tanggal Pindah Chart -->
        <div class="chart-container">
          <h2>Tanggal Pindah Chart</h2>
          <canvas id="tanggalPindahChart"></canvas>
        </div>

      </div>

      <?php
      // Tanggal Pindah Chart
      $tanggalPindahData = fetchPindahChartData($koneksi);
      ?>

      <script>
        document.addEventListener("DOMContentLoaded", function() {
          var tanggalPindahData = <?php echo json_encode($tanggalPindahData); ?>;

          var tanggalPindahLabels = tanggalPindahData.map(item => item.label);
          var tanggalPindahCounts = tanggalPindahData.map(item => item.count);
          var tanggalPindahColors = tanggalPindahData.map(item => item.color);

          var tanggalPindahDataConfig = {
            labels: tanggalPindahLabels,
            datasets: [{
              label: 'Number of Pindahs',
              data: tanggalPindahCounts,
              borderColor: '#3498db',
              backgroundColor: tanggalPindahColors,
              borderWidth: 2,
              fill: true,
            }],
          };

          var ctx = document.getElementById('tanggalPindahChart').getContext('2d');
          var myChart = new Chart(ctx, {
            type: 'line',
            data: tanggalPindahDataConfig,
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