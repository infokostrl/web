<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Daftar Kost Romang Lompoa</h1>


    <div class="card col-md-4">
        <div class="card-body">
            <h5 class="card-title"><?= $kost['name'] ?></h5>
            <p class="card-text"><?= $kost['price'] ?></p>
            <p class="card-text"><?= $kost['contact'] ?></p>
            <p class="card-text"><?= $kost['description'] ?></p>
            <p class="card-text"><?= $kost['address'] ?></p>
            <p class="card-text"><?= $kost['longlat'] ?></p>
            <p class="card-text"><a href="<?= $kost['link'] ?>" target="blank">Google Maps</a></p>
            <a href="<?= base_url('admin'); ?>" class="btn btn-primary">Back To Tabel</a>
        </div>
    </div>
    <div class="row col">
        <?php foreach ($images as $image) : ?>
            <div class="card col-md-2">
                <div class="card-body">
                    <img src="<?= base_url() ?>assets/uploads/<?= $image['image_name']; ?>" class="card-img-top" alt="...">
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->