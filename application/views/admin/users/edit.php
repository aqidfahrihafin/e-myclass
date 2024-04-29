<?php foreach ($users_profiles as $result) {?>
	<!-- add modal -->
    <div class="modal fade editusers<?php echo $result->user_id; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Update Role Users</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<form action="<?php echo site_url('admin/users/update'); ?>" method="post">
						
						<div class="form-group">
							<label class="control-label">Role Users</label>
							<input type="hidden" class="form-control" value="<?php echo $result->user_id; ?>" name="user_id" id="user_id" >
                            <select class="form-control" name="role" required="">
								<option value="dosen" <?php echo ($result->role == 'dosen') ? 'selected' : ''; ?>>dosen</option>
								<option value="pembimbing" <?php echo ($result->role == 'pembimbing') ? 'selected' : ''; ?>>Pembimbing</option>
								<option value="admin" <?php echo ($result->role == 'admin') ? 'selected' : ''; ?>>Admin</option>
							</select>
							<small style="color: orange;">Pilih role untuk update role users!</small>
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
