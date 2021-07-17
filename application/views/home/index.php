<!-- Login -->
<div class="login" id="login">
    <div class="login_isi">
        <img src="<?= base_url('assets') ?>/img/login.png" alt="Logo">
        <div class="input_login">
            <input type="text" class="inputs" name="email" placeholder="E-mail">
            <br>
            <input type="password" name="password" placeholder="Password">
            <br>
            <button type="submit" name=submit>Login</button>
            <br>
            <a href="#footer" id="login_closed">Close</a>
        </div>
    </div>
</div>

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
    <h1>Flat List</h1>

    <!-- Bagian Pertama -->
    <div class="container">
        <?php foreach ($infokost as $kost) : ?>
            <div class="card">
                <img src="<?= base_url('assets') ?>/img/dummy.png">
                <div class="card_text">
                    <h3><b><?= $kost['name']; ?></b></h3>
                    <p><?= $kost['description']; ?></p>
                    <a href="<?= base_url(); ?>home/detail/<?= $kost['id']; ?>">Detail</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <br>

    <div class="pagination">
        <button type="submit" name="next">Prev</button>
        <button type="submit" name="next">Next</button>
    </div>
</div>