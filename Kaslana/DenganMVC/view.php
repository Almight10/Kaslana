 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" type="text/css" href="index.css">

 </head>

 <body>
     <title>Identitas</title>
     <!-- Membuat form upload dengan action upload.php -->
     <center>
         <h1>Form Upload Gambar</h1>
         <form method="post" enctype="multipart/form-data" action="controller.php">
             <input type="file" name="gambar">
             <input type="submit" value="Upload">
         </form>
     </center>
     <!-- Form menampilkan data gambar ke dalam tabel -->
     <h2>Data Gambar</h2>
     <hr>
     <center>
         <table border="1" cellpadding="8">
             <tr>
                 <th>Foto</th>
                 <th>Nama</th>
                 <th>Alamat</th>
                 <th>Tempat Lahir</th>
                 <th>Tanggal Lahir</th>
                 <th>Mimpi</th>
                 <th>Action</th>
             </tr>
     </center>
     <!-- Membuat proses tampil data -->
     <?php
        // Mengambil action dari file koneksi.php
        include "model.php";
        // Memanggil semua data dalam tabel gambar
        $query = "SELECT * FROM identitas";
        // Eksekusi/Jalankan query dari variabel $query
        $sql = mysqli_query($connect, $query);
        // Ambil jumlah data dari hasil eksekusi $sql
        $row = mysqli_num_rows($sql);
        // Kondisi perulangan Jika jumlah data lebih dari 0 (Berarti jika data ada)
        if ($row > 0) {
            // Mengambil semua data dari hasil eksekusi $sql
            while ($data = mysqli_fetch_array($sql)) {
                $tanggal_php = strtotime($data["tanggal_lahir"]);
                $tanggal = date("d - m - Y", $tanggal_php);

                echo "<tr>";
                echo "<td><img src='images/" . $data['foto'] . "' width='100' height='100'></td>";
                echo "<td>$data[nama]</td>";
                echo "<td>$data[alamat]</td>";
                echo "<td>$data[tempat_lahir]</td>";
                echo "<td>$tanggal</td>";
                echo "<td>$data[mimpi]</td>";
                echo "<td><a href='hapus.php?id=$data[id]'>Hapus</a></td></tr>";
                echo "<td><a href='edit.php?id=$data[id]'>Edit</a></td></tr>";
            }
            // Jika data tidak ada
        }
        ?>
     </table>
 </body>

 </html>