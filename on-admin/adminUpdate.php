<?php
include('/opt/lampp/htdocs/simAsus/config.php');
?>
<!DOCTYPE html>
<html>

<body>

    <div class="container" style="margin-top:20px">
        <h2>UPDATE</h2>

        <hr>

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

        <form action="halaman-admin.php?id_user=<?php echo $id_user; ?>" method="post">
            <div class="form-group row">
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" size="4" value="<?php echo $data['nama']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <input type="text" name="username" class="form-control" value="<?php echo $data['username']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control"
                        value="<?php echo $data['password']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <select name="level" class="form-control">
                        <option value="">PILIH MODEL</option>
                        <option value="cso" <?php if ($data['level'] == 'cso') {
                                                echo 'selected';
                                            } ?>>cso</option>
                        <option value="admin" <?php if ($data['level'] == 'admin') {
                                                    echo 'selected';
                                                } ?>>admin</option>
                        <option value="teknisi" <?php if ($data['level'] == 'teknisi') {
                                                    echo 'selected';
                                                } ?>>teknisi</option>
                    </select>
                </div>
            </div>
            <hr>

            <div class="form-group row container">
                <label class="col-sm-2 col-form-label">&nbsp;</label>
                <div class="col-sm-10">
                    <input type="submit" href="halaman-admin.php" name="submit" class="btn btn-primary" value="SIMPAN">
                    <a href="halaman-admin.php" class="btn btn-warning">KEMBALI</a>
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