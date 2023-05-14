<!-- featured section -->
<section id="featured" class="featured py-5">
    <div class="container">
        <div class="row my-3">
            <div class="col-10 mx-auto text-center">
                <h1 class="text-uppercase">
                    featured products
                </h1>
                <p class="text-muted">
                    Discover our top picks and latest releases in our Featured Products collection
                </p>
            </div>
        </div>
        <div class="row">
            <!-- single product -->
            <?php
            $sql = "SELECT * FROM produk ORDER BY rand() LIMIT 6";
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
            $data = $stmt->fetchAll();
            foreach ($data as $row) {
            ?>
                <div class="col-10 mx-auto col-md-6 col-lg-4">
                    <div class="featured-container p-5">
                        <img src="img/img-products/product-1.png" alt="" class="img-fluid">
                        <span class="featured-search-icon" data-toggle="modal" data-target="#productModal<?= $row['kode'] ?>">
                            <i class="fas fa-search"></i>
                        </span>
                        <a href="#" class="featured-store-link text-capitalize">add to cart</a>
                    </div>
                    <h6 class="text-capitalize text-center my-2">
                        <?= $row['nama'] ?>
                    </h6>
                    <h6 class="text-center">
                        <span class="text-muted old-price mx-2">Rp. <?= number_format($row['harga'] + 100000) ?></span>
                        <span>Rp. <?= number_format($row['harga']) ?></span>
                    </h6>

                    <!-- modal -->
                    <div class="modal fade" id="productModal<?= $row['kode'] ?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <!-- modal header -->
                                <div class="modal-header">
                                    <h5 class="modal-title text-capitalize">product info</h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <!--end of  modal header -->
                                <!-- modal body -->
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col text-center">
                                            <img src="img/img-products/product-1.png" class="img-fluid" alt="" />
                                            <!-- ratings -->
                                            <div class="ratings">
                                                <span class="rating-icon"><i class="fas fa-star"></i></span>
                                                <span class="rating-icon"><i class="fas fa-star"></i></span>
                                                <span class="rating-icon"><i class="fas fa-star"></i></span>
                                                <span class="rating-icon"><i class="fas fa-star"></i></span>
                                                <span class="rating-icon"><i class="far fa-star"></i></span>
                                                <span class="text-capitalize">(25 customer reviews)</span>
                                            </div>
                                            <!-- end of ratings -->
                                            <h2 class="text-uppercase my-2"><?= $row['nama'] ?></h2>
                                            <h2>Rp. <?= number_format($row['harga']) ?></h2>
                                            <p class="lead text-muted">
                                                <?= $row['desk'] ?>
                                            </p>
                                            <!-- colors -->
                                            <h5 class="text-uppercase">
                                                colors :
                                                <span class="d-inline-block products-color products-color-black mr-2"></span>
                                                <span class="d-inline-block products-color products-color-red mr-2"></span>
                                                <span class="d-inline-block products-color products-color-blue mr-2"></span>
                                            </h5>
                                            <!-- end of colors -->
                                            <!-- sizes -->
                                            <h5 class="text-uppercase">
                                                sizes : <span class="mx-2">xs</span> <span class="mx-2">s</span>
                                                <span class="mx-2">m</span> <span class="mx-2">l</span>
                                                <span class="mx-2">xl</span>
                                            </h5>
                                            <div class="d-flex flex-wrap justify-content-center">
                                                <a class="btn btn-black my-2 mx-2" href="order.php?kode=<?= $row['kode'] ?>">wishlist</a>
                                                <a class="btn btn-yellow my-2 mx-2" href="order.php?kode=<?= $row['kode'] ?>">add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end modal body -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end of modal -->
                </div>
            <?php } ?>
            <!-- end of single product -->
        </div>
    </div>
</section>
<!-- end of featured section -->

<!-- partners -->
<section class="partners py-5">
    <div class="container">
        <div class="row">
            <!-- compnay carousel -->
            <div class="col-6 col-md-6 col-lg-4 mx-auto">
                <div id="partnerCarousel" class="carousel slide " data-ride="carousel">
                    <div class="carousel-inner">
                        <!-- single item -->
                        <div class="carousel-item active">
                            <img src="img/company-logos/company-logo-1.png" class="d-block w-100" alt="partner company" />
                        </div>
                        <!-- end single item -->
                        <!-- single item -->
                        <div class="carousel-item ">
                            <img src="img/company-logos/company-logo-2.png" class="d-block w-100" alt="partner company" />
                        </div>
                        <!-- end single item -->
                        <!-- single item -->
                        <div class="carousel-item ">
                            <img src="img/company-logos/company-logo-3.png" class="d-block w-100" alt="partner company" />
                        </div>
                        <!-- end single item -->
                        <!-- single item -->
                        <div class="carousel-item ">
                            <img src="img/company-logos/company-logo-4.png" class="d-block w-100" alt="partner company" />
                        </div>
                        <!-- end single item -->
                        <!-- single item -->
                        <div class="carousel-item ">
                            <img src="img/company-logos/company-logo-5.png" class="d-block w-100" alt="partner company" />
                        </div>
                        <!-- end single item -->
                        <!-- single item -->
                        <div class="carousel-item">
                            <img src="img/company-logos/company-logo-6.png" class="d-block w-100" alt="partner company" />
                        </div>
                        <!-- end single item -->
                    </div>
                    <a href="#partnerCarousel" class="carousel-control-prev" role="button" data-slide="prev">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <a href="#partnerCarousel" class="carousel-control-next" role="button" data-slide="next">
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end of  partners -->

<!-- newsletter section -->
<section id="newsletter" class="newsletter py-5">
    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto text-center">
                <h2 class="text-uppercase">
                    newsletter
                </h2>
                <p>
                    sign up for our Newsletter to receive exclusive offers, latest news and exciting announcements delivered straight to your inbox.
                </p>
                <form action="">
                    <div class="input-group mt-5 mb-4">
                        <input type="text" class="text-capitalize form-control" placeholder="enter your email">
                        <div class="input-group-append">
                            <div class="input-group-text form-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class=" btn btn-yellow">subscribe</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- end of newsletter section -->

<!-- skills section -->
<section id="skills" class="skills py-5">
    <div class="container">
        <div class="row">
            <div class="col-10 col-md-6 col-lg-4 mx-auto d-flex my-3">
                <div class="skill-icon mr-3">
                    <i class="fas fa-truck"></i>
                </div>
                <div class="skill-text">
                    <h3 class="text-uppercase text-white">
                        free shipping
                    </h3>
                    <p class="text-capitalize text-muted">
                        Shop to your heart's content and enjoy the ultimate convenience of free shipping.
                    </p>
                </div>
            </div>
            <div class="col-10 col-md-6 col-lg-4 mx-auto d-flex my-3">
                <div class="skill-icon mr-3">
                    <i class="fas fa-comment-dollar"></i>
                </div>
                <div class="skill-text">
                    <h3 class="text-uppercase text-white">
                        price promise
                    </h3>
                    <p class="text-capitalize text-muted">
                        our Price Promise ensures that you'll always get the most competitive prices without sacrificing quality or service.
                    </p>
                </div>
            </div>
            <div class="col-10 col-md-6 col-lg-4 mx-auto d-flex my-3">
                <div class="skill-icon mr-3">
                    <i class="fas fa-award"></i>
                </div>
                <div class="skill-text">
                    <h3 class="text-uppercase text-white">
                        lifetime warranty
                    </h3>
                    <p class="text-capitalize text-muted">
                        we stand behind the quality of our products and are committed to providing you with exceptional customer service for life.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end of skills section -->
<!-- footer section -->
<footer class="footer py-5">
    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto text-center">
                <h1 class="text-uppercase font-weight-bold text-yellow d-inline-block footer-title">
                    comfy sloth
                </h1>
                <!-- footer icons -->
                <div class="footer-icons d-flex justify-content-center my-5">
                    <!-- single icon -->
                    <a href="" class="footer-icon mx-2">
                        <div class="fab fa-facebook"></div>
                    </a>
                    <!-- end of single icon -->
                    <!-- single icon -->
                    <a href="" class="footer-icon mx-2">
                        <div class="fab fa-twitter"></div>
                    </a>
                    <!-- end of single icon -->
                    <!-- single icon -->
                    <a href="" class="footer-icon mx-2">
                        <div class="fab fa-youtube"></div>
                    </a>
                    <!-- end of single icon -->
                    <!-- single icon -->
                    <a href="" class="footer-icon mx-2">
                        <div class="fab fa-google-plus"></div>
                    </a>
                    <!-- end of single icon -->
                    <!-- single icon -->
                    <a href="" class="footer-icon mx-2">
                        <div class="fab fa-instagram"></div>
                    </a>
                    <!-- end of single icon -->
                </div>
                <!-- footer icons -->
                <p class="text-muted text-capitalize w-75 mx-auto text-center">
                    Unleash your inner relaxation with our Comfy Sloth collection - designed for those who prioritize comfort and want to embrace their lazy side in style.
                </p>
                <div class="footer-contact d-flex justify-content-around mt-5">
                    <!-- single contact -->
                    <div class="text-capitalize">
                        <span class="contact-icon mr-2">
                            <i class="fas fa-map"></i>
                        </span>
                        123 Main Street, Los Angeles
                    </div>
                    <!-- end of single contact -->
                    <!-- single contact -->
                    <div class="text-capitalize">
                        <span class="contact-icon mr-2">
                            <i class="fas fa-phone"></i>
                        </span>
                        Phone : + (310) 111 2222
                    </div>
                    <!-- end of single contact -->
                    <!-- single contact -->
                    <div class="text-capitalize">
                        <span class="contact-icon mr-2">
                            <i class="fas fa-envelope"></i>
                        </span>
                        Email : Eamil@Email.Com
                    </div>
                    <!-- end of single contact -->
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end of footer section -->
<!-- jQuery -->
<script src="js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap js -->
<script src="js/bootstrap.bundle.min.js"></script>
<!-- fontwesome js -->
<script src="js/all.min.js"></script>
<!-- Custom js -->
<script src="js/script.js"></script>
</body>

</html>