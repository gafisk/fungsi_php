<?php
function update($table, $data, $condition) {
    $set = "";
    foreach ($data as $key => $value) {
        $set .= "$key = :$key, ";
    }
    $set = rtrim($set, ", ");

    $cond = "";
    foreach ($condition as $key => $value) {
        $cond .= "$key = :cond_$key AND ";
    }
    $cond = rtrim($cond, " AND ");

    $sql = "UPDATE $table SET $set WHERE $cond";

    foreach ($data as $key => $value) {
        $sql = str_replace(":$key", "'$value'", $sql);
    }
    foreach ($condition as $key => $value) {
        $sql = str_replace(":cond_$key", "'$value'", $sql);
    }

    return $sql;
}

$data = [
    'jenis_kelamin' => '$jenis_kelamin',
    'nama' => '$nama',
    'alamat' => '$alamats'
];

$condition = [
    'id_pelanggan' => '$id_pelanggan'
];

echo update('pelanggan', $data, $condition);

?>