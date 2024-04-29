<?php foreach ($fakultas as $result) {?>
	<!-- add modal -->
    <div class="modal fade fakultas<?php echo $result->fakultas_id; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Edit Data Fakultas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<form action="<?php echo site_url('admin/fakultas/update'); ?>" method="post">
						<div class="form-group">
							<label for="kode">Kode Fakultas</label>
							<input type="hidden" class="form-control" value="<?php echo $result->fakultas_id; ?>" name="fakultas_id" id="fakultas_id" >
							<input type="text" class="form-control" value="<?php echo $result->kode_fakultas; ?>" id="kode" readonly>
						</div>
						<div class="form-group">
							<label for="fakultas">Nama Fakultas</label>
							<input type="text" class="form-control" id="fakultas" value="<?php echo $result->nama_fakultas; ?>" name="nama_fakultas">
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
