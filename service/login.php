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

<!-- ##### Checkout Area Start ##### -->
<div class="checkout_area section-padding-80">
    <div class="container">
        <div class="row">

            <div class="col-12 col-md-6">
                <div class="checkout_details_area mt-50 clearfix">

                    <div class="cart-page-heading mb-30">
                        <h5>Sign In Here</h5>
                    </div>

                    <form action="#" method="post">
                        <div class="row">

                            <div class="col-12 mb-3">
                                <label for="company">E-mail</label>
                                <input type="text" class="form-control" id="email" value="">
                            </div>
                            <div class="col-12 mb-4">
                                <label for="email_address">Password</label>
                                <input type="password" class="form-control" id="email_address" value="">
                            </div>
                            <div class="col-12">
                                <a href="#" class="btn essence-btn">Register</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                <div class="order-details-confirmation">

                    <div class="cart-page-heading">
                        <h5>Don't Have an Account?</h5>
                        <p>Sign Up Here</p>
                    </div>
                    <a href="register.php" class="btn essence-btn">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Checkout Area End ##### -->


<?php
include "../templates/footer.php";
?>