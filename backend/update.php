<?php
require_once '../koneksi.php';

$rawData = file_get_contents('php://input');
$data = json_decode($rawData);

$sql = "update pegawai set " .
       "  nama='" . $data->nama . "'," .
       "  alamat='" . $data->alamat . "' " .
       "where nip='" . $data->nip . "'";
$result = pg_query($sql);
$row = pg_affected_rows($result);
$obj = new stdClass();
if($row > 0) {
    $obj->result = "success";
} else {
    $obj->result = "failed";
}
echo json_encode($obj);
?>