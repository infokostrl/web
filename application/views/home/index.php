<!-- Modal -->
<div class="modal" id="modal">
    <div class="modal_contain">
        <img src="<?= base_url('assets') ?>/img/dummy.png" alt="Gambar Kos">
        <br><br>
        <h2><b>Boarding House </b></h2>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laboriosam autem accusamus
            esse officiis similique eum deserunt modi, amet suscipit saepe molestias natus quae dolor
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laboriosam autem accusamus
            esse officiis similique eum deserunt modi, amet suscipit saepe molestias natus quae dolor
        </p>
        <ul>
            <li><b>Alamat :</b> <a href="#">Jl. STPP, Romang Lompoa</a></li>
            <li><b>No. Telpon :</b> <a href="tel:911">911</a></li>
        </ul>
        <button name="close" id="close">Close</button>
    </div>
</div>

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
                    <button type="submit" id="more" name="more">More...</button>
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