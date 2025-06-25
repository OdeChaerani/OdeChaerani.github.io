<!--
Nama : Wa Ode Zachra Chaerani
NPM  : 140810230062
Kelas: B
-->

<?php
$host = "localhost:8111";
$user = "root";
$pass = "";
$db = "mhs";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Tidak bisa terkoneksi ke database");
}

$npm = $nama = $alamat = $tgl_lhr = $jk = $email = "";
$sukses = $error = "";

if (isset($_POST['save'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tgl_lhr = $_POST['tgl_lhr'];
    $jk = $_POST['jk'];
    $email = $_POST['email'];

    if ($npm && $nama && $alamat && $tgl_lhr && $jk && $email) {
        if (isset($_GET['edit'])) {
            $sql1 = "UPDATE identitas SET nama='$nama', alamat='$alamat', tgl_lhr='$tgl_lhr', jk='$jk', email='$email' WHERE npm='$npm'";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diperbarui";
            } else {
                $error = "Gagal memperbarui data";
            }
        } else {
            $sql1 = "INSERT INTO identitas (npm, nama, alamat, tgl_lhr, jk, email) VALUES ('$npm', '$nama', '$alamat', '$tgl_lhr', '$jk', '$email')";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil ditambahkan";
            } else {
                $error = "Gagal menambahkan data";
            }
        }
    } else {
        $error = "Silakan masukkan semua data";
    }
}

if (isset($_GET['edit'])) {
    $npm = $_GET['edit'];
    $sql2 = "SELECT * FROM identitas WHERE npm = '$npm'";
    $q2 = mysqli_query($koneksi, $sql2);
    $r = mysqli_fetch_array($q2);
    $npm = $r['npm'];
    $nama = $r['nama'];
    $alamat = $r['alamat'];
    $tgl_lhr = $r['tgl_lhr'];
    $jk = $r['jk'];
    $email = $r['email'];
}

if (isset($_GET['delete'])) {
    $npm = $_GET['delete'];
    $sql3 = "DELETE FROM identitas WHERE npm = '$npm'";
    $q3 = mysqli_query($koneksi, $sql3);
    if ($q3) {
        $sukses = "Data berhasil dihapus";
    } else {
        $error = "Gagal menghapus data";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>
        body {
            background-color: ivory;
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            margin: auto;
            max-width: 800px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h1 {
            color: #264653;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        input[type="text"],
        input[type="date"],
        input[type="email"] {
            padding: 10px;
            border: 1px solid #2A9D8F;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #2A9D8F;
            color: ivory;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #264653;
        }

        .error {
            color: #E76F51;
            background-color: #FAD4D4;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #E76F51;
            border-radius: 5px;
        }

        .success {
            color: #264653;
            background-color: #C9E4DE;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #264653;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #264653;
        }

        th {
            background-color: #264653;
            color: ivory;
            padding: 10px;
        }

        td {
            padding: 10px;
        }

        a {
            text-decoration: none;
            color: #264653;
        }

        a:hover {
            color: #2A9D8F;
        }

        .action-links a {
            margin-right: 10px;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            color: #264653;
        }

        .gender-container input[type="radio"] {
            margin-left: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Data Mahasiswa</h1>

        <?php if ($error) { echo "<div class='error'>$error</div>"; } ?>
        <?php if ($sukses) { echo "<div class='success'>$sukses</div>"; } ?>

        <form action="" method="POST">
            <input type="text" name="npm" placeholder="NPM" value="<?php echo $npm; ?>" <?php if (isset($_GET['edit'])) echo "readonly"; ?>>
            <input type="text" name="nama" placeholder="Nama" value="<?php echo $nama; ?>">
            <input type="text" name="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>">
            <input type="date" name="tgl_lhr" placeholder="Tanggal Lahir" value="<?php echo $tgl_lhr; ?>">
            <label>Jenis Kelamin:</label>
            <div class="gender-container">
                <label><input type="radio" name="jk" value="L" <?php if ($jk == "L") echo "checked"; ?>> Laki-laki</label>
                <label><input type="radio" name="jk" value="P" <?php if ($jk == "P") echo "checked"; ?>> Perempuan</label>
            </div>
            <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
            <input type="submit" name="save" value="Simpan">
        </form>

        <h2>Data Mahasiswa</h2>
        <table>
            <tr>
                <th>NPM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>

            <?php
            $sql4 = "SELECT * FROM identitas ORDER BY npm";
            $q4 = mysqli_query($koneksi, $sql4);
            while ($r = mysqli_fetch_array($q4)) {
                echo "<tr>
                        <td>{$r['npm']}</td>
                        <td>{$r['nama']}</td>
                        <td>{$r['alamat']}</td>
                        <td>{$r['tgl_lhr']}</td>
                        <td>{$r['jk']}</td>
                        <td>{$r['email']}</td>
                        <td class='action-links'>
                            <a href='?edit={$r['npm']}'>Edit</a> | 
                            <a href='?delete={$r['npm']}'>Hapus</a>
                        </td>
                    </tr>";
            }
            ?>
        </table>
    </div>

    <footer>
        <p>&copy; 2024 - CRUD Data Mahasiswa</p>
    </footer>
</body>

</html>