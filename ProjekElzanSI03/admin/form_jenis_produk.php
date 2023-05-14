<?php
include 'layouts/header.php';
if (isset($_GET['idedit'])) {
    // edit
    $_idedit = $_GET['idedit'];
    $sql = "SELECT * FROM jenis_produk WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$_idedit]);
    $row = $st->fetch();
} elseif (isset($_GET['iddel'])) {
    // delete data
    $sql = "DELETE FROM jenis_produk WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$_GET['iddel']]);
    echo "<script>alert('Data Berhasil Dihapus')</script>";
    echo "<script>window.location.href='jenis_produk.php'</script>";
} else {
    // new data
    $row = [];
}
if (isset($_POST['proses'])) {
    if ($_POST['proses'] == "Simpan") {
        // insert data
        $sql = "INSERT INTO jenis_produk (nama) VALUES (?)";
        $st = $dbh->prepare($sql);
        $st->execute([$_POST['nama']]);
        echo "<script>alert('Data Berhasil Disimpan')</script>";
        echo "<script>window.location.href='jenis_produk.php'</script>";
    } elseif ($_POST['proses'] == "Update") {
        // update data
        $sql = "UPDATE jenis_produk SET nama=? WHERE id=?";
        $st = $dbh->prepare($sql);
        $st->execute([$_POST['nama'], $_POST['idedit']]);
        echo "<script>alert('Data Berhasil Diupdate')</script>";
        echo "<script>window.location.href='jenis_produk.php'</script>";
    }
}
?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Data</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Form Data
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-group row mb-2">
                        <label for="nama" class="col-4 col-form-label">Jenis Produk</label>
                        <div class="col-8">
                            <input id="nama" name="nama" type="text" class="form-control" value="<?php if (isset($_GET['idedit'])) {
                                                                                                        echo $row['nama'];
                                                                                                    } ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-4 col-8">
                            <?php
                            $button = (empty($_idedit)) ? "Simpan" : "Update";
                            ?>
                            <input type="submit" name="proses" type="submit" class="btn btn-primary" value="<?= $button ?>" />
                            <input type="hidden" name="idedit" value="<?php if (isset($_GET['idedit'])) {
                                                                            echo $_idedit;
                                                                        } ?>" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php include 'layouts/footer.php' ?>