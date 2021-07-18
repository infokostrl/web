<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Daftar Kost Romang Lompoa</h1>
    <div class="card col-md-6">
        <div class="card-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                    <small class="form-text text-danger"><?php echo form_error('name'); ?></small>
                </div>
                <div class="form-group">
                    <label for="contact">Contact</label>
                    <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact">
                    <small class="form-text text-danger"><?php echo form_error('name'); ?></small>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                    <small class="form-text text-danger"><?php echo form_error('name'); ?></small>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Price">
                    <small class="form-text text-danger"><?php echo form_error('name'); ?></small>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Description">
                    <small class="form-text text-danger"><?php echo form_error('name'); ?></small>
                </div>
                <div class="form-group">
                    <label for="longlat">Longitute, Latitute</label>
                    <input type="text" class="form-control" id="longlat" name="longlat" placeholder="LongLat">
                    <small class="form-text text-danger"><?php echo form_error('name'); ?></small>
                </div>
                <div class="form-group">
                    <label for="link">Link G-Maps</label>
                    <input type="text" class="form-control" id="link" name="link" placeholder="Link">
                    <small class="form-text text-danger"><?php echo form_error('name'); ?></small>
                </div>
                <a href="<?= base_url('admin'); ?>" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary" name="submit ">Create</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->