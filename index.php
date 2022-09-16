<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard Builder</title>
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-icons.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-svg.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/soft-ui-dashboard.min.css?v=1.0.2">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href="./assets/css/loopple/loopple.css">
    <style>
      .chartjs-table, th, td{

        border-collapse : collapse;
        border: 1px solid #67748E;
        padding: 10px;
        margin-left:20px;
        font-size:12px;
      }

      .chartjs-thead {
        font-weight : bold; 
      }

      .chartjs-body {
        text-align : center;
      }
    </style>
</head>

<body class="g-sidenav-show">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between" style="margin-top:20px">
                    <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-start">
                            <li class="nav-item">
                                <b><a href="javascript:;"><h7 class="font-weight-bolder mb-0">Data Pelanggaran Lalu Lintas</h6></a></b>
                            </li>
                            <li class="nav-item" style="margin-left:15px">
                                <a href="data_traffic"><h7>Data Traffic Lalu Lintas</h6></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-5"></div>
                    <div class="col-lg-1">
                    <button onclick=refreshPage() type="button" class="btn btn-warning float-right ml-2">Refresh</button>
                    </div>
                </div>
            </div>
    
    <div class="main-content" id="panel">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Data Bulanan Pelanggaran</h6>
                    <p class="text-sm">
                        <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                        <span class="font-weight-bold">4% more</span> in 2021
                    </p>
                </div>
                <div class="card-body p-3">
                    <div class="chart">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="chart-line" class="chart-canvas chartjs-render-monitor" height="375" width="1035" style="display: block; height: 300px; width: 828px; box-sizing: border-box;"></canvas>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Data Bulanan Pelanggaran</h6>
                    <p class="text-sm">
                        <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                        <span class="font-weight-bold">4% more</span> in 2021
                    </p>
                </div>
                <div class="card-body p-3">
                    <div class="chart1">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="chart-line4" class="chart-canvas chartjs-render-monitor" height="375" width="1035" style="display: block; height: 300px; width: 828px; box-sizing: border-box;"></canvas>
                    </div>
                </div>
            </div>

            <div class="row removable">
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Jumlah Pelanggaran Kemarin</h6>
                            <p class="text-sm">
                                <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                                <span class="font-weight-bold">4% more</span> in 2021
                            </p>
                        </div>
                        <div class="card-body p-3">
                            <div class="chart2">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="chart-line1" class="chart-canvas chartjs-render-monitor" height="600" width="1582" style="display: block; height: 300px; width: 791px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Jumlah Pelanggaran Hari Ini</h6>
                            <p class="text-sm">
                                <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                                <span class="font-weight-bold">4% more</span> in 2021
                            </p>
                        </div>
                        <div class="card-body p-3">
                            <div class="chart3">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div>
                                <canvas id="chart-line2" class="chart-canvas chartjs-render-monitor" height="600" width="1582" style="display: block; height: 300px; width: 791px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer pt-3 pb-4">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            © 2021,
                            made with
                            <a href="https://www.creative-tim.com/product/soft-ui-dashboard" class="font-weight-bold text-capitalize" target="_blank"> Soft UI Dashboard</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="javascript:;" class="nav-link text-muted" target="_blank">Creative Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:;" class="nav-link text-muted" target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:;" class="nav-link text-muted" target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:;" class="nav-link pe-0 text-muted" target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://demos.creative-tim.com/soft-ui-dashboard/assets/js/core/popper.min.js"></script>
    <script src="https://demos.creative-tim.com/soft-ui-dashboard/assets/js/core/bootstrap.min.js"></script>
    <script src="https://demos.creative-tim.com/soft-ui-dashboard/assets/js/plugins/chartjs.min.js"></script>
    <script src="https://demos.creative-tim.com/soft-ui-dashboard/assets/js/plugins/Chart.extension.js"></script>
    <script src="https://demos.creative-tim.com/soft-ui-dashboard/assets/js/soft-ui-dashboard.min.js?v=1.0.2"></script>
    
    <script>
    function refreshPage(){
    window.location.reload();
    }
    </script>

    <?php 

    // koneksi ke database
    $conn = new mysqli('localhost', 'root', '', 'jalan_toll');
    $query = $conn->query("
    SELECT
        HOUR(WAKTU) AS hour,
        COUNT(*) AS number_of_appearances
    FROM data_pelanggaran
    WHERE DAY(WAKTU) = DAY(CURDATE())
    GROUP BY HOUR(WAKTU)
    ");

    foreach($query as $data)
    {
        $jam[] = $data['hour'];
        $jumlah[] = $data['number_of_appearances'];

    }

    $query = $conn->query("
    SELECT DAY(WAKTU) AS day, HOUR(WAKTU) AS hour2, COUNT(*) AS number_of_appearances2
	FROM data_pelanggaran
    WHERE DAY(WAKTU) = DAY(CURDATE()) - 1
    GROUP BY HOUR(WAKTU)
    ");

    foreach($query as $datadua)
    {
        $jam_yesterday[] = $datadua['hour2'];
        $jumlah_yesterday[] = $datadua['number_of_appearances2'];
    }

    $query = $conn->query("
    SELECT DAY(WAKTU) AS day, COUNT(*) AS number_of_appearances3
	FROM data_pelanggaran
    WHERE MONTH(WAKTU) = MONTH(CURDATE())
    GROUP BY DAY(WAKTU)
    ");

    foreach($query as $datatiga)
    {
        $day_bulanan[] = $datatiga['day'];
        $jumlah_bulanan[] = $datatiga['number_of_appearances3'];
    }
    
    ?>
    <script>
           if (document.querySelector("#chart-line")) {
           	var ctx2 = document.getElementById("chart-line").getContext("2d");
           	var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);
           	gradientStroke1.addColorStop(1, "rgba(203,12,159,0.2)");
           	gradientStroke1.addColorStop(0.2, "rgba(72,72,176,0.0)");
           	gradientStroke1.addColorStop(0, "rgba(203,12,159,0)");
           	var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);
           	gradientStroke2.addColorStop(1, "rgba(20,23,39,0.2)");
           	gradientStroke2.addColorStop(0.2, "rgba(72,72,176,0.0)");
           	gradientStroke2.addColorStop(0, "rgba(20,23,39,0)");
            const data = {
                labels: <?php echo json_encode($jam_yesterday) ?>,
                datasets: [{
                    label: "Hari ini",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#3A416F",
                    borderWidth: 3,
                    backgroundColor: gradientStroke2,
                    fill: true,
                    data: <?php echo json_encode($jumlah_yesterday) ?>,
                    maxBarThickness: 6
                  },{
                    label: "Kemarin",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#cb0c9f",
                    borderWidth: 3,
                    backgroundColor: gradientStroke1,
                    fill: true,
                    data: <?php echo json_encode($jumlah) ?>,
                    maxBarThickness: 6
                  },
                ],
              }
           	new Chart(ctx2, {
              type: "line",
              data,
              options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                  legend: {
                    display: false,
                  }
                },
                interaction: {
                  intersect: false,
                  mode: 'index',
                },
                scales: {
                  y: {
                    grid: {
                      drawBorder: false,
                      display: true,
                      drawOnChartArea: true,
                      drawTicks: false,
                      borderDash: [5, 5]
                    },
                    ticks: {
                      display: true,
                      padding: 10,
                      color: '#b2b9bf',
                      font: {
                        size: 11,
                        family: "Open Sans",
                        style: 'normal',
                        lineHeight: 2
                      },
                    }
                  },
                  x: {
                    grid: {
                      drawBorder: false,
                      display: false,
                      drawOnChartArea: false,
                      drawTicks: false,
                      borderDash: [5, 5]
                    },
                    ticks: {
                      display: true,
                      color: '#b2b9bf',
                      padding: 20,
                      font: {
                        size: 11,
                        family: "Open Sans",
                        style: 'normal',
                        lineHeight: 2
                      },
                    }
                  },
                },
              },
            });
            function createTable(){
              console.log('triggered');
              const chart = document.querySelector('.chart');
              const tableDiv = document.createElement('DIV');
              tableDiv.setAttribute('id', 'tableDiv'); //menambahkan ID

              const table = document.createElement('TABLE');
              table.classList.add('chartjs-table');

              // add table head (thead)
              const thead = table.createTHead();
              thead.classList.add('chartjs-thead');

              thead.insertRow(0);
              console.log(data.labels)
              for(let i = 0; i < data.labels.length; i++) {
                thead.rows[0].insertCell(i).innerText = data.labels[i];
                
              };
              thead.rows[0].insertCell(0).innerText = 'Tanggal'

              // add table body
              const tbody = table.createTBody();
              thead.classList.add('chartjs-tbody');
              console.log(data.datasets)
              data.datasets.map((dataset,index) => {
                tbody.insertRow(index);
                for(let i = 0; i < data.datasets[0].data.length; i++){
                  tbody.rows[index].insertCell(i).innerText = dataset.data[i];
                };
                tbody.rows[index].insertCell(0).innerText = dataset.label;
              })

              
              // append
              chart.appendChild(tableDiv);
              tableDiv.appendChild(table);
              }

              createTable();

           };

           if (document.querySelector("#chart-line4")) {
           	var ctx2 = document.getElementById("chart-line4").getContext("2d");
           	var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);
           	gradientStroke1.addColorStop(1, "rgba(203,12,159,0.2)");
           	gradientStroke1.addColorStop(0.2, "rgba(72,72,176,0.0)");
           	gradientStroke1.addColorStop(0, "rgba(203,12,159,0)");
           	var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);
           	gradientStroke2.addColorStop(1, "rgba(20,23,39,0.2)");
           	gradientStroke2.addColorStop(0.2, "rgba(72,72,176,0.0)");
           	gradientStroke2.addColorStop(0, "rgba(20,23,39,0)");
            const data = {
                labels: <?php echo json_encode($day_bulanan) ?>,
                datasets: [{
                    label: "Pelanggaran",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#cb0c9f",
                    borderWidth: 3,
                    backgroundColor: gradientStroke1,
                    fill: true,
                    data: <?php echo json_encode($jumlah_bulanan) ?>,
                    maxBarThickness: 6
        
                  },
                ],
              }
           	new Chart(ctx2, {
              type: "line",
              data,
              options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                  legend: {
                    display: false,
                  }
                },
                interaction: {
                  intersect: false,
                  mode: 'index',
                },
                scales: {
                  y: {
                    grid: {
                      drawBorder: false,
                      display: true,
                      drawOnChartArea: true,
                      drawTicks: false,
                      borderDash: [5, 5]
                    },
                    ticks: {
                      display: true,
                      padding: 10,
                      color: '#b2b9bf',
                      font: {
                        size: 11,
                        family: "Open Sans",
                        style: 'normal',
                        lineHeight: 2
                      },
                    }
                  },
                  x: {
                    grid: {
                      drawBorder: false,
                      display: false,
                      drawOnChartArea: false,
                      drawTicks: false,
                      borderDash: [5, 5]
                    },
                    ticks: {
                      display: true,
                      color: '#b2b9bf',
                      padding: 20,
                      font: {
                        size: 11,
                        family: "Open Sans",
                        style: 'normal',
                        lineHeight: 2
                      },
                    }
                  },
                },
              },
            });
            function createTable(){
              console.log('triggered');
              const chart = document.querySelector('.chart1');
              const tableDiv = document.createElement('DIV');
              tableDiv.setAttribute('id', 'tableDiv'); //menambahkan ID

              const table = document.createElement('TABLE');
              table.classList.add('chartjs-table');

              // add table head (thead)
              const thead = table.createTHead();
              thead.classList.add('chartjs-thead');

              thead.insertRow(0);
              console.log(data.labels)
              for(let i = 0; i < data.labels.length; i++) {
                thead.rows[0].insertCell(i).innerText = data.labels[i];
                
              };
              thead.rows[0].insertCell(0).innerText = 'Tanggal'

              // add table body
              const tbody = table.createTBody();
              thead.classList.add('chartjs-tbody');
              console.log(data.datasets)
              data.datasets.map((dataset,index) => {
                tbody.insertRow(index);
                for(let i = 0; i < data.datasets[0].data.length; i++){
                  tbody.rows[index].insertCell(i).innerText = dataset.data[i];
                };
                tbody.rows[index].insertCell(0).innerText = dataset.label;
              })

              
              // append
              chart.appendChild(tableDiv);
              tableDiv.appendChild(table);
              }

              createTable();
           };

           if (document.querySelector("#chart-line1")) {
           	var ctx2 = document.getElementById("chart-line1").getContext("2d");
           	var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);
           	gradientStroke1.addColorStop(1, "rgba(203,12,159,0.2)");
           	gradientStroke1.addColorStop(0.2, "rgba(72,72,176,0.0)");
           	gradientStroke1.addColorStop(0, "rgba(203,12,159,0)");
           	var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);
           	gradientStroke2.addColorStop(1, "rgba(20,23,39,0.2)");
           	gradientStroke2.addColorStop(0.2, "rgba(72,72,176,0.0)");
           	gradientStroke2.addColorStop(0, "rgba(20,23,39,0)");
            const data = {
                labels: <?php echo json_encode($jam) ?>,
                datasets: [{
                    label: "Pelanggaran",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#cb0c9f",
                    borderWidth: 3,
                    backgroundColor: gradientStroke1,
                    fill: true,
                    data: <?php echo json_encode($jumlah) ?>,
                    maxBarThickness: 6
        
                  },
                ],
              }
           	new Chart(ctx2, {
              type: "line",
              data,
              options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                  legend: {
                    display: false,
                  }
                },
                interaction: {
                  intersect: false,
                  mode: 'index',
                },
                scales: {
                  y: {
                    grid: {
                      drawBorder: false,
                      display: true,
                      drawOnChartArea: true,
                      drawTicks: false,
                      borderDash: [5, 5]
                    },
                    ticks: {
                      display: true,
                      padding: 10,
                      color: '#b2b9bf',
                      font: {
                        size: 11,
                        family: "Open Sans",
                        style: 'normal',
                        lineHeight: 2
                      },
                    }
                  },
                  x: {
                    grid: {
                      drawBorder: false,
                      display: false,
                      drawOnChartArea: false,
                      drawTicks: false,
                      borderDash: [5, 5]
                    },
                    ticks: {
                      display: true,
                      color: '#b2b9bf',
                      padding: 20,
                      font: {
                        size: 11,
                        family: "Open Sans",
                        style: 'normal',
                        lineHeight: 2
                      },
                    }
                  },
                },
              },
            });
            function createTable(){
              console.log('triggered');
              const chart = document.querySelector('.chart2');
              const tableDiv = document.createElement('DIV');
              tableDiv.setAttribute('id', 'tableDiv'); //menambahkan ID

              const table = document.createElement('TABLE');
              table.classList.add('chartjs-table');

              // add table head (thead)
              const thead = table.createTHead();
              thead.classList.add('chartjs-thead');

              thead.insertRow(0);
              console.log(data.labels)
              for(let i = 0; i < data.labels.length; i++) {
                thead.rows[0].insertCell(i).innerText = data.labels[i];
                
              };
              thead.rows[0].insertCell(0).innerText = 'Tanggal'

              // add table body
              const tbody = table.createTBody();
              thead.classList.add('chartjs-tbody');
              console.log(data.datasets)
              data.datasets.map((dataset,index) => {
                tbody.insertRow(index);
                for(let i = 0; i < data.datasets[0].data.length; i++){
                  tbody.rows[index].insertCell(i).innerText = dataset.data[i];
                };
                tbody.rows[index].insertCell(0).innerText = dataset.label;
              })

              
              // append
              chart.appendChild(tableDiv);
              tableDiv.appendChild(table);
              }

              createTable();
           };

           if (document.querySelector("#chart-line2")) {
           	var ctx2 = document.getElementById("chart-line2").getContext("2d");
           	var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);
           	gradientStroke1.addColorStop(1, "rgba(203,12,159,0.2)");
           	gradientStroke1.addColorStop(0.2, "rgba(72,72,176,0.0)");
           	gradientStroke1.addColorStop(0, "rgba(203,12,159,0)");
           	var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);
           	gradientStroke2.addColorStop(1, "rgba(20,23,39,0.2)");
           	gradientStroke2.addColorStop(0.2, "rgba(72,72,176,0.0)");
           	gradientStroke2.addColorStop(0, "rgba(20,23,39,0)");
            const data = {
                labels: <?php echo json_encode($jam_yesterday) ?>,
                datasets: [{
                    label: "Pelanggaran",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#3A416F",
                    borderWidth: 3,
                    backgroundColor: gradientStroke2,
                    fill: true,
                    data: <?php echo json_encode($jumlah_yesterday) ?>,
                    maxBarThickness: 6
        
                  },
                ],
              }
           	new Chart(ctx2, {
              type: "line",
              data,
              options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                  legend: {
                    display: false,
                  }
                },
                interaction: {
                  intersect: false,
                  mode: 'index',
                },
                scales: {
                  y: {
                    grid: {
                      drawBorder: false,
                      display: true,
                      drawOnChartArea: true,
                      drawTicks: false,
                      borderDash: [5, 5]
                    },
                    ticks: {
                      display: true,
                      padding: 10,
                      color: '#3A416F',
                      font: {
                        size: 11,
                        family: "Open Sans",
                        style: 'normal',
                        lineHeight: 2
                      },
                    }
                  },
                  x: {
                    grid: {
                      drawBorder: false,
                      display: false,
                      drawOnChartArea: false,
                      drawTicks: false,
                      borderDash: [5, 5]
                    },
                    ticks: {
                      display: true,
                      color: '#3A416F',
                      padding: 20,
                      font: {
                        size: 11,
                        family: "Open Sans",
                        style: 'normal',
                        lineHeight: 2
                      },
                    }
                  },
                },
              },
            });
            function createTable(){
              console.log('triggered');
              const chart = document.querySelector('.chart3');
              const tableDiv = document.createElement('DIV');
              tableDiv.setAttribute('id', 'tableDiv'); //menambahkan ID

              const table = document.createElement('TABLE');
              table.classList.add('chartjs-table');

              // add table head (thead)
              const thead = table.createTHead();
              thead.classList.add('chartjs-thead');

              thead.insertRow(0);
              console.log(data.labels)
              for(let i = 0; i < data.labels.length; i++) {
                thead.rows[0].insertCell(i).innerText = data.labels[i];
                
              };
              thead.rows[0].insertCell(0).innerText = 'Tanggal'

              // add table body
              const tbody = table.createTBody();
              thead.classList.add('chartjs-tbody');
              console.log(data.datasets)
              data.datasets.map((dataset,index) => {
                tbody.insertRow(index);
                for(let i = 0; i < data.datasets[0].data.length; i++){
                  tbody.rows[index].insertCell(i).innerText = dataset.data[i];
                };
                tbody.rows[index].insertCell(0).innerText = dataset.label;
              })

              
              // append
              chart.appendChild(tableDiv);
              tableDiv.appendChild(table);
              }

              createTable();
           };
    </script>
    <script src="./assets/js/loopple/loopple.js"></script>
</body>