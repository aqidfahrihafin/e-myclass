<?php foreach ($fakultas as $result) {?>
	<!-- add modal -->
    <div class="modal fade deletefakultas<?php echo $result->fakultas_id; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Delete Fakultas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<div class="alert alert-warning" role="alert" align="center">
						<b>Yakin </b>ingin menghapus data Fakultas <span class="badge badge-pill badge-info font-size-8"><?php echo $result->kode_fakultas; ?></span> <span class="badge badge-pill badge-primary font-size-8"><?php echo $result->nama_fakultas; ?></span> ? <br>
						<b>Perhatian!</b> Penghapusan Fakultas akan secara otomatis menghapus semua data prodi terkait pada <b>E-Reward</b>.
					</div>
					<form action="<?php echo site_url('admin/fakultas/delete'); ?>" method="post">
						<div class="form-group">
							<input type="hidden" class="form-control" value="<?php echo $result->fakultas_id; ?>" name="fakultas_id" id="fakultas_id" >
						</div>
						<hr>
						<div align="right">
							<button type="submit" class="btn btn-danger btn-sm w-md">Delete</button>
						</div>
					</form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php }?>
