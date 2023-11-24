<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Target Literasi</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>Tabel Target Literasi</h2>

    <?php
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

    $sql = "SELECT * FROM target_literasi";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>Nama</th>
                    <th>Alamat Email</th>
                    <th>Target Baca</th>
                    <th>Media Literasi</th>
                    <th>Genre Favorit</th>
                    <th>Frekuensi Internet</th>
                    <th>Aktivitas Internet</th>
                    <th>Topik Literasi</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["nama"] . "</td>
                    <td>" . $row["alamat_email"] . "</td>
                    <td align='right'>" . $row["target_bacaa"] . "</td>
                    <td>" . $row["media_literasi"] . "</td>
                    <td>" . $row["genre_fav"] . "</td>
                    <td>" . $row["frekuensi_internet"] . "</td>
                    <td>" . $row["aktivitas_internet"] . "</td>
                    <td>" . $row["topik_literasi"] . "</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>

    <!-- Tombol untuk kembali ke halaman sebelumnya -->
    <button onclick="goBack()">Previous</button>
    <a href="landing.html"><button type="button" class="btn btn-secondary mt-3">Home</button></a>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>
