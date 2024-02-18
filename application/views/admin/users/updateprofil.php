
	<!-- add modal -->
    <div class="modal fade updateprofil<?php echo $user_data->guru_id; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Update Profil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<form action="<?php echo site_url('admin/profil/update_photo_with_qr_code/'.$user_data->guru_id); ?>" method="post" enctype="multipart/form-data">
						<div align="center">
							<img src="<?php echo base_url('upload/photo/'.$user_data->photo); ?>" width="80px" alt="Logo" class="img-fluid">
						</div>
						<hr>
						<div class="form-group">
							<label class="control-label">Pilih photo</label>
							<input type="hidden" class="form-control" value="<?php echo $user_data->guru_id; ?>" name="guru_id" id="guru_id" >
							<input type="hidden" class="form-control" value="<?php echo $user_data->nama_guru; ?>" name="nama_guru" id="nama_guru" >
							<input type="hidden" class="form-control" value="<?php echo $user_data->nik; ?>" name="nik" id="nik" >
                            <input type="file" class="form-control" name="photo" value="<?php echo $user_data->photo; ?>" id="photo">
							<small style="color: red;">File yang diizinkan *PNG *JPG *JPEG!</small>
                        </div>
						<hr>
						<div align="right">
							<button type="submit" class="btn btn-primary btn-sm w-md">Submit</button>
						</div>
					</form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
