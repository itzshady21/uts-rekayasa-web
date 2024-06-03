<?php 
class Aksi{
  protected $mysqli;
  function __construct(){
    require_once "database.php";
    $conn = new database();    
    $this->mysqli = $conn->connect();  
  }
  function tampilkanProduk($key){  
    $hasil = [];      
    $data = $this->mysqli->query("SELECT * FROM tbl_produk WHERE nama LIKE '%$key%'");
    while ($amb = mysqli_fetch_assoc($data)){
      $hasil[] = $amb;
    }
    return $hasil;
   
  }
  function tampilkan(){        
    $data = $this->mysqli->query("SELECT * FROM tbl_produk");
    $hasil = [];
    $where= "";
    if(!is_null($id)) $where = " WHERE id = '$id'";
    $data = $this->mysqli->query("SELECT * FROM tbl_produk  WHERE stok > 0 ");
    while($amb = mysqli_fetch_assoc($data)){
      $hasil[] = $amb;
    }    
    return $hasil;
  }
  function simpan($id,$nama,$satuan,$harga,$stok){    

  
    $result = $this->mysqli->query("INSERT INTO tbl_produk values('$id','$nama','$satuan','$harga','$stok')");		    
    if($result) return 1;
      else return 0;    
  }
  function update($id,$nama,$satuan,$harga,$stok){    
    $result = $this->mysqli->query("UPDATE tbl_produk SET id = '$id', nama = '$nama', satuan = '$satuan', harga = '$harga', stok = '$stok' WHERE id = '$id'");		    
    if($result) return 1;
      else return 0;    
  }
  function detail($id){    
    $result = $this->mysqli->query("SELECT * FROM tbl_produk WHERE id = '$id'");		
    $data   = $result->fetch_assoc();        
    return $data;
  }
  function hapus($id){    
    $this->mysqli->query("DELETE FROM tbl_produk WHERE id = '$id'");		    
	}
}
?>