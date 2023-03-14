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

  $page = 'billing';
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

  <script src="https://kit.fontawesome.com/7d57987a46.js" crossorigin="anonymous"></script>
</head>

<body class="g-sidenav-show bg-gray-100">

<style>
  .input-payment {
  outline: 0;
  border-width: 0 0 1px;
  border-color: gray;
  }
  input-payment:hover {
    border-color: green;
  }
</style>
  
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class='navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl' id='navbarBlur' navbar-scroll='true'>
      <div class='container-fluid py-1 px-3'>
        <nav aria-label='breadcrumb'>
          <ol class='breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5'>
            <li class='breadcrumb-item text-sm'><a class='opacity-5 text-dark' href='javascript:;'>Pages</a></li>
            <li class='breadcrumb-item text-sm text-dark active' aria-current='page'>Dashboard</li>
          </ol>
          <h6 class='font-weight-bolder mb-0'><?php if($page == 'billing') {echo 'Billing';}?></h6>
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

                <li class=''>
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
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-8">
          <div class="row">
            <div class="col-xl-6 mb-xl-0 mb-4">
              <div class="card bg-transparent shadow-xl">
                <div class="overflow-hidden position-relative border-radius-xl" style="background-image: url('assets/img/curved-images/curved14.jpg');">
                  <span class="mask bg-gradient-dark"></span>
                  <div class="card-body position-relative z-index-1 p-3">
                    <img class="w-10 mt-2" src="assets/img/logo-ct-dark.png" alt="logo">
                    <h5 class="text-white mt-4 mb-5 pb-2">22&nbsp;&nbsp;&nbsp;11&nbsp;&nbsp;&nbsp;2022&nbsp;&nbsp;&nbsp;0001</h5>
                    <div class="d-flex">
                      <div class="d-flex">
                        <div class="me-4">
                          <p class="text-white text-sm opacity-8 mb-0">Nama Petani</p>
                          <h6 class="text-white mb-0">James</h6>
                        </div>
                        <div>
                          <p class="text-white text-sm opacity-8 mb-0">Tanggal Bergabung</p>
                          <h6 class="text-white mb-0">22/11/2022</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6">
              <div class="row">
                <div class="col-6">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-success shadow text-center border-radius-lg">
                        <img src="https://cdn3d.iconscout.com/3d/premium/thumb/safety-deposit-vault-6571703-5448959.png" class="mt-1" width="50px" alt="">
                      </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                      <h6 class="text-center mb-0">Saldo</h6>
                      <span class="text-xs">Jumlah Saldo</span>
                      <hr class="horizontal dark my-3">
                      <h5 class="mb-0">Rp30.000.000</h5>
                    </div>
                  </div>
                </div>
                <div class="col-6 mt-md-0">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-success shadow text-center border-radius-lg">
                        <img src="https://cdn3d.iconscout.com/3d/premium/thumb/withdrawing-money-5075254-4235168.png" class="mt-1" width="55px" alt="">
                      </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                      <h6 class="text-center mb-0">Penarikan</h6>
                      <span class="text-xs">Jumlah Penarikan</span>
                      <hr class="horizontal dark my-3">
                      <h5 class="mb-0">Rp10.000.000</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 mb-lg-0 mb-4">
              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Rekening Penarikan</h6>
                    </div>
                    <div class="col-6 text-end">
                      <a class="btn bg-gradient-dark mb-0" data-bs-toggle="modal" data-bs-target="#edit-rekening"><i class="fa-duotone fa-money-check-dollar-pen"></i>&nbsp;&nbsp;Edit Rekening</a>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-md-6 mb-md-0 mb-4">
                      <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                        <i class="fa-duotone fa-user text-info" style="margin-right: 20px; font-size: 20px;"></i>
                        <h6 class="mb-0" id="myDIV">James Newman</h6>
                        <a class="fa-duotone fa-badge-check ms-auto text-success cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Verified" style="font-size: 30px;"></a>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                        <i class="fa-duotone fa-money-check-dollar text-info" style="margin-right: 20px; font-size: 25px;"></i>
                        <h6 class="mb-0">5678&nbsp;&nbsp;&nbsp;3465&nbsp;&nbsp;&nbsp;7852&nbsp;&nbsp;&nbsp;5248</h6>
                        <a class="fa-duotone fa-badge-check ms-auto text-success cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Verified" style="font-size: 30px;"></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-6 d-flex align-items-center">
                  <h6 class="mb-0">Invoices</h6>
                </div>
                <div class="col-6 text-end">
                  <!-- <button class="btn btn-outline-success btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#view-all">Lihat Semua</button> -->
                </div>
              </div>
            </div>
            <div class="card-body p-3 pb-0">
              <ul class="list-group">
              <?php
                $sql = "SELECT * FROM order_sayur WHERE id_petani = '".$_SESSION['id_admin']."'";
                $result = $mysqli -> query($sql);
                if ($result->num_rows > 0) { ?>
                <?php while ($row = $result->fetch_assoc()) { ?>

                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark font-weight-bold text-sm"><?php echo "".$row['created_order'].""?></h6>
                    <span class="text-xs"><?php echo "".$row['id_order'].""?></span>
                  </div>
                  <div class="d-flex align-items-center text-sm">
                    Rp<?php echo " ".number_format($row['harga_total'], 2,",",".")." "; ?>
                    <button href='' target="_blank" class="btn btn-link text-dark text-sm mb-0 px-0 ms-4" data-bs-target='#timeline<?php echo "".$row['id_order'].""?>' data-bs-toggle='modal' data-bs-dismiss='modal'><i class="fa-light fa-file-pdf text-danger text-lg me-1"></i> PDF</button>
                  </div>
                </li>

                <div class='col-md-12'>
                  <div class='modal fade' id='timeline<?php echo "".$row['id_order'].""?>' tabindex='-1' role='dialog' aria-labelledby='timeline' aria-hidden='true'>

                    <div class='modal-dialog modal-dialog-centered modal-lg' role='document'>
                      <div class='modal-content'>
                        <div class='modal-body p-4'>
                          <div class='card card-plain'>
                            
                          <div class="col-sm-12">
                          <img src="assets/img/logo-ct-dark.png" style="width: 40px;" alt=""> Petani Mayor
                            <div class="row mt-4">
                                <div class="col-sm-6">
                                    Nomor Invoice : <br>
                                    <?php echo "".$row['id_order'].""?><br>
                                </div>
                                <div class="col-sm-6">
                                    Tanggal Order : <br>
                                    <?php echo "".$row['created_order'].""?><br>
                                </div>
                                <div class="col-sm-12 mt-2">
                                <div class="table-responsive">
                                  <table class="table align-items-center mb-0">
                                    <thead>
                                      <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Sayur</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Benih</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rockwool</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ph A</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ph B</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Vit A</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Vit B</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>
                                          <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                              <h6 class="mb-0 text-sm">Pokcoy</h6>
                                            </div>
                                          </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                          <span class="text-xs font-weight-bold"> <?php echo "".$row['jumlah_benih'].""?> </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                          <span class="text-xs font-weight-bold"> <?php echo "".$row['jumlah_rockwool'].""?> </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                          <span class="text-xs font-weight-bold"> <?php echo "".$row['jumlah_phA'].""?> </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                          <span class="text-xs font-weight-bold"> <?php echo "".$row['jumlah_phB'].""?> </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                          <span class="text-xs font-weight-bold"> <?php echo "".$row['jumlah_vitA'].""?> </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                          <span class="text-xs font-weight-bold"> <?php echo "".$row['jumlah_vitB'].""?> </span>
                                        </td>
                                      </tr>
                                      
                                    </tbody>
                                  </table>
                                  <div class="col-sm-12 row text-center">
                                  <div class="col-sm-4 mt-4">
                                      Gagal Penyemaian : <br>
                                      <?php echo "".$row['gagal_penyemaian'].""?><br>
                                  </div>
                                  <div class="col-sm-4 mt-4">
                                      Gagal Pembibitan : <br>
                                      <?php echo "".$row['gagal_pembibitan'].""?><br>
                                  </div>
                                  <div class="col-sm-4 mt-4">
                                      Gagal Panen : <br>
                                      <?php echo "".$row['gagal_panen'].""?><br>
                                  </div>
                                  </div>
                                  <div class="col-sm-12 mt-4">
                                    <h3>
                                    Harga Total : <br>
                                    <span class="text-success text-gradient">Rp<?php echo " ".number_format($row['harga_total'], 2,",",".")." "; ?></span>
                                    </h3>
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
                  <?php } ?>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-4">
          <div class="card h-100">
            <div class="card-header pb-0 px-3">
              <div class="row">
                <div class="col-md-6">
                  <h6 class="mb-0">Transaksi Anda</h6>
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                  <div class="col-12 text-end">
                    <button class="btn btn-outline-success btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#view-all-transaksi">Lihat Semua</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex bg-gray-100 justify-content-between p-4 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-down"></i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Credit</h6>
                      <span class="text-xs mb-2">Nama Bank: <span class="text-dark ms-sm-2 font-weight-bold">BCA</span></span>
                      <span class="mb-2 text-xs">Nama Rekening: <span class="text-dark font-weight-bold ms-sm-2">James Newman</span></span>
                      <span class="mb-2 text-xs">No Rekening: <span class="text-dark ms-sm-2 font-weight-bold">1234567890</span></span>
                      <span class="text-xs text-secondary">27 March 2020, at 12:30 PM</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                    - Rp 10.000.000
                  </div>
                </li>

                <li class="list-group-item border-0 d-flex bg-gray-100 justify-content-between p-4 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Debet</h6>
                      <span class="text-xs mb-2">Nama Bank: <span class="text-dark ms-sm-2 font-weight-bold">BCA</span></span>
                      <span class="mb-2 text-xs">Nama Rekening: <span class="text-dark font-weight-bold ms-sm-2">James Newman</span></span>
                      <span class="mb-2 text-xs">No Rekening: <span class="text-dark ms-sm-2 font-weight-bold">1234567890</span></span>
                      <span class="text-xs text-secondary">27 March 2020, at 12:30 PM</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                    + Rp 10.000.000
                  </div>
                </li>

                <li class="list-group-item border-0 d-flex bg-gray-100 justify-content-between p-4 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-down"></i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Credit</h6>
                      <span class="text-xs mb-2">Nama Bank: <span class="text-dark ms-sm-2 font-weight-bold">BCA</span></span>
                      <span class="mb-2 text-xs">Nama Rekening: <span class="text-dark font-weight-bold ms-sm-2">James Newman</span></span>
                      <span class="mb-2 text-xs">No Rekening: <span class="text-dark ms-sm-2 font-weight-bold">1234567890</span></span>
                      <span class="text-xs text-secondary">27 March 2020, at 12:30 PM</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                    - Rp 10.000.000
                  </div>
                </li>

                <li class="list-group-item border-0 d-flex bg-gray-100 justify-content-between p-4 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Debet</h6>
                      <span class="text-xs mb-2">Nama Bank: <span class="text-dark ms-sm-2 font-weight-bold">BCA</span></span>
                      <span class="mb-2 text-xs">Nama Rekening: <span class="text-dark font-weight-bold ms-sm-2">James Newman</span></span>
                      <span class="mb-2 text-xs">No Rekening: <span class="text-dark ms-sm-2 font-weight-bold">1234567890</span></span>
                      <span class="text-xs text-secondary">27 March 2020, at 12:30 PM</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                    + Rp 10.000.000
                  </div>
                </li>

                <li class="list-group-item border-0 d-flex bg-gray-100 justify-content-between p-4 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-down"></i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Credit</h6>
                      <span class="text-xs mb-2">Nama Bank: <span class="text-dark ms-sm-2 font-weight-bold">BCA</span></span>
                      <span class="mb-2 text-xs">Nama Rekening: <span class="text-dark font-weight-bold ms-sm-2">James Newman</span></span>
                      <span class="mb-2 text-xs">No Rekening: <span class="text-dark ms-sm-2 font-weight-bold">1234567890</span></span>
                      <span class="text-xs text-secondary">27 March 2020, at 12:30 PM</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                    - Rp 10.000.000
                  </div>
                </li>
              </ul>
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

  <!-- Modal view all pembukuan -->

  <div class="col-md-12">
    <div class="modal fade" id="view-all" tabindex="-1" role="dialog" aria-labelledby="view-all" aria-hidden="true">

      <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card card-plain">
              
              <div class="card h-100">
                <div class="card-header pb-0">
                  <div class="col-sm-12">
                  <div class="row">
                    <div class="col-10">
                      <h3 class="font-weight-bolder text-success text-gradient">Daftar Invoices</h3>
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
                  <ul class="list-group">
                  <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark font-weight-bold text-sm">Nov, 01, 2022</h6>
                        <span class="text-xs">011120220001</span>
                      </div>
                      <div class="d-flex align-items-center text-sm">
                        Rp10.000.000
                        <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fa-light fa-file-pdf text-danger text-lg me-1"></i> PDF</button>
                      </div>
                    </li>

                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark font-weight-bold text-sm">Nov, 01, 2022</h6>
                        <span class="text-xs">011120220001</span>
                      </div>
                      <div class="d-flex align-items-center text-sm">
                        Rp10.000.000
                        <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fa-light fa-file-pdf text-danger text-lg me-1"></i> PDF</button>
                      </div>
                    </li>

                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark font-weight-bold text-sm">Nov, 01, 2022</h6>
                        <span class="text-xs">011120220001</span>
                      </div>
                      <div class="d-flex align-items-center text-sm">
                        Rp10.000.000
                        <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fa-light fa-file-pdf text-danger text-lg me-1"></i> PDF</button>
                      </div>
                    </li>

                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark font-weight-bold text-sm">Nov, 01, 2022</h6>
                        <span class="text-xs">011120220001</span>
                      </div>
                      <div class="d-flex align-items-center text-sm">
                        Rp10.000.000
                        <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fa-light fa-file-pdf text-danger text-lg me-1"></i> PDF</button>
                      </div>
                    </li>
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark font-weight-bold text-sm">Nov, 01, 2022</h6>
                        <span class="text-xs">011120220001</span>
                      </div>
                      <div class="d-flex align-items-center text-sm">
                        Rp10.000.000
                        <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fa-light fa-file-pdf text-danger text-lg me-1"></i> PDF</button>
                      </div>
                    </li>

                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark font-weight-bold text-sm">Nov, 01, 2022</h6>
                        <span class="text-xs">011120220001</span>
                      </div>
                      <div class="d-flex align-items-center text-sm">
                        Rp10.000.000
                        <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fa-light fa-file-pdf text-danger text-lg me-1"></i> PDF</button>
                      </div>
                    </li>

                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark font-weight-bold text-sm">Nov, 01, 2022</h6>
                        <span class="text-xs">011120220001</span>
                      </div>
                      <div class="d-flex align-items-center text-sm">
                        Rp10.000.000
                        <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fa-light fa-file-pdf text-danger text-lg me-1"></i> PDF</button>
                      </div>
                    </li>

                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark font-weight-bold text-sm">Nov, 01, 2022</h6>
                        <span class="text-xs">011120220001</span>
                      </div>
                      <div class="d-flex align-items-center text-sm">
                        Rp10.000.000
                        <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fa-light fa-file-pdf text-danger text-lg me-1"></i> PDF</button>
                      </div>
                    </li>
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark font-weight-bold text-sm">Nov, 01, 2022</h6>
                        <span class="text-xs">011120220001</span>
                      </div>
                      <div class="d-flex align-items-center text-sm">
                        Rp10.000.000
                        <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fa-light fa-file-pdf text-danger text-lg me-1"></i> PDF</button>
                      </div>
                    </li>

                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark font-weight-bold text-sm">Nov, 01, 2022</h6>
                        <span class="text-xs">011120220001</span>
                      </div>
                      <div class="d-flex align-items-center text-sm">
                        Rp10.000.000
                        <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fa-light fa-file-pdf text-danger text-lg me-1"></i> PDF</button>
                      </div>
                    </li>

                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark font-weight-bold text-sm">Nov, 01, 2022</h6>
                        <span class="text-xs">011120220001</span>
                      </div>
                      <div class="d-flex align-items-center text-sm">
                        Rp10.000.000
                        <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fa-light fa-file-pdf text-danger text-lg me-1"></i> PDF</button>
                      </div>
                    </li>

                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark font-weight-bold text-sm">Nov, 01, 2022</h6>
                        <span class="text-xs">011120220001</span>
                      </div>
                      <div class="d-flex align-items-center text-sm">
                        Rp10.000.000
                        <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fa-light fa-file-pdf text-danger text-lg me-1"></i> PDF</button>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Modal edit rekening -->

  <div class="col-md-12">
    <div class="modal fade" id="edit-rekening" tabindex="-1" role="dialog" aria-labelledby="edit-rekening" aria-hidden="true">

      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card card-plain">
              
              <div class="card h-100">
                <div class="card-header pb-0">
                  <div class="col-sm-12">
                  <div class="row">
                    <div class="col-10">
                      <h3 class="font-weight-bolder text-success text-gradient">Edit Rekening</h3>
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
                  <div class="col-sm-12">
                    <div class="row">
                      <div class="col-sm-6">
                        <label for="">Nama Pemilik Rekening</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <label for="">Nomor Rekening</label>
                        <div class="input-group">
                            <input type="number" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                      </div>

                      <div class="col-12">
                        <button class="btn bg-gradient-success btn-md w-100 mt-4">Submit</button>
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

  <!-- Modal lihat transaksi -->

  <div class="col-md-12">
    <div class="modal fade" id="view-all-transaksi" tabindex="-1" role="dialog" aria-labelledby="view-all-transaksi" aria-hidden="true">

      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card card-plain">
              
              <div class="card h-100">
                <div class="card-header pb-0">
                  <div class="col-sm-12">
                  <div class="row">
                    <div class="col-10">
                      <h3 class="font-weight-bolder text-success text-gradient">Edit Rekening</h3>
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
                <ul class="list-group">
                <li class="list-group-item border-0 d-flex bg-gray-100 justify-content-between p-4 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-down"></i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Credit</h6>
                      <span class="text-xs mb-2">Nama Bank: <span class="text-dark ms-sm-2 font-weight-bold">BCA</span></span>
                      <span class="mb-2 text-xs">Nama Rekening: <span class="text-dark font-weight-bold ms-sm-2">James Newman</span></span>
                      <span class="mb-2 text-xs">No Rekening: <span class="text-dark ms-sm-2 font-weight-bold">1234567890</span></span>
                      <span class="text-xs text-secondary">27 March 2020, at 12:30 PM</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                    - Rp 10.000.000
                  </div>
                </li>

                <li class="list-group-item border-0 d-flex bg-gray-100 justify-content-between p-4 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Debet</h6>
                      <span class="text-xs mb-2">Nama Bank: <span class="text-dark ms-sm-2 font-weight-bold">BCA</span></span>
                      <span class="mb-2 text-xs">Nama Rekening: <span class="text-dark font-weight-bold ms-sm-2">James Newman</span></span>
                      <span class="mb-2 text-xs">No Rekening: <span class="text-dark ms-sm-2 font-weight-bold">1234567890</span></span>
                      <span class="text-xs text-secondary">27 March 2020, at 12:30 PM</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                    + Rp 10.000.000
                  </div>
                </li>

                <li class="list-group-item border-0 d-flex bg-gray-100 justify-content-between p-4 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-down"></i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Credit</h6>
                      <span class="text-xs mb-2">Nama Bank: <span class="text-dark ms-sm-2 font-weight-bold">BCA</span></span>
                      <span class="mb-2 text-xs">Nama Rekening: <span class="text-dark font-weight-bold ms-sm-2">James Newman</span></span>
                      <span class="mb-2 text-xs">No Rekening: <span class="text-dark ms-sm-2 font-weight-bold">1234567890</span></span>
                      <span class="text-xs text-secondary">27 March 2020, at 12:30 PM</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                    - Rp 10.000.000
                  </div>
                </li>

                <li class="list-group-item border-0 d-flex bg-gray-100 justify-content-between p-4 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Debet</h6>
                      <span class="text-xs mb-2">Nama Bank: <span class="text-dark ms-sm-2 font-weight-bold">BCA</span></span>
                      <span class="mb-2 text-xs">Nama Rekening: <span class="text-dark font-weight-bold ms-sm-2">James Newman</span></span>
                      <span class="mb-2 text-xs">No Rekening: <span class="text-dark ms-sm-2 font-weight-bold">1234567890</span></span>
                      <span class="text-xs text-secondary">27 March 2020, at 12:30 PM</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                    + Rp 10.000.000
                  </div>
                </li>

                <li class="list-group-item border-0 d-flex bg-gray-100 justify-content-between p-4 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-down"></i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Credit</h6>
                      <span class="text-xs mb-2">Nama Bank: <span class="text-dark ms-sm-2 font-weight-bold">BCA</span></span>
                      <span class="mb-2 text-xs">Nama Rekening: <span class="text-dark font-weight-bold ms-sm-2">James Newman</span></span>
                      <span class="mb-2 text-xs">No Rekening: <span class="text-dark ms-sm-2 font-weight-bold">1234567890</span></span>
                      <span class="text-xs text-secondary">27 March 2020, at 12:30 PM</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                    - Rp 10.000.000
                  </div>
                </li>
              </ul>
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex bg-gray-100 justify-content-between p-4 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-down"></i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Credit</h6>
                      <span class="text-xs mb-2">Nama Bank: <span class="text-dark ms-sm-2 font-weight-bold">BCA</span></span>
                      <span class="mb-2 text-xs">Nama Rekening: <span class="text-dark font-weight-bold ms-sm-2">James Newman</span></span>
                      <span class="mb-2 text-xs">No Rekening: <span class="text-dark ms-sm-2 font-weight-bold">1234567890</span></span>
                      <span class="text-xs text-secondary">27 March 2020, at 12:30 PM</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                    - Rp 10.000.000
                  </div>
                </li>

                <li class="list-group-item border-0 d-flex bg-gray-100 justify-content-between p-4 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Debet</h6>
                      <span class="text-xs mb-2">Nama Bank: <span class="text-dark ms-sm-2 font-weight-bold">BCA</span></span>
                      <span class="mb-2 text-xs">Nama Rekening: <span class="text-dark font-weight-bold ms-sm-2">James Newman</span></span>
                      <span class="mb-2 text-xs">No Rekening: <span class="text-dark ms-sm-2 font-weight-bold">1234567890</span></span>
                      <span class="text-xs text-secondary">27 March 2020, at 12:30 PM</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                    + Rp 10.000.000
                  </div>
                </li>

                <li class="list-group-item border-0 d-flex bg-gray-100 justify-content-between p-4 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-down"></i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Credit</h6>
                      <span class="text-xs mb-2">Nama Bank: <span class="text-dark ms-sm-2 font-weight-bold">BCA</span></span>
                      <span class="mb-2 text-xs">Nama Rekening: <span class="text-dark font-weight-bold ms-sm-2">James Newman</span></span>
                      <span class="mb-2 text-xs">No Rekening: <span class="text-dark ms-sm-2 font-weight-bold">1234567890</span></span>
                      <span class="text-xs text-secondary">27 March 2020, at 12:30 PM</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                    - Rp 10.000.000
                  </div>
                </li>

                <li class="list-group-item border-0 d-flex bg-gray-100 justify-content-between p-4 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Debet</h6>
                      <span class="text-xs mb-2">Nama Bank: <span class="text-dark ms-sm-2 font-weight-bold">BCA</span></span>
                      <span class="mb-2 text-xs">Nama Rekening: <span class="text-dark font-weight-bold ms-sm-2">James Newman</span></span>
                      <span class="mb-2 text-xs">No Rekening: <span class="text-dark ms-sm-2 font-weight-bold">1234567890</span></span>
                      <span class="text-xs text-secondary">27 March 2020, at 12:30 PM</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                    + Rp 10.000.000
                  </div>
                </li>

                <li class="list-group-item border-0 d-flex bg-gray-100 justify-content-between p-4 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-down"></i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Credit</h6>
                      <span class="text-xs mb-2">Nama Bank: <span class="text-dark ms-sm-2 font-weight-bold">BCA</span></span>
                      <span class="mb-2 text-xs">Nama Rekening: <span class="text-dark font-weight-bold ms-sm-2">James Newman</span></span>
                      <span class="mb-2 text-xs">No Rekening: <span class="text-dark ms-sm-2 font-weight-bold">1234567890</span></span>
                      <span class="text-xs text-secondary">27 March 2020, at 12:30 PM</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                    - Rp 10.000.000
                  </div>
                </li>
              </ul>
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