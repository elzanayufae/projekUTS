<?php include 'layouts/header.php' ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Pesanan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Pesanan</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Table
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Produk</th>
                            <th>Qty</th>
                            <th>Total Harga</th>
                            <th>Nama Pemesan</th>
                            <th>Alamat Pemesan</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Produk</th>
                            <th>Qty</th>
                            <th>Total Harga</th>
                            <th>Nama Pemesan</th>
                            <th>Alamat Pemesan</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM pesanan";
                        $stmt = $dbh->prepare($sql);
                        $stmt->execute();
                        $pesanan = $stmt->fetchAll();
                        foreach ($pesanan as $jp) {
                        ?>
                            <tr>
                                <td><?= $jp['id'] ?></td>
                                <td><?= $jp['tanggal'] ?></td>
                                <td><?= $jp['nama_produk'] ?></td>
                                <td><?= $jp['qty'] ?></td>
                                <td><?= $jp['total_harga'] ?></td>
                                <td><?= $jp['nama_pemesan'] ?></td>
                                <td><?= $jp['alamat_pemesan'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php include 'layouts/footer.php' ?>