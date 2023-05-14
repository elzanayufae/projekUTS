<?php
include 'layouts/header.php';
if (isset($_POST['checkout'])) {
  // id sebelumnya
  $sql = "SELECT * FROM pesanan ORDER BY id DESC LIMIT 1";
  $stmt = $dbh->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($result['id'] == null) {
    $id = 1;
  } else {
    $id = $result['id'] + 1;
  }
  $tanggal = $_POST['tanggal'];
  $nama_produk = $_POST['nama_produk'];
  $total_harga = $_POST['harga'] * $_POST['qty'];
  $qty = $_POST['qty'];
  $nama_pemesan = $_POST['nama_pemesan'];
  $alamat_pemesan = $_POST['alamat_pemesan'];
  $sql = "INSERT INTO pesanan (id, tanggal, nama_produk, total_harga, qty, nama_pemesan, alamat_pemesan) VALUES (?, ?, ?, ?, ?, ?, ?)";
  $stmt = $dbh->prepare($sql);
  $stmt->execute([$id, $tanggal, $nama_produk, $total_harga, $qty, $nama_pemesan, $alamat_pemesan]);
  if ($stmt->rowCount() > 0) {
    echo "<script>alert('Order Success')</script>";
    echo "<script>window.location='order.php?id=$id'</script>";
  } else {
    echo "<script>alert('Order Failed')</script>";
    echo "<script>window.location='products.php'</script>";
  }
}
?>
<div class="banner-store d-flex pl-3 pl-lg-5 align-items-center text-center justify-content-center">
  <div>
    <h1 class="text-slanted text-capitalize display-4 text-yellow">
      comfy sloth
    </h1>
    <h1 class="text-capitalize display-4 font-weight-bold">
      Form Order
    </h1>
  </div>
</div>
</header>
<!-- end of header section -->

<!-- totals -->
<section class="totals py-5">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <?php
            if (isset($_GET['kode'])) {
              // pdo
              $kode = $_GET['kode'];
              $sql = "SELECT * FROM produk WHERE kode = '$kode'";
              $stmt = $dbh->prepare($sql);
              $stmt->execute();
              $result = $stmt->fetch(PDO::FETCH_ASSOC);
              $nama = $result['nama'];

            ?>
              <form method="post">
                <div class="form-group row mb-2">
                  <label for="tanggal" class="col-4 col-form-label">Date</label>
                  <div class="col-8">
                    <input id="tanggal" name="tanggal" type="date" class="form-control" value="<?= date('Y-m-d') ?>" readonly>
                  </div>
                </div>
                <div class="form-group row mb-2">
                  <label for="kode" class="col-4 col-form-label">Product Code</label>
                  <div class="col-8">
                    <input id="kode" name="kode" type="text" class="form-control" value="<?= $kode ?>" readonly>
                  </div>
                </div>
                <div class="form-group row mb-2">
                  <label for="nama_produk" class="col-4 col-form-label">Product Name</label>
                  <div class="col-8">
                    <input id="nama_produk" name="nama_produk" type="text" class="form-control" value="<?= $nama ?>" readonly>
                  </div>
                </div>
                <div class="form-group row mb-2">
                  <label for="harga" class="col-4 col-form-label">Price</label>
                  <div class="col-8">
                    <input id="harga" name="harga" type="text" class="form-control" value="<?= $result['harga'] ?>" readonly>
                  </div>
                </div>
                <div class="form-group row mb-2">
                  <label for="qty" class="col-4 col-form-label">Qty</label>
                  <div class="col-8">
                    <input id="qty" name="qty" type="number" min="1" class="form-control" value="1" required>
                  </div>
                </div>
                <div class="form-group row mb-2">
                  <label for="nama_pemesan" class="col-4 col-form-label">Order Name</label>
                  <div class="col-8">
                    <input id="nama_pemesan" name="nama_pemesan" type="text" class="form-control" placeholder="Enter Order Name" required>
                  </div>
                </div>
                <div class="form-group row mb-2">
                  <label for="alamat_pemesan" class="col-4 col-form-label">Order Address</label>
                  <div class="col-8">
                    <input id="alamat_pemesan" name="alamat_pemesan" type="text" class="form-control" placeholder="Enter Order Address" required>
                  </div>
                </div>
                <div class="row my-3">
                  <div class="col-sm-6 mx-auto col d-flex justify-content-center flex-wrap">
                    <a href="products.php" class="btn btn-black my-2">Products</a>
                    <input type="submit" class="btn btn-yellow ml-2 my-2" name="checkout" value="checkout">
                  </div>
                </div>
              </form>
            <?php } elseif (isset($_GET['id'])) {
              // buat untuk table dibawah
              $id = $_GET['id'];
              $sql = "SELECT * FROM pesanan WHERE id = '$id'";
              $stmt = $dbh->prepare($sql);
              $stmt->execute();
              $result = $stmt->fetch(PDO::FETCH_ASSOC);
              $tanggal = $result['tanggal'];
              $nama_produk = $result['nama_produk'];
              $qty = $result['qty'];
              $total_harga = $result['total_harga'];
              $nama_pemesan = $result['nama_pemesan'];
              $alamat_pemesan = $result['alamat_pemesan'];
            ?>
              <h1 class="text-capitalize font-weight-bold text-center">Order Details</h1>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Total</th>
                    <th scope="col">Order Name</th>
                    <th scope="col">Order Address</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?= $tanggal ?></td>
                    <td><?= $nama_produk ?></td>
                    <td><?= $qty ?></td>
                    <td><?= $total_harga ?></td>
                    <td><?= $nama_pemesan ?></td>
                    <td><?= $alamat_pemesan ?></td>
                  </tr>
                </tbody>
              </table>
              <?php } else {
              echo "<script>window.location='products.php'</script>";
            } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end of totals -->
<?php
include 'layouts/footer.php' ?>