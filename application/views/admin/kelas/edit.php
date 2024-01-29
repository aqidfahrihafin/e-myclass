<?php foreach ($kelas as $result) {?>
	<!-- add modal -->
    <div class="modal fade kelas<?php echo $result->kelas_id; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Add Sanah Dirasah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<form action="<?php echo site_url('admin/kelas/update'); ?>" method="post">
						<div class="form-group">
							<label for="kode">Kode Kelas</label>
							<input type="hidden" class="form-control" value="<?php echo $result->kelas_id; ?>" name="kelas_id" id="kelas_id" >
							<input type="text" class="form-control" value="<?php echo $result->kode_kelas; ?>" id="kode" readonly>
						</div>
						<div class="form-group">
							<label for="kelas">Sanah Dirasah</label>
							<input type="text" class="form-control" id="kelas" value="<?php echo $result->kelas; ?>" name="kelas">
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
