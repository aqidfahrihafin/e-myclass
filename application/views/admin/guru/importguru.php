 <div class="modal fade importguru" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Add <?php echo $title ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
				<?= form_open_multipart('admin/guru/importguru') ?>
                <div class="modal-body">
					<div class="alert alert-primary alert-dismissible fade show" role="alert" align="justify">
						<i class="mdi mdi-bullseye-arrow"></i>
							Unduh  <a href="<?php echo base_url('upload/import/importguru.xlsx'); ?>"> contoh template</a> untuk melihat contoh format yang diperlukan.
					</div>
					<div class="form-group">
						<input type="file" class="form-control" id="nik" required name="importexcel" accept=".xlsx">
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</div>
                <?= form_close(); ?>
        </div><!-- /.modal-dialog -->
    </div>
