<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['level'])) {
    echo "<center>Untuk mengakses halaman, Anda harus login <br>";
    echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else { 

include "../../lib/config_web.php";
include "../../lib/koneksi.php";
include "../../lib/pagination.php";
include "../templates/header.php";

$page = 1;
if (isset($_GET['page']) && !empty($_GET['page']))
	$page = (int)$_GET['page'];

    $dataPerPage = 5;
if (isset($_GET['perPage']) && !empty($_GET['perPage']))
	$dataPerPage = (int)$_GET['perPage'];

$id =$_GET["id_transaksi"];
$table1 = 'vw_transaksi';
$table2 = 'rf_info';
$idName = 'id_transaksi';

$dataTransaksi = getById($koneksi, $table1, $id , $idName, $page, $dataPerPage);

	foreach ($dataTransaksi as $i => $data)
	{
	$no = ($i + 1) + (($page - 1) * $dataPerPage);
    }

$dataStore = getTableData($koneksi, $table2, $page, $dataPerPage);

	foreach ($dataStore as $i => $storeData)
	{
	$no = ($i + 1) + (($page - 1) * $dataPerPage);
    }    



?>

<style>
@media print{
.nav_menu,.page-title,.clearfix,.pilihan{
    display: none;
}
}
</style>


<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Manajemen <small>Data Pesanan</small></h3>
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2><small>Detail Pesanan</small></h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">

<!-- content page -->
<section class="konten">
    <div class="container">
        <h2>Nota Pesanan</h2>
        <h3 align="center"><?php echo $storeData['nama']; ?></h3>
        <h5 align="center"><?php echo $storeData['alamat']; ?></h5>

<!-- header nota -->
            <div class="row">
                <div class="col-md-4">
                <h3>Pembelian</h3>
                <strong>No. Pembelian: <?php echo $data['id_transaksi']; ?></strong><br>
                Tanggal : <?php echo $data['tgl_transaksi'] ;?><br>
                Total : <?php echo number_format($data['harga_total']) ;?>
                </div>

            <div class="col-md-4">
                <h3>Customer</h3>
                <strong><?php echo $data['nama_lengkap'];?></strong><br>
                <p>
                    <?php echo $data['telp'];?><br>
                    <?php echo $data['email']; ?>
                </p>
                </div>

            <div class="col-md-4">
                <h3>Pengiriman</h3>
                <strong>Alamat : <?php echo $data['alamat'];?></strong><br>
                Kurir : <?php echo $data['nama_kurir'];?><br>
                Biaya ongkir: <?php echo $data['harga_ongkir'];?>
                
                </div>
                </div>
<div class="row">
    <p>
    <table class=" table table-bordered"> 
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
        <?php
			foreach ($dataTransaksi as $i => $dataTable)
			{
			$no = ($i + 1) + (($page - 1) * $dataPerPage);
			?>
            <tr>
                <th scope="row"><?php echo $no; ?></th>
                <td><?php echo $dataTable['nama_produk'];?></td>
                <td>Rp.<?php echo number_format ($dataTable['harga_per_produk']); ?></td>
                <td><?php echo $dataTable['jumlah_produk'];?></td>
                <td>Rp.<?php echo number_format ($dataTable['harga_per_item']);?>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
            </div>
    <div class="row">
                            <form method="post" class="pilihan">
                            <!-- <div class="form-group">
                                <label>Status</label>
                                <select name="pesan" class="form-control">
                                    <option value="">Pilih Status</option>
                                    <option value="bisa pesan">Bisan Pesan</option>
                                    <option value="pesanan penuh">Pesanan Penuh</option>
                                </select>
                            </div>  -->
                            
                            <div class="text-right">
                            <?php 
                            if( $data['id_status_pembayaran'] == 3){  ; ?>

                                <button class="btn btn-danger" name="batal">Batal</button>
                                <button class="btn btn-success" name="selesai">Selesai</button>
                                <?php }else if( $data['id_status_pembayaran'] == 4){?>
                                <button class="btn btn-primary" name="proses">Proses</button>
                                <button class="btn btn-danger" name="batal">Batal</button>
                                <?php }else if( $data['id_status_pembayaran'] == 5){?>
                                <button class="btn btn-primary" name="proses">Proses</button>
                                <button class="btn btn-success" name="selesai">Selesai</button>
                                <?php }else{?>
                                    <button class="btn btn-primary" name="proses">Proses</button>
                                    <button class="btn btn-success" name="selesai">Selesai</button>
                                    <button class="btn btn-danger" name="batal">Batal</button>
                            <?php } ?>
                            </div>
                            </form>
                        </div>

                        <?php
                        if (isset($_POST["proses"]))
                        {
                        $msg = updateStatus($koneksi, $data['id_transaksi'], 3);
                        echo"<script>alert('$msg');</script>";
                        echo"<script> window.location = '$admin_url'+'transaksi/main.php';</script>";
                        }else if(isset($_POST["selesai"])){
                            $msg = updateStatus($koneksi, $data['id_transaksi'], 4);
                            echo"<script>alert('$msg');</script>";
                        echo"<script> window.location = '$admin_url'+'transaksi/main.php';</script>";
                        }else if(isset($_POST["batal"])){
                            $msg = updateStatus($koneksi, $data['id_transaksi'], 5);
                            echo"<script>alert('$msg');</script>";
                        echo"<script> window.location = '$admin_url'+'transaksi/main.php';</script>";
                        }
                        ?>

   <p> <div class="alert alert-info" role="alert" >
  Bisa langsung diprint dan disimpan dengan menekan ctrl + P
</div>
    </div>
</section>
<!-- akhir section -->
            </div>
		</div>
	</div>
			<div class="col-xs-12">
	</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<?php
include "../templates/footer.php";
}
?>