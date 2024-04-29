<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Add <?php echo $title ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('admin/fakultas/simpan'); ?>" method="post">
                    <div class="form-group">
                        <label for="kode">Kode Fakultas</label>
                        <input type="text" class="form-control" id="kode" name="kode_fakultas">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Fakultas</label>
                        <input type="text" class="form-control" id="nama" name="nama_fakultas">
                    </div>
                    <hr>
                    <div align="right">
                        <button type="submit" class="btn btn-primary  w-md">Submit</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
