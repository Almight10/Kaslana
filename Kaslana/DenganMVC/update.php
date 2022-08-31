<?php 

include 'model.php';
$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$mimpi = $_POST['mimpi'];

$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array($ext,$ekstensi) ) {
	header("location:view.php?alert=gagal_ekstensi");
}else{
	if($ukuran < 1044070){	
                $xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], 'images/'.$rand.'_'.$filename);
    }
}

mysqli_query($connect,"update identitas set nama='$nama', alama$alamat='$alamat', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', mimpi='$mimpi', foto='$xx' 
WHERE id='$id'");

header("location:view.php?pesan=update");
?>