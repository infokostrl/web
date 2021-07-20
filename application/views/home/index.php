<!-- Hero and search -->
<div class="video">
    <video class="video" src="<?= base_url('assets') ?>/vid/sample.mp4" type="video/mp4" autoplay muted loop></video>
</div>
<div class="hero">
    <div class="content_hero">
        <a href="index.html"><img src="<?= base_url('assets') ?>/img/infokos_final.png" alt="Info Kost Banner"></a>
        <br>
        <input type="text" name="search" placeholder="Cari disini">
        <br>
        <a href="search.html" class="btn search">Search</a>
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
        var mymap = L.map('mapid').setView([-5.223756088080829, 119.50632867393728], 13);

        // Marker Kost Ernias
        var ernias1 = L.marker([-5.226498506297373, 119.50288189865357]).addTo(mymap);
        // Marker Kost Namira
        var namira = L.marker([-5.225532495562082, 119.50505401029527]).addTo(mymap);

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

        // Pop up marker
        ernias1.bindPopup('<a href="https://goo.gl/maps/54kMkUHbggwPDQu47" target="_blank"><b>Kost Ernias</b></a>');
        namira.bindPopup('<a href="https://goo.gl/maps/JXYm52d6zLkCrQB27" target="_blank"><b>Kost Namira</b></a>');
        </script>
        <!-- End of Leaflet OpenStreetMap -->
    </div>
</div>
<!-- End of All Kost in Maps -->

<!-- Flat List -->
<div class="flat_list">
    <div class="garis"></div>
    <h2>Flat List</h2>

    <div class="container">
        <div class="container_card">
            <?php foreach ($infokost as $kost) : ?>
            <!-- Card start here -->
            <div class="card_custom">
                <img src="<?= base_url('assets') ?>/img/dummy.png">
                <div class="card_text">
                    <h3><b><?= $kost['name']; ?></b></h3>
                    <p><?= $kost['description']; ?></p>
                    <a href="<?= base_url(); ?>home/detail/<?= $kost['id']; ?>#info">Detail</a>
                </div>
            </div>
            <!-- End card -->
            <?php endforeach; ?>
        </div>
    </div>

    <br>

    <nav>
        <ul class="pagination justify-content-center fw-bold">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
</div>
<!-- End of Flat list -->