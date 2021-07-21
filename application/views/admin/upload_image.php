<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Daftar Kost Romang Lompoa</h1>
    <div class="card col-md-6">
        <div class="card-body">

            <?php echo form_open_multipart('admin/do_upload'); ?>

            <input type="hidden" name="id_kost" value="<?= $id_kost ?>" required>
            <label for="level">Level</label>
            <input type="text" name="level" id="level" required><br>
            <input type="file" name="userfile" size="20" required>

            <br /><br />

            <a href="<?= base_url() ?>admin" class="btn btn-danger">Cancel</a>
            <input type="submit" value="upload" class="btn btn-primary">
            </form>

        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->