<?php
session_start();
include 'conn.php';

$datas = mysqli_query($conn, "SELECT * FROM guru");

if (isset($_GET['hapus'])){
  $id_guru = $_GET['hapus'];
  $data = [
    'id_guru' => $id_guru,
  ];
  delete('guru', $data);
  header('location:index.php');
  exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Read Data</title>
</head>

<body>
  <?php if (isset($_SESSION['sukses']) && $_SESSION['sukses']) : ?>
  <div class="alert alert-success alert-dismissible fade show" id="myAlert" role="alert">
    <strong>Sukses,</strong> <?=$_SESSION['msg']?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <?php
unset($_SESSION['sukses']);
unset($_SESSION['msg']);
endif; ?>

  <?php if (isset($_SESSION['gagal']) && $_SESSION['gagal']) : ?>
  <div class="alert alert-success alert-dismissible fade show" id="myAlert" role="alert">
    <strong>Gagal,</strong> <?=$_SESSION['msg']?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <?php
unset($_SESSION['gagal']);
unset($_SESSION['msg']);
endif; ?>
  <br>
  <a href="tambah_guru.php">Tambah Guru</a>
  <br>
  <br>
  <table>
    <tr>
      <th>Nama</th>
      <th>NIP</th>
      <th>No Telp</th>
      <th>Aksi</th>
    </tr>
    <?php foreach($datas as $data): ?>
    <tr>
      <td><?php echo $data['nama'];?></td>
      <td><?php echo $data['nip'];?></td>
      <td><?php echo $data['no_hp'];?></td>
      <td>
        <a href="edit_guru.php?edit=<?=$data['id_guru']?>">Edit</a>
        <a href="?hapus=<?=$data['id_guru']?>" onclick="return confirm('yakin')">Hapus</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>

</body>

</html>