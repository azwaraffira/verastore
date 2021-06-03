<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['level'])) {
    echo "<center>Untuk mengakses halaman, Anda harus login <br>";
    echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else { 
include "../../lib/config_web.php";
include "../../lib/koneksi.php";

$id_customer = $_GET['id_customer'];
$query = mysqli_query($koneksi, "SELECT * FROM customer WHERE id_customer='$id_customer'");

$data = mysqli_fetch_array($query); 

include "../templates/header.php"; ?>
      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Manajemen <small>Data User</small></h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Tambah <small>data user</small></h2>
  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
	  <form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="aksi_edit.php">
		<input type="hidden" name="id_customer" value="<?php echo $data['id_customer'];?>">
	  <div class="form-group">
		<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Nama Customer <span class="required">*</span>
		</label>
		<div class="col-md-10 col-sm-10 col-xs-12">
		  <input type="text" id="first-name" name="nama" value="<?php echo $data['nama_lengkap'];?>" required="required" class="form-control col-md-7 col-xs-12">
		</div>
	  </div>
    <div class="form-group">
    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Telepon <span class="required">*</span>
    </label>
    <div class="col-md-10 col-sm-10 col-xs-12">
      <input type="text" id="first-name" name="telepon" value="<?php echo $data['telp'];?>" required="required" class="form-control col-md-7 col-xs-12">
    </div>
    </div>
    <div class="form-group">
    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Alamat <span class="required">*</span>
    </label>
    <div class="col-md-10 col-sm-10 col-xs-12">
      <input type="text" id="first-name" name="alamat" value="<?php echo $data['alamat'];?>" required="required" class="form-control col-md-7 col-xs-12">
    </div>
    </div>
    <div class="form-group">
    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Kota <span class="required">*</span>
    </label>
    <div class="col-md-10 col-sm-10 col-xs-12">
      <input type="text" id="first-name" name="kota" value="<?php echo $data['kota'];?>" required="required" class="form-control col-md-7 col-xs-12">
    </div>
    </div>
    <div class="form-group">
    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Provinsi <span class="required">*</span>
    </label>
    <div class="col-md-10 col-sm-10 col-xs-12">
      <input type="text" id="first-name" name="provinsi" value="<?php echo $data['provinsi'];?>" required="required" class="form-control col-md-7 col-xs-12">
    </div>
    </div>
    <div class="form-group">
    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Kode Pos<span class="required">*</span>
    </label>
    <div class="col-md-10 col-sm-10 col-xs-12">
      <input type="text" id="first-name" name="kode_pos" value="<?php echo $data['kode_pos'];?>" required="required" class="form-control col-md-7 col-xs-12">
    </div>
    </div>
    <div class="form-group">
    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Email <span class="required">*</span>
    </label>
    <div class="col-md-10 col-sm-10 col-xs-12">
      <input type="text" id="first-name" name="email" value="<?php echo $data['email'];?>" required="required" class="form-control col-md-7 col-xs-12">
    </div>
    </div>
    <div class="form-group">
    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Password <span class="required">*</span>
    </label>
    <div class="col-md-10 col-sm-10 col-xs-12">
      <input type="text" id="first-name" name="passwd" value="<?php echo $data['passwd'];?>" required="required" class="form-control col-md-7 col-xs-12">
    </div>
    </div>
    
	  <div class="ln_solid"></div>
	  <div class="form-group">
		<div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-2">
		  <button type="submit" class="btn btn-primary">Batal</button>
		  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>Simpan</button>
		</div>
	  </div>

	  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
		<?php include "../templates/footer.php"; 
		}
		?>