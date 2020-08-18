<?php
//memasukkan file config.php
include('/opt/lampp/htdocs/simAsus/config.php');
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
    <title>ASUS SERVICE CENTER
    </title>
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"-->
    <!--            crossorigin="anonymous">-->
    <!--    </script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
    </script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="#">HALAMAN - TEKNISI</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars">
            </i>
        </button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
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
                        <a class="nav-link" href="homeTeknisi.php">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-tachometer-alt">
                                </i>
                            </div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="homeTeknisi.php">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-users">
                                </i>
                            </div>
                            Costumer
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
                    <h1 class="mt-4">CUSTOMER
                    </h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item">
                            <a href="#">Dashboard
                            </a>
                        </li>
                        <li class="breadcrumb-item active">CUSTOMER
                        </li>
                    </ol>

                    <!-- MODAL edit -->
                    <div class="modal fade" id="myModal2" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">

                            </div>
                        </div>
                    </div>

                    <!-- Table -->
                    <p>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1">
                                </i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <div>
                                    <form class="input-group md-form form-sm form-2 pl-0" action="" method="post">
                                        <input class="form-control my-0 py-1 lime-border" type="text" id="searchquery"
                                            size="60" name="keyword" placeholder="Search..." />
                                        <input type="submit" id="searchbutton" value="Search" name="Search"
                                            class="formbutton" />
                                        <!-- <span class="input-group-text lime lighten-2" type="submit" id="searchbutton" value="Search" name="Search" class="formbutton"><i class="fas fa-search text-grey" aria-hidden="true"></i></span> -->
                                    </form>
                                    <?php
                                    if (isset($_POST['Search'])) {
                                        $keyword = $_POST['keyword'];
                                        $query = $koneksi->query("SELECT * FROM customer WHERE rma LIKE '%$keyword%' OR nama LIKE '%$keyword%'");
                                        $row = mysqli_num_rows($query);
                                        $no = 1;
                                        if ($row == 0) {
                                    ?>
                                    <br>
                                    <center>
                                        <strong>404 NOT FOUND</strong>
                                    </center>
                                    <?php
                                        } else {
                                        ?>
                                    <center><a class="badge badge-warning">menampilkan <?php echo $row; ?> data.</a>
                                    </center>
                                    <?php
                                            ?>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr class="nol">
                                                    <th class="main">NO</th>
                                                    <th class="main">MASUK</th>
                                                    <th class="main">RMA</th>
                                                    <th class="main">NAMA</th>
                                                    <th class="main">STATUS</th>
                                                    <th class="text-center"><i class="fa fa-cog"></i> Opsi</th>

                                                </tr>
                                            </thead>
                                            <?php
                                                    foreach ($query as $rows) {
                                                        $tanggal_masuk = $rows['tanggal_masuk'];
                                                        $rma = $rows['rma'];
                                                        $nama = $rows['nama'];
                                                        $status = $rows['status'];
                                                    ?>
                                            <tr class="nol1">
                                                <td class="main2"><?php echo $no; ?></td>
                                                <td class="main2"><?php echo $tanggal_masuk; ?></td>
                                                <td class="main2"><?php echo $rma; ?></td>
                                                <td class="main2"><?php echo $nama; ?></td>
                                                <td class="main2"><?php if ("[$status]" == 'REPAIR') { ?>
                                                    <span class="badge badge-warning">READY</span>
                                                    <?php } elseif ("[$status]" == 'SHIP') { ?>
                                                    <span class="badge badge-warning">SHIP</span>
                                                    <?php } else { ?>
                                                    <span class="badge badge-warning">CLOSE</span>
                                                    <?php } ?>

                                                </td>
                                                <td class="text-center">
                                                    <a href="customerUpdate.php?id=<?php echo "$data[id]" ?>"
                                                        class="btn btn-warning btn-sm" data-toggle="modal"
                                                        data-target="#myModal2">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="customerDelete.php?id=<?php echo "$data[id]" ?>"
                                                        class="btn btn-danger btn-sm"
                                                        onclick="javascript: return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                                    }
                                                    ?>
                                        </table>
                                    </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <script>
                            $(document).ready(function() {
                                $("#myInput").on("keyup", function() {
                                    var value = $(this).val().toLowerCase();
                                    $("#myTable tr").filter(function() {
                                        $(this).toggle($(this).text().toLowerCase().indexOf(
                                            value) > -1)
                                    });
                                });
                            });
                            </script>
                        </div>
                    </p>
                    <footer class="breadcrumb mb-4">
                        <div class="container-fluid">
                            <div class="d-flex align-items-center justify-content-between small">
                                <div class="text-muted">Copyright &copy; Company Name 2020
                                </div>
                                <div>
                                    <a href="#">Privacy Policy
                                    </a>
                                    &middot;
                                    <a href="#">Terms &amp; Conditions
                                    </a>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js">
    </script>
</body>

</html>