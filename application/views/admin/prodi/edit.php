<?php foreach ($prodi as $result) {?>
	<!-- add modal -->
    <div class="modal fade prodi<?php echo $result->prodi_id; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Edit Data Prodi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<form action="<?php echo site_url('admin/prodi/update'); ?>" method="post">
						<div class="form-group">
							<label for="kode">Kode Prodi</label>
							<input type="hidden" class="form-control" value="<?php echo $result->prodi_id; ?>" name="prodi_id" id="prodi_id" >
							<input type="text" class="form-control" value="<?php echo $result->kode_prodi; ?>" id="kode_prodi"  name="kode_prodi" readonly>
						</div>
						<div class="form-group">
							<label for="prodi">Nama Prodi</label>
							<input type="text" class="form-control" id="prodi" value="<?php echo $result->nama_prodi; ?>" name="nama_prodi">
						</div>
						<div class="form-group">
							<label for="fakultas">Fakultas</label>
							<select name="fakultas_id" class="form-control" required>
								<option value="" disabled selected>Pilih fakultas...</option>
								<?php foreach ($fakultas as $fak) : ?>
									<option value="<?php echo $fak->fakultas_id; ?>" <?php if($fak->fakultas_id === $result->fakultas_id) echo 'selected'; ?>><?php echo $fak->nama_fakultas; ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<hr>
						<div align="right">
							<button type="submit" class="btn btn-primary w-md">Submit</button>
						</div>
					</form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php }?>
