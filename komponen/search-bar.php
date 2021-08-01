<?php
   /* require '../config.php';
    
if (!empty($_GET['cari_barang'])) {
		$cari = trim(strip_tags($_POST['keyword']));
		if ($cari == '') {
		} else {
			$sql = "select barang.*, kategori.id_kategori, kategori.nama_kategori
					from barang inner join kategori on barang.id_kategori = kategori.id_kategori
					where barang.id_barang like '%$cari%' or barang.nama_barang like '%$cari%' or barang.merk like '%$cari%'";
			$row = $config->prepare($sql);
			$row->execute();
			$hasil1 = $row->fetchAll();
?>
			<table class="table table-stripped" width="100%" id="example2">
				<tr>
					<th>ID Barang</th>
					<th>Nama Barang</th>
					<th>Merk</th>
					<th>Stok</th>
					<th>Harga Jual</th>
					<th>Aksi</th>
				</tr>
				<?php foreach ($hasil1 as $hasil) { ?>
					<tr>
						<td><?php echo $hasil['id_barang']; ?></td>
						<td><?php echo $hasil['nama_barang']; ?></td>
						<td><?php echo $hasil['merk']; ?></td>
						<td><?php echo $hasil['stok']; ?></td>
						<td><?php echo $hasil['harga_jual']; ?></td>
						<td>
							<a href="fungsi/tambah/tambah.php?jual=jual&id=<?php echo $hasil['id_barang']; ?>&id_kasir=<?php echo $_SESSION['admin']['id_member']; ?>" class="btn btn-success">
								<i class="zmdi zmdi-shopping-cart-plus"></i></a>
						</td>
					</tr>
				<?php } ?>
			</table>
<?php
		}
	}
*/

define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB1', 'db_toko');
 
// Buat Koneksinya
$db1 = new mysqli(HOST, USER, PASS, DB1);
  
  if(isset($_POST["query"])){
    $output = '';
    $key = "%".$_POST["query"]."%";
    $query = "SELECT * FROM barang WHERE nama_barang like ? LIMIT 10";
    $dewan1 = $db1->prepare($query);
    $dewan1->bind_param('s', $key);
    $dewan1->execute();
    $res1 = $dewan1->get_result();
 
    $output = '<ul class="list-unstyled">';
    if($res1->num_rows > 0){
      while ($row = $res1->fetch_assoc()) {
        $output .= '<li><a href="index.php?'.$row["id_barang"].'"> '.$row["nama_barang"].'</a></li>';  
      }
    } else {
      $output .= '<li>Tidak ada yang cocok.</li>';  
    }  
    $output .= '</ul>';
    echo $output;
  }
?>
