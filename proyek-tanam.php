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

  $page = 'proyek-tanam'; 
  require_once('php/navbar.php');

  if (isset($_POST['tanam_sekarang'])) {

    $id_order = $_POST ['id_order'];

    $sql = "UPDATE `order_sayur` SET status_order = '2', updated_order = sysdate(), tanggal_tanam = sysdate() WHERE id_order = '$id_order'";
    if ($mysqli->query($sql) === true) {
        echo "
        <div class='alert alert-success bg-gradient-success alert-dismissible fade show w-50 ms-auto me-auto d-block mt-4 text-white fixed-top' role='alert' style='z-index: 99999;' role='alert'>
        <span class='alert-icon'><i class='fa-duotone fa-thumbs-up'></i></span>
        <span class='alert-text'><strong>Masuk!</strong> Data anda sudah masuk!</span>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
      </div>
        ";
    }
}

  if (isset($_POST['submit_gagal_semai'])) {
  
    $gagal_semai = $_POST ['gagal_semai'];
    $id_order = $_POST ['id_order'];

    $sql = "UPDATE `order_sayur` SET gagal_penyemaian = '$gagal_semai', penyemaian_date_created = sysdate(), updated_order = sysdate(), jumlah_benih = jumlah_benih - '$gagal_semai', status_order = 3 WHERE id_order = '$id_order'";
    if ($mysqli->query($sql) === true) {
        echo "
        <div class='alert alert-success bg-gradient-success alert-dismissible fade show w-50 ms-auto me-auto d-block mt-4 text-white fixed-top' role='alert' style='z-index: 99999;' role='alert'>
        <span class='alert-icon'><i class='fa-duotone fa-thumbs-up'></i></span>
        <span class='alert-text'><strong>Masuk!</strong> Data anda sudah masuk!</span>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
      </div>
        ";
    } else if ($row['jumlah'] == 0) {
      $sql = "UPDATE `order_sayur` SET status_order = '5', panen_date_created = sysdate(), updated_order = sysdate() WHERE id_order = '$id_order'";
    }
}

if (isset($_POST['submit_gagal_semai_null'])) {
  
  $id_order = $_POST ['id_order'];

  $sql = "UPDATE `order_sayur` SET status_order = 3, gagal_penyemaian = '0', panen_date_created = sysdate(), updated_order = sysdate() WHERE id_order = '$id_order'";
  if ($mysqli->query($sql) === true) {
      echo "
      <div class='alert alert-success bg-gradient-success alert-dismissible fade show w-50 ms-auto me-auto d-block mt-4 text-white fixed-top' role='alert' style='z-index: 99999;' role='alert'>
      <span class='alert-icon'><i class='fa-duotone fa-thumbs-up'></i></span>
      <span class='alert-text'><strong>Masuk!</strong> Data anda sudah masuk!</span>
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
      </button>
    </div>
      ";
  } else {
      echo "
      <div class='alert alert-danger bg-gradient-danger alert-dismissible fade show w-50 ms-auto me-auto d-block mt-4 text-white fixed-top' role='alert' style='z-index: 99999;' role='alert'>
      <span class='alert-icon'><i class='fa-duotone fa-thumbs-down'></i></span>
      <span class='alert-text'><strong>Project sudah ada yang terima!</strong> Maaf anda telat menerima project!</span>
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
      </button>
      </div>
      ";
  }
}

if (isset($_POST['submit_gagal_pembibitan'])) {
  
  $gagal_pembibitan = $_POST ['gagal_pembibitan'];
  $id_order = $_POST ['id_order'];

  $sql = "UPDATE `order_sayur` SET gagal_pembibitan = '$gagal_pembibitan', pembibitan_date_created = sysdate(), updated_order = sysdate(), jumlah_benih = jumlah_benih - '$gagal_pembibitan', status_order = 3 WHERE id_order = '$id_order'";
  if ($mysqli->query($sql) === true) {
      echo "
      <div class='alert alert-success bg-gradient-success alert-dismissible fade show w-50 ms-auto me-auto d-block mt-4 text-white fixed-top' role='alert' style='z-index: 99999;' role='alert'>
      <span class='alert-icon'><i class='fa-duotone fa-thumbs-up'></i></span>
      <span class='alert-text'><strong>Masuk!</strong> Data anda sudah masuk!</span>
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
      </button>
    </div>
      ";
  } else if ($row['jumlah'] == 0) {
    $sql = "UPDATE `order_sayur` SET status_order = '5', pembibitan_date_created = sysdate(), updated_order = sysdate() WHERE id_order = '$id_order'";
  }
}

if (isset($_POST['submit_gagal_pembibitan_null'])) {

$id_order = $_POST ['id_order'];

$sql = "UPDATE `order_sayur` SET status_order = 3, gagal_pembibitan = '0', updated_order = sysdate(), pembibitan_date_created = sysdate() WHERE id_order = '$id_order'";
if ($mysqli->query($sql) === true) {
    echo "
    <div class='alert alert-success bg-gradient-success alert-dismissible fade show w-50 ms-auto me-auto d-block mt-4 text-white fixed-top' role='alert' style='z-index: 99999;' role='alert'>
    <span class='alert-icon'><i class='fa-duotone fa-thumbs-up'></i></span>
    <span class='alert-text'><strong>Masuk!</strong> Data anda sudah masuk!</span>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
    </button>
  </div>
    ";
} else {
    echo "
    <div class='alert alert-danger bg-gradient-danger alert-dismissible fade show w-50 ms-auto me-auto d-block mt-4 text-white fixed-top' role='alert' style='z-index: 99999;' role='alert'>
    <span class='alert-icon'><i class='fa-duotone fa-thumbs-down'></i></span>
    <span class='alert-text'><strong>Project sudah ada yang terima!</strong> Maaf anda telat menerima project!</span>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
    </button>
    </div>
    ";
}
}

if (isset($_POST['submit_gagal_panen'])) {
  
  $gagal_panen = $_POST ['gagal_panen'];
  $id_order = $_POST ['id_order'];

  $sql = "UPDATE `order_sayur` SET gagal_panen = '$gagal_panen', panen_date_created = sysdate(), updated_order = sysdate(), jumlah_benih = jumlah_benih - '$gagal_panen', status_order = '4' WHERE id_order = '$id_order'";
  if ($mysqli->query($sql) === true) {
      echo "
      <div class='alert alert-success bg-gradient-success alert-dismissible fade show w-50 ms-auto me-auto d-block mt-4 text-white fixed-top' role='alert' style='z-index: 99999;' role='alert'>
      <span class='alert-icon'><i class='fa-duotone fa-thumbs-up'></i></span>
      <span class='alert-text'><strong>Masuk!</strong> Data anda sudah masuk!</span>
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
      </button>
    </div>
      ";
  }  else if ($row['jumlah'] == 0) {
    $sql = "UPDATE `order_sayur` SET status_order = '5', panen_date_created = sysdate(), updated_order = sysdate() WHERE id_order = '$id_order'";
  }
}

if (isset($_POST['submit_gagal_panen_null'])) {

$id_order = $_POST ['id_order'];

$sql = "UPDATE `order_sayur` SET status_order = 4, gagal_panen = '0', panen_date_created = sysdate(), updated_order = sysdate() WHERE id_order = '$id_order'";
if ($mysqli->query($sql) === true) {
    echo "
    <div class='alert alert-success bg-gradient-success alert-dismissible fade show w-50 ms-auto me-auto d-block mt-4 text-white fixed-top' role='alert' style='z-index: 99999;' role='alert'>
    <span class='alert-icon'><i class='fa-duotone fa-thumbs-up'></i></span>
    <span class='alert-text'><strong>Masuk!</strong> Data anda sudah masuk!</span>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
    </button>
  </div>
    ";
} else {
    echo "
    <div class='alert alert-danger bg-gradient-danger alert-dismissible fade show w-50 ms-auto me-auto d-block mt-4 text-white fixed-top' role='alert' style='z-index: 99999;' role='alert'>
    <span class='alert-icon'><i class='fa-duotone fa-thumbs-down'></i></span>
    <span class='alert-text'><strong>Project sudah ada yang terima!</strong> Maaf anda telat menerima project!</span>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
    </button>
    </div>
    ";
}
}

if (isset($_POST['submit_gagal_penanaman'])) {

  $id_order = $_POST ['id_order'];
  
  $sql = "UPDATE `order_sayur` SET status_order = 5, updated_order = sysdate() WHERE id_order = '$id_order'";
  if ($mysqli->query($sql) === true) {
      echo "
      <div class='alert alert-success bg-gradient-success alert-dismissible fade show w-50 ms-auto me-auto d-block mt-4 text-white fixed-top' role='alert' style='z-index: 99999;' role='alert'>
      <span class='alert-icon'><i class='fa-duotone fa-thumbs-up'></i></span>
      <span class='alert-text'><strong>Masuk!</strong> Data anda sudah masuk!</span>
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
      </button>
    </div>
      ";
  } else {
      echo "
      <div class='alert alert-danger bg-gradient-danger alert-dismissible fade show w-50 ms-auto me-auto d-block mt-4 text-white fixed-top' role='alert' style='z-index: 99999;' role='alert'>
      <span class='alert-icon'><i class='fa-duotone fa-thumbs-down'></i></span>
      <span class='alert-text'><strong>Project sudah ada yang terima!</strong> Maaf anda telat menerima project!</span>
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
      </button>
      </div>
      ";
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
  <title>
    Sayur Mayor
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/soft-ui-dashboard.css?v=1.0.6" rel="stylesheet" />

  <!-- <script src="https://kit.fontawesome.com/7d57987a46.js" crossorigin="anonymous"></script> -->

  <link rel="stylesheet" type="text/css" href="https://site-assets.fontawesome.com/releases/v6.1.1/css/all.css">

  <script src="https://code.jquery.com/jquery-1.8.3.min.js"></script>
</head>

<body class="g-sidenav-show bg-gray-100">

<style>
    .bg-gradient-Diterima {
      background-color: #82d616;
    }
    .bg-gradient-Menunggu {
      background-color: #6f42c1;
    }
    .bg-gradient-Penyemaian {
      background-color: #fd7e14;
    }
    .bg-gradient-Pembibitan {
      background-color: #17c1e8;
    }
    .bg-gradient-Panen {
      background-color: #82d616;
    }
    .bg-gradient-Gagal {
      background-color: #ea0606;
    }
  </style>

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

  <nav class='navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl' id='navbarBlur' navbar-scroll='true'>
      <div class='container-fluid py-1 px-3'>
        <nav aria-label='breadcrumb'>
          <ol class='breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5'>
            <li class='breadcrumb-item text-sm'><a class='opacity-5 text-dark' href='javascript:;'>Pages</a></li>
            <li class='breadcrumb-item text-sm text-dark active' aria-current='page'>Dashboard</li>
          </ol>
          <h6 class='font-weight-bolder mb-0'><?php if($page == 'proyek-tanam') {echo 'Proyek Tanam';}?></h6>
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
                <span class='d-sm-inline d-none'> <?php
                    $sql = "SELECT * FROM `petani` where `id_petani` = '$_SESSION[id_admin]'";
                    $result = $mysqli -> query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    echo "
                    ".$row['nama_petani']."
                    ";
                      }
                    }
                  ?></span>&nbsp;&nbsp;
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

      <div class="col-12 mt-4">
        <div class="col-lg-12 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
          <div class="nav-wrapper position-relative end-0">

          <ul class="nav nav-pills nav-fill p-1" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link mb-0 px-0 py-1 active d-flex align-items-center justify-content-center" id="pills-semua-tab" data-bs-toggle="pill" data-bs-target="#pills-semua" role="tab" aria-controls="pills-semua" aria-selected="true">
                <img src="assets/img/sidebar/sayuran.png" width="25px" alt="">
                <span class="ms-2">Semua</span>
              </a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center"  id="pills-proses-tab" data-bs-toggle="pill" data-bs-target="#pills-penyemaian" role="tab" aria-controls="pills-proses" aria-selected="false">
                <img src="https://cdn3d.iconscout.com/3d/premium/thumb/seed-bag-6148684-5024969.png" width="25px" alt="">
                <span class="ms-2">Penyemaian</span>
              </a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center" id="pills-panen-tab" data-bs-toggle="pill" data-bs-target="#pills-pembibitan" role="tab" aria-controls="pills-panen" aria-selected="false">
                <img src="https://cdn3d.iconscout.com/3d/premium/thumb/sowing-seeds-5697538-4754339.png" width="25px" alt="">
                <span class="ms-2">Pembibitan</span>
              </a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center" id="pills-panen-tab" data-bs-toggle="pill" data-bs-target="#pills-panen" role="tab" aria-controls="pills-panen" aria-selected="false">
                <img src="https://cdn3d.iconscout.com/3d/premium/thumb/plant-6785528-5552714.png" width="25px" alt="">
                <span class="ms-2">Panen</span>
              </a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center" id="pills-gagal-tab" data-bs-toggle="pill" data-bs-target="#pills-gagal" role="tab" aria-controls="pills-gagal" aria-selected="false">
                <img src="https://cdn3d.iconscout.com/3d/premium/thumb/grain-4752587-3950397.png" width="25px" alt="">
                <span class="ms-2">Gagal</span>
              </a>
            </li>
          </ul>

          </div>
        </div>
        
        <div class="row mt-4">

          <div class="tab-content" id="pills-tabContent">

            <!-- Semua -->
      
            <div class="tab-pane fade show active" id="pills-semua" role="tabpanel" aria-labelledby="pills-semua-tab">
              <div class="row">

              <?php
                $sql = "SELECT *, c.nama_customer, DATE_ADD(o.tanggal_tanam, INTERVAL m.panen_sayur DAY) as estimated,

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
  
                FROM `order_sayur` o, `customer` c, master_sayur m, master_jenis_sayur j WHERE id_petani = '".$_SESSION['id_admin']."' && o.id_customer = c.id_customer && o.id_sayur = m.id_sayur && m.id_jenis_sayur = j.id_jenis_sayur && status_order = 1 || status_order = 2 || status_order = 3 || status_order = 4 || status_order = 5 group by id_order order by status_order";
                $result = $mysqli -> query($sql);
                if ($result->num_rows > 0) { ?>
                <?php while ($row = $result->fetch_assoc()) { ?>

                <div class='col-sm-12 col-lg-4 mb-4'>
                  <div class='card col-12'>
                    <div class='card-body p-3'>
                      <div class='d-flex'>
                        <div class='avatar avatar-xl bg-gradient-success border-radius-md p-2'>
                          <img src='assets/img/sayuran/bayam.png' alt='asana_logo'>
                        </div>
                        <div class='ms-3 my-auto'>
                          <p class='text-gradient text-dark mb-2 text-sm'><?php echo "".$row['nama_jenis_sayur'].""?></p>
                          <h6><?php echo "".$row['nama_sayur']."" ?></h6>
                        </div>
                        <div class='ms-auto'>
                            <div class='dropdown'>
                              <a class='btn bg-gradient-success btn-xs mb-0' data-bs-toggle='modal' data-bs-target='#timeline<?php echo "".$row['id_order'].""?>'>
                                <i class='fa-duotone fa-timeline'></i>
                              </a>
                            </div>
                          </div>
                        </div>

                        <div class='col-sm-12 mt-3'>
                          <div class='row'>
                            <div class='col-sm-7'>
                              <img src='https://cdn3d.iconscout.com/3d/premium/thumb/actor-5691555-4741096.png' alt='' width='25px' class='mb-2'> <?php echo "".$row['nama_customer'].""?>
                            </div>

                            <div class='col-sm-5 text-end'>
                              <img src='https://cdn3d.iconscout.com/3d/premium/thumb/calendar-4059077-3364000.png' alt='' width='25px' class='mb-2'> 22-11-2022
                            </div>
                          </div>
                        </div>

                        <div class='col-sm-12 mt-3'>
                          <div class='row'>
                            <div class='col-sm-7'>
                              <img src='https://cdn3d.iconscout.com/3d/premium/thumb/rupiah-gold-coin-5356099-4486968.png' alt='' width='30px' class='mb-2'> <?php echo "".number_format($row['harga_total'], 2,",",".")."" ?>
                            </div>

                            <div class='col-sm-5 text-end'>
                              <img src='https://cdn3d.iconscout.com/3d/premium/thumb/weight-scale-6849555-5607208.png' alt='' width='35px' class='mb-2'> <?php echo "".$row['jumlah'].""?>
                            </div>
                          </div>
                        </div>
                        
                        <div class='table-responsive'>
                          <table class='table align-items-center mb-0'>
                            <thead>
                              <tr>
                                <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Completion</th>
                                <th class='text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2'>Benih</th>
                                <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Rockwool</th>
                                <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>PH A</th>
                                <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>PH B</th>
                                <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Vitamin A</th>
                                <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Vitamin B</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class='align-middle'>
                                  <div class='progress-wrapper w-75 mx-auto'>
                                    <div class='progress-info'>
                                      <div class='progress-percentage'>
                                        <span class='text-xs font-weight-bold'><?php echo "".$row['progress'].""?>%</span>
                                      </div>
                                    </div>
                                    <div class='progress'>
                                      <div class='progress-bar bg-gradient-info w-<?php echo "".$row['progress'].""?>' role='progressbar' aria-valuenow='60' aria-valuemin='0' aria-valuemax='100'></div>
                                    </div>
                                  </div>
                                </td>
                                <td class='align-middle text-center text-sm'>
                                  <span class='text-xs font-weight-bold'> <?php echo "".$row['jumlah_benih'].""?> </span>
                                </td>
                                <td class='align-middle text-center text-sm'>
                                  <span class='text-xs font-weight-bold'> <?php echo "".$row['jumlah_rockwool'].""?> </span>
                                </td>
                                <td class='align-middle text-center text-sm'>
                                  <span class='text-xs font-weight-bold'> <?php echo "".$row['jumlah_phA'].""?> </span>
                                </td>
                                <td class='align-middle text-center text-sm'>
                                  <span class='text-xs font-weight-bold'><?php echo "".$row['jumlah_phB'].""?> </span>
                                </td>
                                <td class='align-middle text-center text-sm'>
                                  <span class='text-xs font-weight-bold'> <?php echo "".$row['jumlah_vitA'].""?> </span>
                                </td>
                                <td class='align-middle text-center text-sm'>
                                  <span class='text-xs font-weight-bold'> <?php echo "".$row['jumlah_vitB'].""?> </span>
                                </td>
                              </tr>
                            </tbody>
                          </table>
          
                      <hr class='horizontal dark'>
                      
                      <div class='row'>
                          <div class='col-6'>
                            <p class='text-secondary text-sm font-weight-bold mb-0'>Status</p>
                            <h6 class='text-sm mb-2'>
                              <div class='badge rounded-pill bg-gradient-<?php echo "".$row['stat'].""?>'> <?php echo "".$row['stat'].""?> </div>
                            </h6>
                          </div>
                          <div class='col-6 text-end'>
                            <p class='text-secondary text-sm font-weight-bold mb-0'>Estimasi Panen</p>
                            <h6 class='text-sm mb-2'><?php echo "".$row['estimated'].""?></h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                <!-- Modal timeline -->

                <div class='col-md-12'>
                  <div class='modal fade' id='timeline<?php echo "".$row['id_order'].""?>' tabindex='-1' role='dialog' aria-labelledby='timeline' aria-hidden='true'>

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
                              <?php if($row['tanggal_tanam'] == '0000-00-00') {
                                echo "
                                <form method='POST' type='submit'>
                                  <input type='hidden' value='".$row['id_order']."' name='id_order'>
                                  <button class='btn bg-gradient-success mt-1' name='tanam_sekarang'>
                                    Tanam Sekarang
                                  </button>
                                </form>
                                ";
                                  }
                                ?>
                                <div class='timeline timeline-one-side'>
                                  <div class='timeline-block mb-3'>
                                    <span class='timeline-step'>
                                      <img src='https://cdn3d.iconscout.com/3d/premium/thumb/seed-bag-6148684-5024969.png' width='25px' alt=''>
                                    </span>
                                    <div class='timeline-content'>
                                      <h6 class='text-dark text-sm font-weight-bold mb-2'>Penyemaian</h6>
                                      <!-- <h6 class='rounded-pill badge bg-gradient-warning mb-0'>Penyemaian</h6> -->
                                      <?php if($row['status_order'] == 2) {
                                      echo "
                                      <button class='btn bg-gradient-success mt-1' data-bs-target='#inputGagal".$row['id_order']."' data-bs-toggle='modal' data-bs-dismiss='modal'>
                                        <i class='fa-duotone fa-check-double'></i>
                                      </button>";
                                        }
                                      ?>
                                      <?php if($row['status_order'] > 2) { ?>
                                          <p class='text-secondary font-weight-bold text-xs mb-2 mb-0'>Semai selesai pada : <?php echo "".$row['penyemaian_date_created']."" ?></p>
                                          <p class='text-secondary font-weight-bold text-xs mb-2 mb-0'><i class='fa-duotone fa-xmark'></i>&nbsp;&nbsp;<?php echo "".$row['gagal_penyemaian']."" ?>  Gagal</p>
                                      <?php } ?>
                                    </div>
                                  </div>
                                  <div class='timeline-block mb-3'>
                                    <span class='timeline-step'>
                                      <img src='https://cdn3d.iconscout.com/3d/premium/thumb/sowing-seeds-5697538-4754339.png' width='25px' alt=''>
                                    </span>
                                    <div class='timeline-content'>
                                      <h6 class='text-dark text-sm font-weight-bold mb-2'>Pembibitan</h6>
                                        <?php if($row['status_order'] == 3 && $row['pembibitan_date_created'] == '0000-00-00 00:00:00') {
                                        echo "
                                        <button class='btn bg-gradient-success mt-1' data-bs-target='#inputGagalPembibitan".$row['id_order']."' data-bs-toggle='modal' data-bs-dismiss='modal'>
                                          <i class='fa-duotone fa-check-double'></i>
                                        </button>";
                                          }
                                        ?>
                                        <?php if($row['status_order'] >= 3 && $row['pembibitan_date_created'] != '0000-00-00 00:00:00') { ?>
                                            <p class='text-secondary font-weight-bold text-xs mb-2 mb-0'>Pembibitan selesai pada : <?php echo "".$row['pembibitan_date_created']."" ?></p>
                                            <p class='text-secondary font-weight-bold text-xs mb-2 mb-0'><i class='fa-duotone fa-xmark'></i>&nbsp;&nbsp;<?php echo "".$row['gagal_pembibitan']."" ?>  Gagal</p>
                                        <?php } ?>
                                    </div>
                                  </div>
                                  <div class='timeline-block mb-3'>
                                    <span class='timeline-step'>
                                      <img src='https://cdn3d.iconscout.com/3d/premium/thumb/carrot-farming-3938179-3259175@0.png' width='25px' alt=''>
                                    </span>
                                    <div class='timeline-content'>
                                      <h6 class='text-dark text-sm font-weight-bold mb-0'>Panen</h6>
                                      <?php if($row['status_order'] == 3 && $row['pembibitan_date_created'] != '0000-00-00 00:00:00') {
                                        echo "
                                        <button class='btn bg-gradient-success mt-1' data-bs-target='#inputGagalPanen".$row['id_order']."' data-bs-toggle='modal' data-bs-dismiss='modal'>
                                          <i class='fa-duotone fa-check-double'></i>
                                        </button>";
                                          }
                                        ?>
                                        <?php if($row['status_order'] >= 4) { ?>
                                            <p class='text-secondary font-weight-bold text-xs mb-2 mb-0'>Panen selesai pada : <?php echo "".$row['panen_date_created']."" ?></p>
                                            <p class='text-secondary font-weight-bold text-xs mb-2 mb-0'><i class='fa-duotone fa-xmark'></i>&nbsp;&nbsp;<?php echo "".$row['gagal_panen']."" ?>  Gagal</p>
                                        <?php } ?>
                                    </div>
                                  </div>
                                </div>
                                <hr class='horizontal dark mt-0'>
                                <div class='col-sm-12 text-center'>
                                  <p class='text-secondary font-weight-bold text-md mb-2 mb-0'><i class='fa-duotone fa-seedling'></i><?php echo "".$row['jumlah_benih'].""?> Berjalan</p>
                                  <?php if($row['status_order'] <= 3) { ?>
                                    <button class='btn bg-gradient-danger mt-1' data-bs-target='#gagalPanen<?php echo "".$row['id_order'].""?>' data-bs-toggle='modal' data-bs-dismiss='modal'>
                                      Gagal
                                    </button>
                                  <?php } ?>
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

              <div class="modal fade" id="gagalPanen<?php echo "".$row['id_order'].""?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content bg-gradient-danger">
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-12">
                          <form action="#" method="POST">
                            <div class="form-group">
                              <div class="input-group">
                                <p class="text-center text-white">Apakah anda yakin penanaman anda gagal? Penanaman yang sudah gagal tidak dapat dirubah kembali.</p>
                                <input type="hidden" class="form-control" name="id_order" value="<?php echo "".$row['id_order'].""?>"> 
                              </div>
                              <button type="submit" class="btn btn-white mt-4 w-100" name="submit_gagal_penanaman">Gagal</button>
                            </div>
                          </form>   
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

                <div class="modal fade" id="inputGagal<?php echo "".$row['id_order'].""?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel2">Input Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-12">
                            <form action="#" method="POST">
                              <div class="form-group">
                                <label for="">Gagal</label>
                                <div class="input-group">
                                  <span class="input-group-text" id="basic-addon1"><img src="https://cdn3d.iconscout.com/3d/premium/thumb/grain-4752587-3950397.png" width="20px" alt=""></span>
                                  <input type="number" class="form-control" name="gagal_semai">
                                  <input type="hidden" class="form-control" name="id_order" value="<?php echo "".$row['id_order'].""?>"> 
                                </div>
                                <button type="submit" class="btn btn-primary mt-4 w-100" name="submit_gagal_semai">Input Data</button>
                                <button type="submit" class="btn btn-info mt-2 w-100" name="submit_gagal_semai_null">Tidak ada gagal</button>
                              </div>
                            </form>   
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal fade" id="inputGagalPembibitan<?php echo "".$row['id_order'].""?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel2">Input Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-12">
                            <form action="#" method="POST">
                              <div class="form-group">
                                <label for="">Gagal</label>
                                <div class="input-group">
                                  <span class="input-group-text" id="basic-addon1"><img src="https://cdn3d.iconscout.com/3d/premium/thumb/grain-4752587-3950397.png" width="20px" alt=""></span>
                                  <input type="number" class="form-control" name="gagal_pembibitan"> 
                                  <input type="hidden" class="form-control" name="id_order" value="<?php echo "".$row['id_order'].""?>"> 
                                </div>
                                <button type="submit" class="btn btn-primary mt-4 w-100" name="submit_gagal_pembibitan">Input Data</button> 
                                <button type="submit" class="btn btn-info mt-2 w-100" name="submit_gagal_pembibitan_null">Tidak ada gagal</button>
                              </div>
                            </form>   
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal fade" id="inputGagalPanen<?php echo "".$row['id_order'].""?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel2">Input Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-12">
                            <form action="#" method="POST">
                              <div class="form-group">
                                <label for="">Gagal</label>
                                <div class="input-group">
                                  <span class="input-group-text" id="basic-addon1"><img src="https://cdn3d.iconscout.com/3d/premium/thumb/grain-4752587-3950397.png" width="20px" alt=""></span>
                                  <input type="number" class="form-control" name="gagal_panen"> 
                                  <input type="hidden" class="form-control" name="id_order" value="<?php echo "".$row['id_order'].""?>"> 
                                </div>
                                <button type="submit" class="btn btn-primary mt-4 w-100" name="submit_gagal_panen">Input Data</button>
                                <button type="submit" class="btn btn-info mt-2 w-100" name="submit_gagal_panen_null">tidak ada gagal</button>
                              </div>
                            </form>   
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                    <?php } ?>
                  <?php } ?>
              </div>
            </div>

            <!-- Penyemaian -->
            
            <div class="row tab-pane fade show row" id="pills-penyemaian" role="tabpanel" aria-labelledby="pills-proses-tab">
            <div class="row">

              <?php
                $sql = "SELECT *, c.nama_customer, DATE_ADD(o.tanggal_tanam, INTERVAL m.panen_sayur DAY) as estimated,

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

                FROM `order_sayur` o, `customer` c, master_sayur m, master_jenis_sayur j WHERE id_petani = '".$_SESSION['id_admin']."' && o.id_customer = c.id_customer && o.id_sayur = m.id_sayur && m.id_jenis_sayur = j.id_jenis_sayur && status_order = 2";
                $result = $mysqli -> query($sql);
                if ($result->num_rows > 0) { ?>
                <?php while ($row = $result->fetch_assoc()) { ?>

                <div class='col-sm-12 col-lg-4 mb-4'>
                  <div class='card col-12'>
                    <div class='card-body p-3'>
                      <div class='d-flex'>
                        <div class='avatar avatar-xl bg-gradient-success border-radius-md p-2'>
                          <img src='assets/img/sayuran/bayam.png' alt='asana_logo'>
                        </div>
                        <div class='ms-3 my-auto'>
                          <p class='text-gradient text-dark mb-2 text-sm'><?php echo "".$row['nama_jenis_sayur'].""?></p>
                          <h6><?php echo "".$row['nama_sayur']."" ?></h6>
                        </div>
                        <div class='ms-auto'>
                            <div class='dropdown'>
                              <a class='btn bg-gradient-success btn-xs mb-0' data-bs-toggle='modal' data-bs-target='#timeline<?php echo "".$row['id_order'].""?>'>
                                <i class='fa-duotone fa-timeline'></i>
                              </a>
                            </div>
                          </div>
                        </div>

                        <div class='col-sm-12 mt-3'>
                          <div class='row'>
                            <div class='col-sm-7'>
                              <img src='https://cdn3d.iconscout.com/3d/premium/thumb/actor-5691555-4741096.png' alt='' width='25px' class='mb-2'> <?php echo "".$row['nama_customer'].""?>
                            </div>

                            <div class='col-sm-5 text-end'>
                              <img src='https://cdn3d.iconscout.com/3d/premium/thumb/calendar-4059077-3364000.png' alt='' width='25px' class='mb-2'> 22-11-2022
                            </div>
                          </div>
                        </div>

                        <div class='col-sm-12 mt-3'>
                          <div class='row'>
                            <div class='col-sm-7'>
                              <img src='https://cdn3d.iconscout.com/3d/premium/thumb/rupiah-gold-coin-5356099-4486968.png' alt='' width='30px' class='mb-2'> <?php echo "".number_format($row['harga_total'], 2,",",".")."" ?>
                            </div>

                            <div class='col-sm-5 text-end'>
                              <img src='https://cdn3d.iconscout.com/3d/premium/thumb/weight-scale-6849555-5607208.png' alt='' width='35px' class='mb-2'> <?php echo "".$row['jumlah'].""?>
                            </div>
                          </div>
                        </div>
                        
                        <div class='table-responsive'>
                          <table class='table align-items-center mb-0'>
                            <thead>
                              <tr>
                                <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Completion</th>
                                <th class='text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2'>Benih</th>
                                <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Rockwool</th>
                                <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>PH A</th>
                                <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>PH B</th>
                                <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Vitamin A</th>
                                <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Vitamin B</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class='align-middle'>
                                  <div class='progress-wrapper w-75 mx-auto'>
                                    <div class='progress-info'>
                                      <div class='progress-percentage'>
                                        <span class='text-xs font-weight-bold'><?php echo "".$row['progress'].""?>%</span>
                                      </div>
                                    </div>
                                    <div class='progress'>
                                      <div class='progress-bar bg-gradient-info w-<?php echo "".$row['progress'].""?>' role='progressbar' aria-valuenow='60' aria-valuemin='0' aria-valuemax='100'></div>
                                    </div>
                                  </div>
                                </td>
                                <td class='align-middle text-center text-sm'>
                                  <span class='text-xs font-weight-bold'> <?php echo "".$row['jumlah_benih'].""?> </span>
                                </td>
                                <td class='align-middle text-center text-sm'>
                                  <span class='text-xs font-weight-bold'> <?php echo "".$row['jumlah_rockwool'].""?> </span>
                                </td>
                                <td class='align-middle text-center text-sm'>
                                  <span class='text-xs font-weight-bold'> <?php echo "".$row['jumlah_phA'].""?> </span>
                                </td>
                                <td class='align-middle text-center text-sm'>
                                  <span class='text-xs font-weight-bold'><?php echo "".$row['jumlah_phB'].""?> </span>
                                </td>
                                <td class='align-middle text-center text-sm'>
                                  <span class='text-xs font-weight-bold'> <?php echo "".$row['jumlah_vitA'].""?> </span>
                                </td>
                                <td class='align-middle text-center text-sm'>
                                  <span class='text-xs font-weight-bold'> <?php echo "".$row['jumlah_vitB'].""?> </span>
                                </td>
                              </tr>
                            </tbody>
                          </table>

                      <hr class='horizontal dark'>
                      
                      <div class='row'>
                          <div class='col-6'>
                            <p class='text-secondary text-sm font-weight-bold mb-0'>Status</p>
                            <h6 class='text-sm mb-2'>
                              <div class='badge rounded-pill bg-gradient-<?php echo "".$row['stat'].""?>'> <?php echo "".$row['stat'].""?> </div>
                            </h6>
                          </div>
                          <div class='col-6 text-end'>
                            <p class='text-secondary text-sm font-weight-bold mb-0'>Estimasi Panen</p>
                            <h6 class='text-sm mb-2'><?php echo "".$row['estimated'].""?></h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                <!-- Modal timeline -->

                <div class='col-md-12'>
                  <div class='modal fade' id='timeline<?php echo "".$row['id_order'].""?>' tabindex='-1' role='dialog' aria-labelledby='timeline' aria-hidden='true'>

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
                                      <?php if($row['status_order'] == 2) {
                                      echo "
                                      <button class='btn bg-gradient-success mt-1' data-bs-target='#inputGagal".$row['id_order']."' data-bs-toggle='modal' data-bs-dismiss='modal'>
                                        <i class='fa-duotone fa-check-double'></i>
                                      </button>";
                                        }
                                      ?>
                                      <?php if($row['status_order'] >= 2) { ?>
                                          <p class='text-secondary font-weight-bold text-xs mb-2 mb-0'><?php echo "".$row['penyemaian_date_created']."" ?></p>
                                          <p class='text-secondary font-weight-bold text-xs mb-2 mb-0'><i class='fa-duotone fa-xmark'></i>&nbsp;&nbsp;<?php echo "".$row['gagal_penyemaian']."" ?>  Gagal</p>
                                      <?php } ?>
                                    </div>
                                  </div>
                                  <div class='timeline-block mb-3'>
                                    <span class='timeline-step'>
                                      <img src='https://cdn3d.iconscout.com/3d/premium/thumb/sowing-seeds-5697538-4754339.png' width='25px' alt=''>
                                    </span>
                                    <div class='timeline-content'>
                                      <h6 class='text-dark text-sm font-weight-bold mb-0'>Pembibitan</h6>
                                        <?php if($row['status_order'] == 3 && $row['pembibitan_date_created'] == '0000-00-00 00:00:00') {
                                        echo "
                                        <button class='btn bg-gradient-success mt-1' data-bs-target='#inputGagal".$row['id_order']."' data-bs-toggle='modal' data-bs-dismiss='modal'>
                                          <i class='fa-duotone fa-check-double'></i>
                                        </button>";
                                          }
                                        ?>
                                        <?php if($row['status_order'] >= 3) { ?>
                                            <p class='text-secondary font-weight-bold text-xs mb-2 mb-0'><?php echo "".$row['pembibitan_date_created']."" ?></p>
                                            <p class='text-secondary font-weight-bold text-xs mb-2 mb-0'><i class='fa-duotone fa-xmark'></i>&nbsp;&nbsp;<?php echo "".$row['gagal_pembibitan']."" ?>  Gagal</p>
                                        <?php } ?>
                                    </div>
                                  </div>
                                  <div class='timeline-block mb-3'>
                                    <span class='timeline-step'>
                                      <img src='https://cdn3d.iconscout.com/3d/premium/thumb/carrot-farming-3938179-3259175@0.png' width='25px' alt=''>
                                    </span>
                                    <div class='timeline-content'>
                                      <h6 class='text-dark text-sm font-weight-bold mb-0'>Panen</h6>
                                      <?php if($row['status_order'] == 3 && $row['panen_date_created'] == '0000-00-00 00:00:00') {
                                        echo "
                                        <button class='btn bg-gradient-success mt-1' data-bs-target='#inputGagal".$row['id_order']."' data-bs-toggle='modal' data-bs-dismiss='modal'>
                                          <i class='fa-duotone fa-check-double'></i>
                                        </button>";
                                          }
                                        ?>
                                        <?php if($row['panen_date_created'] != null) { ?>
                                            <p class='text-secondary font-weight-bold text-xs mb-2 mb-0'><?php echo "".$row['panen_date_created']."" ?></p>
                                            <p class='text-secondary font-weight-bold text-xs mb-2 mb-0'><i class='fa-duotone fa-xmark'></i>&nbsp;&nbsp;<?php echo "".$row['gagal_panen']."" ?>  Gagal</p>
                                        <?php } ?>
                                    </div>
                                  </div>
                                </div>
                                <hr class='horizontal dark mt-0'>
                                <div class='col-sm-12 text-center'>
                                  <p class='text-secondary font-weight-bold text-md mb-2 mb-0'><i class='fa-duotone fa-seedling'></i><?php echo "".$row['jumlah_benih'].""?> Berjalan</p>
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

                <div class="modal fade" id="inputGagal<?php echo "".$row['id_order'].""?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel2">Input Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-12">
                            <!-- <form action="#" method="POST">
                              <div class="form-group">
                                <label for="">Gagal</label>
                                <div class="input-group">
                                  <span class="input-group-text" id="basic-addon1"><img src="https://cdn3d.iconscout.com/3d/premium/thumb/grain-4752587-3950397.png" width="20px" alt=""></span>
                                  <input type="number" class="form-control" name="gagal_semai"> 
                                  <input type="hidden" class="form-control" name="id_order" value="<?php echo "".$row['id_order'].""?>"> 
                                </div>
                                <button type="submit" class="btn btn-primary mt-4 w-100" name="submit_gagal_semai">Input Data</button> 
                              </div>
                            </form>    -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                    <?php } ?>
                  <?php } ?>
              </div>
              </div>

            <!-- Pembibitan -->

            <div class="row tab-pane fade show row" id="pills-pembibitan" role="tabpanel" aria-labelledby="pills-proses-tab">
              <div class="row">
              <?php

              $sql = "SELECT *, c.nama_customer, DATE_ADD(o.tanggal_tanam, INTERVAL m.panen_sayur DAY) as estimated,

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
                WHEN o.status_order = 1 THEN 25
                WHEN o.status_order = 2 THEN 50
                WHEN o.status_order = 3 THEN 100
                WHEN o.status_order = 4 THEN 100
                ELSE 'Non Active'
              END AS progress

              FROM `order_sayur` o, `customer` c, master_sayur m, master_jenis_sayur j WHERE o.id_customer = '".$_SESSION['id_admin']."' && c.id_customer = '".$_SESSION['id_admin']."' && o.id_sayur = m.id_sayur && m.id_jenis_sayur = j.id_jenis_sayur && status_order = 3";
              $result = $mysqli -> query($sql);
              if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
              echo "
              <div class='col-sm-12 col-lg-4 mb-4'>
              <div class='card col-12'>
                <div class='card-body p-3'>
                  <div class='d-flex'>
                    <div class='avatar avatar-xl bg-gradient-success border-radius-md p-2'>
                      <img src='assets/img/sayuran/bayam.png' alt='asana_logo'>
                    </div>
                    <div class='ms-3 my-auto'>
                      <p class='text-gradient text-dark mb-2 text-sm'>".$row['nama_jenis_sayur']."</p>
                      <h6>".$row['nama_sayur']."</h6>
                    </div>
                    <div class='ms-auto'>
                        <div class='dropdown'>
                          <a class='btn bg-gradient-success btn-xs mb-0' data-bs-toggle='modal' data-bs-target='#timeline_pembibitan".$row['id_order']."'>
                            <i class='fa-duotone fa-timeline'></i>
                          </a>
                        </div>
                      </div>
                    </div>

                    <div class='col-sm-12 mt-3'>
                      <div class='row'>
                        <div class='col-sm-7'>
                          <img src='https://cdn3d.iconscout.com/3d/premium/thumb/actor-5691555-4741096.png' alt='' width='25px' class='mb-2'> ".$row['nama_customer']."
                        </div>

                        <div class='col-sm-5 text-end'>
                          <img src='https://cdn3d.iconscout.com/3d/premium/thumb/calendar-4059077-3364000.png' alt='' width='25px' class='mb-2'> 22-11-2022
                        </div>
                      </div>
                    </div>

                    <div class='col-sm-12 mt-3'>
                      <div class='row'>
                        <div class='col-sm-7'>
                          <img src='https://cdn3d.iconscout.com/3d/premium/thumb/rupiah-gold-coin-5356099-4486968.png' alt='' width='30px' class='mb-2'> ".number_format($row['harga_total'], 2,",",".")."
                        </div>

                        <div class='col-sm-5 text-end'>
                          <img src='https://cdn3d.iconscout.com/3d/premium/thumb/weight-scale-6849555-5607208.png' alt='' width='35px' class='mb-2'> ".$row['jumlah']."
                        </div>
                      </div>
                    </div>
                    
                    <div class='table-responsive'>
                      <table class='table align-items-center mb-0'>
                        <thead>
                          <tr>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Completion</th>
                            <th class='text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2'>Benih</th>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Rockwool</th>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>PH A</th>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>PH B</th>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Vitamin A</th>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Vitamin B</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
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
                            <td class='align-middle text-center text-sm'>
                              <span class='text-xs font-weight-bold'> ".$row['jumlah_benih']." </span>
                            </td>
                            <td class='align-middle text-center text-sm'>
                              <span class='text-xs font-weight-bold'> ".$row['jumlah_rockwool']." </span>
                            </td>
                            <td class='align-middle text-center text-sm'>
                              <span class='text-xs font-weight-bold'> ".$row['jumlah_phA']." </span>
                            </td>
                            <td class='align-middle text-center text-sm'>
                              <span class='text-xs font-weight-bold'> ".$row['jumlah_phB']." </span>
                            </td>
                            <td class='align-middle text-center text-sm'>
                              <span class='text-xs font-weight-bold'> ".$row['jumlah_vitA']." </span>
                            </td>
                            <td class='align-middle text-center text-sm'>
                              <span class='text-xs font-weight-bold'> ".$row['jumlah_vitB']." </span>
                            </td>
                          </tr>
                        </tbody>
                      </table>
      
                  <hr class='horizontal dark'>
                  
                  <div class='row'>
                      <div class='col-6'>
                        <p class='text-secondary text-sm font-weight-bold mb-0'>Status</p>
                        <h6 class='text-sm mb-2'>
                          <div class='badge rounded-pill bg-gradient-".$row['stat']."'> ".$row['stat']." </div>
                        </h6>
                      </div>
                      <div class='col-6 text-end'>
                        <p class='text-secondary text-sm font-weight-bold mb-0'>Estimasi Panen</p>
                        <h6 class='text-sm mb-2'>".$row['estimated']."</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            <!-- Modal timeline -->

            <div class='col-md-12'>
              <div class='modal fade' id='timeline_pembibitan".$row['id_order']."' tabindex='-1' role='dialog' aria-labelledby='timeline' aria-hidden='true'>

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
                                  <p class='text-secondary font-weight-bold text-xs mb-2 mb-0'>22 DECEMBER</p>
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
              </div>
            </div>

            <!-- panen -->

            <div class="row tab-pane fade show row" id="pills-panen" role="tabpanel" aria-labelledby="pills-proses-tab">
              <div class="row">
              <?php

              $sql = "SELECT *, c.nama_customer, DATE_ADD(o.tanggal_tanam, INTERVAL m.panen_sayur DAY) as estimated,

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
                WHEN o.status_order = 1 THEN 25
                WHEN o.status_order = 2 THEN 50
                WHEN o.status_order = 3 THEN 100
                WHEN o.status_order = 4 THEN 100
                ELSE 'Non Active'
              END AS progress

              FROM `order_sayur` o, `customer` c, master_sayur m, master_jenis_sayur j WHERE o.id_customer = '".$_SESSION['id_admin']."' && c.id_customer = '".$_SESSION['id_admin']."' && o.id_sayur = m.id_sayur && m.id_jenis_sayur = j.id_jenis_sayur && status_order = 4";
              $result = $mysqli -> query($sql);
              if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
              echo "
              <div class='col-sm-12 col-lg-4 mb-4'>
              <div class='card col-12'>
                <div class='card-body p-3'>
                  <div class='d-flex'>
                    <div class='avatar avatar-xl bg-gradient-success border-radius-md p-2'>
                      <img src='assets/img/sayuran/bayam.png' alt='asana_logo'>
                    </div>
                    <div class='ms-3 my-auto'>
                      <p class='text-gradient text-dark mb-2 text-sm'>".$row['nama_jenis_sayur']."</p>
                      <h6>".$row['nama_sayur']."</h6>
                    </div>
                    <div class='ms-auto'>
                        <div class='dropdown'>
                          <a class='btn bg-gradient-success btn-xs mb-0' data-bs-toggle='modal' data-bs-target='#timeline_panen".$row['id_order']."'>
                            <i class='fa-duotone fa-timeline'></i>
                          </a>
                        </div>
                      </div>
                    </div>

                    <div class='col-sm-12 mt-3'>
                      <div class='row'>
                        <div class='col-sm-7'>
                          <img src='https://cdn3d.iconscout.com/3d/premium/thumb/actor-5691555-4741096.png' alt='' width='25px' class='mb-2'> ".$row['nama_customer']."
                        </div>

                        <div class='col-sm-5 text-end'>
                          <img src='https://cdn3d.iconscout.com/3d/premium/thumb/calendar-4059077-3364000.png' alt='' width='25px' class='mb-2'> 22-11-2022
                        </div>
                      </div>
                    </div>

                    <div class='col-sm-12 mt-3'>
                      <div class='row'>
                        <div class='col-sm-7'>
                          <img src='https://cdn3d.iconscout.com/3d/premium/thumb/rupiah-gold-coin-5356099-4486968.png' alt='' width='30px' class='mb-2'> ".number_format($row['harga_total'], 2,",",".")."
                        </div>

                        <div class='col-sm-5 text-end'>
                          <img src='https://cdn3d.iconscout.com/3d/premium/thumb/weight-scale-6849555-5607208.png' alt='' width='35px' class='mb-2'> ".$row['jumlah']."
                        </div>
                      </div>
                    </div>
                    
                    <div class='table-responsive'>
                      <table class='table align-items-center mb-0'>
                        <thead>
                          <tr>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Completion</th>
                            <th class='text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2'>Benih</th>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Rockwool</th>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>PH A</th>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>PH B</th>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Vitamin A</th>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Vitamin B</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
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
                            <td class='align-middle text-center text-sm'>
                              <span class='text-xs font-weight-bold'> ".$row['jumlah_benih']." </span>
                            </td>
                            <td class='align-middle text-center text-sm'>
                              <span class='text-xs font-weight-bold'> ".$row['jumlah_rockwool']." </span>
                            </td>
                            <td class='align-middle text-center text-sm'>
                              <span class='text-xs font-weight-bold'> ".$row['jumlah_phA']." </span>
                            </td>
                            <td class='align-middle text-center text-sm'>
                              <span class='text-xs font-weight-bold'> ".$row['jumlah_phB']." </span>
                            </td>
                            <td class='align-middle text-center text-sm'>
                              <span class='text-xs font-weight-bold'> ".$row['jumlah_vitA']." </span>
                            </td>
                            <td class='align-middle text-center text-sm'>
                              <span class='text-xs font-weight-bold'> ".$row['jumlah_vitB']." </span>
                            </td>
                          </tr>
                        </tbody>
                      </table>
      
                  <hr class='horizontal dark'>
                  
                  <div class='row'>
                      <div class='col-6'>
                        <p class='text-secondary text-sm font-weight-bold mb-0'>Status</p>
                        <h6 class='text-sm mb-2'>
                          <div class='badge rounded-pill bg-gradient-".$row['stat']."'> ".$row['stat']." </div>
                        </h6>
                      </div>
                      <div class='col-6 text-end'>
                        <p class='text-secondary text-sm font-weight-bold mb-0'>Estimasi Panen</p>
                        <h6 class='text-sm mb-2'>".$row['estimated']."</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            <!-- Modal timeline -->

            <div class='col-md-12'>
              <div class='modal fade' id='timeline_panen".$row['id_order']."' tabindex='-1' role='dialog' aria-labelledby='timeline' aria-hidden='true'>

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
                                  <p class='text-secondary font-weight-bold text-xs mb-2 mb-0'>22 DECEMBER</p>
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
              </div>
            </div>

            <!-- gagal -->

            <div class="row tab-pane fade show row" id="pills-gagal" role="tabpanel" aria-labelledby="pills-proses-tab">
              <div class="row">
              <?php

              $sql = "SELECT *, c.nama_customer, DATE_ADD(o.tanggal_tanam, INTERVAL m.panen_sayur DAY) as estimated,

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
                WHEN o.status_order = 1 THEN 25
                WHEN o.status_order = 2 THEN 50
                WHEN o.status_order = 3 THEN 100
                WHEN o.status_order = 4 THEN 100
                ELSE 'Non Active'
              END AS progress

              FROM `order_sayur` o, `customer` c, master_sayur m, master_jenis_sayur j WHERE o.id_customer = '".$_SESSION['id_admin']."' && c.id_customer = '".$_SESSION['id_admin']."' && o.id_sayur = m.id_sayur && m.id_jenis_sayur = j.id_jenis_sayur && status_order = 5";
              $result = $mysqli -> query($sql);
              if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
              echo "
              <div class='col-sm-12 col-lg-4 mb-4'>
              <div class='card col-12'>
                <div class='card-body p-3'>
                  <div class='d-flex'>
                    <div class='avatar avatar-xl bg-gradient-success border-radius-md p-2'>
                      <img src='assets/img/sayuran/bayam.png' alt='asana_logo'>
                    </div>
                    <div class='ms-3 my-auto'>
                      <p class='text-gradient text-dark mb-2 text-sm'>".$row['nama_jenis_sayur']."</p>
                      <h6>".$row['nama_sayur']."</h6>
                    </div>
                    <div class='ms-auto'>
                        <div class='dropdown'>
                          <a class='btn bg-gradient-success btn-xs mb-0' data-bs-toggle='modal' data-bs-target='#timeline_gagal".$row['id_order']."'>
                            <i class='fa-duotone fa-timeline'></i>
                          </a>
                        </div>
                      </div>
                    </div>

                    <div class='col-sm-12 mt-3'>
                      <div class='row'>
                        <div class='col-sm-7'>
                          <img src='https://cdn3d.iconscout.com/3d/premium/thumb/actor-5691555-4741096.png' alt='' width='25px' class='mb-2'> ".$row['nama_customer']."
                        </div>

                        <div class='col-sm-5 text-end'>
                          <img src='https://cdn3d.iconscout.com/3d/premium/thumb/calendar-4059077-3364000.png' alt='' width='25px' class='mb-2'> 22-11-2022
                        </div>
                      </div>
                    </div>

                    <div class='col-sm-12 mt-3'>
                      <div class='row'>
                        <div class='col-sm-7'>
                          <img src='https://cdn3d.iconscout.com/3d/premium/thumb/rupiah-gold-coin-5356099-4486968.png' alt='' width='30px' class='mb-2'> ".number_format($row['harga_total'], 2,",",".")."
                        </div>

                        <div class='col-sm-5 text-end'>
                          <img src='https://cdn3d.iconscout.com/3d/premium/thumb/weight-scale-6849555-5607208.png' alt='' width='35px' class='mb-2'> ".$row['jumlah']."
                        </div>
                      </div>
                    </div>
                    
                    <div class='table-responsive'>
                      <table class='table align-items-center mb-0'>
                        <thead>
                          <tr>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Completion</th>
                            <th class='text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2'>Benih</th>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Rockwool</th>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>PH A</th>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>PH B</th>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Vitamin A</th>
                            <th class='text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7'>Vitamin B</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
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
                            <td class='align-middle text-center text-sm'>
                              <span class='text-xs font-weight-bold'> ".$row['jumlah_benih']." </span>
                            </td>
                            <td class='align-middle text-center text-sm'>
                              <span class='text-xs font-weight-bold'> ".$row['jumlah_rockwool']." </span>
                            </td>
                            <td class='align-middle text-center text-sm'>
                              <span class='text-xs font-weight-bold'> ".$row['jumlah_phA']." </span>
                            </td>
                            <td class='align-middle text-center text-sm'>
                              <span class='text-xs font-weight-bold'> ".$row['jumlah_phB']." </span>
                            </td>
                            <td class='align-middle text-center text-sm'>
                              <span class='text-xs font-weight-bold'> ".$row['jumlah_vitA']." </span>
                            </td>
                            <td class='align-middle text-center text-sm'>
                              <span class='text-xs font-weight-bold'> ".$row['jumlah_vitB']." </span>
                            </td>
                          </tr>
                        </tbody>
                      </table>
      
                  <hr class='horizontal dark'>
                  
                  <div class='row'>
                      <div class='col-6'>
                        <p class='text-secondary text-sm font-weight-bold mb-0'>Status</p>
                        <h6 class='text-sm mb-2'>
                          <div class='badge rounded-pill bg-gradient-".$row['stat']."'> ".$row['stat']." </div>
                        </h6>
                      </div>
                      <div class='col-6 text-end'>
                        <p class='text-secondary text-sm font-weight-bold mb-0'>Estimasi Panen</p>
                        <h6 class='text-sm mb-2'>".$row['estimated']."</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            <!-- Modal timeline -->

            <div class='col-md-12'>
              <div class='modal fade' id='timeline_gagal".$row['id_order']."' tabindex='-1' role='dialog' aria-labelledby='timeline' aria-hidden='true'>

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
                                  <p class='text-secondary font-weight-bold text-xs mb-2 mb-0'>22 DECEMBER</p>
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
              </div>
            </div>

          </div>
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
            <span class="badge filter bg-gradient-success active" data-color="primary" onclick="sidebarColor(this)"></span>
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
                  <div class="col-sm-12">
                  <div class="row">
                    <div class="col-10">
                      <h3 class="font-weight-bolder text-success text-gradient">Linimasa Pertumbuhan</h3>
                    </div>
                    <div class="col-2 text-end">
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                  </div>
                </div>
                </div>
                <div class="card-body p-3">
                  <div class="timeline timeline-one-side">
                    <div class="timeline-block mb-3">
                      <span class="timeline-step">
                        <img src="https://cdn3d.iconscout.com/3d/premium/thumb/seed-bag-6148684-5024969.png" width="25px" alt="">
                      </span>
                      <div class="timeline-content">
                        <h6 class="text-dark text-sm font-weight-bold mb-2">Penyemaian</h6>
                        <!-- <h6 class="rounded-pill badge bg-gradient-warning mb-0">Penyemaian</h6> -->
                        <p class="text-secondary font-weight-bold text-xs mb-2 mb-0">22 DECEMBER</p>
                        <p class="text-secondary font-weight-bold text-xs mb-2 mb-0"><i class="fa-duotone fa-xmark"></i>&nbsp;&nbsp;3 Gagal</p>
                        <p class="text-secondary font-weight-bold text-xs mb-2 mb-0"><i class="fa-duotone fa-seedling"></i> 15 Berjalan</p>

                        <!-- <p class="text-secondary font-weight-bold text-xs mb-2 mt-2 mb-0">
                          <i class="fa-duotone fa-xmark"></i> 3 Gagal &nbsp;
                          <i class="fa-duotone fa-timer"></i> 2 Terlambat &nbsp;
                          <i class="fa-duotone fa-seedling"></i> 15 Berjalan &nbsp;
                        </p> -->
                      </div>
                    </div>
                    <div class="timeline-block mb-3">
                      <span class="timeline-step">
                        <img src="https://cdn3d.iconscout.com/3d/premium/thumb/sowing-seeds-5697538-4754339.png" width="25px" alt="">
                      </span>
                      <div class="timeline-content">
                        <h6 class="text-dark text-sm font-weight-bold mb-0">Pembibitan</h6>
                        <button class="btn bg-gradient-success mt-1" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">
                          <i class="fa-duotone fa-check-double"></i>
                        </button>
                      </div>
                    </div>
                    <div class="timeline-block mb-3">
                      <span class="timeline-step">
                        <img src="https://cdn3d.iconscout.com/3d/premium/thumb/carrot-farming-3938179-3259175@0.png" width="25px" alt="">
                      </span>
                      <div class="timeline-content">
                        <h6 class="text-dark text-sm font-weight-bold mb-0">Panen</h6>
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

  <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2">Input Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="">Gagal</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><img src="https://cdn3d.iconscout.com/3d/premium/thumb/grain-4752587-3950397.png" width="20px" alt=""></span>
                    <input type="number" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" data-bs-target="#timeline" data-bs-toggle="modal" data-bs-dismiss="modal">Input Data</button>
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
            label: "Mobile apps",
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
            label: "Websites",
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

  <script>
    $(document).ready(function(e) {
        $(".showonhover").click(function(){
			$("#selectfile").trigger('click');
		});
    });


var input = document.querySelector('input[type=file]'); // see Example 4

input.onchange = function () {
  var file = input.files[0];

  drawOnCanvas(file);   // see Example 6
  // displayAsImage(file); // see Example 7
};

function drawOnCanvas(file) {
  var reader = new FileReader();

  reader.onload = function (e) {
    var dataURL = e.target.result,
        c = document.querySelector('canvas'), // see Example 4
        ctx = c.getContext('2d'),
        img = new Image();

    img.onload = function() {
      c.width = img.width;
      c.height = img.height;
      ctx.drawImage(img, 0, 0);
    };

    img.src = dataURL;
  };

  reader.readAsDataURL(file);
}

function displayAsImage(file) {
  var imgURL = URL.createObjectURL(file),
      img = document.createElement('img');

  img.onload = function() {
    URL.revokeObjectURL(imgURL);
  };

  img.src = imgURL;
  document.body.appendChild(img);
}

$("#upfile1").click(function () {
    $("#file1").trigger('click');
});
$("#upfile2").click(function () {
    $("#file2").trigger('click');
});
$("#upfile3").click(function () {
    $("#file3").trigger('click');
});
  </script>
</body>

</html>