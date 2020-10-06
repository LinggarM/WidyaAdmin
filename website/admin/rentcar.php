<?php 
session_start();
if (!isset($_SESSION['email'])) {
	header("location:login.php?pesan=blmlogin");
}
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Jadwal Rent Car | Dashboard Widya Admin</title>

  <!-- Icon -->
  <link rel="shortcut icon" type="image/ico" href="img/icon.ico"/>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-text mx-3">Dashboard Admin</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Customer</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <li class="nav-item">
        <a class="nav-link" href="driver.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Driver</span></a>
      </li>
      
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <li class="nav-item active">
        <a class="nav-link" href="rentcar.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Jadwal Rent Car</span></a>
      </li>
      
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <li class="nav-item">
        <a class="nav-link" href="individualtrip.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Jadwal Individual Trip</span></a>
      </li>
      
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
      <center>
        <span><b>LOGOUT</b></span>
      </center></a>
      </li>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
          <?php
            // Include our login information
            require_once('db_login.php');

            // Connect
            $con = mysqli_connect($db_host, $db_username, $db_password,$db_database);
            if (mysqli_connect_errno()){
                die ("Could not connect to the database: <br />". mysqli_connect_error( ));
            }

            //Asign a query
            $email = $_SESSION['email'];
            $query = " SELECT nama_admin, id_admin FROM admin WHERE admin.email = '$email' ";

            // Execute the query
            $result = mysqli_query($con,$query);
            if (!$result){
                die ("Could not query the database: <br />". mysqli_error($con));
            }
            // Fetch and display the results
            $row = mysqli_fetch_array($result);
            $nama = $row['nama_admin'];
            $id = $row['id_admin'];
          ?>

            <!-- Nav Item - User Information -->
            <span class="mr-2 d-none d-lg-inline text-gray-600 medium"><b><?php echo $nama; ?></b></span>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Jadwal Rent Car</h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Kode Transaksi</th>
                        <th>Driver</th>
                        <th>Customer</th>
                        <th>Kota Peminjaman</th>
                        <th>Lokasi Peminjaman</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Waktu Peminjaman</th>
                        <th>Lama Peminjaman (Hari)</th>
                        <th>Harga</th>
                        <th>Status Transaksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      // Include our login information
                      require_once('db_login.php');
          
                      // Connect
                      $con = mysqli_connect($db_host, $db_username, $db_password,$db_database);
                      if (mysqli_connect_errno()){
                          die ("Could not connect to the database: <br />". mysqli_connect_error( ));
                      }
          
                      //Asign a query
                      $query = " SELECT * FROM transaksi_rental, drivers, customers, kota, status_transaksi, waktu_berangkat WHERE transaksi_rental.id_driver = drivers.id_driver AND transaksi_rental.id_customer = customers.id_customer AND transaksi_rental.kota_peminjaman = kota.id_kota AND transaksi_rental.status_transaksi = status_transaksi.id_status_transaksi AND transaksi_rental.waktu_peminjaman = waktu_berangkat.id_waktu_berangkat ";
          
                      // Execute the query
                      $result = mysqli_query($con,$query);
                      if (!$result){
                          die ("Could not query the database: <br />". mysqli_error($con));
                      }
                      // Fetch and display the results
                      while ($row = mysqli_fetch_array($result)){
                          echo '<tr>';
                          echo '<td>'.$row['kode_transaksi'].'</td>';
                          echo '<td><b>'.$row['nama_driver'].'</b></td> ';
                          echo '<td><b>'.$row['nama_customer'].'</b></td> ';
                          echo '<td>'.$row['nama_kota'].'</td>';
                          echo '<td>'.$row['lokasi_peminjaman'].'</td>';
                          echo '<td>'.$row['tanggal_peminjaman'].'</td>';
                          echo '<td>'.$row['nama_waktu_berangkat'].'</td>';
                          echo '<td>'.$row['lama_peminjaman(hari)'].'</td>';
                          echo '<td>'.$row['harga'].'</td>';
                          echo '<td>'.$row['nama_status_transaksi'].'</td>';
                          echo '</tr>';
                      }
                      mysqli_close($con);
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
  
          </div>
          <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; WIDYA ADMIN 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Apakah anda yakin ingin Logout?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
          <a class="btn btn-primary" href="logout.php">Ya</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>
</html>
