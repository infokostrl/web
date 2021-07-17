<!-- Hero and search -->
<div class="hero">
    <img src="<?= base_url('assets') ?>/img/infokos_final.png" alt="Info Kost Banner">
    <br>
    <input type="text" name="search" placeholder="Cari disini">
    <br>
    <button type="submit" name="search">Search</button>
</div>


<!-- Flat List -->
<div class="flat_list">
    <h1>Flat Desc</h1>

    <!-- Bagian Pertama -->
    <div class="container">
        <div class="card">
            <ul>
                <li>Nama: <?= $detailkost['name']; ?></li>
                <li>Deskripsi: <?= $detailkost['description']; ?></li>
                <li>Kontak: <?= $detailkost['contact']; ?></li>
                <li>Link: <a href="<?= $detailkost['link']; ?>" target="blank">Maps</a></li>
                <li>Harga: RP.<?= $detailkost['price']; ?></li>
                <a href="<?= base_url(); ?>">BACK</a>
            </ul>
        </div>
    </div>
    <br>

    <div class="pagination">
        <button type="submit" name="next">Prev</button>
        <button type="submit" name="next">Next</button>
    </div>
</div>