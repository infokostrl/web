<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Kost Romang Lompoa</h1>
        <a href="<?= base_url('admin/create') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Tambah Data</a>
    </div>

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
                                    <a href="" class="badge badge-danger">delete</a>
                                    <a href="" class="badge badge-success">edit</a>
                                    <a href="" class="badge badge-primary">detail</a>
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