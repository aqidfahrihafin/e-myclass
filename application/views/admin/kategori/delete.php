<?php foreach ($kategori as $result) {?>
	<!-- add modal -->
    <div class="modal fade deletekategori<?php echo $result->kategori_id; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Delete kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<div class="alert alert-warning" role="alert" align="center">
						<b>Yakin </b>ingin menghapus data kategori <span class="badge badge-pill badge-info font-size-8"><?php echo $result->kode_kategori; ?></span> <span class="badge badge-pill badge-primary font-size-8"><?php echo $result->nama_kategori; ?></span> ? <br>
						<b>Perhatian!</b> Penghapusan kategori akan secara otomatis menghapus semua data prodi terkait pada <b>E-Reward</b>.
					</div>
					<form action="<?php echo site_url('admin/kategori/delete'); ?>" method="post">
						<div class="form-group">
							<input type="hidden" class="form-control" value="<?php echo $result->kategori_id; ?>" name="kategori_id" id="kategori_id" >
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
