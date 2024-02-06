<?php foreach ($mapel as $result) {?>
	<!-- add modal -->
    <div class="modal fade mapel<?php echo $result->mapel_id; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Edit Data Mapel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<form action="<?php echo site_url('admin/mapel/update'); ?>" method="post">
						<div class="form-group">
							<label for="kode">Kode Mapel</label>
							<input type="hidden" class="form-control" value="<?php echo $result->mapel_id; ?>" name="mapel_id" id="mapel_id" >
							<input type="text" class="form-control" value="<?php echo $result->kode_mapel; ?>" id="kode" readonly>
						</div>
						<div class="form-group">
							<label for="mapel">Nama Mapel</label>
							<input type="text" class="form-control" id="mapel" value="<?php echo $result->nama_mapel; ?>" name="nama_mapel">
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
