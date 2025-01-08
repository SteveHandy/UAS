<?php
include "koneksi.php";
$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username='$username'";
$hasil = $conn->query($sql);
$data = $hasil->fetch_assoc();

include "upload_foto.php";

if (isset($_POST['simpan'])) {
    $username = $_SESSION['username'];
    $password = $_POST['password'];
    $gambar = '';
    $nama_gambar = $_FILES['gambar']['name'];

    if (empty($password) && empty($nama_gambar)) {
        echo "<script>
            alert('Value kosong! Gagal menyimpan data. Masukkan Password baru anda atau foto profil baru anda untuk menyimpan.');
            document.location='admin.php?page=profile';
        </script>";
    }

    //jika ada file yang dikirim  
    if ($nama_gambar != '') {
        //panggil function upload_foto untuk cek spesifikasi file yg dikirimkan user
        //function ini memiliki 2 keluaran yaitu status dan message
        $cek_upload = upload_foto($_FILES["gambar"]);

        //cek status true/false
        if ($cek_upload['status']) {
            //jika true maka message berisi nama file gambar
            $gambar = $cek_upload['message'];
        } else {
            //jika true maka message berisi pesan error, tampilkan dalam alert
            echo "<script>
                alert('" . $cek_upload['message'] . "');
                document.location='admin.php?page=profile';
            </script>";
            die;
        }
    }

    //cek apakah ada id yang dikirimkan dari form
    if (isset($_POST['id'])) {
        //jika ada id,    lakukan update data dengan id tersebut
        $id = $_POST['id'];

        if ($nama_gambar == '') {
            //jika tidak ganti gambar
            $gambar = $_POST['gambar_lama'];
        } else {
            //jika ganti gambar, hapus gambar lama
            unlink("img/" . $_POST['gambar_lama']);
        }

        if ($password == '') {
            $stmt = $conn->prepare("UPDATE users 
                                SET 
                                profile = ?
                                WHERE id = ?");

            $stmt->bind_param("si", $gambar, $id);
            $simpanProfile = $stmt->execute();
        } else {
            $password = md5($_POST['password']);
            $stmt = $conn->prepare("UPDATE users 
                                SET 
                                password =?,
                                profile = ?
                                WHERE id = ?");

            $stmt->bind_param("ssi", $password, $gambar, $id);
            $simpan = $stmt->execute();
        }
    }

    if ($simpan) {
        echo "<script>
            alert('Simpan data sukses! Harap login kembali untuk mengakses dashboard admin');
            document.location='logout.php';
        </script>";
    } else if ($simpanProfile) {
        echo "<script>
            alert('Simpan data sukses');
            document.location='admin.php?page=profile';
        </script>";
    } else {
        echo "<script>
            alert('Simpan data gagal');
            document.location='admin.php?page=profile';
        </script>";
    }

    $stmt->close();
    $conn->close();
}

?>
<div class="container">
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" id="id" name="id" value="<?= $data['id'] ?>">
        <div class="mb-3">
            <input type="hidden" id="password_lama" name="password_lama" value="<?= $data['password'] ?>">
            <label for="password" class="form-label">Ganti Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password Baru hanya jika ingin mengganti password anda" autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Ganti Foto Profil</label>
            <input type="file" class="form-control" id="gambar" name="gambar">
        </div>
        <div class="mb-3">
            <label class="form-label">Foto Profil Saat Ini</label>
            <div>
                <img src="img/<?= $data['profile'] ?>" alt="Current Profile Photo" class="img-fluid" width="150">
            </div>
            <input type="hidden" name="gambar_lama" value="<?= $data["profile"] ?>">
        </div>
        <input type="submit" value="Update Profile" name="simpan" class="btn btn-primary">
    </form>
</div>