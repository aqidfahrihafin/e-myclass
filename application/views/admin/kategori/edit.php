<?php foreach ($kategori as $result) {?>
	<!-- add modal -->
    <div class="modal fade kategori<?php echo $result->kategori_id; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Edit Data Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<form action="<?php echo site_url('admin/kategori/update'); ?>" method="post">
						<div class="form-group">
							<label for="nama_kategori">Jenis Pengajuan</label>              
							<input type="hidden" class="form-control" value="<?php echo $result->kategori_id; ?>" name="kategori_id" id="kategori_id" >        
							<select id="nama_kategori" name="nama_kategori" class="form-control" required>
								<option value="" disabled selected>Pilih jenis Pengajuan...</option>
								<option value="Reward">Reward Publikasi</option>
								<option value="Bantuan">Bantuan Publikasi</option>
							</select>
						</div>
						<div class="form-group">
							<label for="kategori">Jenis Kategori BPI</label>
							<input type="text" class="form-control" id="kategori" value="<?php echo $result->jenis_kategori_bpi; ?>" name="jenis_kategori_bpi">
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
