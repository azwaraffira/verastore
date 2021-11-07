<?php
include "../lib/config_web.php";
include "../templates/header.php";
include "cart.php";
?>
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(../img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>Register</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Register Area Start ##### -->
<div class="checkout_area section-padding-80">
    <div class="container">
        <div class="row">

            <div class="col-12 col-md-6">
                <div class="checkout_details_area mt-50 clearfix">

                    <div class="cart-page-heading mb-30">
                        <h5>Sign Up Here</h5>
                    </div>

                    <form action="#" method="post">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="first_name">Name </label>
                                <input type="text" class="form-control" id="nama_lengkap" value="" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="company">E-mail</label>
                                <input type="text" class="form-control" id="email" value="">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="company">Password</label>
                                <input type="password" class="form-control" id="pass" value="">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="phone">Phone No </label>
                                <input type="" class="form-control" id="phone" value="">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="state">Province </label>
                                <input type="text" class="form-control" id="state" value="">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="city">Town/City </label>
                                <input type="text" class="form-control" id="city" value="">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="street_address">Address</label>
                                <textarea type="text" class="form-control" name="alamat" required></textarea>

                            </div>
                            <div class="col-12 mb-3">
                                <label for="postcode">Postcode </label>
                                <input type="text" class="form-control" id="postcode" value="">
                            </div>
                            <div class="col-12 mb-3">
                            <a href="#" class="btn essence-btn">Register</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### register Area End ##### -->


<?php
include "../templates/footer.php";
?>