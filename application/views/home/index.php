<!-- Hero and search -->
<div class="video">
    <video class="video" src="<?= base_url('assets') ?>/vid/sample.mp4" type="video/mp4" autoplay muted loop></video>
</div>
<div class="hero">
    <div class="content_hero">
        <a href="<?= base_url() ?>"><img src="<?= base_url('assets') ?>/img/infokos_final.png"
                alt="Info Kost Banner"></a>
        <br>
        <form action="<?= base_url('home/index') ?>" method="POST">
            <input type="text" class="search_box" placeholder="Cari disini" name="keyword" autocomplete="off" autofocus>
            <br>
            <input class="btn search" name="submit" type="submit" value="Search">
        </form>
    </div>
</div>

<!-- All Kost in Maps -->
<div class="flat_list">
    <h2>Semua Kost Romang Lompoa</h2>
    <br>
    <div class="container">
        <!-- Leaflet OpenStreetMap -->
        <div id="mapid"></div>
        <script>
        // Long dan Lat pertengahan Romang Lompoa
        var mymap = L.map('mapid').setView([-5.223756088080829, 119.50632867393728], 15);
        <?php foreach ($longlat as $map) : ?>
        var kost<?= $map['id'] ?> = L.marker([<?= $map['longlat'] ?>]).addTo(mymap);
        kost<?= $map['id'] ?>.bindPopup('<a href="<?= $map['link'] ?>" target="_blank"><b><?= $map['name'] ?></b></a>');
        <?php endforeach; ?>

        // Leaflet Config
        L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZGFuZHlnYXJkYSIsImEiOiJja3I2NDBkcXIwbWh5MzByMmltanRxb3p3In0.i8Vfq-6kCydHDLnOo32JgA', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 18,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'pk.eyJ1IjoiZGFuZHlnYXJkYSIsImEiOiJja3I2NDBkcXIwbWh5MzByMmltanRxb3p3In0.i8Vfq-6kCydHDLnOo32JgA'
            }).addTo(mymap);
        </script>
        <!-- End of Leaflet OpenStreetMap -->
    </div>
</div>
<!-- End of All Kost in Maps -->

<!-- Flat List -->
<div class="flat_list">
    <div class="garis"></div>
    <h2>Daftar Kost</h2>

    <div class="container">
        <div class="container_card">
            <?php foreach ($flatlist as $flat) : ?>
            <!-- Card start here -->
            <div class="card_custom">
                <img src="<?= base_url('assets') ?>/uploads/<?= $flat['image_name'] ?>">
                <div class="card_text">
                    <h3><b><?= $flat['name']; ?></b></h3>
                    <p><?= $flat['description']; ?></p>
                    <a href="<?= base_url(); ?>home/detail/<?= $flat['id']; ?>#info">Detail</a>
                </div>
            </div>
            <!-- End card -->
            <?php endforeach; ?>
        </div>
    </div>

    <br>

    <?= $this->pagination->create_links(); ?>
</div>
<!-- End of Flat list -->