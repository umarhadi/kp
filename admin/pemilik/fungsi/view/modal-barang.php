<?php
if (isset($_POST["detail_barang"])) {
		$output = '';
		$connect = mysqli_connect("localhost", "root", "1", "db_toko");
		$query = "SELECT barang.*, kategori.id_kategori, kategori.nama_kategori
	  from barang inner join kategori on barang.id_kategori = kategori.id_kategori
	  where id_barang='" . $_POST["detail_barang"] . "'";
		$result = mysqli_query($connect, $query);
		$output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';
		while ($row = mysqli_fetch_array($result)) {
			$output .= '  
                <tr>  
                     <td width="30%"><label>ID Barang</label></td>  
                     <td width="70%">' . $row["id_barang"] . '</td>  
                </tr>
				<tr>  
                     <td width="30%"><label>Nama Barang</label></td>  
                     <td width="70%">' . $row["nama_barang"] . '</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Merk</label></td>  
                     <td width="70%">' . $row["merk"] . '</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Kategori</label></td>  
                     <td width="70%">' . $row["nama_kategori"] . '</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Harga Beli</label></td>  
                     <td width="70%">' . $row["harga_beli"] . '</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Harga Jual</label></td>  
                     <td width="70%">' . $row["harga_jual"] . '</td>  
                </tr>
				<tr>  
                     <td width="30%"><label>Satuan Barang</label></td>  
                     <td width="70%">' . $row["satuan_barang"] . '</td>  
                </tr>
				<tr>  
                     <td width="30%"><label>Stok</label></td>  
                     <td width="70%">' . $row["stok"] . '</td>  
                </tr>
				<tr>  
                     <td width="30%"><label>Tanggal Input</label></td>  
                     <td width="70%">' . $row["tgl_input"] . '</td>  
                </tr>
				<tr>  
                     <td width="30%"><label>Tanggal Update</label></td>  
                     <td width="70%">' . $row["tgl_update"] . '</td>  
                </tr>
                ';
		}
		$output .= "</table></div>";
		echo $output;
	}
?>