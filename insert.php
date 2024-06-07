<?php
function insert($table, $data) {
    $columns = implode(", ", array_keys($data));
    $values  = implode("', '", array_values($data));
  
    $sql = "INSERT INTO $table ($columns) VALUES ('$values')";

    return $sql;
}

$datas = [
    'jenis_kelamin' => '$jenis_kelamin',
    'nisn' => '$nisn',
    'nama' => '$nama',
    'alamat' => '$alamat'
];

echo insert('pelanggan', $datas);

?>