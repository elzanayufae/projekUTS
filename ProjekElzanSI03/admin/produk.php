<?php include 'layouts/header.php' ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Produk</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Produk</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Table
            </div>
            <div class="card-body">
                <a href="form_produk.php" class="btn btn-primary mb-3">Tambah Data</a>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Jenis Produk</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Jenis Produk</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM produk";
                        $stmt = $dbh->prepare($sql);
                        $stmt->execute();
                        $produk = $stmt->fetchAll();
                        foreach ($produk as $jp) {
                        ?>
                            <tr>
                                <td><?= $jp['id'] ?></td>
                                <td><?= $jp['kode'] ?></td>
                                <td><?= $jp['nama'] ?></td>
                                <td><?= $jp['harga'] ?></td>
                                <td><?= $jp['stok'] ?></td>
                                <td><?= $jp['jenis_produk'] ?></td>
                                <td><?= substr($jp['desk'], 0, 20) ?>.....</td>
                                <td>
                                    <a href="form_produk.php?idedit=<?= $jp['id'] ?>" class="btn btn-warning">Edit</a>
                                    <a href="form_produk.php?iddel=<?= $jp['id'] ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php include 'layouts/footer.php' ?>