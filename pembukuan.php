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

   if (isset($_GET['id_order']) == "del") {
    $id_order = $_GET['id_order'];
    //$sql = "DELETE FROM `order_sayur` WHERE id_order = $id_order";
    
    if ($mysqli->query($sql) === true) {
        echo "<script>
                alert('data terhapus');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo "error: $mysqli -> error";
    }
}
  $page = 'billing';
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
    
    <div class="container-fluid py-4">
        <div class="col-sm-8 mx-auto">
        <img src="assets/img/logo-ct-dark.png" style="width: 40px;" alt=""> Petani Mayor
        
        <?php
            $sql = "SELECT * FROM order_sayur WHERE id_order = 1";
            $result = $mysqli -> query($sql);
            if ($result->num_rows > 0) { ?>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="row mt-4">
                    <div class="col-sm-6">
                        Nomor Invoice : <br>
                        <?php echo "".$row['id_order'].""?>
                    </div>
                    <div class="col-sm-6">
                        Tanggal Order :
                    </div>
                </div>
                <?php } ?>
            <?php } ?>
        </div>  
    </div>
      
    </div>
  </main>
  <div class="fixed-plugin">
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