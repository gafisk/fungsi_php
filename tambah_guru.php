<?php
session_start();
include 'conn.php';

if (isset($_POST['submit'])){
  $data = [
    'nama' => $_POST['nama'],
    'nip' => $_POST['nip'],
    'no_hp' => $_POST['nohp']
  ];
  if (!input_check($data)) {
    echo "<script>alert('Semua kolom inputan tidak boleh kosong atau berisi spasi saja!');</script>";
  } else {
    insert('guru', $data);
    header('location:index.php');
    exit();
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="" method="post">
    <label for="">nama</label>
    <input type="text" name="nama" id="">
    <label for="">nip</label>
    <input type="text" name="nip" id="">
    <label for="">nohp</label>
    <input type="text" name="nohp" id="">
    <button type="submit" name="submit" onclick="return confirm('simpan?')"> Simpan Data</button>
  </form>
</body>

</html>