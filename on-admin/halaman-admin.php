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
    <title>Company Name
    </title>
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
    </script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="#">HALAMAN - ADMIN</a>
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
                    <a class="dropdown-item" href="../logout.php">Logout
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
                        <a class="nav-link" href="../homeAdmin.php">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-tachometer-alt">
                                </i>
                            </div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="customer-admin.php">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-users">
                                </i>
                            </div>
                            Costumer
                        </a>
                        <a class="nav-link" href="halaman-admin.php">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-users">
                                </i>
                            </div>
                            Pegawai
                        </a>
                        <a class="nav-link" href="../pelaporan.php">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-users">
                                </i>
                            </div>
                            Report
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <p>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai
                        <b><?php echo $_SESSION['level']; ?></b>.</p>
                    <a href="logout.php">LOGOUT</a>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Daftar Pegawai
                    </h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item">
                            <a href="#">Dashboard
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Data Employee
                        </li>
                    </ol>
                    <div class="breadcrumb-item">
                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add
                            Employee
                        </button>
                        <!-- MODAL ADD -->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                                <?php
                                if (isset($_POST['submit1'])) {
                                    $nama = $_POST['nama'];
                                    $username = $_POST['username'];
                                    $password = $_POST['password'];
                                    $level = $_POST['level'];
                                    $cek = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username'") or die(mysqli_error($koneksi));
                                    if (mysqli_num_rows($cek) == 0) {
                                        $sql = mysqli_query($koneksi, "INSERT INTO users(nama, username, password, level) VALUES('$nama', '$username', '$password', '$level')") or die(mysqli_error($koneksi));
                                        if ($sql) {
                                            echo '<script>alert("Berhasil menambahkan data."); document.location="halaman-admin.php";</script>';
                                        } else {
                                            echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
                                        }
                                    } else {
                                        echo '<div class="alert alert-warning">Gagal, NIM sudah terdaftar.</div>';
                                    }
                                }
                                ?>
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <form action="halaman-admin.php" method="post" class="modal-body">
                                        <div class="form-group text-center">
                                            <h3><label>Please Insert New Employee</label>
                                            </h3>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="nama" class="form-control" size="4" required
                                                placeholder="Nama">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control" required
                                                placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" required
                                                placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <select name="level" class="form-control" required>
                                                <option value="">Model
                                                </option>
                                                <option value="cso">Customer Service Officer
                                                </option>
                                                <option value="admin">Admin
                                                </option>
                                                <option value="teknisi">Teknisi
                                                </option>
                                            </select>
                                        </div>
                                        <div class="modal-body">
                                            <p class="small">*This form can customize.
                                            </p>
                                        </div>
                                        <div class="modal-footer" action="halaman-admin.php" method="post">
                                            <input type="submit" name="submit1" class="btn btn-primary" value="SIMPAN">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- MODAL edit -->
                    <div class="modal fade" id="myModal2" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <?php
                                //jika sudah mendapatkan parameter GET id dari URL
                                if (isset($_GET['id_user'])) {
                                    //membuat variabel $id untuk menyimpan id dari GET id di URL
                                    $id_user = $_GET['id_user'];

                                    //query ke database SELECT tabel mahasiswa berdasarkan id = $id
                                    $select = mysqli_query($koneksi, "SELECT * FROM users WHERE id_user='$id_user'") or die(mysqli_error($koneksi));

                                    //jika hasil query = 0 maka muncul pesan error
                                    if (mysqli_num_rows($select) == 0) {
                                        echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
                                        exit();
                                        //jika hasil query > 0
                                    } else {
                                        //membuat variabel $data dan menyimpan data row dari query
                                        $data = mysqli_fetch_assoc($select);
                                    }
                                }
                                ?>
                                <?php
                                //jika tombol simpan di tekan/klik
                                if (isset($_POST['submit'])) {
                                    $nama = $_POST['nama'];
                                    $username = $_POST['username'];
                                    $password = $_POST['password'];
                                    $level = $_POST['level'];

                                    $sql = mysqli_query($koneksi, "UPDATE users SET nama='$nama', username='$username', password='$password', level='$level' WHERE id_user='$id_user'") or die(mysqli_error($koneksi));

                                    if ($sql) {
                                        echo '<script>alert("Berhasil menyimpan data."); document.location="halaman-admin.php?id_user=' . $id_user . '";</script>';
                                    } else {
                                        echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
                                    }
                                }
                                ?>
                                <form action="halaman-admin.php?id_user=<?php echo $id_user; ?>" method="post"
                                    class="modal-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nama" class="form-control" size="4"
                                                value="<?php echo $data['nama']; ?>" readonly required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <input type="text" name="username" class="form-control"
                                                value="<?php echo $data['username']; ?>" required readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <input type="password" name="password" class="form-control"
                                                value="<?php echo $data['password']; ?>" required readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <input type="text" name="level" class="form-control"
                                                value="<?php echo $data['level']; ?>" required readonly>
                                        </div>
                                    </div>


                                    <hr>
                                    <div class="form-group row container">
                                        <label class="col-sm-2 col-form-label">&nbsp;</label>
                                        <div class="col-sm-10">
                                            <input type="submit" href="halaman-admin.php" name="submit"
                                                class="btn btn-primary" value="SIMPAN">
                                            <a href="halaman-admin.php" class="btn btn-warning">KEMBALI</a>
                                        </div>
                                    </div>
                                </form>
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
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-sm table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Level</th>
                                                <th class="text-center"><i class="fa fa-bars"></i> Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            //query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
                                            $sql = mysqli_query($koneksi, "SELECT * FROM users ORDER BY id_user DESC") or die(mysqli_error($koneksi));
                                            //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
                                            // if (mysqli_num_rows($sql) > 0) {
                                            //membuat variabel $no untuk menyimpan nomor urut
                                            $no = 1;
                                            //melakukan perulangan while dengan dari dari query $sql
                                            while ($data = mysqli_fetch_assoc($sql)) {
                                                //menampilkan data perulangan
                                            ?>
                                            <tr>
                                                <td><?php echo "$no" ?></td>
                                                <td><?php echo "$data[nama]" ?></td>
                                                <td><?php echo "$data[username]" ?></td>
                                                <td><?php echo "$data[password]" ?></td>
                                                <td class="text-center">
                                                    <?php if ("$data[level]" == "cso") { ?>
                                                    <span class="btn btn-primary btn-sm">CSO</span>
                                                    <?php } elseif ("$data[level]" == "admin") { ?>
                                                    <span class="btn btn-warning btn-sm">Admin</span>
                                                    <?php } else { ?>
                                                    <span class="btn btn-success btn-sm">Teknisi</span>
                                                    <?php } ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="adminUpdate.php?id_user=<?php echo "$data[id_user]" ?>"
                                                        class="btn btn-warning btn-sm" data-toggle="modal"
                                                        data-target="#myModal2"><i class="fa fa-edit"></i></a>
                                                    <a href="adminDelete.php?id_user=<?php echo "$data[id_user]" ?>"
                                                        class="btn btn-danger btn-sm"
                                                        onclick="javascript: return confirm('Yakin ingin menghapus data ini?')"><i
                                                            class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                                $no++;
                                            }
                                            ?>
                                        <tbody>
                                    </table>
                                </div>
                            </div>
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