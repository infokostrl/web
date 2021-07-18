<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Kost Romang Lompoa</h1>
        <a href="<?= base_url('admin/create') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Tambah Data</a>
    </div>

    <!-- 

baris di bawah adalah untuk menampilkan flash data. atau pesan yang muncul ketika berhasil melakukan sesuatu

  -->
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Kost <strong>Berhasil!</strong> <?= $this->session->flashdata('flash'); ?>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Kost</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Price</th>
                            <th>Longitute, Latitute</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($kosts as $kost) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $kost['name']; ?></td>
                                <td><?= $kost['description']; ?></td>
                                <td><?= $kost['contact']; ?></td>
                                <td><?= $kost['address']; ?></td>
                                <td>Rp.<?= $kost['price']; ?></td>
                                <td><?= $kost['longlat']; ?></td>
                                <td>
                                    <?php foreach ($images as $image) : ?>
                                        <?php if ($image['id_kost'] == $kost['id']) : ?>
                                            <?php if ($image['main_image'] == 1) : ?>
                                                <img src="<?= base_url() ?>assets/uploads/<?= $image['image_name']; ?>" width="100px" alt="">
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>

                                <td>
                                    <a href="<?= base_url('') ?>admin/upload_image/<?= $kost['id']; ?>" class="badge badge-dark">add img</a>
                                    <a href="<?= base_url('') ?>admin/delete/<?= $kost['id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data?');">delete</a>
                                    <a href="<?= base_url('') ?>admin/update/<?= $kost['id']; ?>" class="badge badge-success">edit</a>
                                    <a href="<?= base_url('') ?>admin/detail/<?= $kost['id']; ?>" class="badge badge-primary">detail</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->