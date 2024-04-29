 <div class="modal fade importdosen" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Import <?php echo $title ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
				<?= form_open_multipart('admin/dosen/importdosen') ?>
                <div class="modal-body">
					<div class="alert alert-primary" role="alert" align="justify">
							Unduh  <a href="<?php echo base_url('upload/import/importdosen.xlsx'); ?>"> contoh template</a> untuk melihat contoh format yang diperlukan.
					</div>
					<div class="form-group">
						<input type="file" class="form-control" id="nik" required name="importexcel" accept=".xlsx">
						<small>Pastikan anda menggunakan template yang disediakan.</small>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</div>
                <?= form_close(); ?>
        </div><!-- /.modal-dialog -->
    </div>
