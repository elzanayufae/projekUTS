<?php
include 'layouts/header.php';
if (isset($_GET['idedit'])) {
    // edit
    $_idedit = $_GET['idedit'];
    $sql = "SELECT * FROM produk WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$_idedit]);
    $row = $st->fetch();
} elseif (isset($_GET['iddel'])) {
    // delete data
    $sql = "DELETE FROM produk WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$_GET['iddel']]);
    echo "<script>alert('Data Berhasil Dihapus')</script>";
    echo "<script>window.location.href='produk.php'</script>";
} else {
    // new data
    $row = [];
}
if (isset($_POST['proses'])) {
    if ($_POST['proses'] == "Simpan") {
        // insert
        $sql = "INSERT INTO produk (kode, nama, harga, stok, jenis_produk, desk) VALUES (?,?,?,?,?,?)";
        $st = $dbh->prepare($sql);
        $st->execute([$_POST['kode'], $_POST['nama'], $_POST['harga'], $_POST['stok'], $_POST['jenis_produk'], $_POST['desk']]);
        echo "<script>alert('Data Berhasil Disimpan')</script>";
        echo "<script>window.location.href='produk.php'</script>";
    } elseif ($_POST['proses'] == "Update") {
        // update data
        $sql = "UPDATE produk SET kode=?, nama=?, harga=?, stok=?, jenis_produk=?, desk=? WHERE id=?";
        $st = $dbh->prepare($sql);
        $st->execute([$_POST['kode'], $_POST['nama'], $_POST['harga'], $_POST['stok'], $_POST['jenis_produk'], $_POST['desk'], $_POST['idedit']]);
        echo "<script>alert('Data Berhasil Diupdate')</script>";
        echo "<script>window.location.href='produk.php'</script>";
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
                        <label for="kode" class="col-4 col-form-label">Kode Produk</label>
                        <div class="col-8">
                            <input id="kode" name="kode" type="text" class="form-control" value="<?php if (isset($_GET['idedit'])) {
                                                                                                        echo $row['kode'];
                                                                                                    } ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="nama" class="col-4 col-form-label">Nama Produk</label>
                        <div class="col-8">
                            <input id="nama" name="nama" type="text" class="form-control" value="<?php if (isset($_GET['idedit'])) {
                                                                                                        echo $row['nama'];
                                                                                                    } ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="harga" class="col-4 col-form-label">Harga Produk</label>
                        <div class="col-8">
                            <input id="harga" name="harga" type="text" class="form-control" value="<?php if (isset($_GET['idedit'])) {
                                                                                                        echo $row['harga'];
                                                                                                    } ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="stok" class="col-4 col-form-label">Stok Produk</label>
                        <div class="col-8">
                            <input id="stok" name="stok" type="text" class="form-control" value="<?php if (isset($_GET['idedit'])) {
                                                                                                        echo $row['stok'];
                                                                                                    } ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="jenis_produk" class="col-4 col-form-label">Jenis Produk</label>
                        <div class="col-8">
                            <select id="jenis_produk" name="jenis_produk" type="text" class="form-control">
                                <?php
                                $sql2 = "SELECT * FROM jenis_produk";
                                $st2 = $dbh->prepare($sql2);
                                $st2->execute();
                                $data2 = $st2->fetchAll();
                                foreach ($data2 as $row2) {
                                    if ($row['jenis_produk'] == $row2['nama']) {
                                        echo "<option value='$row2[nama]' selected>$row2[nama]</option>";
                                    } else {
                                        echo "<option value='$row2[nama]'>$row2[nama]</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="desk" class="col-4 col-form-label">Desk Produk</label>
                        <div class="col-8">
                            <input id="desk" name="desk" type="text" class="form-control" value="<?php if (isset($_GET['idedit'])) {
                                                                                                        echo $row['desk'];
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