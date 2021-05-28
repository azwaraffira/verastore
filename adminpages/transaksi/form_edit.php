<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['level'])) {
    echo "<center>Untuk mengakses halaman, Anda harus login <br>";
    echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else { 
include "../../lib/config_web.php";
include "../../lib/koneksi.php";

$id_transaksi = $_GET['id_transaksi'];
$query = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'");

$dataTransaksi = mysqli_fetch_array($query); 

include "../templates/header.php"; ?>

      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Manajemen <small>Data Transaksi</small></h3>
              </div>

            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Tambah <small>data transaksi</small></h2>
  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
          <form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="aksi_edit.php" enctype="multipart/form-data">
		  <input type="hidden" name="id_transaksi" value="<?php echo $dataTransaksi['id_transaksi'];?>">

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Nama User <span class="required"></span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                       
						  <select class="form-control col-md-7 col-xs-12" name="nama_user">
						  <?php
						  $query = mysqli_query($koneksi, "SELECT * FROM user");
						  while ($data = mysqli_fetch_array($query))
						  {
						  ?>
						  <option value="<?php echo $data['id_user'];?>"><?php echo $data['nama_user'];?></option>
						  <?php } ?>
						  </select>
                        </div>
                      </div>
              <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Tujuan <span class="required"></span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                       
              <select class="form-control col-md-7 col-xs-12" name="kota">
              <?php
              $query = mysqli_query($koneksi, "SELECT * FROM tujuan");
              while ($data = mysqli_fetch_array($query))
              {
              ?>
              <option value="<?php echo $data['id_tujuan'];?>"><?php echo $data['kota'];?></option>
              <?php } ?>
              </select>
                        </div>
                      </div>
					                   <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Waktu <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="date" id="first-name" name="waktu" value="<?php echo $dataTransaksi['waktu']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  	                   
					                   <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Status <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="first-name" name="status" value="<?php echo $dataTransaksi['status']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					                   <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Total <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="first-name" name="total" value="<?php echo $dataTransaksi['total']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-2">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-mail-forward"></i> Kembali</button>
                          <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
		<?php include "../templates/footer.php"; } ?>