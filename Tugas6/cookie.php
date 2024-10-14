<!--
Nama    : Wa Ode Zachra Chaerani
NPM     : 140810230062
Kelas   : B
-->

<?php
if (isset($_GET['tema'])) {
    $tema = $_GET['tema'];
    setcookie('tema', $tema, time() + (86400 * 30), "/"); 
} else {
    $tema = isset($_COOKIE['tema']) ? $_COOKIE['tema'] : 'terang';
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CaratCare!</title>

    <style>
        /* Tema default */
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        /* Tema Terang */
        .terang {
            background-color: #f7cac9;
            color: #555;
        }

        /* Tema Gelap */
        .gelap {
            background-color: #333;
            color: #ddd;
        }

        /* Tema Biru */
        .biru {
            background-color: #a9cce3;
            color: #1a5276;
        }

        /* Tema Hijau */
        .hijau {
            background-color: #a2d5ab;
            color: #2d572c;
        }

        h1 {
            color: #92a8d1;
            text-align: center;
            font-size: 2.5em;
        }

        h3 {
            text-align: center;
            font-size: 1.2em;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 65%;
            margin: 0 auto;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="checkbox"] {
            margin-right: 10px;
            transform: scale(1.2); 
        }

        input[type="submit"] {
            background-color: #92a8d1;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #6d98ba; 
        }

        textarea {
            height: 100px;
            resize: none;
        }

        input[type="file"] {
            margin-bottom: 20px;
        }

        form > div {
            margin-bottom: 15px;
        }

        footer {
            text-align: center;
        }

        .tema {
            display: inline-block;
            padding: 5px 10px;
            margin: 5px;
            cursor: pointer;
            background-color: #ddd;
            border-radius: 5px;
            text-decoration: none;
            color: #000;
        }

        .tema:hover {
            background-color: #ccc;
        }
    </style>
</head>
<body class="<?php echo $tema; ?>">
    <header>
        <h1>CaratCare!</h1>
        <h3>Fill the Form Below and Get Your Sebong's Album Now!</h3>
        <div style="text-align: center;">
            <a href="?tema=terang" class="tema">Terang</a>
            <a href="?tema=gelap" class="tema">Gelap</a>
            <a href="?tema=biru" class="tema">Biru</a>
            <a href="?tema=hijau" class="tema">Hijau</a>
        </div>
    </header>

    <main>
        <section>
            <form>
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama"><br>
                
                <label for="email">Email</label>
                <input type="email" id="email" name="email"><br>
                
                <label for="telp">No. Telepon</label>
                <input type="tel" id="telp" name="telp"><br>

                <label for="album">Judul Album</label>
                <select id="album" name="album">
                    <option value="17Carat(2015)">17 Carat (2015)</option>
                    <option value="BoysBe(2016)">Boys Be (2016)</option>
                </select><br>

                <label for="jumlah">Jumlah</label>
                <select id="jumlah" name="jumlah">
                    <option value="1">1</option>
                </select><br>

                <label for="alamat">Alamat Pengiriman</label>
                <textarea id="alamat" name="alamat" rows="3" placeholder="Alamat pengiriman"></textarea>

                <div><b>Pilih Metode Pembayaran</b></div>
                <span>
                    <label><input type="checkbox" name="metode_pembayaran" value="bni"> BNI</label>
                    <label><input type="checkbox" name="metode_pembayaran" value="mandiri"> Mandiri</label>
                    <label><input type="checkbox" name="metode_pembayaran" value="bca"> BCA</label>
                </span><br>

                <label for="buktiPembayaran">Unggah bukti pembayaran Anda:</label>
                <input type="file" id="buktiPembayaran" name="buktiPembayaran" accept=".jpg, .jpeg, .png, .pdf"><br><br>

                <input type="submit" value="Submit">
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 CaratCare. All rights reserved.</p>
    </footer>
</body>
</html>