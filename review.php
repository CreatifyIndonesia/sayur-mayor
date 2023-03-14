<?php
  session_start();
  include("./php/config.php");
  
      if(isset($_SESSION['status_petani'])) {
        if($_SESSION['status_petani']=='2'){
          header ('Location: index.php');
        }
      }

      if(isset($_SESSION['status_petani'])) {
        if($_SESSION['status_petani']=='0'){
          header ('Location: banned.php');
        }
      }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title></title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" type="text/css" href="https://site-assets.fontawesome.com/releases/v6.1.1/css/all.css">
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/soft-ui-dashboard.css?v=1.0.6" rel="stylesheet" />

  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css" rel="stylesheet">

  <script src="https://kit.fontawesome.com/7d57987a46.js" crossorigin="anonymous"></script>
</head>

<body class="g-sidenav-show  bg-gray-100 page">

  <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <main class='main-content position-relative max-height-vh-100 h-100 border-radius-lg '>
    <nav class='navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl' id='navbarBlur' navbar-scroll='true'>
      <div class='container-fluid py-1 px-3'>
        <nav aria-label='breadcrumb'>
          <ol class='breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5'>
            <li class='breadcrumb-item text-sm'><h6><img src="assets/img/logo-ct.png" alt="" width="30px"> Petani Mayor</h6></li>
          </ol>
          <h6 class='font-weight-bolder mb-0'></h6>
        </nav>
      
        <div class='collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4' id='navbar'>
          <div class='ms-md-auto pe-md-3 d-flex align-items-center'>
            <!-- <div class='input-group'>
              <span class='input-group-text text-body'><i class='fas fa-search' aria-hidden='true'></i></span>
              <input type='text' class='form-control' placeholder='Type here...'>
            </div> -->
          </div>
          <ul class='navbar-nav  justify-content-end'>
          <li class='nav-item dropdown pe-2 d-flex align-items-center'>
              <a href='javascript:;' class='nav-link text-body font-weight-bold px-2' id='dropdownProfileButton' data-bs-toggle='dropdown' aria-expanded='false'>
                <img src='./assets/img/farmer.webp' width='30px' class='mb-1 pr-5' style="border-radius: 100px;">&nbsp;
                <span class='d-sm-inline d-none'>
                  <?php
                    $sql = "SELECT * FROM `petani` where `id_petani` = '$_SESSION[id_admin]'";
                    $result = $mysqli -> query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    echo "
                    ".$row['nama_petani']."
                    ";
                      }
                    }
                  ?>
                </span>&nbsp;&nbsp;
              </a>
              <ul class='dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n0' aria-labelledby='dropdownMenuButton'>

              <li class='mb-2'>
                  <a class='dropdown-item border-radius-md' href='sign-out.php'>
                    <div class='d-flex py-1'>
                      <div class='my-auto'>
                        <img src='https://cdn3d.iconscout.com/3d/premium/thumb/log-out-5183080-4333127.png' class='avatar avatar-sm  me-3 '>
                      </div>
                      <div class='d-flex flex-column justify-content-center'>
                        <h6 class='text-sm font-weight-normal mb-1'>
                          <span class='font-weight-bold'>Keluar</span>
                        </h6>
                      </div>
                    </div>
                  </a>
                </li>

              </ul>
            </li>
            <li class='nav-item d-xl-none ps-3 d-flex align-items-center'>
              <a href='javascript:;' class='nav-link text-body p-0 px-2' id='iconNavbarSidenav'>
                <div class='sidenav-toggler-inner'>
                  <i class='sidenav-toggler-line'></i>
                  <i class='sidenav-toggler-line'></i>
                  <i class='sidenav-toggler-line'></i>
                </div>
              </a>
            </li>
            <!-- <li class='nav-item px-3 d-flex align-items-center'>
              <a href='javascript:;' class='nav-link text-body p-0'>
                <i class='fa fa-cog fixed-plugin-button-nav cursor-pointer'></i>
              </a>
            </li> -->
          </ul>
        </div>
      </div>
    </nav>
  
    <section class="contianer">
        <div class="col-sm-12 text-center">
            <img src="https://cdn3d.iconscout.com/3d/premium/thumb/waiting-area-5250567-4391183.png" alt="">
            <h2 class="text-success text-gradient">Data anda sedang di cek oleh tim kami. Mohon menunggu 1x24 jam.</h2><hr>
            <!-- <a href="../sayur-mayor/index.php" class="btn btn-success bg-gradient-success btn-lg">Kunjungi Sayur Mayor</a> -->
        </div>
    </section>
    
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Sayur Mayor</a>
                for a better web.
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>

  <!-- Modal timeline -->

  <div class="col-md-12">
    <div class="modal fade" id="timeline" tabindex="-1" role="dialog" aria-labelledby="timeline" aria-hidden="true">

      <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card card-plain">
              
              <div class="card h-100">
                <div class="card-header pb-0">
                  <h6>Orders overview</h6>
                </div>
                <div class="card-body p-3">
                  <div class="timeline timeline-one-side">
                    <div class="timeline-block mb-3">
                      <span class="timeline-step">
                        <img src="https://cdn3d.iconscout.com/3d/premium/thumb/seed-bag-6148684-5024969.png" width="25px" alt="">
                      </span>
                      <div class="timeline-content">
                        <h6 class="text-dark text-sm font-weight-bold mb-0">Penyemaian</h6>
                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:20 PM</p>
                      </div>
                    </div>
                    <div class="timeline-block mb-3">
                      <span class="timeline-step">
                        <img src="https://cdn3d.iconscout.com/3d/premium/thumb/sowing-seeds-5697538-4754339.png" width="25px" alt="">
                      </span>
                      <div class="timeline-content">
                        <h6 class="text-dark text-sm font-weight-bold mb-0">Pembibitan</h6>
                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:20 PM</p>
                      </div>
                    </div>
                    <div class="timeline-block mb-3">
                      <span class="timeline-step">
                        <img src="https://cdn3d.iconscout.com/3d/premium/thumb/carrot-farming-3938179-3259175@0.png" width="25px" alt="">
                      </span>
                      <div class="timeline-content">
                        <h6 class="text-dark text-sm font-weight-bold mb-0">Panen</h6>
                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:20 PM</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "#fff",
          data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
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
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 15,
              font: {
                size: 14,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false
            },
            ticks: {
              display: false
            },
          },
        },
      },
    });
    
    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Pokcoy",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#cb0c9f",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            fill: true,
            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            maxBarThickness: 6

          },
          {
            label: "Selada Air",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#3A416F",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
            maxBarThickness: 6
          },
          {
            label: "Bayam",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#63B3ED",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
            maxBarThickness: 6
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
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
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/soft-ui-dashboard.min.js?v=1.0.6"></script>
</body>

</html>