<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['level'])) {
    echo "<center>Untuk mengakses halaman, Anda harus login <br>";
    echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else { 
include "../../lib/config_web.php";
include "../../lib/koneksi.php";

$id_stok = $_GET['id_stok'];
$query = mysqli_query($koneksi, "SELECT * FROM vw_produk WHERE id_stok='$id_stok' order by id_stok asc");

$dataProduk = mysqli_fetch_array($query); 
$ArrayNamaProduk = explode(" ", $dataProduk['nama_produk'] );
include "../templates/header.php"; ?>

      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Manajemen <small>Data Produk</small></h3>
              </div>

            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Edit <small>data produk</small></h2>
  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
          <form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="aksi_edit.php" enctype="multipart/form-data">
		  <input type="hidden" name="id_stok" value="<?php echo $dataProduk['id_stok'];?>">

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Nama Kategori <span class="required"></span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                       
						  <select class="form-control col-md-7 col-xs-12" name="id_kategori">
						  <?php
						  $query = mysqli_query($koneksi, "SELECT * FROM kategori");
						  while ($data = mysqli_fetch_array($query))
						  {
						  ?>
              <option <?php echo $data['nama']== $ArrayNamaProduk[0]? "selected='selected' " : "" ?>
              value="<?php echo $data['id_kategori'] ?>"><?php echo $data['nama'] ?></option>
						  <?php } ?>
						  </select>
                        </div>
                      </div>
					                   <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Nama Produk <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="first-name" name="nama_produk" value="<?php echo  $ArrayNamaProduk[1]; ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                     
					                   <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Gambar <span class="required"></span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                        
                          <input type="file" id="first-name" name="gambar">
                        </div>
                      </div>
					                   <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Harga <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="first-name" name="harga" value="<?php echo $dataProduk['harga']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Stok <span class="required"></span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="first-name" name="stok" value="<?php echo $dataProduk['stok']; ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                              <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Size <span class="required"></span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                       
						  <select class="form-control col-md-7 col-xs-12" name="size">
						  <?php
						  $query = mysqli_query($koneksi, "SELECT DISTINCT(size), id_stok FROM stok group by size  order by id_stok asc");
						  while ($data = mysqli_fetch_array($query))
						  {
						  ?>
						  <option <?php echo $data['size']==$dataProduk['size'] ? "selected='selected' " : "" ?>
              value="<?php echo $data['size'] ?>"><?php echo $data['size'] ?></option>
						  <?php } ?>
						  </select>

              

                        </div>
                      </div>
					                   <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Deskripsi <span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="first-name" name="deskripsi" value="<?php echo $dataProduk['deskripsi']; ?>" required="required" class="form-control col-md-7 col-xs-12">
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