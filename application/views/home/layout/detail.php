<div class="container mt-4">
    <div class="row">
        <div class="col-md-5">
            <img src="<?= base_url('uploads/' . $produk['gambar']) ?>" class="img-fluid" alt="<?= $produk['namaProduk'] ?>">
        </div>
        <div class="col-md-7">
            <h2><?= $produk['namaProduk'] ?></h2>
            <h5>Rp <?= number_format($produk['harga'], 0, ',', '.') ?></h5>
            <p><?= $produk['deskripsi'] ?></p>

            <form action="<?= base_url('main/add_to_cart') ?>" method="post" class="mb-3">
                <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">
                <input type="hidden" name="namaProduk" value="<?= $produk['namaProduk'] ?>">
                <input type="hidden" name="harga" value="<?= $produk['harga'] ?>">
                <div class="form-group">
                    <label>Jumlah:</label>
                    <input type="number" name="qty" value="1" class="form-control" min="1">
                </div>
                <button type="submit" class="btn btn-primary mt-2">+ Keranjang</button>
            </form>

            <hr>
            
            <!-- TANYA PRODUK -->
            <h4>Tanya Produk</h4>
            <form action="<?= base_url('main/kirim_pertanyaan') ?>" method="post">
                <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">
                <div class="form-group">
                    <label>Nama Anda:</label>
                    <input type="text" name="nama_pengirim" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Pertanyaan:</label>
                    <textarea name="pertanyaan" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-success mt-2">Kirim Pertanyaan</button>
            </form>

            <hr>
            <h5>Pertanyaan Lain</h5>
            <?php if (empty($pertanyaan)) : ?>
                <p>Belum ada pertanyaan.</p>
            <?php else : ?>
                <?php foreach ($pertanyaan as $p) : ?>
                    <div class="border p-2 mb-2">
                        <strong><?= htmlspecialchars($p['nama_pengirim']) ?>:</strong>
                        <p><?= nl2br(htmlspecialchars($p['pertanyaan'])) ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>