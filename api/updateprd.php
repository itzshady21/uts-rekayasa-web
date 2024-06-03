<?php
$input = json_decode(file_get_contents('php://input'),true);

include "../aksi.php";
$aksi = new Aksi;
$id = $input['id'];
$nama = $input['nama'];
$satuan = $input['satuan'];
$harga = $input['harga'];
$stok = $input['stok'];
$hasil = $aksi->update($id,$nama,$satuan,$harga,$stok);
if($hasil==1){
    $respon = [
        'status' =>200,
        'pesan' =>'sukses'
    ];
}else{
    $respon = [
        'status' =>201,
        'pesan' =>'gagal'
    ];
}
echo json_encode($respon);
?>