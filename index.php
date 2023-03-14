<?php
  session_start();
  include("./php/config.php");

  if(isset($_SESSION['status_petani'])) {
    if($_SESSION['status_petani']=='1'){
        header ('Location: review.php');
      }
      else if ($_SESSION['status_petani']=='0') {
        header ('Location: banned.php');
      }
    }
  
    if(!isset($_SESSION['id_admin'])) {
        header ('Location: sign-in.php');
    }

  $page = 'index'; 
  require_once('php/navbar.php');

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
            <li class='breadcrumb-item text-sm'><a class='opacity-5 text-dark' href='javascript:;'>Pages</a></li>
            <li class='breadcrumb-item text-sm text-dark active' aria-current='page'>Dashboard</li>
          </ol>
          <h6 class='font-weight-bolder mb-0'><?php if($page == 'index') {echo 'Dashboard';}?></h6>
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
  
    <div class="container-fluid py-4">
    <?php
                  echo $statis;
                ?>
      <div class="row my-4">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6>Proyek</h6>
                  <p class="text-sm mb-0">
                  </p>
                </div>
                <!-- <div class="col-lg-6 col-5 my-auto text-end">
                  <div class="dropdown float-lg-end pe-4">
                    <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-ellipsis-v text-secondary"></i>
                    </a>
                    <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                    </ul>
                  </div>
                </div> -->
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
                <table class='table align-items-center mb-0'>
                  <thead>
                    <tr>
                      <th class='text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Nama Sayur</th>
                      <th class='text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2'>Benih</th>
                      <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Rockwool</th>
                      <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Completion</th>
                      <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Timeline</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php

                $sql = "SELECT *, p.nama_petani, DATE_ADD(o.tanggal_tanam, INTERVAL m.panen_sayur DAY) as estimated,

                CASE
                  WHEN o.status_order = 0 THEN 'Menunggu'
                  WHEN o.status_order = 1 THEN 'Diterima'
                  WHEN o.status_order = 2 THEN 'Penyemaian'
                  WHEN o.status_order = 3 THEN 'Pembibitan'
                  WHEN o.status_order = 4 THEN 'Panen'
                  WHEN o.status_order = 5 THEN 'Gagal'
                  ELSE 'Non Active'
                END AS stat,

                CASE
                  WHEN o.status_order = 0 THEN 0
                  WHEN o.status_order = 1 THEN 0
                  WHEN o.status_order = 2 THEN 25
                  WHEN o.status_order = 3 THEN 50
                  WHEN o.status_order = 4 THEN 100
                  WHEN o.status_order = 5 THEN 100
                  ELSE 'Non Active'
                END AS progress

                FROM `order_sayur` o, `customer` c, master_sayur m, master_jenis_sayur j, petani p WHERE o.id_petani = '".$_SESSION['id_admin']."' && p.id_petani = '".$_SESSION['id_admin']."' && o.id_sayur = m.id_sayur && m.id_jenis_sayur = j.id_jenis_sayur group by id_order";
                $result = $mysqli -> query($sql);
                if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                echo "
                    <tr>
                      <td>
                        <div class='d-flex px-2 py-1'>
                          <div>
                            <img src='assets/img/sayuran/pokcoy.jpg' class='avatar avatar-sm me-3' alt='xd'>
                          </div>
                          <div class='d-flex flex-column justify-content-center'>
                            <h6 class='mb-0 text-sm'>".$row['nama_sayur']."</h6>
                          </div>
                        </div>
                      </td>
                      <td class='align-middle text-center text-sm'>
                        <span class='text-xs font-weight-bold'> ".$row['jumlah_benih']." </span>
                      </td>
                      <td class='align-middle text-center text-sm'>
                        <span class='text-xs font-weight-bold'> ".$row['jumlah_rockwool']." </span>
                      </td>
                      <td class='align-middle'>
                        <div class='progress-wrapper w-75 mx-auto'>
                          <div class='progress-info'>
                            <div class='progress-percentage'>
                              <span class='text-xs font-weight-bold'>".$row['progress']."%</span>
                            </div>
                          </div>
                          <div class='progress'>
                            <div class='progress-bar bg-gradient-info w-".$row['progress']."' role='progressbar' aria-valuenow='60' aria-valuemin='0' aria-valuemax='100'></div>
                          </div>
                        </div>
                      </td>
                      <td class='align-middle'>
                        <div class='d-flex flex-column justify-content-center'>
                          <a class='btn bg-gradient-success btn-sm mb-0' data-bs-toggle='modal' data-bs-target='#timeline".$row['id_order']."'>
                            <i class='fa-duotone fa-seedling' style='font-size: 15px;'></i>
                            &nbsp;&nbsp;Timeline
                          </a>
                        </div>
                      </td>
                    </tr>
                    <div class='col-md-12'>
              
                    <!-- modal timeline -->

                    <div class='col-md-12'>
                    <div class='modal fade' id='timeline".$row['id_order']."' tabindex='-1' role='dialog' aria-labelledby='timeline' aria-hidden='true'>
  
                      <div class='modal-dialog modal-dialog-centered modal-md' role='document'>
                        <div class='modal-content'>
                          <div class='modal-body p-0'>
                            <div class='card card-plain'>
                              
                              <div class='card h-100'>
                                <div class='card-header pb-0'>
                                  <div class='col-sm-12'>
                                  <div class='row'>
                                    <div class='col-10'>
                                      <h3 class='font-weight-bolder text-success text-gradient'>Linimasa Pertumbuhan</h3>
                                    </div>
                                    <div class='col-2 text-end'>
                                    <button type='button' class='btn-close text-dark' data-bs-dismiss='modal' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                    </button>
                                    </div>
                                  </div>
                                </div>
                                </div>
                                <div class='card-body p-3'>
                                  <div class='timeline timeline-one-side'>
                                    <div class='timeline-block mb-3'>
                                      <span class='timeline-step'>
                                        <img src='https://cdn3d.iconscout.com/3d/premium/thumb/seed-bag-6148684-5024969.png' width='25px' alt=''>
                                      </span>
                                      <div class='timeline-content'>
                                        <h6 class='text-dark text-sm font-weight-bold mb-2'>Penyemaian</h6>
                                        <!-- <h6 class='rounded-pill badge bg-gradient-warning mb-0'>Penyemaian</h6> -->
                                        <p class='text-secondary font-weight-bold text-xs mb-2 mb-0'>".$row['penyemaian_date_created']."</p>
                                        <p class='text-secondary font-weight-bold text-xs mb-2 mb-0'><i class='fa-duotone fa-xmark'></i>&nbsp;&nbsp;".$row['gagal_penyemaian']." Gagal</p>
  
                                        <!-- <p class='text-secondary font-weight-bold text-xs mb-2 mt-2 mb-0'>
                                          <i class='fa-duotone fa-xmark'></i> 3 Gagal &nbsp;
                                          <i class='fa-duotone fa-timer'></i> 2 Terlambat &nbsp;
                                          <i class='fa-duotone fa-seedling'></i> 15 Berjalan &nbsp;
                                        </p> -->
                                      </div>
                                    </div>
                                    <div class='timeline-block mb-3'>
                                      <span class='timeline-step'>
                                        <img src='https://cdn3d.iconscout.com/3d/premium/thumb/sowing-seeds-5697538-4754339.png' width='25px' alt=''>
                                      </span>
                                      <div class='timeline-content'>
                                        <h6 class='text-dark text-sm font-weight-bold mb-0'>Pembibitan</h6>
                                        <p class='text-secondary font-weight-bold text-xs mb-2 mb-0'>".$row['pembibitan_date_created']."</p>
                                        <p class='text-secondary font-weight-bold text-xs mb-2 mb-0'><i class='fa-duotone fa-xmark'></i>&nbsp;&nbsp;".$row['gagal_pembibitan']." Gagal</p>
                                        <!-- <button class='btn bg-gradient-success mt-1' data-bs-target='#exampleModalToggle2' data-bs-toggle='modal' data-bs-dismiss='modal'>
                                        <i class='fa-duotone fa-check-double'></i>
                                        </button> -->
                                      </div>
                                    </div>
                                    <div class='timeline-block mb-3'>
                                      <span class='timeline-step'>
                                        <img src='https://cdn3d.iconscout.com/3d/premium/thumb/carrot-farming-3938179-3259175@0.png' width='25px' alt=''>
                                      </span>
                                      <div class='timeline-content'>
                                        <h6 class='text-dark text-sm font-weight-bold mb-0'>Panen</h6>
                                        <p class='text-secondary font-weight-bold text-xs mb-2 mb-0'>".$row['panen_date_created']."</p>
                                        <p class='text-secondary font-weight-bold text-xs mb-2 mb-0'><i class='fa-duotone fa-xmark'></i>&nbsp;&nbsp;".$row['gagal_panen']." Gagal</p>
                                      </div>
                                    </div>
                                  </div>
                                  <hr class='horizontal dark mt-0'>
                                  <div class='col-sm-12 text-center'>
                                    <p class='text-secondary font-weight-bold text-md mb-2 mb-0'><i class='fa-duotone fa-seedling'></i> ".$row['jumlah_benih']." Berjalan</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
  
                    </div>
                  </div>
            </div>";
                  }
                }
              ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="col-lg-4 col-md-6">
          <div class="card h-100">
            <div class="card-header pb-0">
              <h6>Orders overview</h6>
              <p class="text-sm">
              </p>
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
        </div> -->
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
  </main>
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
            <span class="badge filter bg-gradient-success active" data-color="success" onclick="sidebarColor(this)"></span>
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
          <button class="btn bg-gradient-success w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-success w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
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