<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testing";

$conn = mysqli_connect($servername, $username, $password, $dbname);

function insert($table, $data) {
  global $conn;
  
  $columns = implode(", ", array_keys($data));
  $escaped_values = array_map(function($value) use ($conn) {
    return mysqli_real_escape_string($conn, $value);
  }, array_values($data));
  $values = implode("', '", $escaped_values);

  $sql = "INSERT INTO $table ($columns) VALUES ('$values')";

  $query = mysqli_query($conn, $sql);
  
  if ($query) {
    $_SESSION['sukses'] = true;
    $_SESSION['msg'] = "Data Berhasil Di Tambahkan.";
  } else {
    $_SESSION['gagal'] = true;
    $_SESSION['msg'] = "Data Gagal Di Tambahkan";
  }

}

function update($table, $data, $condition) {
  global $conn;

  // Menyusun bagian SET dari query
  $set = "";
  foreach ($data as $key => $value) {
      $escaped_value = mysqli_real_escape_string($conn, $value);
      $set .= "$key = '$escaped_value', ";
  }
  $set = rtrim($set, ", ");

  // Menyusun bagian WHERE dari query
  $cond = "";
  foreach ($condition as $key => $value) {
      $escaped_value = mysqli_real_escape_string($conn, $value);
      $cond .= "$key = '$escaped_value' AND ";
  }
  $cond = rtrim($cond, " AND ");

  // Membentuk query lengkap
  $sql = "UPDATE $table SET $set WHERE $cond";

  // Debug log
  error_log("SQL: $sql");

  $query = mysqli_query($conn, $sql);
  
  if ($query) {
      $_SESSION['sukses'] = true;
      $_SESSION['msg'] = "Data Berhasil Di Perbarui";
  } else {
      $_SESSION['gagal'] = true;
      $_SESSION['msg'] = "Data Gagal Di Perbarui";
      // Debug log
      error_log("Error: " . mysqli_error($conn));
  }
}

function delete($table, $condition) {
  global $conn;
  $cond = "";
  foreach ($condition as $key => $value) {
      $escaped_value = mysqli_real_escape_string($conn, $value);
      $cond .= "$key = '$escaped_value' AND ";
  }
  $cond = rtrim($cond, " AND ");

  $sql = "DELETE FROM $table WHERE $cond";

  $query = mysqli_query($conn, $sql);
  
  if ($query) {
      $_SESSION['sukses'] = true;
      $_SESSION['msg'] = "Data Berhasil Dihapus";
  } else {
      $_SESSION['gagal'] = true;
      $_SESSION['msg'] = "Data Gagal Dihapus";
  }
}

function input_check($data) {
  foreach ($data as $key => $value) {
      $trimmedValue = trim($value);
      if (empty($trimmedValue)) {
          return false;
      }
  }
  return true;
}

?>