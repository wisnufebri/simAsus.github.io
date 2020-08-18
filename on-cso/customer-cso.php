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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
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
        <a class="navbar-brand" href="#">HALAMAN - CSO</a>
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
                        <a class="nav-link" href="../homeCso.php">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-tachometer-alt">
                                </i>
                            </div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="customer-cso.php">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-users">
                                </i>
                            </div>
                            Costumer
                        </a>
                        <!--                    <a class="nav-link" href="halaman-cso.php">-->
                        <!--                        <div class="sb-nav-link-icon">-->
                        <!--                            <i class="fas fa-users">-->
                        <!--                            </i>-->
                        <!--                        </div>-->
                        <!--                        Pegawai-->
                        <!--                    </a>-->
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
                    <div class="breadcrumb-item">
                        <!--                     Trigger the modal with a button -->
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add
                            Data
                        </button>
                        <!-- MODAL ADD -->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                                <?php

                                if (isset($_POST['submit'])) {
                                    date_default_timezone_set("Asia/Bangkok");
                                    $tanggal_masuk = date('Y-m-d H:i:s');
                                    $rma = $_POST['rma'];
                                    $nama = $_POST['nama'];
                                    $no_telpon = $_POST['no_telpon'];
                                    $serial_number = $_POST['serial_number'];
                                    $model = $_POST['model'];
                                    $status = $_POST['status'];
                                    $posisi_rak = $_POST['posisi_rak'];
                                    $memo = $_POST['memo'];
                                    $teknisi = $_POST['teknisi'];
                                    $cso = $_SESSION['username'];
                                    $cek = mysqli_query($koneksi, "SELECT * FROM customer WHERE rma='$rma'") or die(mysqli_error($koneksi));
                                    if (mysqli_num_rows($cek) == 0) {
                                        $sql = mysqli_query($koneksi, "INSERT INTO customer(tanggal_masuk, rma, nama, no_telpon, serial_number, model, status, posisi_rak, memo, teknisi, cso) VALUES
                                        ('$tanggal_masuk', '$rma', '$nama', '$no_telpon', '$serial_number', '$model', '$status', '$posisi_rak', '$memo', '$teknisi', '$cso')") or die(mysqli_error($koneksi));
                                        if ($sql) {
                                            echo '<script>alert("Berhasil menambahkan data."); document.location="customer-cso.php";</script>';
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
                                    <form action="customer-cso.php" method="post" class="modal-body">
                                        <div class="form-group text-center">
                                            <h3><label>CUSTOMER</label>
                                            </h3>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="rma" class="form-control" size="4" required placeholder="RMA">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="nama" class="form-control" required placeholder="Nama">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="no_telpon" class="form-control" required placeholder="No Telpon">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="serial_number" class="form-control" required placeholder="Serial Number">
                                        </div>

                                        <!-- Dropdown -->
                                        <div class="form-group">
                                            <select name="model" class="form-control" required>
                                                <option value="">Model
                                                </option>
                                                <option value="NOTEBOOK">NOTEBOOK
                                                </option>
                                                <option value="ZENFONE">ZENFONE
                                                </option>
                                            </select>
                                        </div>

                                        <!-- Dropdown -->
                                        <div class="form-group">
                                            <select name="status" class="form-control" required>
                                                <option value="">Status
                                                </option>
                                                <option value="REPAIR">REPAIR
                                                </option>
                                                <option value="READY">READY
                                                </option>
                                                <option value="SHIP">SHIP
                                                </option>
                                                <option value="CLOSED">CLOSED
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="posisi_rak" class="form-control" required placeholder="Posisi Rak">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="memo" class="form-control" required placeholder="Memo">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="cso" class="form-control" size="4" required readonly value="<?php echo $_SESSION['username']; ?>">
                                        </div>
                                        <div class="modal-body">
                                            <p class="small">*This form can customize.
                                            </p>
                                        </div>
                                        <div class="modal-footer" action="customer-cso.php" method="post">
                                            <input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
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
                                if (isset($_GET['id'])) {
                                    //membuat variabel $id untuk menyimpan id dari GET id di URL
                                    $id = $_GET['id'];

                                    //query ke database SELECT tabel mahasiswa berdasarkan id = $id
                                    $select = mysqli_query($koneksi, "SELECT * FROM customer WHERE id='$id'") or die(mysqli_error($koneksi));

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
                                    $rma = $_POST['rma'];
                                    $nama = $_POST['nama'];
                                    $no_telpon = $_POST['no_telpon'];
                                    $serial_number = $_POST['serial_number'];
                                    $model = $_POST['model'];
                                    $status = $_POST['status'];
                                    $posisi_rak = $_POST['posisi_rak'];
                                    $memo = $_POST['memo'];
                                    $teknisi = $_POST['teknisi'];
                                    $sql = mysqli_query($koneksi, "UPDATE customer SET rma='$rma', nama='$nama', no_telpon='$no_telpon', serial_number='$serial_number', model='$model', status='$status', posisi_rak='$posisi_rak', memo='$memo', teknisi='$teknisi' WHERE id='$id'") or die(mysqli_error($koneksi));

                                    if ($sql) {
                                        echo '<script>alert("Berhasil menyimpan data."); document.location="customer-cso.php?id=' . $id . '";</script>';
                                    } else {
                                        echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
                                    }
                                }
                                ?>
                                <form action="customer-cso.php?id=<?php echo $id; ?>" method="post" class="modal-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">RMA</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="rma" class="form-control" size="4" value="<?php echo $data['rma']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <input type="text" name="no_telpon" class="form-control" value="<?php echo $data['no_telpon']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <input type="text" name="serial_number" class="form-control" value="<?php echo $data['serial_number']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <input type="text" name="model" class="form-control" value="<?php echo $data['model']; ?>" required>
                                        </div>
                                    </div>
                                    <!--    dropdown    -->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Model</label>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" name="model" value="NOTEBOOK" <?php if ($data['model'] == 'NOTEBOOK') {
                                                                                                                                echo 'checked';
                                                                                                                            } ?> required>
                                                <label class="form-check-label">NOTEBOOK</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" name="model" value="ZENFONE" <?php if ($data['model'] == 'ZENFONE') {
                                                                                                                                echo 'checked';
                                                                                                                            } ?> required>
                                                <label class="form-check-label">ZENFONE</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--    dropdown status    -->
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" name="status" value="REPAIR" <?php if ($data['status'] == 'REPAIR') {
                                                                                                                                echo 'checked';
                                                                                                                            } ?> required>
                                                <label class="form-check-label">REPAIR</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" name="status" value="READY" <?php if ($data['status'] == 'READY') {
                                                                                                                                echo 'checked';
                                                                                                                            } ?> required>
                                                <label class="form-check-label">READY</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" name="status" value="SHIP" <?php if ($data['status'] == 'SHIP') {
                                                                                                                            echo 'checked';
                                                                                                                        } ?> required>
                                                <label class="form-check-label">SHIP</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" name="status" value="CLOSE" <?php if ($data['status'] == 'CLOSE') {
                                                                                                                                echo 'checked';
                                                                                                                            } ?> required>
                                                <label class="form-check-label">CLOSE</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!--    END DROPDOWN    -->
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <input type="text" name="posisi_rak" class="form-control" value="<?php echo $data['posisi_rak']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <input type="text" name="memo" class="form-control" value="<?php echo $data['memo']; ?>" required>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row container">
                                        <label class="col-sm-2 col-form-label">&nbsp;</label>
                                        <div class="col-sm-10">
                                            <input type="submit" href="customer-cso.php" name="submit" class="btn btn-primary" value="SIMPAN">
                                            <a href="customer-cso.php" class="btn btn-warning">KEMBALI</a>
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
                                <input class="form-control" id="myInput" type="text" placeholder="Search..">
                                <br>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-sm table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>RMA</th>
                                                <th>Nama</th>
                                                <th class="text-center">Telpon</th>
                                                <th class="text-center">Serial Number</th>
                                                <th class="text-center">Model</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Posisi Rak</th>
                                                <th class="text-center">Memo</th>
                                                <!--                                    <th>Teknisi</th>-->
                                                <th class="text-center"><i class="fa fa-cog"></i> Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                            <?php
                                            //query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
                                            $sql = mysqli_query($koneksi, "SELECT * FROM customer ORDER BY id DESC") or die(mysqli_error($koneksi));
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
                                                    <td class="text-center"> <?php echo "$data[no_telpon]" ?></td>
                                                    <td class="text-center"> <?php echo "$data[serial_number]" ?></td>
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
                                                    <td class="text-center"> <?php echo "$data[posisi_rak]" ?></td>
                                                    <td> <?php echo "$data[memo]" ?></td>
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

                                        <tbody>
                                    </table>
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