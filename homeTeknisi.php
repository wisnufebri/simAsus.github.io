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
                        <a class="nav-link" href="./on-teknisi/halaman-teknisi.php">
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
                    <h1 class="mt-4">
                        <center>CUSTOMER</center>
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

                    <!-- PAGE CONTENT -->
                    <p>
                        <div><strong>
                                <center>CONTENT</center>
                            </strong></div>
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