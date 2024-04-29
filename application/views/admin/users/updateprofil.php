
	<!-- add modal -->
    <div class="modal fade updateprofil<?php echo $user_data->dosen_id; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
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
					<form action="<?php echo site_url('admin/profil/update_photo_with_qr_code/'.$user_data->dosen_id); ?>" method="post" enctype="multipart/form-data">
						<div align="center">
							<div style="width: 120px; height: 160px; overflow: hidden; border: 3px solid #fff; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);">
								<img src="<?php echo base_url('upload/photo/'.$user_data->photo); ?>" style="width: 100%; height: 100%;" alt="Logo" class="img-fluid">
							</div>
						</div>
						<hr>
						<div class="form-group">
							<label class="control-label">Pilih photo</label>
							<input type="hidden" class="form-control" value="<?php echo $user_data->dosen_id; ?>" name="dosen_id" id="dosen_id" >
							<input type="hidden" class="form-control" value="<?php echo $user_data->nama_dosen; ?>" name="nama_dosen" id="nama_dosen" >
							<input type="hidden" class="form-control" value="<?php echo $user_data->nik; ?>" name="nik" id="nik" >
                            <input type="file" class="form-control" name="photo" value="<?php echo $user_data->photo; ?>" id="photo">
							<br>
							<div class="card border border-danger">
								<div class="card-body">
									<small style="color: red;"><b>PERHATIAN!!</b></small>
									<br>
									<small style="color: red;">1. Foto yang diizinkan *PNG *JPG *JPEG!</small>
									<br>
									<small style="color: red;">2. Foto berukuran *3x4</small>
									<br>
									<small style="color: red;">3. Warna latar belakang *merah </small>
									<br>
									<small style="color: red;">4. Ukuran file maksimal *500 Kb</small>
								</div>
							</div>
							<div class="custom-control custom-checkbox custom-checkbox-outline  custom-checkbox-danger mb-3">
								<input type="checkbox" class="custom-control-input" id="customCheck-outlinecolor4" required>
								<label class="custom-control-label" for="customCheck-outlinecolor4"><small>Ceklis jika sudah sesuai dengan petunjuk</small></label>
							</div>
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
