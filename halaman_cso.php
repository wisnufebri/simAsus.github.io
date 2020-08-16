<?php
//memasukkan file config.php
include('config.php');
session_start();
// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "") {
    header("location:index.php?pesan=gagal");
}
?>
<?php
session_start();
if(empty($_SESSION['username']) and empty($_SESSION['password'])){
    echo "<script>alert('MAAF, Anda belum login!!')</script>";
    echo "<meta http-equiv=refresh content=0;url=login.php>";
}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Company Name
    </title>
    <link href="css/styles.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
            crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
    </script>
</head>
<body class="sb-nav-fixed">

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="halaman_cso.php">HALAMAN - CSO</a>

    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#">
        <i
                class="fas fa-bars">
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
                    <div class="sb-sidenav-menu-heading">
                    </div>
                    <a class="nav-link" href="index.php">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-tachometer-alt">
                            </i>
                        </div>
                        Dashboard
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
                        <a href="halaman_cso.php">Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item active">Data Customer
                    </li>
                </ol>
                <div class="breadcrumb-item">
                    <!-- Trigger the modal with a button -->
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal"
                            data-target="#myModal">Add Employee
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                            <?php
                            if (isset($_POST['submit'])) {
                                $nim = $_POST['nim'];
                                $nama = $_POST['nama'];
                                $jenis_kelamin = $_POST['jenis_kelamin'];
                                $jurusan = $_POST['jurusan'];
                                $cek = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$nim'") or die(mysqli_error($koneksi));
                                if (mysqli_num_rows($cek) == 0) {
                                    $sql = mysqli_query($koneksi, "INSERT INTO mahasiswa(nim, nama, jenis_kelamin, jurusan) VALUES('$nim', '$nama', '$jenis_kelamin', '$jurusan')") or die(mysqli_error($koneksi));
                                    if ($sql) {
                                        echo '<script>alert("Berhasil menambahkan data."); document.location="/halaman_cso.php";</script>';
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
                                <form action="halaman_cso.php" method="post" class="modal-body">
                                    <div class="form-group text-center"><h3><label>Please Insert New Employee</label>
                                        </h3></div>
                                    <div class="form-group">
                                        <input type="text" name="nim" class="form-control" size="4" required
                                               placeholder="Nim">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="nama" class="form-control" required placeholder="Nama">
                                    </div>
                                    <!-- Radio Button -->
                                    <div class="form-group">
                                        <a class="col-form-label">JENIS KELAMIN
                                        </a>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <p>
                                                    <input type="radio"
                                                           class="custom-control custom-radio custom-control-inline"
                                                           name="jenis_kelamin" value="LAKI-LAKI" required> Laki-laki
                                                </p>
                                            </div>
                                            <div class="form-check">
                                                <p>
                                                    <input type="radio"
                                                           class="custom-control custom-radio custom-control-inline"
                                                           name="jenis_kelamin" value="PEREMPUAN" required> Perempuan
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Dropdown -->
                                    <div class="form-group">
                                        <select name="jurusan" class="form-control" required>
                                            <option value="">PILIH JURUSAN
                                            </option>
                                            <option value="TEKNIK INFORMATIKA">TEKNIK INFORMATIKA
                                            </option>
                                            <option value="TEKNIK SIPIL">TEKNIK SIPIL
                                            </option>
                                            <option value="PERTANIAN">PERTANIAN
                                            </option>
                                        </select>
                                    </div>
                                    <div class="modal-body">
                                        <p class="small">*This form can customize.
                                        </p>
                                    </div>
                                    <div class="modal-footer" action="/halaman_cso.php" method="post">
                                        <input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
                                    </div>
                                </form>
                            </div>
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
                            <table class="table table-striped table-bordered table-hover table-condensed">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                //query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
                                $sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY id DESC") or die(mysqli_error($koneksi));
                                //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
                                if (mysqli_num_rows($sql) > 0) {
//membuat variabel $no untuk menyimpan nomor urut
                                    $no = 1;
//melakukan perulangan while dengan dari dari query $sql
                                    while ($data = mysqli_fetch_assoc($sql)) {
//menampilkan data perulangan
                                        echo '
<tr>
<td>' . $no . '</td>
<td>' . $data['nim'] . '</td>
<td>' . $data['nama'] . '</td>
<td>' . $data['jenis_kelamin'] . '</td>
<td>' . $data['jurusan'] . '</td>
<td>
<i class="fa fa-edit" data-toggle="modal" data-target="#myModal"></i>       
<a href="delete.php?id=' . $data['id'] . '" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
</td>
</tr>
';
                                        $no++;
                                    }
//jika query menghasilkan nilai 0
                                } else {
                                    echo '
<tr>
<td colspan="6">Tidak ada data.</td>
</tr>
';
                                }
                                ?>
                                <tbody>
                            </table>
                        </div>
                    </div>
                </div>
                </p>
            </div>
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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"
        crossorigin="anonymous">
</script>
<script src="js/scripts.js">
</script>
</body>
</html>
