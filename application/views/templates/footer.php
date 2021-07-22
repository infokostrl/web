<!-- Footer -->
<div class="footer_custom">
    <div class="footer_box">
        <img src="<?= base_url('assets') ?>/img/infokost_black_final_crop.png">
    </div>

    <div class="footer_box_link">
        <ul>
            <li class="li"><a role="button" data-bs-toggle="modal" data-bs-target="#contactUs">Contact Us</a></li>
            <li class="li"><a href="admin" target="_blank">Login</a></li>
        </ul>
    </div>

    <div class="footer_box_link fw-bold">
        &copy; KKN GEL. 106 GOWA 7
    </div>
</div>
<!-- End Footer -->

<!-- Modal contact us -->
<div class="modal fade" id="contactUs" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Contact Us</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table cellpadding="5px">
                    <tr>
                        <th>E-mail</th>
                        <th>:</th>
                        <td><a href="mailto:infokostrl@gmail.com">infokostrl@gmail.com</a></td>
                    </tr>
                    <tr>
                        <th>No. Telepon</th>
                        <th>:</th>
                        <td><a href="tel:081355905756">081355905756 (Darul)</a></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal contact us -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="<?= base_url('assets') ?>/js/script.js"></script>
</body>

</html>