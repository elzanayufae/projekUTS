<?php include 'layouts/header.php' ?>
<div class="banner-product d-flex pl-3 pl-lg-5 align-items-center text-center justify-content-center">
  <div>
    <h1 class="text-slanted text-capitalize display-4 text-yellow">
      comfy sloth
    </h1>
    <h1 class="text-capitalize display-4 font-weight-bold">
      our products
    </h1>
  </div>
</div>
</header>
<!-- end of header section -->

<!-- product section  -->
<section id="products" class="products">
  <div class="container-fluid">
    <div class="row">
      <!-- product info -->
      <div class="col-10 mx-auto col-md-5 col-lg-3 text-capitalize my-3 px-5">
        <!-- products categories -->
        <div class="products-categories-title my-4">
          <h6 class="text-uppercase">
            shop by categories
          </h6>
          <div class="products-categories-underline"></div>
        </div>
        <!-- end of title -->
        <!-- single link -->
        <?php
        $sql = "SELECT * FROM jenis_produk";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
        ?>
          <a href="?jenis_produk=<?= $row['nama'] ?>" class="products-category-link d-block">
            <p class="mb-0">
              <?= $row['nama'] ?>
            </p>
          </a>
        <?php } ?>
        <!-- end of single link -->
        <div class="products-categories-title my-4">
          <h6 class="text-uppercase">
            shop by price
          </h6>
          <div class="products-categories-underline"></div>
        </div>
        <!-- end of title -->
        <form action="">
          <div class="form-group">
            <label for="price-range">Range : Rp0 - Rp10000000</label>
            <input type="range" class="form-control-range" id="price-range">
          </div>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text form-icon">
                <i class="fas fa-search"></i>
              </span>
            </div>
            <input type="text" class="form-control text-capitalize" placeholder="search by name">
          </div>
        </form>
        <div class="products-categories-title my-4">
          <h6 class="text-uppercase">
            shop by color
          </h6>
          <div class="products-categories-underline"></div>
        </div>
        <!-- single color -->
        <a href="#">
          <p class="text-capitalize mb-0">
            <span class="d-inline-block products-color products-color-black mr-2">
            </span>
            black (5)
          </p>
        </a>
        <!-- end of single color -->
        <!-- single color -->
        <a href="#">
          <p class="text-capitalize mb-0">
            <span class="d-inline-block products-color products-color-red mr-2">
            </span>
            red (6)
          </p>
        </a>
        <!-- end of single color -->
        <!-- single color -->
        <a href="#">
          <p class="text-capitalize mb-0">
            <span class="d-inline-block products-color products-color-blue mr-2">
            </span>
            blue (10)
          </p>
        </a>
        <!-- end of single color -->
        <!-- single color -->
        <a href="#">
          <p class="text-capitalize mb-0">
            <span class="d-inline-block products-color products-color-yellow mr-2">
            </span>
            yellow (3)
          </p>
        </a>
        <!-- end of single color -->
        <!-- single color -->
        <a href="#">
          <p class="text-capitalize mb-0">
            <span class="d-inline-block products-color products-color-green mr-2">
            </span>
            green (7)
          </p>
        </a>
        <!-- end of single color -->
        <!-- end of title -->
        <!-- end of products categories -->
      </div>
      <!-- end of product info -->
      <!-- product img -->
      <div class="col-10 mx-auto col-md-7 col-lg-9 my-3">
        <div class="row">
          <?php
          if (isset($_GET['jenis_produk'])) {
            $jenis_produk = $_GET['jenis_produk'];
            $sql = "SELECT * FROM produk WHERE jenis_produk = '$jenis_produk'";
          } else {
            $sql = "SELECT * FROM produk ORDER BY rand()";
          }
          $stmt = $dbh->prepare($sql);
          $stmt->execute();
          $data = $stmt->fetchAll();
          foreach ($data as $row) {
          ?>
            <!-- single product -->
            <div class="col-10 mx-auto col-md-6 col-lg-4">
              <div class="featured-container p-5">
                <img src="img/img-products/product-7.png" alt="" class="img-fluid">
                <span class="featured-search-icon" data-toggle="modal" data-target="#productModal<?= $row['kode'] ?>">
                  <i class="fas fa-search"></i>
                </span>
                <a href="order.php?kode=<?= $row['kode'] ?>" class="featured-store-link text-capitalize">add to cart</a>
              </div>
              <h6 class="text-capitalize text-center my-2">
                <?= $row['nama'] ?>
              </h6>
              <h6 class="text-center">
                <span class="text-muted old-price mx-2">Rp. <?= number_format($row['harga'] + 100000) ?></span>
                <span>Rp. <?= number_format($row['harga']) ?></span>
              </h6>
            </div>
            <!-- end of single product -->

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
          <?php } ?>
        </div>
      </div>
      <!-- end of product img -->
    </div>
  </div>
</section>
<!-- end of product section  -->

<?php include 'layouts/footer.php' ?>