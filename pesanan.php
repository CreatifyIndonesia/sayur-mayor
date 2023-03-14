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

  $page = 'pesanan'; 
  require_once('php/navbar.php');

  if (isset($_POST['submit_tanam'])) {
  
      $jumlah_benih = $_POST ['jumlah_benih'];
      $jumlah_rockwool = $_POST ['jumlah_rockwool'];
      $jumlah_pha = $_POST ['jumlah_pha'];
      $jumlah_phb = $_POST ['jumlah_phb'];
      $jumlah_vita = $_POST ['jumlah_vita'];
      $jumlah_vitb = $_POST ['jumlah_vitb'];
      $id_order = $_POST ['id_order'];
      $id_petani = $_POST ['id_petani'];

      $sql = "UPDATE `order_sayur` SET id_petani = '$id_petani', jumlah_benih = '$jumlah_benih', jumlah_rockwool = '$jumlah_rockwool', jumlah_pha = '$jumlah_pha', jumlah_phb = '$jumlah_phb', jumlah_vita = '$jumlah_vita', jumlah_vitb = '$jumlah_vitb', updated_order = sysdate(), status_order = '1' WHERE id_order = '$id_order'";
      
      if ($mysqli->query($sql) === true) {
          echo "
          <div class='alert alert-success bg-gradient-success alert-dismissible fade show w-50 ms-auto me-auto d-block mt-4 text-white fixed-top' role='alert' style='z-index: 99999;' role='alert'>
          <span class='alert-icon'><i class='fa-duotone fa-thumbs-up'></i></span>
          <span class='alert-text'><strong>Project sudah anda terima!</strong> Segera tanam sayurmu sekarang!</span>
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

<body class="g-sidenav-show  bg-gray-100">

<style>
    .bg-gradient-Diterima {
      background-color: #82d616;
    }
    .bg-gradient-Orderan {
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
          <h6 class='font-weight-bolder mb-0'><?php if($page == 'pesanan') {echo 'Pesanan';}?></h6>
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

      <div class="col-12 mt-4">
        <div class="card mb-4">
          <div class="card-header pb-0 p-3">
            <h6 class="mb-1">Pesanan</h6>
            <p class="text-sm">Informasi Daftar Pesanan</p>
          </div>
          <div class="card-body p-3 pt-0">

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
                    <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center"  id="pills-proses-tab" data-bs-toggle="pill" data-bs-target="#pills-proses" role="tab" aria-controls="pills-sawi" aria-selected="false">
                      <img src="https://cdn3d.iconscout.com/3d/premium/thumb/scoop-boy-5083087-4444693.png" width="25px" alt="">
                      <span class="ms-2">Sedang Berjalan</span>
                    </a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center" id="pills-panen-tab" data-bs-toggle="pill" data-bs-target="#pills-panen" role="tab" aria-controls="pills-selada" aria-selected="false">
                      <img src="https://cdn3d.iconscout.com/3d/premium/thumb/plant-6785528-5552714.png" width="25px" alt="">
                      <span class="ms-2">Panen</span>
                    </a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center" id="pills-gagal-tab" data-bs-toggle="pill" data-bs-target="#pills-gagal" role="tab" aria-controls="pills-bayam" aria-selected="false">
                      <img src="https://cdn3d.iconscout.com/3d/premium/thumb/grain-4752587-3950397.png" width="25px" alt="">
                      <span class="ms-2">Gagal</span>
                    </a>
                  </li>
                </ul>
  
              </div>
            </div>
            
            <!-- <div class="nav-wrapper position-relative end-0 mb-4">
              <ul class="nav nav-pills nav-fill p-1" role="tablist">
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="semua" href="#profile-semua" id="pills-semua-tab" data-bs-toggle="pill" data-bs-target="#pills-semua" role="tab" aria-controls="pills-semua" aria-selected="true">
                  <i class="ni ni-badge text-sm me-2"></i> Semua
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="semua" href="#profile-sawi" id="pills-sawi-tab" data-bs-toggle="pill" data-bs-target="#pills-sawi" role="tab" aria-controls="pills-home" aria-selected="false">
                    <i class="ni ni-laptop text-sm me-2"></i> Sawi
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="bayam" href="#dashboard-tabs-icons" role="tab" aria-controls="code" aria-selected="false">
                    <i class="ni ni-laptop text-sm me-2"></i> Bayam
                  </a>
                </li>
              </ul>
            </div> -->

            <div class="tab-content" id="pills-tabContent">

              <div class="tab-pane fade show active" id="pills-semua" role="tabpanel" aria-labelledby="pills-semua-tab">
                <div class="col-sm-12 mt-4">
                  <div class="row">
                    
                    <?php
                    $sql = "SELECT *, m.gambar_sayur, m.nama_sayur, j.nama_jenis_sayur, c.nama_customer, m.semai_sayur, m.pembibitan_sayur, m.panen_sayur,
                    CASE
                      WHEN o.status_order = 0 THEN 'Orderan'
                      WHEN o.status_order = 1 THEN 'Diterima'
                      WHEN o.status_order = 2 THEN 'Penyemaian'
                      WHEN o.status_order = 3 THEN 'Pembibitan'
                      WHEN o.status_order = 4 THEN 'Panen'
                      WHEN o.status_order = 5 THEN 'Gagal'
                      ELSE 'Non Active'
                    END AS stat
                    FROM `order_sayur` o, `master_sayur` m, `master_jenis_sayur` j, customer c WHERE o.id_customer = c.id_customer && m.id_sayur = o.id_sayur && m.id_jenis_sayur = j.id_jenis_sayur && id_petani = '" .$_SESSION['id_admin']."' || id_petani = '' group by id_order order by status_order";
                    
                    $result = $mysqli -> query($sql);
                    if ($result->num_rows > 0) { ?>
                    <?php while ($row = $result->fetch_assoc()) { ?>

                  <div class="col-sm-12 col-md-4 col-xl-3 mb-xl-0 mb-4">
                    <div class="card card-blog card-plain">
                      <div class="position-relative">
                        <a class="d-block shadow-xl border-radius-xl">
                          <img src='../sayur-admin/<?php echo "".$row['gambar_sayur'].""; ?>' alt="" class="img-fluid shadow border-radius-xl" style="height: 140px; width: 100%;">
                        </a>
                      </div>
                      <div class="card-body px-1 pb-0">
                        <p class="text-gradient text-dark mb-2 text-sm"><?php echo "".$row['nama_jenis_sayur'].""; ?></p>
                        <a href="javascript:;">
                          <h5>
                            <?php echo "".$row['nama_sayur'].""; ?> <span class="badge bg-gradient-<?php echo "".$row['stat'].""; ?>" style="font-size: 10px;"><?php echo "".$row['stat'].""; ?></span>
                          </h5>
                        </a>
                        <p class="text-sm">
                        <img src="https://cdn3d.iconscout.com/3d/premium/thumb/actor-5691555-4741096.png" alt="" width="25px" class="mb-2"> <?php echo "".$row['nama_customer'].""; ?><br>
                        <img src="https://cdn3d.iconscout.com/3d/premium/thumb/calendar-4059077-3364000.png" alt="" width="25px" class="mb-2"> <?php echo "".$row['created_order'].""; ?><br>
                        <img src="https://cdn3d.iconscout.com/3d/free/thumb/rupiah-coin-4830438-4018492.png" alt="" width="25px"> Rp<?php echo " ".number_format($row['harga_total'], 2,",",".")." "; ?><br>
                        <img src='https://cdn3d.iconscout.com/3d/premium/thumb/weight-scale-6849555-5607208.png' alt='' width='25px'> <?php echo "".$row['jumlah'].""; ?>
                            <div class="text-center row">
                                <div class="col-4 p-0">
                                    <img src="https://cdn3d.iconscout.com/3d/premium/thumb/seed-bag-6148684-5024969.png" width="15px" alt=""> <?php echo "".$row['semai_sayur'].""; ?> Hari
                                </div>
                                <div class="col-4 p-0">
                                  <img src="https://cdn3d.iconscout.com/3d/premium/thumb/sowing-seeds-5697538-4754339.png" width="15px" alt="" class="pb-1"> <?php echo "".$row['pembibitan_sayur'].""; ?> Hari
                                </div>
                                <div class="col-4 p-0">
                                    <img src="https://cdn3d.iconscout.com/3d/premium/thumb/carrot-farming-3938179-3259175@0.png" width="15px" alt="" class="pb-1"> <?php echo "".$row['panen_sayur'].""; ?> Hari
                                </div>
                            </div>
                        </p>
                        <div class="d-flex align-items-center justify-content-b">

                            <?php if($row['status_order'] == 0) {
                                echo "
                                <button class='btn btn-outline-primary btn-sm mb-4 w-100' data-bs-toggle='modal' data-bs-target='#tanam-aku".$row['id_order']."'>
                                <i class='fa-duotone fa-seedling' style='font-size: 15px;'></i>
                                &nbsp;&nbsp;Terima Proyek
                                </button>
                                ";
                              }
                            ?>
                        </div>
                      </div>
                    </div>
                    <!-- Modal tanam aku -->
                    <div class="col-md-12">
                      <div class="modal fade" id="tanam-aku<?php echo "".$row['id_order'].""; ?>" tabindex="-1" role="dialog" aria-labelledby="tanam-aku" aria-hidden="true">

                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-body p-0">
                              <div class="card card-plain">
                                <div class="card-header pb-0 text-left">
                                  <div class="col-sm-12">
                                    <div class="row">
                                      <div class="col-10">
                                        <h3 class="font-weight-bolder text-success text-gradient">Tanam aku!</h3>
                                        <p class="mb-0">Tanam aku sampai aku panen :)</p>
                                      </div>
                                      <div class="col-2 text-end">
                                      <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-sm-6">
                                        <img src="../sayur-admin/<?php echo "".$row['gambar_sayur'].""; ?>" width="100%" alt="" class="rounded mb-3">
                                    </div>
                                    <div class="col-sm-6 p-4 pt-0">
                                        <div class="text-center row bg-gray-100 rounded">
                                            <div class="col-4 p-0 mt-1">
                                                <h5>
                                                    <img src="https://cdn3d.iconscout.com/3d/premium/thumb/seed-bag-6148684-5024969.png" width="15px" alt=""> <?php echo "".$row['semai_sayur'].""; ?> Hari
                                                </h5>
                                            </div>
                                            <div class="col-4 p-0 mt-1">
                                                <h5>
                                                    <img src="https://cdn3d.iconscout.com/3d/premium/thumb/sowing-seeds-5697538-4754339.png" width="15px" alt="" class="pb-1"> <?php echo "".$row['pembibitan_sayur'].""; ?> Hari
                                                </h5>
                                            </div>
                                            <div class="col-4 p-0 mt-1">
                                                <h5>
                                                    <img src="https://cdn3d.iconscout.com/3d/premium/thumb/carrot-farming-3938179-3259175@0.png" width="15px" alt="" class="pb-1"> <?php echo "".$row['panen_sayur'].""; ?> Hari
                                                </h5>
                                            </div>
                                        </div>
                                        <p class="mt-3">
                                        <img src="https://cdn3d.iconscout.com/3d/premium/thumb/actor-5691555-4741096.png" alt="" width="45px" class="mb-3">&nbsp;&nbsp;&nbsp;<?php echo "".$row['nama_customer'].""; ?><br>
                                        <img src="https://cdn3d.iconscout.com/3d/premium/thumb/calendar-4059077-3364000.png" alt="" width="45px" class="mb-3">&nbsp;&nbsp;&nbsp;<?php echo "".$row['created_order'].""; ?><br>
                                        <img src="https://cdn3d.iconscout.com/3d/free/thumb/rupiah-coin-4830438-4018492.png" alt="" width="45px">&nbsp;&nbsp;&nbsp;Rp<?php echo " ".number_format($row['harga_total'], 2,",",".")." "; ?><br>
                                        <img src='https://cdn3d.iconscout.com/3d/premium/thumb/weight-scale-6849555-5607208.png' alt='' width='45px'> <?php echo "".$row['jumlah'].""; ?>
                                        </p>
                                    </div>
                                  </div>

                                    <div class="col-sm-12">
                                      <div class="row mt-3">
                                        <form role="form text-left" form action="#" method="POST" enctype="multipart/form-data">
                                          <div class="row">
                                            <div class="col-4">
                                                <label>Jumlah Benih (<?php echo "".$row['nama_sayur'].""?>)</label>
                                                <div class="input-group mb-3">
                                                    <input type="number" class="form-control" name="jumlah_benih">
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <label>Jumlah Rockwool</label>
                                                <div class="input-group mb-3">
                                                    <input type="number" class="form-control" name="jumlah_rockwool">
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <label>Jumlah PH A (ml)</label>
                                                <div class="input-group mb-3">
                                                    <input type="number" class="form-control" name="jumlah_pha">
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <label>Jumlah PH B (ml)</label>
                                                <div class="input-group mb-3">
                                                    <input type="number" class="form-control" name="jumlah_phb">
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <label>Jumlah Vitamin A (ml)</label>
                                                <div class="input-group mb-3">
                                                    <input type="number" class="form-control" name="jumlah_vita">
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <label>Jumlah Vitamin B (ml)</label>
                                                <div class="input-group mb-3">
                                                    <input type="number" class="form-control" name="jumlah_vitb">
                                                    <input type="hidden" class="form-control" value="<?php echo "".$row['id_order'].""; ?>" name="id_order">
                                                    <input type="hidden" class="form-control" value="<?php echo "".$_SESSION['id_admin'].""; ?>" name="id_petani">
                                                </div>
                                            </div>
                                          </div>
                                          <button type="submit" class="btn bg-gradient-success w-100 mt-2" name="submit_tanam">Tanam Aku</button>
                                        </form>
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
                    <?php } ?>
                  <?php } ?>
                </div>
              </div>
            </div>

              <!-- Sedang Berjalan -->

              <div class="row tab-pane fade show row" id="pills-proses" role="tabpanel" aria-labelledby="pills-proses-tab">
                <div class="col-sm12 mt-4">
                  <div class="row">

                <?php
                    $sql = "SELECT *, m.gambar_sayur, m.nama_sayur, j.nama_jenis_sayur, c.nama_customer, m.semai_sayur, m.pembibitan_sayur, m.panen_sayur,
                    CASE
                      WHEN o.status_order = 0 THEN 'Orderan'
                      WHEN o.status_order = 1 THEN 'Diterima'
                      WHEN o.status_order = 2 THEN 'Penyemaian'
                      WHEN o.status_order = 3 THEN 'Pembibitan'
                      WHEN o.status_order = 4 THEN 'Panen'
                      WHEN o.status_order = 5 THEN 'Gagal'
                      ELSE 'Non Active'
                    END AS stat
                    FROM `order_sayur` o, `master_sayur` m, `master_jenis_sayur` j, customer c WHERE o.id_customer = c.id_customer && m.id_sayur = o.id_sayur && m.id_jenis_sayur = j.id_jenis_sayur && id_petani = '" .$_SESSION['id_admin']."' group by id_order order by status_order";
                    $result = $mysqli -> query($sql);
                    if ($result->num_rows > 0) { ?>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                      
                      <div class="col-sm-12 col-md-4 col-xl-3 mb-xl-0 mb-4">
                    <div class="card card-blog card-plain">
                      <div class="position-relative">
                        <a class="d-block shadow-xl border-radius-xl">
                          <img src='../sayur-admin/<?php echo "".$row['gambar_sayur'].""; ?>' alt="" class="img-fluid shadow border-radius-xl" style="height: 140px; width: 100%;">
                        </a>
                      </div>
                      <div class="card-body px-1 pb-0">
                        <p class="text-gradient text-dark mb-2 text-sm"><?php echo "".$row['nama_jenis_sayur'].""; ?></p>
                        <a href="javascript:;">
                          <h5>
                            <?php echo "".$row['nama_sayur'].""; ?> <span class="badge bg-gradient-<?php echo "".$row['stat'].""; ?>" style="font-size: 10px;"><?php echo "".$row['stat'].""; ?></span>
                          </h5>
                        </a>
                        <p class="text-sm">
                        <img src="https://cdn3d.iconscout.com/3d/premium/thumb/actor-5691555-4741096.png" alt="" width="25px" class="mb-2"> <?php echo "".$row['nama_customer'].""; ?><br>
                        <img src="https://cdn3d.iconscout.com/3d/premium/thumb/calendar-4059077-3364000.png" alt="" width="25px" class="mb-2"> <?php echo "".$row['created_order'].""; ?><br>
                        <img src="https://cdn3d.iconscout.com/3d/free/thumb/rupiah-coin-4830438-4018492.png" alt="" width="25px"> Rp<?php echo " ".number_format($row['harga_total'], 2,",",".")." "; ?><br>
                        <img src='https://cdn3d.iconscout.com/3d/premium/thumb/weight-scale-6849555-5607208.png' alt='' width='25px'> <?php echo "".$row['jumlah'].""; ?>
                            <div class="text-center row">
                                <div class="col-4 p-0">
                                    <img src="https://cdn3d.iconscout.com/3d/premium/thumb/seed-bag-6148684-5024969.png" width="15px" alt=""> <?php echo "".$row['semai_sayur'].""; ?> Hari
                                </div>
                                <div class="col-4 p-0">
                                  <img src="https://cdn3d.iconscout.com/3d/premium/thumb/sowing-seeds-5697538-4754339.png" width="15px" alt="" class="pb-1"> <?php echo "".$row['pembibitan_sayur'].""; ?> Hari
                                </div>
                                <div class="col-4 p-0">
                                    <img src="https://cdn3d.iconscout.com/3d/premium/thumb/carrot-farming-3938179-3259175@0.png" width="15px" alt="" class="pb-1"> <?php echo "".$row['panen_sayur'].""; ?> Hari
                                </div>
                            </div>
                        </p>
                        <div class="d-flex align-items-center justify-content-b">

                            <?php if($row['status_order'] == 0) {
                                echo "
                                <button class='btn btn-outline-primary btn-sm mb-4 w-100' data-bs-toggle='modal' data-bs-target='#tanam-aku".$row['id_order']."'>
                                <i class='fa-duotone fa-seedling' style='font-size: 15px;'></i>
                                &nbsp;&nbsp;Terima Proyek
                                </button>
                                ";
                              }
                            ?>
                        </div>
                      </div>
                    </div>
                    </div>
                    <?php } ?>
                  <?php } ?>
                </div>
              </div>
            </div>

              <!-- Panen -->

              <div class="row tab-pane fade show row" id="pills-panen" role="tabpanel" aria-labelledby="pills-proses-tab">
                <div class="col-sm12 mt-4">
                  <div class="row">

                <?php
                    $sql = "SELECT *, m.gambar_sayur, m.nama_sayur, j.nama_jenis_sayur, c.nama_customer, m.semai_sayur, m.pembibitan_sayur, m.panen_sayur,
                    CASE
                      WHEN o.status_order = 0 THEN 'Orderan'
                      WHEN o.status_order = 1 THEN 'Diterima'
                      WHEN o.status_order = 2 THEN 'Penyemaian'
                      WHEN o.status_order = 3 THEN 'Pembibitan'
                      WHEN o.status_order = 4 THEN 'Panen'
                      WHEN o.status_order = 5 THEN 'Gagal'
                      ELSE 'Non Active'
                    END AS stat
                    FROM `order_sayur` o, `master_sayur` m, `master_jenis_sayur` j, customer c WHERE o.id_customer = c.id_customer && m.id_sayur = o.id_sayur && m.id_jenis_sayur = j.id_jenis_sayur && id_petani = '" .$_SESSION['id_admin']."' && status_order = 4 group by id_order order by status_order";
                    $result = $mysqli -> query($sql);
                    if ($result->num_rows > 0) { ?>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                      
                      <div class="col-sm-12 col-md-4 col-xl-3 mb-xl-0 mb-4">
                    <div class="card card-blog card-plain">
                      <div class="position-relative">
                        <a class="d-block shadow-xl border-radius-xl">
                          <img src='../sayur-admin/<?php echo "".$row['gambar_sayur'].""; ?>' alt="" class="img-fluid shadow border-radius-xl" style="height: 140px; width: 100%;">
                        </a>
                      </div>
                      <div class="card-body px-1 pb-0">
                        <p class="text-gradient text-dark mb-2 text-sm"><?php echo "".$row['nama_jenis_sayur'].""; ?></p>
                        <a href="javascript:;">
                          <h5>
                            <?php echo "".$row['nama_sayur'].""; ?> <span class="badge bg-gradient-<?php echo "".$row['stat'].""; ?>" style="font-size: 10px;"><?php echo "".$row['stat'].""; ?></span>
                          </h5>
                        </a>
                        <p class="text-sm">
                        <img src="https://cdn3d.iconscout.com/3d/premium/thumb/actor-5691555-4741096.png" alt="" width="25px" class="mb-2"> <?php echo "".$row['nama_customer'].""; ?><br>
                        <img src="https://cdn3d.iconscout.com/3d/premium/thumb/calendar-4059077-3364000.png" alt="" width="25px" class="mb-2"> <?php echo "".$row['created_order'].""; ?><br>
                        <img src="https://cdn3d.iconscout.com/3d/free/thumb/rupiah-coin-4830438-4018492.png" alt="" width="25px"> Rp<?php echo " ".number_format($row['harga_total'], 2,",",".")." "; ?><br>
                        <img src='https://cdn3d.iconscout.com/3d/premium/thumb/weight-scale-6849555-5607208.png' alt='' width='25px'> <?php echo "".$row['jumlah'].""; ?>
                            <div class="text-center row">
                                <div class="col-4 p-0">
                                    <img src="https://cdn3d.iconscout.com/3d/premium/thumb/seed-bag-6148684-5024969.png" width="15px" alt=""> <?php echo "".$row['semai_sayur'].""; ?> Hari
                                </div>
                                <div class="col-4 p-0">
                                  <img src="https://cdn3d.iconscout.com/3d/premium/thumb/sowing-seeds-5697538-4754339.png" width="15px" alt="" class="pb-1"> <?php echo "".$row['pembibitan_sayur'].""; ?> Hari
                                </div>
                                <div class="col-4 p-0">
                                    <img src="https://cdn3d.iconscout.com/3d/premium/thumb/carrot-farming-3938179-3259175@0.png" width="15px" alt="" class="pb-1"> <?php echo "".$row['panen_sayur'].""; ?> Hari
                                </div>
                            </div>
                        </p>
                        <div class="d-flex align-items-center justify-content-b">

                            <?php if($row['status_order'] == 0) {
                                echo "
                                <button class='btn btn-outline-primary btn-sm mb-4 w-100' data-bs-toggle='modal' data-bs-target='#tanam-aku".$row['id_order']."'>
                                <i class='fa-duotone fa-seedling' style='font-size: 15px;'></i>
                                &nbsp;&nbsp;Terima Proyek
                                </button>
                                ";
                              }
                            ?>
                        </div>
                      </div>
                    </div>
                    </div>
                    <?php } ?>
                  <?php } ?>
                </div>
              </div>
              </div>

              <!-- Gagal -->

              <div class="row tab-pane fade show row" id="pills-gagal" role="tabpanel" aria-labelledby="pills-proses-tab">
                <div class="col-sm12 mt-4">
                  <div class="row">

                <?php
                    $sql = "SELECT *, m.gambar_sayur, m.nama_sayur, j.nama_jenis_sayur, c.nama_customer, m.semai_sayur, m.pembibitan_sayur, m.panen_sayur,
                    CASE
                      WHEN o.status_order = 0 THEN 'Orderan'
                      WHEN o.status_order = 1 THEN 'Diterima'
                      WHEN o.status_order = 2 THEN 'Penyemaian'
                      WHEN o.status_order = 3 THEN 'Pembibitan'
                      WHEN o.status_order = 4 THEN 'Panen'
                      WHEN o.status_order = 5 THEN 'Gagal'
                      ELSE 'Non Active'
                    END AS stat
                    FROM `order_sayur` o, `master_sayur` m, `master_jenis_sayur` j, customer c WHERE o.id_customer = c.id_customer && m.id_sayur = o.id_sayur && m.id_jenis_sayur = j.id_jenis_sayur && id_petani = '" .$_SESSION['id_admin']."' && status_order = 5 group by id_order order by status_order";
                    $result = $mysqli -> query($sql);
                    if ($result->num_rows > 0) { ?>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                      
                      <div class="col-sm-12 col-md-4 col-xl-3 mb-xl-0 mb-4">
                    <div class="card card-blog card-plain">
                      <div class="position-relative">
                        <a class="d-block shadow-xl border-radius-xl">
                          <img src='../sayur-admin/<?php echo "".$row['gambar_sayur'].""; ?>' alt="" class="img-fluid shadow border-radius-xl" style="height: 140px; width: 100%;">
                        </a>
                      </div>
                      <div class="card-body px-1 pb-0">
                        <p class="text-gradient text-dark mb-2 text-sm"><?php echo "".$row['nama_jenis_sayur'].""; ?></p>
                        <a href="javascript:;">
                          <h5>
                            <?php echo "".$row['nama_sayur'].""; ?> <span class="badge bg-gradient-<?php echo "".$row['stat'].""; ?>" style="font-size: 10px;"><?php echo "".$row['stat'].""; ?></span>
                          </h5>
                        </a>
                        <p class="text-sm">
                        <img src="https://cdn3d.iconscout.com/3d/premium/thumb/actor-5691555-4741096.png" alt="" width="25px" class="mb-2"> <?php echo "".$row['nama_customer'].""; ?><br>
                        <img src="https://cdn3d.iconscout.com/3d/premium/thumb/calendar-4059077-3364000.png" alt="" width="25px" class="mb-2"> <?php echo "".$row['created_order'].""; ?><br>
                        <img src="https://cdn3d.iconscout.com/3d/free/thumb/rupiah-coin-4830438-4018492.png" alt="" width="25px"> Rp<?php echo " ".number_format($row['harga_total'], 2,",",".")." "; ?><br>
                        <img src='https://cdn3d.iconscout.com/3d/premium/thumb/weight-scale-6849555-5607208.png' alt='' width='25px'> <?php echo "".$row['jumlah'].""; ?>
                            <div class="text-center row">
                                <div class="col-4 p-0">
                                    <img src="https://cdn3d.iconscout.com/3d/premium/thumb/seed-bag-6148684-5024969.png" width="15px" alt=""> <?php echo "".$row['semai_sayur'].""; ?> Hari
                                </div>
                                <div class="col-4 p-0">
                                  <img src="https://cdn3d.iconscout.com/3d/premium/thumb/sowing-seeds-5697538-4754339.png" width="15px" alt="" class="pb-1"> <?php echo "".$row['pembibitan_sayur'].""; ?> Hari
                                </div>
                                <div class="col-4 p-0">
                                    <img src="https://cdn3d.iconscout.com/3d/premium/thumb/carrot-farming-3938179-3259175@0.png" width="15px" alt="" class="pb-1"> <?php echo "".$row['panen_sayur'].""; ?> Hari
                                </div>
                            </div>
                        </p>
                        <div class="d-flex align-items-center justify-content-b">

                            <?php if($row['status_order'] == 0) {
                                echo "
                                <button class='btn btn-outline-primary btn-sm mb-4 w-100' data-bs-toggle='modal' data-bs-target='#tanam-aku".$row['id_order']."'>
                                <i class='fa-duotone fa-seedling' style='font-size: 15px;'></i>
                                &nbsp;&nbsp;Terima Proyek
                                </button>
                                ";
                              }
                            ?>
                        </div>
                      </div>
                    </div>
                    </div>
                    <?php } ?>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-md-12">
        <div class="modal fade" id="form-modal" tabindex="-1" role="dialog" aria-labelledby="form-modal" aria-hidden="true">

          <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
              <div class="modal-body p-0">
                <div class="card card-plain">
                  <div class="card-header pb-0 text-left">
                    <h3 class="font-weight-bolder text-success text-gradient">Sayur apa nich?</h3>
                    <p class="mb-0">Masukan sayur baru untuk siap ditanam :)</p>
                  </div>
                  <div class="card-body">
                    <form role="form text-left">
                      <label>Unggah Gambar</label>
                      <div class="card h-100 card-plain border">
                        <div class="card-body d-flex flex-column justify-content-center text-center">
                          <input type="file" id="file1" name="image" accept="image/*" capture style="display:none"/>
                          <img class="me-auto ms-auto" src="https://cdn3d.iconscout.com/3d/premium/thumb/upload-5590549-4652664.png" id="upfile1" width="200px" style="cursor:pointer" />
                        </div>
                      </div>

                        <div class="dropdown mt-4">
                          <a href="javascript:;" class="btn bg-gradient-success dropdown-toggle w-100" data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
                              <img src="assets/img/sidebar/sayuran.png" width="25px" /> Pilih Sayuran
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                            <li>
                              <a class="dropdown-item" href="javascript:;">
                                <img src="assets/img/sayuran/bayam.png" width="25px" /> Bayam
                              </a>
                            </li>
                              <li>
                                  <a class="dropdown-item" href="javascript:;">
                                    <img src="assets/img/sayuran/sawi.png" width="25px" /> Sawi
                                  </a>
                              </li>
                              <li>
                                  <a class="dropdown-item" href="javascript:;">
                                    <img src="assets/img/sayuran/selada.png" width="25px" /> Selada
                                  </a>
                              </li>
                          </ul>
                        </div>

                      <label>Nama Sayur</label>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Contoh : John Mayur" aria-label="Password" aria-describedby="password-addon">
                      </div>
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-text">Deskripsi</span>
                          <textarea class="form-control" aria-label="With textarea"></textarea>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-4">
                          <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><img src="https://cdn3d.iconscout.com/3d/premium/thumb/seed-bag-6148684-5024969.png" width="20px" alt=""></span>
                                <input type="text" class="form-control" placeholder="/ Hari" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><img src="https://cdn3d.iconscout.com/3d/premium/thumb/sowing-seeds-5697538-4754339.png" width="20px" alt=""></span>
                                <input type="text" class="form-control" placeholder="/ Hari" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><img src="https://cdn3d.iconscout.com/3d/premium/thumb/carrot-farming-3938179-3259175@0.png" width="20px" alt=""></span>
                                <input type="text" class="form-control" placeholder="/ Hari" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                          </div>
                        </div>
                      </div>
                      <button class="btn bg-gradient-success w-100" type="submit">Tambah Sayur</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

      <!-- <div class="row my-4">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6>Proyek</h6>
                  <p class="text-sm mb-0">
                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                    <span class="font-weight-bold ms-1">30 done</span> this month
                  </p>
                </div>
                <div class="col-lg-6 col-5 my-auto text-end">
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
                </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Companies</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Members</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Budget</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Completion</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="assets/img/small-logos/logo-xd.svg" class="avatar avatar-sm me-3" alt="xd">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Sayur Mayor XD Version</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="avatar-group mt-2">
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Tompson">
                            <img src="assets/img/team-1.jpg" alt="team1">
                          </a>
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                            <img src="assets/img/team-2.jpg" alt="team2">
                          </a>
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Alexander Smith">
                            <img src="assets/img/team-3.jpg" alt="team3">
                          </a>
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
                            <img src="assets/img/team-4.jpg" alt="team4">
                          </a>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"> $14,000 </span>
                      </td>
                      <td class="align-middle">
                        <div class="progress-wrapper w-75 mx-auto">
                          <div class="progress-info">
                            <div class="progress-percentage">
                              <span class="text-xs font-weight-bold">60%</span>
                            </div>
                          </div>
                          <div class="progress">
                            <div class="progress-bar bg-gradient-info w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="assets/img/small-logos/logo-atlassian.svg" class="avatar avatar-sm me-3" alt="atlassian">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Add Progress Track</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="avatar-group mt-2">
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                            <img src="assets/img/team-2.jpg" alt="team5">
                          </a>
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
                            <img src="assets/img/team-4.jpg" alt="team6">
                          </a>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"> $3,000 </span>
                      </td>
                      <td class="align-middle">
                        <div class="progress-wrapper w-75 mx-auto">
                          <div class="progress-info">
                            <div class="progress-percentage">
                              <span class="text-xs font-weight-bold">10%</span>
                            </div>
                          </div>
                          <div class="progress">
                            <div class="progress-bar bg-gradient-info w-10" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="assets/img/small-logos/logo-slack.svg" class="avatar avatar-sm me-3" alt="team7">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Fix Platform Errors</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="avatar-group mt-2">
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                            <img src="assets/img/team-3.jpg" alt="team8">
                          </a>
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
                            <img src="assets/img/team-1.jpg" alt="team9">
                          </a>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"> Not set </span>
                      </td>
                      <td class="align-middle">
                        <div class="progress-wrapper w-75 mx-auto">
                          <div class="progress-info">
                            <div class="progress-percentage">
                              <span class="text-xs font-weight-bold">100%</span>
                            </div>
                          </div>
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success w-100" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm me-3" alt="spotify">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Launch our Mobile App</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="avatar-group mt-2">
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Tompson">
                            <img src="assets/img/team-4.jpg" alt="user1">
                          </a>
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                            <img src="assets/img/team-3.jpg" alt="user2">
                          </a>
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Alexander Smith">
                            <img src="assets/img/team-4.jpg" alt="user3">
                          </a>
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
                            <img src="assets/img/team-1.jpg" alt="user4">
                          </a>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"> $20,500 </span>
                      </td>
                      <td class="align-middle">
                        <div class="progress-wrapper w-75 mx-auto">
                          <div class="progress-info">
                            <div class="progress-percentage">
                              <span class="text-xs font-weight-bold">100%</span>
                            </div>
                          </div>
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success w-100" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="assets/img/small-logos/logo-jira.svg" class="avatar avatar-sm me-3" alt="jira">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Add the New Pricing Page</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="avatar-group mt-2">
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Tompson">
                            <img src="assets/img/team-4.jpg" alt="user5">
                          </a>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"> $500 </span>
                      </td>
                      <td class="align-middle">
                        <div class="progress-wrapper w-75 mx-auto">
                          <div class="progress-info">
                            <div class="progress-percentage">
                              <span class="text-xs font-weight-bold">25%</span>
                            </div>
                          </div>
                          <div class="progress">
                            <div class="progress-bar bg-gradient-info w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="25"></div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="assets/img/small-logos/logo-invision.svg" class="avatar avatar-sm me-3" alt="invision">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">Redesign New Online Shop</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="avatar-group mt-2">
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Tompson">
                            <img src="assets/img/team-1.jpg" alt="user6">
                          </a>
                          <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
                            <img src="assets/img/team-4.jpg" alt="user7">
                          </a>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"> $2,000 </span>
                      </td>
                      <td class="align-middle">
                        <div class="progress-wrapper w-75 mx-auto">
                          <div class="progress-info">
                            <div class="progress-percentage">
                              <span class="text-xs font-weight-bold">40%</span>
                            </div>
                          </div>
                          <div class="progress">
                            <div class="progress-bar bg-gradient-info w-40" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="40"></div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card h-100">
            <div class="card-header pb-0">
              <h6>Orders overview</h6>
              <p class="text-sm">
                <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                <span class="font-weight-bold">24%</span> this month
              </p>
            </div>
            <div class="card-body p-3">
              <div class="timeline timeline-one-side">
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="ni ni-bell-55 text-success text-gradient"></i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">$2400, Design changes</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:20 PM</p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="ni ni-html5 text-danger text-gradient"></i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">New order #1832412</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 11 PM</p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="ni ni-cart text-info text-gradient"></i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Server payments for April</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 9:34 PM</p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="ni ni-credit-card text-warning text-gradient"></i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">New card added for order #4395133</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">20 DEC 2:20 AM</p>
                  </div>
                </div>
                <div class="timeline-block mb-3">
                  <span class="timeline-step">
                    <i class="ni ni-key-25 text-primary text-gradient"></i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">Unlock packages for development</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">18 DEC 4:54 AM</p>
                  </div>
                </div>
                <div class="timeline-block">
                  <span class="timeline-step">
                    <i class="ni ni-money-coins text-dark text-gradient"></i>
                  </span>
                  <div class="timeline-content">
                    <h6 class="text-dark text-sm font-weight-bold mb-0">New order #9583120</h6>
                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">17 DEC</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->
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

<script>
    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
      });
    }, 2000);
  </script>
</body>

</body>

</html>