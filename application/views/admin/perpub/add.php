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
                <form action="<?php echo site_url('admin/peringkatpublikasi/simpan'); ?>" method="post">
					<div class="form-group">
                        <label for="nama_kategori">Jenis Pengajuan</label>                      
						<select id="nama_kategori" name="nama_kategori" class="form-control" required>
							<option value="" disabled selected>Pilih jenis Pengajuan...</option>
							<option value="Reward">Reward Publikasi</option>
							<option value="Bantuan">Bantuan Publikasi</option>
						</select>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Peringkat</label>
                        <input type="text" class="form-control" id="nama" name="nama_peringkat">
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
