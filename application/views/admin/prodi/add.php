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
                <form action="<?php echo site_url('admin/prodi/simpan'); ?>" method="post">
                    <div class="form-group">
                        <label for="kode">Kode Prodi</label>
                        <input type="text" class="form-control" id="kode" name="kode_prodi">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Prodi</label>
                        <input type="text" class="form-control" id="nama" name="nama_prodi">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Fakultas</label>
                        <select name="fakultas_id" class="form-control" required>
							<option value="" disabled selected>Pilih Fakultas...</option>
							<?php $no = 0; foreach ($fakultas as $result) : $no++; ?>
							<option value="<?php echo $result->fakultas_id; ?>"><?php echo $result->nama_fakultas; ?></option>
							<?php endforeach ?>
						</select>
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
