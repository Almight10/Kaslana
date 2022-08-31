<?php
//buat koneksi database mysql
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "manusia";
$link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Identitas Diri</title>
    <style>
        /* ===GLOBAL STYLE=== */
        body {
            background-color: #F8F8F8;
        }

        div.container {
            width: 960px;
            padding: 10px 50px 50px;
            background-color: white;
            margin: 20px auto;
            box-shadow: 1px 0px 10px -1px 0px 10px;
        }

        h1 {
            text-align: center;
            font-family: Cambria, "Times New Roman", serif;
            clear: both;
        }

        /* ======TABLE====== */
        table {
            border-collapse: collapse;
            border-spacing: 0;
            border: 1px black solid;
            width: 100%;
        }

        th,
        td {
            padding: 8px 15px;
            border: 1px black solid;
        }

        tr:nth-child(2n+3) {
            background-color: #F2F2F2;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Data Diri</h1>
        <table border="1">
            <tr>
                <th>Foto</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Mimpi</th>
            </tr>
            <?php
            //jalankan query
            $query = "SELECT * FROM identitas";
            $result = mysqli_query($link, $query);

            //buat perulangan untuk element tabel dari data mahasiswa
            while ($data = mysqli_fetch_assoc($result)) {
                //konvert date MySQL (yyyy-mm-dd) menjadi dd-mm-yyyy
                $tanggal_php = strtotime($data["tanggal_lahir"]);
                $tanggal = date("d - m - Y", $tanggal_php);

                echo "<tr>";
                echo "<td>$data[foto]</td>";
                echo "<td>$data[nama]</td>";
                echo "<td>$data[alamat]</td>";
                echo "<td>$data[tempat_lahir]</td>";
                echo "<td>$tanggal</td>";
                echo "<td>$data[mimpi]</td>";
                echo "<tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>