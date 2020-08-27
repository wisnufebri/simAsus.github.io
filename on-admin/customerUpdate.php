<?php
include('/opt/lampp/htdocs/simAsus/config.php');
?>
<!DOCTYPE html>
<html>
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

<body>

    <div class="container" style="margin-top:20px">
        <h2>CUSTOMER</h2>

        <hr>

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

            $sql = mysqli_query($koneksi, "UPDATE customer SET rma='$rma', nama='$nama', no_telpon='$no_telpon', serial_number='$serial_number', model='$model', status='$status', posisi_rak='$posisi_rak', memo='$memo' WHERE id='$id'") or die(mysqli_error($koneksi));

            if ($sql) {
                echo '<script>alert("Berhasil menyimpan data."); document.location="customer-admin.php?id=' . $id . '";</script>';
            } else {
                echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
            }
        }
        ?>

        <form action="customer-admin.php?id=<?php echo $id; ?>" method="post">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">RMA</label>
                <div class="col-sm-10">
                    <input type="text" name="rma" class="form-control" size="4" value="<?php echo $data['rma']; ?>"
                        required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" readonly
                        required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">No Telpon</label>
                <div class="col-sm-10">
                    <input type="text" name="no_telpon" class="form-control" value="<?php echo $data['no_telpon']; ?>"
                        required readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">SERIAL NUMBER</label>
                <div class="col-sm-10">
                    <input type="text" name="serial_number" class="form-control"
                        value="<?php echo $data['serial_number']; ?>" required readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">MODEL</label>
                <div class="col-sm-10">
                    <select name="model" class="form-control" required readonly>
                        <option value="">PILIH MODEL</option>
                        <option value="NOTEBOOK" <?php if ($data['model'] == 'NOTEBOOK') {
                                                        echo 'selected';
                                                    } ?>>NOTEBOOK</option>
                        <option value="ZENFONE" <?php if ($data['model'] == 'ZENFONE') {
                                                    echo 'selected';
                                                } ?>>ZENFONE</option>
                    </select>
                </div>
            </div>
            <!--    dropdown status    -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <select name="status" class="form-control" required>
                        <option value="">PILIH STATUS</option>
                        <option value="REPAIR" <?php if ($data['status'] == 'REPAIR') {
                                                    echo 'selected';
                                                } ?>>REPAIR</option>
                        <option value="READY" <?php if ($data['status'] == 'READY') {
                                                    echo 'selected';
                                                } ?>>READY</option>
                        <option value="SHIP" <?php if ($data['status'] == 'SHIP') {
                                                    echo 'selected';
                                                } ?>>SHIP</option>
                        <option value="CLOSE" <?php if ($data['status'] == 'CLOSE') {
                                                    echo 'selected';
                                                } ?>>CLOSE</option>
                    </select>
                </div>
            </div>
            <!--    END DROPDOWN    -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">POSISI RAK</label>
                <div class="col-sm-10">
                    <input type="text" name="posisi_rak" class="form-control" value="<?php echo $data['posisi_rak']; ?>"
                        required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">MEMO</label>
                <div class="col-sm-10">
                    <input type="text" name="memo" class="form-control" value="<?php echo $data['memo']; ?>" required>
                </div>
            </div>
            <hr>
            <div class="form-group row container">
                <label class="col-sm-2 col-form-label">&nbsp;</label>
                <div class="col-sm-10">
                    <input type="submit" href="customer-admin.php" name="submit" class="btn btn-primary" value="SIMPAN">
                    <a href="customer-admin.php" class="btn btn-warning">KEMBALI</a>
                </div>
            </div>
        </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

</body>

</html>