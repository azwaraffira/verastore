<?php
include "lib/config_web.php";
include "templates/header.php";
include "service/cart.php";
?>
    <section class="shop_grid_area section-padding-80">
        <div class="container">
             <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop_sidebar_area">

                        <!-- ##### Single Widget ##### -->
                         <div class="widget catagory mb-50">
                            <!-- Widget Title -->
                            <h6 class="widget-title mb-30">Catagories</h6>
                            <!--  Catagories  -->
                            <div class="catagories-menu">
                                <ul id="menu-content2" class="menu-content collapse show">
                                <!-- Single Item -->
                                <?php
                                    include "lib/koneksi.php";
                                    $sql = 'SELECT id_kategori, nama, berat FROM kategori order by nama ASC';
                                    $query = mysqli_query($koneksi, $sql);
                                    if (!$query) {
                                       die ('SQL Error: ' . mysqli_error($koneksi));
                                    }
                                    while ($r = mysqli_fetch_assoc($query)) {
                                    echo '
                                        <li data-toggle="collapse" data-target="">
                                            <ul class="sub-menu collapse show" id="">
                                                <li><a href="">'.$r['nama'].'</a></li>
                                            </ul>
                                        </li>
                                        ';
                                        } ?>
                                        <!-- Single Item -->
                                    </ul>
                                </div>
                            </div>
    
                            <!-- ##### Single Widget ##### -->
                            <div class="widget price mb-50">
                                <!-- Widget Title -->
                                <h6 class="widget-title mb-30">Filter by</h6>
                                <!-- Widget Title 2 -->
                                <p class="widget-title2 mb-30">Price</p>
    
                                <div class="widget-desc">
                                    <div class="slider-range">
                                        <div data-min="49" data-max="360" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="49" data-value-max="360" data-label-result="Range:">
                                            <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                        </div>
                                        <div class="range-price">Range: $49.00 - $360.00</div>
                                    </div>
                                </div>
                            </div>
    
                            <!-- ##### Single Widget ##### -->
                            <div class="widget color mb-50">
                                <!-- Widget Title 2 -->
                                <p class="widget-title2 mb-30">Color</p>
                                <div class="widget-desc">
                                    <ul class="d-flex">
                                        <li><a href="#" class="color1"></a></li>
                                        <li><a href="#" class="color2"></a></li>
                                        <li><a href="#" class="color3"></a></li>
                                        <li><a href="#" class="color4"></a></li>
                                        <li><a href="#" class="color5"></a></li>
                                        <li><a href="#" class="color6"></a></li>
                                        <li><a href="#" class="color7"></a></li>
                                        <li><a href="#" class="color8"></a></li>
                                        <li><a href="#" class="color9"></a></li>
                                        <li><a href="#" class="color10"></a></li>
                                    </ul>
                                </div>
                            </div>
    
                            <!-- ##### Single Widget ##### -->
                            <div class="widget brands mb-50">
                                <!-- Widget Title 2 -->
                                <p class="widget-title2 mb-30">Brands</p>
                                <div class="widget-desc">
                                    <ul>
                                        <li><a href="#">Asos</a></li>
                                        <li><a href="#">Mango</a></li>
                                        <li><a href="#">River Island</a></li>
                                        <li><a href="#">Topshop</a></li>
                                        <li><a href="#">Zara</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-12 col-md-8 col-lg-9">
                        <div class="shop_grid_product_area">
                            <div class="row">
                                <div class="col-12">
                                    <div class="product-topbar d-flex align-items-center justify-content-between">
                                        <!-- Total Products -->
                                        <!-- <div class="total-products">
                                            <p><span>186</span> products found</p>
                                        </div> -->
                                        <!-- Sorting -->
                                        <div class="product-sorting d-flex">
                                            <p>Sort by:</p>
                                            <form action="#" method="get">
                                                <select name="select" id="sortByselect">
                                                    <option value="value">Highest Rated</option>
                                                    <option value="value">Newest</option>
                                                    <option value="value">Price: $$ - $</option>
                                                    <option value="value">Price: $ - $$</option>
                                                </select>
                                                <input type="submit" class="d-none" value="">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
    
                        <!-- Single Product -->
                        <?php
						include "lib/koneksi.php";
						$sql = 'SELECT id_produk, nama, harga, nama_gambar FROM produk order by id_produk';
                        $query = mysqli_query($koneksi, $sql);
                        if (!$query) {
                            die ('SQL Error: ' . mysqli_error($koneksi));
                        }
                        while ($r = mysqli_fetch_assoc($query)) {
                        echo '
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                            <img src="img/'.$r['nama_gambar'].'" alt="">
                                <!-- Hover Thumb -->
    
                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <a href="detail_produk.php?id_produk='.$r['id_produk'].'" target = _blank>
                                    <h6>'.$r['nama'].'</h6>
                                </a>
                            <p class="product-price">Rp. '.number_format($r['harga'], 0, ',', '.').'</p>

                        <!-- Hover Content -->
                            <div class="hover-content">
                            <!-- Add to Cart -->
                            <div class="add-to-cart-btn">
                                <a href="#" class="btn essence-btn">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    ';
                        }
                     ?>
                        </div>
                    </div>
                        <!-- Pagination -->
                        <nav aria-label="navigation">
                            <ul class="pagination mt-50 mb-70">
                                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="#">21</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>