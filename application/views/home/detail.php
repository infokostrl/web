<!-- Hero and search -->
<div class="video">
    <video class="video" src="<?= base_url('assets') ?>/vid/sample.mp4" type="video/mp4" autoplay muted loop></video>
</div>
<div class="hero">
    <div class="content_hero">
        <a href="<?= base_url() ?>"><img src="<?= base_url('assets') ?>/img/infokos_final.png"
                alt="Info Kost Banner"></a>
        <br>
        <input type="text" name="search" placeholder="Cari disini">
        <br>
        <a href="search.html" class="btn search">Search</a>
    </div>
</div>

<!-- Info Kost -->
<div class="flat_list" id="info">
    <h2><?= $detailkost['name']; ?></h2>
    <h4 style="text-align: center; color: red;"><b>Rp<?= $detailkost['price']; ?> / Tahun</b></h4>
    <br>
    <div class="container">
        <div id="carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?= base_url('assets') ?>/uploads/<?= $carousel['image_name'] ?>" class="d-block w-100">
                </div>
                <?php foreach ($carouselAll as $crsall) : ?>
                <div class="carousel-item">
                    <img src="<?= base_url('assets') ?>/uploads/<?= $crsall['image_name'] ?>" class="d-block w-100">
                </div>
                <?php endforeach; ?>
            </div>
            <a role="button" class="carousel-control-prev" data-bs-target="#carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a role="button" class="carousel-control-next" type="button" data-bs-target="#carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
        <br>
        <h4><b>Deskripsi Kost :</b></h4>
        <p><?= $detailkost['description']; ?></p>
        <br>
        <h4><b>Informasi Kost : </b></h4>
        <table cellpadding="10">
            <tr>
                <th>Alamat</th>
                <th>:</th>
                <td><a href="<?= $detailkost['link']; ?>"><?= $detailkost['address'] ?></a></td>
            </tr>
            <tr>
                <th>No. Telepon</th>
                <th>:</th>
                <td><a href="tel:<?= $detailkost['contact']; ?>"><?= $detailkost['contact']; ?></a></td>
            </tr>
        </table>
        <br>
        <!-- Leaflet OpenStreetMap -->
        <div id="mapid"></div>
        <script>
        // Input long and lat
        var mymap = L.map('mapid').setView([<?= $detailkost['longlat'] ?>], 13);
        var marker = L.marker([<?= $detailkost['longlat'] ?>]).addTo(mymap);
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
        marker.bindPopup('<a href="<?= $detailkost['link'] ?>" target="_blank"><b><?= $detailkost['name'] ?></b></a>')
            .openPopup();
        </script>
        <!-- End Leaflet OpenStreetMap -->
    </div>
</div>
<!-- End Info Kost -->