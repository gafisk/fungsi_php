<?php
function delete($table, $condition) {
    $cond = "";
    foreach ($condition as $key => $value) {
        $cond .= "$key = :$key AND ";
    }
    $cond = rtrim($cond, " AND ");

    $sql = "DELETE FROM $table WHERE $cond";
    
    foreach ($condition as $key => $value) {
        $sql = str_replace(":$key", "'$value'", $sql);
    }

    return $sql;
}

$condition = [
    'id_pelanggan' => '$id_pelanggan'
];

echo delete('pelanggan', $condition);

?>