<?php
function fetchChartData($koneksi, $groupByColumn)
{
    $chartData = [];
    $result = $koneksi->query("SELECT $groupByColumn, COUNT(*) as total FROM tb_pdd WHERE `status`='ada' GROUP BY $groupByColumn");
    $colors = generateRandomColor($result->num_rows);
    $i = 0;

    while ($row = $result->fetch_assoc()) {
        $chartData[] = [
            'label' => $row[$groupByColumn],
            'count' => $row['total'],
            'color' => $colors[$i],
        ];
        $i++;
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
    <title>Data Penduduk</title>
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
                <i class="fa fa-table"></i> Report Data Penduduk
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <div class="grid-container">

                <!-- Jenis Kelamin Chart -->
                <div class="chart-container">
                    <h2>Jenis Kelamin Chart</h2>
                    <canvas id="genderChart"></canvas>
                </div>

                <!-- Agama Chart -->
                <div class="chart-container">
                    <h2>Agama Chart</h2>
                    <canvas id="religionChart"></canvas>
                </div>

                <!-- Dusun Chart -->
                <div class="chart-container">
                    <h2>Dusun Chart</h2>
                    <canvas id="dusunChart"></canvas>
                </div>

                <!-- Status Pernikahan Chart -->
                <div class="chart-container">
                    <h2>Status Pernikahan Chart</h2>
                    <canvas id="maritalStatusChart"></canvas>
                </div>

                <!-- Pekerjaan Chart -->
                <div class="chart-container">
                    <h2>Pekerjaan Chart</h2>
                    <canvas id="occupationChart"></canvas>
                </div>

            </div>

            <?php
            // Gender Chart
            $genderData = fetchChartData($koneksi, 'jekel');
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
            // Religion Chart
            $religionData = fetchChartData($koneksi, 'agama');
            ?>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var religionData = <?php echo json_encode($religionData); ?>;

                    var religionLabels = religionData.map(item => item.label);
                    var religionCounts = religionData.map(item => item.count);
                    var religionColors = religionData.map(item => item.color);

                    var religionDataConfig = {
                        labels: religionLabels,
                        datasets: [{
                            data: religionCounts,
                            backgroundColor: religionColors,
                        }],
                    };

                    var ctx = document.getElementById('religionChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'pie',
                        data: religionDataConfig,
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                        },
                    });
                });
            </script>

            <?php
            // Dusun Chart
            $dusunData = fetchChartData($koneksi, 'desa');
            ?>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var dusunData = <?php echo json_encode($dusunData); ?>;

                    var dusunLabels = dusunData.map(item => item.label);
                    var dusunCounts = dusunData.map(item => item.count);
                    var dusunColors = dusunData.map(item => item.color);

                    var dusunDataConfig = {
                        labels: dusunLabels,
                        datasets: [{
                            label: 'Number of Dusun',
                            data: dusunCounts,
                            backgroundColor: dusunColors,
                        }],
                    };

                    var ctx = document.getElementById('dusunChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: dusunDataConfig,
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

            <?php
            // Marital Status Chart
            $maritalStatusData = fetchChartData($koneksi, 'kawin');
            ?>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var maritalStatusData = <?php echo json_encode($maritalStatusData); ?>;

                    var maritalStatusLabels = maritalStatusData.map(item => item.label);
                    var maritalStatusCounts = maritalStatusData.map(item => item.count);
                    var maritalStatusColors = maritalStatusData.map(item => item.color);

                    var maritalStatusDataConfig = {
                        labels: maritalStatusLabels,
                        datasets: [{
                            data: maritalStatusCounts,
                            backgroundColor: maritalStatusColors,
                        }],
                    };

                    var ctx = document.getElementById('maritalStatusChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'pie',
                        data: maritalStatusDataConfig,
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                        },
                    });
                });
            </script>

            <?php
            // Occupation Chart
            $occupationData = fetchChartData($koneksi, 'pekerjaan');
            ?>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var occupationData = <?php echo json_encode($occupationData); ?>;

                    var occupationLabels = occupationData.map(item => item.label);
                    var occupationCounts = occupationData.map(item => item.count);
                    var occupationColors = occupationData.map(item => item.color);

                    var occupationDataConfig = {
                        labels: occupationLabels,
                        datasets: [{
                            label: 'Number of Occupation',
                            data: occupationCounts,
                            backgroundColor: occupationColors,
                        }],
                    };

                    var ctx = document.getElementById('occupationChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: occupationDataConfig,
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