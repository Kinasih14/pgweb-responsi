<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
            font-family: 'Arial', sans-serif; /* Ganti dengan font family yang diinginkan */
        }

        form {
            max-width: 400px;
            margin: auto;
        }

        h2 {
            padding: 10px; /* Tambahkan padding untuk judul */
        }
    </style>
</head>

<body>
    <form action="submit.php" onsubmit="return validateForm()" method="post">
    </form>
    <p id="informasi" class="mt-3">
        <?php
        // Skrip PHP untuk memproses form
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = $_POST['nama'];
            $alamat_email = $_POST['alamat_email'];
            $target_bacaa = $_POST['target_bacaa'];
            $media_literasi = $_POST['media_literasi'];
            $genre_fav = $_POST['genre_fav'];
            $frekuensi_internet = $_POST['frekuensi_internet'];
            $aktivitas_internet = $_POST['aktivitas_internet'];
            $topik_literasi = $_POST['topik_literasi'];

            // Sesuaikan dengan setting MySQL
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "pgweb-acara8";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Perbaiki sintaks SQL dan tambahkan tanda kutip pada nilai yang bukan angka
            $sql = "INSERT INTO target_literasi (nama, alamat_email, target_bacaa, media_literasi, genre_fav, frekuensi_internet, aktivitas_internet, topik_literasi)
            VALUES ('$nama', '$alamat_email', '$target_bacaa', '$media_literasi', '$genre_fav', '$frekuensi_internet', '$aktivitas_internet', '$topik_literasi')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
        ?>
    </p>

    <!-- Tombol untuk mengarahkan ke halaman tabel_targer_literasi.php -->
    <a href="tabel_target_literasi.php"><button type="button" class="btn btn-secondary mt-3">Lihat Tabel</button></a>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        function validateForm() {
            let text = "Formulir berhasil disubmit!";
            document.getElementById("informasi").innerHTML = text;
            return true; // Formulir akan disubmit
        }
    </script>
</body>

</html>
