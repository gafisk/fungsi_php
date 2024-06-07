<?php
session_start();
include 'conn.php';

if (isset($_GET['edit'])){
  $id_guru = $_GET['edit'];
  $datas = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM guru WHERE id_guru = '$id_guru'"));
  if (isset($_POST['submit'])){
    $data = [
      'nama' => $_POST['nama'],
      'nip' => $_POST['nip'],
      'no_hp' => $_POST['nohp']
    ];
    $condition = [
      'id_guru' => $id_guru
    ];
    if (!input_check($data)) {
      echo "<script>alert('Semua kolom inputan tidak boleh kosong atau berisi spasi saja!');</script>";
    } else {
      update('guru', $data, $condition);
      header('location:index.php');
      exit();
    }
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
    <input type="text" name="nama" id="" value="<?=$datas['nama']?>">
    <label for="">nip</label>
    <input type="text" name="nip" id="" value="<?=$datas['nip']?>">
    <label for="">nohp</label>
    <input type="text" name="nohp" id="" value="<?=$datas['no_hp']?>">
    <button type="submit" name="submit" onclick="return confirm('simpan?')"> Edit Data</button>
  </form>
</body>

</html>