<?php
include "../aksi.php";
$mhs = new Aksi;
echo json_encode($mhs->tampilkanProduk($_GET['key']));

?>