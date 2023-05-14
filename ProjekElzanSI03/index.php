<?php include 'layouts/header.php' ?>
<!-- end of navbar -->
<div class="banner d-flex align-items-center pl-3 pl-lg-5">
  <div>
    <h1 class="text-slanted text-capitalize mb-0">
      Minimalist
    </h1>
    <h1 class="text-lowercase font-weight-bold">
      interior style
    </h1>
    <a href="#" class="btn btn-yellow"> view collection </a>
  </div>
</div>
</header>
<!-- end of header section -->

<!-- services section -->
<section id="services" class="services py-5 text-center">
  <div class="container">
    <div class="row">
      <!-- single service -->
      <div class="col-10 mx-auto col-md-6 col-lg-4 my-3">
        <span class="service-icon">
          <i class="fas fa-parachute-box"></i>
        </span>
        <h5 class="text-uppercase font-weight-bold">
          free shipping
        </h5>
        <p class="text-muted text-capitalize">
          free shipping on all order over 100.00
        </p>
      </div>
      <!-- end of single service -->
      <!-- single service -->
      <div class="col-10 mx-auto col-md-6 col-lg-4 my-3">
        <span class="service-icon">
          <i class="fas fa-phone-volume"></i>
        </span>
        <h5 class="text-uppercase font-weight-bold">
          ONLINE SUPPORT 24/7
        </h5>
        <p class="text-muted text-capitalize">
          We Will Assist You With Your Inquiries
        </p>
      </div>
      <!-- end of single service -->
      <!-- single service -->
      <div class="col-10 mx-auto col-md-6 col-lg-4 my-3">
        <span class="service-icon">
          <i class="fas fa-dollar-sign"></i>
        </span>
        <h5 class="text-uppercase font-weight-bold">
          MONEY BACK GURANTEE
        </h5>
        <p class="text-muted text-capitalize">
          Free 100% Refund For 30 Da
        </p>
      </div>
      <!-- end of single service -->
    </div>
  </div>
</section>
<!-- end of services section -->

<!-- home categories -->
<section id="home-categories" class="home-categories py-5">
  <div class="container">
    <div class="row">
      <!-- categories title -->
      <div class="col-12 mx-auto col-md-12 col-lg-12 align-self-center">
        <h5 class="text-uppercase">
          product categories
        </h5>
        <div class="row">
          <?php
          $sql = "SELECT * FROM jenis_produk LIMIT 4";
          $stmt = $dbh->prepare($sql);
          $stmt->execute();
          $data = $stmt->fetchAll();
          foreach ($data as $row) {
          ?>
            <!-- single category -->
            <div class="col-md-6 col-lg-3 my-3">
              <div class="category-container">
                <img src="img/cagetogoryImg/<?= strtolower(str_replace(" ", "", $row['nama'])); ?>-category.jpeg" class="img-fluid category-img" alt="">
                <a href="products.html" class="category-link">
                  <h6 class="text-uppercase mb-0">
                    <?= $row['nama'] ?>
                  </h6>
                  <p class="text-yellow mb-0">
                    <?php
                    $sql = "SELECT COUNT(*) as total FROM produk WHERE jenis_produk = '" . $row['nama'] . "'";
                    $stmt = $dbh->prepare($sql);
                    $stmt->execute();
                    $data = $stmt->fetch();
                    ?>
                    <?= $data['total'] ?> Products
                  </p>
                </a>
              </div>
            </div>
            <!-- end of single category -->
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end of home categories -->

<!-- home filler -->
<section id="home-filler">
  <div class="container-fluid">
    <div class="row home-filler align-items-center">
      <div class="col-10 mx-auto text-center text-white">
        <h4 class="text-uppercase font-weight-bold">
          smart furniture collection
        </h4>
        <p class="text-capitalize">
          Revolutionize your living space with our innovative Smart Furniture Collection - combining style and functionality for a seamless, modern lifestyle.
        </p>
        <a href="products.php" class="text-capitalize collection-link text-yellow">
          view collection
        </a>
        <div class="collection-underline"></div>
      </div>
    </div>
  </div>
</section>
<!-- end of home filler -->

<?php include 'layouts/footer.php' ?>