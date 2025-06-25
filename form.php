<!--
Nama : Wa Ode Zachra Chaerani
NPM  : 140810230062
Kelas: B
-->
<!DOCTYPE html>
<html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #F2F0EA;
                margin: 0;
                padding: 0;
            }

            h2 {
                color: black;
                text-align: center;
                margin-top: 20px;
            }

            form {
                background-color: #A8D5E3;
                margin: auto;
                padding: 20px;
                border-radius: 8px;
                max-width: 600px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }

            input[type="text"], input[type="date"], textarea {
                width: 100%;
                padding: 8px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #d7ccc8;
                border-radius: 4px;
                box-sizing: border-box;
                background-color: #F2F0EA;
            }

            input[type="radio"] {
                margin: 0 5px;
            }

            input[type="submit"] {
                width: 100%;
                background-color: #FF78AC;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            input[type="submit"]:hover {
                background-color: #FF4B92; 
            }

            .output-container {
                background-color: #A8D5E3;
                margin: 20px auto;
                padding: 20px;
                border-radius: 8px;
                max-width: 600px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }

            .output-container h2 {
                color: #FF78AC; 
                font-size: 20px;
                margin-bottom: 20px;
            }

            .output-container p {
                font-size: 14px;
                color: #5d4037;
                margin: 10px 0;
                line-height: 1.6;
            }

            .output-container strong {
                color: #3e2723;
            }

            .error {
                color: #d32f2f;
            }
        </style>
    </head>
    <body>
        <?php
            $NPMErr = $namaErr = $alamatErr = $tempatLahirErr = $tanggalLahirErr = $jenisKelaminErr = $hobiErr = "";
            $NPM = $nama = $alamat = $tempatLahir = $tanggalLahir = $jenisKelamin = $hobi = "";

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if(empty($_POST["NPM"])){
                    $NPMErr = "NPM diperlukan";
                } else{
                    $NPM = test_input($_POST["NPM"]);

                    if (!preg_match('/^[0-9]+$/', $NPM)) {
                        $NPMErr = "NPM hanya boleh berisi angka";
                    }
                }

                if(empty($_POST["nama"])){
                    $namaErr = "Nama diperlukan";
                } else{
                    $nama = test_input($_POST["nama"]);

                    if(!preg_match("/^[a-zA-Z\s]*$/", $nama)){
                        $namaErr = "Nama hanya boleh berisi huruf dan spasi";
                    }
                }

                if(empty($_POST["alamat"])){
                    $alamatErr = "Alamat diperlukan"; 
                } else{
                    $alamat = test_input($_POST["alamat"]);
                }

                if(empty($_POST["tempatLahir"])){
                    $tempatLahirErr = "Tempat lahir diperlukan";
                } else{
                    $tempatLahir = test_input($_POST["tempatLahir"]);

                    if(!preg_match("/^[a-zA-Z\s]*$/", $tempatLahir)){
                        $tempatLahirErr = "Tempat lahir hanya boleh berisi huruf dan spasi";
                    }
                }

                if (empty($_POST["tanggalLahir"])) {
                    $tanggalLahirErr = "Tanggal lahir diperlukan";
                } else {
                    $tanggalLahir = test_input($_POST["tanggalLahir"]);
                }
    
                if (empty($_POST["jenisKelamin"])) {
                    $jenisKelaminErr = "Jenis kelamin diperlukan";
                } else {
                    $jenisKelamin = test_input($_POST["jenisKelamin"]);
                }
    
                if (empty($_POST["hobi"])) {
                    $hobiErr = "Hobi diperlukan";
                } else {
                    $hobi = test_input($_POST["hobi"]);
                }
            }
            function test_input($data){ 
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
        ?>

        <h2>Form Input Data Mahasiswa</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            NPM: <span class="error">* <?php echo $NPMErr; ?></span>
            <input type="text" name="NPM" value="<?php echo $NPM; ?>">
            <br><br>

            Nama: <span class="error">* <?php echo $namaErr; ?></span>
            <input type="text" name="nama" value="<?php echo $nama; ?>">
            <br><br>

            Alamat: <span class="error">* <?php echo $alamatErr; ?></span>
            <textarea name="alamat" rows="3" cols="40"><?php echo $alamat; ?></textarea>
            <br><br>

            Tempat Lahir: <span class="error">* <?php echo $tempatLahirErr; ?></span>
            <input type="text" name="tempatLahir" value="<?php echo $tempatLahir; ?>">
            <br><br>

            Tanggal Lahir: <span class="error">* <?php echo $tanggalLahirErr; ?></span>
            <input type="date" name="tanggalLahir" value="<?php echo $tanggalLahir; ?>">
            <br><br>

            <div>Jenis Kelamin:<span class="error">* <?php echo $jenisKelaminErr; ?></span></div>
            <input type="radio" name="jenisKelamin" value="Laki-laki" <?php if (isset($jenisKelamin) && $jenisKelamin == "Laki-laki") echo "checked"; ?>> Laki-laki
            <input type="radio" name="jenisKelamin" value="Perempuan" <?php if (isset($jenisKelamin) && $jenisKelamin == "Perempuan") echo "checked"; ?>> Perempuan
            <br><br>

            Hobi: <span class="error">* <?php echo $hobiErr; ?></span>
            <input type="text" name="hobi" value="<?php echo $hobi; ?>">
            <br><br>

            <input type="submit" name="submit" value="Submit">
        </form>

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($NPMErr) && empty($namaErr) && empty($alamatErr) && empty($tempatLahirErr) && empty($tanggalLahirErr) && empty($jenisKelaminErr) && empty($hobiErr)) {
                echo '<div class="output-container">';
                echo "<h2>Data yang Anda Input:</h2>";
                echo "<p><strong>NPM:</strong> $NPM</p>";
                echo "<p><strong>Nama:</strong> " . strtoupper($nama) . "</p>";
                echo "<p><strong>Alamat:</strong> " . strtoupper($alamat) . "</p>"; 
                echo "<p><strong>Tempat Lahir:</strong> $tempatLahir</p>";
                echo "<p><strong>Tanggal Lahir:</strong> $tanggalLahir</p>";
                echo "<p><strong>Jenis Kelamin:</strong> $jenisKelamin</p>";
                echo "<p><strong>Hobi:</strong> $hobi</p>";
                echo '</div>';
            }
        ?>
    </body>
</html>
