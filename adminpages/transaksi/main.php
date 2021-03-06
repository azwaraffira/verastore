<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['level'])) {
    echo "<center>Untuk mengakses halaman, Anda harus login <br>";
    echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else { 
include "../../lib/config_web.php";
include "../../lib/koneksi.php";
include "../../lib/pagination.php";
//
// untuk mengetahui halaman keberapa yang sedang dibuka
// juga untuk men-set nilai default ke halaman 1 jika tidak ada
// data $_GET['page'] yang dikirimkan
$page = 1;
if (isset($_GET['page']) && !empty($_GET['page']))
	$page = (int)$_GET['page'];

// untuk mengetahui berapa banyak data yang akan ditampilkan
// juga untuk men-set nilai default menjadi 5 jika tidak ada
// data $_GET['perPage'] yang dikirimkan
$dataPerPage = 5;
if (isset($_GET['perPage']) && !empty($_GET['perPage']))
	$dataPerPage = (int)$_GET['perPage'];

// tabel yang akan diambil datanya
$table = 'vw_transaksi';
$idName = 'id_transaksi';
$table2 = 'rf_status';

// ambil data
$dataTable = getViewData($koneksi, $table, $idName, $page, $dataPerPage);

include "../templates/header.php";
?>

<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Manajemen <small>Data Transaksi</small></h3>
			</div>

			<div class="title_right">
				<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search for...">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button">
								Go!
							</button> </span>
					</div>
				</div>
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="row">

			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2><small>Data Transaksi</small></h2>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">

						<table class="table table-striped">
							<thead>
								<tr>
									<th style="width: 50px;">No</th>
									<th style="width: 50px;">Nama Customer</th>
									<th style="width: 110px;">Tanggal Transaksi</th>
									<th style="width: 110px;">Harga Ongkir</th>
									<th style="width: 110px;">Total Berat</th>
									<th style="width: 110px;">Nama Kurir</th>
									<th style="width: 110px;">Total Bayar</th>
									<th style="width: 110px;">Status Pembayaran</th>
									<th style="width: 110px;">Aksi</th>

								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($dataTable as $i => $data)
								{
								$no = ($i + 1) + (($page - 1) * $dataPerPage);
								?>
								<tr>
								<th scope="row"><?php echo $no; ?></th>
								<td><?php echo $data['nama_lengkap'];?></td>
								<td><?php echo $data['tgl_transaksi'];?></td>
								<td>Rp. <?php echo $data['harga_ongkir'];?></td>
								<td><?php echo $data['total_berat'];?> gram</td>
								<td><?php echo $data['nama_kurir'];?></td>
								<td>Rp. <?php echo $data['harga_total'];?></td>
								
								<td> 
									<?php $style = findByValue($koneksi, $table2, "nama", $data['status_pembayaran']);  ?> 
									<span class="label <?php echo $style['style'];?>"><?php echo $data['status_pembayaran'];?> </span>
								</td>

								<td><a href="<?php echo $admin_url; ?>transaksi/item.php?id_transaksi=<?php echo $data['id_transaksi'];?>">
								<button class="btn btn-warning">
									Detail
								</button></a>
								
								<a href="<?php echo $admin_url; ?>transaksi/hapus.php?id_transaksi=<?php echo $data['id_transaksi'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')">
								
								<!-- <button class="btn btn-danger">
									<i class="fa fa-remove"></i>
								</button></a></td> -->

								</tr>

								<?php } ?>
							</tbody>
						</table>

					</div>
				</div>
			</div>
			<!-- <div class="col-xs-12">
				<a href="<?php echo $admin_url; ?>transaksi/form_tambah.php">
				<button class="btn btn-primary">
					<i class="fa fa-plus"></i> Tambah
				</button></a>
				<ul class="pagination pull-right">

	<?php showPagination($koneksi, $table, $dataPerPage); ?>
</ul>
			
			</div> -->
			<div class="clearfix"></div>

		</div>
	</div>
</div>
<!-- /page content -->
<?php
include "../templates/footer.php";
}
?>