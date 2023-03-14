<?php
  session_start();
  include("./php/config.php");

  $page = 'profile'; 
  include_once('php/navbar.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>
    Sayur Mayor
  </title>
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
</head>

<body class="g-sidenav-show bg-gray-100">
  <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <!-- Navbar -->
    <nav class='navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl' id='navbarBlur' navbar-scroll='true'>
      <div class='container-fluid py-1 px-3'>
        <nav aria-label='breadcrumb'>
          <ol class='breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5'>
            <li class='breadcrumb-item text-sm'><a class='opacity-5 text-dark' href='javascript:;'>Pages</a></li>
            <li class='breadcrumb-item text-sm text-dark active' aria-current='page'>Dashboard</li>
          </ol>
          <h6 class='font-weight-bolder mb-0'><?php if($page == 'profile') {echo 'Profile';}?></h6>
        </nav>
      
        <div class='collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4' id='navbar'>
          <div class='ms-md-auto pe-md-3 d-flex align-items-center'>
            <!-- <div class='input-group'>
              <span class='input-group-text text-body'><i class='fas fa-search' aria-hidden='true'></i></span>
              <input type='text' class='form-control' placeholder='Type here...'>
            </div> -->
          </div>

          <!-- <div class="dropdown">
            <a href="javascript:;" class="btn bg-gradient-dark dropdown-toggle " data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
                <img src="https://demos.creative-tim.com/argon-dashboard-pro/assets/img/icons/flags/US.png" /> Flags
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                <li>
                    <a class="dropdown-item" href="javascript:;">
                      <img src="https://demos.creative-tim.com/argon-dashboard-pro/assets/img/icons/flags/DE.png" /> Deutsch
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="javascript:;">
                      <img src="https://demos.creative-tim.com/argon-dashboard-pro/assets/img/icons/flags/GB.png" /> English(UK)
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="javascript:;">
                      <img src="https://demos.creative-tim.com/argon-dashboard-pro/assets/img/icons/flags/FR.png" /> Français
                    </a>
                </li>
            </ul>
          </div> -->

          <ul class='navbar-nav  justify-content-end'>
            <li class='nav-item dropdown pe-2 d-flex align-items-center'>
              <a href='javascript:;' class='nav-link text-body font-weight-bold px-2' id='dropdownProfileButton' data-bs-toggle='dropdown' aria-expanded='false'>
                <img src='./assets/img/farmer.webp' width='30px' class='mb-1 pr-5' style="border-radius: 100px;">&nbsp;
                <span class='d-sm-inline d-none'> James Newman</span>&nbsp;&nbsp;
              </a>
              <ul class='dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n0' aria-labelledby='dropdownMenuButton'>
                <li class='mb-2'>
                  <a class='dropdown-item border-radius-md' href='profile.php'>
                    <div class='d-flex py-1'>
                      <div class='my-auto'>
                        <img src='./assets/img/sidebar/profile.png' class='avatar avatar-sm  me-3 '>
                      </div>
                      <div class='d-flex flex-column justify-content-center'>
                        <h6 class='text-sm font-weight-normal mb-1'>
                          <span class='font-weight-bold'>Profile Saya</span>
                        </h6>
                      </div>
                    </div>
                  </a>
                </li>

                <li class='mb-2'>
                  <a class='dropdown-item border-radius-md' href='billing.php'>
                    <div class='d-flex py-1'>
                      <div class='my-auto'>
                        <img src='./assets/img/sidebar/billing.png' class='avatar avatar-sm  me-3 '>
                      </div>
                      <div class='d-flex flex-column justify-content-center'>
                        <h6 class='text-sm font-weight-normal mb-1'>
                          <span class='font-weight-bold'>Billing</span>
                        </h6>
                      </div>
                    </div>
                  </a>
                </li>

                <li class='mb-0'>
                  <a class='dropdown-item border-radius-md' href=''>
                    <div class='d-flex py-1'>
                      <div class='my-auto'>
                        <i class="fa-duotone fa-right-from-bracket avatar avatar-sm" style="font-size: 20px; color: red;"></i>
                      </div>
                      <div class='d-flex flex-column justify-content-center'>
                        <h6 class='text-sm font-weight-normal mb-1'>
                          <span class='font-weight-bold'>&nbsp;&nbsp;&nbsp;&nbsp;Keluar</span>
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
            <li class='nav-item dropdown pe-2 d-flex align-items-center'>
              <a href='javascript:;' class='nav-link text-body p-0' id='dropdownMenuButton' data-bs-toggle='dropdown' aria-expanded='false'>
                <i class='fa-duotone fa-bell cursor-pointer'></i>
              </a>
              <ul class='dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4' aria-labelledby='dropdownMenuButton'>
                <li class='mb-2'>
                  <a class='dropdown-item border-radius-md' href='javascript:;'>
                    <div class='d-flex py-1'>
                      <div class='my-auto'>
                        <img src='https://cdn3d.iconscout.com/3d/premium/thumb/vegetables-bag-5168866-4323726.png' class='avatar avatar-sm  me-3 '>
                      </div>
                      <div class='d-flex flex-column justify-content-center'>
                        <h6 class='text-sm font-weight-normal mb-1'>
                          <span class='font-weight-bold'>Proyek baru</span> dari John Doe
                        </h6>
                        <p class='text-xs text-secondary mb-0 '>
                          <i class='fa fa-clock me-1'></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>

                <li class='mb-2'>
                  <a class='dropdown-item border-radius-md' href='javascript:;'>
                    <div class='d-flex py-1'>
                      <div class='my-auto'>
                        <img src='https://cdn3d.iconscout.com/3d/premium/thumb/vegetables-bag-5168866-4323726.png' class='avatar avatar-sm  me-3 '>
                      </div>
                      <div class='d-flex flex-column justify-content-center'>
                        <h6 class='text-sm font-weight-normal mb-1'>
                          <span class='font-weight-bold'>Proyek baru</span> dari John Doe
                        </h6>
                        <p class='text-xs text-secondary mb-0 '>
                          <i class='fa fa-clock me-1'></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>

                <li class='mb-2'>
                  <a class='dropdown-item border-radius-md' href='javascript:;'>
                    <div class='d-flex py-1'>
                      <div class='my-auto'>
                        <img src='https://cdn3d.iconscout.com/3d/premium/thumb/vegetables-bag-5168866-4323726.png' class='avatar avatar-sm  me-3 '>
                      </div>
                      <div class='d-flex flex-column justify-content-center'>
                        <h6 class='text-sm font-weight-normal mb-1'>
                          <span class='font-weight-bold'>Proyek baru</span> dari John Doe
                        </h6>
                        <p class='text-xs text-secondary mb-0 '>
                          <i class='fa fa-clock me-1'></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

    <div class="container-fluid">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://asset.kompas.com/crops/SsA8a2K8CNdQXGMPHhYcstrTBYE=/0x0:1920x1280/750x500/data/photo/2021/05/16/60a102c3631a4.jpg'); background-position-y: 10%;">
        <span class="mask bg-gradient-success opacity-0"></span>
      </div>
      <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="./assets/img/farmer.webp" alt="profile_image" class="w-100 border-radius-lg bg-gradient-success shadow-sm px-1 pt-2">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                James Newman 
                <span class="badge bg-gradient-success" style="font-size: 10px;"><i class="fa-duotone fa-check-double" style="font-size: 14px;"></i>&nbsp; Terverifikasi</span>
                <!-- <span class="badge bg-gradient-warning" style="font-size: 10px;"><i class="fa-duotone fa-timer" style="font-size: 14px;"></i>&nbsp; Proses Verifikasi</span>
                <span class="badge bg-gradient-danger" style="font-size: 10px;"><i class="fa-duotone fa-xmark" style="font-size: 14px;"></i>&nbsp; Ditolak</span> -->
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
                Petani
              </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              <span class="text-xs mb-2">Project Selesai: <span class="text-dark ms-sm-2 font-weight-bold">20</span></span> <br>
              <span class="mb-2 text-xs">Total Pendapatan: <span class="text-dark font-weight-bold ms-sm-2">60.400.000</span></span> <br>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid py-4">
      <div class="row">

      <div class="col-12 mb-4">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                  <h6 class="mb-0">Profile Information</h6>
                </div>
              </div>
            </div>
            <div class="card-body p-3">
              <hr class="horizontal gray-light my-1">
              <ul class="list-group">
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp; James Newman</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Nomor KTP:</strong> &nbsp; 1234567890</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">No Telpon:</strong> &nbsp; 0811300400</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; jamesnewman@mail.com</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Provinsi:</strong> &nbsp; jamesnewman@mail.com</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Kota:</strong> &nbsp; jamesnewman@mail.com</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Alamat:</strong> &nbsp; Jl. Ir Soekarno</li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                  <h6 class="mb-0">Ubah Password</h6>
                </div>
                <div class="col-md-4 text-end">
                </div>
              </div>
            </div>
            <div class="card-body p-3">
            <input type='text' class='form-control' placeholder='Type here...'> <br>
            <input type='text' class='form-control' placeholder='Type here...'>
            <button class="btn bg-gradient-success mt-4 w-100">Ubah Password</button>
            </div>
          </div>
        </div>

        <div class="col-12">
          <a href="sign-out.php" class="btn bg-gradient-danger btn-md mt-4 w-100"><i class="fa-duotone fa-right-from-bracket"></i> Keluar</a>
        </div>

      </div>
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
  </div>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg ">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Sayur Mayor Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3">
          <h6 class="mb-0">Navbar Fixed</h6>
        </div>
        <div class="form-check form-switch ps-0">
          <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
        </div>
        <hr class="horizontal dark my-sm-4">
        <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/soft-ui-dashboard">Free Download</a>
        <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-dashboard">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/soft-ui-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Soft%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/soft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
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