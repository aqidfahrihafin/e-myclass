<?php foreach ($perpub as $result) {?>
	<!-- add modal -->
    <div class="modal fade deleteperpub<?php echo $result->peringkat_publikasi_id; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Delete Perpub</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<div class="alert alert-warning" role="alert" align="center">
						<b>Yakin </b>ingin menghapus data Peringkat Publikasi  <span class="badge badge-pill badge-primary font-size-8"><?php echo $result->nama_peringkat; ?></span> ? <br>
						<b>Perhatian!</b> Penghapusan Peringkat Publikasi akan secara otomatis menghapus semua data terkait pada <b>E-Reward</b>.
					</div>
					<form action="<?php echo site_url('admin/peringkatpublikasi/delete'); ?>" method="post">
						<div class="form-group">
							<input type="hidden" class="form-control" value="<?php echo $result->peringkat_publikasi_id; ?>" name="peringkat_publikasi_id" id="peringkat_publikasi_id" >
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
