<?php
//memasukkan file config.php
include('config.php');
session_start();
// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "") {
    header("location:index.php?pesan=gagal");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Company Name
    </title>
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
    </script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="#">REPORT</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars">
            </i>
        </button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <!-- <div class="input-group">
<input class="form-control" type="text" placeholder="Search for..." aria-label="Search"
aria-describedby="basic-addon2" />
<div class="input-group-append">
<button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
</div>
</div> -->
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user fa-fw">
                    </i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Settings
                    </a>
                    <a class="dropdown-item" href="#">Activity Log
                    </a>
                    <div class="dropdown-divider">
                    </div>
                    <a class="dropdown-item" href="logout.php">Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <p></p>
                        <a class="nav-link" href="homeAdmin.php">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-tachometer-alt">
                                </i>
                            </div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="./on-admin/customer-admin.php">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-users">
                                </i>
                            </div>
                            Costumer
                        </a>
                        <a class="nav-link" href="./on-admin/halaman-admin.php">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-users">
                                </i>
                            </div>
                            Pegawai
                        </a>
                        <a class="nav-link" href="pelaporan.php">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-users">
                                </i>
                            </div>
                            Report
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <p>Hallo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai
                        <b><?php echo $_SESSION['level']; ?></b>.</p>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>

                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Primary Card</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">Warning Card</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">Success Card</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">Danger Card</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area mr-1"></i>
                                    Area Chart Example
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover table-condensed">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>RMA</th>
                                                <th>Nama</th>
                                                <th class="text-center">Model</th>
                                                <th class="text-center">Status</th>
                                                <!--                                    <th>Teknisi</th>-->
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            //query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
                                            $sql = mysqli_query($koneksi, "SELECT rma, nama, model, status FROM customer WHERE status='CLOSE'") or die(mysqli_error($koneksi));
                                            //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
                                            //                                if (mysqli_num_rows($sql) > 0) {
                                            //membuat variabel $no untuk menyimpan nomor urut
                                            $no = 1;
                                            //melakukan perulangan while dengan dari dari query $sql
                                            while ($data = mysqli_fetch_assoc($sql)) {
                                                //menampilkan data perulangan
                                            ?>
                                                <tr>
                                                    <td> <?php echo "$no" ?></td>
                                                    <td> <?php echo "$data[rma]" ?></td>
                                                    <td> <?php echo "$data[nama]" ?></td>
                                                    <td class="text-center">
                                                        <?php if ("$data[model]" == "NOTEBOOK") { ?>
                                                            <span class="badge badge-success">NOTEBOOK</span>
                                                        <?php } else { ?>
                                                            <span class="badge badge-primary">ZENFONE</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php if ("$data[status]" == "READY") { ?>
                                                            <span class="badge badge-warning">READY</span>
                                                        <?php } elseif ("$data[status]" == "REPAIR") { ?>
                                                            <span class="badge badge-danger">REPAIR</span>
                                                        <?php } elseif ("$data[status]" == "SHIP") { ?>
                                                            <span class="badge badge-primary">SHIP</span>
                                                        <?php } else { ?>
                                                            <span class="badge badge-success">Close</span>
                                                        <?php } ?>
                                                    </td>
                                                    <!--                                        <td> -->
                                                    <?php //echo "$data[teknisi]" 
                                                    ?>
                                                    <!--</td>-->
                                                    <td class="text-center">
                                                        <a href="customerUpdate.php?id=<?php echo "$data[id]" ?>" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal2">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="customerDelete.php?id=<?php echo "$data[id]" ?>" class="btn btn-danger btn-sm" onclick="javascript: return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php
                                                $no++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar mr-1"></i>
                                    Bar Chart Example
                                </div>
                                <div class="card-body">
                                    <canvas id="myBarChart" width="100%" height="40"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            DataTable Example
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>RMA</th>
                                            <th>Nama</th>
                                            <th class="text-center">Model</th>
                                            <th class="text-center">Status</th>
                                            <!--                                    <th>Teknisi</th>-->
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
                                        $sql = mysqli_query($koneksi, "SELECT rma, nama, model, status FROM customer WHERE status='CLOSE'") or die(mysqli_error($koneksi));
                                        //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
                                        //                                if (mysqli_num_rows($sql) > 0) {
                                        //membuat variabel $no untuk menyimpan nomor urut
                                        $no = 1;
                                        //melakukan perulangan while dengan dari dari query $sql
                                        while ($data = mysqli_fetch_assoc($sql)) {
                                            //menampilkan data perulangan
                                        ?>
                                            <tr>
                                                <td> <?php echo "$no" ?></td>
                                                <td> <?php echo "$data[rma]" ?></td>
                                                <td> <?php echo "$data[nama]" ?></td>
                                                <td class="text-center">
                                                    <?php if ("$data[model]" == "NOTEBOOK") { ?>
                                                        <span class="badge badge-success">NOTEBOOK</span>
                                                    <?php } else { ?>
                                                        <span class="badge badge-primary">ZENFONE</span>
                                                    <?php } ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php if ("$data[status]" == "READY") { ?>
                                                        <span class="badge badge-warning">READY</span>
                                                    <?php } elseif ("$data[status]" == "REPAIR") { ?>
                                                        <span class="badge badge-danger">REPAIR</span>
                                                    <?php } elseif ("$data[status]" == "SHIP") { ?>
                                                        <span class="badge badge-primary">SHIP</span>
                                                    <?php } else { ?>
                                                        <span class="badge badge-success">Close</span>
                                                    <?php } ?>
                                                </td>
                                                <!--                                        <td> -->
                                                <?php //echo "$data[teknisi]" 
                                                ?>
                                                <!--</td>-->
                                                <td class="text-center">
                                                    <a href="customerUpdate.php?id=<?php echo "$data[id]" ?>" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal2">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="customerDelete.php?id=<?php echo "$data[id]" ?>" class="btn btn-danger btn-sm" onclick="javascript: return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php
                                            $no++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="breadcrumb mb-4">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Company Name 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>